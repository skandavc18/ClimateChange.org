import matplotlib.pyplot as plt
import pickle
from collections import OrderedDict
import numpy as np
import pandas as pd
import tensorflow as tf

def train_model(trainX, trainY, testX, testY,  alpha=0.00000001, w_start=0.0, b_start=0.0, display_step=20, training_epochs=500):

    with tf.name_scope('input'):
        X = tf.placeholder(tf.float64)
        Y = tf.placeholder(tf.float64)

    w = tf.Variable(w_start, name="weights", dtype=tf.float64)  # weights
    b = tf.Variable(b_start, name="bias", dtype=tf.float64)  # bias
    y_model = tf.add(tf.multiply(w, X), b)  # model

    cost = tf.reduce_mean(tf.square(Y-y_model))

    tf.summary.scalar("cost", cost)

    train_op = tf.train.GradientDescentOptimizer(
        alpha).minimize(cost)  # optimizer function

    init = tf.global_variables_initializer()

    with tf.Session() as sess:
        # Run the initializer
        sess.run(init)
        counter = 0
        fc = 0
        # Fit all training data
        for epoch in range(training_epochs):
            for (x, y) in zip(trainX, trainY):
                sess.run(train_op, feed_dict={X: x, Y: y})

            # Display logs per epoch step
            if display_step != 0 and (epoch+1) % display_step == 0:
                c = sess.run(cost, feed_dict={X: trainX, Y: trainY})
                print("Epoch:", '%04d' % (epoch+1), "cost=",
                      "{:.9f}".format(c), "w=", sess.run(w), "b=", sess.run(b))
                fc = c

        print("Optimization Finished!")
        pred_y = sess.run(y_model, feed_dict={X: testX})
        mse = tf.reduce_mean(tf.square(pred_y - testY))
        print("Accuracy is ", (1 - sess.run(mse))*100)
        return (y_model, sess.run(y_model, feed_dict={X: trainX+testX}))


def plot(x,y,y_pred):
    plt.scatter(x, y)
    plt.plot(x, y_pred)
    plt.show()

file = open('world.pkl', 'rb')
data = pickle.load(file)
time = list(data.keys())
temp = list(data.values())

y_model, period1 = train_model(time[116:260], temp[116:260], time[260:-2], temp[260:-2], 0.0000000195)
plot(time[116:-2], temp[116:-2], period1)
