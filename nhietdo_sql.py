import MySQLdb

# mo ket noi toi Database
db = MySQLdb.connect("localhost","root","nightsky","sinhvien" )

# chuan bi mot doi tuong cursor boi su dung phuong thuc cursor()
#cursor = db.cursor()

# Xoa bang neu no da ton tai boi su dung phuong thuc execute().
#cursor.execute("DROP TABLE IF EXISTS NHIETDO")

# Tao mot bang
#sql = """CREATE TABLE NHIETDO (CAMBIEN  CHAR(20) NOT NULL,ND FLOAT,DA FLOAT )"""
sqlCommand = "INSERT INTO NHIETDO SET CAMBIEN='%s', ND='%s', DA='%s'" % ('DHT11','11','70')
databaseHelper(sqlCommand,"Insert")
