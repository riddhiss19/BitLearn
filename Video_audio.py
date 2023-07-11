# Python code to convert video to audio
import sys
import os
import moviepy.editor as mp
import mysql.connector

try:
    final_res = ""
    connection = mysql.connector.connect(host='localhost', database='edi_project', user='root', password='')
    if connection.is_connected():
        cursor = connection.cursor()

        query_1 = "Select MP4 from edi_tabel where Flag=0"
        cursor.execute(query_1)
        final_res = cursor.fetchone()
        connection.commit()

        IP_DIR = "C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/Video/"
        final_IP_Path = IP_DIR + final_res[0]


        OP_DIR = "C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/Audios/"
        text = final_res[0].split(".")
        final_OP_Path = OP_DIR + text[0] + ".mp3"


        clip = mp.VideoFileClip(fr"{final_IP_Path}")

        clip.audio.write_audiofile(fr"{final_OP_Path}")

        cursor = connection.cursor(prepared=True)
        query_1 = "update edi_tabel set MP3 = %s where Flag=0"
        passvar = [text[0] + ".mp3"]
        cursor.execute(query_1, passvar)
        final_res = cursor.fetchone()
        connection.commit()




except:
    print("error")
