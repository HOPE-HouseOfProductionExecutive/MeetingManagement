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

<div class="tambah_data_layer">
    <div class="tambah_data_box">
        <h2>
            Penambahan Data Rapat
        </h2>
        <hr>
        <div class="input_box">
            <form action="">
                <label for="judul_rapat">Judul Rapat</label>
                <input type="text" id="judul_rapat" name="judul_rapat">
            </form>
        </div>
        <div class="input_box">
            <form action="">
                <label for="tindak_lanjut">Tindak Lanjut Hasil Rapat</label>
                <input type="text" id="tindak_lanjut" name="tindak_lanjut">
            </form>
        </div>
        <div class="input_box">
            <form action="">
                <label for="penanggung_jawab">SKDP Penanggung Jawab</label>
                <input type="text" id="penanggung_jawab" name="penanggung_jawab">
            </form>
        </div>
        <div class="input_box">
            <form action="">
                <label for="progres_rapat">Progres</label>
                <input type="text" id="progres_rapat" name="progres_rapat">
            </form>
        </div>
        <div class="input_box">
            <form action="">
                <label for="data_pendukung">Data Pendukung</label>
                <input type="text" id="data_pendukung" name="data_pendukung">
            </form>
        </div>
        <div class="waktu_form">
            <form action="">
                <label for="batas_waktu">Batas Waktu</label>
                <input type="date" id="batas_waktu" name="batas_waktu">
            </form>
        </div>
        <div class="waktu_form">
            <form action="">
                <label for="waktu_rapat">Waktu Rapat</label>
                <input type="date" id="waktu_rapat" name="waktu_rapat">
            </form>
        </div>
        <div class="tombol_tambah">
            <input type="submit" value="Tambah Data">
        </div>
    </div>
</div>

<div class="perubahan_data_layer">
    <div class="tambah_data_box">
        <h2>
            Penambahan Data Rapat
        </h2>
        <hr>
        <div class="input_box">
            <form action="">
                <label for="judul_rapat">Judul Rapat</label>
                <input type="text" id="judul_rapat" name="judul_rapat">
            </form>
        </div>
        <div class="input_box">
            <form action="">
                <label for="tindak_lanjut">Tindak Lanjut Hasil Rapat</label>
                <input type="text" id="tindak_lanjut" name="tindak_lanjut">
            </form>
        </div>
        <div class="input_box">
            <form action="">
                <label for="penanggung_jawab">SKDP Penanggung Jawab</label>
                <input type="text" id="penanggung_jawab" name="penanggung_jawab">
            </form>
        </div>
        <div class="input_box">
            <form action="">
                <label for="progres_rapat">Progres</label>
                <input type="text" id="progres_rapat" name="progres_rapat">
            </form>
        </div>
        <div class="input_box">
            <form action="">
                <label for="data_pendukung">Data Pendukung</label>
                <input type="text" id="data_pendukung" name="data_pendukung">
            </form>
        </div>
        <div class="waktu_form">
            <form action="">
                <label for="batas_waktu">Batas Waktu</label>
                <input type="date" id="batas_waktu" name="batas_waktu">
            </form>
        </div>
        <div class="waktu_form">
            <form action="">
                <label for="waktu_rapat">Waktu Rapat</label>
                <input type="date" id="waktu_rapat" name="waktu_rapat">
            </form>
        </div>
        <div class="perubahan_status_box">
            <form action="">
                <label for="perubahan_status">Status</label>
                <select id="status" name="status">
                    <option value="Selesai">Selesai</option>
                    <option value="Belum Selesai">Belum Selesai</option>
                </select>
            </form>
        </div>
        <div class="tombol_selesai">
            <input type="submit" value="Selesai">
        </div>
    </div>
</div>

<div class="hapus_layer">
    <div class="notifikasi_hapus_box">
        <img src="/Assets/icons/alert-octagon.svg" alt="">
        <p>Apakah anda yakin ingin menghapus data Rapat? </p>
        <div class="pilihan_box">
            <h2>IYA</h2>
            <h2>TIDAK</h2>
        </div>
    </div>
</div>


{{-- ////////// --}}
@endsection
