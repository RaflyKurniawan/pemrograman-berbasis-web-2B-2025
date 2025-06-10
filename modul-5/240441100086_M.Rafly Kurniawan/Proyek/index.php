<!DOCTYPE html>
<html>
<head>
    <title>Profil Interaktif Mahasiswa</title>
    <style>
        .buttons {
            text-align: center;
            margin-top: 40px;
            margin-bottom: 40px;
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
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }

        th {
            color:white;
            background-color:gray;
        }
        .container {
            font-family: segoe ui;
            width: 60%;
            margin: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 style='background-color:gray; color:white; padding:5px;'>Profil Interaktif Mahasiswa</h2>


    <table>
        <tr><th>Nama</th><td>M.Rafly Kurniawan</td></tr>
        <tr><th>NIM</th><td>240441100086</td></tr>
        <tr><th>Tempat, Tanggal Lahir</th><td>Jombang, 20 Januari 2006</td></tr>
        <tr><th>Email</th><td>raflykurniawan285@gmail.com</td></tr>
        <tr><th>Nomor HP</th><td>0895338155571</td></tr>
    </table>

    <br><hr>


    <form method="POST">
        <p style="background-color:gray; color:white; padding:5px;"><strong>Bahasa Pemrograman yang Dikuasai:</strong></p>
        <input type="text" name="bahasa[]" required placeholder="ex. JavaScript">
        <input type="text" name="bahasa[]" required>
        <input type="text" name="bahasa[]"><br><br>

        <p style="background-color:gray; color:white; padding:5px;"><strong>Pengalaman Membuat Proyek Pribadi:</strong></p>
        <textarea name="pengalaman" rows="4" cols="50" required  placeholder="Saya sangat senang saat mengerjakan proyek pribadi"></textarea><br><br>

        <p style="background-color:gray; color:white; padding:5px;"><strong>Software yang Sering Digunakan:</strong></p>
        <input type="checkbox" name="software[]" value="VS Code"> VS Code<br>
        <input type="checkbox" name="software[]" value="XAMPP"> XAMPP<br>
        <input type="checkbox" name="software[]" value="Git"> Git<br>
        <input type="checkbox" name="software[]" value=""> Notepad++<br><br>

        <p style="background-color:gray; color:white; padding:5px;"><strong>Sistem Operasi yang Digunakan:</strong></p>
        <input type="radio" name="os" value="Windows" required> Windows
        <input type="radio" name="os" value="Linux" required> Linux
        <input type="radio" name="os" value="Mac" required> Mac<br><br>

        <p style="background-color:gray; color:white; padding:5px;"><strong>Tingkat Penguasaan PHP:</strong></p>
        <select name="tingkat_php" required>
            <option value="">-- Pilih --</option>
            <option value="Pemula">Pemula</option>
            <option value="Menengah">Menengah</option>
            <option value="Mahir">Mahir</option>
        </select><br><br>

        <input type="submit" name="submit" value="Kirim">
    </form>
        

    <br><hr>

    <?php
    if (isset($_POST['submit'])) {
 
        if (
            !empty($_POST['bahasa'][0]) && !empty($_POST['bahasa'][1]) &&
            !empty($_POST['pengalaman']) &&
            !empty($_POST['software']) &&
            !empty($_POST['os']) &&
            !empty($_POST['tingkat_php'])
        ) {
            $bahasa = array_filter($_POST['bahasa']);
            $pengalaman = $_POST['pengalaman'];
            $software = $_POST['software'];
            $os = $_POST['os'];
            $tingkat_php = $_POST['tingkat_php'];

            echo "<h3 style='background-color:gray; color:white; padding:5px;'>Hasil Input:</h3>";
            echo "<table>";
            echo "<tr><th>Bahasa Pemrograman</th><td>" . implode(", ", $bahasa) . "</td></tr>";
            echo "<tr><th>Pengalaman Proyek</th><td>$pengalaman</td></tr>";
            echo "<tr><th>Software yang Digunakan</th><td>" . implode(", ", $software) . "</td></tr>";
            echo "<tr><th>Sistem Operasi</th><td>$os</td></tr>";
            echo "<tr><th>Tingkat PHP</th><td>$tingkat_php</td></tr>";
            echo "</table>";

            echo "<br><p style='background-color:gray; color:white; padding:5px;'><strong>Ringkasan:</strong></p>";
            echo "<p>Anda menggunakan sistem operasi <strong>$os</strong> dan memiliki tingkat penguasaan PHP di level <strong>$tingkat_php</strong>.</p>";
            echo "<p>Pengalaman Anda: <em>$pengalaman</em></p>";

            if (count($bahasa) > 2) {
                echo "<p><strong>Anda cukup berpengalaman dalam pemrograman!</strong></p>";
            }
        } else {
            echo "<p style='color:red;'>Harap isi semua input yang wajib!</p>";
        }
    }
    ?>

    <div class="buttons">
        <a href="timelinePengalaman.php">Timeline Pengalaman Kuliah</a>
        <a href="Blog.php">Blog Reflektif</a>
    </div>

    
</div>

</body>
</html>