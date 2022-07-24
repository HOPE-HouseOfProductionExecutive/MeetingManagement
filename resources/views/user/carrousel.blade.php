<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Assets//css/user/carrousel/style.css">
</head>

<body>

    <div class="opacity">
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <div class="test">

            <div class="slideshow-container">



                <div class="mySlides">
                    <div class="detail_rapat_popup">
                        <div class="inner_detail_popup">

                            <div class="status">
                                <p>Selesai</p>
                            </div>
                            <div class="detail1">
                                <h2>Sabtu, 30 Juli 2022</h2>
                            </div>
                            <div class="detail2">
                                <div class="skdp_box">
                                    <h4>SKDP</h4>
                                    <p>Bagian Humas</p>
                                </div>
                                <div class="dl_box">
                                    <h4>
                                        Batas Waktu
                                    </h4>
                                    <p>27 Maret 2022</p>
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
                                    <p>Rapat kebajikan hari ini</p>
                                </div>
                                <div class="progres_box">
                                    <h4>
                                        Progres Rapat
                                    </h4>
                                    <p>Menjalani proses pembelajaran hari ini</p>
                                </div>
                                <div class="hasil_box">
                                    <h4>Tindak Lanjut Hasil Rapat</h4>
                                    <p>Membuat summary progres</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mySlides">
                    <div class="detail_rapat_popup">
                        <div class="inner_detail_popup">

                            <div class="status">
                                <p>Selesai</p>
                            </div>
                            <div class="detail1">
                                <h2>Sabtu, 30 Juli 2022</h2>
                            </div>
                            <div class="detail2">
                                <div class="skdp_box">
                                    <h4>SKDP</h4>
                                    <p>Bagian Humas</p>
                                </div>
                                <div class="dl_box">
                                    <h4>
                                        Batas Waktu
                                    </h4>
                                    <p>27 Maret 2022</p>
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
                                    <p>Rapat kebajikan hari ini</p>
                                </div>
                                <div class="progres_box">
                                    <h4>
                                        Progres Rapat
                                    </h4>
                                    <p>Menjalani proses pembelajaran hari ini</p>
                                </div>
                                <div class="hasil_box">
                                    <h4>Tindak Lanjut Hasil Rapat</h4>
                                    <p>Membuat summary progres</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mySlides">
                    <div class="detail_rapat_popup">
                        <div class="inner_detail_popup">

                            <div class="status">
                                <p>Selesai</p>
                            </div>
                            <div class="detail1">
                                <h2>Sabtu, 30 Juli 2022</h2>
                            </div>
                            <div class="detail2">
                                <div class="skdp_box">
                                    <h4>SKDP</h4>
                                    <p>Bagian Humas</p>
                                </div>
                                <div class="dl_box">
                                    <h4>
                                        Batas Waktu
                                    </h4>
                                    <p>27 Maret 2022</p>
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
                                    <p>Rapat kebajikan hari ini</p>
                                </div>
                                <div class="progres_box">
                                    <h4>
                                        Progres Rapat
                                    </h4>
                                    <p>Menjalani proses pembelajaran hari ini</p>
                                </div>
                                <div class="hasil_box">
                                    <h4>Tindak Lanjut Hasil Rapat</h4>
                                    <p>Membuat summary progres</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>


    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }

    </script>

</body>

</html>
