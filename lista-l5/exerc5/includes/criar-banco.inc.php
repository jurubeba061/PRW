<?php
$sql = "CREATE DATABASE IF NOT EXISTS $nomeDoBanco";
$resultado = $link->query($sql) or die ($link->error);
?>