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

# Homework
### Tasks
- [GraphQL. Query] Сделать метод получения игр на распродаже
- [GraphQL. Mutation] Сделать метод “добавить игру в список желаемого”
- [Query] Получить список желаемого.
- Закрыть это всё авторизацией, чтобы можно было изменить только свой список

### Description
- Все запросы к GraphQL требуют Basic-авторизации
- Пример получения игр на распродаже:
```
query {
  gamesOnSale {
    id, 
    sku, 
    name
  }
}
```
- Пример добавление игры в список желаемого:
```
mutation {
  createWish (gameId:1){
    id, 
    sku, 
    name
  }
}
```
- Пример получения списка желаемого:
```
query {
  wishes {
    id, 
    sku, 
    name
  }
}
```
