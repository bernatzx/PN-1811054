<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . "/db.php";
require_once __DIR__ . "/handlers/AdminHandler.php";
require_once __DIR__ . "/handlers/UserHandler.php";
require_once __DIR__ . "/handlers/ProdukHandler.php";

function VALID()
{
  return isset($_SESSION['valid']) && $_SESSION['valid'] === true;
}
function ISADMIN()
{
  return isset($_SESSION['role']) && $_SESSION['role'] === "admin";
}

function base($url = null)
{
  $base = "http://localhost/sistem";
  if ($url !== null) {
    return $base . "/" . $url;
  } else {
    return $base;
  }
}