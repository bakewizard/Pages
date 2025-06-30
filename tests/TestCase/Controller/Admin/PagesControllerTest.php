<?php
declare(strict_types=1);

namespace Pages\Test\TestCase\Controller\Admin;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * Pages\Controller\Admin\PagesController Test Case
 *
 * @uses \Pages\Controller\Admin\PagesController
 */
class PagesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Users',
        'app.Roles',
        'plugin.Pages.Pages',
    ];

    /**
     * setUp method
     *
     * This method is called before each test method.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $user = $this->fetchTable('Users')->get(1);

        $this->session([
            'Auth' => [
                'User' => $user,
            ],
        ]);
    }

    /**
     * tearDown method
     *
     * This method is called after each test method.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \Pages\Controller\Admin\PagesController::index()
     */
    public function testIndex(): void
    {
        $this->get('/admin/pages/pages');

        $this->assertResponseOk();
        $this->assertNotNull($this->viewVariable('pages'));
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \Pages\Controller\Admin\PagesController::view()
     */
    public function testView(): void
    {
        $this->get('/admin/pages/pages/view/1');
        $this->assertResponseOk();

        $this->assertNotEmpty($this->viewVariable('page'));
        $this->assertEquals(1, $this->viewVariable('page')->id);
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \Pages\Controller\Admin\PagesController::add()
     */
    public function testAddGet(): void
    {
        $this->get('/admin/pages/pages/add');
        $this->assertResponseOk();
    }

    /**
     * Test add post method
     *
     * @return void
     * @uses \Pages\Controller\Admin\PagesController::add()
     */
    public function testAddPost(): void
    {
        $postData = [
            'name' => 'New Page Title',
            'alias' => 'new-page-alias',
            'content' => '<p>This is the content of the new page.</p>',
            'seo_title' => 'New Page SEO Title',
            'seo_description' => 'Description for the new page.',
            'seo_keywords' => 'keyword1, keyword2, keyword3',
        ];
        $this->post('/admin/pages/pages/add', $postData);
        $this->assertResponseCode(302);
        $this->assertRedirectContains('/admin/pages/pages');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \Pages\Controller\Admin\PagesController::edit()
     */
    public function testEditGet(): void
    {
        $this->get('/admin/pages/pages/edit/1');
        $this->assertResponseOk();
    }

    /**
     * Test edit post method
     *
     * @return void
     * @uses \Pages\Controller\Admin\PagesController::edit()
     */
    public function testEditPost(): void
    {
        $postData = [
            'name' => 'Updated Page name',
        ];
        $this->post('/admin/pages/pages/edit/1', $postData);
        $this->assertResponseCode(302);
        $this->assertRedirectContains('/admin/pages/pages');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \Pages\Controller\Admin\PagesController::delete()
     */
    public function testDeletePost(): void
    {
        $this->post('/admin/pages/pages/delete/1');
        $this->assertResponseCode(302);
        $this->assertRedirectContains('/admin/pages/pages');
    }
}
