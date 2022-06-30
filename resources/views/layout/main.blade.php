<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Assets/css/layout/style.css">
    <script src=""></script>
    <title>@yield('title')</title>
</head>
<body>
    <div class="main">
        <div class="nav-left">

        </div>
        <div class="session-info">
            <div class="left">
                <div class="time" id="time"></div>
            </div>
            <div class="right">
                <a href="#">Logout</a>
            </div>
        </div>
        <div class="main-content">
            @yield('content')
        </div>
    </div>
</body>
<script type="text/javascript">
    function showtime(){
        const weekday = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        var fulldate = new Date();
        var day = date.getDate();
        let hari = weekday[day];
        //   date.getDay();
        //   date.getFullYear(),
        //   date.getMonth(),
        //   date.getDate(),
        //   date.getHours(),
        //   date.getMinutes(),
        //   date.getSeconds()
        // ));

        document.getElementById('time').innerHTML = hari;
    }
    setInterval(showtime, 1000);
</script>
</html>

