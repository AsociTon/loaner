# Bank loans using knn
import sys
# Importing the libraries
import numpy as np
import pandas as pd
y1 = [sys.argv[1],sys.argv[2],sys.argv[3],sys.argv[4],sys.argv[5],sys.argv[6],sys.argv[7],sys.argv[8],sys.argv[9]]
def a1():
# Importing the dataset
    dataset = pd.read_csv('test0.csv')
    X = dataset.iloc[:, :-1].values
    y = dataset.iloc[:, 7].values

# transforming X dataset(Label Encoder)
    from sklearn.preprocessing import LabelEncoder
    labelencoder_X = LabelEncoder()
    X[:,0] = labelencoder_X.fit_transform(X[:,0])

# transforming X dataset(OneHotEncoder)
    from sklearn.preprocessing import OneHotEncoder
    onehotencoder = OneHotEncoder(categorical_features = [0])
    X = onehotencoder.fit_transform(X).toarray()

# Transforming y dataset
    from sklearn.preprocessing import LabelEncoder
    labelencoder_y = LabelEncoder()
    y = labelencoder_y.fit_transform(y)

# Feature Scaling
    from sklearn.preprocessing import StandardScaler
    sc_X = StandardScaler()
    X = sc_X.fit_transform(X)

# Fitting Training Set tothe Training Set
    from sklearn.neighbors import KNeighborsClassifier
    classifier = KNeighborsClassifier(n_neighbors = 5, metric = 'minkowski', p = 2)
    classifier.fit(X, y)

# Getting a new value
    #y1 = [1, 0, 0, 225000, 30000, 1, 1, 10.76, 11090.86]

# Predicting the Test Set Results
    y_pred = classifier.predict(sc_X.transform(np.array([y1])))
    print(y_pred[0])
a1()
