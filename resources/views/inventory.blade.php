@extends("layout")
@section("tilte")
inventory
@endsection
@section("content")
<section class="section">
    <div>
        <h5>Inventory management</h5>
    </div>
    <div id="admin-buttons">
        <a href="add_product"><button class="border-button">add product</button></a>
        <a href="edit_product"><button class="border-button">edit product</button></a>
        <button id="delete_product" class="border-button">delete product</button>
        <a href="product_list"><button class="border-button">product list</button></a>
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
            <tbody>

            </tbody>
        </table>
    </div>
@endsection