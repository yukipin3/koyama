<?php
if(isset($_POST['mscitem'])) {
	require_once 'db.php';
	require_once 'function.php';

	parse_str($_POST['mscitem']);
	
	DB::connect();
var_dump($music);

	foreach($music as $k => $v) {
		$q = 'update musics set seq =  :seq where id = :id';
		$stmt = DB::$db->prepare($q);
		$stmt->execute(array('seq' => $k+1, 'id' => $v));
	}
}