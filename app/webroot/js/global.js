jQuery(document).ready(function(){

	window.boostrapAlerDanger = function(content = '',time = 5000) 
	{
		var rString = randomString(32, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		var html = '<div class="alert alert-danger alert-dismissable" id="'+rString+'"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+content+'</div>';
		jQuery('#alert-notification').fadeIn().append(html);
		setTimeout(function(){ 
			jQuery('#alert-notification').find('#'+rString).fadeOut().remove();
		}, time);
	};

	window.boostrapAlerSuccess = function(content = '',time = 5000) 
	{
		var rString = randomString(32, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		var html = '<div class="alert alert-success alert-dismissable" id="'+rString+'"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+content+'</div>';
		jQuery('#alert-notification').fadeIn().append(html);
		setTimeout(function(){ 
			jQuery('#alert-notification').find('#'+rString).fadeOut().remove();
		}, time);
	};

	window.randomString = function(length, chars) {
	    var result = '';
	    for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
	    return result;
	}

});