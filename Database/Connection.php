<?php

namespace Database;
class Connection
{
    public static function make()
    {
        try {
            return new \PDO('mysql:host=localhost;port=3306;dbname=php_task', 'root', '');
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}