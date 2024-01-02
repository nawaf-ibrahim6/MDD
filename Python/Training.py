import torch

# Check if GPUs are available
if torch.cuda.is_available():

    # Set the device to GPU
    device = torch.device('cuda')

    # Print information about the available GPUs
    print("Using device:", device)
    for i in range(torch.cuda.device_count()):
        print(torch.cuda.get_device_name(i))

else:
    # Set the device to CPU
    device = torch.device('cpu')
    print("Using device:", device)   




import pandas as pd
import numpy as np

from tqdm import tqdm_notebook as tqdm
from sklearn.model_selection import train_test_split
all_datasets= []

class Dataset:
    def __init__(
        self,
        name,
        train,
        test,
        label_list,
    ):
        self.name = name
        self.train = train
        self.test = test
        self.label_list = label_list


DATA_COLUMN = "Diagnosis"
LABEL_COLUMN= "Mental Disorder"



df_HARD = pd.read_csv("dataset.csv" )

df_HARD = df_HARD[["Column1","Column2"]]  # we are interested in rating and review only
df_HARD.columns = [DATA_COLUMN, LABEL_COLUMN]
print(df_HARD[LABEL_COLUMN].value_counts())
# code rating as +ve if > 3, -ve if less, no 3s in dataset

hard_map = {
    5: 'PTSD',
    4: 'OCD',
    3: 'Depression',
    2: 'AS'
}

df_HARD[LABEL_COLUMN] = df_HARD[LABEL_COLUMN].apply(lambda x: hard_map[x])
train_HARD, test_HARD = train_test_split(df_HARD, test_size=0.2, random_state=42)
label_list_HARD = ['PTSD', 'OCD','Depression',"AS"]

data_Hard = Dataset("data", train_HARD, test_HARD, label_list_HARD)
all_datasets.append(data_Hard)




from arabert.preprocess import ArabertPreprocessor
import numpy as np
from sklearn.metrics import classification_report, accuracy_score, f1_score, confusion_matrix, precision_score , recall_score

from transformers import AutoConfig, AutoModelForSequenceClassification, AutoTokenizer, BertTokenizer
from transformers.data.processors import SingleSentenceClassificationProcessor
from transformers import Trainer , TrainingArguments , EarlyStoppingCallback
from transformers.trainer_utils import EvaluationStrategy
from transformers.data.processors.utils import InputFeatures
from torch.utils.data import Dataset
from torch.utils.data import DataLoader
from sklearn.utils import resample
import logging
import torch
import optuna



for x in all_datasets:
  print(x.name)

dataset_name = 'data'
model_name = 'aubmindlab/bert-base-arabertv02'
task_name = 'classification'
max_len = 400

for d in all_datasets:
  if d.name==dataset_name:
    selected_dataset = d
    print('Dataset found')
    break
    
    
    
arabert_prep = ArabertPreprocessor(model_name.split("/")[-1])

selected_dataset.train[DATA_COLUMN] = selected_dataset.train[DATA_COLUMN].apply(lambda x:   arabert_prep.preprocess(x))
selected_dataset.test[DATA_COLUMN] = selected_dataset.test[DATA_COLUMN].apply(lambda x:   arabert_prep.preprocess(x))  



class BERTDataset(Dataset):
    def __init__(self, text, target, model_name, max_len, label_map):
      super(BERTDataset).__init__()
      self.text = text
      self.target = target
      self.tokenizer_name = model_name
      self.tokenizer = AutoTokenizer.from_pretrained(model_name)
      self.max_len = max_len
      self.label_map = label_map
      

    def __len__(self):
      return len(self.text)

    def __getitem__(self,item):
      text = str(self.text[item])
      text = " ".join(text.split())


        
      input_ids = self.tokenizer.encode(
          text,
          add_special_tokens=True,
          max_length=self.max_len,
          truncation='longest_first'
      )     
    
      attention_mask = [1] * len(input_ids)

      # Zero-pad up to the sequence length.
      padding_length = self.max_len - len(input_ids)
      input_ids = input_ids + ([self.tokenizer.pad_token_id] * padding_length)
      attention_mask = attention_mask + ([0] * padding_length)    
      
      return InputFeatures(input_ids=input_ids, attention_mask=attention_mask, label=self.label_map[self.target[item]])

    
    
    
label_map = { v:index for index, v in enumerate(selected_dataset.label_list) }
print(label_map)
train_dataset = BERTDataset(selected_dataset.train[DATA_COLUMN].to_list(),selected_dataset.train[LABEL_COLUMN].to_list(),model_name,max_len,label_map)
test_dataset = BERTDataset(selected_dataset.test[DATA_COLUMN].to_list(),selected_dataset.test[LABEL_COLUMN].to_list(),model_name,max_len,label_map)



from transformers import BertConfig, AutoModelForSequenceClassification

def model_init():
    config = BertConfig.from_pretrained('aubmindlab/bert-base-arabertv02', num_labels=len(label_map))
    config.hidden_dropout_prob = 0.2
    config.attention_probs_dropout_prob = 0.2
    config.dropout = 0.3
    return AutoModelForSequenceClassification.from_pretrained('aubmindlab/bert-base-arabertv02', config=config)




ns=model_init()



for name, param in ns.named_parameters():
     print(name, param.requires_grad)

        
        
        
for name, param in ns.named_parameters():
  if name.startswith("bert.encoder.layer.0"):
    param.requires_grad = True
  if name.startswith("bert.encoder.layer.1"):
    param.requires_grad = True
  if name.startswith("bert.encoder.layer.2"):
    param.requires_grad = True
  if name.startswith("bert.encoder.layer.3"):
    param.requires_grad = True
  if name.startswith("bert.encoder.layer.4"):
    param.requires_grad = True
  if name.startswith("bert.encoder.layer.5"):
    param.requires_grad = True
  if name.startswith("bert.encoder.layer.6"):
    param.requires_grad = True
  if name.startswith("bert.encoder.layer.7"):
    param.requires_grad = True
  if name.startswith("bert.encoder.layer.8"):
    param.requires_grad = True
  if name.startswith("bert.encoder.layer.9"):
    param.requires_grad = True
  if name.startswith("bert.encoder.layer.10"):
    param.requires_grad = True
  if name.startswith("bert.encoder.layer.11"):
    param.requires_grad = True
    
    
    
    
def compute_metrics(p): #p should be of type EvalPrediction
  preds = np.argmax(p.predictions, axis=1)
  assert len(preds) == len(p.label_ids)
  #print(classification_report(p.label_ids,preds))
  #print(confusion_matrix(p.label_ids,preds))

  macro_f1_pos_neg = f1_score(p.label_ids,preds,average='macro',labels=[0,1,2,3])
  macro_f1 = f1_score(p.label_ids,preds,average='macro')
  macro_precision = precision_score(p.label_ids,preds,average='macro')
  macro_recall = recall_score(p.label_ids,preds,average='macro')
  acc = accuracy_score(p.label_ids,preds)
  return {
      'macro_f1' : macro_f1,
      'macro_f1_pos_neg' : macro_f1_pos_neg,  
      'macro_precision': macro_precision,
      'macro_recall': macro_recall,
      'accuracy': acc
  }



training_args = TrainingArguments("./train")
training_args.evaluate_during_training = True
training_args.adam_epsilon = 1e-8
training_args.learning_rate = 5e-5
training_args.weight_decay=0.001
training_args.fp16 = True
training_args.per_device_train_batch_size = 8
training_args.per_device_eval_batch_size = 16
training_args.gradient_accumulation_steps = 2
training_args.num_train_epochs= 10
training_args.save_strategy='best'
training_args.load_best_model_at_end=True
torch.cuda.empty_cache()
training_args.metric_for_best_model='eval_loss'
steps_per_epoch = (len(selected_dataset.train)// (training_args.per_device_train_batch_size * training_args.gradient_accumulation_steps))
total_steps = steps_per_epoch * training_args.num_train_epochs
print(steps_per_epoch)
print(total_steps)
#Warmup_ratio
warmup_ratio = 0.1
training_args.warmup_steps = total_steps*warmup_ratio # or you can set the warmup steps directly 

training_args.evaluation_strategy = EvaluationStrategy.EPOCH
# training_args.logging_steps = 200
training_args.save_steps = 100000 #don't want to save any model, there is probably a better way to do this :)
training_args.seed = 42
training_args.disable_tqdm = False
training_args.lr_scheduler_type = 'cosine'




trainer = Trainer(
    model = ns,
    args = training_args,
    train_dataset = train_dataset,
    eval_dataset=test_dataset,
    compute_metrics=compute_metrics,
    callbacks=[EarlyStoppingCallback(early_stopping_patience=2)]
)




trainer.train()
torch.save(ns.state_dict(), 'ns.pth')