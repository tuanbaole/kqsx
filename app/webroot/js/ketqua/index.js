jQuery(document).ready(function(){

	var date = jQuery('#get-date').attr('date');
	var ketqua_id = jQuery('#ket-qua-id').attr('don-vi');
	var bang = jQuery('.don-giaithuong.active').attr('val');	
	
	jQuery('#diem').keypress(function(event){
		if (event.keyCode === 13) {
			var loto = jQuery('#loto').val();
			var diem = jQuery(this).val();
			if (loto !== '' && diem !== '') 
			{
				if (loto >= 0 && loto <= 100) {
					var gia_diem = jQuery('#gia-diem').val();
					var gia_trung = jQuery('#gia-trung').val();
					var data = {loto:loto,diem:diem,date:date,gia_diem:gia_diem,gia_trung:gia_trung,ketqua_id:ketqua_id,bang:bang};
					jQuery.ajax({
		                url: "/ketquas/nhapvao_lo",
		                type: "POST",
		                data: data,
		                beforeSend: function () {
		                },
		                success: function (result) {
		                	jQuery('#loto').val('');
							jQuery('#diem').val('');
							jQuery('#giaithuong-loto').html(result);
	    					boostrapAlerSuccess('Thêm mới thành công',5000);
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
		}
		

	});

	jQuery('#tien_de').keypress(function(event){
		if (event.keyCode === 13) {
			var de = jQuery('#de').val();
			var tien_de = jQuery(this).val();
			var gia_trung_de = jQuery('#gia-trung-de').val();
			var ty_gia = jQuery('#ty-gia').val();
			if (de !== '' && tien_de !== '') 
			{
				if (de >= 0 && de <= 100) {
					var gia_trung = jQuery('#gia-trung-de').val();
					var data = {de:de,tien_de:tien_de,date:date,ketqua_id:ketqua_id,gia_trung_de:gia_trung_de,ty_gia:ty_gia,bang:bang};
					jQuery.ajax({
		                url: "/ketquas/nhapvao_de",
		                type: "POST",
		                data: data,
		                beforeSend: function () {
		                },	
		                success: function (result) {
		                	jQuery('#de').val('');
							jQuery('#tien_de').val('');
		                	jQuery('#giaithuong-de').html(result);
	    					boostrapAlerSuccess('Thêm mới thành công',5000);
		                },
		                error: function() {
		                	boostrapAlerDanger('Chưa có kết quả tính toán',5000);
		                }
		            });	
				} 
				else 
				{
					jQuery('#de').val('');
					jQuery(this).val('');
					boostrapAlerDanger('Hãy nhập giá trị <strong>Đề</strong> từ 00 - 99',5000);
				}
			} 
			else 
			{
				jQuery('#de').val('');
				jQuery(this).val('');
				boostrapAlerDanger('Hãy nhập giá trị vào các <strong>Đề</strong> và <strong>Tiền</strong>',5000);
			}
		}
	});

	jQuery('#datepicker').datepicker({
		format: "yyyy-mm-dd"
	});
	jQuery('.icon-arrow-left').addClass('glyphicon glyphicon-arrow-left');
	jQuery('.icon-arrow-right').addClass('glyphicon glyphicon-arrow-right');

	jQuery('.currentcy-input').keyup(function(event) {
	  	// skip for arrow keys
	  	if(event.which === 13 ) {
	  		var val = jQuery(this).val();
	  		console.log(val);
	  	}
	  	if(event.which >= 37 && event.which <= 40) return;
	  	// format number
	  	jQuery(this).val(function(index, value) {
	    	return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	  	});
	});

});