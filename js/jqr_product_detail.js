$("document").ready(function () {

    if ($("#quantity").val() == 1) {
        $("#sub").attr("disabled", "disabled");
    }

    $("#sub").click(function () {
        let sub = $("#quantity").val();
        $("#quantity").val(--sub);
        if (sub == 1) {
            $("#sub").attr("disabled", "disabled");
        }
    })

    $("#add").click(function () {
        let add = $("#quantity").val();

        $("#quantity").val(++add);
        if (add != 1) {
            $("#sub").removeAttr("disabled");
        }
    })

    var img = $(".img");
    var imgPrimary = $("#imgPrimary");
    img.each(function (i) {
        img.eq(i).click(function () {
            imgPrimary.attr("src", img.eq(i).attr("src"));
            imgPrimary1.attr("src", img.eq(i).attr("src"));
        })
        img.eq(i).mouseenter(function () {
            img.eq(i).addClass("red");
        })
        img.eq(i).mouseleave(function () {
            img.eq(i).removeClass("red");
        })
    })

    var img1 = $(".img1");
    var imgPrimary1 = $("#imgPrimary1");
    img1.each(function (i) {
        img1.eq(i).click(function () {
            imgPrimary1.attr("src", img1.eq(i).attr("src"));
        })
        img1.eq(i).mouseenter(function () {
            img1.eq(i).addClass("red");
        })
        img1.eq(i).mouseleave(function () {
            img1.eq(i).removeClass("red");
        })
    })

    imgPrimary.click(function () {
        imgPrimary1.attr("src", imgPrimary.attr("src"));
    })

    $("#buy").click(function () {
        var username = $("#username").text();
        var quantity = $("#quantity").val();
        var name = $("#name").text();
        var color = $("#color").text();
        var size = $("#size").val();
        var price = $("#price").text();
        window.alert
        (
                "You have buy: "
                + "\n\n\t\t\tName: "
                + name
                + "\n\n\t\t\tColor: "
                + color
                + "\n\n\t\t\tSize: "
                + size
                + "\n\n\t\t\tPrice: "
                + price
                + "\n\n\t\t\tQuantity: "
                + quantity
                + "\n\n\n\tTHANKS YOU FOR BUYING OUR PRODUCT ! HAVE A GOOD DAY, "
                + username
                + " !"
        );
    })

    $("#buy_without_user").click(function() {

        window.alert("PLEASE SIGN IN TO BUY !");
    })
})