import pickle
import sys
file = open("model", "rb")

model = pickle.load(file)
year = int(sys.argv[1])
temp = model.predict([[year]])[0]
print("The predicted Global Temperature in ", year, " is ", temp, "<br>")
