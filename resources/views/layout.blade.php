<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--for using ajax-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title")</title>
    <!--official bootstrap css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
    <!--main css-->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <!--header-->
    <header id="header">
        <div>
            <h1>task for xfortech private limited</h1>
        </div>
        <div>
            <!--button for showing a modal pop up-->
            <!--if admin is entered we do not need this button so hide it-->
            @if(!session("admin_id"))
                <button class="border-button button1" data-toggle="modal" data-target="#admin_modal">admin panel</button>
            @endif
            <!--creating a modal for verify the admin-->
            <div class="modal fade" id="admin_modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h5>admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="password">This is for admin </label>
                            <input type="password" id="admin_password" placeholder="Enter your password">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark">close</button>
                            <button type="button" id="login" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </div>
            </div>
            <p id="message"></p>
        </div>
    </header>
    <!--end of header-->
    <!--content section-->
    <section class="section">
        @yield("content")
    </section>
    <!--end section-->
    <!--footer-->
    <footer id="footer">
        <div>
            <h2>footer</h2>
        </div>
    </footer>
    <!--end of footer-->
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!--off bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!--main js-->
    <script src="js/main.js"></script>
</body>
</html>