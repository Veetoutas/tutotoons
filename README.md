# tutoTOONS PHP/full-stack developer task

-------------------
### To RUN the app:
1. Open the terminal, locate the project's root folder and run 'docker-compose build' followed by the 'docker-compose up' command.
2. Create a MySQL connection with the MySQL port: 3311 (if the port is taken, change it in docker-compose.yml file and run the two commands from the 1st step again)
3. Import the tuto_toons.sql file to the MySQL server or copy the code from the tuto_toons.sql file (public_html->sql->tuto_toons.sql) and run it in the SQL query executor in the admin panel.
4. Vuolia! You now have a Database and a table with columns configured to accept the right CSV files.

-------------------
### App features: 
1. CSV file's validation and import to the Database using AJAX
2. Immediate data refresh using AJAX
3. Cells editing and rows deletion using AJAX
4. Shows 20 most recent rows while preserving the old data at the DB

-------------------
### Personal takeaways: 
1. This task was quite challenging for me as I had no previous experience with AJAX, but I loved it. I've learned a lot.
2. The 'import.php' file looks terrible. The 'IFs' nesting, not much of a reusable code there and also quite hard to read at first.
I am not going to plead myself, but since it was my first time doing some of the things I've done in this task, I think it is ok 
to leave some room for improvement. I will definitely improve this project for myself in the near future to become a better developer.


