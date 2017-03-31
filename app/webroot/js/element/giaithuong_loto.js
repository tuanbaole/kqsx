jQuery(document).ready(function(){

    var date = jQuery('#get-date').attr('date');
    var ketqua_id = jQuery('#ket-qua-id').attr('don-vi');

    jQuery('.xoa-lo-giai-thuong').click(function(){
    	if (confirm('Bạn có chắc xóa dòng này đi không?')) 
        {
    		var giaithuong_id = jQuery(this).attr('gt-id');
    		var data = {giaithuong_id:giaithuong_id,date:date,bang:1,ketqua_id:ketqua_id};
    		jQuery.ajax({
                url: "/giaithuongs/delete_lo",
                type: "POST",
                data: data,
                beforeSend: function () {},
                success: function (result) 
                {
                	jQuery('#giaithuong-loto').html(result);
    				boostrapAlerSuccess('Xóa thành công',5000);
                },
                error: function() {
                	boostrapAlerDanger('Xóa không thành công',5000);
                }
            });	
    	}
    });

    jQuery('.delete_lo_all_giai_thuong').click(function(){
        if (confirm('Bạn có chắc chắn là xóa tất cả các giải thưởng hiện thị không?')) 
        {
            return true
        } 
        else 
        {
            return false;
        }
    });

});