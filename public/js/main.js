
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

});
