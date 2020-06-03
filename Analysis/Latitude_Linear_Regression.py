import matplotlib.pyplot as plt
import pickle
from collections import OrderedDict
import numpy as np
import pandas as pd

def train_model(trainX, trainY, testX, testY,  alpha=0.00000001,w_start=0.0,b_start=0.004, file=None,display_step=20,training_epochs=500):
    import tensorflow as tf
    
    with tf.name_scope('input'):
        X = tf.placeholder(tf.float64)
        Y = tf.placeholder(tf.float64)

    w = tf.Variable(w_start, name="weights", dtype=tf.float64)  # weights
    b = tf.Variable(b_start, name="bias", dtype=tf.float64)  # bias
    y_model = tf.add(tf.multiply(w,X), b)  # model

    cost = tf.reduce_mean(tf.square(Y-y_model))

    tf.summary.scalar("cost", cost)

    train_op = tf.train.GradientDescentOptimizer(alpha).minimize(cost)  # optimizer function

    init = tf.global_variables_initializer()

    with tf.Session() as sess:
        # Run the initializer
        sess.run(init)
        counter = 0
        fc=0
        # Fit all training data
        for epoch in range(training_epochs):
            for (x, y) in zip(trainX, trainY):
                sess.run(train_op, feed_dict={X: x, Y: y})

            # Display logs per epoch step
            if display_step != 0 and (epoch+1) % display_step == 0:
                c = sess.run(cost, feed_dict={X: trainX, Y: trainY})
                print("Epoch:", '%04d' % (epoch+1), "cost=", "{:.9f}".format(c), "w=", sess.run(w), "b=", sess.run(b))
                fc=c

        print("Optimization Finished!")
        pred_y = sess.run(y_model, feed_dict={X: testX})
        mse = tf.reduce_mean(tf.square(pred_y - testY))
        print("Accuracy is ",(1- sess.run(mse))*100)
        #pickle.dump(y_model,file)
        return (y_model,sess.run(y_model, feed_dict={X: trainX+testX}))

def plot(x1,x2,y1,y2,y_pred1,y_pred2):
    plt.scatter(x1+x2,y1+y2)
    plt.plot(x1,y_pred1)
    plt.plot(x2, y_pred2)
    plt.show()

file2 = open('world.pkl','rb')
file3 = open('diff.pkl','rb')


data =pickle.load(file3)

def diff(city):
    data=OrderedDict()
    for i in city:
        temp=[]
        for j in city[i][0]:
            if j+1 in city[i][0]:
                temp.append(city[i][0][j+1]-city[i][0][j])
        if city[i][1] not in data:
            data[city[i][1]]=[]
        data[city[i][1]].append(np.mean(temp))
    for i in data:
        data[i]=np.mean(data[i])
    pickle.dump(data,file3)
    return data
    
data =[list(data.keys()),list(data.values())]
south = list(filter(lambda item: item[0]<0, zip(data[0],data[1])))
north = list(filter(lambda item: item[0] >= 0, zip(data[0], data[1])))
south = [list(map(lambda x:x[0], south)), list(map(lambda x:x[1], south))]
north = [list(map(lambda x:x[0], north)), list(map(lambda x:x[1], north))]

north=pd.DataFrame({"diff":north[1],"lat":north[0]})
print(north["diff"].corr(north["lat"]))
south = pd.DataFrame({"diff": south[1], "lat": south[0]})
print(south["diff"].corr(south["lat"]))

north_model,y1 = train_model(list(north["lat"])[0:35],list(north["diff"])[0:35],list(north["lat"])[35:],list(north["diff"])[35:],0.0002,0.004,0.004)
south_model,y2 = train_model(list(south["lat"])[0:24], list(south["diff"])[0:24], list(south["lat"])[24:], list(south["diff"])[24:], 0.0002,-0.0002,0.004)
plot(list(north["lat"]),list(south["lat"]), list(north["diff"]),list(south["diff"]), y1,y2)

