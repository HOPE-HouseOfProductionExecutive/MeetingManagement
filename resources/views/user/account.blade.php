@extends('layout.main')
@section('title', 'Akun')
@section('content')
<link rel="stylesheet" href="/Assets/css/user/account/style.css">

<div class="akun_layer">
    <div class="akun_upper">
        <h3>Akun</h3>
    </div>
    <div class="akun_box">
        <div class="separate">
            <div class="rincian">
                <h2>Rincian</h2>
                <div class="rincian_nama">
                    <p>Nama</p>
                    <div class="nama_box">
                        <h3 class="nb">{{Auth::user()->fullname}}</h3>
                    </div>
                </div>
                <div class="rincian_nama">
                    <p>Email</p>
                    <div class="nama_box">
                        <h3 class="nb">{{Auth::user()->email}}</h3>
                    </div>
                </div>
                <div class="rincian_nama">
                    <p>Jabatan</p>
                    <div class="nama_box">
                        <h3 class="nb">{{Auth::user()->permission->name}}</h3>
                    </div>
                </div>
            </div>
            <div class="pemulihan">
                <h2>Pemulihan Kata Sandi</h2>
                <form action="/update/password" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="password" placeholder="Kata sandi saat ini" name="password">
                    <input type="password" placeholder="Kata sandi baru" name="new_password">
                    <input type="password" placeholder="Konfirmasi Kata sandi baru" name="confirm_password">
                    <div class="konfirm">
                        <button type="submit" style="cursor: pointer;">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
