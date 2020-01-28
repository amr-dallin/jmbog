<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * People Controller
 *
 * @property \App\Model\Table\PeopleTable $People
 *
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PeopleController extends AppController
{
    public function initialize() {
        parent::initialize();

        $this->loadComponent('Ajax.Ajax', [
            'actions' => ['add']
        ]);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $people = $this->People
            ->find()
            ->contain('Plots')
            ->toArray();

        $this->set('people', $people);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $person = $this->People->newEntity();
        if ($this->request->is('post')) {
            $person = $this->People->patchEntity($person, $this->request->getData());
            if ($this->People->save($person)) {
                $this->set('result', $person);
                $this->set('_serialize', ['result']);

                $this->Flash->success(__d('control_panel', 'The person has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__d('control_panel', 'The person could not be saved. Please, try again.'));
        }
        $this->set(compact('person'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $person = $this->People->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $person = $this->People->patchEntity($person, $this->request->getData());
            if ($this->People->save($person)) {
                $this->Flash->success(__d('control_panel', 'The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('control_panel', 'The person could not be saved. Please, try again.'));
        }
        $this->set(compact('person'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $person = $this->People->get($id);
        if ($this->People->delete($person)) {
            $this->Flash->success(__d('control_panel', 'The person has been deleted.'));
        } else {
            $this->Flash->error(__d('control_panel', 'The person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
