<?php
declare(strict_types=1);
require_once __DIR__ . "/../models/PesananModel.php";

class PesananHandler
{
  private PesananModel $pesanan;
  public function __construct()
  {
    $this->pesanan = new PesananModel();

    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  public function create(array $data)
  {
    if (!isset($_SESSION['userID'])) {
      return ["success" => false, "msg" => "Anda belum login"];
    }

    $id_pelanggan = $_SESSION['userID'];
    $cart = $data["cart"] ?? [];
    $total = $data["total"] ?? 0;

    if (empty($cart)) {
      return ["success" => false, "msg" => "Keranjang kosong"];
    }

    $created = $this->pesanan->insert($id_pelanggan, $cart, $total);
    if ($created) {
      return ['success' => true, 'msg' => 'Transaksi berhasil'];
    }
    return ['success' => false, 'msg' => 'Gagal melakukan transaksi'];
  }

  public function getAll()
  {
    $role = $_SESSION['role'] ?? null;
    $userID = $_SESSION['userID'] ?? null;
    $data = $this->pesanan->findAll($role, $userID);
    if ($data && count($data) > 0) {
      return ['success' => true, 'data' => $data];
    }
    return ['success' => false, 'msg' => 'Pesanan belum ada'];
  }
}