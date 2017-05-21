#!/usr/bin/env python

import os
import sys
import re

def startProcedure ():
	
	with open ('C:/MAMP/htdocs/DBProject/books.csv', 'r') as f:
	
		lineList	= f.readlines()
		
		iCount		= 0
		
		sTmp = 'INSERT INTO BOOK VALUES' + "\n"
					
		for line in lineList:
			
			iCount += 1
			
			record	= line.strip ('\n')
			
			if (iCount == 1):
				
				w = open ('BOOK.sql', 'w') 
				
				w.write (sTmp) 
					
				continue
			
			else:
				
				list	= record.split ('\t')
				
				'''
				list [0] - ISBN 10
				list [1] - ISBN 13
				list [2] - TITLE
				list [3] - AUTHOR
				'''
				
				list [0] = list[0].replace ("&amp", '&').replace ("&lt", '<').replace ("&gt", '>').replace ("-;",'-').replace (";:",'').replace ('"""', '"').replace ("&;", "&").replace (":", "").replace ('\'','\\\'')
				
				list [2] = list[2].replace ("&amp", '&').replace ("&lt", '<').replace ("&gt", '>').replace ("-;",'-').replace (";:",'').replace ('"""', '"').replace ("&;", "&").replace (":", "").replace ('\'','\\\'')
				
				# Remove non ascii characters
				list [0] = re.sub (r'[^\x00-\x7f]',r'',list [0])
				list [2] = re.sub (r'[^\x00-\x7f]',r'',list [2])
				
				list [0] = list [0].strip (' ')
				list [2] = list [2].strip (' ')
					
				sTmp = '(' + "'" + list[0] + "'" + ',' + "'" + list [2] + "'" + ')' + ',' + "\n"
				
				w.write (sTmp) 
				
		w.flush ()
		w.close ()
		
		w = open ('C:/MAMP/htdocs/DBProject/BOOK.sql', 'rb+') 
		
		w.seek (-2,2)
		w.write (b';')
		
		w.flush ()
		w.close ()
		
		sTmp = 'INSERT INTO AUTHORS(NAME) VALUES' + "\n"
		
		iCount = 0
		
		for line in lineList:
			
			iCount += 1
			
			record	= line.strip ('\n')
			
			if (iCount == 1):
				
				w = open ('C:/MAMP/htdocs/DBProject/AUTHORS.sql', 'w') 
				
				w.write (sTmp) 
				
				S = set ()
				
				continue
			
			else:
				
				list	= record.split ('\t')
				
				'''
				list [0] - ISBN 10
				list [1] - ISBN 13
				list [2] - TITLE
				list [3] - AUTHOR
				'''
				
				list [3] = list[3].replace ("&amp", '&').replace ("&lt", '<').replace ("&gt", '>').replace ("-;",'-').replace (";:",'').replace ('"""', '"').replace ("&;", "&").replace (":", "").replace ('\'','\\\'')
				
				# Remove non ascii characters
				list [3] = re.sub (r'[^\x00-\x7f]',r'',list [3])
				list [3] = re.sub (r'$;', r'', list [3])
				
				list [3] = list [3].strip (' ')
				
				authors = re.split ("[,;\t]+", list [3])
				
				if len (authors) > 0:
					
					for k in authors:
						
						if len (k) > 0:
							
							k = k.strip (' ')
							
							S.add (k)
		
		List1 = []
		
		while S:
			
			List1.append (S.pop ())
		
		w2 = open ('C:/MAMP/htdocs/DBProject/BOOK_AUTHORS.sql', 'w') 
		
		w2.write ('INSERT INTO BOOK_AUTHORS VALUES' + "\n")
		
		iCtr	= 0
		
		for key in List1:
			
			idx	= str (List1.index (key) + 1)
			
			sTmp = '(' + "'" + key + "'" + ')' + ',' + "\n"
			
			w.write (sTmp) 
			
			for line in lineList:
				
				record	= line.strip ('\n')
				
				list	= record.split ('\t')
				
				list [3] = list[3].replace ("&amp", '&').replace ("&lt", '<').replace ("&gt", '>').replace ("-;",'-').replace (";:",'').replace ('"""', '"').replace ("&;", "&").replace (":", "").replace ('\'','\\\'')
				
				# Remove non ascii characters
				list [3] = re.sub (r'[^\x00-\x7f]',r'',list [3])
				list [3] = re.sub (r'$;', r'', list [3])
				
				list [3] = list [3].strip (' ')
				
				authors = re.split ("[,;\t]+", list [3])
				
				if len (authors) > 0:
					
					for k in authors:
						
						if len (k) > 0 and k == key:
							
							w2.write ('(' + "'" + idx + "'" + "," + "'" + list [0] + "'" + ')' + ',' + "\n")
		
		w.flush ()
		w.close ()
		
		w2.flush ()
		w2.close ()
		
		w = open ('C:/MAMP/htdocs/DBProject/AUTHORS.sql', 'rb+') 
		
		w.seek (-2,2)
		w.write (b';')
		
		w.flush ()
		w.close ()
		
		w = open ('C:/MAMP/htdocs/DBProject/BOOK_AUTHORS.sql', 'rb+') 
		
		w.seek (-2,2)
		w.write (b';')
		
		w.flush ()
		w.close ()
		
if __name__ == '__main__':

	startProcedure ()
