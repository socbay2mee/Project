#!/usr/bin/python3
import smbus
from time import sleep
bus = smbus.SMBus(1)
addr = 0x08
import RPi.GPIO as GPIO 
GPIO.setmode(GPIO.BCM) 
GPIO.setup(24, GPIO.OUT) 
GPIO.output(24,GPIO.HIGH)    
bus.write_byte(addr, 2)
print(2)
sleep(1)
