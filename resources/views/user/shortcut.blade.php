@extends('layout.main')
@section('title', 'Dashboard')
@section('content')

<link rel="stylesheet" href="Assets/css/user/shortcut/style.css">

<div class="shortcut_layer">
    <div class="shortcut_upper">
        <h3>Pencarian Data Rapat</h3>
    </div>
    <div class="shortcut_box">
        <div class="shortcut_waktu">
            <p>Waktu Rapat</p>
            <form action="">
                <input type="date" id="birthday" name="birthday">
            </form>
        </div>
        <div class="shortcut_status">
            <p>Status Rapat</p>
            <form action="">
            <select name="status" id="status">
                <option value="selesai">Selesai</option>
                <option value="belum_selesai">Belum Selesai</option>
            </select>
            </form>
        </div>
        <div class="shortcut_mencari">
            <h3>Mencari</h3>
        </div>
    </div>

</div>

<div class="shortcut_hasil_layer">
    <div class="shortcut_judul">
        <p>Judul Rapat</p>
        <select name="status" id="status">
            <option value="data">No Data Found</option>
        </select>
    </div>
</div>

{{-- ////////// --}}
@endsection