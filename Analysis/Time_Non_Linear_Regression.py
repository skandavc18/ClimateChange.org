import numpy as np
from sklearn.svm import SVR
from sklearn.metrics import accuracy_score
import matplotlib.pyplot as plt
from collections import OrderedDict
import pickle

file2 = open('world.pkl', 'rb')
data = pickle.load(file2)

data=[np.array(list(data.keys())),np.array(list(data.values()))]
X=np.array([[i] for i in data[0][130:]])
y=100*data[1][130:]
X_test=X[130:]
y_test=y[130:]

svr_rbf = SVR(kernel='rbf', C=75000, gamma=0.12)
y_pred = svr_rbf.fit(X, y)
y_rbf=y_pred.predict(X)


lw = 2
plt.scatter(X, y, color='darkorange', label='data')
plt.plot(X, y_rbf, color='navy', lw=lw, label='RBF model')
plt.xlabel('time')
plt.ylabel('yearly temperature')
plt.title('SVR Regression')
plt.legend()
plt.show()
print(svr_rbf.score(X_test,y_test))
print(2013,2014,2015,2016,2017,2018,y_pred.predict([[2013],[2014],[2015],[2016],[2017],[2018]])/100)
print(data[0][-1],data[1][-1])

print("20th century average ",np.mean(data[1][155:256]))