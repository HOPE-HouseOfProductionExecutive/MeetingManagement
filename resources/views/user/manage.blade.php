@extends('layout.main')
@section('title', 'Dashboard')
@section('content')

<link rel="stylesheet" href="Assets/css/user/manage/style.css">

<div class="manage_layer">
    <div class="manage_upper">
        <h3>Pengelolaan Data</h3>
        <div class="td_box">
            <p>Tambah Data</p>
        </div>
    </div>
    <div class="tabel_manage">
        <div class="head_tabel">
            <div class="nomor">
                <p>No</p>
            </div>
            <div class="waktu">
                <p>Waktu</p>
            </div>
            <div class="judul">
                <p>Judul</p>
            </div>
            <div class="progres">
                <p>Progres</p>
            </div>
            <div class="status">
                <p>Status</p>
            </div>
            <div class="kosong">

            </div>
        </div>
        <div class="content_tabel">
            <div class="c_nomor">
                <p>1</p>
            </div>
            <div class="c_waktu">
                <p>Senin, 28 Maret 2022</p>
            </div>
            <div class="c_judul">
                <p>Hayo apa Judulnya</p>
            </div>
            <div class="c_progres">
                <p>Sudah dilakukan</p>
            </div>
            <div class="c_status">
                <p>Belum Selesai</p>
            </div>
            <div class="pilihan">
                <div class="ubah_box">
                    <p>ubah</p>
                    <img src="/Assets/icons/pencil-02.png" alt="">
                </div>
                <div class="hapus_box">
                    <p>hapus</p>
                    <img src="/Assets/icons/trash-01.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ////////// --}}
@endsection
