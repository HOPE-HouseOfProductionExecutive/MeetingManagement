@extends('layout.main')
@section('title', 'Bantuan')
@section('content')

<head>
    <link rel="stylesheet" href="Assets/css/user/userguide/style.css">
    <title>User Guide</title>
</head>

<div class="guide_layer">
    <div class="guide_box">
        <div class="outer">
            <div class="guide_upper">
                <h3>User Guide</h3>
            </div>
            <div class="guide_content">
                <div class="separate">
                    <p class="st">1. Login</p>

                    <p> tampilan login terdapat kolom email dan kata sandi yang mana dapat di isi untuk masuk ke halaman utama website. Terdapat juga tombol 'lupa kata sandi?' dengan fungsi sistem akan mengirimkan kata sandi ke email user yang telah di daftarkan sebelumnya.</p>
                </div>
                <div class="separate">
                    <p class="st">2. Beranda</p>

                    <p>Pada Beranda terdapat tampilan singkat dari rapat yang ada. Ada tombol mata yang mana jika di klik akan memunculkan popup detail dari rapat tersebut. Pada tampilan popup, user dapat mengklik tombol selanjutnya ataupun sebelumnya pada setiap pojok layar untuk melihat tindak lanjut hasil lainnya.</p>
                </div>
                <div class="separate">
                    <p class="st">3. Pengelolaan</p>

                    <p>Pada bagian Pengelolaan terdapat list rapat dengan tombol edit dan hapus yang dapat diakses oleh admin dan master akun. Kemudian terdapat tombol tambah data berwarna hijau yang berfungsi untuk menambahkan data rapat.</p>
                </div>
                <div class="separate">
                    <p class="st">4. Pencarian</p>

                    <p>Pada Bagian Pencarian user dapat mencari dapat rapat dengan filter waktu rapat dan status rapat. Kemudian setelah di pilih untuk filterisasi maka tabel akan menampilkan hasil pencarian dan dapat melihat detailnya dengan meng-klik tombol mata.</p>
                </div>
                <div class="separate">
                    <p class="st">5. Registrasi</p>

                    <p>Pada Halaman Registrasi hanya master akun yang dapat melihat halaman ini. Pada halaman ini Master akun dapat membuat akun untuk admin dan user. Admin adalah jabatan yang dapat mengubah data rapat dan menghapus, User hanya dapat melihat data rapat dan tidak dapat mengubah data rapat dan menghapus. Sedangkan master akun dapat menghapus admin dan user akun.
                    </p>
                </div>
                <div class="separate">
                    <p class="st">6. Akun</p>

                    <p>Pada Halaman akun terdapat informasi tentang akun yang sedang digunakan dan User dapat mengganti kata sandi dengan memverifikasi menggunakan kata sandi sebelumnya.</p>
                </div>
                <div class="separate">
                    <p class="st">-- Lupa Kata Sandi</p>

                    <p>Jika user lupa kata sandi akun, maka user cukup mengisi komol email pada halaman login kemudian klik tomblol "Lupa Kata sandi?". Nanti Kata sandi akan dikirimkan melalui email yang telah terdaftar (cek pada kolom inbox atau kolom spam pada email)</p>
                </div>
                <div class="separate">
                    <p class="st">-- Memasukan Data Rapat</p>

                    <p>Memasukan data rapat hanya bisa dilakukan pada halaman 'Pengelolaan'. Pastikan user menginput Judul Rapat terlebih dahulu agar bisa menambahkan Data Tindak Lanjut untuk setiap Rapat.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
