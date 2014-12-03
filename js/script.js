$('document').ready(function() {
	$music_wrap = $('#musics');
	$music_wrap.sortable({
		axis : 'y',
		opacity: 0.5,
		update: function() {
			music_nmupdate();
			$.post('ajax_sort_music.php', {
				mscitem: $(this).sortable('serialize')

			}, function(rs) {
			});
		}
	});
	$music_wrap.disableSelection();

	//音声の連番をアップデート
	function music_nmupdate() {
		$('.music').each(function(e) {
			$(this).find('.music_id').text(parseInt(e+1));
		});
	}
});