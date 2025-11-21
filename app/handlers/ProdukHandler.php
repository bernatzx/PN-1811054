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
    $gambar = $this->uploadGambar($data['gambar'] ?? null);
    $data['gambar'] = $gambar;
    $created = $this->produk->insert($data);
    if ($created) {
      return ['success' => true, 'msg' => 'Produk berhasil ditambahkan'];
    }
    return ['success' => false, 'msg' => 'Gagal menambahkan produk'];
  }

  public function change(int $id, array $data)
  {
    $exists = $this->produk->findById($id);
    if (!$exists) {
      return ['success' => false, 'msg' => 'Produk tidak ditemukan'];
    }
    $gambar = $this->uploadGambar($data['gambar'] ?? null, $exists['gambar']);

    if ($gambar === null && !empty($data['gambar']['name'])) {
      return ['success' => false, 'msg' => 'Tipe file tidak didukung atau gagal upload'];
    }

    $data['gambar'] = $gambar;

    $updated = $this->produk->update($id, $data);
    if ($updated) {
      return ['success' => true, 'msg' => 'Produk berhasil diubah'];
    }
    return ['success' => false, 'msg' => 'Produk gagal diubah'];
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

  public function getOne(int $id)
  {
    $data = $this->produk->findById($id);
    if ($data) {
      return ['success' => true, 'data' => $data];
    }
    return ['success' => false, 'msg' => 'Produk tidak ditemukan'];
  }

  public function getAll()
  {
    $data = $this->produk->findAll();
    if ($data && count($data) > 0) {
      return ['success' => true, 'data' => $data];
    }
    return ['success' => false, 'msg' => 'Produk belum ada'];
  }

  function uploadGambar(?array $data, ?string $exists = null): ?string
  {
    if (!$data || empty($data['name'])) {
      return $exists;
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
    $mime = mime_content_type($data['tmp_name']);

    if (!in_array($mime, $allowedTypes)) {
      return null;
    }

    $targetDir = __DIR__ . '/../../public/uploads/';
    if (!is_dir($targetDir)) {
      mkdir($targetDir, 0777, true);
    }

    $filename = time() . '_' . basename($data['name']);
    $targetFile = $targetDir . $filename;

    if (!move_uploaded_file($data['tmp_name'], $targetFile)) {
      return null;
    }
    if ($exists) {
      $oldPath = $targetDir . $exists;
      if (file_exists($oldPath))
        unlink($oldPath);
    }

    return $filename;
  }
}