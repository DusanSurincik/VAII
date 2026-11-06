<section class="hero">
    <div class="hero-content">
        <h1>Objavte najlepšie podujatia v meste</h1>
        <form class="search-form" action="#" method="GET">
            <input type="text" placeholder="Hľadať podujatie alebo kategóriu..." name="search">
            <button type="submit">Hľadať</button>
        </form>
    </div>
</section>

<section class="events-section">
    <h2>Nadchádzajúce podujatia</h2>

    <?php if (empty($events)): ?>
        <p>Momentálne nie sú k dispozícii žiadne podujatia.</p>
    <?php else: ?>
        <div class="events-grid">
            <?php foreach ($events as $event): ?>
                <div class="event-card">
                    <?php if ($event->getImage()): ?>
                        <img src="<?= $link->asset($event->getImage()) ?>"
                             alt="<?= htmlspecialchars($event->getTitle()) ?>"
                             class="card-image"
                             style="object-fit: cover; width: 100%;">
                    <?php endif; ?>
                    <div class="card-content">
                        <h3><?= htmlspecialchars($event->getTitle()) ?></h3>
                        <p class="meta">
                            📅 <?= date('d.m.Y H:i', strtotime($event->getDate())) ?><br>
                            📍 <?= htmlspecialchars($event->getLocation()) ?>
                        </p>
                        <p><?= htmlspecialchars($event->getDescription()) ?></p>
                        <p class="price">
                            <?= $event->getPrice() > 0 ? number_format($event->getPrice(), 2, ',', ' ') . ' €' : 'Zadarmo' ?>
                        </p>
                        <a href="?c=event&a=detail&id=<?= $event->getId() ?>" class="btn-primary">Detail</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<section class="categories-section">
    <h2>Preskúmať podľa kategórie</h2>
    <div class="category-pills">
        <a href="#" class="pill">🎵 Hudba</a>
        <a href="#" class="pill">🎭 Divadlo</a>
        <a href="#" class="pill">⚽ Šport</a>
        <a href="#" class="pill">🎓 Prednášky</a>
    </div>
</section>