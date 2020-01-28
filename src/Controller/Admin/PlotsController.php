<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Plots Controller
 *
 * @property \App\Model\Table\PlotsTable $Plots
 *
 * @method \App\Model\Entity\Plot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlotsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $plots = $this->Plots
            ->find()
            ->contain('People');

        $this->set('plots', $plots);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $plot = $this->Plots->newEntity();
        if ($this->request->is('post')) {
            $plot = $this->Plots->patchEntity($plot, $this->request->getData());
            if ($this->Plots->save($plot)) {
                $this->Flash->success(__d('control_panel', 'The plot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('control_panel', 'The plot could not be saved. Please, try again.'));
        }

        $people = $this->Plots->People->find('list', ['valueField' => 'full_name']);
        $this->set(compact('people', 'plot'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Plot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $plot = $this->Plots->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $plot = $this->Plots->patchEntity($plot, $this->request->getData());
            if ($this->Plots->save($plot)) {
                $this->Flash->success(__d('control_panel', 'The plot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('control_panel', 'The plot could not be saved. Please, try again.'));
        }
        $people = $this->Plots->People->find('list', ['valueField' => 'full_name']);
        $this->set(compact('people', 'plot'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Plot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plot = $this->Plots->get($id);
        if ($this->Plots->delete($plot)) {
            $this->Flash->success(__d('control_panel', 'The plot has been deleted.'));
        } else {
            $this->Flash->error(__d('control_panel', 'The plot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
