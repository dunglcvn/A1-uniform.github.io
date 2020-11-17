$("document").ready(function() {

    $("#cuPwd").keyup(function() {

        var capslock = event.getModifierState("CapsLock"); // capslock Detect

        if (capslock) {
            $("#cuPwd").tooltip();
            $(".caps-lock-warning1").css("display","block");
        } else {
            $(".caps-lock-warning1").css("display","none");
        }
    })

    $("#cuPwd").focusout(function() { // Validate Current Password
        var cuPwd = $("#cuPwd").val();
    
        if (cuPwd.length == 0) {
            $("#ea1").css("display","contents");
            $("#cuPwd").addClass("error");
        } else {
            $("#ea1").css("display","none");
            $("#cuPwd").removeClass("error");
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

    $("#form").submit(function() { // function(e)
    
        // var form = this;
        // e.preventDefault();
        var cuPwd = $("#cuPwd");
        var email = $("#email");
        var phone = $("#phone");
    
        var passed = 0;
    
        if (cuPwd.val().length == 0) {
            cuPwd.addClass("error");
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
    
        if (!$.isNumeric(phone.val()) && phone.val().length != 0) {
            phone.addClass("error");
        } else {
            passed++;
        }

        if (passed == 4) {
            return true;
            // setTimeout(function () {
            //     form.submit();
            // }, 3000);    
        } else {
            $(".alert").css("display","block");
            setTimeout(function() {
                $(".alert").addClass("fade-out-top");
            }, 2500);
            $(".alert").removeClass("fade-out-top");
            return false;
        }
    })
})