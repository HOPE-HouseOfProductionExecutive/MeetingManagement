@extends('layout.main')
@section('title', 'Dashboard')
@section('content')

<link rel="stylesheet" href="Assets/css/user/shortcut/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<meta name="_token" content="{{ csrf_token() }}">
<body onload="getData('', '', 0);"></body>

@foreach ($tes as $item)
@php
    $time = \Carbon\Carbon::parse($item->waktu_rapat)->locale('id');
    $time->settings(['formatFunction' => 'translatedFormat']);
    $time1 = $time->isoformat('dddd, DD MMMM YYYY');
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
@endforeach




<div class="shortcut_layer">
    <div class="shortcut_upper">
        <h3>Pencarian Data Rapat</h3>
    </div>
    <div class="shortcut_box">
            <div class="shortcut_waktu">
                <p>Waktu Rapat</p>
                <details class="custom-select">
                    <summary class="radios" id="searchWaktu">
                        <input type="radio" name="item" onclick="changeValueHidden(this.id, 'waktu')" id="item"
                            title="Pilih Waktu Rapat" checked>

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
                <p>Status Rapat</p>
                <details class="custom-select">
                    <summary class="radios" id="search-status">
                        <input type="radio" name="items" onclick="changeValueHidden(this.id, 'status')" id="items"
                            title="Pilih Status Rapat" checked>
                        <input type="radio" name="items" onclick="changeValueHidden(this.id, 'status')" id="items1"
                            title="Selesai" value="Selesai">
                        <input type="radio" name="items" onclick="changeValueHidden(this.id, 'status')" id="items2"
                            title="Belum Selesai" value="Belum Selesai">
                    </summary>
                    <input type="hidden" id="status" name="status" value="">
                    <ul class="list" style="padding-left: 1rem;">
                        <li>
                            <label for="items1">
                                Selesai
                            </label>
                        </li>
                        <li>
                            <label for="items2">Belum Selesai</label>
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
                <th>Waktu</th>
                <th>Judul</th>
            </thead>
            <tbody id="content-table-body">

            </tbody>
        </table>
    </section>
    <footer class="center-align">
        <ul class="pagination">
            <li class="disabled arrow-left"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="aktif"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!">6</a></li>
            <li class="waves-effect"><a href="#!">7</a></li>
            <li class="waves-effect"><a href="#!">8</a></li>
            <li class="waves-effect"><a href="#!">9</a></li>
            <li class="waves-effect"><a href="#!">10</a></li>
            <li class="waves-effect arrow-right"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </footer>
</div>

{{-- @endif --}}



<script>
    function changeValueHidden(id, opt) {
        var testing = document.getElementById(id);
        if (opt.includes("waktu")) {
            var input = document.getElementById('waktu');
        } else {
            var input = document.getElementById('status');
            console.log(input);
        }

        input.value = testing.value;
    }

</script>
<script>
    function getData(searches1, searches2, index) {
        $.ajax({
            type: 'get',
            url: '/search',
            data: {
                'search': searches1,
                'search1' : searches2
            },
            success: function (data) {
                console.log(data);
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
            }
        });
    }

    function handleNumberClick(clickedLink, leftArrow, rightArrow) {

        let value = $('#waktu').val();
        let value2 = $('#status').val();
        clickedLink.parentElement.classList = "aktif";
        let clickedLinkPageNumber = parseInt(clickedLink.innerText);
        // console.log((clickedLinkPageNumber*10) - 10);
        getData(value, value2, ((clickedLinkPageNumber * 10) - 10));


        switch (clickedLinkPageNumber) {
            case 1:
                disableLeftArrow(leftArrow);
                if (rightArrow.className.indexOf("disabled") !== -1) {
                    enableRightArrow(rightArrow);
                }
                break;
            case 10:
                disableRightArrow(rightArrow);
                if (leftArrow.className.indexOf('disabled') !== -1) {
                    enableLeftArrow(leftArrow);
                }
                break;
            default:
                if (leftArrow.className.indexOf('disabled') !== -1) {
                    enableLeftArrow(leftArrow);
                }
                if (rightArrow.className.indexOf('disabled') !== -1) {
                    enableRightArrow(rightArrow);
                }
                break;
        }
    }

    function handleLeftArrowClick(aktifPageNumber, leftArrow, rightArrow) {
        let value = $('#waktu').val();
        let value2 = $('#status').val();
        let previousPage = document.querySelectorAll('li')[aktifPageNumber - 1];
        previousPage.classList = "aktif";
        getData(value, value2, ((aktifPageNumber - 1) * 10) - 10);


        if (aktifPageNumber === 10) {
            enableRightArrow(rightArrow);
        }

        if (aktifPageNumber - 1 === 1) {
            disableLeftArrow(leftArrow);
        }
    }

    function handleRightArrowClick(aktifPageNumber, leftArrow, rightArrow) {
        //move to next page
        let nextPage = document.querySelectorAll('li')[aktifPageNumber + 1];
        nextPage.classList = "aktif";
        let value = $('#waktu').val();
        let value2 = $('#status').val();
        getData(value1, value2, ((aktifPageNumber + 1) * 10) - 10);


        if (aktifPageNumber === 1) {
            enableLeftArrow(leftArrow);
        }

        if (aktifPageNumber + 1 === 10) {
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

    pageLinks.forEach((element) => {
        element.addEventListener("click", function () {
            leftArrow = document.querySelector('.arrow-left');
            rightArrow = document.querySelector('.arrow-right');
            aktifLink = document.querySelector('.aktif');

            aktifPageNumber = parseInt(aktifLink.innerText);

            if ((this.innerText === 'chevron_left' && aktifPageNumber === 1) || (this.innerText ===
                    'chevron_right' && aktifPageNumber === 10)) {
                return;
            }

            aktifLink.classList = "waves-effect";
            aktifLink.classList.remove('aktif');

            if (this.innerText === 'chevron_left') {
                handleLeftArrowClick(aktifPageNumber, leftArrow, rightArrow);
            } else if (this.innerText === 'chevron_right') {
                handleRightArrowClick(aktifPageNumber, leftArrow, rightArrow);
            } else {
                handleNumberClick(this, leftArrow, rightArrow);
            }

        });

    });

</script>
<script>
    $('#searchWaktu').on('change', function () {
        let value1 = $('#waktu').val();
        let value2 = $('#status').val();
        console.log(value1);
        console.log(value2);
        getData(value1, value2, 0);
    })
    $('#search-status').on('change', function () {
        let value1 = $('#waktu').val();
        let value2 = $('#status').val();
        console.log(value1);
        console.log(value2);
        getData(value1, value2, 0);
    })
</script>

<script>
    function onClickModalOpen(id){
        var modalid = "modal " + id;
        var modal = document.getElementById(modalid);
        modal.style.display = "block";
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
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

@endsection
