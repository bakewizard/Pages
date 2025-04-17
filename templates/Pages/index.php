<?php if (isset($meta)): ?>
    <?php $this->assign('title', $meta->seo_title); ?>
    <?= $this->Html->meta('description', $meta->seo_description, ['block' => true]); ?>
    <?= $this->Html->meta('keywords', $meta->seo_keywords, ['block' => true]); ?>
<?php endif; ?>

<ul class="list-group list-group-flush">
    <?php foreach ($pages as $page): ?>
        <li class="list-group-item">
            <?= $this->Html->link($page->name, ['plugin' => 'Pages', 'controller' => 'Pages', 'action' => 'show', $page->alias]) ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php if ($this->Paginator->params()['pageCount'] > 1): ?>
    <div class="row mt-2">
        <nav class="col-12 d-flex justify-content-center" aria-label="Page navigation">
            <ul id="pager" class="pagination">
                <?= $this->Paginator->prev('<i class="bi-caret-left-fill"></i>', ['escape' => false]); ?>
                <?= $this->Paginator->numbers(['first' => 3, 'last' => 3]); ?>
                <?= $this->Paginator->next('<i class="bi-caret-right-fill"></i>', ['escape' => false]); ?>
            </ul>
        </nav>
    </div>
<?php endif; ?>