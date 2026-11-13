<?php
/** @var \App\Models\Category $category */
/** @var \App\Models\Event[] $events */
/** @var \App\Models\Event[] $otherEvents */
/** @var \Framework\Support\LinkGenerator $link */
/** @var string|null $error */
?>

<div class="container mt-4" style="max-width: 900px;">
    <a href="<?= $link->url('category.index') ?>" class="text-decoration-none fw-bold text-secondary">&larr; Späť na kategórie</a>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <h1><?= htmlspecialchars($category->getName()) ?></h1>
        <div>
            <a href="<?= $link->url('category.edit', ['id' => $category->getId()]) ?>" class="btn btn-warning btn-sm">Upraviť kategóriu</a>
        </div>
    </div>

    <?php if ($category->getDescription()): ?>
        <p class="text-muted mt-2"><?= htmlspecialchars($category->getDescription()) ?></p>
    <?php endif; ?>

    <hr class="my-4">

    <?php if (empty($otherEvents)): ?>
        <H3 class="text-muted">Všetky existujúce podujatia už sú priradené v tejto kategórii.</H3>
    <?php else: ?>
        <form action="<?= $link->url('category.assignEvent') ?>" method="POST" class="row g-2 align-items-center mb-4">
            <input type="hidden" name="category_id" value="<?= $category->getId() ?>">
            <div class="col-md-8">
                <select name="event_id" class="form-select" required aria-label="Vybrať podujatie">
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>
                    <option value="">-- Vyberte podujatie --</option>
                    <?php foreach ($otherEvents as $otherEvent): ?>
                        <option value="<?= $otherEvent->getId() ?>">
                            <?= htmlspecialchars($otherEvent->getTitle()) ?>
                            (<?= date('d.m.Y', strtotime($otherEvent->getDate())) ?>)
                            <?php if ($otherEvent->getCategory()): ?>
                                — [už v kategórii: <?= htmlspecialchars($otherEvent->getCategory()->getName()) ?>]
                            <?php endif; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success w-100">Priradiť do kategórie</button>
            </div>
        </form>
    <?php endif; ?>

    <h3 class="mt-4">Podujatia v tejto kategórii (<?= count($events) ?>)</h3>
    <?php if (empty($events)): ?>
        <p>V tejto kategórii zatiaľ nie sú žiadne podujatia.</p>
    <?php else: ?>
        <ul class="list-group mt-3">
            <?php foreach ($events as $event): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <a href="<?= $link->url('event.detail', ['id' => $event->getId()]) ?>" class="fw-bold text-decoration-none">
                            <?= htmlspecialchars($event->getTitle()) ?>
                        </a>
                        <small class="text-muted d-block">
                            📅 <?= date('d.m.Y H:i', strtotime($event->getDate())) ?> | 📍 <?= htmlspecialchars($event->getLocation()) ?>
                        </small>
                    </div>
                    <a href="<?= $link->url('category.removeEvent', ['category_id' => $category->getId(), 'event_id' => $event->getId()]) ?>"
                       class="btn btn-outline-danger btn-sm"
                       onclick="return confirm('Odobrať toto podujatie z kategórie?');">Odobrať z kategórie</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>