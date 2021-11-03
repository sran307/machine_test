
$(document).ready(function () {
    $(document).on("click","#login",function (e) {
        e.preventDefault();
        var data={
            "password":$("#admin_password").val(),
        };
        $("#admin_modal").modal("hide");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/admin",
            data:data,
            dataType: "json",
            success: function (response) {
                if(response.status==200){
                    $("#message").text(response.message);
                    $("#message").removeClass("alert alert-danger");
                    $("#message").addClass("alert alert-success");
                    window.location.href="/admin_panel";
                }else{
                    $("#message").text(response.message);
                    $("#message").removeClass("alert alert-success");
                    $("#message").addClass("alert alert-danger");
                }
            },error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    });
    //product edit
    $(document).on("change","#select-product", function (e) {
        e.preventDefault();
        var data={
            "id":$("#select-product").val()
        }
        //alert($("#select-product").val());
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/fetch_edit_product",
            data: data,
            dataType: "json",
            success: function (response) {
                //console.log(response.name);
                //assigning value to each field
                $("#product_name").val(response.name);
                $("#product_color").val(response.color);
                $("#available_quantity").val(response.quantity);
                $("#product_description").val(response.description);
            }
        });
    });

});
