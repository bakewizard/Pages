<?php
declare(strict_types=1);

namespace Pages\Controller;

use App\Attribute\Link;
use Cake\Http\Exception\NotFoundException;

/**
 * Pages Controller
 *
 * @property \Pages\Model\Table\PagesTable $Pages
 * @method \Cake\Datasource\ResultSetInterface<\Pages\Model\Entity\Page> paginate(\Cake\Datasource\RepositoryInterface|\Cake\Datasource\QueryInterface|string|null $object = null, array $settings = [])
 */
class PagesController extends AppController
{
    /**
     * Index method.
     *
     * Retrieves a paginated list of pages.
     * The result set is limited to 10 records per page`.
     *
     * @return \Cake\Http\Response|void
     */
    #[Link(summary: 'Pages list', description: 'Displays a list of pages')]
    public function index()
    {
        $this->paginate = [
            'limit' => 10,
        ];
        $pages = $this->paginate($this->Pages);

        $this->set(compact('pages'));
    }

    /**
     * Show method.
     *
     * Retrieves a single page by its alias.
     * If the page cannot be found, a NotFoundException is thrown.
     *
     * @param string $alias The alias of the page to display
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When the page is not found.
     */
    #[Link(summary: 'Single page', description: 'Displays a single page', picker: 'Pages')]
    public function show(string $alias)
    {
        $page = $this->Pages->findByAlias($alias)->first();

        if (empty($page)) {
            throw new NotFoundException(__d('pages', 'Page not found'));
        }

        $this->set(compact('page'));
    }
}
