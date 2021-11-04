@extends("layout")
@section("title")
user login 
@endsection
@section("content")
<section>
    @if(session()->has("message"))
    <div class="alert alert-danger">
        {{session()->get("message")}}      
    </div>
    @endif
    <form action="/user_login_form" method="post">
    @csrf
        <div class="row">
            <div class="col-md-5">
                <input type="text" name="user_email" placeholder="Enter your login email" class="form-control my-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <input type="password" name="user_password" placeholder="Enter your password" class="form-control my-4">
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-outline-primary">Login</button>
        </div>
    </form>
</section>
@endsection