<?php
declare(strict_types=1);

namespace Pages\Controller\Admin;

use App\Attribute\Resource;
use App\Controller\Admin\AppController;
use Cake\Event\EventInterface;

/**
 * Pages Controller
 *
 * @property \Pages\Model\Table\PagesTable $Pages
 * @property \Search\Controller\Component\SearchComponent $Search
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 * @method \Cake\Datasource\ResultSetInterface<\Pages\Model\Entity\Page> paginate(\Cake\Datasource\RepositoryInterface|\Cake\Datasource\QueryInterface|string|null $object = null, array $settings = [])
 */
class PagesController extends AppController
{
    /**
     * @inheritDoc
     */
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');

        $this->addCrumb(
            preg_replace('/([A-Z])/', ' ' . '$1', $controller),
            [
                'prefix' => 'Admin',
                'plugin' => 'Pages',
                'controller' => $controller,
                'action' => 'index',
            ],
        );

        if ($action !== 'index') {
            $this->addCrumb($action);
        }
    }

    /**
     * Pages list
     *
     * Displays a pages list
     *
     * @return \Cake\Http\Response|void
     */
    #[Resource(label: 'List pages')]
    public function index()
    {
        $pages = $this->paginate($this->Pages);

        $this->set(compact('pages'));
    }

    /**
     * View method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    #[Resource(label: 'View page contents')]
    public function view(?string $id = null)
    {
        $page = $this->Pages->get($id);

        $this->set('page', $page);
    }

    /**
     * New page
     *
     * Creates a new page
     *
     * @return \Cake\Http\Response|void Redirects on successful add, renders view otherwise.
     */
    #[Resource(label: 'Create a page')]
    public function add()
    {
        $page = $this->Pages->newEmptyEntity();
        if ($this->request->is('post')) {
            $page = $this->Pages->patchEntity($page, $this->request->getData());
            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The page has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The page could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('page'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    #[Resource(label: 'Edit a page')]
    public function edit(?string $id = null)
    {
        $page = $this->Pages->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $page = $this->Pages->patchEntity($page, $this->request->getData());
            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The page has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The page could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('page'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    #[Resource(label: 'Delete a page')]
    public function delete(?string $id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        if ($this->Pages->delete($page)) {
            $this->Flash->success(__('The page has been deleted.'));
        } else {
            $this->Flash->error(__('The page could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
