/**
 * Created by leven on 2015/2/6.
 */

function init(){
    $("[name=ckall]").click(function(){
        var all = this.checked ;
        $("[name=ck]").each(function(i){
            this.checked = all;
        });
    });
    $("#pagination").find('a').bind('click', function() {
        var a = $(this).attr("alt");
        if(a=="") return false;
        $("#ActionForm #page").val(a);
        ActionForm.submit();
    });
    $("#pagination #maxpage").change(function() {
        ActionForm.submit();
    });
}

$(document).ready(function(){
    init();
});