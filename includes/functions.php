<?php
// Escape output supaya aman dari XSS.
function e(mixed $text): string
{
    return htmlspecialchars((string) ($text ?? ''), ENT_QUOTES, 'UTF-8');
}

function csrf_token(): string
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['csrf'];
}
