<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Timeline Pengalaman Kuliah</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 30px;
    }

    h2 {
        text-align: center;
    }

    .timeline {
        position: relative;
        max-width: 600px;
        margin: auto;
        padding: 20px 0;
    }

    .timeline::after {
        content: '';
        position: absolute;
        width: 3px;
        background-color: #333;
        top: 0;
        bottom: 0;
        left: 50%;
        margin-left: -1.5px;
    }

    .timeline-item {
        padding: 10px 40px;
        position: relative;
        background-color: inherit;
        width: 50%;
    }

    .timeline-item::after {
        content: '';
        position: absolute;
        width: 15px;
        height: 15px;
        background-color: white;
        border: 3px solid #333;
        top: 15px;
        border-radius: 50%;
        z-index: 1;
    }

    .timeline-item.left {
        left: 0;
    }

    .timeline-item.left::after {
        right: -8px;
    }

    .timeline-item.right {
        left: 50%;
    }

    .timeline-item.right::after {
        left: -8px;
    }

    .content {
        padding: 10px;
        background-color: #f2f2f2;
        position: relative;
        border-radius: 6px;
    }


    .timeline-item.kosong .content {
        background-color: #e0e0e0;
        opacity: 0.6;
        font-style: italic;
    }


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
        display: inline-block;
    }

    .buttons a:hover {
        background-color: #555;
    }
    </style>
</head>
<body>

    <h2>Timeline Pengalaman Kuliah</h2>

    <div class="timeline">
        <?php
        $pengalaman = [
            "Semester 1" => "Mengenal dunia kampus, mengikuti orientasi mahasiswa baru dan belajar dasar algoritma pemrograman.",
            "Semester 2" => "Mulai membuat proyek kecil dengan HTML dan CSS juga mempelajari bahasa pemrograman seperti Javascript, PHP, dan Java.",
            "Semester 3" => "",
            "Semester 4" => "",
            "Semester 5" => "",
            "Semester 6" => ""
        ];

        $posisi = "left";
        foreach ($pengalaman as $semester => $deskripsi) {
            $kosong = empty($deskripsi) ? "kosong" : "";
            echo "
                <div class='timeline-item $posisi $kosong'>
                    <div class='content'>
                        <h3>$semester</h3>
                        <p>$deskripsi</p>
                    </div>
                </div>
            ";
            $posisi = ($posisi == "left") ? "right" : "left";
        }
        ?>
    </div>

    <div class="buttons">
        <a href="index.php">Kembali ke Profil</a>
        <a href="Blog.php">Menuju Blog</a>
    </div>

</body>
</html>