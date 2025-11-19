<?php
declare(strict_types=1);
require_once __DIR__ . "/../models/UserModel.php";

class UserHandler
{
  private UserModel $user;
  public function __construct()
  {
    $this->user = new UserModel();

    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  public function reg(array $data)
  {
    if ($data['password'] != $data['confirm-password']) {
      return ['success' => false, 'msg' => 'Password dan konfirmasi tidak cocok'];
    }

    $exists = $this->user->findByEmail($data['email']);
    if ($exists) {
      return ['success' => false, 'msg' => 'Email pelanggan telah terdaftar.'];
    }
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $reged = $this->user->insert($data);
    if ($reged) {
      return ['success' => true];
    }
    return ['success' => false, 'msg' => 'Gagal mendaftar'];
  }

  public function login($data)
  {
    $exists = $this->user->findByEmail($data['email']);
    if ($exists && password_verify($data['password'], $exists["password"])) {
      $_SESSION["valid"] = true;
      $_SESSION["nl"] = $exists["nama_lengkap"];
      return ["success" => true];
    }
    return ["success" => false, "msg" => "Email atau password salah!"];
  }

  public function getAll()
  {
    $data = $this->user->findAll();
    if ($data && count($data) > 0) {
      return ["success" => true, "data" => $data];
    }
    return ["success" => false, "msg" => "Belum ada data"];
  }

  public function logout()
  {
    $_SESSION = [];
    session_destroy();
    return ["success" => true];
  }
}