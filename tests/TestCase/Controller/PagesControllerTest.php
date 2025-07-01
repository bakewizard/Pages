<?php
declare(strict_types=1);

namespace Pages\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * Pages\Controller\PagesController Test Case
 *
 * @link \Pages\Controller\PagesController
 */
class PagesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    protected array $fixtures = [
        'plugin.Pages.Pages',
    ];

    /**
     * Test index method
     *
     * @return void
     * @link \Pages\Controller\PagesController::index()
     */
    public function testIndex(): void
    {
        $this->get('/pages');
        $this->assertResponseOk();
        $this->assertResponseContains('Test page 1');
        $this->assertResponseContains('Test page 2');
    }

    /**
     * Test the show method for a specific page.
     *
     * @return void
     * @link \Pages\Controller\PagesController::show()
     */
    public function testShowValidAlias(): void
    {
        $this->get('/pages/test-page-1');
        $this->assertResponseOk();
        $this->assertResponseContains('Test title 1');
    }

    /**
     * Test the show method for a non-existent page.
     *
     * @return void
     * @link \Pages\Controller\PagesController::show()
     */
    public function testShowInvalidAlias(): void
    {
        $this->get('/pages/non-existent-alias');
        $this->assertResponseCode(404);
        $this->assertResponseContains('Page not found');
    }
}
