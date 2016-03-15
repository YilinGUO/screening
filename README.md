# screening task
This project constructs a dynamic website that will display similar information to
http://web.eecs.umich.edu/~mozafari/php/projects.php

Screen shots of this project could be found at https://github.com/YilinGUO/screening/tree/part2/screenshots.
ER diagram of thie database could be found at https://github.com/YilinGUO/screening/blob/part2/Screening%20Task%20Database%20ER%20Diagram.pdf.


Developed using XAMPP 5.6.8:
- php 5.6.8
- mysql 5.6.24 Community edition

You could create(initialize) and modify the database using the SQL files in https://github.com/YilinGUO/screening/tree/part2/sql.

According to the SQL files I wrote (to initialize the project), the project tables and the table of administrators are stored in a single database "screening". 

In order to sign in to add/update/remove records, you have to click the *login* button on the index page.The username is "guoyilin", and the password is "123456". (Or you can create your own admin table in the database; the admin table is referred to as *UserName* in *check-sign-in.php*)

