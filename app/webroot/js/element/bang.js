jQuery(document).ready(function(){

    var date = jQuery('#get-date').attr('date');
    var ketqua_id = jQuery('#ket-qua-id').attr('don-vi');

    jQuery('#them-bang').click(function(){
        var data = {ketqua_id:ketqua_id,date:date};
        jQuery.ajax({
            url: "/bangs/view",
            type: "POST",
            data: data,
            beforeSend: function () {
            },  
            success: function (result) {
                jQuery('#bang').html(result);
                boostrapAlerSuccess('Thêm mới thành công',5000);
            },
            error: function() {
                boostrapAlerDanger('Chưa có kết quả tính toán',5000);
            }
        }); 
        return false;
    });

});