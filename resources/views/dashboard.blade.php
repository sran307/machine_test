@extends("layout")
@section("title")
dashboard
@endsection
@section("content")
<section>
    <div id="admin-buttons">
        @if(in_array("create_product",$user_role))
            <a href="add_product"><button class="border-button">add product</button></a>
        @endif
        @if(in_array("edit_product",$user_role))
            <a href="edit_product"><button class="border-button">edit product</button></a>
        @endif
        @if(in_array("delete_product",$user_role))
            <button id="delete_product" class="border-button">delete product</button>
        @endif
        @if(in_array("product_list",$user_role))
            <a href="product_list"><button class="border-button">product list</button></a>
        @endif
        @if(in_array("expense_control",$user_role))
            <a href="/expense"><button class="border-button">Expense</button></a>
        @endif
       
    </div>
    <div class="d-flex justify-content-around my-3">
        <a href="/"><button class="border-button">Logout</button></a>
        <a href="/admin_panel"><button class="border-button">return back</button></a>
    </div>
    <div>
        <p id="message"></p>
    </div>
    <div>
        <table class="table table-bordered my-4 d-none" id="product_table">
            <thead>
                <tr>
                    <th>PRODUCT ID</th>
                    <th>PRODUCT NAME</th>
                    <th>PRODUCT COLOR</th>
                    <th>PRODUCT QUANTITY</th>
                    <th>PRODUCT DESCRIPTION</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</section>
@endsection