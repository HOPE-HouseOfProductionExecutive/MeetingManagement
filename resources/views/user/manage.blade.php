@extends('layout.main')
@section('title', 'Dashboard')
@section('content')

<link rel="stylesheet" href="Assets/css/user/manage/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="/Assets/js/pagination.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<body onload="getData(0);"></body>

<div class="opacity" id="modal tambah">
    <div class="tambah_data_layer">
        <div class="tambah_data_box">
            <h2>
                Penambahan Data Rapat
            </h2>
            <hr>
            <form action="/store" method="POST">
                @csrf
                <div class="input_box">
                    <label for="judul_rapat">Judul Rapat</label>
                    <input required type="text" id="judul_rapat" name="judul_rapat" style=" background-color: white;padding-left: 10px;
                    height: 30px;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    font-size: 14px;">
                </div>
                <div class="input_box">
                    <label for="tindak_lanjut">Tindak Lanjut Hasil Rapat</label>
                    <input required type="text" id="tindak_lanjut" name="tindak_lanjut" style=" background-color: white;padding-left: 10px;
                    height: 30px;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    font-size: 14px;">
                </div>
                <div class="input_box">
                    <label for="penanggung_jawab">SKDP Penanggung Jawab</label>
                    <input required type="text" id="penanggung_jawab" name="penanggung_jawab" style=" background-color: white;padding-left: 10px;
                    height: 30px;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    font-size: 14px;">
                </div>
                <div class="input_box">
                    <label for="progres_rapat">Progres</label>
                    <input required type="text" id="progres_rapat" name="progres_rapat" style=" background-color: white;padding-left: 10px;
                    height: 30px;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    font-size: 14px;">
                </div>
                <div class="input_box">
                    <label for="data_pendukung">Data Pendukung</label>
                    <input type="text" id="data_pendukung" name="data_pendukung" style=" background-color: white;padding-left: 10px;
                    height: 25px;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    font-size: 14px;">
                </div>
                <div class="waktu_form">
                    <label for="batas_waktu">Batas Waktu</label>
                    <input required type="date" id="batas_waktu" name="batas_waktu" style="height: 25px;
                    padding-left: 10px;
                    background: #FFFFFF;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    cursor: pointer;">
                </div>
                <div class="waktu_form">
                    <label for="waktu_rapat">Waktu Rapat</label>
                    <input required type="date" id="waktu_rapat" name="waktu_rapat" style="height: 25px;
                    padding-left: 10px;
                    background: #FFFFFF;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    cursor: pointer;">
                </div>
                <div class="tombol_tambah">
                    <input type="submit" value="Tambah Data">
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($data as $item)
<div class="opacity" id="modal {{$item->id}}">
    <div class="tambah_data_layer">
        <div class="tambah_data_box">
            <h2>
                Perubahan Data Rapat
            </h2>
            <hr>
            <form action="/update" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{$item->id}}">
                <div class="input_box">
                    <label for="judul_rapat">Judul Rapat</label>
                    <input required style=" background-color: white;padding-left: 10px;
                        height: 30px;
                        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                        border:none;
                        border-radius: 4px;
                        font-size: 14px;" type="text" id="judul_rapat" name="judul_rapat" value="{{$item->judul}}">
                </div>
                <div class="input_box">
                    <label for="tindak_lanjut">Tindak Lanjut Hasil Rapat</label>
                    <input required style=" background-color: white;padding-left: 10px;
                        height: 30px;
                        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                        border:none;
                        border-radius: 4px;
                        font-size: 14px;" type="text" id="tindak_lanjut" name="tindak_lanjut"
                        value="{{$item->tindak_lanjut}}">
                </div>
                <div class="input_box">
                    <label for="penanggung_jawab">SKDP Penanggung Jawab</label>
                    <input required style=" background-color: white;padding-left: 10px;
                        height: 30px;
                        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                        border:none;
                        border-radius: 4px;
                        font-size: 14px;" type="text" id="penanggung_jawab" name="penanggung_jawab"
                        value="{{$item->SKPD}}">
                </div>
                <div class="input_box">
                    <label for="progres_rapat">Progres</label>
                    <input required style=" background-color: white;padding-left: 10px;
                        height: 30px;
                        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                        border:none;
                        border-radius: 4px;
                        font-size: 14px;" type="text" id="progres_rapat" name="progres_rapat"
                        value="{{$item->progress}}">
                </div>
                <div class="input_box">
                    <label for="data_pendukung">Data Pendukung</label>
                    <input style=" background-color: white;padding-left: 10px;
                        height: 30px;
                        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                        border:none;
                        border-radius: 4px;
                        font-size: 14px;" type="text" id="data_pendukung" name="data_pendukung"
                        value="{{$item->data_pendukung}}">
                </div>
                <div class="waktu_form">
                    <label for="batas_waktu">Batas Waktu</label>
                    <input required style=" background-color: white;padding-left: 10px;
                        height: 30px;
                        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                        border:none;
                        border-radius: 4px;
                        font-size: 14px;" type="date" id="batas_waktu" name="batas_waktu"
                        value="{{$item->waktu_selesai}}">
                </div>
                <div class="waktu_form">
                    <label for="waktu_rapat">Waktu Rapat</label>
                    <input required style=" background-color: white;padding-left: 10px;
                        height: 30px;
                        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                        border:none;
                        border-radius: 4px;
                        font-size: 14px;" type="date" id="waktu_rapat" name="waktu_rapat"
                        value="{{$item->waktu_rapat}}">
                </div>
                <div class="perubahan_status_box">
                    <label for="perubahan_status">Status</label>
                    <select id="status" name="status" style="display: block; padding: 0 0 0 10px; height: 30px;">
                        @if ($item->keterangan == 'Belum Selesai')
                        <option value="Belum Selesai">Belum Selesai</option>
                        <option value="Selesai">Selesai</option>
                        @else
                        <option value="Selesai">Selesai</option>
                        <option value="Belum Selesai">Belum Selesai</option>
                        @endif
                    </select>
                </div>
                <div class="tombol_selesai">
                    <input type="submit" value="Selesai">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="opacity" id="modal delete {{$item->id}}">
    <div class="hapus_layer">
        <div class="notifikasi_hapus_box">
            <img src="/Assets/icons/alert-octagon.svg" alt="">
            <p>Apakah anda yakin ingin menghapus data Rapat? </p>
            <div class="pilihan_box">
                <form action="/delete" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button type="submit">IYA</button>
                </form>
                <button onclick="onClickClose(this.id)" id="{{$item->id}}">TIDAK</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="manage_layer">
    <div class="manage_upper">
        <h3>Pengelolaan Data</h3>
        <div class="td_box">
            <button id="tambah" onclick="onClickModalTambah()">Tambah Data</button>
        </div>
    </div>
    <section id="table">
        <table>
            <thead>
                <th>No</th>
                <th>Waktu</th>
                <th>Judul</th>
                <th>Progres</th>
                <th>Status</th>
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
        $.get('/pagination/ajax', function (data) {
            DATA_LEN = data.length;
            pageMax = Math.ceil(DATA_LEN / 10);
            let tableBody = document.getElementById("content-table-body");
            let total = 1;
            let html = "";
            for (let i = index; i < data.length && total <= 10; i++) {
                html += "<tr>";

                html += "<td class='nomor'>" + (i + 1) + "</td>";
                html += "<td class='waktu'>" + data[i].waktu_rapat + "</td>";
                html += "<td class='judul'>" + data[i].judul + "</td>";
                html += "<td class='progres'>" + data[i].progress + "</td>";
                html += "<td>" + data[i].keterangan + "</td>";
                html += "<td class='edit'><button id='" + data[i].id +
                    "' onclick='onClickModalEdit(this.id)'><a href='#'><img  src='/Assets/icons/pencil-02.svg'/></a></td>";
                html += "<td class='trash'><button id='" + data[i].id +
                    "' onclick='onClickModalDelete(this.id)'><a href='#'><img  src='/Assets/icons/trash-01.svg'/></a></td>";
                total += 1;
                html += "</tr>";
            }
            tableBody.innerHTML = html;
            if(data.length<=10){
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
    function onClickModalTambah() {
        var modal = document.getElementById('modal tambah');
        modal.style.display = "block";
    }

    function onClickModalEdit(id) {
        var modalid = "modal " + id;
        var modal = document.getElementById(modalid);
        modal.style.display = "block";
    }

    function onClickModalDelete(id) {
        var modalid = "modal delete " + id;
        var modal = document.getElementById(modalid);
        modal.style.display = "block";
    }

    function onClickClose(id) {
        var modalid = "modal delete " + id;
        var modal = document.getElementById(modalid);
        // console.log(modalid);
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        const eventModal = event.target.id;
        if (eventModal.includes("modal")) {
            const modal = document.getElementById(eventModal);
            modal.style.display = "none";
        }
    }

</script>

@endsection
