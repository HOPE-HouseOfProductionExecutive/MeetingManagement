@extends('layout.main')
@section('title', 'Dashboard')
@section('content')

<link rel="stylesheet" href="/Assets/css/user/account/style.css">

<div class="akun_layer">
    <div class="akun_upper">
        <h3>Akun</h3>
    </div>
    <div class="akun_box">
        <div class="box_upper">
             <p>Rincian</p>
             <p class="pr">Pemulihan Kata Sandi</p>
        </div>
        <div class="separate">
            <div class="rincian">
             <div class="rincian_nama">
                 <p>Nama</p>
                 <div class="nama_box">
                     <h3 class="nb">Irvan Nur Hidayat</h3>
                 </div>
             </div>
             <div class="rincian_nama">
                 <p>Email</p>
                 <div class="nama_box">
                     <h3 class="nb">irvan@gmail.com</h3>
                 </div>
             </div>
             <div class="rincian_nama">
                 <p>Jabatan</p>
                 <div class="nama_box">
                     <h3 class="nb">Admin</h3>
                 </div>
             </div>
            </div>
            <div class="pemulihan">
             <form action="">
                 <input type="text" placeholder="Kata sandi saat ini">
                 <input type="text" placeholder="Kata sandi baru">
                 <input type="text" placeholder="Konfirmasi Kata sandi baru">
                <div class="konfirm">
                    <button>Konfirmasi</button>
                </div>
             </form>
            </div>
        </div>
    </div>
</div>

{{-- ////////// --}}
@endsection