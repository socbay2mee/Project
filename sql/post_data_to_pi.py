import MySQLdb
import Adafruit_DHT
import RPi.GPIO as GPIO
import time

from datetime import datetime
import webbrowser
import os, subprocess
import re, serial
import smtplib
from email import Encoders
from email.MIMEMultipart import MIMEMultipart
from email.MIMEBase import MIMEBase
from email.MIMEText import MIMEText


# Adafruit_DHT ho tro nhieu loai cam bien DHT, o day dung DHT11 nen chon cam bien  DHT11
chon_cam_bien = Adafruit_DHT.DHT11
GPIO.setmode(GPIO.BCM)
pin_sensor = 14
GPIO.setup(2, GPIO.IN)
GPIO.setup(3, GPIO.IN)

den_1 = GPIO.input(2)
den_2 = GPIO.input(3)
print ("RASPI.VN Demo cam bien do am DHT 11");
do_am, nhiet_do = Adafruit_DHT.read_retry(chon_cam_bien, pin_sensor);
# Open database connection
db = MySQLdb.connect("localhost","root","nightsky","sinhvien" )

# prepare a cursor object using cursor() method
cursor = db.cursor()
# Drop table if it already exist using execute() method.
cursor.execute("DROP TABLE IF EXISTS DEVICE")
# Create table as per requirement
sql = """CREATE TABLE DEVICE (
         THIETBI  CHAR(20) NOT NULL,
         TRANGTHAI FLOAT(3,1))"""

cursor.execute(sql)
sql = "INSERT INTO DEVICE(THIETBI, \
       TRANGTHAI) \
       VALUES ('%s', '%f')" % \
       ('DEN',den_1)
cursor.execute(sql)
sql = "INSERT INTO DEVICE(THIETBI, \
       TRANGTHAI) \
       VALUES ('%s', '%f')" % \
       ('QUAT',den_2)
cursor.execute(sql)
sql = "INSERT INTO DEVICE(THIETBI, \
       TRANGTHAI) \
       VALUES ('%s', '%f')" % \
       ('NHIETDO',nhiet_do)
cursor.execute(sql)
sql = "INSERT INTO DEVICE(THIETBI, \
       TRANGTHAI) \
       VALUES ('%s', '%f')" % \
       ('DOAM',do_am)
try:
   # Execute the SQL command
   cursor.execute(sql)
   # Commit your changes in the database
   db.commit()
except:
   # Rollback in case there is any error
   db.rollback()
# disconnect from server
db.close()

# Ham gui email
def send_email():    
    UserName = "socbay2mee@gmail.com"
    Password = "socbay2me"
    Recipient = "thuanle.ute@gmail.com"
    
    msg = MIMEMultipart()
    msg['From'] = UserName
    msg['To'] = Recipient
    msg['Subject'] = "High temperature detected on " + datetime.now().strftime("%H:%M:%S %d-%m-%Y")
    text = "The house may be burning now. Temperature is: " + str(nhiet_do)
    msg.attach( MIMEText(text) ) 
    
    #part = MIMEBase("application", "octet-stream")
    #fo=open(file,"rb")
    #part.set_payload(fo.read() )
    #Encoders.encode_base64(part)
    #part.add_header('Content-Disposition', 'attachment; filename="%s"'  %os.path.basename(file))
    #msg.attach(part)
 
    s = smtplib.SMTP('smtp.gmail.com:587')
    s.ehlo()
    s.starttls()
    s.login(UserName, Password)
    s.sendmail(UserName, Recipient, msg.as_string())
    s.close()

if nhiet_do > 30:
   send_email()
	
