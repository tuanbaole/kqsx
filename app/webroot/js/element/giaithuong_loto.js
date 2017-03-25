jQuery(document).ready(function(){

    var date = jQuery('#get-date').attr('date');
    var ketqua_id = jQuery('#ket-qua-id').attr('don-vi');

    jQuery('.remove-giai-thuong').click(function(){
    	if (confirm('Bạn có chắc xóa dòng này đi không?')) {
    		var giaithuong_id = jQuery(this).attr('gt-id');
    		var data = {giaithuong_id:giaithuong_id,date:date,bang:1,ketqua_id:ketqua_id};
    		jQuery.ajax({
                url: "/giaithuongs/delete",
                type: "POST",
                data: data,
                beforeSend: function () {
                },
                success: function (result) {
                    // alert(result);
                    // return false;
                	jQuery('#giaithuong-loto').html(result);
    				boostrapAlerSuccess('Xóa thành công',5000);
                },
                error: function() {
                	boostrapAlerDanger('Xóa không thành công',5000);
                }
            });	
    	}
    });

});