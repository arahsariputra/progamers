<?php
// Periksa apakah form dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil dan sanitasi data dari form
    $nama  = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $pesan = htmlspecialchars($_POST['pesan']);

    // Tujuan email (ganti ini dengan email kamu)
    $to = "arahsari@gmail.com";  // <- GANTI dengan emailmu sendiri

    // Subjek dan isi email
    $subject = "Pesan dari Website Gundar eSport";
    $body    = "Nama: $nama\nEmail: $email\n\nPesan:\n$pesan";

    // Header pengirim
    $headers  = "From: $email" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    // Kirim email
    if (mail($to, $subject, $body, $headers)) {
        // Jika berhasil
        echo "<script>alert('Pesan berhasil dikirim!'); window.location.href = 'kontak.html';</script>";
    } else {
        // Jika gagal
        echo "<script>alert('Gagal mengirim pesan.'); window.history.back();</script>";
    }
} else {
    // Jika bukan POST, kembalikan ke halaman form
    header("Location: kontak.html");
    exit();
}
?>
