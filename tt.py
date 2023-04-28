import mysql.connector
import openpyxl

# Connect to the MySQL database
cnx = mysql.connector.connect(user='root', password='root', host='localhost', database='isp')
cursor = cnx.cursor()

# Query the database for the desired columns
query = "SELECT ID, department, env, users FROM requestinfo"
cursor.execute(query)
result = cursor.fetchall()
column_names = [i[0] for i in cursor.description]

# Connect to the Excel workbook
workbook = openpyxl.load_workbook('test.xlsx')
worksheet = workbook.active

# Insert the column names into the Excel sheet
worksheet.append(column_names)

# Insert the query result into the Excel sheet
for row in result:
    worksheet.append(row)

# Save the changes to the Excel workbook
workbook.save('final.xlsx')








