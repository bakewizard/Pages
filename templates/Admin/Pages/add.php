<?php
/**
 * @var \App\View\AppView $this
 * @var \Pages\Model\Entity\Page $page
 */
?>
<?= $this->Html->script(['/backend/plugins/tinymce/tinymce.min', 'Pages.backend/main'], ['block' => true, 'type' => 'module']) ?>
<div class="card card-success card-outline">
    <div class="card-header">
        <div class="card-title"><i class="fa-solid fa-edit me-2"></i><?= __('Add Page') ?></div>
    </div>
    <?= $this->Form->create($page, ['align' => 'horizontal']) ?>
    <div class="card-body">
        <?= $this->Form->control('name'); ?>
        <?= $this->Form->control('alias'); ?>
        <?= $this->Form->control('content'); ?>
        <?= $this->Form->control('seo_title'); ?>
        <?= $this->Form->control('seo_description'); ?>
        <?= $this->Form->control('seo_keywords'); ?>
    </div>
    <div class="card-footer">
        <?= $this->element('form/save_buttons') ?>
        <?= $this->Html->link('<i class="fa-solid fa-times-circle"></i> ' . __('Cancel'), ['action' => 'index', '?' => $this->request->getQueryParams()], ['class' => 'btn btn-outline-danger', 'escape' => false]) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
