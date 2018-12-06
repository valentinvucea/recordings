## Music database catalog

Front-end and backend for the Anglican Collection of Sacred Music Recordings created by Hayden Wetzel.

Requirements: PHP 5.6 (not working with PHP 7.x), MySQL/MariaDB

## Installation steps

### 1. Get the code
Clone this repository on your webserver.
```bash
git clone https://github.com/valentinvucea/recordings.git
```
### 2. Set up webserver config
The webserver should have enabled mod_rewrite. Also, the document root should point to app/webroot folder. Below is an example of a virtual host file for Apache 2.2:
```bash
<VirtualHost *:80>
    ServerAdmin administrator@music-catalog.com
    DocumentRoot "/var/www/html/recordings/app/webroot/"
    ServerName www.music-catalog.com
    ServerAlias music-catalog.com

    <Directory "/var/www/html/recordings/app/webroot">
        AllowOverride All
        Options FollowSymlinks
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
```
Restart the webserver after this configuration change.

### 3. Setting up permissions
Give recursive write permissions for /app/tmp folder. Example:
```bash
chmod -R 750 /var/www/html/recordings/app/tmp
```
### 4. Set up the database
Create a new MySQL database with UTF-8 collation. Create a dedicated user for accessing the database with the appropiate permissions for CRUD opperations. Populate the database from the dump sql file found at /db/recordings.zip using the command line or a MySQL GUI tool.

Update the application configuration for database under /app/Config/database.php

### 5. Access the application
Restart the webserver and in your browser go to the URL specified at step 2.

Enjoy!