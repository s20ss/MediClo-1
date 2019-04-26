#!/usr/bin/env python
# -*- coding: utf-8 -*-
import httplib, urllib, requests
from time import sleep
import RPi.GPIO as GPIO
import time
import string
GPIO.setmode(GPIO.BOARD)




def main():

    while True:

   	baseURL = 'https://api.thingspeak.com/channels/458530/feeds.json?api_key=NUYNHP2VGDNTVWAT&results=2' # xxxx = your channel id

	f = requests.get(baseURL)
	m=eval(f.text)   #get data from url
	m=m['feeds'][1]['field1']
    print(m)
    if m == '1':
        requests.get('127.0.0.1:5050/start')
        print("Medicine Robot Started")
        requests.get('127.0.0.1:5050/ledon/0')
        print("Medicine LED Started")
        requests.get('127.0.0.1:5050/stop')
        #GPIO.output(11, GPIO.HIGH) # led 1 off
        print("Medicine 1 Delivered")
    elif m == '2':
        requests.get('127.0.0.1:5050/start')
        print("Medicine Robot Started")
        requests.get('127.0.0.1:5050/ledon/1')
        print("Medicine LED Started")
        requests.get('127.0.0.1:5050/stop')
        #GPIO.output(11, GPIO.HIGH) # led 1 off
        print("Medicine 2 Delivered")
    elif m == '3':
        requests.get('127.0.0.1:5050/start')
        print("Medicine Robot Started")
        requests.get('127.0.0.1:5050/ledon/2')
        print("Medicine LED Started")
        requests.get('127.0.0.1:5050/stop')
        #GPIO.output(11, GPIO.HIGH) # led 1 off
        print("Medicine 3 Delivered")
    elif m == '4':
        requests.get('127.0.0.1:5050/start')
        print("Medicine Robot Started")
        requests.get('127.0.0.1:5050/ledon/3')
        print("Medicine LED Started")
        requests.get('127.0.0.1:5050/stop')
        #GPIO.output(11, GPIO.HIGH) # led 1 off
        print("Medicine 4 Delivered")
    elif m == '5':
        requests.get('127.0.0.1:5050/start')
        print("Medicine Robot Started")
        requests.get('127.0.0.1:5050/ledon/4')
        print("Medicine LED Started")
        requests.get('127.0.0.1:5050/stop')
        #GPIO.output(11, GPIO.HIGH) # led 1 off
        print("Medicine 5 Delivered")
    elif m == '6':
        requests.get('127.0.0.1:5050/start')
        print("Medicine Robot Started")
        requests.get('127.0.0.1:5050/ledon/5')
        print("Medicine LED Started")
        requests.get('127.0.0.1:5050/stop')
        #GPIO.output(11, GPIO.HIGH) # led 1 off
        print("Medicine 6 Delivered")
    elif m == '7':
        requests.get('127.0.0.1:5050/start')
        print("Medicine Robot Started")
        requests.get('127.0.0.1:5050/ledon/6')
        print("Medicine LED Started")
        requests.get('127.0.0.1:5050/stop')
        #GPIO.output(11, GPIO.HIGH) # led 1 off
        print("Medicine 7 Delivered")
    elif m == '8':
        requests.get('127.0.0.1:5050/start')
        print("Medicine Robot Started")
        requests.get('127.0.0.1:5050/ledon/7')
        print("Medicine LED Started")
        requests.get('127.0.0.1:5050/stop')
        #GPIO.output(11, GPIO.HIGH) # led 1 off
        print("Medicine 8 Delivered")
    elif m == '9':
        requests.get('127.0.0.1:5050/start')
        print("Medicine Robot Started")
        requests.get('127.0.0.1:5050/ledon/8')
        print("Medicine LED Started")
        requests.get('127.0.0.1:5050/stop')
        #GPIO.output(11, GPIO.HIGH) # led 1 off
        print("Medicine 9 Delivered")
    else:
        print ("not found command")
    print '==========================================='
    f.close()
    sleep(5)
    req="https://api.thingspeak.com/update?api_key=N0ETSMWMUHMQRLTY&field1=0"
    requests.get(req)
        
if __name__ == "__main__":
    main()
