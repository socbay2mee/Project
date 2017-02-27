import MySQLdb
import Adafruit_DHT
import RPi.GPIO as GPIO
import time

# Adafruit_DHT ho tro nhieu loai cam bien DHT, o day dung DHT11 nen chon cam bien  DHT11
chon_cam_bien = Adafruit_DHT.DHT11
GPIO.setmode(GPIO.BCM)
pin_sensor = 14

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
         TRANGTHAI FLOAT(4,2))"""

cursor.execute(sql)
sql = "INSERT INTO DEVICE(THIETBI, \
       TRANGTHAI) \
       VALUES ('%s', '%f')" % \
       ('DEN',0)
cursor.execute(sql)
sql = "INSERT INTO DEVICE(THIETBI, \
       TRANGTHAI) \
       VALUES ('%s', '%f')" % \
       ('QUAT',0)
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
