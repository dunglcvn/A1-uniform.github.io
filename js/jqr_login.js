$("document").ready(function() {
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

    $("#form").submit(function() {
    
        var username = $("#username");
        var pwd = $("#pwd")
    
        var passed = 0;
    
    
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
    
    
        if (passed == 2) {
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
})

