jQuery(document).ready(function(){
	jQuery('#diem').blur(function(){
		var loto = jQuery('#loto').val();
		var diem = jQuery(this).val();
		
		if (loto !== '' && diem !== '') 
		{
			if (loto >= 0 && loto <= 100) {
				var data = {loto:loto,diem:diem};
				jQuery.ajax({
	                url: "/ketquas/nhapvao",
	                type: "POST",
	                data: data,
	                beforeSend: function () {
	                },
	                success: function (result) {
	                	alert(result);
	                },
	                error: function() {
	                	boostrapAlerDanger('Chưa có kết quả tính toán',10000);
	                }
	            });	
			} else {
				boostrapAlerDanger('Hãy nhập giá trị <strong>Loto</strong> từ 00 - 99',10000);
			}
			
		} else {
			jQuery('#loto').attr('value','');
			boostrapAlerDanger('Hãy nhập giá trị vào các <strong>Loto</strong> và <strong>Điểm</strong>',10000);
		}

	});

	function boostrapAlerDanger(content = '',time = 10000) {
		var html = '<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+content+'</div>';
		jQuery('#alert-notification').fadeIn().append(html);
		setTimeout(function(){ 
			jQuery('#alert-notification').fadeOut().empty();
		}, time);
	};

});