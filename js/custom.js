$(document).ready(function() {
	$('form.search-btn-form').find('input.search-field').on('keypress', function(event) {
		if(event.keyCode == 13) {
			event.preventDefault();
			console.log($('form.search-btn-form').html());
			$('form.search-btn-form').submit();
		}
	});

	$('.contact-form').find('label').each(function() {
		$(this).append('<span class="error">*</span>');
	});
	$('#contactsubmit').removeClass($('#contactSubmit').attr('class'));
	$('#contactsubmit').addClass('btn btn-warning');

	$('.advertise-form').find('.inner-section').find('form').addClass('col-sm-8')
	$('.advertise-form').find('.inner-section').find('textarea').attr('rows',7);
	$('.advertise-form').find('.inner-section').find('button[type="submit"]').attr('class','');
	$('.advertise-form').find('.inner-section').find('button[type="submit"]').addClass('btn btn-warning');

	$('.submit-article-form').find('textarea').attr('rows',7);
	$('.submit-article-form').find('button[type="submit"]').attr('class','');
	$('.submit-article-form').find('button[type="submit"]').addClass('btn btn-warning');
});