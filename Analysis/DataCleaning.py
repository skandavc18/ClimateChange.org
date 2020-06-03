import csv
import matplotlib.pyplot as plt
import statistics as stat
import numpy as np
from collections import Counter
from datetime import date
import math
file = open("C:\\Users\skand\Downloads\GlobalLandTemperaturesByCity.csv","r", encoding="utf8")
reader = csv.reader(file)
next(reader)
output = open("data.csv", "w", newline='', encoding="utf8")
writer=csv.writer(output)
writer.writerow(["city","date","temperature","latitude","country"])
count=0 
data={}
for row in reader:
    if row[3] not in data:
        if row[5][len(row[5])-1]=='N':
            latitude = float(row[5].split(row[5][len(row[5])-1])[0])
        else:
            latitude = float('-'+row[5].split(row[5][len(row[5])-1])[0])
        data[row[3]] = [[],latitude, row[4]]
        next(reader)
    else:
        d=date(int(row[0][0:4]),int(row[0][5:7]),int(row[0][8:]))

        if row[1]=='':
            data[row[3]][0].append([d,''])
        else:
            data[row[3]][0].append([d, float(row[1])])

for i in data:
    arr=[[] for x in range(12)]
    averages=[]
    for j in data[i][0]:
        arr[j[0].month-1].append(j)
    for k in range(12):
        averages.append(np.mean(np.array(list(map(lambda y:y[1],filter(lambda x:x[1],arr[k]))))))
    for l in range(12):
        for m in range(len(arr[l])):
            if arr[l][m][1]=='':
                arr[l][m][1]=averages[l]
    for a in arr:
        for b in a:
            writer.writerow([i, b[0].isoformat(),b[1],data[i][1], data[i][2]])

