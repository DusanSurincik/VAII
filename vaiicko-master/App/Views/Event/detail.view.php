<?php
/** @var \App\Models\Event $event */
/** @var \Framework\Support\LinkGenerator $link */
?>

<div class="event-container">
    <div class="event-details">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <a href="<?= $link->url('home.index') ?>" style="color: #555; text-decoration: none; font-weight: bold;">&larr; Späť na zoznam</a>

            <!-- Tlačidlá pre správu podujatia -->
            <div>
                <a href="<?= $link->url('event.edit', ['id' => $event->getId()]) ?>" class="btn btn-warning btn-sm">Upraviť</a>
                <a href="<?= $link->url('event.delete', ['id' => $event->getId()]) ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Naozaj chcete vymazať toto podujatie?');">Vymazať</a>
            </div>
        </div>

        <?php if ($event->getImage()): ?>
            <img src="<?= $link->asset($event->getImage()) ?>"
                 alt="<?= htmlspecialchars($event->getTitle()) ?>"
                 style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 8px; margin-bottom: 1.5rem;">
        <?php endif; ?>

        <h1><?= htmlspecialchars($event->getTitle()) ?></h1>

        <p class="meta" style="font-size: 1.1rem; margin-top: 1rem;">
            📅 <strong>Dátum:</strong> <?= date('d.m.Y H:i', strtotime($event->getDate())) ?><br>
            📍 <strong>Miesto:</strong> <?= htmlspecialchars($event->getLocation()) ?>
        </p>

        <h2 class="section-title">Popis podujatia</h2>
        <p style="white-space: pre-line; line-height: 1.8;"><?= htmlspecialchars($event->getDescription()) ?></p>
    </div>

    <div class="event-sidebar">
        <div class="checkout-widget">
            <h3>Vstupenky</h3>
            <div class="price-calc">
                <span>Cena:</span>
                <strong><?= $event->getPrice() > 0 ? number_format($event->getPrice(), 2, ',', ' ') . ' €' : 'Zadarmo' ?></strong>
            </div>
            <button class="btn-buy">Kúpiť lístok</button>
        </div>
    </div>
</div>