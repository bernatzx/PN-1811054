<?php
declare(strict_types=1);
require_once __DIR__ . "/../models/ProdukModel.php";

class ProdukHandler
{
  private ProdukModel $produk;
  public function __construct()
  {
    $this->produk = new ProdukModel();

    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  public function create(array $data)
  {
    $exists = $this->produk->findByNama($data['nama_produk']);
    if ($exists) {
      return ['success' => false, 'msg' => 'Produk dengan nama tersebut sudah terdaftar!'];
    }
    $created = $this->produk->insert($data);
    if ($created) {
      return ['success' => true, 'msg' => 'Produk berhasil ditambahkan'];
    }
    return ['success' => false, 'msg' => 'Gagal menambahkan produk'];
  }

  public function remove(int $id)
  {
    $exists = $this->produk->findById($id);
    if ($exists && !empty($exists['gambar'])) {
      $path = __DIR__ . "/../../public/uploads/" . $exists['gambar'];
      if (file_exists($path)) {
        unlink($path);
      }
    } else {
      return ['success' => false, 'msg' => 'Produk tidak ditemukan'];
    }
    $removed = $this->produk->delete($id);
    if ($removed) {
      return ['success' => true, 'msg' => 'Produk berhasil dihapus'];
    }
    return ['success' => false, 'msg' => 'Gagal menghapus produk'];
  }

  public function getAll()
  {
    $data = $this->produk->findAll();
    if ($data && count($data) > 0) {
      return ['success' => true, 'data' => $data];
    }
    return ['success' => false, 'msg' => 'Produk belum ada'];
  }

}