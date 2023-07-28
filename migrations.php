<?php

require_once __DIR__ . '/Database/BaseMigration.php';
require_once __DIR__ . '/Database/Migrations/create_users_table.php';

use Database\BaseMigration;
use Database\Migrations\UserMigration;

BaseMigration::run(new UserMigration());

echo 'Migration completed successfully!' . PHP_EOL;
