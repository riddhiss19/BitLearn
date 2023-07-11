from speechmatics.models import ConnectionSettings, BatchTranscriptionConfig
from speechmatics.batch_client import BatchClient

AUTH_TOKEN = "u3AKXJebHC1zV4GUihzz1Ri5X1nZlc90"
PATH_TO_FILE = "C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/Audios/array.mp3"
LANGUAGE = "en"

settings = ConnectionSettings(
    url='https://asr.api.speechmatics.com/v2',
    auth_token=AUTH_TOKEN,
)

# Define transcription parameters
conf = BatchTranscriptionConfig(
    language=LANGUAGE,
)

# Open the client using a context manager
with BatchClient(settings) as client:
    job_id = client.submit_job(
        audio=PATH_TO_FILE,
        transcription_config=conf,
    )
    print(f'job {job_id} submitted successfully, waiting for transcript')
    transcript = client.wait_for_completion(job_id, transcription_format='txt')
    print(transcript)