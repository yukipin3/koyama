<?php
define('DB_USER', 'root');
define('DB_PASSWORD', 'ap8j79c8f85c');


class DB {
	public static $db;

	public static function connect() {
		try {
			$dbh = 'mysql:dbname=audio_sort;host=localhost';
			self::$db = new PDO($dbh, DB_USER, DB_PASSWORD,array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES => false
			));
			return self::$db;

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public static function get_music_data() {
		return self::$db->query('select * from musics order by seq asc');
	}
}