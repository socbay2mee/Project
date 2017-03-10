#!/usr/bin/python3
import smbus
from time import sleep
bus = smbus.SMBus(1)
addr = 0x08
val = 0x10
import RPi.GPIO as GPIO 
GPIO.setmode(GPIO.BCM) 
GPIO.setup(23, GPIO.OUT) 
GPIO.output(23,GPIO.HIGH)   
bus.write_byte(addr, val)
print(val)
sleep(1)
