<?php
/** @var \App\Models\Event $event */
/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Category[] $categories */
?>

<div class="event-container" style="grid-template-columns: 1fr; max-width: 800px;">
    <div class="event-details">
        <a href="<?= $link->url('home.index') ?>" style="display: inline-block; margin-bottom: 1.5rem; color: #555; text-decoration: none; font-weight: bold;">&larr; Späť na zoznam</a>

        <h1>Pridať nové podujatie</h1>

        <form action="<?= $link->url('event.save') ?>" method="POST" enctype="multipart/form-data" class="mt-4">
            <input type="hidden" name="id" value="<?= $event->getId() ?>">

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Názov podujatia</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($event->getTitle() ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Popis</label>
                <textarea class="form-control" id="description" name="description" rows="5" required><?= htmlspecialchars($event->getDescription() ?? '') ?></textarea>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label fw-bold">Kategória</label>
                <select class="form-select" id="category_id" name="category_id">
                    <option value="">-- Bez kategórie --</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category->getId() ?>" <?= $event->getCategoryId() === $category->getId() ? 'selected' : '' ?>>
                            <?= htmlspecialchars($category->getName()) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="date" class="form-label fw-bold">Dátum a čas</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" value="<?= $event->getDate() ? date('Y-m-d\TH:i', strtotime($event->getDate())) : '' ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="location" class="form-label fw-bold">Miesto</label>
                    <input type="text" class="form-control" id="location" name="location" value="<?= htmlspecialchars($event->getLocation() ?? '') ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label fw-bold">Cena (€)</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?= $event->getPrice() ?? '0.00' ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label fw-bold">Obrázok podujatia</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
            </div>

            <button type="submit" class="btn-buy mt-3" style="width: auto; padding: 0.8rem 2rem;">Uložiť podujatie</button>
        </form>
    </div>
</div>