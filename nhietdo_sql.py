import MySQLdb

# mo ket noi toi Database
db = MySQLdb.connect("localhost","root","nightsky","sinhvien" )

# chuan bi mot doi tuong cursor boi su dung phuong thuc cursor()
cursor = db.cursor()

# Xoa bang neu no da ton tai boi su dung phuong thuc execute().
cursor.execute("DROP TABLE IF EXISTS NHIETDO")

# Tao mot bang
sql = """CREATE TABLE NHIETDO (
         CAMBIEN  CHAR(20) NOT NULL,
		 ND FLOAT,
         DA FLOAT )"""
sql = """INSERT INTO SINHVIEN(CAMBIEN,
         ND,DA)
         VALUES ('DHT11',27,89)"""

try:
   # Thuc thi lenh SQL
   cursor.execute(sql)
   # Commit cac thay doi vao trong Database
   db.commit()
except:
   # Rollback trong tinh huong co bat ky error nao
   db.rollback()

# ngat ket noi voi server
db.close()