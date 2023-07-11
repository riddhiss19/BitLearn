Since students struggle to keep up with the massive quantity of material delivered in class or online, the necessity for a summary method for educational content has grown more and more crucial. In this research work, we suggest a method for summarising college lectures that makes use of TF-IDF to provide brief and useful extractive summaries of lectures that are stored in databases for quick and reliable access. Although their widespread use, deep neural networks and nltk alone are unable to satisfy students' present need for simple access to knowledge that is pertinent to their learning objectives in form of summarized format. Observations of the present needs of students and instructors, as well as all available mediums, have guided our design, to utilise the summarization technique together with the extra database functionality to store the summarised text with regard to the specific topic in a segregated manner. Sentence selection is done using the TF-IDF approach, and the produced summaries are stored in a MySQL database. The TF-IDF approach ranks the significance of words in a text according to their frequency of occurrence within and their rarity throughout the full corpus of documents. Speechmatics API is used to convert audio to text. Python libraries for video and audio transcoding include Moviepy and Pydub. The user interface is offered as HTML pages with PHP supporting functions.

![image](https://user-images.githubusercontent.com/89679996/230904439-bdbfde62-f256-4b8e-9e7d-3bf754e4c3dc.png)


![image](https://user-images.githubusercontent.com/89679996/230904851-de94991f-d233-48f9-a010-e29f2e9f8a6c.png)

A.  Pre-processing 

Pre-processing involves turning audio or video files into text. We divide these two sections into halves for user convenience and separate processing. One additional function of wav to mp3 conversion is included in the audio to text part in some circumstances. Speechmatics API receives both the audio file produced from parts. The received JSON data is put into a list and sent to Databased, which serves as the raw data for the summarizer. 

![image](https://user-images.githubusercontent.com/89679996/230905118-b3cf9eee-4116-42f6-b9b7-608238778fc5.png)


B.  Actual Summarization

This stage involves retrieving the stored text from the database and passing it to the TF-IDF vectorizer, where each word is first given weight based on how frequently it appears in the raw data. The algorithm initially determines the most significant words or phrases based on their weights at the same time that the rarity of the token measure word is determined. The summary of the paper is then made using these words or keywords. 

![image](https://user-images.githubusercontent.com/89679996/230905234-9452bc7b-9bd5-4e5f-804d-51b7cc1c3562.png)


C. User Access

A user interface (UI) where students may access all of the tabulated data from their lecture and open the necessary record to analyse it. This has the information arranged according to the subject. Using the lecture name.

![image](https://user-images.githubusercontent.com/89679996/230905692-6762e10c-5254-420f-b72e-0418242bf7d3.png)
     
