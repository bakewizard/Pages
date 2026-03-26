<?php
declare(strict_types=1);

namespace Pages\Controller\Admin;

use App\Attribute\Resource;
use App\Controller\Admin\AppController;

/**
 * @property \Search\Controller\Component\SearchComponent $Search
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class DashboardController extends AppController
{
    /**
     * Plugin dashboard
     *
     * Displays the plugin dashboard
     *
     * @return void
     */
    #[Resource(label: 'Pages dashboard')]
    public function index()
    {
        // Plugin dashboard logic goes here
    }
}
