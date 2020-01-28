<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 *
 * @method \App\Model\Entity\File[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $files = $this->Files->find('common');
        $this->set('files', $files);
    }

    public function images()
    {
        $files = $this->Files
            ->find('common')
            ->find('byType', ['type' => 'image']);

        $this->set('files', $files);
    }

    public function documents()
    {
        $files = $this->Files
            ->find('common')
            ->find('byType', ['type' => 'application']);

        $this->set('files', $files);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $file = $this->Files->newEntity();
        if ($this->request->is('post')) {
            $file = $this->Files->patchEntity($file, $this->request->getData());
            if ($this->Files->save($file)) {
                $this->Flash->success(__d('control_panel', 'The file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('control_panel', 'The file could not be saved. Please, try again.'));
        }
        $this->set(compact('file'));
    }

    /**
     * Delete method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $file = $this->Files->get($id);
        if ($this->Files->delete($file)) {
            $this->Flash->success(__d('control_panel', 'The file has been deleted.'));
        } else {
            $this->Flash->error(__d('control_panel', 'The file could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
}
