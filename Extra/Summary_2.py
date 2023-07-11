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
    #print(summary)

    if connection.is_connected():
        cursor = connection.cursor()
        cursor = connection.cursor(prepared=True)
        query_1 = "update edi_tabel set Summary=%s,Flag=1 where Flag=0"
        cursor.execute(query_1, [summary])
        connection.commit()


connection = mysql.connector.connect(host='localhost', database='edi_project', user='root', password='')
if connection.is_connected():
    cursor = connection.cursor()
    query_1 = "select Text,Percentage from edi_tabel where flag=0"
    cursor.execute(query_1)
    final_res = cursor.fetchall()
    connection.commit()


summarize(final_res[0][0],float(final_res[0][1]))


