<?php
declare(strict_types=1);
require_once __DIR__ . "/../db.php";

class AdminModel
{
  public function insert(array $data)
  {
    global $db;
    $stm = $db->prepare("INSERT INTO tb_admin (username, password, nama_lengkap) VALUES (:un, :ep, :nl)");
    $stm->bindParam(":un", $data['username']);
    $stm->bindParam(":ep", $data['password']);
    $stm->bindParam(":nl", $data['nama_lengkap']);
    return $stm->execute();
  }

  public function findByUname(string $username)
  {
    global $db;
    $stm = $db->prepare("SELECT * FROM tb_admin WHERE username = :e LIMIT 1");
    $stm->bindParam(":e", $username);
    $stm->execute();
    return $stm->fetch();
  }

  public function findAll()
  {
    global $db;
    $stm = $db->prepare("SELECT * FROM tb_admin");
    $stm->execute();
    return $stm->fetchAll();
  }
}