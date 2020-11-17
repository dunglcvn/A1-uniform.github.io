$("document").ready(function() {

    $("#form").submit(function() {

        if (window.confirm("Are you sure you want to delete this Product Image?")) {
            window.alert("Success!");
            return true;
        } else {
            return false;
        }
    })


})