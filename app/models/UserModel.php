<?php
declare(strict_types=1);
require_once __DIR__ . "/../db.php";

class UserModel
{
  public function insert(array $data)
  {
    global $db;
    $stm = $db->prepare("INSERT INTO tb_pelanggan (nama_lengkap, email, password) VALUES (:nl, :e, :p)");
    $stm->bindParam(":nl", $data['nama_lengkap']);
    $stm->bindParam(":e", $data['email']);
    $stm->bindParam(":p", $data['password']);
    return $stm->execute();
  }

  public function findByEmail(string $email)
  {
    global $db;
    $stm = $db->prepare("SELECT * FROM tb_pelanggan WHERE email = :e LIMIT 1");
    $stm->bindParam(":e", $email);
    $stm->execute();
    return $stm->fetch();
  }

  public function findAll()
  {
    global $db;
    $stm = $db->prepare("SELECT nama_lengkap, email, alamat, nohp FROM tb_pelanggan");
    $stm->execute();
    return $stm->fetchAll();
  }

  public function findById(int $id)
  {
    global $db;
    $stm = $db->prepare("SELECT * FROM tb_pelanggan WHERE id = :id LIMIT 1");
    $stm->bindParam(":id", $id, PDO::PARAM_INT);
    $stm->execute();
    return $stm->fetch();
  }

  public function update(int $id, array $data)
  {
    global $db;
    $stm = $db->prepare("UPDATE tb_pelanggan SET nama_lengkap = :nl, email = :e, alamat = :a, nohp = :np WHERE id = :id");
    $stm->bindParam(":id", $id, PDO::PARAM_INT);
    $stm->bindParam(":nl", $data['nama_lengkap']);
    $stm->bindParam(":e", $data['email']);
    $stm->bindParam(":a", $data['alamat']);
    $stm->bindParam(":np", $data['nohp']);
    return $stm->execute();
  }
}