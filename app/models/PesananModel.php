<?php
declare(strict_types=1);
require_once __DIR__ . "/../db.php";

class PesananModel
{
  public function findAll(?string $role, ?string $userID)
  {
    global $db;
    if ($role === "admin") {
      $stm = $db->prepare("
                SELECT t.*, p.nama_lengkap 
                FROM tb_transaksi t
                JOIN tb_pelanggan p ON p.id = t.id_pelanggan
                ORDER BY t.id DESC
            ");
      $stm->execute();
      return $stm->fetchAll();
    }
    $stm = $db->prepare("
            SELECT t.*, p.nama_lengkap 
            FROM tb_transaksi t
            JOIN tb_pelanggan p ON p.id = t.id_pelanggan
            WHERE t.id_pelanggan = :uid
            ORDER BY t.id DESC
        ");
    $stm->bindParam(':uid', $userID, PDO::PARAM_INT);
    $stm->execute();

    return $stm->fetchAll();
  }

  public function insert($id_pelanggan, $cart, $total)
  {
    $success = false;
    global $db;
    try {
      $db->beginTransaction();
      $stm = $db->prepare("INSERT INTO tb_transaksi (id_pelanggan, tanggal_transaksi, total_harga, status) VALUES (:ip, NOW(), :tt, 'pending')");
      $stm->execute([
        ':ip' => $id_pelanggan,
        ':tt' => $total
      ]);

      $id_transaksi = $db->lastInsertId();

      foreach ($cart as $item) {
        $stm = $db->prepare("INSERT INTO tb_detail_transaksi (id_transaksi, id_produk, jumlah, harga_satuan, subtotal) VALUES (:it, :ipro, :j, :hs, :st)");
        $stm->execute([
          ':it' => $id_transaksi,
          ':ipro' => $item['id'],
          ':j' => $item['qty'],
          ':hs' => $item['harga'],
          ':st' => $item['qty'] * $item['harga']
        ]);

        $stm = $db->prepare("UPDATE tb_produk SET stok = stok - :s WHERE id = :id");
        $stm->execute([
          ':id' => $item['id'],
          ':s' => $item['qty']
        ]);
      }
      $db->commit();
      $success = true;
    } catch (\Throwable $th) {
      $db->rollBack();
      $success = false;
    }
    return $success;
  }
}