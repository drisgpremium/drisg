<?php
// Dr. İSG lisans talep formu
// Bu adresi kendi lisans başvuru e-posta adresinizle değiştirin.
$to = 'drisgpremium@gmail.com';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html#lisans');
    exit;
}

function clean($value) {
    return trim(preg_replace('/\s+/', ' ', strip_tags($value ?? '')));
}

$name  = clean($_POST['name'] ?? '');
$phone = clean($_POST['phone'] ?? '');
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);

if (!$name || !$phone || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.html?license=error#lisans');
    exit;
}


$subject = 'Dr. İSG - Yeni Lisans Talebi';
$body = "Yeni Dr. İSG lisans talebi\n\n" .
        "Ad Soyad: {$name}\n" .
        "Telefon: {$phone}\n" .
        "E-posta: {$email}\n\n" .
        "Bu mesaj Dr. İSG web sitesindeki lisans talep formundan gönderilmiştir.";

$host = preg_replace('/[^a-z0-9.-]/i', '', $_SERVER['SERVER_NAME'] ?? 'localhost');
$from = ($host && $host !== 'localhost') ? 'noreply@' . $host : 'drisgpremium@gmail.com';
$headers = "MIME-Version: 1.0\r\n" .
           "Content-Type: text/plain; charset=UTF-8\r\n" .
           "From: Dr. İSG Web Form <{$from}>\r\n" .
           "Reply-To: {$email}\r\n";


$sent = @mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, $headers);

header('Location: index.html?license=' . ($sent ? 'ok' : 'senderror') . '#lisans');
exit;
