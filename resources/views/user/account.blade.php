@extends('layout.main')
@section('title', 'Dashboard')
@section('content')

<link rel="stylesheet" href="/Assets/css/user/account/style.css">

<div class="akun_layer">
    <div class="akun_box">
        <div class="akun_upper">
            <h3>Akun</h3>
        </div>
        <div class="akun_detail">
            <div class="akun_kiri">
                <div class="nama">
                    <p>Nama Lengkap</p>
                    <p>Muhammad Maulana Ibrahimovic</p>
                </div>
                <div class="bod">
                    <p>Tanggal Lahir</p>
                    <p>3 Maret 1997</p>
                </div>
            </div>
            <div class="akun_kanan">
                <div class="email">
                    <p>Email</p>
                    <p>maulana.pegawaiumum@yahoo.com</p>
                </div>
                <div class="password">
                    <p>Ubah Kata Sandi</p>
                    <form action="">
                        <input type="text" placeholder="Kata sandi saat ini">
                        <input type="text" placeholder="Kata sandi baru">
                        <input type="text" placeholder="Konfirmasi Kata sandi baru">
                            <div class="konfirmasi">
                                <input type="submit" value="Konfirmasi">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ////////// --}}
@endsection