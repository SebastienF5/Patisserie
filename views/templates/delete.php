<?php
  session_start();
  unset($_SESSION["panier"][$_GET["id"]]);
  header("Location:panier");
?>