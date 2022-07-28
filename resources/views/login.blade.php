<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Assets/css/user/login/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Login | Meeting Management</title>
</head>
<body>
    @if (session('error'))
    <div class="opacity" id="modal">
        <div class="popup">
            <div class="image">
                <img src="/Assets/icons/info-hexagon.svg" alt="">
            </div>
            <div class="text">
                <p>{{session('error')}}</p>
            </div>
        </div>
    </div>

    @endif
    @if(session('success'))
    <div class="opacity" id="modal">
        <div class="popup">
            <div class="image">

                <img src="/Assets/icons/check-verified-01.svg" alt="">
            </div>
            <div class="text">
                <p>{{session('success')}}</p>
            </div>
        </div>
    </div>
    @endif
    <div class="main">
        <div class="content">
            <div class="top">
                <h1>Sistem Monitoring</h1>
                <h1>Tindak Lanjut Rapat </h1>
                <h2>Biro Pembangunan dan Lingkungan Hidup</h2>
            </div>

            <div class="bottom">
                <form action="/login/user" method="post">
                    @csrf
                    <div class="input-placeholder">
                        <label for="email">Email</label>
                        <input autofocus type="email" name="email" id="email" placeholder="Enter Email" >
                    </div>
                    <div class="input-placeholder">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password">
                    </div>

                    <input type="hidden" name="emailf" id="emailf">

                    <button type="submit" name="action" value="login" class="submit-btn" id="submit-login">Login</button>
                    <button type="submit" name="action" value="forgot" class="forgot-btn" id="forgot">Lupa Kata Sandi?</button>
                </form>
            </div>
        </div>

    </div>

</body>
<script>
    $('#email').on('keypress', function() {
        $('#emailf').val($('#email').val());
    });
    $('#forgot').on('click', function(){
        $('#emailf').val($('#email').val());
    });
</script>
<script>
    window.onclick = function(event) {
        const eventModal = event.target.id;
        if(eventModal.includes("modal")){
            const modal = document.getElementById(eventModal);
            modal.style.display = "none";
        }
    }
</script>
</html>
