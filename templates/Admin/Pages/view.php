<div class="card card-primary card-outline">
    <div class="card-header">
        <div class="card-title"><i class="fa-solid fa-eye me-2"></i><?= h($page->name) ?> (<?= h($page->alias) ?>)</div>
    </div>
    <div class="card-body">
        <?= $page->content; ?>
    </div>
</div>
