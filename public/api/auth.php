<?php
declare(strict_types=1);
require_once __DIR__ . "/../../app/init.php";
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$admin = new AdminHandler();
$user = new UserHandler();
$input = json_decode(file_get_contents('php://input'), true);
$path = $_GET['route'] ?? '';

try {
  switch ($method) {
    case 'POST':
      if ($path === "userRG") {
        $reg = $user->reg($input);
        if ($reg['success']) {
          echo json_encode($user->login($input));
        } else {
          echo json_encode($reg);
        }
      }
      if ($path === "userLN") {
        echo json_encode($user->login($input));
      }
      if ($path === "adminLN") {
        echo json_encode($admin->login($input));
      }
      if ($path === "logout") {
        if (ISADMIN()) {
          echo json_encode($admin->logout());
        } else {
          echo json_encode($user->logout());
        }
      }
      break;
    case 'GET':
      echo json_encode($user->getAll());
      break;
    default:
      http_response_code(405);
      echo json_encode(['success' => false, 'msg' => 'Method tidak diizinkan']);
      break;
  }
} catch (\Throwable $e) {
  error_log("Auth API error: " . $e->getMessage());
  http_response_code(500);
  echo json_encode(['success' => false, 'msg' => 'Terjadi kesalahan server']);
}
