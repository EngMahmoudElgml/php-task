<?php
namespace Database\Migrations;

require_once __DIR__ . '/../Connection.php';

use Database\Connection;
use Database\BaseMigration;
class UserMigration extends BaseMigration
{
    public function up()
    {
        $this->createTable('users', [
            'id INT AUTO_INCREMENT PRIMARY KEY',
            'email VARCHAR(255) NOT NULL',
            'password VARCHAR(255) NOT NULL',
            'name VARCHAR(255) NOT NULL',
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
        ]);
    }

    public function down()
    {
        $pdo = Connection::make();
        $this->dropTable('users');
    }
}

