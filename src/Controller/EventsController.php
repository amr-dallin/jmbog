<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 *
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsController extends AppController
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
        // Systemic Page ID 3 - Events page
        $systemicPagesTable = TableRegistry::getTableLocator()->get('SystemicPages');
        $page = $systemicPagesTable->get(3, [
            'contain' => ['MetaTags']
        ]);

        $events = $this->Events->find('new')->toArray();
        $eventsCompleted = $this->Events->find('completed')->toArray();

        $this->set(compact('events', 'eventsCompleted', 'page'));
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Plots', 'MetaTags'],
        ]);

        $this->set('event', $event);
    }
}
