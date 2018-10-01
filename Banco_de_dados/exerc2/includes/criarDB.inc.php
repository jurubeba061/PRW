<?php 
	$sql = "CREATE DATABASE IF NOT EXISTS $banco";
	$resultado = $con->query($sql) or die($con->error);

 ?>