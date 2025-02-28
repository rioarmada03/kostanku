<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About 
{
    public static $about = [
        'title' => "Tentang Kami",
        'body' => "<h3>Selamat Datang di Kostanku – Solusi Cerdas Pencarian Kost!</h3>
<p>Di era digital saat ini, mencari tempat tinggal yang sesuai dengan kebutuhan bisa menjadi tantangan. Banyak pilihan yang tersedia, tetapi tidak semuanya cocok dengan preferensi masing-masing individu. Inilah alasan kami menghadirkan Kostanku, sebuah platform pencarian kost berbasis web yang didukung oleh Content-Based Filtering untuk memberikan rekomendasi hunian yang lebih akurat dan sesuai dengan preferensi Anda.</p>
<br>
<h3>Apa yang kami tawarkan?</h3>
<p>Kostanku hadir sebagai solusi bagi pencari kost dengan menghadirkan fitur rekomendasi berbasis kecerdasan buatan. Dengan mengumpulkan data preferensi pengguna melalui survei singkat, sistem kami akan mencocokkan atribut kost yang relevan</p>
<br>
<h3>Mengapa Memilih Kostanku?</h3>
<p>💡 Teknologi Canggih
    Kami menggunakan metode Content-Based Filtering yang mampu menganalisis kebutuhan setiap pengguna dan memberikan rekomendasi terbaik.</p>
<p>📌 Mudah & Cepat
    Dengan platform berbasis web yang user-friendly, Anda dapat menemukan kost hanya dalam beberapa klik, tanpa harus mengunjungi satu per satu.</p>
<p>🤝 Mitra Pemilik Kost
    Kami juga membantu pemilik kost dalam mempromosikan properti mereka dengan lebih efektif, menjangkau lebih banyak calon penyewa.</p>
<br>
    <h3>Misi Kami</h3>
<p>Kami berkomitmen untuk memberikan pengalaman pencarian kost yang lebih mudah, nyaman, dan sesuai dengan kebutuhan setiap individu. Dengan memanfaatkan teknologi terkini, kami ingin membantu setiap orang menemukan tempat tinggal yang ideal tanpa repot.</p>
<br>
<h3>Bersama Kostanku, Temukan Hunian Nyaman dengan Mudah!</h3>
<p>Jelajahi dan temukan kost terbaik hanya di Kostanku – solusi pintar untuk pencari kost modern. 🚀</p>"
    ];
    public static function all() {
        return self::$about;
    }
}
