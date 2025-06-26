<?php
// Inisialisasi variabel dan validasi
$nama = $email = $pesan = "";
$error = "";
$submitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"]);
    $email = trim($_POST["email"]);
    $pesan = trim($_POST["pesan"]);

    if (empty($nama) || empty($email) || empty($pesan)) {
        $error = "Semua kolom wajib diisi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Alamat email tidak valid!";
    } else {
        $submitted = true;
        // Bersihkan input agar aman dari XSS
        $nama = htmlspecialchars($nama);
        $email = htmlspecialchars($email);
        $pesan = htmlspecialchars($pesan);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Buku Tamu Digital STITEK Bontang</title>
<style>
  /* Reset */
  * {
    box-sizing: border-box;
  }
  body {
    margin: 0; padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    /* Gradasi biru muda elegan */
    background: linear-gradient(135deg, #a3d5ff, #4da6ff);
    color: #222;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 40px 20px;
  }
  .container {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    max-width: 480px;
    width: 100%;
    padding: 30px 35px;
  }
  header h1 {
    margin: 0 0 25px 0;
    font-weight: 700;
    color: #1e3c72;
    text-align: center;
  }
  form label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #1e3c72;
  }
  form input[type="text"],
  form input[type="email"],
  form textarea {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 18px;
    border: 2px solid #1e3c72;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
  }
  form input[type="text"]:focus,
  form input[type="email"]:focus,
  form textarea:focus {
    outline: none;
    border-color: #2a5298;
  }
  form textarea {
    resize: vertical;
    min-height: 110px;
  }
  form input[type="submit"] {
    background: #1e3c72;
    color: white;
    font-weight: 700;
    padding: 12px 0;
    border: none;
    border-radius: 8px;
    width: 100%;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  form input[type="submit"]:hover {
    background: #2a5298;
  }
  .error {
    background: #ff4c4c;
    color: white;
    font-weight: 600;
    padding: 10px 15px;
    border-radius: 6px;
    margin-bottom: 20px;
    text-align: center;
    animation: shake 0.4s ease;
  }
  @keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-6px); }
    50% { transform: translateX(6px); }
    75% { transform: translateX(-6px); }
  }
  .success-message {
    background: #4caf50;
    color: white;
    font-weight: 700;
    padding: 15px 20px;
    border-radius: 8px;
    text-align: center;
    margin-top: 25px;
    box-shadow: 0 4px 12px rgba(76,175,80,0.6);
    animation: fadeIn 0.7s ease forwards;
  }
  @keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
  }
  .result {
    margin-top: 20px;
    padding: 18px 22px;
    border-radius: 8px;
    background: #e8f0fe;
    color: #1e3c72;
    box-shadow: 0 2px 8px rgba(30,60,114,0.3);
  }
  .result p {
    margin: 8px 0;
    font-size: 1rem;
  }
</style>
</head>
<body>
<div class="container">
  <header>
    <h1>Buku Tamu Digital STITEK Bontang</h1>
  </header>

  <form method="post" action="">
    <?php if ($error): ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <label for="nama">Nama Lengkap</label>
    <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama) ?>" required>

    <label for="email">Alamat Email</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

    <label for="pesan">Pesan / Komentar</label>
    <textarea id="pesan" name="pesan" required><?= htmlspecialchars($pesan) ?></textarea>

    <input type="submit" value="Kirim Pesan">
  </form>

  <?php if ($submitted): ?>
    <div class="success-message">Pesan telah dikirim!</div>
    <div class="result">
      <p><strong>Nama Lengkap:</strong> <?= $nama ?></p>
      <p><strong>Email:</strong> <?= $email ?></p>
      <p><strong>Pesan:</strong><br><?= nl2br($pesan) ?></p>
    </div>
  <?php endif; ?>
</div>
</body>
</html>
 