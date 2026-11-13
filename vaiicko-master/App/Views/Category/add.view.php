<?php
/** @var \App\Models\Category $category */
/** @var \Framework\Support\LinkGenerator $link */
?>

<div class="container mt-4" style="max-width: 700px;">
    <a href="<?= $link->url('category.index') ?>" class="text-decoration-none fw-bold text-secondary">&larr; Späť na kategórie</a>
    <h1 class="mt-3"><?= $category->getId() ? 'Upraviť kategóriu' : 'Pridať novú kategóriu' ?></h1>

    <form action="<?= $link->url('category.save') ?>" method="POST" class="mt-4">
        <input type="hidden" name="id" value="<?= $category->getId() ?>">

        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Názov kategórie</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($category->getName() ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Popis kategórie</label>
            <textarea class="form-control" id="description" name="description" rows="4"><?= htmlspecialchars($category->getDescription() ?? '') ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Uložiť kategóriu</button>
    </form>
</div>