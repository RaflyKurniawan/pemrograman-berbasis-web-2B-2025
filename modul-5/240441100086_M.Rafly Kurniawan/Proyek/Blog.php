<!DOCTYPE html>
<html>
<head>
    <title>Blog Reflektif</title>

    <style>
        body { font-family: Arial; margin: 30px; max-width: 800px; }
        ul { list-style-type: none; padding: 0; }
        li { margin-bottom: 15px; }
        a { text-decoration: none; color: #3366cc; }
        a:hover { text-decoration: underline; }
        .buttons {
            text-align: center;
            margin-top: 40px;
        }
        .buttons a {
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            color: white;
            background-color: gray;
            border-radius: 5px;
        }
        .buttons a:hover {
            background-color: #555;
        }
        img { width: 50%; max-height: 300px; object-fit: cover; margin-top: 20px; }
        blockquote { font-style: italic; color: #555; margin: 20px 0; }
        .nav { margin-top: 30px; }
    </style>
</head>
<body>
<?php
function buatSlug($judul) {
    return strtolower(str_replace(' ', '-', $judul));
}

function kutipanMotivasi() {
    $quotes = [
        "Tetap semangat, meski dunia terasa berat.",
        "Setiap hari adalah kesempatan baru.",
        "Kegagalan adalah bagian dari proses belajar.",
        "Mimpi besar dimulai dari langkah kecil.",
        "Jangan takut mencoba hal baru."
    ];
    return $quotes[rand(0, count($quotes)-1)];
}

$artikelData = [
    1 => [
        'judul' => "Bagaimana Kegagalan mengajarkan arti ketekunan",
        'tanggal' => "21 Mei 2025",
        'paragraf' => "Saya berada dalam lingkungan yang menilai keberhasilan dari hasil akhir, bukan proses. ketika saya gagal pada saat seleksi kampus yang saya impikan, saya merasa dunia seakan runtuh. Namun, dari situ saya menyadari bahwa kegagalan bukanlah akhir, tetapi bagian dari proses belajar.",
        'gambar' => "1.jpg",

    ],
    2 => [
        'judul' => "Membuat Project Pertama",
        'tanggal' => "24 September 2024",
        'paragraf' => "Project pertama pada saat UAS Praktikum, yakni membuat alur sebuah pemesanan tiket. saat itu saya sangat gugup dan kurang yakin, tetapi saya tetap terus maju. Project pertama memang menegangkan, tetapi memberikan pengalaman nyata tentang bagaimana suatu Program dikembangkan dari awal hingga akhir.",
        'gambar' => "2.jpg",

    ],
    3 => [
        'judul' => "Kuliah Bukan Hanya Nilai",
        'tanggal' => "21 Mei 2025",
        'paragraf' => "Saat pertama kali masuk dunia perkuliahan, saya sangat terpaku pada angka A, IPK tinggi, dan rangking. Tetapi seiring waktu saya menyadari bahwa kuliah bukan hanya tentang akademik, lebih dari itu, saya belajar bagaiman berorganisasi, menghadapi konflik dalam kelompok, dan bagaimana mengelola waktu. Pengalaman menghadapi tekanan deadline, berbicara didepan umum, adalah pelajaran yang tidak diajarkan diruang kelas. semua itu mengasah karakter, dan ketahanan diri. nilai memang penting, tetapi bukan satu - satunya penentu masa depan.",
        'gambar' => "3.jpg",
        'sumber' => "https://news.republika.co.id/berita/qhmyg8374/kuliah-bukan-hanya-tentang-nilai-dan-ipk?"
    ]
];

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id && isset($artikelData[$id])) {
    $a = $artikelData[$id];
    echo "<h2>{$a['judul']}</h2>";
    echo "<p><em>Tanggal: {$a['tanggal']}</em></p>";
    echo "<img src='{$a['gambar']}' alt='Ilustrasi'>";
    echo "<p>{$a['paragraf']}</p>";
    echo "<blockquote>“" . kutipanMotivasi() . "”</blockquote>";

    if (!empty($a['sumber'])) {
        echo "<p><strong>Sumber referensi:</strong> <a href='{$a['sumber']}' target='_blank'>{$a['sumber']}</a></p>";
    }

    echo '<div class="buttons">
            <a href="timelinePengalaman.php">Timeline Pengalaman Kuliah</a>
            <a href="index.php">Kembali Ke Profil</a>
            <a href="Blog.php">Kembali Ke Blog</a>
        </div>';
} else {

    echo "<h2>Daftar Artikel Blog Reflektif</h2><ul>";

    foreach ($artikelData as $id => $data) {
        echo "<li><a href='?id=$id'>" . htmlspecialchars($data['judul']) . "</a></li>";
    }
    echo "</ul>";
    echo '<div class="buttons">
            <a href="timelinePengalaman.php">Timeline Pengalaman Kuliah</a>
            <a href="index.php">Kembali Ke Profil</a>
        </div>';
}
?>

</body>
</html>
