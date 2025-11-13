<?php
declare(strict_types=1);
session_start();

function base($url = null)
{
  $base = "http://localhost/sistem";
  if ($url !== null) {
    return $base . "/" . $url;
  } else {
    return $base;
  }
}