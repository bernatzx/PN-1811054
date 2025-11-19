<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . "/db.php";

function VALID()
{
  return isset($_SESSION['valid']) && $_SESSION['valid'] === true;
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