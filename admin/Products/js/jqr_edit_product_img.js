$("document").ready(function() {

    $("#img_link").focusout(function() {
        var img = $("#img_link").val();

        if (img.length == 0) {
            $("#preview").attr("disabled","disabled");
            $("#epi").css("display","contents");
            $("#img_link").addClass("error");
        } else {
            $("#preview").removeAttr("disabled");
            $("#epi").css("display","none");
            $("#img_link").removeClass("error");
        }
    })

    $("#preview").click(function() {

        $("#img").removeClass("hidden");
        var img = $("#img_link").val();
        $("#img").attr("src", img);
    })

    $("#form").submit(function() { // function(e)
    
        // var form = this;
        // e.preventDefault();
        var img = $("#img_link");

        var passed = 0;
    
        if (img.val().length == 0 ) {
            img.addClass("error");
        } else {
            passed++;
        }
    
    
        if (passed == 1) {
            setTimeout(function() {
                return true;
            }, 1)
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