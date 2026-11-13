<?php
/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Event[] $events */
/** @var \App\Models\Category[] $categories */
/** @var \App\Models\Category|null $selectedCategory */
?>

<section class="hero">
    <div class="hero-content">
        <h1>Objavte najlepšie podujatia v meste</h1>
        <form class="search-form" action="#" method="GET">
            <input type="text" placeholder="Hľadať podujatie alebo kategóriu..." name="search" aria-label="Hľadať podujatie">
            <button type="submit">Hľadať</button>
        </form>
    </div>
</section>

<section class="categories-section">
    <h2>Preskúmať podľa kategórie</h2>
    <div class="category-pills">
        <a href="<?= $link->url('home.index') ?>"
           class="pill"
           style="<?= $selectedCategory === null ? 'background-color: #2563eb; color: #ffffff;' : '' ?>">
            Všetky
        </a>

        <?php foreach ($categories as $category): ?>
            <?php $isActive = $selectedCategory && $selectedCategory->getId() === $category->getId(); ?>
            <a href="<?= $link->url('home.index', ['category_id' => $category->getId()]) ?>"
               class="pill"
               style="<?= $isActive ? 'background-color: #2563eb; color: #ffffff;' : '' ?>">
                <?= htmlspecialchars($category->getName()) ?>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<section class="events-section">
    <h2>
        <?php if ($selectedCategory): ?>
            Podujatia v kategórii: <?= htmlspecialchars($selectedCategory->getName()) ?>
        <?php else: ?>
            Nadchádzajúce podujatia
        <?php endif; ?>
    </h2>

    <?php if (empty($events)): ?>
        <p>Pre zvolený výber momentálne nie sú k dispozícii žiadne podujatia.</p>
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
                            <?php if ($event->getCategory()): ?>
                                🏷️ <?= htmlspecialchars($event->getCategory()->getName()) ?><br>
                            <?php endif; ?>
                            📅 <?= date('d.m.Y H:i', strtotime($event->getDate())) ?><br>
                            📍 <?= htmlspecialchars($event->getLocation()) ?>
                        </p>
                        <p><?= htmlspecialchars($event->getDescription()) ?></p>
                        <p class="price">
                            <?= $event->getPrice() > 0 ? number_format($event->getPrice(), 2, ',', ' ') . ' €' : 'Zadarmo' ?>
                        </p>
                        <a href="<?= $link->url('event.detail', ['id' => $event->getId()]) ?>" class="btn-primary">Detail</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>