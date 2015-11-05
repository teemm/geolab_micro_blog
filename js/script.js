$(document).ready(function() {
	
	$('#tweetTextarea').on('keyup', function(e) {
		var charLength = $(this).val().length;
		//var currentVal = parseInt($('#charactersLeft').text());
		$('#charactersLeft').text( 140 - charLength );

		if ( (140 - charLength) <= 0  ) {
			$('#counter').addClass('limit');
		}
		else {
			$('#counter').removeClass('limit');
		}
	});

	$('#addTweetForm').on('submit', function(e) {
		var currentVal = parseInt( $('#charactersLeft').text() );
		if ( $('#tweetTextarea').val().length === 0 || currentVal < 0 ) {
			e.preventDefault();
		}
	});

	setInterval(function() {

		var firstTweet = $('#newTweets').find('.media').eq(0);

		$.get('//localhost/geolab/twitter/getNewTweets.php', {lastTweetId: firstTweet.data('id')}, function(resp) {
			var html = '';
			resp.forEach(function(tweet) {
				html += '<div class="media" data-id="' + tweet.id + '">' +
                    '<a class="pull-left" href="#">' +
                        '<img class="media-object" src="http://placehold.it/64x64" alt="">' +
                    '</a>'+
                    '<div class="media-body">' +
                        '<h4 class="media-heading">' + tweet.username +
                            ' <small>' + tweet.date + '</small>' +
                        '</h4>' +
                        tweet.content +
                    '</div>' +
                '</div><hr>';
			});


			$('#newTweets').prepend(html);
			console.log(html);
		}, 'json');

	}, 2000);

	// $('#tweetTextarea').on('keydown', function(e) {
	// 	var currentVal = parseInt( $('#charactersLeft').text() );
	// 	if ( currentVal <= 0 ) {
	// 		e.preventDefault();
	// 	}
	// });
});