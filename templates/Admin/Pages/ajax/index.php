<?php
/**
 * @var \App\View\AppView $this
 * @var array<\Pages\Model\Entity\Page>|\Cake\Collection\CollectionInterface<\Pages\Model\Entity\Page> $pages
 */
?>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('alias') ?></th>
                        <th><?= $this->Paginator->sort('name') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pages as $page): ?>
                        <tr>
                            <td><?= h($page->alias) ?></td>
                            <td>
                                <?= $this->Html->link($page->name, ['plugin' => 'Pages', 'prefix' => false, 'controller' => 'Pages', 'action' => 'show', $page->alias], ['role' => 'button']); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-end">
            <?= $this->Paginator->first('<i class="fa-solid fa-step-backward"></i>', ['escape' => false]); ?>
            <?= $this->Paginator->prev('<i class="fa-solid fa-backward"></i>', ['escape' => false]); ?>
            <?= $this->Paginator->numbers(); ?>
            <?= $this->Paginator->next('<i class="fa-solid fa-forward"></i>', ['escape' => false]); ?>
            <?= $this->Paginator->last('<i class="fa-solid fa-step-forward"></i>', ['escape' => false]); ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
