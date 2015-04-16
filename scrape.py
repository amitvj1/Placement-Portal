from bs4 import BeautifulSoup
import requests

url = "http://www.geeksforgeeks.org/forums/"
con = requests.get(url)
data = con.text
#print(data)
soup = BeautifulSoup(data)
#print(soup)
links = soup.find("li", {"class": "bbp-body"})
#print(links)
for link in links.find_all('a',{"class" : "bbp-topic-permalink"}):
	print(link.get('href'))
	go = link.get('href')
	con = requests.get(go)
	par = BeautifulSoup(con.text)
	hold = par.findAll("div",{"class" : "bbp-reply-content"})[1]
	#print(hold)
	for i in hold.find_all("p"):
		print(i.text)
	print("----------------------------------------------------------------------")
	#break