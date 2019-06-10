
import re, requests, bs4

r=requests.get("http://hack.bckdr.in:15108/flag/main.py") #http://hack.bckdr.in:15108/0x48piraj/
text = bs4.BeautifulSoup(r.content, "html.parser").get_text()
flags = re.findall(r'\^(.*?)\$', text)

for i in flags:
 check_html = bs4.BeautifulSoup(requests.get("http://hack.bckdr.in:15108/flag/" + i[:-1]).content, "html.parser").get_text() 
 if "fake flag" not in check_html:
    if "I am gonna destroy you." not in check_html:
        print(check_html)