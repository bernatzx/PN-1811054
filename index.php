<?php
require_once __DIR__ . "/app/init.php";

if (!VALID()) {
  header("Location:" . base("/public/src/views/auth"));
} else {
  header("Location:" . base("/public/src/views/dashboard"));
}