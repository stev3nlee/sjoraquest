var baseUrl = '';


function changeCloseBtn(backUrl){
	$('#backToHomeBtn').attr('href', backUrl).html('Play Again');
}

$(document).ready(function(){
	$('.overlay').css('opacity', '0.8');
	
	$('#playBtn').click(function(){
		$('#howToPlay').fadeOut(400, function(){
			$('#gamePlay').fadeIn(400, function(){
				startGame();
			});
		});
	});
	
	$('#btnHowToPlay').click(function(){
		$('#gamePlay').fadeOut(400, function(){
			$('#howToPlay').fadeIn(400);
		});
	});
	
	$('#tryAgainBtn').click(function(){
		$('#gameOverFail').fadeOut(400, function(){
			$('#gamePlay').fadeIn(400, function(){
				startGame();
			});
		});
	});
	
	$('#shareBtn').click(function(){
		//call FB share dialog
	});
	
	$('#btnDisclaimer').click(function(){
		$('#popupDisclaimer, #overlay').fadeIn(400);
	});
	
	$('.closeBtn').click(function(){
		$('.overlay, .popup').fadeOut(400);
	});
});