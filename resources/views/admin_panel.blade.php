@extends("layout")
@section("title")
Admin Panel
@endsection
@section("content")
<section class="section">
    <div>
        <h5>welcome admin {{$name}}</h5>
    </div>
    <div id="admin-buttons">
        <a href="inventory"><button class="border-button">inventory management</button></a>
        <a href="expense"><button class="border-button">expense management</button></a>
        <a href="add_user"><button class="border-button">add user</button></a>
        <a href="/"><button class="border-button">Logout</button></a>
    </div>
</section>

@endsection