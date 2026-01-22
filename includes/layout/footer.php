<?php
/**
 * includes/layout/footer.php
 *
 * Footer base del layout.
 */
?>
</main>
<footer>
    <small>&copy; <?= date('Y') ?> <?= htmlspecialchars(config('app')['name'] ?? 'App') ?></small>
</footer>
</body>
</html>
