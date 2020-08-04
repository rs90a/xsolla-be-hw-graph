# Xsolla summer BE #2 GraphQL

### Setting up an environment
Install composer (for using with php 7.2)
```
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
$ php composer-setup.php --install-dir=bin72 --filename=composer
$ echo "alias composer='php {replace to current dir path}/bin72/composer'" >> ~/.bash_profile
```
### Launch of a local application
You can run **```php -S localhost:```

### How to generate user password?
You can run **```htpasswd -nbBC 10 name password```** command in the terminal

OR
```
$user = "root";
   $hash = password_hash("t00r", PASSWORD_DEFAULT);
```