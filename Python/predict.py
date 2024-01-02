import torch
from transformers import AutoTokenizer, AutoModelForSequenceClassification
import torch.nn.functional as F
from flask import Flask, request, jsonify
app = Flask('project')
@app.route('/predict', methods=['POST'])
def predict_endpoint():
    # Get the text from the request
    text = request.json['text']
    
    # Invoke the predict function
    predicted_class, probabilities = predict(text)
    
    # Create a response JSON
    response = {
        'predicted_class': predicted_class,
        'probabilities': probabilities
    }
    
    # Return the response as JSON
    return jsonify(response)    
def predict(text):
    # Load the tokenizer and model
    tokenizer = AutoTokenizer.from_pretrained("aubmindlab/bert-base-arabertv02")
    model = AutoModelForSequenceClassification.from_pretrained("aubmindlab/bert-base-arabertv02",num_labels=4)
    model_path = "proj.pth"
    state_dict = torch.load(model_path, map_location=torch.device("cpu"))
    model.load_state_dict(state_dict)
    model.eval()
    
    # Define the label-to-name mapping
    label_map = {0: 'ptsd', 1: 'ocd', 2: 'depression', 3: 'Aspergus'}
    
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
    
    return predicted_class_name, probabilities.tolist()[0]
if __name__ == '__main__':
    app.run()