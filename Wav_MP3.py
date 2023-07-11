# # import subprocess
# # # converting mp3 to wav file
# # subprocess.call(['"C:/Program_PATH/ffmpeg.exe"', '-i', 'Audios/Recursion_sample.mp3', 'Audio_Wav/Recursion_sample.wav'])
# import mysql.connector
#
# try:
#     final_res = ""
#     connection = mysql.connector.connect(host='localhost', database='edi_project', user='root', password='')
#     if connection.is_connected():
#         cursor = connection.cursor()
#
#         query_1 = "Select MP4 from name where Flag=1"
#         cursor.execute(query_1)
#         final_res = cursor.fetchone()
#         connection.commit()
#
#         IP_DIR = "C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/Video/"
#         ext = ".mp4"
#         final_IP_Path = IP_DIR + final_res[0]+ ext
#         print(final_IP_Path)
#
#         OP_DIR = "C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/Audios/"
#         text= final_res[0].split(".")
#         final_OP_Path = OP_DIR + text[0] + ".mp3"
#         print(final_OP_Path)
#
#
#         connection.close()
#
# except:
#     print("error")

import os
import subprocess
import sys
import mysql.connector
from pydub import AudioSegment

final_res = ""
connection = mysql.connector.connect(host='localhost', database='edi_project', user='root', password='')
if connection.is_connected():
        cursor = connection.cursor()

        query_1 = "Select wav from edi_tabel where Flag=0"
        cursor.execute(query_1)
        final_res = cursor.fetchone()
        connection.commit()

        wavdir= "C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/Audio_Wav/"
        wavfile = wavdir+final_res[0]


        mp3dir ="C:/Users/Vishal/PycharmProjects/EDI_07_" \
                "Lec-Transcript/Audios/"
        ext1 = ".mp3"
        text = final_res[0].split(".")
        mp3file= mp3dir+text[0]+".mp3"


        # command =""
        # subprocess.run(f"ffmeg -i {wavfile} -vn -ar 44100 -ac 2 -b:a 192k {mp3file}.mp3")

        sound = AudioSegment.from_wav(f"{wavfile}")
        sound.export(f"{mp3file}", format='mp3')

        cursor = connection.cursor(prepared=True)

        query_1 = "update edi_tabel set MP3 = %s where Flag=0"
        passvar = [text[0]+".mp3"]
        cursor.execute(query_1,passvar)
        final_res = cursor.fetchone()
        connection.commit()

