<?php


include "./notorm/NotORM.php";

//$pdo->exec('SET search_path TO public');

function db(){
	$host = '192.168.1.52';
	$pdo = new PDO("pgsql:dbname=mpxd_dw;user=postgres;password=mrt@mpxd!@#123;host=$host;port=5432");
	$db = new NotORM($pdo);
	return $db;
}

function mpxd(){ //dashboard
	$host = '192.168.1.52';
	$pdo = new PDO("pgsql:dbname=ceodb;user=postgres;password=mrt@mpxd!@#123;host=$host;port=5432");
	$db = new NotORM($pdo);
	return $db;
}

function dcs(){ //dashboard
	$host = '192.168.1.52';
	$pdo = new PDO("pgsql:dbname=pilot_db_new;user=postgres;password=mrt@mpxd!@#123;host=$host;port=5432");
	//$db = new NotORM($pdo);
	return $pdo;
}


?>