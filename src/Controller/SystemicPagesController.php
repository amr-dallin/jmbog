<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * SystemicPages Controller
 *
 * @property \App\Model\Table\SystemicPagesTable $SystemicPages
 *
 * @method \App\Model\Entity\SystemicPage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SystemicPagesController extends AppController
{
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['display', 'sitemap', 'robots']);
    }

    public function display()
    {
        $page = $this->SystemicPages->get(1, ['contain' => ['MetaTags']]);

        $eventsTable = TableRegistry::getTableLocator()->get('Events');
        $events = $eventsTable->find('new')->toArray();

        $this->set(compact('events', 'page'));
    }

    public function sitemap()
    {
        if (!$this->request->is('xml')) {
            throw new RecordNotFoundException(__('Page not found'));
        }

        $eventsTable = TableRegistry::getTableLocator()->get('Events');
        $events = $eventsTable->find();

        $this->set(compact('events'));
    }

    public function robots()
    {
        $this->request->addDetector('extTxt',
            function ($request) {
                return $request->getParam('_ext') === 'txt';
            }
        );

        if (!$this->request->is('extTxt')) {
            throw new RecordNotFoundException(__('Page not found'));
        }
    }
}
