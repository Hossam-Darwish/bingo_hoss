
Installation instructions:


The person receiving the project needs to perform the following steps to get the project running on his computer:

1. Install XAMPP:

Download and install XAMPP from the official XAMPP website.

2. Start XAMPP:

Open the XAMPP Control Panel.
Start Apache and MySQL.

3. Import the Database:

Open phpMyAdmin by navigating to http://localhost/phpmyadmin in your browser or press admin button of MySql in the Xampp control panel.
Create a new database with the same name as our original database which is "bingo_hoss".
Select the newly created database.
Click on the "Import" tab.
Choose the SQL file we shared.
Click "Go" to import the database.

4. Extract the Project Files:

Extract the ZIP file into the htdocs directory of your XAMPP installation (e.g., C:\xampp\htdocs\bingo_hoss).

5. Configuration Adjustments:

Ensure that the database configuration in your PHP files matches their environment. Typically, this includes:
Database name
Username (default is root)
Password (default is an empty string)
Host (usually localhost)
For example, in your configuration file (often named config.php, database.php, or something similar):


$hostName = "localhost";
$databaseUsername = "root";
$databasePassword = NULL;
$databaseName = "bingo_hoss";

Make sure these settings reflect their setup.

6. Access the Project:

Open a web browser and navigate to http://localhost/bingo_hoss/admin to access the website.

Summary

Install XAMPP.
Start Apache and MySQL.
Import the database via phpMyAdmin.
Extract the project files to the htdocs directory.
Adjust any necessary configuration settings in the PHP files.
Access the project through http://localhost/bingo_hoss/admin