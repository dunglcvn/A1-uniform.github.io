$("document").ready(function() {

    $("#type").focusout(function() {

        var type =  $("#type").val();

        if (type.length == 0) {
            $("#ec1").css("display","contents");
            $("#type").addClass("error");
        } else {
            $("#ec1").css("display","none");
            $("#type").removeClass("error");
        }

        
        if (type.match(/\d+/gm) && type.length != 0) {
            $("#ec2").css("display","contents");
            $("#type").addClass("error1");
        } else {
            $("#ec2").css("display","none");
            $("#type").removeClass("error1");
        }
    })

    $("#form").submit(function() { // function(e)
    
        // var form = this;
        // e.preventDefault();
        var type = $("#type");
    
        var passed = 0;
    
        if (type.val().length == 0 ) {
            type.addClass("error");
        } else {
            passed++;
        }
    
        if (type.val().match(/\d+/gm)) {
            type.addClass("error");
        } else {
            passed++;
        }

        if (passed == 2) {
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