from flask import Flask,render_template
import RPi.GPIO as gpio
import time
led=[18,23,24,25,8,7,12,16,20]
buzzer=21
rasp_ard_send=4
rasp_ard_listen=17
gpio.setmode(gpio.BCM)
gpio.setup(led[0], gpio.OUT)
gpio.setup(led[1], gpio.OUT)
gpio.setup(led[2], gpio.OUT)
gpio.setup(led[3], gpio.OUT)
gpio.setup(led[4], gpio.OUT)
gpio.setup(led[5], gpio.OUT)
gpio.setup(led[6], gpio.OUT)
gpio.setup(led[7], gpio.OUT)
gpio.setup(led[8],gpio.OUT)
gpio.setup(buzzer,gpio.OUT)
gpio.setup(rasp_ard_send,gpio.OUT)
gpio.setup(rasp_ard_listen,gpio.IN)
app = Flask(__name__)

gpio.output(rasp_ard_send,gpio.LOW)
	
@app.route('/')
def index():
	return 'Hello World'

@app.route('/disco')
def disco():
	while(1):
		for i in led:
			gpio.output(int(i),gpio.HIGH)
			time.sleep(0.3)
		for i,m in enumerate(led):
                	gpio.output(int(led[int(8-i)]),gpio.LOW)
                	time.sleep(0.3)
		for i in range(3):
			gpio.output(int(led[int(i)]),gpio.HIGH)
			gpio.output(int(led[int(i+1)]),gpio.HIGH)
			gpio.output(int(led[int(i+2)]),gpio.HIGH)
			time.sleep(0.3)
			gpio.output(int(led[int(i)]),gpio.LOW)
                        gpio.output(int(led[int(i+1)]),gpio.LOW)
                        gpio.output(int(led[int(i+2)]),gpio.LOW)

	return 'I am a Disco Dancer'
	

@app.route('/start')
def start():
	gpio.output(rasp_ard_send,gpio.HIGH)
	return "Started"

@app.route('/stop')
def stop():
	'''while(gpio.input(rasp_ard_listen)==False):
		a=2'''
	gpio.output(rasp_ard_send,gpio.LOW)
	#return "medibot is at station"
    return "Stoped"
	
@app.route('/ledon/all')
def allon():
        for i in led: 
               gpio.output(int(i),gpio.HIGH)
        return 'All are on'
@app.route('/ledoff/all')
def alloff():
        for i in led:
               gpio.output(int(i),gpio.LOW)
        return 'All are off'


@app.route('/ledon/<number>')
def ledon(number):
        gpio.output(led[int(number)],gpio.HIGH)
        return 'led is on'


@app.route('/ledoff/<number>')
def ledoff(number):
        gpio.output(led[int(number)],gpio.LOW)
        return 'led is off'

@app.route('/user/<name>')
def user(name):
	return render_template('user.html',name=name)

if __name__ == '__main__':
	app.run(debug=True,host='0.0.0.0',port=5050)
