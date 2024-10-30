<?php
include 'koneksi.php';

// Query untuk menampilkan data guru
$sql = "SELECT * FROM dataguru";
$result = $conn->query($sql);

// Cek apakah form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['nik'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $pendidikan = $_POST['pendidikan'];
    $tugas = $_POST['tugas'];
    $birthdate = $_POST['birthdate'];

    // Query untuk menambahkan data guru dengan tanda kutip pada variabel teks
    $sql = "INSERT INTO dataguru (nik, namalengkap, alamat, pendidikan, tugas, birthdate) 
            VALUES ('$nik', '$namalengkap', '$alamat', '$pendidikan', '$tugas', '$birthdate')";

    if ($conn->query($sql) === TRUE) {
        echo "Data Berhasil Ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<html>

<head></head>

<body>
    <h1>
        Tambah Data
    </h1>
    <form action="" method="post">
        <label for="nik">NIP:</label>
        <input type="text" id="nik" name="nik" required><br><br>
        <label for="namalengkap">Nama Lengkap:</label>
        <input type="text" id="namalengkap" name="namalengkap" required><br><br>
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required><br><br>
        <label for="pendidikan">Pendidikan:</label>
        <select id="pendidikan" name="pendidikan">
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
        </select>
        <br><br>
        <label for="tugas">Tugas:</label>
        <input type="text" id="tugas" name="tugas" required><br><br>
        <input type="date" id="birthdate" name="birthdate" required><br><br>

        <input type="submit" value="Submit">
    </form>


    <h1> Data Guru</h1>
    <a href="index.php">Kembali Ke Home</a>
    <p></p>
    <table border="1">
        <tr>
            <th>NIP</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Pendidikan</th>
            <th>Tugas</th>
        </tr>
        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nik'] . "</td>";
                echo "<td>" . $row['namalengkap'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['pendidikan'] . "</td>";
                echo "<td>" . $row['tugas'] . "</td>";
                echo "<td>" . $row['birthdate'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 result";
        }
        ?>
    </table>
</body>

</html>