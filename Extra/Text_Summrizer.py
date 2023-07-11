from sklearn.feature_extraction.text import TfidfVectorizer
from spacy.lang.en import English
import numpy as np
import mysql.connector
from sumy import nlp

def summrize(text_corpus,length):
    nlp = English()
    sentencizer = nlp.add_pipe("sentencizer")

    doc = nlp(text_corpus.replace("\n", ""))
    sentences = [sent.text.strip() for sent in doc.sents]

    sentence_organizer = {k:v for v,k in enumerate(sentences)}


    tf_idf_vectorizer = TfidfVectorizer(min_df=2,  max_features=None,
                                        strip_accents='unicode',
                                        analyzer='word',
                                        token_pattern=r'\w{1,}',
                                        ngram_range=(1, 3),
                                        use_idf=1,smooth_idf=1,
                                        sublinear_tf=1,
                                        stop_words = 'english')
    # Passing our sentences treating each as one document to TF-IDF vectorizer
    tf_idf_vectorizer.fit(sentences)
    sentence_vectors = tf_idf_vectorizer.transform(sentences)

    # Getting sentence scores for each sentences
    sentence_scores = np.array(sentence_vectors.sum(axis=1)).ravel()
    print(sentence_scores)

    # # Sanity checkup
    # print(len(sentences) == len(sentence_scores))

    # Getting top-n sentences
    N = int(length)
    top_n_sentences = [sentences[ind] for ind in np.argsort(sentence_scores, axis=0)[::-1][:N]]
    print(top_n_sentences,sentence_scores)

    mapped_top_n_sentences = [(sentence,sentence_organizer[sentence]) for sentence in top_n_sentences]



    # Ordering our top-n sentences in their original ordering
    mapped_top_n_sentences = sorted(mapped_top_n_sentences, key = lambda x: x[1])
    ordered_scored_sentences = [element[0] for element in mapped_top_n_sentences]

    # Our final summary
    summary = " ".join(ordered_scored_sentences)

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

summrize(final_res[0][0],final_res[0][1])