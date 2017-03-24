jQuery(document).ready(function(){
	jQuery('#diem').blur(function(){
		var loto = jQuery('#loto').val();
		var diem = jQuery(this).val();
		if (loto !== '' && diem !== '') 
		{
			if (loto >= 0 && loto <= 100) {
				var date = jQuery('#get-date').attr('date');
				var gia_diem = jQuery('#gia-diem').attr('don-vi');
				var gia_trung = jQuery('#gia-trung').attr('don-vi');
				var ketqua_id = jQuery('#ket-qua-id').attr('don-vi');
				var data = {loto:loto,diem:diem,date:date,gia_diem:gia_diem,gia_trung:gia_trung,ketqua_id:ketqua_id};
				jQuery.ajax({
	                url: "/ketquas/nhapvao",
	                type: "POST",
	                data: data,
	                beforeSend: function () {
	                },
	                success: function (result) {
	                	jQuery('#loto').val('');
						jQuery('#diem').val('');
	                },
	                error: function() {
	                	boostrapAlerDanger('Chưa có kết quả tính toán',5000);
	                }
	            });	
			} 
			else 
			{
				jQuery('#loto').val('');
				jQuery(this).val('');
				boostrapAlerDanger('Hãy nhập giá trị <strong>Loto</strong> từ 00 - 99',5000);
			}
		} 
		else 
		{
			jQuery('#loto').val('');
			jQuery(this).val('');
			boostrapAlerDanger('Hãy nhập giá trị vào các <strong>Loto</strong> và <strong>Điểm</strong>',5000);
		}

	});

	function boostrapAlerDanger(content = '',time = 5000) 
	{
		var rString = randomString(32, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		var html = '<div class="alert alert-danger alert-dismissable" id="'+rString+'"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+content+'</div>';
		jQuery('#alert-notification').fadeIn().append(html);
		setTimeout(function(){ 
			jQuery('#alert-notification').find('#'+rString).fadeOut().remove();
		}, time);
	};

	function boostrapAlerSuccess(content = '',time = 5000) 
	{
		var rString = randomString(32, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		var html = '<div class="alert alert-success alert-dismissable" id="'+rString+'"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+content+'</div>';
		jQuery('#alert-notification').fadeIn().append(html);
		setTimeout(function(){ 
			jQuery('#alert-notification').find('#'+rString).fadeOut().remove();
		}, time);
	};

	function randomString(length, chars) {
	    var result = '';
	    for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
	    return result;
	}

	jQuery('.remove-giai-thuong').click(function(){
		if (confirm('Bạn có chắc xóa dòng này đi không?')) {
			var giaithuong_id = jQuery(this).attr('gt-id');
			var data = {giaithuong_id:giaithuong_id};
			jQuery.ajax({
                url: "/ketquas/delete_giaithuong",
                type: "POST",
                data: data,
                beforeSend: function () {
                },
                success: function (result) {
					boostrapAlerSuccess('Xóa thành công',5000);
                },
                error: function() {
                	boostrapAlerDanger('Xóa không thành công',5000);
                }
            });	
		}
	});

});