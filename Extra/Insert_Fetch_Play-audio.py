import mysql.connector


def insert():
    connection = mysql.connector.connect(host='localhost',
                                         database='edi_project',
                                         user='root',
                                         password='')
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

        tupel1 = (56, "Vishal", "A", file_content)
        result = cursor.execute(sql_insert_blob_query, tupel1)
        connection.commit()
        print("Image and file inserted successfully as a BLOB into python_employee table", result)


insert()
print("hello")
