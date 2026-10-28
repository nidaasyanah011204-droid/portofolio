<footer class="footer">
    <p>&copy; <?= date('Y') ?> <?= e($site['name']) ?> &bull; <?= e($site['university'] ?? 'Universitas Darma Persada') ?>. Dibuat dengan PHP.</p>
    <ul class="socials">
        <?php foreach (($site['socials'] ?? []) as $label => $link): ?>
            <li><a href="<?= e($link) ?>" target="_blank" rel="noopener"><?= e($label) ?></a></li>
        <?php endforeach; ?>
    </ul>
</footer>
<script src="assets/js/main.js"></script>
</body>
</html>
