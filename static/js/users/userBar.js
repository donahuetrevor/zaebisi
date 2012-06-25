$(document).ready(function(){

	var userBarMoreMouseOver = false;
	var userBarAvatarImgMouseOver = false;
	var userBarClicked = false;
	var userBarVisible = false;

	var avatarImg = $('#userInfoBar .avatar img');
	var moreElement = $('#userInfoBar .avatar .more');
	var optionsElement = $('#userInfoBar .avatar .options');

	moreElement.css('left', avatarImg.parents('.avatar').innerWidth()/2+avatarImg.innerWidth()/2-moreElement.innerWidth()+'px');
	optionsElement.css('left', avatarImg.parents('.avatar').innerWidth()/2+avatarImg.innerWidth()/2+'px');

	$('body').click(function(){
		if (userBarClicked == false) {
			optionsElement.hide();
			userBarVisible = false;
			moreElement.hide();
		}
		userBarClicked = false;
	});

	moreElement.click(function(){
		userBarClicked = !userBarClicked;
		userBarVisible = !userBarVisible;
		optionsElement.toggle();
	});

	avatarImg.mouseover(function(){
		userBarAvatarImgMouseOver = true;
		moreElement.show();
	});

	moreElement.mouseover(function(){
		userBarMoreMouseOver = true;
		moreElement.show();
	});

	avatarImg.mouseout(function(){
		userBarAvatarImgMouseOver = false;
	});

	moreElement.mouseout(function(){
		userBarMoreMouseOver = false;
	});

	$('body').mouseover(function(){
		if (userBarMoreMouseOver == false && userBarAvatarImgMouseOver == false && userBarVisible == false) {
			moreElement.hide();
		}
	});

});