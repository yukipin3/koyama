<?php
require_once 'db.php';
require_once 'function.php';

DB::connect();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<style>
	li.music {
		background:#eee;
		margin-bottom:5px;
		padding:15px 10px;
		overflow: hidden;
		width:350px;
	}
	li.music:hover{background:#dfdfdf;cursor:pointer;}
	</style>
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="js/audio.min.js"></script>
	<script src="js/script.js"></script>
	<title>並べ替え音声再生 - 小山さん</title>
</head>
<body>
	<div>
		<ul id="musics">
			<?php foreach(DB::get_music_data() as $row) :  ?>
				<li class="music" id="music_<?= $row['id'] ?>" data-id="<?= $row['id']?>">
					<p><span class="music_id"><?= $row['seq'] ?></span> . <?= $row['title'] ?></p>
					<input type="hidden" value="<?= $row['id'] ?>">
					<audio id="audio-<?= $row['filename']?>" src="music/<?= $row['filename'] . '.' . $row['ext'] ?>" controls></audio>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</body>
</html>