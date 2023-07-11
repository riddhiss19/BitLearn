import mysql.connector
import spacy
from spacy.lang.en.stop_words import STOP_WORDS
from string import punctuation
from heapq import nlargest

def summarize(text, per):
    nlp = spacy.load("en_core_web_sm")
    doc = nlp(text)
    tokens = [token.text for token in doc]
    word_frequencies = {}
    for word in doc:
        if word.text.lower() not in list(STOP_WORDS):
            if word.text.lower() not in punctuation:
                if word.text not in word_frequencies.keys():
                    word_frequencies[word.text] = 1
                else:
                    word_frequencies[word.text] += 1
    max_frequency = max(word_frequencies.values())
    for word in word_frequencies.keys():
        word_frequencies[word] = word_frequencies[word] / max_frequency
    sentence_tokens = [sent for sent in doc.sents]
    sentence_scores = {}
    for sent in sentence_tokens:
        for word in sent:
            if word.text.lower() in word_frequencies.keys():
                if sent not in sentence_scores.keys():
                    sentence_scores[sent] = word_frequencies[word.text.lower()]
                else:
                    sentence_scores[sent] += word_frequencies[word.text.lower()]
    select_length = int(len(sentence_tokens) * per)

    summary = nlargest(select_length, sentence_scores, key=sentence_scores.get)
    final_summary = [word.text for word in summary]
    summary = ''.join(final_summary)
    print(summary)

#     if connection.is_connected():
#         cursor = connection.cursor()
#         cursor = connection.cursor(prepared=True)
#         query_1 = "update edi_tabel set Summary=%s,Flag=1 where Flag=0"
#         cursor.execute(query_1, [summary])
#         connection.commit()
#
#
# connection = mysql.connector.connect(host='localhost', database='edi_project', user='root', password='')
# if connection.is_connected():
#     cursor = connection.cursor()
#     query_1 = "select Text,Percentage from edi_tabel where flag=0"
#     cursor.execute(query_1)
#     final_res = cursor.fetchall()
#     connection.commit()

summarize("""What is an operating system? An operating system is a software that acts as an interface between computer hardware components and the user. Every computer system must have at least one operating system to run other programs. Applications like browsers, my office, notepad games, etc. need some involvement to run and perform its tasks. The operating system helps you to communicate with the computer without knowing how to speak the computer's language. It's not possible for the user to any computer or mobile device without having an operating system. History of operating system Operating system were forced to develop in the late 1950s to manage step storage. The General Motors Research Lab implemented the first operating system in the early 1950s for the IBM 701. In the mid 1960s. Operating systems started to use disks in late 1960s, the first version of Linux operating system was developed. The first operating system built by Microsoft was DOS. It was built in 1981 by purchasing the 86 DOS software from a slate company. The present day popular operating system, Windows first came to existence in 1985. But as UI was created and third with a mass loss. But operating system. Some computer processes are very lengthy and time consuming. The speed. The same process. A job with a similar type of needs are best together and run as a group. The use it off badge operating system never directly interacts with the computer in this type of operating system. The user prepares his or her own job on an old friend device like Punch Card and submit it to the computer operator. Multitasking or timesharing operating systems. The sharing operating system enables people locate are different terminals to use a single computer system at a time. The processor time, which is shared among multiple users, is termed as time sharing real time operating system or Real-Time Operating System. Time interval to process and respond to inputs is very small. Examples Military software systems, Space software systems and the realtime Operating System. Example Distributed Operating System. Distributed operating systems use many processors located in different machines to provide a very fast computation to its users. Network operating system. Network operating system runs on a server. It provides the capability to serve to manage data users, groups, security application and other networking functions. Mobile operating system. Mobile operating system are those operating systems which are especially that are designed to power smartphones, tablets and wearable devices. So most famous mobile operating systems are Android and iOS, but other included BlackBerry, Web and watchOS.""",0.5)


