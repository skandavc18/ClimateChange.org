import matplotlib.pyplot as plt
import numpy as np
import pandas as pd
import pickle
from collections import OrderedDict
file1 = open('cities.pkl', 'rb')
file2 = open('world.pkl','rb')
cities = pickle.load(file1)
world = pickle.load(file2)


def DiscriptiveSummary(value):
    #Histogram
    plt.hist(x=sorted(value.values())[130:], bins=20, rwidth=0.9, color='#607c8e')
    plt.title('Distribution of Temperature')
    plt.xlabel('Temperature')
    plt.ylabel('Frequency')
    plt.grid(axis='y', alpha=0.75)
    plt.show()
    plt.figure()
    #scatter plot 
    plt.scatter(sorted(value.keys())[130:],sorted(value.values())[130:],color='red', s=10)
    plt.title('Variation of Temperature')
    plt.xlabel('Time')
    plt.ylabel('Temperature')
    plt.show()
    plt.figure()
    #Box plot
    bp=plt.boxplot(sorted(value.values())[130:])
    plt.title('Distribution of Temperature')
    plt.xlabel('Temperature')
    plt.ylabel('Frequency')
    plt.show()
    medians = [median.get_ydata() for median in bp["medians"]]
    whiskers = [whiskers.get_ydata()[0] for whiskers in bp["whiskers"]]
    data = np.array(sorted(value.values()))
    #Line plot for global data
    plt.plot(sorted(value.keys())[130:], sorted(value.values())[130:])
    plt.title('Variation of Temperature')
    plt.xlabel('Time')
    plt.ylabel('Temperature')
    plt.show()
    plt.figure()

    #summary

    print("Mean Temperature", np.mean(data))
    print("Standard Deviation of Temperature", np.std(data))
    print("Median Temperature", medians[0][0])
    print("Lower Quartile Temperature", whiskers[0])
    print("Upper Quartile Temperature", whiskers[1])
    

DiscriptiveSummary(cities['Bangalore'][0])

DiscriptiveSummary(world)