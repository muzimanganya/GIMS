## INSTALLATION FOR DEMO
- Change directory to Installer directory with `cd installer`
- Import the schema with psq with command `sudo -u postgres -i  psql -U postgres -d <database_name> < db.sql`
- Go back to the root project directory and generate demo accounts with command ` php yii migrate/up` type `y` and then enter to generate them

## SETTING UP DATABASE CONFIGURATIONS
You will need to setup database configuration for the project if not done yet.
Create file named `db.php` in folder named `config` and put the following contents
```php
<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=<database_name>',
    'username' => '<username>',
    'password' => '<password>',
    'charset' => 'utf8',
    'schemaMap' => [
        'pgsql' => [
            'class' => 'yii\db\pgsql\Schema',
        ]
    ]
];

```

## TESTING THE CODE
You can now test the code by running under apache server or just using PHP internal server.
Run the server with command `php yii serve`

## WHEN THINGS GOES WRONG
You can drop the database anytime and repeat the process above