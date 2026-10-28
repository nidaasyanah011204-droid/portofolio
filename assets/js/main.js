// ==========================================================
// PORTFOLIO JAVASCRIPT - NIDA ASYANAH
// Interactive Photo Studio, Live Stream Overlay & Gen Z Touches
// ==========================================================

document.addEventListener('DOMContentLoaded', () => {

    // 1. Mobile Menu Toggle
    const toggle = document.querySelector('.nav-toggle');
    const menu = document.getElementById('menu');

    function closeMobileMenu() {
        if (!menu || !toggle) return;
        menu.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.classList.remove('is-active');
    }

    if (toggle && menu) {
        toggle.addEventListener('click', (e) => {
            e.stopPropagation();
            const isOpen = menu.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            toggle.classList.toggle('is-active', isOpen);
        });

        menu.addEventListener('click', (e) => {
            if (e.target && (e.target.tagName === 'A' || e.target.closest('a'))) {
                closeMobileMenu();
            }
        });

        // Close when clicking outside menu
        document.addEventListener('click', (e) => {
            if (menu.classList.contains('is-open') && !menu.contains(e.target) && !toggle.contains(e.target)) {
                closeMobileMenu();
            }
        });

        // Close on Escape key press
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && menu.classList.contains('is-open')) {
                closeMobileMenu();
                toggle.focus();
            }
        });

        // Reset if window resized above mobile/tablet breakpoint
        window.addEventListener('resize', () => {
            if (window.innerWidth > 991 && menu.classList.contains('is-open')) {
                closeMobileMenu();
            }
        }, { passive: true });
    }

    // 2. Interactive Photo Studio with Modes
    const mainPhoto = document.getElementById('mainProfilePhoto');
    const modeTabs = document.querySelectorAll('.mode-tab');
    const stripItems = document.querySelectorAll('.strip-item');
    const liveOverlay = document.getElementById('liveStreamOverlay');
    const modeBadge = document.getElementById('photoModeBadge');

    const modeData = {
        portrait: {
            emoji: '💻',
            text: 'IT & Programmer',
            overlay: false
        },
        casual: {
            emoji: '🎙️',
            text: 'TikTok & Shopee Live',
            overlay: true
        },
        formal: {
            emoji: '💼',
            text: 'PSN Data Specialist',
            overlay: false
        }
    };

    function switchPhotoMode(modeKey) {
        if (!mainPhoto || !modeData[modeKey]) return;

        const targetSrc = mainPhoto.getAttribute(`data-${modeKey}`);
        if (!targetSrc) return;

        // Sync tab buttons
        modeTabs.forEach(tab => {
            if (tab.getAttribute('data-mode') === modeKey) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });

        // Sync polaroid thumbnail strip
        stripItems.forEach(item => {
            if (item.getAttribute('data-mode') === modeKey) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });

        // Update photo with smooth fade transition
        mainPhoto.classList.add('fade-out');
        setTimeout(() => {
            mainPhoto.src = targetSrc;
            mainPhoto.onload = () => {
                mainPhoto.classList.remove('fade-out');
            };
            setTimeout(() => {
                mainPhoto.classList.remove('fade-out');
            }, 60);
        }, 120);

        // Toggle Live Stream Overlay
        if (liveOverlay) {
            if (modeData[modeKey].overlay) {
                liveOverlay.classList.add('active');
            } else {
                liveOverlay.classList.remove('active');
            }
        }

        // Update Sticker Badge Text
        if (modeBadge) {
            const emojiSpan = modeBadge.querySelector('.sticker-emoji');
            const textSpan = modeBadge.querySelector('.sticker-text');
            if (emojiSpan) emojiSpan.textContent = modeData[modeKey].emoji;
            if (textSpan) textSpan.textContent = modeData[modeKey].text;
        }
    }

    // Attach click to studio mode tabs
    modeTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const mode = tab.getAttribute('data-mode');
            switchPhotoMode(mode);
        });
    });

    // Attach click to polaroid strip items
    stripItems.forEach(item => {
        item.addEventListener('click', () => {
            const mode = item.getAttribute('data-mode');
            switchPhotoMode(mode);
        });
    });

    // 3. Interactive Tap-Tap Hearts (Live Commerce Feel)
    const btnLike = document.getElementById('btnLikeStream');
    const heartsContainer = document.getElementById('heartsContainer');
    const photoWindow = document.querySelector('.photo-view-window');
    const likeText = document.getElementById('likeCountText');
    let likeCount = 1240;

    const heartEmojis = ['💖', '❤️', '✨', '🔥', '🌸', '🥰'];

    function spawnHeart(xOffset = null) {
        if (!heartsContainer) return;

        const heart = document.createElement('span');
        heart.className = 'floating-heart';
        heart.textContent = heartEmojis[Math.floor(Math.random() * heartEmojis.length)];
        
        // Random horizontal drift
        const randomX = xOffset !== null ? xOffset : Math.floor(Math.random() * 40) - 20;
        heart.style.right = `${15 + randomX}px`;

        heartsContainer.appendChild(heart);

        likeCount++;
        if (likeText) {
            likeText.textContent = `${(likeCount / 1000).toFixed(1)}k Likes`;
        }

        setTimeout(() => {
            heart.remove();
        }, 1800);
    }

    if (btnLike) {
        btnLike.addEventListener('click', (e) => {
            e.preventDefault();
            spawnHeart();
            spawnHeart();
        });
    }

    if (photoWindow) {
        photoWindow.addEventListener('click', (e) => {
            // Only trigger if not clicking buttons or interactive tabs
            if (e.target.tagName !== 'BUTTON' && !e.target.closest('button')) {
                spawnHeart();
            }
        });
    }

    // 4. Copy Email to Clipboard with Toast Notification
    const btnCopyEmail = document.getElementById('btnCopyEmail');
    const toast = document.getElementById('toastNotify');
    const emailLink = document.getElementById('emailLink');

    if (btnCopyEmail && emailLink) {
        btnCopyEmail.addEventListener('click', () => {
            const email = emailLink.textContent.trim();
            navigator.clipboard.writeText(email).then(() => {
                if (toast) {
                    toast.classList.add('show');
                    setTimeout(() => {
                        toast.classList.remove('show');
                    }, 2800);
                }
            }).catch(() => {
                alert(`Email: ${email}`);
            });
        });
    }

    // 5. Scroll Spy for Navigation Links
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav a:not(.btn-topbar-linkedin)');

    const onScroll = () => {
        const scrollY = window.pageYOffset;

        sections.forEach((current) => {
            const sectionHeight = current.offsetHeight;
            const sectionTop = current.offsetTop - 140;
            const sectionId = current.getAttribute('id');

            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                navLinks.forEach((link) => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${sectionId}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    };

    window.addEventListener('scroll', onScroll, { passive: true });
});
