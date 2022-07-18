@extends('layout.main')
@section('title', 'Registrasi Akun')
@section('content')
<link rel="stylesheet" href="Assets/css/master/register/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="/Assets/js/pagination.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<body onload="getData(0);"></body>

@foreach ($users as $item)
<div class="opacity" id="modal delete {{$item->id}}">
    <div class="hapus_layer">
        <div class="notifikasi_hapus_box">
            <img src="/Assets/icons/alert-octagon.svg" alt="">
            <p>Apakah anda yakin ingin menghapus data Rapat? </p>
            <div class="pilihan_box">
                <form action="/delete/user" method="POST">
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
<div class="opacity" id="modal tambah">
    <div class="tambah_data_layer">
        <div class="tambah_data_box">
            <h2>
                Penambahan Data User
            </h2>
            <hr>
            <form action=" /register/user" method="POST">
                @csrf
                <div class="input_box">
                    <label for="name">Nama Lengkap</label>
                    <input style=" background-color: white;padding-left: 10px;
                    height: 30px;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    font-size: 14px;" type="text" id="name" name="name">
                </div>
                <div class="input_box">
                    <label for="email">Email</label>
                    <input style=" background-color: white;padding-left: 10px;
                    height: 30px;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border:none;
                    border-radius: 4px;
                    font-size: 14px;" type="email" id="email" name="email">
                </div>
                <div class="perubahan_status_box">
                    <label for="role">Role</label>
                    <select style="display: block; padding: 0 0 0 10px; height: 30px;" id="role" name="role">
                        <option value=""></option>
                        <option value="1">User</option>
                        <option value="2">Admin</option>
                    </select>
                </div>
                <div class="tombol_tambah">
                    <input type="submit" value="Tambah Data">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="manage_layer">
    <div class="manage_upper">
        <h3>Penambahan Akun</h3>
        <div class="td_box">
            <button id="tambah" onclick="onClickModalTambah()">Tambah Akun</button>
        </div>
    </div>
    <section id="table">
        <table>
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Email</th>
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


<script>
    function getData(index) {
        $.get('/pagination/users', function (data) {
            let tableBody = document.getElementById("content-table-body");
            let total = 1;
            let html = "";
            console.log(data)
            for (let i = index; i < data.length && total <= 10; i++) {
                html += "<tr>";
                html += "<t>" + (i + 1) + "</td>";
                html += "<td>" + data[i].fullname + "</td>";
                switch (data[i].permission_id) {
                    case 1:
                        html += "<td>Master</td>";
                        break;
                    case 2:
                        html += "<td>Admin</td>";
                        break;
                    case 3:
                        html += "<td>User</td>";
                        break;
                    default:
                        break;
                }
                html += "<td>" + data[i].email + "</td>";
                html += "<td class='trash'><button id='" + data[i].id +
                    "' onclick='onClickModalDelete(this.id)'><a href='#'><img  src='/Assets/icons/trash-01.svg'/></a></td>";
                total += 1;
                html += "</tr>";
            }

            tableBody.innerHTML = html;


        });
    }


    function handleNumberClick(clickedLink, leftArrow, rightArrow) {

        console.log(clickedLink);
        clickedLink.parentElement.classList = "aktif";
        let clickedLinkPageNumber = parseInt(clickedLink.innerText);
        // console.log((clickedLinkPageNumber*10) - 10);
        getData(((clickedLinkPageNumber * 10) - 10));


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
        //move to previous page
        let previousPage = document.querySelectorAll('li')[aktifPageNumber - 1];
        previousPage.classList = "aktif";
        getData(((aktifPageNumber - 1) * 10) - 10);


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

        getData(((aktifPageNumber + 1) * 10) - 10);


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
    function onClickModalTambah() {
        var modal = document.getElementById('modal tambah');
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
