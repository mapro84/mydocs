import requests
import json

api_key = "env.openai_api_key"

# Define the endpoint URL
url = "https://api.openai.com/v1/engines/davinci/completions"

# Define the prompt
prompt = (
    "coalesce in php?"
)

# Define the parameters for the API call
params = {
    "prompt": prompt,
    "model": "text-davinci-002",
    "max_tokens": 500,
}


# Add the API key to the headers
headers = {"Content-Type": "application/json", "Authorization": f"Bearer {api_key}"}

# Send the POST request to the API endpoint
response = requests.post(url, headers=headers, json=params)

# Print the response
print(json.loads(response.text))
# print(json.loads(response.text)["choices"][0]["text"])
