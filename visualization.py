import numpy as np
import pickle
from collections import OrderedDict
import sys
import matplotlib
matplotlib.use('Agg')
import matplotlib.pyplot as plt
file = open('city.pkl', 'rb')

data = pickle.load(file)

def overall_summary_of_data(value):
    #Histogram
    plt.hist(x=value.values(), bins=20, rwidth=0.9, color='#607c8e')
    plt.title('Distribution of Temperature')
    plt.xlabel('Temperature')
    plt.ylabel('Frequency')
    plt.grid(axis='y', alpha=0.75)
    plt.savefig('hist.png')   # save the figure to file
    plt.figure()
    #scatter plot 
    plt.scatter(value.keys(),value.values(),color='red', s=10)
    plt.title('Variation of Temperature')
    plt.xlabel('Time')
    plt.ylabel('Temperature')
    plt.savefig('scatter.png')   # save the figure to file
    plt.figure()
    #Box plot
    bp = plt.boxplot(value.values())
    plt.title('Distribution of Temperature')
    plt.xlabel('Temperature')
    plt.ylabel('Frequency')
    plt.savefig('box.png')
    plt.figure()
    medians = [median.get_ydata() for median in bp["medians"]]
    whiskers = [whiskers.get_ydata()[0] for whiskers in bp["whiskers"]]
    data = np.array(list(value.values()))
    #Line plot for global data
    plt.plot(list(value.keys())[:-1], list(value.values())[:-1])
    plt.title('Variation of Temperature')
    plt.xlabel('Time')
    plt.ylabel('Temperature')
    plt.savefig('plot.png')   # save the figure to file
    plt.figure()
    #summary

    print("Mean Temperature ", np.mean(data),"<br>")
    print("Standard Deviation Temperature ", np.std(data),"<br>")
    print("Median Temperature ", medians[0][0],"<br>")
    print("Lower Quartile Temperature ", whiskers[0],"<br>")
    print("Upper Quartile Temperature ", whiskers[1],"<br>")

city_name=sys.argv[1]

overall_summary_of_data(data[city_name][0])
