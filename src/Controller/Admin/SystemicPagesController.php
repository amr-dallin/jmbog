<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * SystemicPages Controller
 *
 * @property \App\Model\Table\SystemicPagesTable $SystemicPages
 *
 * @method \App\Model\Entity\SystemicPage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SystemicPagesController extends AppController
{
    public function dashboard()
    {

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $systemicPages = $this->SystemicPages
            ->find('withoutAssociations')
            ->toArray();

        $this->set(compact('systemicPages'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $systemicPage = $this->SystemicPages->newEntity();
        if ($this->request->is('post')) {
            $systemicPage = $this->SystemicPages->patchEntity(
                $systemicPage,
                $this->request->getData(),
                ['associated' => ['MetaTags']]
            );
            if ($this->SystemicPages->save(
                $systemicPage,
                ['associated' => ['MetaTags']]
            )) {
                $this->Flash->success(__d('control_panel', 'The systemic page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('control_panel', 'The systemic page could not be saved. Please, try again.'));
        }
        $this->set(compact('systemicPage'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Systemic Page id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $systemicPage = $this->SystemicPages->get($id, [
            'contain' => ['MetaTags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $systemicPage = $this->SystemicPages->patchEntity($systemicPage, $this->request->getData());
            if ($this->SystemicPages->save($systemicPage)) {
                $this->Flash->success(__d('control_panel', 'The systemic page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('control_panel', 'The systemic page could not be saved. Please, try again.'));
        }
        $this->set(compact('systemicPage'));
    }
}
