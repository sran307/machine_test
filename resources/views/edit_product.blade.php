@extends("layout")
@section("title")
Edit product form
@endsection
@section("content")
<section>
    @if(session()->has("success_message"))
    <div class="alert alert-success my-4">
        {{session()->get("success_message")}}
    </div>
    @elseif(session()->has("error_message"))
    <div class="alert alert-danger my-4">
        {{session()->get("error_message")}}
    </div>
    @endif
    <form action="/edit_product_data" method="POST">
    @csrf
        <legend class="col-form-label">EDIT PRODUCT</legend>
        <div class="row form-group">
            <label for="product name" class="col-sm-2">PRODUCT ID</label>
            <div class="col-md-5">
                <select name="product_id" class="form-control" id="select-product">
                    <option value="null">Select a product id</option>
                    @foreach($data as $value)
                    <option value={{$value->id}}>{{$value->id}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row form-group">
            <label for="product name" class="col-sm-2">PRODUCT NAME</label>
            <div class="col-md-5">
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter product name" required>
            </div>
        </div>
        <div class="row form-group">
            <label for="product color" class="col-sm-2">PRODUCT COLOR</label>
            <div class="col-md-5">
                <input type="text" name="product_color" id="product_color" class="form-control" placeholder="Enter product color" required>
            </div>
        </div>
        <div class="row form-group">
            <label for="product quantity" class="col-sm-2">AVAILABLE QUANTITY</label>
            <div class="col-md-5">
                <input type="text" name="product_quantity" id="available_quantity" class="form-control" placeholder="Enter the quantity" required>
            </div>
        </div>
        <div class="row form-group">
            <label for="product drescription" class="col-sm-2">PRODUCT DESCRIPTION</label>
            <div class="col-md-5">
                <textarea row="4" column="10" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" required></textarea>
            </div>
        </div>
        <div class="col-md-10 submit-button">
            <button type="submit" class="border-button">edit product</button>
        </div>
    </form>
    <div class="return-button">
        <a href="/admin_panel"><button class="border-button">admin panel</button></a>
        <a href="/"><button class="border-button">Home</button></a>
    </div>
</section>
@endsection