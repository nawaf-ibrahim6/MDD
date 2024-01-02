import torch
from transformers import AutoTokenizer, AutoModelForSequenceClassification

# Load the tokenizer and model
tokenizer = AutoTokenizer.from_pretrained("aubmindlab/bert-base-arabertv02")
model = AutoModelForSequenceClassification.from_pretrained("aubmindlab/bert-base-arabertv02",num_labels=4)
model_path = "proj.pth"
state_dict = torch.load(model_path, map_location=torch.device("cpu"))
model.load_state_dict(state_dict)
model.eval()
import torch.nn.functional as F

# Define the label-to-name mapping
label_map = {0: 'ptsd', 1: 'ocd', 2: 'depression', 3: 'Aspergus'}

# Define a sample input text
text = "قال لي الطبيب انني لا اعاني من اي مرض"

# Tokenize the input text
input_ids = tokenizer.encode(text, add_special_tokens=True, return_tensors="pt")

# Make a prediction
with torch.no_grad():
    outputs = model(input_ids)
    logits = outputs[0]
    predicted_class = torch.argmax(logits, dim=1)
    probabilities = F.softmax(logits, dim=1)

# Map the predicted class index to its corresponding name
predicted_class_index = predicted_class.item()
predicted_class_name = label_map[predicted_class_index]

# Print the predicted class and probabilities
print("Predicted class:", predicted_class_name)
print("Class probabilities:", probabilities.tolist()[0])