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
});
