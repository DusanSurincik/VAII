<?php
/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= App\Configuration::APP_NAME ?> | EventHub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $link->asset('css/style.css') ?>">
</head>
<body>

<header class="site-header">
    <div class="logo">
        <strong><a href="<?= $link->url('home.index') ?>" style="text-decoration: none; color: inherit;">EventHub</a></strong>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="<?= $link->url('home.index') ?>">Podujatia</a></li>
            <li><a href="<?= $link->url('event.add') ?>">Pridať podujatie</a></li>
            <li><a href="#">Miesta</a></li>
            <li><a href="#" class="btn-login">Prihlásiť / Registrovať</a></li>
        </ul>
    </nav>
</header>

<main>
    <?= $contentHTML ?>
</main>

<footer class="site-footer">
    <p>&copy; 2026 EventHub. Semestrálna práca VAII.</p>
</footer>

</body>
</html>