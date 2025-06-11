<?php
declare(strict_types=1);

namespace Pages\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\EventInterface;

class AppController extends BaseController
{
    /**
     * Before render callback.
     *
     * @param \Cake\Event\EventInterface $event The beforeRender event.
     * @return void
     */
    public function beforeRender(EventInterface $event)
    {
        $action = $this->request->getParam('action');

        $this->addCrumb(__d('pages', 'Information'), ['plugin' => 'Pages', 'controller' => 'Pages', 'action' => 'index']);

        if ($action === 'show') {
            $this->addCrumb($this->viewBuilder()->getVar('page')->name);
        }

        parent::beforeRender($event);
    }
}
