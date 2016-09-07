$(document).ready(function(){
	$('.pagination').find('li').find('a').on('click', function(){
		$(this).addClass("active");
	});
	$('#a-create-entry').on('click', function(){
		$('.new-post').show();
	});
	$('#icon-submit-comment').on('click', function(){
		$('#form-comment').submit();
	});
	$('[data-toggle="tooltip"]').tooltip();
});
