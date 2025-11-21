<?php
declare(strict_types=1);

require_once __DIR__ . '/../../app/init.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
$produk = new ProdukHandler();
$input = array_merge($_POST, $_FILES);
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

try {
  switch ($method) {
    case 'POST':
      echo json_encode($id ? $produk->change($id, $input) : $produk->create($input));
      break;
    case 'GET':
      echo json_encode($id ? $produk->getOne($id) : $produk->getAll());
      break;
    case 'DELETE':
      echo json_encode($produk->remove($id));
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
