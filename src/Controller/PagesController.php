<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagesController extends AppController
{
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['view']);
    }

    public function view($slug)
    {
        $page = $this->Pages
            ->find('slugged', ['slug' => $slug])
            ->find('published')
            ->contain('MetaTags')
            ->first();

        if (empty($page)) {
            throw new RecordNotFoundException(__('Page Not Found'));
        }

        $this->set('page', $page);
    }
}
