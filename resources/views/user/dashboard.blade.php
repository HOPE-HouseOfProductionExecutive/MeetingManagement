@extends('layout.main')
@section('title', 'Dashboard')
@section('content')
<link rel="stylesheet" href="/Assets/css/user/dashboard/style.css">
{{-- ISI DISINI --}}

<div class="full-dashboard">

    <div class="part-dashboard">

        <div class="statistic">
            <div class="c1">
                <h3>Total Rapat</h3>
                <p>143</p>
            </div>
            <div class="c1">
                <h3>Rapat Selesai</h3>
                <p>11</p>
            </div>
            <div class="c1">
                <h3>Total Rapat Terdekat</h3>
                <p>12</p>
            </div>
            <div class="c2">
                <h3>Rapat Yang Berjalan</h3>
                <p>6</p>
            </div>
        </div>
        
        <div class="table-dashboard">
            <div class="ct1">
                <div class="number">
                    <h3>
                        No
                    </h3>
                </div>
                <div class="time">
                    <h3>
                        Waktu
                    </h3>
                </div>
                <div class="title">
                    <h3>
                        Judul Rapat
                    </h3>
                </div>
            </div>
            <div class="ct2">
                <div class="number_c">
                    <p>1</p>
                </div>
                <div class="time_c">
                    <p>Kamis, 24 Maret 1991</p>
                </div>
                <div class="title_c">
                    <p>Pergerakan cinta satu</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="detail_rapat_popup">
    <div class="inner_detail_popup">
        <div class="status">
            <p>selesai</p>
        </div>
        <div class="detail1">
            <h2>Sabtu, 13 November 2022</h2>
        </div>
        <div class="detail2">
            <div class="skdp_box">
                <h4>SKDP
                </h4>
                <p>Dinas SDA</p>
            </div>
            <div class="dl_box">
                <h4>
                    Batas Waktu
                </h4>
                <p>18 Maret 2022</p>
            </div>
            <div class="dp_box">
                <h4>
                    Data Pendukung
                </h4>
                <p>18 Maret 2022</p>
            </div>
        </div>
        <div class="detail3">
            <div class="judul_box">
                <h4>
                    Judul Rapat
                </h4>
                <p>Menerima Audiensi DPWSRMI Hal : Menyelesaikan Permasalahan Miskomunikasi terkait Pekerjaan Naturalisasi Kali Mengacu pada Pergub 31 Tahun 2019</p>
            </div>
            <div class="progres_box">
                <h4>
                    Progres Rapat
                </h4>
                <p>Menerima Audiensi DPWSRMI Hal : Menyelesaikan Permasalahan Miskomunikasi terkait Pekerjaan Naturalisasi Kali Mengacu pada Pergub 31 Tahun 2019</p>
            </div>
            <div class="hasil_box">
                <h4>
                    Hasil Rapat
                </h4>
                <p>Mapping lapangan untuk mengetahui jumlah warga terdampak
                </p>
            </div>
        </div>
    </div>
</div>




{{-- ////////// --}}
@endsection

