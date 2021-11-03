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
</section>
@endsection