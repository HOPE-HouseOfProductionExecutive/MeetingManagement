<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Assets/css/layout/style.css">
    {{-- Boxicons CDN --}}
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    {{-- JQUERY Ajax --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    <input type="checkbox" class="checkboxx" id="click" hidden>
    <div class="main">
        <div class="nav-left aktip">
            <div class="sidebar-heading">
                <p>Halo, {{Auth::user()->fullname}}</p>
                <label for="click">
                    <i class='bx bx-menu' style="color: #fff;" id = 'ham-btn'></i>
                </label>
            </div>
            <ul class="navlist">
                <li>
                    <a href="/">
                        <img src="/Assets/icons/home-02.svg" alt="">
                        <img class="hover" src="/Assets/icons/home.svg" alt="">
                        <span class="links">Beranda</span>
                    </a>
                    {{-- <span class="tooltip">Beranda</span> --}}
                </li>
                @if (Auth::user()->permission->name == 'Admin' || Auth::user()->permission->name == 'Master')
                <li>
                    <a href="/manage">
                        <img src="/Assets/icons/file-02.svg" alt="">
                        <img class="hover" src="/Assets/icons/file-01.svg" alt="">
                        <span class="links">Pengelolaan</span>
                    </a>
                    {{-- <span class="tooltip">Pengelolaan</span> --}}
                </li>
                @endif
                <li>
                    <a href="/search-data">
                        <img src="/Assets/icons/search-lg.svg" alt="">
                        <img class="hover" src="/Assets/icons/search-lg-02.svg" alt="">
                        <span class="links">Pencarian</span>
                    </a>
                    {{-- <span class="tooltip">Pencarian</span> --}}
                </li>
                @if (Auth::user()->permission->name == 'Master')
                <li>
                    <a href="/register">
                        <img src="/Assets/icons/users-plus.svg" alt="">
                        <img class="hover" src="/Assets/icons/users-plus1.svg" alt="">
                        <span class="links">Registrasi</span>
                    </a>
                    {{-- <span class="tooltip">Akun</span> --}}
                </li>
                @endif
                <li>
                    <a href="/account">
                        <img src="/Assets/icons/user-01.svg" alt="">
                        <img class="hover" src="/Assets/icons/user-02.svg" alt="">
                        <span class="links">Akun</span>
                    </a>
                    {{-- <span class="tooltip">Akun</span> --}}
                </li>
                <li>
                    <a href="/userguide">
                        <img src="/Assets/icons/file-question-white.svg" alt="">
                        <img class="hover" src="/Assets/icons/file-question-blue.svg" alt="">
                        <span class="links">Bantuan</span>
                    </a>
                    {{-- <span class="tooltip">Akun</span> --}}
                </li>
            </ul>


        </div>
        <div class="session-info">
            <div class="left">
                <div class="date"><p id="date"></p></div>
                <div class="time"><p id="time"></p></div>
            </div>
            <div class="right">
                <a href="/logout">Logout</a>
            </div>
        </div>
        <div class="main-content">
            @yield('content')
        </div>
    </div>
</body>
<script type="text/javascript">
    function showtime(){
        const months = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        const weekdays = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

        var fulldate = new Date();
        let str = "";
        let str1 = "";

        let temp = "";
        let temp1 = "";
        let temp2 = "";

        let day = weekdays[fulldate.getDay()];
        let month = months[fulldate.getMonth()];

        let hour = fulldate.getHours();
        if(hour<10) {
            temp = temp + "0" + hour;
        }
        else {
            temp = temp + hour;
        }

        let minute = fulldate.getMinutes();
        if(minute<10) {
            temp1 = temp1 + "0" + minute;
        }
        else {
            temp1 = temp1 + minute;
        }

        let second = fulldate.getSeconds();
        if(second<10) {
            temp2 = temp2 + "0" + second;
        }
        else {
            temp2 = temp2 + second;
        }

        str = str + day + ", " + fulldate.getDate() + " " + month + " " + fulldate.getFullYear();
        str1 = str1 + temp + ":" + temp1 + ":" + temp2;

        document.getElementById('date').innerHTML = str;
        document.getElementById('time').innerHTML = str1;
    }
    showtime();
    setInterval(showtime, 1000);

</script>
<script type="text/javascript">
    let btn = document.querySelector('#ham-btn');
    let sidebar = document.querySelector('.nav-left');

    btn.onclick = function(){
        sidebar.classList.toggle("aktip");
        document.getElementsByClassName("main").style.gridTemplateColumns  = "20rem 1fr";
    }

</script>
</html>

