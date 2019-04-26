import time
import os
import numpy
import requests
not_executed = 1
import requests
minute=-1
while(not_executed):
    print("a")
    dt = list(time.localtime())
    #print (dt)
    hour = dt[3]
    
    if(minute!=dt[4]):
        minute = dt[4]
        flag=0
    if (minute<10):
        minute="0"+str(minute)
    loctime="'"+str(hour)+":"+str(minute)+"'"
    #print(loctime)
    import MySQLdb

    db = MySQLdb.connect(host="localhost", user="root", passwd="", db="my_database")

        #create a cursor for the select
    cur = db.cursor()

        #execute an sql query
    query= "SELECT * FROM my_database.hello5 where dnt="+loctime
    print(query)
    cur.execute(query)

        ##Iterate
    for row in cur.fetchall() :
              #data from rows
            pillno = str(row[2])
            if(flag==0):
                request="https://api.thingspeak.com/update?api_key=N0ETSMWMUHMQRLTY&field1="+pillno
                #print
                requests.get(request)
                print ("This Pill is" + pillno)
                flag=1

        # close the cursor
    cur.close()

        # close the connection
    db.close()


not_executed = 0
