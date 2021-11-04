
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
    //delete a product
    function delete_function(){
        $("#product_table").addClass("d-block");
        $.ajax({
            type: "get",
            url: "delete_product",
            success: function (response) {
                $("tbody").html("");
                $.each(response.data, function (key, value) { 
                    $("tbody").append('<tr>\
                    <td>'+value.id+'</td>\
                    <td>'+value.Name+'</td>\
                    <td>'+value.Color+'</td>\
                    <td>'+value.Quantity+'</td>\
                    <td>'+value.Description+'</td>\
                    <td><button value='+value.id+'  class="btn-primary delete_product_item">Delete</button></td>\
                    </tr>');
                });
               
            }
        });
    }
    $(document).on("click","#delete_product", function (e) {
        e.preventDefault();
        delete_function();
    });
     //deleting product item
    $(document).on("click",".delete_product_item", function (e) {
        e.preventDefault();
        var id=$(this).val();
        //alert(id);
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "delete",
            url: "/delete_data/"+id,
            success: function (response) {
                if(response.status==200){
                    $("#message").removeClass("alert alert-danger");
                    $("#message").addClass("alert alert-success");
                    $("#message").text(response.message);
                }else{
                    $("#message").removeClass("alert alert-success");
                    $("#message").addClass("alert alert-danger");
                    $("#message").text(response.message);
                }
                delete_function();
            }
        });
    });
    //adding new user
    $(document).on("click","#add-user-button", function (e) {
        e.preventDefault();
        //check box values
        var val=[];
        $(":checkbox:checked").each(function(i){
            val[i]=$(this).val();
        })
        var data={
            "name":$("input[name='user_name']").val(),
            "email":$("input[name='email_id']").val(),
            "password":$("input[name='password']").val(),
            "gender":$("input[name='gender']").val(),
            "user_role":val
        }
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/add_user_data",
            data: data,
            dataType: "json",
            success: function (response) {
                //console.log(response.errors);
                if(response.status==400){
                    $(".error").html("");
                    if(response.errors.name!=undefined){
                        $(".error1").addClass("alert alert-danger");
                        $(".error1").text(response.errors.name);
                    }else{
                        $(".error1").removeClass("alert alert-danger");
                    }
                    if(response.errors.email!=undefined){
                        $(".error2").addClass("alert alert-danger");
                        $(".error2").text(response.errors.email);
                    }else{
                        $(".error2").removeClass("alert alert-danger");
                    }
                    if(response.errors.password!=undefined){
                        $(".error3").addClass("alert alert-danger");
                        $(".error3").text(response.errors.password);
                    }else{
                        $(".error3").removeClass("alert alert-danger");
                    }
                    if(response.errors.gender!=undefined){
                        $(".error4").addClass("alert alert-danger");
                        $(".error4").text(response.errors.gender);
                    }else{
                        $(".error4").removeClass("alert alert-danger");
                    }
                    if(response.errors.user_role!=undefined){
                        $(".error5").addClass("alert alert-danger");
                        $(".error5").text(response.errors.user_role);
                    }else{
                        $(".error5").removeClass("alert alert-danger");
                    };
                }else if(response.status==200){
                    $(".message").removeClass("alert alert-danger");
                    $(".message").addClass("alert alert-success");
                    $(".message").text(response.message);
                }else if(response.status==404){
                    $(".message").removeClass("alert alert-success");
                    $(".message").addClass("alert alert-danger");
                    $(".message").text(response.message);
                }

            },error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    });

});
