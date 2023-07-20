
##System Requirements

PHP (Version 8.1)
Composer(2.2+)
Git(2+)
Mysql (Version 8.0.33)
1 GB Ram(at least)
Apache Webserver(Version 2.4)

### Project Setup 

-Git clone the repository
-Run composer install to load PHP dependencies to root of project folder

```shell
composer install
```
-Start project by using php server start command on the root of project 

```shell
php -S localhost:8000
```
- Set Base url in index.php in root directory 
define('BASE_URL', 'http://localhost:8000');




