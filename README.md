# tutoTOONS PHP/full-stack developer task

## The app is run on Docker. The app allows a User to upload a CSV file to the website. The code validates if the file is a CSV type and has the right structure. If there are any errors they are printed out to the User. After the import the CSV data is immediately shown in a Boostrap table. It is done with the help oj Ajax using jQuery so the page does not refresh. A User can simply edit the table's columns by pressing a mouse button over a desired cell to edit. The same goes to removing rows - press the 'Delete' button to delete a row. If a User refreshes the page, the newest data is shown in a table, but the old data is still preserved. Maximum of 20 ost recent rows are shown in a table.

### To run the app do these steps:

1. Open the terminal, locate the proejct's root folder 'tuto_toons' and run 'docker-compose build' followed by the 'docker-compose up' command.
2. Create a MySQL connection with the MySQL port: 3311 (if the port is taken, change it in docker-compose.yml file and run the two commands from the 1st step again)
3. Import the tuto_toons.sql file to the MySQL server or copy the code from the tuto_toons.sql file (public_html->sql->tuto_toons.sql) and run it in the SQL query executor in the admin panel.
4. Vuolia! You know have a database, a table with columns configured to accept the right CSV files.
