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
 * @property \App\Model\Entity\PagesNameTranslation $name_translation
 * @property \App\Model\Entity\PagesContentTranslation $content_translation
 * @property \App\Model\Entity\PagesSeoTitleTranslation $seo_title_translation
 * @property \App\Model\Entity\PagesSeoDescriptionTranslation $seo_description_translation
 * @property \App\Model\Entity\PagesSeoKeywordsTranslation $seo_keywords_translation
 * @property \App\Model\Entity\PagesI18n[] $_i18n
 */
class Page extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected array $_accessible = [
        'name' => true,
        'alias' => true,
        'content' => true,
        'seo_title' => true,
        'seo_description' => true,
        'seo_keywords' => true,
        'created' => true,
        'modified' => true
    ];

}
