<?php
declare(strict_types=1);

namespace Pages\Controller;

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
     * Pages list
     *
     * Displays a pages list
     *
     * @menu
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'limit' => 10,
        ];
        $pages = $this->paginate($this->Pages);

        $this->set(compact('pages'));
    }

    /**
     * Single page
     *
     * Displays a single page
     *
     * @menu Pages
     * @param string $alias The alias of the page to display
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function show(string $alias)
    {
        $page = $this->Pages->findByAlias($alias)->first();

        if (empty($page)) {
            throw new NotFoundException(__d('pages', 'Page not found'));
        }

        $this->set(compact('page'));
    }
}
