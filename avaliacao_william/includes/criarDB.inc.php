<?php 
	$sql = "CREATE DATABASE IF NOT EXISTS $banco";
	$resultado = $link->query($sql) or die($con->error);

 ?>