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
		return;

		var firstTweet = $('#newTweets').find('.media').eq(0);

		$.get('//localhost/twitter/getNewTweets.php', {lastTweetId: firstTweet.data('id')}, function(resp) {
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
		}, 'json');

	}, 2000);


	$('#logout a').on('click', function(e){
		e.preventDefault();
		$('#logout').submit();
	});


	$('#searchIn').on('keyup', function(){
		var input = $(this).val();
		if (input.length >= 2){	
		var _html = '';
		$.get('search.php' , { s: $(this).val() }, function(resp){
			for (var i =1; i < resp.length; i++) {
				_html += '<li>' + resp[i].content + '<li>';

			}
			$('#autocomplate').html(_html);
		}, 'json'); 
		}
	});
});