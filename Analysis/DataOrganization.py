import numpy as np 
import pandas as pd
from collections import OrderedDict
import pickle
df = pd.read_csv('data.csv')

file1=open("cities.pkl","wb")
file2=open("world.pkl","wb")
file3=open("diff.pkl","wb")

def cities():
    data = OrderedDict()
    for i in zip(df.city, df.date, df.temperature, df.latitude):
        if i[0] not in data:
            data[i[0]] = [OrderedDict(), i[3]]
        if (int(i[1][0:4]) > 1743):
            if (int(i[1][0:4]) not in data[i[0]][0]):
                data[i[0]][0][int(i[1][0:4])] = []
            data[i[0]][0][int(i[1][0:4])].append(i[2])

    for i in data:
        for j in data[i][0]:
            data[i][0][j] = np.mean(data[i][0][j])
    return data


def world():
    data = OrderedDict()
    for i in zip(df.date, df.temperature):
        if int(i[0][0:4]) > 1743:
            if (int(i[0][0:4]) not in data):
                data[int(i[0][0:4])] = []
            data[int(i[0][0:4])].append(i[1])
    for i in data:
        data[i] = np.mean(data[i])
    return data




def diff(city):
    data = OrderedDict()
    for i in city:
        temp = []
        for j in city[i][0]:
            if j+1 in city[i][0]:
                temp.append(city[i][0][j+1]-city[i][0][j])
        if city[i][1] not in data:
            data[city[i][1]] = []
        data[city[i][1]].append(np.mean(temp))
    for i in data:
        data[i] = np.mean(data[i])
    return data

pickle.dump(cities(),file1)
pickle.dump(world(),file2)
pickle.dump(diff(),file3)
