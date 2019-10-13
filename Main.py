import requests
import datetime
today = datetime.datetime.now()
url = 'http://localhost:8000/api/insert'
myobj = {'card_id': 'somevalue', 'enter_time': today, 'exit_time': today}
x = requests.post(url, data=myobj)
print(x.status_code)
