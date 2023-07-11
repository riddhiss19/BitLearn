# from ibm_watson import SpeechToTextV1
# from ibm_cloud_sdk_core.authenticators import IAMAuthenticator
import subprocess
import os
import mysql.connector
from speechmatics.models import ConnectionSettings, BatchTranscriptionConfig
from speechmatics.batch_client import BatchClient

try:
    AUTH_TOKEN = "5FpJbmrOQLRGSSreHYiQOmITgeO5Xzku"
    LANGUAGE = "en"

    settings = ConnectionSettings(
        url='https://asr.api.speechmatics.com/v2',
        auth_token=AUTH_TOKEN,
    )

    conf = BatchTranscriptionConfig(
        language=LANGUAGE,
    )

    final_path = ""
    connection = mysql.connector.connect(host='localhost', database='edi_project', user='root', password='')
    if connection.is_connected():
        cursor = connection.cursor(prepared=True)

        query_1 = "Select MP3 from edi_tabel where Flag=0"
        cursor.execute(query_1)
        final_res = cursor.fetchone()
        connection.commit()

        path = "C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/Audios/"
        final_path = path + final_res[0]

    path_des = "C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/audio-chunks/"

    # take wav and covert to mp3

    # subprocess.run(f"ffmpeg -i {path}{input_file} -vn -ar 44100 -ac 2 -b:a 192k {path}{output_file}", shell=True)
    subprocess.run(f"ffmpeg -i {final_path}  -f segment -segment_time 360 -c copy {path_des}%03d.mp3",
                   shell=True)
    # path = 'C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/audio-chunks/'
    # print(path)
    files = []
    for filename in os.listdir(path_des):
        if filename.endswith(".mp3") and filename != 'dhanshree.mp3':
            files.append(filename)
    files.sort()

    results = []
    for filename in files:
        with BatchClient(settings) as client:
            job_id = client.submit_job(
                audio=f"{path_des}{filename}",
                transcription_config=conf,
            )
            print(f'job {job_id} submitted successfully, waiting for transcript')
            transcript = client.wait_for_completion(job_id, transcription_format='txt')
            results.append(transcript)
    
    str1 = ' '.join(results)
    print(str1)
    query_1 = "update edi_tabel set text = %s where Flag=0"
    cursor.execute(query_1, [str1])
    connection.commit()

    with open('C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/Out.txt', 'w') as out:
        out.writelines(results)

except:
    print("error")
