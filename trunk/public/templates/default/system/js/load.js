//login form
$(function(){
$('.logopen').click(function(){
	$('.overlaybody').slideDown(500);
	$('.log-box').fadeIn(1000);
	$('.reg-box').fadeOut();
	return false;
	}), $('.log-box .boxclose').click(function(){
	$('.overlaybody').slideUp(900);
	$('.log-box').fadeOut();
	return false;
	});

$('.regopen').click(function(){
	$('.overlaybody').slideDown(500);
	$('.reg-box').fadeIn(1000);
	$('.log-box').fadeOut();
	return false;
	}), $('.reg-box .boxclose').click(function(){
	$('.overlaybody').slideUp(900);
	$('.reg-box').fadeOut();
	return false;
	});
	
$('.logop').click(function(){
	$('.overlaybody').slideDown(500);
	$('.log-box').fadeIn(1000);
	return false;
	}), $('.log-box .boxclose').click(function(){
	$('.overlaybody').slideUp(900);
	$('.log-box').fadeOut();
	return false;
	});

$('.regop').click(function(){
	$('.overlaybody').slideDown(500);
	$('.reg-box').fadeIn(1000);
	return false;
	}), $('.reg-box .boxclose').click(function(){
	$('.overlaybody').slideUp(900);
	$('.reg-box').fadeOut();
	return false;
	});

	
$('.op02').click(function(){
	$('.overlaybody').slideDown(500);
	$('.log-box').fadeIn(1000);
	return false;
	}), $('.reg-box .boxclose').click(function(){
	$('.overlaybody').slideUp(900);
	$('.log-box').fadeOut();
	return false;
	});
	
	
});



/* jQuery textarea resizer plugin usage */
$(document).ready(function() {
	$('textarea.resizable:not(.processed)').TextAreaResizer();
});

//input tip post page
$(window).load(function(){$('.tiptt').show();$('#title').focus(function(){$('.tiptt').fadeOut();}), $('#title').blur(function(){if (this.value.length == 0) $('.tiptt').fadeIn();});$('.tipare').show();$('#wmd-input').focus(function(){$('.tipare').fadeOut();}), $('#wmd-input').blur(function(){if (this.value.length == 0) $('.tipare').fadeIn();});});

$(window).load(function() {
			//showlist		
				$('.showtips').hide();
			$('.hidetips').click(function(){
				$('.tipscontent').hide('slow'); 
				$('.hidetips').hide();
				$('.showtips').show();
				return false;
				}), $('.showtips').click(function(){
				$('.tipscontent').show('slow'); 
				$('.showtips').hide();
				$('.hidetips').show();
				return false;
				});
			// go top
			/*$('.gotop').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
				return false;
				});*/
				
});

      