$("document").ready(function() {

$("#pwd").popover({ // lay datacontent cho popover tu div trong html
    html: true,
    content: function() {
        return $("#popover-body").html();
    }
})

$("#pwd").popover();

$(".popover-pwd-strength").css("height","5px");

$("#pwd").keyup(function() {
    checkStrengPwd($("#pwd").val());
    
    var capslock = event.getModifierState("CapsLock"); // capslock Detect
    if (capslock) {
        $("#pwd").tooltip();
        $(".caps-lock-warning1").css("display","block");
    } else {
        $(".caps-lock-warning1").css("display","none");
    }
})

function checkStrengPwd(password) {
    var passed = 0;

    if (password.length > 5) {
        passed++;
    }

    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
        passed++;
    }

    if (password.match(/([a-zA-Z])/) || password.match(/([0-9])/)) {
        passed++;
    }

    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
        passed++;
    }

    if (password.length === 0) {
        $("#pwd").attr("data-original-title","Password Strength :");
        $(".popover-pwd-strength").css("background-color","white");
    }

    if (passed < 2 && passed != 0 || passed == 1) {
        $(".popover-pwd-strength").removeClass("hidden");
        $("#pwd").attr("data-original-title","Password Strength : Weak");
        $(".popover-pwd-strength").css("background-color","red");
        $(".popover-pwd-strength").css("width","33%");
    }

    if (passed == 3) {
        $(".popover-pwd-strength").removeClass("hidden");
        $("#pwd").attr("data-original-title","Password Strength : Medium");
        $(".popover-pwd-strength").css("background-color","orange");
        $(".popover-pwd-strength").css("width","66%");
    }

    if (passed > 3) {
        $(".popover-pwd-strength").removeClass("hidden");
        $("#pwd").attr("data-original-title","Password Strength : Strong");
        $(".popover-pwd-strength").css("background-color","green");
        $(".popover-pwd-strength").css("width","100%");
    }

    $("#pwd").popover("show");
}

$("#pwd-confirm").keyup(function() {

    var capslock = event.getModifierState("CapsLock"); // capslock Detect
    if (capslock) {
        
        $(".caps-lock-warning2").css("display","block");
    } else {
        $(".caps-lock-warning2").css("display","none");
    }
})

$(".fname").focusout(function() { // validate first name
    
    var fname = $(".fname").val();

    if (fname.length == 0) {
        $("#e1").css("display","contents");
        $(".fname").addClass("error");
    } else {
        $("#e1").css("display","none");
        $(".fname").removeClass("error");
    }
})

$(".lname").focusout(function() { // validate last name

    var lname = $(".lname").val();

    if (lname.length == 0) {
        $("#e2").css("display","contents");
        $(".lname").addClass("error");
    } else {
        $("#e2").css("display","none");
        $(".lname").removeClass("error");
    }
})

$("#email").focusout(function() { // validate email

    var email = $("#email").val();

    if (email.length == 0) {
        $("#e3").css("display","contents");
        $("#email").addClass("error");
    } else {
        $("#e3").css("display","none");
        $("#email").removeClass("error");
    }
})

$("#phone").focusout(function() { // validate phone number

    var phone = $("#phone").val();

    if (phone.length == 0) {
        $("#e4").css("display","contents");
        $("#phone").addClass("error");
    } else {
        $("#e4").css("display","none");
        $("#phone").removeClass("error");
    }

    if (!$.isNumeric(phone) && phone.length != 0) {
        $("#e5").css("display","contents");
        $("#phone").addClass("error1");
    } else {
        $("#e5").css("display","none");
        $("#phone").removeClass("error1");
    }
})

$("#username").focusout(function() { // validate username

    var username = $("#username").val();

    if (username.length == 0) {
        $("#e6").css("display","contents");
        $("#username").addClass("error");
    } else {
        $("#e6").css("display","none");
        $("#username").removeClass("error");
    }
})

$("#pwd").focusout(function() { // validate pwd
    
    var pwd = $("#pwd").val();

    if (pwd.length == 0) {
        $("#e7").css("display","contents");
        $("#pwd").addClass("error");
    } else {
        $("#e7").css("display","none");
        $("#pwd").removeClass("error");
    }
})

$("#pwd-confirm").focusout(function() { // check confirm-pwd

    var pwd = $("#pwd").val();
    var rePwd = $("#pwd-confirm").val();

    if (pwd === rePwd) {
        $(".check-confirm-pwd").css("display","none");
        $("#pwd-confirm").removeClass("error");
    } else {
        $(".check-confirm-pwd").css("display","contents");
        $("#pwd-confirm").addClass("error");
    }
})

$("#address").focusout(function() { // validate address

    var add = $("#address").val();

    if (add.length == 0) {
        $("#e9").css("display","contents");
        $("#address").addClass("error");
    } else {
        $("#e9").css("display","none");
        $("#address").removeClass("error");
    }
})

$("#form").submit(function() {
    
    var fname = $(".fname");
    var lname = $(".lname");
    var email = $("#email");
    var phone = $("#phone");
    var username = $("#username");
    var pwd = $("#pwd")
    var cfpwd = $("#pwd-confirm");
    var add = $("#address");

    var passed = 0;

    if (fname.val().length == 0 ) {
        fname.addClass("error");
    } else {
        passed++;
    }

    if (lname.val().length == 0) {
        lname.addClass("error");
    } else {
        passed++;
    }

    if (email.val().length == 0) {
        email.addClass("error");
    } else {
        passed++;
    }

    if (phone.val().length == 0) {
        phone.addClass("error");
    } else {
        passed++;
    }

    if (username.val().length == 0) {
        username.addClass("error");
    } else {
        passed++;
    }

    if (pwd.val().length == 0) {
        pwd.addClass("error");
    } else {
        passed++;
    }

    if (cfpwd.val().length == 0) {
        cfpwd.addClass("error");
    } else {
        passed++;
    }

    if (add.val().length == 0) {
        add.addClass("error");
    } else {
        passed++;
    }

    if (passed == 8) {
        return true;
    } else {
        $(".alert").css("display","block");
        setTimeout(function() {
            $(".alert").addClass("fade-out-top");
        }, 2500);
        $(".alert").removeClass("fade-out-top");
        return false;
    }
})

});