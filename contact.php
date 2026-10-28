<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function back(string $type, string $text, array $old = []): never
{
    $_SESSION['flash'] = ['type' => $type, 'text' => $text];
    $_SESSION['old']   = $old;
    header('Location: index.php#kontak');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    back('error', 'Formulir harus dikirim lewat tombol Kirim pesan.');
}

// Cek token CSRF (pastikan token sesi ada dan cocok)
$sessionToken = $_SESSION['csrf'] ?? '';
$postToken    = $_POST['csrf'] ?? '';
if (empty($sessionToken) || !is_string($postToken) || !hash_equals($sessionToken, $postToken)) {
    back('error', 'Sesi formulir sudah kedaluwarsa. Muat ulang halaman lalu coba lagi.');
}

// Honeypot: bot biasanya mengisi kolom ini
if (!empty($_POST['website'])) {
    back('success', 'Pesan terkirim. Terima kasih!');
}

$nama  = trim((string) ($_POST['nama']  ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$pesan = trim((string) ($_POST['pesan'] ?? ''));
$old   = ['nama' => $nama, 'email' => $email, 'pesan' => $pesan];

if ($nama === '' || $email === '' || $pesan === '') {
    back('error', 'Nama, email, dan pesan wajib diisi.', $old);
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    back('error', 'Format email belum benar. Contoh: nama@domain.com', $old);
}
$pesanLength = function_exists('mb_strlen') ? mb_strlen($pesan) : strlen($pesan);
if ($pesanLength < 10) {
    back('error', 'Pesan terlalu pendek. Tulis minimal 10 karakter.', $old);
}

// Simpan ke storage/messages.log (cek file ini di Laragon)
$line = sprintf(
    "[%s]\nNama  : %s\nEmail : %s\nPesan : %s\n%s\n",
    date('Y-m-d H:i:s'),
    str_replace(["\r", "\n"], ' ', $nama),
    str_replace(["\r", "\n"], ' ', $email),
    $pesan,
    str_repeat('-', 40)
);

$storageDir = __DIR__ . '/storage';
if (!is_dir($storageDir)) {
    @mkdir($storageDir, 0755, true);
}

$saved = @file_put_contents($storageDir . '/messages.log', $line . "\n", FILE_APPEND | LOCK_EX);

if ($saved === false) {
    back('error', 'Pesan gagal disimpan. Coba lagi nanti atau kirim lewat email.', $old);
}

unset($_SESSION['csrf']);
back('success', 'Pesan terkirim. Terima kasih, saya akan segera membalas.');
