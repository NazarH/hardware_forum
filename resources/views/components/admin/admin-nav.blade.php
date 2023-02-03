<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=1920">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/table.css')}}">
    <script type="text/javascript" src="{{asset("js/app.js")}}" ></script>
    <script type="text/javascript" src="{{asset("js/admin.js")}}" ></script>
    <title>HardwareForum - адмін-панель</title>
</head>
<body>
    <div class="admin">
        <div class="admin__nav">
            <div class="admin__user">
                <div>
                    {{Auth::user()->name.' '.Auth::user()->surname}}
                </div>
                <div>
                    <a href="/" class="main-page-redirect">Назад</a>
                </div>
            </div>
            <ul class="admin__list">
                <a href="{{route('admin.forums')}}">Тематичні форуми</a>
                <a href="{{route('admin.posts')}}">Пости</a>
                <a href="{{route('admin.messages')}}">Повідомлення в постах</a>
                <a href="{{route('admin.users')}}">Користувачі</a>
                <a href="{{route('admin.usersmess')}}">Листування користувачів</a>
            </ul>
        </div>
        <div class="admin__content">
            {{$slot}}
        </div>
    </div>
</body>
</html>
