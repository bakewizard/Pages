<?php $this->assign('title', $page->seo_title); ?>
<?= $this->Html->meta('description', $page->seo_description, ['block' => true]); ?>
<?= $this->Html->meta('keywords', $page->seo_keywords, ['block' => true]); ?>

<?= $page->content ?>