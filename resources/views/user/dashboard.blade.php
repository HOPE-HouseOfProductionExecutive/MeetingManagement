@extends('layout.main')
@section('title', 'Dashboard')
@section('content')
<link rel="stylesheet" href="/Assets/css/user/dashboard/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="/Assets/js/pagination.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
{{-- ISI DISINI --}}
<body onload="getData(0);">
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
</body>
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
<!-- 


<div class="full-dashboard">
   

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
</div> -->

    <!-- Compiled and minified CSS -->
 
<script>

    function getData(index){
        $.get('/pagination/ajax', function (data) {
            // console.log(data);
    
            let tableBody = document.getElementById("content-table-body");
            let total = 1;
            let html= "";
            for(let i = index; i < data.length && total <= 10 ; i++){
                html += "<tr>";
                
                html += "<td>" + (i+1) + "</td>";
                html += "<td>" + data[i].waktu_rapat +"</td>";
                html += "<td>" + data[i].judul + "</td>";
                html += "<td class='mata'><button id='" + data[i].id + "' onclick='onClickModalOpen(this.id)'><a href='#'><img  src='/Assets/icons/eye.svg'/></a></td>";
    
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
        console.log((clickedLinkPageNumber*10) - 10);
        getData(((clickedLinkPageNumber * 10) - 10));
        

        // switch (clickedLinkPageNumber) {
        //     case 1:
        //         disableLeftArrow();
        //         if(rightArrow.className.indexOf("disabled") !== -1) {
        //             enableRightArrow();
        //         }
        //         break;
        //     case 10:
        //         break;
        //     default:
        //         break;
        // }
    }

    function handleLeftArrowClick()
    {

    }

    function handleRightArrowClick()
    {

    }

    function disableLeftArrow(){
        
    }
    function enableLeftArrow(){

    }

    function disableRightArrow(){
        
    }
    function enableRightArrow(){

    }

    let pageLinks = document.querySelectorAll('a');
    let activePageNumber;
    let clickedLink;
    let nextPage;
    let leftArrow;
    let rightArrow;
    let url = '';
    pageLinks.forEach((element) => {
        element.addEventListener("click", function() {
            leftArrow = document.querySelector('.left-arrow');
            rightArrow = document.querySelector('.right-arrow');
            activeLink = document.querySelector('.aktif');
            
            activePageNumber = parseInt(activeLink.innerText);
            
            if ((this.innerText === 'chevron_left' && activePageNumber === 1) || (this.innerText === 'chevron_right' && activePageNumber === 10)) {
            return;
            }

            activeLink.classList = "waves-effect";
            activeLink.classList.remove('aktif');

            if(this.innerText === 'chevron_left'){
                handleLeftArrowClick();
            }else if (this.innerText === 'chevron_right'){
                handleRightArrowClick();
            }else {
                handleNumberClick(this, leftArrow, rightArrow);
            }

        });
        
    });
    
</script>
</html>



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

@endsection

