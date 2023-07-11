import oneai

oneai.api_key = keys.oneai_api_key

your_input = "summarize this text"

pipeline = oneai.Pipeline(steps=[
# summarize inputs, with at most 20 words
oneai.skills.Summarize(max_length=20),
])

output = pipeline.run(your_input)
print(output.summary.text)