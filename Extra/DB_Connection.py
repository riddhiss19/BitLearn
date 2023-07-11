import mysql.connector
from mysql.connector import Error
import sys

try:
    connection = mysql.connector.connect(host='localhost',
                                         database='edi_project',
                                         user='root',
                                         password='')
    if connection.is_connected():
        db_Info = connection.get_server_info()
        print("Connected to MySQL Server version ", db_Info)
        cursor = connection.cursor()
        cursor.execute("select database();")
        record = cursor.fetchone()
        print("You're connected to database: ", record)

        sql_select_Query = "select * from name"
        cursor = connection.cursor()
        cursor.execute(sql_select_Query)
        records = cursor.fetchall()

        
        # print("\nPrinting each row")
        # for row in records:
        #     print("Id = ", row[0], )
        #     print("Name = ", row[1])
        #     print("Grade  = ", row[2], "\n")


except Error as e:
    print("Error while connecting to MySQL", e)

# temp = sys.argv[0]
# print(temp)
