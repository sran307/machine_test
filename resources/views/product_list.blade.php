@extends("layout")
@section("title")
product listing
@endsection
@section("content")
<section>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Color</th>
                <th>Product Quantity</th>
                <th>Product Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->Name}}</td>
                <td>{{$value->Color}}</td>
                <td>{{$value->Quantity}}</td>
                <td>{{$value->Description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="return-button">
        <a href="/admin_panel"><button class="border-button">admin panel</button></a>
        <a href="/"><button class="border-button">Home</button></a>
        <a href="/inventory"><button class="border-button">return back</button></a>
    </div>
</section>
@endsection