from ibm_watson import SpeechToTextV1
from ibm_cloud_sdk_core.authenticators import IAMAuthenticator
import subprocess
import os
import mysql.connector

try:
    final_path=""
    connection = mysql.connector.connect(host='localhost',database='edi_project',user='root',password='')
    if connection.is_connected():
        cursor = connection.cursor()

        query_1="Select MP3 from edi_tabel where Flag=0"
        cursor.execute(query_1)
        final_res = cursor.fetchone()
        connection.commit()

        path = "C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/Audios/"
        final_path = path+final_res[0]



    apikey = '0u3Djos5CPxUBdNtiVVhbxIBRh3lLgaHhdlJa2LYN9L1'
    url = 'https://api.au-syd.speech-to-text.watson.cloud.ibm.com/instances/f441839c-ff30-4d21-ba6e-b2152375dbc0'

    authenticator = IAMAuthenticator(apikey)
    stt = SpeechToTextV1(authenticator=authenticator)
    stt.set_service_url(url)


    path_des = "C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/audio-chunks/"

    # take wav and covert to mp3

    # subprocess.run(f"ffmpeg -i {path}{input_file} -vn -ar 44100 -ac 2 -b:a 192k {path}{output_file}", shell=True)
    subprocess.run(f"ffmpeg -i {final_path}  -f segment -segment_time 360 -c copy {path_des}%03d.mp3",
                   shell=True)
    # path = 'C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/audio-chunks/'
    # print(path)
    files = []
    for filename in os.listdir(path_des):
        if filename.endswith(".mp3") and filename != 'transcipt.mp3':
            files.append(filename)
    files.sort()

    results = []
    for filename in files:
        print(f"{path_des}{filename}")
        with open(f"{path_des}{filename}", 'rb') as f:
            res = stt.recognize(audio=f, content_type='audio/mp3', model='en-US_Telephony',
                                inactivity_timeout=None).get_result()
            results.append(res)
            print(res)



        # for playing note.wav file
    text = []
    for file in results:
        for result in file['results']:
            text.append(result['alternatives'][0]['transcript'].rstrip() + '.\n')

    # connection = mysql.connector.connect(host='localhost',database='edi_project',user='root',password='')
    # if connection.is_connected():
    #         cursor = connection.cursor(prepared=True)
    #         sql_insert_blob_query = """ INSERT INTO `name`(`ID`, `Name`, `Grade`, `Text`) VALUES (%s,%s,%s,%s)"""
    #         var_string =" "
    #         var = var_string.join(text)
    #         print(var)
    #
    #         tupel1 = (22, "Vishal", "A", var)
    #         result = cursor.execute(sql_insert_blob_query, tupel1)
    #         connection.commit()
    #         print("Image and file inserted successfully as a BLOB into python_employee table", result)
    #         connection.close()

    with open('C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/Out.txt', 'w') as out:
        out.writelines(text)


except:
    print("error")
