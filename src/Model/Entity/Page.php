<?php
declare(strict_types=1);

namespace Pages\Model\Entity;

use Cake\ORM\Entity;

/**
 * Page Entity
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string $content
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property array<\Cake\ORM\Entity> $_i18n
 */
class Page extends Entity
{
    /**
     * @inheritDoc
     */
    protected array $_accessible = [
        'name' => true,
        'alias' => true,
        'content' => true,
        'seo_title' => true,
        'seo_description' => true,
        'seo_keywords' => true,
        'created' => true,
        'modified' => true,
    ];
}
