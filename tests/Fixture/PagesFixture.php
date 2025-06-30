<?php
declare(strict_types=1);

namespace Pages\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PagesFixture
 */
class PagesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Test page 1',
                'alias' => 'test-page-1',
                'content' => '<h1>Test title 1</h1><p>Test content 1</p>',
                'seo_title' => null,
                'seo_description' => null,
                'seo_keywords' => null,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'name' => 'Test page 2',
                'alias' => 'test-page-2',
                'content' => '<h1>Test title 2</h1><p>Test content 2</p>',
                'seo_title' => null,
                'seo_description' => null,
                'seo_keywords' => null,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
        ];
        parent::init();
    }
}
