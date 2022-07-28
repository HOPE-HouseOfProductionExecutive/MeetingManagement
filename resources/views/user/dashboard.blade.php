@extends('layout.main')
@section('title', 'Dashboard')
@section('content')
<link rel="stylesheet" href="/Assets/css/user/dashboard/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="_token" content="{{ csrf_token() }}">
{{-- @foreach ($data as $item)
@php
$time = \Carbon\Carbon::parse($item->waktu_rapat)->locale('id');
$time->settings(['formatFunction' => 'translatedFormat']);
$time1 = $time->isoformat('dddd, DD MMMM YYYY');

$time = \Carbon\Carbon::parse($item->waktu_selesai)->locale('id');
$time->settings(['formatFunction' => 'translatedFormat']);
$time2 = $time->isoformat('DD MMMM YYYY');
@endphp
<div class="opacity" id="modal {{$item->id}}">
<div class="detail_rapat_popup">
    <div class="inner_detail_popup">
        @php
        if($item->keterangan == "Selesai"){
        $style = "background:#39A952";
        }else{
        $style = "background:#FF0000";
        }
        @endphp
        <div class="status" style={{$style}}>
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
                <h4>Hasil Rapat</h4>
                <p>{{$item->tindak_lanjut}}</p>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach --}}
<body onload="getData(0);"></body>

<div class="opacity" id="modal opacity">
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <div class="test">
        <div class="slideshow-container" id="slideshow-container">

            {{-- <div class="mySlides">
                <div class="detail_rapat_popup">
                    <div class="inner_detail_popup">
                        <div class="status" style={{$style}}>
                            <p>{{$item->keterangan}}</p>
                        </div>
                        <div class="detail1">
                            <h2>{{$time1}}</h2>
                        </div>
                        <div class="detail2">
                            <div class="skdp_box">
                                <h4>SKDP</h4>
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
                                <p>Ada</p>
                            </div>
                        </div>
                        <div class="detail3">
                            <div class="judul_box">
                                <h4>
                                    Judul Rapat
                                </h4>
                                <p>{{$item->title->judul}}</p>
                            </div>
                            <div class="progres_box">
                                <h4>
                                    Progres Rapat
                                </h4>
                                <p>{{$item->progress}}</p>
                            </div>
                            <div class="hasil_box">
                                <h4>Tindak Lanjut Hasil Rapat</h4>
                                <p>{{$item->tindak_lanjut}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


        </div>
        <br>

    </div>
    <a class="next" onclick="plusSlides(1)">❯</a>
</div>

<div class="part-dashboard">
    <div class="statistic">
        <div class="c1">
            <h3>Total Rapat</h3>
            <p>{{$total_rapat}}</p>
        </div>
        <div class="c1">
            <h3>Tindak Lanjut Selesai</h3>
            <p>{{$rapat_selesai}}</p>
        </div>
        <div class="c1">
            <h3>Tindak Lanjut Terdekat</h3>
            <p>{{$rapat_terdekat}}</p>
        </div>
        <div class="c2">
            <h3>Tindak Lanjut Yang Berjalan</h3>
            <p>{{$rapat_berjalan}}</p>
        </div>
    </div>
    <section id="table">
        <table>
            <thead>
                <th>No</th>
                <th>Waktu Rapat</th>
                <th>Judul Rapat</th>
            </thead>
            <tbody id="content-table-body">

            </tbody>
        </table>
    </section>
    <footer class="center-align">
        <ul class="pagination">
            <li class="disabled arrow-left"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="aktif">1</li>
            <li class="waves-effect arrow-right"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </footer>
</div>



<script>
    let DATA_LEN;
    let pageMax;

    function getData(index) {
        $.get('/pagination/ajax/home', function (data) {
            DATA_LEN = data.length;
            pageMax = Math.ceil(DATA_LEN / 10);
            let tableBody = document.getElementById("content-table-body");
            let total = 1;
            let html = "";
            for (let i = index; i < data.length && total <= 10; i++) {
                html += "<tr>";

                html += "<td>" + (i + 1) + "</td>";
                html += "<td>" + data[i].waktu_rapat + "</td>";
                html += "<td>" + data[i].judul + "</td>";
                html += "<td class='mata'><button id='" + data[i].id +
                    "' onclick='onClickModalOpen(this.id)'><a href='#'><img  src='/Assets/icons/eye.svg'/></a></td>";

                total += 1;
                html += "</tr>";
            }
            tableBody.innerHTML = html;
            if (data.length <= 10) {
                let rightArrow = document.querySelector('.arrow-right');
                disableRightArrow(rightArrow);
            }
        });
    }

    function handleLeftArrowClick(aktifPageNumber, leftArrow, rightArrow) {
        let previousPage = document.querySelectorAll('li')[aktifPageNumber - 1];
        getData(((aktifPageNumber) * 10) - 10);
        if (aktifPageNumber != pageMax) {
            enableRightArrow(rightArrow);
        }
        console.log(aktifPageNumber);
        if (aktifPageNumber === 1) {
            disableLeftArrow(leftArrow);
        }
    }

    function handleRightArrowClick(aktifPageNumber, leftArrow, rightArrow) {
        let nextPage = document.querySelectorAll('li')[aktifPageNumber + 1];
        getData(((aktifPageNumber + 1) * 10) - 10);
        if (aktifPageNumber === 1) {
            enableLeftArrow(leftArrow);
        }
        if (aktifPageNumber + 1 === pageMax) {
            disableRightArrow(rightArrow);
        }
    }

    function disableLeftArrow(leftArrow) {
        leftArrow.classList = "disabled arrow-left";
    }

    function enableLeftArrow(leftArrow) {
        leftArrow.classList = "waves-effect arrow-left";
    }

    function disableRightArrow(rightArrow) {
        rightArrow.classList = "disabled arrow-right";
    }

    function enableRightArrow(rightArrow) {
        rightArrow.classList = "waves-effect arrow-right";
    }

    let pageLinks = document.querySelectorAll('a');
    let aktifPageNumber;
    let clickedLink;
    let nextPage;
    let leftArrow;
    let rightArrow;
    let url = '';
    let idx = 1;

    pageLinks.forEach((element) => {
        element.addEventListener("click", function () {
            leftArrow = document.querySelector('.arrow-left');
            rightArrow = document.querySelector('.arrow-right');
            aktifLink = document.querySelector('.aktif');

            if ((this.innerText === 'chevron_left' && idx === 1) || (this.innerText ===
                    'chevron_right' && idx === pageMax)) {
                return;
            }

            if (this.innerText === 'chevron_left') {
                idx -= 1;
                handleLeftArrowClick(idx, leftArrow, rightArrow);
                aktifLink.innerText = idx;
            } else if (this.innerText === 'chevron_right') {
                handleRightArrowClick(idx, leftArrow, rightArrow);
                idx += 1
                aktifLink.innerText = idx;
            }
        });

    });

</script>

<script>
    function getAjaxData(){
    }
    function onClickModalOpen(id) {
        $.ajax({
            type: "get",
            url: '/search/slider',
            data:{
                'id': id,
            },
            success: function(data){
                let sliderBody = document.getElementById("slideshow-container");
                sliderBody.innerHTML = data;
            },
            complete: function(){
                slideIndex = 1;
                showSlides(1);
                var modalid = "modal opacity";
                var modal = document.getElementById(modalid);
                modal.style.display = "block";
            }
        });

    }


    window.onclick = function (event) {
        const eventModal = event.target.id;
        if (eventModal.includes("modal")) {
            const modal = document.getElementById(eventModal);
            modal.style.display = "none";
        }
    }


</script>

<script>
    let slideIndex = 1;
    // showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        console.log(slides);
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }

</script>
<script>
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection
