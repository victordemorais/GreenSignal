<?php 
	
	include_once("db/connect.php");
	
	
	$id=$_GET['id'];
	$db = new Database();
	$delete = "DELETE FROM cliente where id=$id";
	$deleteRow = $db->delete($delete);
