

import numpy as np
from sklearn.svm import SVR
from sklearn.metrics import accuracy_score
from sklearn.neighbors import KNeighborsRegressor
from sklearn.tree import DecisionTreeRegressor
import matplotlib.pyplot as plt
from collections import OrderedDict
import pickle

file1 = open('diff.pkl', 'rb')
data = pickle.load(file1)
data = OrderedDict(sorted(data.items()))

y = np.array(list(data.values()))
y=1000*y
X = np.array([[i] for i in data.keys()])
X_test = list(data.keys())
X_test = [[i] for i in X_test]
y_test = y

svr_rbf = SVR(kernel='rbf', C=1000, gamma=0.1)
y_pred = svr_rbf.fit(X, y)
y_rbf = y_pred.predict(X)


lw = 2
plt.figure()
plt.scatter(X, y, color='darkorange', label='data')
plt.plot(X, y_rbf, color='navy', lw=lw, label='RBF model')
plt.xlabel('Latitude')
plt.ylabel('Difference in temperature')
plt.title('SVR Regression')
plt.legend()
plt.show()
print(svr_rbf.score(X_test, y_test))

