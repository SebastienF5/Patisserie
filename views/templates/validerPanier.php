<?php
session_start();
unset($_SESSION["panier"]);
  header("Location:liste?v=val");
?>