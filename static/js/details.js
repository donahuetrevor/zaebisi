$(document).ready(function() {

	var moreButton = $('.details a.more');
	var optionList = moreButton.siblings('ul.options');
	var moreButtonClicked = false;
	var menuSubClicked = false;

	moreButton.click(function(){
		moreButtonClicked = !moreButtonClicked;
		optionList.toggleClass('visible');
	});

	$('body').click(function(){
		if (moreButtonClicked == false && menuSubClicked == false) {
			optionList.css('visibility', 'hidden');
			$('div.details ul.options ul').each(function(i) {
				$(this).removeClass('visible');
				$('div.details ul.options').removeClass('visible');
			})
		}
		moreButtonClicked = false;
		menuSubClicked = false;
	});

	$('div.details ul.options li').click(function(){
		if (menuSubClicked == false) {
			$(this).children('ul').toggleClass('visible');
		}
		menuSubClicked = true;
		moreButtonClicked = !moreButtonClicked;
	});
});