@extends('layout.main')
@section('title', 'Pencarian Data')
@section('content')

<link rel="stylesheet" href="Assets/css/user/shortcut/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<meta name="_token" content="{{ csrf_token() }}">
<body onload="getData('', '', 0);"></body>
<div class="opacity" id="modal opacity">
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <div class="test">
        <div class="slideshow-container" id="slideshow-container">

        </div>
        <br>

    </div>
    <a class="next" onclick="plusSlides(1)">❯</a>
</div>



<div class="shortcut_layer">
    <div class="shortcut_upper">
        <h3>Pencarian Data Rapat</h3>
    </div>
    <div class="shortcut_box">
            <div class="shortcut_search">
                <div class="shortcut_search_box">
                    <input type="text" id="title-search" placeholder="Cari Data">
                </div>
            </div>

            <div class="shortcut_waktu">
                <p>Waktu Rapat</p>
                <details class="custom-select">
                    <summary class="radios" id="searchWaktu">
                        <input type="radio" name="item" onclick="changeValueHidden(this.id, 'waktu')" id="item"
                            title="Pilih Waktu Rapat" checked>
                        <input type="radio" name="item" onclick="changeValueHidden(this.id, 'waktu')" id="item-null"
                            title="Pilih Waktu Rapat" value="">

                        @foreach ($data as $item)
                        @php
                        $time = \Carbon\Carbon::parse($item->waktu_rapat)->locale('id');
                        $time->settings(['formatFunction' => 'translatedFormat']);
                        $time1 = $time->isoformat('dddd, DD MMMM YYYY');
                        @endphp
                        <input type="radio" name="item" onclick="changeValueHidden(this.id, 'waktu')"
                            id="item {{$loop->iteration}}" title="{{$time1}}" value="{{$item->waktu_rapat}}">
                        @endforeach
                    </summary>
                    <input type="hidden" id="waktu" name="waktu" value="">
                    <ul class="list">
                        <li>
                            <label for="item-null">
                                Pilih Waktu Rapat
                            </label>
                        </li>
                        @foreach ($data as $item)
                        @php
                        $time = \Carbon\Carbon::parse($item->waktu_rapat)->locale('id');
                        $time->settings(['formatFunction' => 'translatedFormat']);
                        $time1 = $time->isoformat('dddd, DD MMMM YYYY');
                        @endphp
                        <li>
                            <label for="item {{$loop->iteration}}">
                                {{$time1}}
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </details>
            </div>

            <div class="shortcut_status">
                <p>Status Tindak Lanjut</p>
                <details class="custom-select">
                    <summary class="radios" id="searchStatus">
                        <input type="radio" name="items" onclick="changeValueHidden(this.id, 'status')" id="items"
                            title="Pilih Status Tindak Lanjut" checked>
                        <input type="radio" name="items" onclick="changeValueHidden(this.id, 'status')" id="items-null"
                            title="Pilih Status Tindak Lanjut" value="">
                        <input type="radio" name="items" id="belum" onclick="changeValueHidden(this.id, 'status')" title="Belum Selesai" value="Belum Selesai">
                        <input type="radio" name="items" id="selesai" onclick="changeValueHidden(this.id, 'status')" title="Selesai" value="Selesai">
                    </summary>
                    <input type="hidden" id="status" name="status" value="">
                    <ul class="list">
                        <li>
                            <label for="items-null">
                                Pilih Status Tindak Lanjut
                            </label>
                        </li>
                        <li>
                            <label for="belum">
                               Belum Selesai
                            </label>
                        </li>
                        <li>
                            <label for="selesai">
                                Selesai
                            </label>
                        </li>
                    </ul>
                </details>
            </div>
    </div>
</div>


<div class="part-dashboard" id="part-dashboard">
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
            <li class="disabled arrow-right"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </footer>
</div>

<script>
    function changeValueHidden(id, opt) {
        var testing = document.getElementById(id);
        if (opt.includes("waktu")) {
            var input = document.getElementById('waktu');
        } else if (opt.includes("status")) {
            var input = document.getElementById('status');
        }
        input.value = testing.value;
    }
</script>
<script>
    function successAjax(datta){
        DATA_LEN = datta.length;
        searchData = datta;
        idx = 1;
        pageMax = Math.ceil(DATA_LEN/10);
    }

    function paginationAjax(index){
        let tableBody = document.getElementById("content-table-body");
        let total = 1;
        let html = "";
        for (let i = index; i < searchData.length && total <= 10; i++) {
            html += "<tr>";

            html += "<td>" + (i + 1) + "</td>";
            html += "<td>" + searchData[i].waktu_rapat + "</td>";
            html += "<td>" + searchData[i].judul + "</td>";
            html += "<td class='mata'><button id='" + searchData[i].id +
                "' onclick='onClickModalOpen(this.id)'><a href='#'><img  src='/Assets/icons/eye.svg'/></a></td>";

            total += 1;
            html += "</tr>";
        }
        tableBody.innerHTML = html;
    }

     function ajaxError(){
        let aktifLink = document.querySelector('.aktif');
        index = 1;
        aktifLink.innerText = idx;
    }

    function getData(searches1, searches2, searches3, index) {
        let leftArrow = document.querySelector('.arrow-left');
        let rightArrow = document.querySelector('.arrow-right');
        let aktifLink = document.querySelector('.aktif');
        let temp;
        $.ajax({
            type: 'get',
            url: '/search',
            data: {
                'search': searches1,
                'search1' : searches2,
                'search2' : searches3
            },
            success: function (data) {
                successAjax(data);
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
                index = 1;
                aktifLink.innerText = idx;
                tableBody.innerHTML = html;
                disableLeftArrow(leftArrow);
                enableRightArrow(rightArrow);
                if(data.length==0){
                    disableRightArrow(rightArrow);
                }
            },
            fail: function () {
                disableRightArrow(rightArrow);
            }

        });
    }

    function handleLeftArrowClick(aktifPageNumber, leftArrow, rightArrow) {
        let previousPage = document.querySelectorAll('li')[aktifPageNumber - 1];
        paginationAjax((((aktifPageNumber) * 10) - 10));
        if (aktifPageNumber != pageMax) {
            enableRightArrow(rightArrow);
        }
        if (aktifPageNumber === 1) {
            disableLeftArrow(leftArrow);
        }
    }

    function handleRightArrowClick(aktifPageNumber, leftArrow, rightArrow) {
        let nextPage = document.querySelectorAll('li')[aktifPageNumber + 1];
        paginationAjax((((aktifPageNumber +1) * 10) - 10));
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
    let DATA_LEN;
    let pageMax;
    let searchData;

    pageLinks.forEach((element) => {
        element.addEventListener("click", function () {
            leftArrow = document.querySelector('.arrow-left');
            rightArrow = document.querySelector('.arrow-right');
            aktifLink = document.querySelector('.aktif');

            if ((this.innerText === 'chevron_left' && idx === 1) || (this.innerText === 'chevron_right' && (idx === pageMax || idx-1 === pageMax))) {
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
    $('#searchStatus').on('change', function () {
        let value1 = $('#waktu').val();
        let value2 = $('#title-search').val();
        let value3 = $('#status').val();
        console.log(value3);
        getData(value1, value2, value3, 0);
    });
    $('#searchWaktu').on('change', function () {
        let value1 = $('#waktu').val();
        let value2 = $('#title-search').val();
        let value3 = $('#status').val();
        getData(value1, value2, value3, 0);
    });
    $('#title-search').on('keyup', function () {
        let value1 = $('#waktu').val();
        let value2 = $('#title-search').val();
        let value3 = $('#status').val();
        getData(value1, value2, value3, 0);
    })

</script>
<script>
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

    window.onclick = function(event) {
        const eventModal = event.target.id;
        if(eventModal.includes("modal")){
            const modal = document.getElementById(eventModal);
            modal.style.display = "none";
        }
    }


</script>
<script>
    let slideIndex = 1;

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
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
