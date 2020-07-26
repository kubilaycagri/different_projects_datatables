dynamic-datatables
========

## Installing

This package can be installed with composer:

```
composer require kcy/dynamic-datatables

config.app add line ---> Kcy\DynamicDatatables\DatatablesKcyServiceProvider::class,
```

## Requirements

- PHP 5.5+ or PHP 7+
- [Composer](https://getcomposer.org/)

## Usage

```php
$table_cols = ["col_name1","col_name2"];
$sql = "select * from table_name";
$servername = "localhost";
$dbname = "db_name";
$dsn = "mysql:host=" . $servername . ";dbname=" . $dbname;
$user = 'user_name';
$password = 'user_pass';

$pdo = new ConnectionDB($dsn, $user, $password);
$result = $pdo->sqlExec($sql);
$server_side_list = new DatatableGenerator();
return $server_side_list->simpleTableGenerate($table_cols, $result);
```
