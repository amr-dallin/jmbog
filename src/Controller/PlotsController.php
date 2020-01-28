<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Plots Controller
 *
 * @property \App\Model\Table\PlotsTable $Plots
 *
 * @method \App\Model\Entity\Plot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlotsController extends AppController
{
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // Systemic Page ID 2 - Plots page
        $systemicPagesTable = TableRegistry::getTableLocator()->get('SystemicPages');
        $page = $systemicPagesTable->get(2, [
            'contain' => ['MetaTags']
        ]);

        $plots = $this->Plots
            ->find()
            ->contain('People');

        $this->set(compact('page', 'plots'));
    }

    /**
     * View method
     *
     * @param number|null $number Plot number.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($number = null)
    {
        $plot = $this->Plots->get($id, [
            'contain' => ['People']
        ]);

        $this->set('plot', $plot);
    }
}
