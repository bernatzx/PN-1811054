<?php
declare(strict_types=1);
require_once __DIR__ . "/../models/AdminModel.php";

class AdminHandler
{
  private AdminModel $admin;
  public function __construct()
  {
    $this->admin = new AdminModel();

    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  public function create(array $data)
  {
    $exists = $this->admin->findByUname($data['username']);
    if ($exists) {
      return ['success' => false, 'msg' => 'Username admin telah terdaftar.'];
    }
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $created = $this->admin->insert($data);
    if ($created) {
      return ['success' => true, 'msg' => 'Admin berhasil ditambahkan'];
    }
    return ['success' => false, 'msg' => 'Gagal menambahkan data'];
  }

  public function login($data)
  {
    $exists = $this->admin->findByUname($data['username']);
    if ($exists && password_verify($data['password'], $exists["password"])) {
      $_SESSION["valid"] = true;
      $_SESSION["adminID"] = $exists["id"];
      $_SESSION["role"] = "admin";
      return ["success" => true];
    }
    return ["success" => false, "msg" => "Username atau password salah!"];
  }

  public function getAll()
  {
    $data = $this->admin->findAll();
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