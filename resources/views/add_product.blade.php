@extends("layout")
@section("title")
add product
@endsection
@section("content")
<section>
    <form id="product_form" action="/add_product_form" method="post">
    @csrf
        <legend class="col-form-label">ADD PRODUCT</legend>
        <div class="row form-group">
            <label for="product name" class="col-sm-2">PRODUCT NAME</label>
            <div class="col-md-5">
                <input type="text" name="product_name" class="form-control" placeholder="Enter product name" required>
            </div>
        </div>
        <div class="row form-group">
            <label for="product color" class="col-sm-2">PRODUCT COLOR</label>
            <div class="col-md-5">
                <input type="text" name="product_color" class="form-control" placeholder="Enter product color" required>
            </div>
        </div>
        <div class="row form-group">
            <label for="product quantity" class="col-sm-2">AVAILABLE QUANTITY</label>
            <div class="col-md-5">
                <input type="text" name="available_quantity" class="form-control" placeholder="Enter the quantity" required>
            </div>
        </div>
        <div class="row form-group">
            <label for="product drescription" class="col-sm-2">PRODUCT DESCRIPTION</label>
            <div class="col-md-5">
                <textarea row="4" column="10" name="product_description" class="form-control" placeholder="Enter product description" required></textarea>
            </div>
        </div>
        <div class="col-md-10 submit-button">
            <button type="submit" class="border-button">add product</button>
        </div>
    </form>
    @if(session()->has("success_message"))
    <div class="alert alert-success my-4">
        {{session()->get("success_message")}}
    </div>
    @elseif(session()->has("error_message"))
    <div class="alert alert-danger my-4">
        {{session()->get("error_message")}}
    </div>
    @endif
</section>

@endsection