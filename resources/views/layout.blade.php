<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <button class="border-button button1">add user</button>
        </div>
    </header>
    <!--end of header-->
    <!--content section-->
    <section id="section">
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

</body>
</html>