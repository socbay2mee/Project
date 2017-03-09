import RPi.GPIO as GPIO 
GPIO.setmode(GPIO.BCM) 
GPIO.setup(3, GPIO.OUT)
while(1)
	GPIO.output(3,GPIO.HIGH) 
