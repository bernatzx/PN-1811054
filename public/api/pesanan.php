<?php
declare(strict_types=1);

require_once __DIR__ . '/../../app/init.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
$pesanan = new PesananHandler();
$input = json_decode(file_get_contents("php://input"), true);
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

try {
  switch ($method) {
    case 'POST':
      echo json_encode($pesanan->create($input));
      break;
    case 'GET':
      echo json_encode($pesanan->getAll());
      break;
    case 'DELETE':
      // code...
      break;
    default:
      http_response_code(405);
      echo json_encode(['success' => false, 'msg' => 'Method tidak diizinkan']);
      break;
  }
} catch (\Throwable $e) {
  http_response_code(400);
  echo json_encode(['success' => false, 'msg' => $e->getMessage()]);
}
