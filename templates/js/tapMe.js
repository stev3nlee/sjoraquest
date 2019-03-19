//var baseUrl = '';

// game attributes
var initLevel = 1;
var initScore = 0;
var initTimeLeft = 5;
var totalGlass = 9;
var initSjoraGlass = 5;
var initBadGlass = 7;

var pointAdd = 5;
var minScore = 100;

var level;
var score;
var timeLeft;
var sjoraGlass;
var badGlass;
var newTimer;
var counter;

// images
var sjoraGlassImg = baseUrl+'images/glass-sjora.png';
var badGlassImg = baseUrl+'images/glass-strawb.png';

// functions
function resetGame(){
	level = initLevel;
	score = initScore;
	timeLeft = initTimeLeft;
	sjoraGlass = initSjoraGlass;
	badGlass = initBadGlass;
	newTimer = initTimeLeft;
}

function startGame(){
	console.log('start game');
	resetGame();
	setGlasses(level);
	clearInterval(counter);
	counter = setInterval(timer, 1000);
	$('#timeLeft').html(newTimer);
	$('#theLevel').html(level);
	$('#theScore').html(score);
}

function setGlasses(curLevel){
	badGlass = checkGlasses(curLevel);
	sjoraGlass = totalGlass - badGlass;
	console.log(sjoraGlass);
	curBadGlass = 0;
	curSjoraGlass = 0;
	var badGlasses = [];
	do{
		badGlassPos = Math.floor((Math.random() * totalGlass) + 1);
		if($.inArray(badGlassPos, badGlasses) < 0){
			badGlasses.push(badGlassPos);
			curBadGlass++;
		}
	}
	while(curBadGlass < badGlass)
	console.log(badGlasses);
	var i = 0;
	$('.tapMe').each(function(){
		i++;
		if($.inArray(i, badGlasses) < 0){
			curSjoraGlass++;
			$(this).html('<img src="'+sjoraGlassImg+'">').addClass('sjora');
		}
		else{
			curBadGlass++;
			$(this).html('<img src="'+badGlassImg+'">').removeClass('sjora');
		}
	});
}

function checkGlasses(curLevel){
	if(curLevel == 1 || curLevel <= 3){
		badGlass = 8;
		newTimer = initTimeLeft;
	}
	else if(curLevel == 3 || curLevel <= 5){
		badGlass = 7;
		newTimer = 4;
	}
	else if(curLevel == 5 || curLevel <= 6){
		badGlass = 6;
		newTimer = 3;
	}
	else if(curLevel == 6 || curLevel <= 7){
		badGlass = 5;
		newTimer = 2;
	}
	else{
		badGlass = 4;
		newTimer = 2;
	}
	$('#timeLeft').html(newTimer);
	return badGlass;
}

function levelUp(){
	$('.tapMe').hide();
	setTimeout(function(){
		level++;
		setGlasses(level);
		$('.tapMe').fadeIn();
		$('#theLevel').html(level);
	}, 100);
	clearInterval(counter);
	counter = setInterval(timer, 1000);
}

function gameOver(){
	$('.tapMe').each(function(){
		$(this).html('&nbsp;');
	});
	if(score < minScore){
		//popup gagal
		$('#gamePlay').fadeOut(100, function(){
			$('#gameOverFail').fadeIn(400);

			 $.ajax({        
	            type: "POST",
	            url: baseUrl+'game/user_play',
	            //dataType:"JSON",
	            //data:{ fact_id:id },
	            success:function(result){   
	                console.log(result);  
	            }
	        });
	        
		});

	   
		//add playCount
	}
	else if(score >= minScore){
		//popup berhasil dpt voucher
		$('#gamePlay').fadeOut(100, function(){
			$('#gameOverScore').html(score);
			$('#gameOverSuccess').fadeIn(400);
		});

		$.ajax({        
            type: "POST",
            url: baseUrl+'game/user_win',
            dataType:"JSON",
            //data:{ fact_id:id },
            success:function(result){   
                console.log(result);  
            }
        });
        return false;
		//add playCount & winCount
		//send email voucher function
	}
}

function timer(){
  	newTimer = newTimer - 1;
  	if (newTimer < 0){
    	clearInterval(counter);
		gameOver();
     	return;
  	}
	$('#timeLeft').html(newTimer);
}

$(document).ready(function(){
	$('.tapMe').each(function(){
		$(this).velocity({
			rotateZ: [Math.floor((Math.random() * 5) + 1), Math.floor((Math.random() * (-5)) + 1)]
		}, {
			duration: 600,
			loop: true
		});
	});
	$('.tapMe').click(function(){
		//alert(sjoraGlassImg);
		//alert(badGlassImg);
		if($(this).hasClass('sjora') && $(this).html() != '&nbsp;'){
			$(this).html('&nbsp;').removeClass('sjora');
			score = score + pointAdd;
			$('#theScore').html(score);
			sjoraGlass--;
			console.log(sjoraGlass);
			if(sjoraGlass == 0){
				levelUp();
			}
		}
		else{
			clearInterval(counter);
			gameOver();
		}
	});
});