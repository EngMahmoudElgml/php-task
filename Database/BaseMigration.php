<?php

namespace Database;

abstract class BaseMigration
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Connection::make();
    }

    abstract public function up();

    abstract public function down();

    public static function run($migration)
    {
        $migration->up();
    }

    public function createTable($tableName, $fields)
    {
        $fieldsSql = implode(',', $fields);
        $sql = "CREATE TABLE $tableName ($fieldsSql)  ENGINE=INNODB;";
        $this->pdo->exec($sql);
    }

    public function dropTable($tableName)
    {
        $sql = "DROP TABLE $tableName;";
        $this->pdo->exec($sql);
    }

    public function addColumn($tableName, $columnName, $type)
    {
        $sql = "ALTER TABLE $tableName ADD COLUMN $columnName $type;";
        $this->pdo->exec($sql);
    }

    public function dropColumn($tableName, $columnName)
    {
        $sql = "ALTER TABLE $tableName DROP COLUMN $columnName;";
        $this->pdo->exec($sql);
    }

    public function renameColumn($tableName, $oldColumnName, $newColumnName, $type)
    {
        $sql = "ALTER TABLE $tableName CHANGE $oldColumnName $newColumnName $type;";
        $this->pdo->exec($sql);
    }

    public function addForeignKey($tableName, $columnName, $foreignTableName, $foreignColumnName)
    {
        $sql = "ALTER TABLE $tableName ADD FOREIGN KEY ($columnName) REFERENCES $foreignTableName($foreignColumnName);";
        $this->pdo->exec($sql);
    }

    public function dropForeignKey($tableName, $foreignKeyName)
    {
        $sql = "ALTER TABLE $tableName DROP FOREIGN KEY $foreignKeyName;";
        $this->pdo->exec($sql);
    }

    public function addIndex($tableName, $columnName)
    {
        $sql = "ALTER TABLE $tableName ADD INDEX ($columnName);";
        $this->pdo->exec($sql);
    }

    public function dropIndex($tableName, $indexName)
    {
        $sql = "ALTER TABLE $tableName DROP INDEX $indexName;";
        $this->pdo->exec($sql);
    }
}