<?php 
require_once __DIR__ . '/../../partials/header.php';

if ($valid) {
  require_once __DIR__ . '/../../components/admin-dash.php';
} else {
  require_once __DIR__ . '/../../components/user-dash.php';
}

require_once __DIR__ . '/../../partials/footer.php';