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




{{-- ////////// --}}
@endsection

