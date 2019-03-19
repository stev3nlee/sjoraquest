$(document).ready(function(){
	//accordion
	$('.close').attr("disabled","disabled");
	$('#accordion').accordion({
        collapsible:true,
		active:false,
		heightStyle: "content",
        beforeActivate: function(event, ui) {
			
             // The accordion believes a panel is being opened
            if (ui.newHeader[0]) {
                var currHeader  = ui.newHeader;
                var currContent = currHeader.next('.ui-accordion-content');
             // The accordion believes a panel is being closed
            } else {
                var currHeader  = ui.oldHeader;
                var currContent = currHeader.next('.ui-accordion-content');
            }
             // Since we've changed the default behavior, this detects the actual status
            var isPanelSelected = currHeader.attr('aria-selected') == 'true';
            
             // Toggle the panel's header
            currHeader.toggleClass('ui-corner-all',isPanelSelected).toggleClass('accordion-header-active ui-state-active ui-corner-top',!isPanelSelected).attr('aria-selected',((!isPanelSelected).toString()));
            
            // Toggle the panel's icon
            currHeader.children('.ui-icon').toggleClass('ui-icon-triangle-1-e',isPanelSelected).toggleClass('ui-icon-triangle-1-s',!isPanelSelected);
            
             // Toggle the panel's content
            currContent.toggleClass('accordion-content-active',!isPanelSelected)    
            if (isPanelSelected) { currContent.slideUp(); }  else { currContent.slideDown(); }

            return false; // Cancels the default action
        }
    });
	var icons = $( "#accordion" ).accordion( "option", "icons" );
    $('.open').click(function () {
        $('.ui-accordion-header').removeClass('ui-corner-all').addClass('ui-accordion-header-active ui-state-active ui-corner-top').attr({
            'aria-selected': 'true',
            'tabindex': '0'
        });
        $('.ui-accordion-header-icon').removeClass(icons.header).addClass(icons.headerSelected);
        $('.ui-accordion-content').addClass('ui-accordion-content-active').attr({
            'aria-expanded': 'true',
            'aria-hidden': 'false'
        }).slideDown();
		$('.open').hide();
		$('.close').css('display','block');
    });
    $('.close').click(function () {
        $('.ui-accordion-header').removeClass('ui-accordion-header-active ui-state-active ui-corner-top').addClass('ui-corner-all').attr({
            'aria-selected': 'false',
            'tabindex': '-1'
        });
        $('.ui-accordion-header-icon').removeClass(icons.headerSelected).addClass(icons.header);
        $('.ui-accordion-content').removeClass('ui-accordion-content-active').attr({
            'aria-expanded': 'false',
            'aria-hidden': 'true'
        }).slideUp();
        $('.close').hide();
		$('.open').css('display','block');
    });
    $('.ui-accordion-header').click(function () {
        $('.open').removeAttr("disabled");
        $('.close').removeAttr("disabled");
		$('.close').attr("disabled","disabled");
        
    });
	//end accordion
	
	$('.menuSideContent').css({height: $(window).height()-80})
	/*var clic=0;
	$('#accordion li h3.dropDown').click(function () {
		if(clic==0){
			$(this).css({'background':'#D1D3D4 url(images/arrowBottom.png) no-repeat center right 10px'});
			clic=1;
		}
		else if(clic==1){
			$(this).css({'background':'#E6E7E8 url(images/arrowRight.png) no-repeat center right 10px'});
			clic=0;
		}
	})*/
	
	/*$('#accordion li h3.dropDown').click(function () {
		$(this).next().slideToggle("normal");
		$(this).toggleClass('active');
	})*/
	reset=true;
	opened=true;
	if($(window).width() > 768 ){
		$('.contentArea').css({'width':$(window).width()-$('.menuSideCon').width()})
	}
	$('.slideBtn').click(function(){
		if($(window).width() > 768 ){
			$('.flagOverlayBtn').show();
			$('.menuSideCon').animate({
				left: -320
			})
			$('.contentArea').animate({
				width: '100%',
				left: 0
			})
			opened=false;
			
			$(window).bind('load resize', function(){
				if($(window).width() < 768 && $(window).width() > 320){
					$('.flagOverlayBtn').hide();
					$('.menuSideCon').css({left:-320});
					$('.contentArea').css({width:'100%', left:0});
				}
				else if($(window).width() < 320){
					$('.flagOverlayBtn').hide();
					$('.menuSideCon').css({left:-200});
					$('.contentArea').css({width:'100%', left:0});
				}
				else{
					$('.menuSideCon').css({left:-320});
					$('.contentArea').css({width:'100%', left:0});
				}
			})
		}
		else{
			$('.flagOverlayBtn').show();
			$('.menuSideCon').css({'position':'fixed', 'z-index':20})
			$('.menuSideCon').animate({
				left: 0
			})
			reset=false;
			$('.overlay').fadeIn();
			
				$(window).bind('load resize', function(){
					if($(window).width() > 768){
						$('.overlay').fadeOut();
						reset=true;
						$('.flagOverlayBtn').hide();
						if(opened==true){
							$('.menuSideCon').css({left:0});
							$('.contentArea').css({
								'width':$(window).width()-$('.menuSideCon').width(),	
								left:320
							})
						}
						else{
							$('.flagOverlayBtn').show();
							$('.menuSideCon').css({left:-320});
							$('.contentArea').css({width:'100%', left:'0'});	
						}
					}
					else if($(window).width() < 768 && $(window).width() > 320){
						if(reset==false){
							$('.menuSideCon').css({left:0});
							$('.contentArea').css({width:'100%', left:0});
						}
						else{
							$('.menuSideCon').css({left:-320});
							$('.contentArea').css({width:'100%', left:0});
						}
					}
					else{
						if(reset==false){
							$('.menuSideCon').css({left:0});
							$('.contentArea').css({width:'100%', left:0});
						}
						else{
							$('.menuSideCon').css({left:-200});
							$('.contentArea').css({width:'100%', left:0});
						}
					}
				})
			
		}
	})
	$('.flagOverlayBtn').click(function(){
		if($(window).width() > 768 ){
			$('.flagOverlayBtn').hide();
			$('.menuSideCon').animate({
				left: 0
			})
			$('.contentArea').animate({
				'width':$(window).width()-$('.menuSideCon').width(),
				left: 320
			})
			opened=true;
			
			$(window).bind('load resize', function(){
				if($(window).width() < 768 && $(window).width() > 320){
					$('.menuSideCon').css({left:-320});
					$('.contentArea').css({width:'100%', left:0});
				}
				else if($(window).width() < 320){
					$('.menuSideCon').css({left:-200});
					$('.contentArea').css({width:'100%', left:0});
				}
				else{
					$('.menuSideCon').css({left:0});
					$('.contentArea').css({
						'width':$(window).width()-$('.menuSideCon').width(),	
						left:320
					})
				}
			})
		}
		
		else if($(window).width() < 768 && $(window).width() > 320){
			$('.overlay').fadeOut();
			reset=true;
			$('.flagOverlayBtn').hide();
			$('.menuSideCon').animate({
				left: -320
			})
		}
		else{
			$('.overlay').fadeOut();
			reset=true;
			$('.flagOverlayBtn').hide();
			$('.menuSideCon').animate({
				left: -200
			})
		}
	})
	
	optionOpen=true;
	$('.option').click(function(){
		if(optionOpen==true){
			$('.optionWrap, .overlay').fadeIn();
			optionOpen=false;
			return false;
		}
		else{
			$('.optionWrap, .overlay').fadeOut();
			optionOpen=true;
		}
	});
	
	$('.overlay').click(function(){
		$('.optionWrap, .overlay').fadeOut();
		optionOpen=true;
		
		if($(window).width() < 768 && $(window).width() > 320){
			reset=true;
			$('.flagOverlayBtn').hide();
			$('.menuSideCon').animate({
				left: -320
			})
		}
		else if($(window).width() < 320){
			reset=true;
			$('.flagOverlayBtn').hide();
			$('.menuSideCon').animate({
				left: -200
			})
		}
	});
	/*$('#date_time').css({marginLeft:-(0.5*$('#date_time').width())})*/
	
	//dropzone js 
	$('#addPhotosBtn').click(function(){
		$('.dropzoneContainer').slideDown();
	});
	
	//tab js
	$('#tabs div.menuTab').hide();
	$('#tabs div.menuTab:first').show();
	$('#tabs ul li:first').addClass('active');
	$('#tabs ul li a').click(function(){ 
		$('#tabs ul li').removeClass('active');
		$(this).parent().addClass('active'); 
		var currentTab = $(this).attr('href'); 
		$('#tabs div.menuTab').hide();
		$(currentTab).show();
		return false;
	});
	
	//sort table
	if($("#myTable").length>0){
		$("#myTable").tablesorter({
			headers: {    
				1: { 
					sorter: false 
				}
			}
		}); 
	}
	
	//validation 
	$("#formContent").validate();
	
	//select
	if($('.sod').length > 0){
		$(".sod").selectOrDie({
			placeholderOption:true,
		});
	}
	
	if($("#datepicker").length>0){
    	$("#datepicker").datepicker();
	}
	
	//content element edit
	$('.newsContentElement').mouseenter(function() {
        $(this).find('.editCon').fadeIn()
    }).mouseleave(function() {
        $(this).find('.editCon').stop().fadeOut()
    });;
})

//testing initial
$(window).bind('load resize', function(){
	if($(window).width() > 768 ){
		$('.contentArea').css({'width':$(window).width()-$('.menuSideCon').width()})
	}
	else{
		$('.contentArea').css({'width':'100%'})
	}
})

function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+', '+d+' - '+months[month]+' - '+year+' | '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}