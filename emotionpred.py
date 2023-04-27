import re 
from collections import Counter
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
from sklearn.tree import DecisionTreeClassifier

from sklearn.feature_extraction import DictVectorizer
import mysql.connector


import warnings
warnings.filterwarnings("ignore")


def read_data(file):
    data = []
    with open(file, 'r')as f:
        for line in f:
            line = line.strip()
            label = ' '.join(line[1:line.find("]")].strip().split())
            text = line[line.find("]")+1:].strip()
            data.append([label, text])
    return data

file = 'text.txt'
data = read_data(file)


def ngram(token, n): 
    output = []
    for i in range(n-1, len(token)): 
        ngram = ' '.join(token[i-n+1:i+1])
        output.append(ngram) 
    return output

def create_feature(text, nrange=(1, 1)):
    text_features = [] 
    text = text.lower() 
    text_alphanum = re.sub('[^a-z0-9#]', ' ', text)
    for n in range(nrange[0], nrange[1]+1): 
        text_features += ngram(text_alphanum.split(), n)    
    text_punc = re.sub('[a-z0-9]', ' ', text)
    text_features += ngram(text_punc.split(), 1)
    return Counter(text_features)


def convert_label(item, name): 
    items = list(map(float, item.split()))
    label = ""
    for idx in range(len(items)): 
        if items[idx] == 1: 
            label += name[idx] + " "
    
    return label.strip()

emotions = ["joy", 'fear', "anger", "sadness", "disgust", "shame", "guilt"]

X_all = []
y_all = []
for label, text in data:
    y_all.append(convert_label(label, emotions))
    X_all.append(create_feature(text, nrange=(1, 4)))


X_train, X_test, y_train, y_test = train_test_split(X_all, y_all, test_size = 0.2, random_state = 123)



vectorizer = DictVectorizer(sparse = True)
X_train = vectorizer.fit_transform(X_train)
X_test = vectorizer.transform(X_test)

dtree = DecisionTreeClassifier()

dtree.fit(X_train, y_train)
train_acc = accuracy_score(y_train, dtree.predict(X_train))
test_acc = accuracy_score(y_test, dtree.predict(X_test))


t1 = "i am so excited"

mydb = mysql.connector.connect(host="localhost",user="root",password="",database="music")

mycursor = mydb.cursor()

sql1 = "SELECT `searchtext`  FROM `tblsearch` ORDER BY ID DESC";

mycursor.execute(sql1);
myresult=mycursor.fetchall();
msg=myresult[0][0]
texts = [msg]
for text in texts: 
    features = create_feature(text, nrange=(1, 1))
    features = vectorizer.transform(features)
    prediction = dtree.predict(features)[0]
    print(text)
    print(prediction)


sql2 = "UPDATE tblsearch SET emotionrecognized = %s WHERE searchtext = %s"
val = (str(prediction),msg)

mycursor.execute(sql2, val)
mydb.commit()


