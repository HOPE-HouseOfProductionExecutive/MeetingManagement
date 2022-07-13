@extends('layout.main')
@section('title', 'Dashboard')
@section('content')
<link rel="stylesheet" href="/Assets/css/user/dashboard/style.css">
{{-- ISI DISINI --}}
@foreach ($data as $item)
@php
    $time = \Carbon\Carbon::parse($item->waktu_rapat)->locale('id');
    $time->settings(['formatFunction' => 'translatedFormat']);
    $time1 = $time->isoformat('dddd, DD MMMM YYYY');
    $time2 = $time->isoformat('DD MMMM YYYY');
@endphp
<div class="opacity" id="modal {{$item->id}}">
    <div class="detail_rapat_popup">
        <div class="inner_detail_popup">
            <div class="status">
                <p>{{$item->keterangan}}</p>
            </div>
            <div class="detail1">
                <h2>{{$time1}}</h2>
            </div>
            <div class="detail2">
                <div class="skdp_box">
                    <h4>SKDP
                    </h4>
                    <p>{{$item->SKPD}}</p>
                </div>
                <div class="dl_box">
                    <h4>
                        Batas Waktu
                    </h4>
                    <p>{{$time2}}</p>
                </div>
                <div class="dp_box">
                    <h4>
                        Data Pendukung
                    </h4>
                    @php
                        if($item->data_pendukung == null){
                            $data_pendukung = 'Tidak Ada';
                        }else{
                            $data_pendukung = 'Ada';
                        }
                    @endphp
                    <p>{{$data_pendukung}}</p>
                </div>
            </div>
            <div class="detail3">
                <div class="judul_box">
                    <h4>
                        Judul Rapat
                    </h4>
                    <p>{{$item->judul}}</p>
                </div>
                <div class="progres_box">
                    <h4>
                        Progres Rapat
                    </h4>
                    <p>{{$item->progress}}</p>
                </div>
                <div class="hasil_box">
                    <h4></h4>
                        Hasil Rapat
                    </h4>
                    <p>{{$item->tindak_lanjut}}</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endforeach

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
            @foreach ($data as $item)
            <div class="ct2">
                <div class="number_c">
                    <p>{{$loop->iteration}}</p>
                </div>
                <div class="time_c">
                    @php
                        $time = \Carbon\Carbon::parse($item->waktu_rapat)->locale('id');
                        $time->settings(['formatFunction' => 'translatedFormat']);
                        $time = $time->isoformat('dddd, DD MMMM YYYY');
                    @endphp
                    <p>{{$time}}</p>
                </div>
                <div class="title_c">
                    <p>{{$item->judul}}</p>
                </div>
                {{-- <form action=""></form> --}}
                <button id="{{$item->id}}" onclick="onClickModalOpen(this.id)" ><img src="/Assets/icons/eye.svg"  alt=""></button>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function onClickModalOpen(id){
        var modalid = "modal " + id;
        var modal = document.getElementById(modalid);
        // console.log(modal);
        modal.style.display = "block";
    }

    window.onclick = function(event) {
        const eventModal = event.target.id;
        // console.log(tes);
        if(eventModal.includes("modal")){
            const modal = document.getElementById(eventModal);
            modal.style.display = "none";
        }
    }


</script>

{{-- ////////// --}}
@endsection

