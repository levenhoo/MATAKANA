
function changecode() {
    $("#password").val("");
    var number = Math.random() + new Date().getMilliseconds();
    $("#Vc_Text").val("");
    src = "../VerifyCode.aspx?";
    src = src + '?' + number;
    $("#Vc_Pic").attr("src", src);
}
function showInfo(str) {
    $('#alertMessage').removeClass('error success warning').html(str).stop(true, true).show().animate({ opacity: 1, right: '0' }, 500);
}
function showError(str) {
    $('#alert-info').show().html(str);
}
function hideTop() {
    $('#alertMessage').animate({ opacity: 0, right: '-20' }, 500, function () { $(this).hide(); });
}

//Begin .......
function begin() {
    $('#alert-info').hide();
    var username = $("#username").val("");
    var password = $("#password").val("");
    $("#inner-form").fadeIn( 1500, function () {
        $("#inner-form").animate({}, 1000, function () {
           // remember();
             $("#username").focus();
            //Login();
        });
    });
}

//-----------------
//Login..........
function Login() {
    $("#inner-form").animate({ opacity: 1  }, 500, function () {
        $(this).fadeOut(500, function () {
            $(".text_success").animate({ opacity: 1  }, 0, function () {
                $(this).fadeIn(0, function () { });
                setTimeout("window.location.href='index.php'", 3000);
            });

        });
    });
}
function remember() { 
    $.ajax({
        type: "post",   //访问WebService使用Post方式请求
        contentType: "application/json", //WebService 会返回Json类型
        url: "remembersys.php", //调用WebService的地址和方法名称组合 ---- WsURL/方法名
        data: "{}",
        dataType: 'text',
        success: function (result) {     //回调函数，result，返回值
            var u = result;
            if (u != "") {
                $("#username").val(u);
                $("#password").focus();
                $("#check-field").attr("checked", "checked");
            } else {
                $("#username").focus();
                $("#check-field").removeAttr("checked");
            }
        }
    });
}

//var passstate = true;
function submitcheck() {
    var username = $("#username").val();
    var password = $("#password").val();
    var code = $("#Vc_Text").val();
    if (username == "") {
        showError("请输入你的用户名");
        $("#username").focus();
        return false;
    }
    if (password == "") {
        showError("请输入你的密码");
        $("#password").focus();
        return false;
    } else {
        if (password.length < 3) {
            showError("你输入的密码长度不合法");
            $("#password").focus();
            return false;
        }
    } 

    var number = Math.random() + new Date().getMilliseconds();  
    $.ajax({
        type: 'post',
        url: "loginsys.php?number=" + number,
        data: $("#login-form").serializeArray(),
        success: function (result) {
            switch(result){
                case "1": setTimeout("Login()", 500);  break;
                case "2": showError("帐号或者密码错误"); break;
                case "3": showError("帐号已经被停用"); break;
                case "4": showError("请与管理员联系");break;
                case "5": showError("帐号已经被锁定，请通知管理员");break;
                case "6": showError("已经被禁止登录系统");break;
                case "7": showError("没有授权登录系统");break;
                default: showError("未知错误"); break;
            }
        }
    });
    return false;
} 
$(document).ready(function () { 
    begin();
    $("#submit-form").click(function () {
        $('#alert-info').hide();
        submitcheck();
    });
});

  

