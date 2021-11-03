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
        <button class="border-button">edit product</button>
        <button class="border-button">delete product</button>
        <button class="border-button">product list</button>
    </div>
@endsection