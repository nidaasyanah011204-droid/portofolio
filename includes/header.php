<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#ffffff">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <title><?= e($site['name']) ?> – <?= e($site['role']) ?></title>
    <meta name="description" content="<?= e($site['tagline']) ?>">
    <meta property="og:title" content="<?= e($site['name']) ?> – <?= e($site['role']) ?>">
    <meta property="og:description" content="<?= e($site['tagline']) ?>">
    <meta property="og:image" content="<?= e($site['photos']['portrait'] ?? 'assets/images/nida-portrait.jpg') ?>">
    <meta property="og:type" content="website">

    <!-- Modern Typography: Plus Jakarta Sans & Bricolage Grotesque -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700;12..96,800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<a class="skip" href="#konten">Lewati ke konten</a>

<header class="topbar">
    <a class="brand" href="#atas">
        <span class="brand-avatar-ring">
            <span class="brand-avatar">
                <img src="<?= e($site['photos']['portrait'] ?? 'assets/images/nida-portrait.jpg') ?>" alt="<?= e($site['name']) ?>">
            </span>
            <span class="avatar-live-badge" title="Active & Open for Opportunities"></span>
        </span>
        <div class="brand-info">
            <span class="brand-text"><?= e($site['name']) ?></span>
            <span class="brand-sub">Data & Information Systems Specialist</span>
        </div>
    </a>

    <button class="nav-toggle" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="menu">
        <span class="nav-toggle-bar"></span>
        <span class="nav-toggle-bar"></span>
        <span class="nav-toggle-bar"></span>
    </button>

    <nav id="menu" class="nav">
        <a href="#tentang">Tentang</a>
        <a href="#pengalaman">Pengalaman</a>
        <a href="#keahlian">Keahlian</a>
        <a href="#proyek">Proyek</a>
        <a href="#kontak">Kontak</a>
        <a class="btn-topbar-linkedin" href="<?= e($site['socials']['LinkedIn'] ?? 'https://www.linkedin.com/in/nida-asyanah-330593288') ?>" target="_blank" rel="noopener">
            <svg class="linkedin-svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.64 1.64 0 1 0 0-3.28 1.64 1.64 0 0 0 0 3.28m1.4 9.74v-8.37H5.06v8.37h2.8z"/></svg>
            <span>LinkedIn Profile</span>
        </a>
    </nav>
</header>
