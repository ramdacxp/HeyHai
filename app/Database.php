<?php

namespace App;

use \PDO;

class Database
{
  protected string $dsn;
  protected string $user;
  protected string $password;
  protected PDO $pdo;


  public function __construct(string $dsn, string $user, string $password)
  {
    $this->dsn = $dsn;
    $this->user = $user;
    $this->password = $password;
  }

  public function connect()
  {
    $this->pdo = new PDO(
      $this->dsn,
      $this->user,
      $this->password,
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ]
    );
  }

  public function ensureConnection()
  {
    if (! isset($this->pdo)) {
      $this->connect();
    }
  }

  public function getJokes(): array
  {
    $this->ensureConnection();
    $stmt = $this->pdo->query("SELECT * FROM jokes");
    $data = $stmt->fetchAll();
    return $data;
  }
}
