<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=1280">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link rel="stylesheet" href="{{asset("css/header.css")}}">
    <link rel="stylesheet" href="{{asset("css/footer.css")}}">
    <link rel="stylesheet" href="{{asset("css/home.css")}}">
    <link rel="stylesheet" href="{{asset("css/login.css")}}">
    <link rel="stylesheet" href="{{asset("css/register.css")}}">
    <link rel="stylesheet" href="{{asset("css/table.css")}}">
    <link rel="stylesheet" href="{{asset("css/form.css")}}">
    <link rel="stylesheet" href="{{asset("css/profile.css")}}">
    <link rel="stylesheet" href="{{asset("css/mailbox.css")}}">
    <script type="text/javascript" src="{{asset("js/scripts.js")}}" ></script>
    <script type="text/javascript" src="{{asset("js/form.js")}}" ></script>
    <title>{{$title}}</title>
</head>
<body id="body">
   <div class="wrapper">
       <div class="content">
           {{ $slot }}
           <div>

           </div>
       </div>
   </div>
</body>
</html>