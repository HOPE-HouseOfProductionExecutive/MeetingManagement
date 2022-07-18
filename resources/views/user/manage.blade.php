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
                    <input type="text" id="judul_rapat" name="judul_rapat" 
                    style=" background-color: white;padding-left: 10px;
                    height: 30px;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    font-size: 14px;">
                </div>
                <div class="input_box">
                    <label for="tindak_lanjut">Tindak Lanjut Hasil Rapat</label>
                    <input type="text" id="tindak_lanjut" name="tindak_lanjut"
                    style=" background-color: white;padding-left: 10px;
                    height: 30px;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    font-size: 14px;">
                </div>
                <div class="input_box">
                    <label for="penanggung_jawab">SKDP Penanggung Jawab</label>
                    <input type="text" id="penanggung_jawab" name="penanggung_jawab"
                    style=" background-color: white;padding-left: 10px;
                    height: 30px;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    font-size: 14px;">
                </div>
                <div class="input_box">
                    <label for="progres_rapat">Progres</label>
                    <input type="text" id="progres_rapat" name="progres_rapat"
                    style=" background-color: white;padding-left: 10px;
                    height: 30px;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    font-size: 14px;">
                </div>
                <div class="input_box">
                    <label for="data_pendukung">Data Pendukung</label>
                    <input type="text" id="data_pendukung" name="data_pendukung"
                    style=" background-color: white;padding-left: 10px;
                    height: 25px;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    font-size: 14px;">
                </div>
                <div class="waktu_form">
                    <label for="batas_waktu">Batas Waktu</label>
                    <input type="date" id="batas_waktu" name="batas_waktu"
                    style="height: 25px;
                    padding-left: 10px;
                    background: #FFFFFF;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    cursor: pointer;">
                </div>
                <div class="waktu_form">
                    <label for="waktu_rapat">Waktu Rapat</label>
                    <input type="date" id="waktu_rapat" name="waktu_rapat"
                    style="height: 25px;
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
{{-- 
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
</div> --}}

<!-- <div class="manage_layer">
    <div class="manage_upper">
        <h3>Pengelolaan Data</h3>
        <div class="td_box">
            <button id="tambah" onclick="onClickModalTambah()">Tambah Data</button>
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
</div> -->

<body onload="getData(0);">
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
</body>

<script>

    function getData(index){
        $.get('/pagination/ajax', function (data) {
            // console.log(data);
    
            let tableBody = document.getElementById("content-table-body");
            let total = 1;
            let html= "";
            for(let i = index; i < data.length && total <= 10 ; i++){
                html += "<tr>";
                
                html += "<td class='nomor'>" + (i+1) + "</td>";
                html += "<td class='waktu'>" + data[i].waktu_rapat +"</td>";
                html += "<td class='judul'>" + data[i].judul + "</td>";
                html += "<td class='progres'>" + data[i].progress + "</td>";
                html += "<td>" + data[i].keterangan + "</td>";
                html += "<td class='edit'><button id='" + data[i].id + "' onclick='onClickModalOpen(this.id)'><a href='#'><img  src='/Assets/icons/pencil-02.svg'/></a></td>";
                html += "<td class='trash'><button id='" + data[i].id + "' onclick='onClickModalOpen(this.id)'><a href='#'><img  src='/Assets/icons/trash-01.svg'/></a></td>";
                total += 1;
                html += "</tr>";
            }
    
            tableBody.innerHTML = html;
    
    
        });
    }


    function handleNumberClick (clickedLink, leftArrow, rightArrow)
    {
        
        console.log(clickedLink);
        clickedLink.parentElement.classList = "aktif";
        let clickedLinkPageNumber = parseInt(clickedLink.innerText); 
        // console.log((clickedLinkPageNumber*10) - 10);
        getData(((clickedLinkPageNumber * 10) - 10));
        

        switch (clickedLinkPageNumber) {
            case 1:
                disableLeftArrow(leftArrow);
                if(rightArrow.className.indexOf("disabled") !== -1) {
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
    //move to previous page
    let previousPage = document.querySelectorAll('li')[aktifPageNumber-1];
    previousPage.classList = "aktif";
    getData(((aktifPageNumber-1) * 10) - 10);
 
   
    if (aktifPageNumber === 10) {
        enableRightArrow(rightArrow);
    }

    if (aktifPageNumber - 1 === 1) {
        disableLeftArrow(leftArrow);
    }
}

function handleRightArrowClick(aktifPageNumber, leftArrow, rightArrow) {
    //move to next page
    let nextPage = document.querySelectorAll('li')[aktifPageNumber+1];
    nextPage.classList = "aktif";

    getData(((aktifPageNumber+1) * 10) - 10);
    

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
        element.addEventListener("click", function() {
            leftArrow = document.querySelector('.arrow-left');
            rightArrow = document.querySelector('.arrow-right');
            aktifLink = document.querySelector('.aktif');
            
            aktifPageNumber = parseInt(aktifLink.innerText);
            
            if ((this.innerText === 'chevron_left' && aktifPageNumber === 1) || (this.innerText === 'chevron_right' && aktifPageNumber === 10)) {
            return;
            }

            aktifLink.classList = "waves-effect";
            aktifLink.classList.remove('aktif');

            if(this.innerText === 'chevron_left'){
                handleLeftArrowClick(aktifPageNumber, leftArrow, rightArrow);
            }else if (this.innerText === 'chevron_right'){
                handleRightArrowClick(aktifPageNumber, leftArrow, rightArrow);
            }else {
                handleNumberClick(this, leftArrow, rightArrow);
            }

        });
        
    });
    
</script>
</html>

{{-- <div class="hapus_layer">
    <div class="notifikasi_hapus_box">
        <img src="/Assets/icons/alert-octagon.svg" alt="">
        <p>Apakah anda yakin ingin menghapus data Rapat? </p>
        <div class="pilihan_box">
            <h2>IYA</h2>
            <h2>TIDAK</h2>
        </div>
    </div>
</div> --}}


<script>
    function onClickModalTambah() {
        var modal = document.getElementById('modal tambah');
        modal.style.display = "block";
    }


    window.onclick = function (event) {
        const eventModal = event.target.id;
        // console.log(tes);
        if (eventModal.includes("modal")) {
            const modal = document.getElementById(eventModal);
            modal.style.display = "none";
        }
    }

</script>

@endsection
