<?php
/** @var \App\Models\Category[] $categories */
/** @var \Framework\Support\LinkGenerator $link */
?>

<div class="container mt-4" style="max-width: 900px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Kategórie podujatí</h1>
        <a href="<?= $link->url('category.add') ?>" class="btn btn-primary">+ Pridať kategóriu</a>
    </div>

    <?php if (empty($categories)): ?>
        <p>Zatiaľ nie sú vytvorené žiadne kategórie.</p>
    <?php else: ?>
        <table class="table table-striped align-middle">
            <thead>
            <tr>
                <th>Názov</th>
                <th>Popis</th>
                <th>Počet podujatí</th>
                <th class="text-end">Akcie</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><strong><?= htmlspecialchars($category->getName()) ?></strong></td>
                    <td><?= htmlspecialchars($category->getDescription() ?? '') ?></td>
                    <td><?= count($category->getEvents()) ?></td>
                    <td class="text-end">
                        <a href="<?= $link->url('category.detail', ['id' => $category->getId()]) ?>" class="btn btn-info btn-sm">Detail / Podujatia</a>
                        <a href="<?= $link->url('category.edit', ['id' => $category->getId()]) ?>" class="btn btn-warning btn-sm">Upraviť</a>
                        <a href="<?= $link->url('category.delete', ['id' => $category->getId()]) ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Naozaj chcete vymazať túto kategóriu?');">Vymazať</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>