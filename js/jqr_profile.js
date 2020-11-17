$("document").ready(function() {

    var updateInfo = $("#updateInfo");
    var information1 = $("#information1");

    $("#name").focusout(function() { // Validate Name
        var name = $("#name").val();
    
        if (name.length == 0) {
            $("#em1").css("display","contents");
            $("#name").addClass("error");
        } else {
            $("#em1").css("display","none");
            $("#name").removeClass("error");
        }
    })

    $("#phone").focusout(function() { // Validate Name
        var phone = $("#phone").val();
    
        if (phone.length == 0) {
            $("#em2").css("display","contents");
            $("#phone").addClass("error");
        } else {
            $("#em2").css("display","none");
            $("#phone").removeClass("error");
        }

        if (!$.isNumeric(phone) && phone.length != 0) {
            $("#em3").css("display","contents");
            $("#phone").addClass("error1");
        } else {
            $("#em3").css("display","none");
            $("#phone").removeClass("error1");
        }
    })

    $("#email").focusout(function() { // Validate Name
        var email = $("#email").val();
    
        if (email.length == 0) {
            $("#em4").css("display","contents");
            $("#email").addClass("error");
        } else {
            $("#em4").css("display","none");
            $("#email").removeClass("error");
        }
    })

    $("#address").focusout(function() { // Validate Name
        var address = $("#address").val();
    
        if (address.length == 0) {
            $("#em5").css("display","contents");
            $("#address").addClass("error");
        } else {
            $("#em5").css("display","none");
            $("#address").removeClass("error");
        }
    })


    $("#form1").submit(function() {
        var name = $("#name");
        var phone = $("#phone");
        var email = $("#email");
        var address = $("#address");

        var passed = 0;

        if (name.val().length == 0) {
            name.addClass("error");
        } else {
            passed++;
        }

        if (phone.val().length == 0) {
            phone.addClass("error");
        } else {
            passed++;
        }

        if (!$.isNumeric(phone.val()) && phone.val().length != 0) {
            $("#phone").addClass("error");
        } else {
            passed++;
        }

        if (email.val().length == 0) {
            email.addClass("error");
        } else {
            passed++;
        }

        if (address.val().length == 0) {
            address.addClass("error");
        } else {
            passed++;
        }

        if (passed == 5) {
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