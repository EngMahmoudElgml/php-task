<?php
namespace Models;

require_once __DIR__ . '/../Database/Connection.php';

use Database\Connection;

class Model
{
    protected $table;
    protected $connection;

    public function __construct()
    {
        $this->connection = Connection::make();
    }

    public function all()
    {
        $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }

    public function find($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $statement->execute(['id' => $id]);
        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function create($data)
    {
        $statement = $this->connection->prepare("INSERT INTO {$this->table} (name, email, password) VALUES (:name, :email, :password)");
        $statement->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }

    public function update($id, $data)
    {
        $statement = $this->connection->prepare("UPDATE {$this->table} SET name = :name, email = :email, password = :password WHERE id = :id");
        $statement->execute([
            'id' => $id,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }

    public function delete($id)
    {
        $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $statement->execute(['id' => $id]);
    }
}