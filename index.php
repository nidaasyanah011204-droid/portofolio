<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$site = require __DIR__ . '/config.php';
require __DIR__ . '/includes/functions.php';

// Pesan hasil kirim formulir
$flash = $_SESSION['flash'] ?? null;
$old   = $_SESSION['old'] ?? [];
unset($_SESSION['flash'], $_SESSION['old']);

require __DIR__ . '/includes/header.php';
?>

<!-- BACKGROUND AMBIENT GLOWS -->
<div class="ambient-glow glow-1"></div>
<div class="ambient-glow glow-2"></div>
<div class="ambient-glow glow-3"></div>

<main id="konten">

    <!-- HERO SECTION -->
    <section class="hero" id="atas">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="badge-group">
                    <span class="status-badge">
                        <span class="status-dot"></span>
                        <?= e($site['status']) ?>
                    </span>
                    <span class="campus-badge">
                        🎓 <?= e($site['university']) ?>
                    </span>
                </div>

                <div class="hero-greeting">
                    <span>✨ Hey there, welcome! Meet</span>
                </div>

                <h1 class="hero-title">
                    <?= e($site['name']) ?>
                    <span class="sparkle-icon">✦</span>
                </h1>
                
                <!-- GEN Z MULTI-DISCIPLINARY PILLS -->
                <div class="hero-tags-banner">
                    <span class="tag-pill tag-admin">📋 Data Entry & Admin Specialist (PSN)</span>
                    <span class="tag-pill tag-live">🎙️ TikTok & Shopee Live Host</span>
                    <span class="tag-pill tag-it">💻 Information Systems & Software</span>
                </div>

                <p class="hero-tagline"><?= e($site['tagline']) ?></p>

                <div class="hero-actions">
                    <a class="btn btn-primary" href="#pengalaman">
                        <span>Lihat Pengalaman Kerja</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                    <a class="btn btn-ghost" href="#proyek">Portofolio Proyek</a>
                    <a class="btn btn-linkedin" href="<?= e($site['socials']['LinkedIn'] ?? 'https://www.linkedin.com/in/nida-asyanah-330593288') ?>" target="_blank" rel="noopener">
                        <svg class="linkedin-svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.64 1.64 0 1 0 0-3.28 1.64 1.64 0 0 0 0 3.28m1.4 9.74v-8.37H5.06v8.37h2.8z"/></svg>
                        <span>LinkedIn</span>
                    </a>
                </div>

                <!-- QUICK STATS CHIPS -->
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-num">2+ Thn</span>
                        <span class="stat-label">Admin & Data Entry (PSN)</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <span class="stat-num">Live Host</span>
                        <span class="stat-label">TikTok & Shopee Live</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <span class="stat-num">S1 Degree</span>
                        <span class="stat-label">Information Systems Major</span>
                    </div>
                </div>
            </div>

            <!-- CREATIVE PHOTO STUDIO (GEN Z STYLE) -->
            <div class="hero-media">
                <div class="photo-card-wrapper">
                    <!-- Neon Aura Gradient Behind Card -->
                    <div class="photo-aura-bg"></div>

                    <div class="photo-studio-card">
                        <div class="photo-view-window">
                            <!-- Main Image -->
                            <img id="mainProfilePhoto" 
                                 class="profile-img" 
                                 src="<?= e($site['photos']['portrait']) ?>" 
                                 alt="<?= e($site['name']) ?>" 
                                 data-portrait="<?= e($site['photos']['portrait']) ?>"
                                 data-casual="<?= e($site['photos']['casual']) ?>"
                                 data-formal="<?= e($site['photos']['formal']) ?>">
                            
                            <!-- FLOATING GEN Z STICKERS & BADGES -->
                            <div class="sticker-badge sticker-top-right">
                                <span class="sticker-emoji">👩‍💻</span>
                                <span>Software & Tech Enthusiast</span>
                            </div>

                            <div class="sticker-badge sticker-bottom-left" id="photoModeBadge">
                                <span class="sticker-emoji">💻</span>
                                <span class="sticker-text">IT & Programmer</span>
                            </div>

                            <!-- LIVE STREAM OVERLAY (Active when Casual/Live photo selected) -->
                            <div class="live-stream-overlay" id="liveStreamOverlay">
                                <div class="live-pill">
                                    <span class="live-red-dot"></span> LIVE NOW
                                </div>
                                <div class="live-viewers">👥 2.4k viewers</div>
                                <div class="live-mock-chat">
                                    <p><strong>@fashionsister:</strong> Kak spill bajunya dong! 😍</p>
                                    <p><strong>@dika_id:</strong> Hostnya asik banget penjelasannya 👍</p>
                                </div>
                                <div class="live-cart-pill">🛒 Keranjang Kuning #1</div>
                            </div>

                            <!-- FLOATING HEARTS CONTAINER FOR TAP-TAP -->
                            <div class="hearts-container" id="heartsContainer"></div>
                        </div>

                        <!-- INTERACTIVE MODE SWITCHER -->
                        <div class="studio-controls">
                            <div class="mode-tabs" role="tablist">
                                <button type="button" class="mode-tab active" data-mode="portrait" aria-label="Mode Anak IT & Developer">
                                    <span class="tab-emoji">💻</span>
                                    <span>Anak IT</span>
                                </button>
                                <button type="button" class="mode-tab" data-mode="casual" aria-label="Mode TikTok Live Host">
                                    <span class="tab-emoji">🎙️</span>
                                    <span>Live Host</span>
                                </button>
                                <button type="button" class="mode-tab" data-mode="formal" aria-label="Mode Pas Foto Formal">
                                    <span class="tab-emoji">💼</span>
                                    <span>Formal</span>
                                </button>
                            </div>

                            <!-- INTERACTIVE TAP FOR HEARTS BUTTON -->
                            <button type="button" class="btn-like-stream" id="btnLikeStream" title="Tap Tap Layar!">
                                <span class="heart-icon">💖</span>
                                <span id="likeCountText">Tap Tap Love!</span>
                            </button>
                        </div>

                        <!-- MINI POLAROID THUMBNAIL STRIP -->
                        <div class="polaroid-strip">
                            <div class="strip-item active" data-mode="portrait">
                                <img src="<?= e($site['photos']['portrait']) ?>" alt="Anak IT & Developer">
                                <span>Anak IT</span>
                            </div>
                            <div class="strip-item" data-mode="casual">
                                <img src="<?= e($site['photos']['casual']) ?>" alt="Live Streaming Host">
                                <span>Live Host</span>
                            </div>
                            <div class="strip-item" data-mode="formal">
                                <img src="<?= e($site['photos']['formal']) ?>" alt="Formal Passport Photo">
                                <span>Formal</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTINUOUS TICKER MARQUEE (GEN Z AESTHETIC) -->
    <div class="marquee-ribbon">
        <div class="marquee-track">
            <?php for ($i = 0; $i < 3; $i++): ?>
                <?php foreach (($site['ticker'] ?? []) as $tick): ?>
                    <span class="marquee-item"><?= e($tick) ?></span>
                <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>

    <!-- ABOUT SECTION WITH BENTO HIGHLIGHTS -->
    <section class="section" id="tentang">
        <div class="section-header">
            <span class="section-kicker">Professional Summary</span>
            <h2>Tentang Saya</h2>
            <p class="section-subtitle">Ringkasan latar belakang profesional dari CV: kolaborasi keahlian teknologi, ketelitian administrasi, dan kepiawaian public speaking.</p>
        </div>

        <div class="about-grid">
            <div class="about-narrative prose">
                <?php foreach (($site['about'] ?? []) as $para): ?>
                    <p><?= e($para) ?></p>
                <?php endforeach; ?>

                <!-- LINKEDIN CONNECT CALLOUT -->
                <div class="linkedin-cta-card">
                    <div class="linkedin-cta-left">
                        <div class="linkedin-icon-bubble">
                            <svg class="linkedin-svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.64 1.64 0 1 0 0-3.28 1.64 1.64 0 0 0 0 3.28m1.4 9.74v-8.37H5.06v8.37h2.8z"/></svg>
                        </div>
                        <div>
                            <strong>Terhubung Langsung di LinkedIn</strong>
                            <p>Buka profil LinkedIn resmi untuk rekomendasi, verifikasi pengalaman, dan riwayat karir.</p>
                        </div>
                    </div>
                    <a class="btn btn-linkedin btn-sm" href="<?= e($site['socials']['LinkedIn'] ?? 'https://www.linkedin.com/in/nida-asyanah-330593288') ?>" target="_blank" rel="noopener">
                        Buka LinkedIn &rarr;
                    </a>
                </div>
            </div>

            <!-- BENTO HIGHLIGHT CARDS -->
            <div class="bento-cards">
                <div class="bento-card bento-card-edu">
                    <div class="bento-header-row">
                        <span class="bento-icon">🎓</span>
                        <span class="bento-badge">Jul 2023 – Feb 2027</span>
                    </div>
                    <h3>Pendidikan Formal</h3>
                    <p class="bento-inst">Universitas Darma Persada</p>
                    <p class="bento-period">Bachelor's Degree, Information System</p>
                    <p class="bento-desc">Mempelajari Rekayasa Perangkat Lunak, UML Modeling, UI/UX Design (Figma), Manajemen Basis Data, dan Pengembangan Aplikasi Web.</p>
                </div>

                <div class="bento-card bento-card-admin">
                    <div class="bento-header-row">
                        <span class="bento-icon">📋</span>
                        <span class="bento-badge bento-badge-teal">2+ Tahun Pengalaman</span>
                    </div>
                    <h3>Administrasi & Data Entry</h3>
                    <p class="bento-inst">PSN PT Standar Nasional Indonesia</p>
                    <p class="bento-desc">Menangani tugas administrasi harian, pengarsipan berkas resmi instansi, akurasi input data operasional, dan penyusunan laporan berkala.</p>
                </div>

                <div class="bento-card bento-card-live">
                    <div class="bento-header-row">
                        <span class="bento-icon">🎙️</span>
                        <span class="bento-badge bento-badge-rose">Live Commerce Host</span>
                    </div>
                    <h3>Live Streaming & Selling</h3>
                    <p class="bento-inst">TikTok Live & Shopee Live Host</p>
                    <p class="bento-desc">Host siaran langsung interaktif dengan gaya komunikasi persuasif, mempresentasikan produk secara detail, dan memproduksi video promosi kreatif.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- EMPLOYMENT & EXPERIENCE SECTION (SESUAI CV) -->
    <section class="section" id="pengalaman">
        <div class="section-header">
            <span class="section-kicker">Career Journey & Employment History</span>
            <h2>Pengalaman Kerja & Magang</h2>
            <p class="section-subtitle">Rekam jejak profesional dari CV yang mencakup administrasi perusahaan, siaran live commerce, kewirausahaan mandiri, hingga magang IT.</p>
        </div>

        <div class="experience-timeline">
            <?php foreach (($site['experiences'] ?? []) as $exp): 
                $cat = strtolower(explode(' ', $exp['category'] ?? 'general')[0]);
            ?>
                <div class="timeline-item">
                    <div class="timeline-dot-wrapper">
                        <span class="timeline-dot"><?= $exp['icon'] ?? '💼' ?></span>
                        <div class="timeline-line"></div>
                    </div>

                    <div class="timeline-card timeline-card-<?= $cat ?>">
                        <div class="timeline-card-header">
                            <div>
                                <div class="timeline-badge-group">
                                    <span class="exp-badge exp-badge-<?= $cat ?>"><?= e($exp['badge']) ?></span>
                                    <?php if (!empty($exp['highlight'])): ?>
                                        <span class="exp-highlight-pill"><?= e($exp['highlight']) ?></span>
                                    <?php endif; ?>
                                </div>
                                <h3 class="exp-role"><?= e($exp['role']) ?></h3>
                                <p class="exp-company">
                                    <strong><?= e($exp['company']) ?></strong> • <span class="exp-location">📍 <?= e($exp['location']) ?></span>
                                </p>
                            </div>
                            <span class="exp-period-pill"><?= e($exp['period']) ?></span>
                        </div>

                        <ul class="exp-points">
                            <?php foreach (($exp['points'] ?? []) as $point): ?>
                                <li><?= e($point) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- MULTI-DISCIPLINARY SKILLS SECTION -->
    <section class="section" id="keahlian">
        <div class="section-header">
            <span class="section-kicker">Multi-Disciplinary Stack</span>
            <h2>Keahlian & Kompetensi</h2>
            <p class="section-subtitle">Perpaduan keahlian administrasi yang cermat, komunikasi publik live commerce, serta keterampilan teknis teknologi informasi.</p>
        </div>

        <div class="skills-grid">
            <?php foreach (($site['skills'] ?? []) as $group => $data): ?>
                <div class="skill-category-card">
                    <div class="category-header">
                        <span class="category-icon"><?= $data['icon'] ?? '✨' ?></span>
                        <div>
                            <h3><?= e($group) ?></h3>
                            <span class="category-tagline"><?= e($data['tag'] ?? '') ?></span>
                        </div>
                    </div>
                    <ul class="skill-pill-list">
                        <?php foreach (($data['items'] ?? []) as $item): ?>
                            <li class="skill-pill">
                                <span class="pill-dot">✦</span>
                                <span><?= e($item) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- PROJECTS SECTION (SESUAI CV) -->
    <section class="section" id="proyek">
        <div class="section-header">
            <span class="section-kicker">Project Portfolio</span>
            <h2>Proyek yang Dikerjakan</h2>
            <p class="section-subtitle">Aplikasi nyata yang tercantum di CV, mencakup sistem ekspor industri, sistem parkir, website bioskop, dan pendaftaran mahasiswa digital.</p>
        </div>

        <div class="projects-grid">
            <?php foreach (($site['projects'] ?? []) as $p): ?>
                <article class="project-card">
                    <div class="project-card-top">
                        <span class="project-badge"><?= e($p['badge'] ?? 'Project') ?></span>
                        <span class="project-year-chip"><?= e($p['year'] ?? '') ?></span>
                    </div>

                    <h3 class="project-card-title"><?= e($p['title'] ?? '') ?></h3>
                    <?php if (!empty($p['company'])): ?>
                        <p class="project-company-tag">🏢 <?= e($p['company']) ?></p>
                    <?php endif; ?>
                    <p class="project-card-desc"><?= e($p['desc'] ?? '') ?></p>

                    <!-- HIGHLIGHTS CHIPS -->
                    <?php if (!empty($p['highlights'])): ?>
                        <div class="project-highlights">
                            <?php foreach ($p['highlights'] as $hl): ?>
                                <span class="hl-chip">✓ <?= e($hl) ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <ul class="project-tags">
                        <?php foreach (($p['tech'] ?? []) as $t): ?>
                            <li><?= e($t) ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="project-card-actions">
                        <a class="project-btn" href="#kontak">
                            <span>Diskusi / Tanya Proyek</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                        </a>
                        <a class="project-btn project-btn-secondary" href="<?= e($site['socials']['LinkedIn'] ?? 'https://www.linkedin.com/in/nida-asyanah-330593288') ?>" target="_blank" rel="noopener">
                            <svg class="linkedin-svg" viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.64 1.64 0 1 0 0-3.28 1.64 1.64 0 0 0 0 3.28m1.4 9.74v-8.37H5.06v8.37h2.8z"/></svg>
                            <span>Info via LinkedIn</span>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- CONTACT SECTION (GEN Z STYLE) -->
    <section class="section" id="kontak">
        <div class="section-header">
            <span class="section-kicker">Let's Connect & Collaborate</span>
            <h2>Hubungi Saya</h2>
            <p class="section-subtitle">Terbuka untuk tawaran posisi Administrasi & Data Entry, Host Live Streaming TikTok/Shopee, maupun proyek Sistem Informasi & Web.</p>
        </div>

        <div class="contact-container">
            <!-- CONTACT INFO & LINKEDIN CARD -->
            <div class="contact-details">
                <!-- FEATURED LINKEDIN CARD -->
                <div class="contact-linkedin-feature">
                    <div class="clf-avatar">
                        <img src="<?= e($site['photos']['portrait']) ?>" alt="<?= e($site['name']) ?>">
                    </div>
                    <div class="clf-info">
                        <div class="clf-badge">LinkedIn Verified Profile</div>
                        <h4><?= e($site['name']) ?></h4>
                        <p class="clf-role">Information Systems | Admin & Data Entry | Live Stream Host</p>
                        <p class="clf-campus">🎓 Universitas Darma Persada</p>
                        <a class="btn btn-linkedin btn-sm" href="<?= e($site['socials']['LinkedIn'] ?? 'https://www.linkedin.com/in/nida-asyanah-330593288') ?>" target="_blank" rel="noopener">
                            <svg class="linkedin-svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.64 1.64 0 1 0 0-3.28 1.64 1.64 0 0 0 0 3.28m1.4 9.74v-8.37H5.06v8.37h2.8z"/></svg>
                            <span>Kunjungi Profil LinkedIn</span>
                        </a>
                    </div>
                </div>

                <!-- QUICK CONTACT ITEMS WITH COPY BUTTON -->
                <div class="contact-info-list">
                    <div class="cil-item">
                        <span class="cil-icon">✉️</span>
                        <div class="cil-text">
                            <span class="cil-label">Email Langsung</span>
                            <a href="mailto:<?= e($site['email']) ?>" id="emailLink"><?= e($site['email']) ?></a>
                        </div>
                        <button type="button" class="btn-copy-email" id="btnCopyEmail" title="Salin Email">
                            <span>📋 Salin</span>
                        </button>
                    </div>
                    <div class="cil-item">
                        <span class="cil-icon">📍</span>
                        <div class="cil-text">
                            <span class="cil-label">Lokasi Domisili</span>
                            <span><?= e($site['location']) ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CONTACT FORM -->
            <div class="contact-form-wrapper">
                <div class="form-title-row">
                    <h3>Kirim Pesan Langsung</h3>
                    <span class="form-secure-badge">🔒 CSRF Protected</span>
                </div>

                <?php if ($flash): ?>
                    <div class="alert alert-<?= e($flash['type']) ?>" role="status">
                        <span class="alert-icon"><?= $flash['type'] === 'success' ? '✅' : '⚠️' ?></span>
                        <span><?= e($flash['text']) ?></span>
                    </div>
                <?php endif; ?>

                <form class="form modern-form" action="contact.php" method="post" novalidate>
                    <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
                    <!-- Honeypot anti-spam: dibiarkan kosong oleh manusia -->
                    <input type="text" name="website" class="hp" tabindex="-1" autocomplete="off" aria-hidden="true">

                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input id="nama" name="nama" type="text" required maxlength="80" placeholder="Masukkan nama Anda..." value="<?= e($old['nama'] ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input id="email" name="email" type="email" required maxlength="120" placeholder="nama@domain.com" value="<?= e($old['email'] ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label for="pesan">Pesan Anda</label>
                        <textarea id="pesan" name="pesan" rows="5" required maxlength="2000" placeholder="Tuliskan pesan, tawaran kerja, atau penawaran live stream di sini..."><?= e($old['pesan'] ?? '') ?></textarea>
                    </div>

                    <button class="btn btn-primary btn-submit" type="submit">
                        <span>Kirimkan Pesan Sekarang</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    </button>
                </form>
            </div>
        </div>
    </section>

</main>

<!-- TOAST NOTIFICATION -->
<div class="toast-notify" id="toastNotify">Email berhasil disalin ke clipboard! 📋</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
