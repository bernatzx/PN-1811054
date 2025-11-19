<?php
require_once __DIR__ . '/../../partials/header.php';

if (VALID()) {
  if (!ISADMIN()) {
    require_once __DIR__ . '/../../components/user-dash.php';
  } else {
    require_once __DIR__ . '/../../components/admin-dash.php';
  }
}

require_once __DIR__ . '/../../partials/footer.php';