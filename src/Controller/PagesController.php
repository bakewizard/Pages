<?php

declare(strict_types=1);

namespace Pages\Controller;

use Cake\Http\Exception\NotFoundException;

/**
 * Pages Controller
 *
 * @property \Pages\Model\Table\PagesTable $Pages
 */
class PagesController extends AppController
{

    /**
     * Pages list
     * 
     * Displays a pages list
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'limit' => 10
        ];
        $pages = $this->paginate($this->Pages);

        $this->set(compact('pages'));
    }

    /**
     * Single page
     * 
     * Displays a single page
     * 
     * @items Pages
     *
     * @return \Cake\Http\Response|null
     */
    public function show($alias)
    {
        $page = $this->Pages->findByAlias($alias)->first();

        if (empty($page)) {
            throw new NotFoundException(__d('pages', 'Page not found'));
        }

        $this->set(compact('page'));
    }

}
