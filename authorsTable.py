import csv
import re
id=0
with open('books.csv','r', encoding="utf8") as books,open('output6ct.csv','w',newline='',encoding="utf8") as output6:
	reader=csv.reader(books,delimiter='\t')
	writer=csv.writer(output6,delimiter='\t')
	next(reader)
	writer.writerow(['author_id', 'name'])
	for row in reader:
		if row:
			for author in re.split(r', *', row[3].replace('"', '')):
				id=id+1
				writer.writerow([id,author])