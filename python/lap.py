import RPi.GPIO as GPIO 
GPIO.setmode(GPIO.BCM) 
GPIO.setup(21, GPIO.OUT)
while(1):
	GPIO.output(21,GPIO.HIGH) 
	sleep(1)
	GPIO.output(21,GPIO.LOW) 
	
