import sys

import mysql.connector
import  os

def insert():
    connection = mysql.connector.connect(host='localhost',database='edi_project',user='root',password='')
    if connection.is_connected():
            cursor = connection.cursor(prepared=True)
            sql_insert_blob_query = "INSERT INTO name (ID, Name, Grade, Text) VALUES (%s,%s,%s,%s)"
            # text = []
            # text.append("Vishal Patil")
            # text.append("Pravin")
            # var_string =" "
            # var = var_string.join(text)

            file = open('/Out.txt', 'r')
            file_content = file.read()
            file.close()

            tupel1 = (0,"Vishal","A",file_content)
            result = cursor.execute(sql_insert_blob_query,tupel1)
            connection.commit()

            cursor.close()

            cursor1 = connection.cursor(buffered=True)

            sql_query = "SELECT Grade FROM name WHERE Flag = 1"
            cursor1.execute(sql_query)
            fetch_pswd = cursor1.fetchone()

            cursor.close()

            cursor2 = connection.cursor(prepared=True)

            sql_query2="UPDATE `name` SET `Text`='Hii Done This And Will Rock Again Tomarrow' WHERE Flag = 1"
            cursor2.execute(sql_query2)


            connection.commit()
            print("Record Inserted", fetch_pswd[0])


insert()
print("Sucess")


