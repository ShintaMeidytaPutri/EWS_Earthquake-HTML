<?php

$servername ="localhost:3306";
$database ="earthquake";
$username ="root";
$password ="";

// Menerima data dari Blynk
$acceleration = $_POST['Acceleration']; // Ganti dengan cara Anda mendapatkan data acceleration dari Blynk
$rotation = $_POST['Rotation']; // Ganti dengan cara Anda mendapatkan data rotation dari Blynk
$temperature = $_POST['Suhu']; // Ganti dengan cara Anda mendapatkan data temperature dari Blynk
$humidity = $_POST['Kelembapan']; // Ganti dengan cara Anda mendapatkan data humidity dari Blynk

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Koneksi Gagal :" . mysqli_connect_error());
} else {
    echo "Koneksi Berhasil";
}

// Memasukkan data ke dalam tabel di database
$sql = "INSERT INTO ewas (Acceleration, Rotation, Suhu, Kelembapan) VALUES ('$acceleration', '$rotation', '$temperature', '$humidity')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan ke database.";
} else {
    echo "Terjadi kesalahan: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
?>