import mysql.connector
def summarize_text(text, n):
    # Split the text into sentences
    sentences = text.split(".")

    # Calculate the word frequencies
    word_frequencies = {}
    for sentence in sentences:
        words = sentence.split(" ")
        for word in words:
            if word in word_frequencies:
                word_frequencies[word] += 1
            else:
                word_frequencies[word] = 1

    # Calculate the sentence scores
    sentence_scores = {}
    for i, sentence in enumerate(sentences):
        score = 0
        words = sentence.split(" ")
        for word in words:
            if word in word_frequencies:
                score += word_frequencies[word]
        sentence_scores[i] = score

    # Select the top n sentences with the highest scores
    top_sentences = sorted(sentence_scores, key=sentence_scores.get, reverse=True)[:n]
    top_sentences.sort()

    # Construct the summary
    summary = " ".join([sentences[i] for i in top_sentences])

    return summary


# temp = sys.argv[1]

file = open('C:/Users/Vishal/PycharmProjects/EDI_07_Lec-Transcript/Out.txt', 'r')
file_content = file.read()
file.close()

transcript = summarize_text(file_content, 5)
print(transcript)


connection = mysql.connector.connect(host='localhost', database='edi_project', user='root', password='')
if connection.is_connected():
    cursor = connection.cursor(prepared=True)
    sql_query2 = "UPDATE edi_tabel SET Summary= %s ,Flag= 1 WHERE Flag = 0"
    summary_tupel = [transcript]
    result = cursor.execute(sql_query2, summary_tupel)
    connection.commit()
    # print("Sucess Data Inserted")
