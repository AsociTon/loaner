# -*- coding: utf-8 -*-
"""
Created on Sat Feb  9 01:27:23 2019

@author: Dell
"""

# Banking in Random Forest Regression
def a():
    # Importing the libraries
    import numpy as np
    import matplotlib.pyplot as plt
    import pandas as pd

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

# Fitting the Regression Model to the dataset
    from sklearn.ensemble import RandomForestRegressor
    regressor = RandomForestRegressor(n_estimators = 500)
    regressor.fit(X, y)

# Getting a new value
    y1 = [1, 0, 0, 50000, 5875, 1, 2, 26.7, 2043.52]


# Predicting a new result
    y_pred = regressor.predict(np.array([y1]))

    return (y_pred)