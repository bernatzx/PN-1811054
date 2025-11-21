<?php
declare(strict_types=1);
require_once __DIR__ . "/../db.php";

class ProdukModel
{
  public function insert(array $data)
  {
    global $db;
    $stm = $db->prepare("INSERT INTO tb_produk (nama_produk, harga, stok, gambar) VALUES (:np, :h, :s, :g)");
    $stm->bindParam(":np", $data['nama_produk']);
    $stm->bindParam(":h", $data['harga']);
    $stm->bindParam(":s", $data['stok']);
    $stm->bindParam(":g", $data['gambar']);
    return $stm->execute();
  }

  public function update(int $id, array $data)
  {
    global $db;
    $stm = $db->prepare("UPDATE tb_produk SET nama_produk = :np, harga = :h, stok = :s, gambar = :g WHERE id = :id");
    $stm->bindParam(":id", $id, PDO::PARAM_INT);
    $stm->bindParam(":np", $data['nama_produk']);
    $stm->bindParam(":h", $data['harga']);
    $stm->bindParam(":s", $data['stok']);
    $stm->bindParam(":g", $data['gambar']);
    return $stm->execute();
  }

  public function findByNama(string $nama)
  {
    global $db;
    $stm = $db->prepare("SELECT * FROM tb_produk WHERE nama_produk = :np LIMIT 1");
    $stm->bindParam(":np", $nama);
    $stm->execute();
    return $stm->fetch();
  }

  public function findById(int $id)
  {
    global $db;
    $stm = $db->prepare("SELECT * FROM tb_produk WHERE id = :id LIMIT 1");
    $stm->bindParam(':id', $id, PDO::PARAM_INT);
    $stm->execute();
    return $stm->fetch();
  }

  public function findAll()
  {
    global $db;
    $stm = $db->prepare("SELECT * FROM tb_produk ORDER BY id DESC");
    $stm->execute();
    return $stm->fetchAll();
  }

  public function delete(int $id)
  {
    global $db;
    $stm = $db->prepare("DELETE FROM tb_produk WHERE id = :id");
    $stm->bindParam(':id', $id, PDO::PARAM_INT);
    return $stm->execute();
  }
}