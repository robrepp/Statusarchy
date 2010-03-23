var reqUrl = 'req.php';

$(document).ready(function(){
	$('.w3standards').remove(); // These are just to get things validated
	
	// Setup sorting/drag+drop
	$('#modules').sortable().disableSelection();
	$('#possibleModules li').draggable({
		connectToSortable: 'ul#modules',
		helper: 'clone',
		revert: 'invalid'
	}).disableSelection();
	
	// Setup fadein/out for top bar
	$('#adder').width($('#possibleModules').width()).height($('#possibleModules').height()).hover(function(){
		$('#possibleModules').fadeIn();
	}, function(){
		$('#possibleModules').fadeOut();
	});
	$('#possibleModules').fadeOut();
	
	
	// var t = Raphael( $('#graphh').get(0) );
	// t.g.piechart(320, 240, 100, [55, 20, 13, 32, 5, 1, 2, 10]);
	
});
