import csv
with open('borrowers.csv','r',encoding="utf8") as borrowers,open('output10.csv','w',newline='', encoding="utf8") as output:
	reader=csv.reader(borrowers,delimiter=',')
	writer=csv.writer(output,delimiter=',')
	next(reader)
	writer.writerow(['card_id','ssn', 'fname','lname','address','phone'])
	for row in reader:
			writer.writerow([row[0],row[1].replace('-',''),row[2],row[3],row[5],row[8].replace('(','').replace(')','').replace(' ','').replace('-','')])