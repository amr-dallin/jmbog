<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 *
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->set('events', $this->Events->find());
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity(
                $event,
                $this->request->getData(),
                ['associated' => ['MetaTags']]
            );
            if ($this->Events->save($event)) {
                $this->Flash->success(__d('control_panel', 'The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('control_panel', 'The event could not be saved. Please, try again.'));
        }
        $this->set('event', $event);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['MetaTags', 'Plots'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity(
                $event,
                $this->request->getData(),
                ['associated' => ['MetaTags', 'Plots']]
            );
            if ($this->Events->save($event)) {
                $this->Flash->success(__d('control_panel', 'The event has been saved.'));

                return $this->redirect(['action' => 'edit', $id]);
            }
            $this->Flash->error(__d('control_panel', 'The event could not be saved. Please, try again.'));
        }

        $plots = $this->Events->Plots->find('list');
        $this->set(compact('event', 'plots'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__d('control_panel', 'The event has been deleted.'));
        } else {
            $this->Flash->error(__d('control_panel', 'The event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
