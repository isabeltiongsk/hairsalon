# About this application

This is an assignment for Coventry University Final Year Project<br>
by Isabel Tiong. <br>
### Definition
This is a **web-based management appplication** built for a hairsalon.<br>
For further detailed about this application, please refer to **FYP_report.pdf** <br>
### Screenshots of application
![alt text](https://github.com/isabeltiongsk/hairsalon/blob/master/demo/welcome.JPG) <br>
![alt text](https://github.com/isabeltiongsk/hairsalon/blob/master/demo/payment2.JPG) <br>
![alt text](https://github.com/isabeltiongsk/hairsalon/blob/master/demo/logout.JPG) <br>
## Features
* Admin Login
* Appointment booking schedule
* Payment systen
* Staff CRUD
* Sales CRUD (seperated into product & service)
* Sales report<br>
For user manual for features, please refer to **page 30** in the [Project Report](https://github.com/isabeltiongsk/hairsalon/blob/master/FYP_report.pdf). <br>
## How to install
*Download all codes from master branch
* Extract files to local if you downloaded the zip file
* Connect your server
* Login into your PhpMyAdmin and added three new databases named 'calendar' 'hairsalondb' 'registration'
* Open the SQL folder, input the sql files into each database (for example calendar.sql > calendar database)
* Run index.php <br>
<br>
## Extension Not Working?
 
### Error messages showing database is not connected
* Check spelling correction of your database name, it should be ‘calendar’, ‘registration’ and ‘hairsalondb’, make sure that you insert the correct SQL files into the databases.
* Check database user account information, this software is using the default user account, which is:<br>
Hostname: localhost <br>
Username: root <br>
Password: (none)<br>
* If you are not using the same as above, please switch to the default user account in your database.<br>
or you can change the code from **bdd.php**<br>
```bash
$bdd = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');
``` 
### Error messages regarding 'mysqli'
Check your PHP version, make sure that it is version 5.6 or above.<br>
### Cannot find page
Try a different port from your server. <br>
<br>
The above solution should have solved any possible errors, if the application still cannot run, please contact isabeltiongsk@gmail.com <br>

