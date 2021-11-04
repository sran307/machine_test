@extends("layout")
@section("tittle")
Add user 
@endsection
@section("content")
<section>
    <p class="message"></p>
    <form>
        <legend class="col-form-label">ADD USER</legend>
        <div class="row form-group">
            <label for="name" class="col-md-2 col-form-label">User name</label>
            <div class="col-md-6">
                <input type="text" name="user_name" placeholder="Enter user name" class="form-control" required>
                <p class="error error1"></p>
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-md-2 col-form-label">Email id</label>
            <div class="col-md-6">
                <input type="email" name="email_id" class="form-control" placeholder="Enter your email id" required>
                <p class="error error2"></p>
            </div>
        </div>
        <div class="row form-group">
            <label for="password" class="col-md-2 col-form-label">Password</label>
            <div class="col-md-6">
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                <p class="error error3"></p>
            </div>
        </div>
        <fieldset class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label for="gender" class="col-form-label">Gender</label>
                </div>
                <div class="col-md-3">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="gender" value="male" checked>
                        <label for="male" class="form-check-label">Male</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="gender" value="female">
                        <label for="female" class="form-check-label">Female</label>
                    </div>
                </div>
                <p class="error error4"></p>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label for="user-role" class="col-form-label">User Role</label>
                </div>
                <div class="col-lg-1 col-md-2">
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input mx-2" name="user_role[]" value="create_product">
                        <label for="create_product" class="form-check-label">Product Creator</label>
                    </div>
                </div>
                <div class="col-lg-1 col-md-2">
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input mx-2" name="user_role[]" value="edit_product">
                        <label for="edit_product" class="form-check-label">Product Editor</label>
                    </div>
                </div>
                <div class="col-lg-1 col-md-2">
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input mx-2" name="user_role[]" value="delete_product">
                        <label for="delete_product" class="form-check-label">Product Removar</label>
                    </div>
                </div>
                <div class="col-lg-1 col-md-2">
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input mx-2" name="user_role[]" value="product_list">
                        <label for="product_list" class="form-check-label">Product Lister</label>
                    </div>
                </div>
                <div class="col-lg-1 col-md-2">
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input mx-2" name="user_role[]" value="expense_control">
                        <label for="expense_control" class="form-check-label">Expense Controller</label>
                    </div>
                   
                </div>
                <p class="error error5 mx-4"></p>
               </div>
            </div>
        </fieldset>
        <div class="col-md-8 submit-button my-5">
            <button id="add-user-button" class="btn btn-outline-primary">Add User</button>
        </div>
    </form>
    <div class="return-button">
        <a href="/admin_panel"><button class="border-button">admin panel</button></a>
        <a href="/"><button class="border-button">Home</button></a>
        <a href="/inventory"><button class="border-button">return back</button></a>
    </div>
</section>
@endsection