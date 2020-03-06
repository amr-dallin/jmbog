<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
    }

    public function login()
    {
        if ($this->request->is('post')) {

            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__d('control_panel', 'Username or password is incorrect'));
            }
        }
    }

    public function logout()
    {
        $this->redirect($this->Auth->logout());
    }

    public function settings()
    {
        $user = $this->Users->get(
            $this->getRequest()->getSession()->read('Auth.User.id')
        );

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), [
                'fields'   => ['current_password', 'new_password', 'new_password_confirm'],
                'validate' => 'default'
            ]);

            if ($this->Users->save($user)) {
                if (isset($user->new_password)) {
                    $this->Flash->success(__d('control_panel', 'The user password has been changed. Please, Log In.'), ['class' => 'success']);
                    return $this->redirect(['_name' => 'logout']);
                }

                $this->Flash->success(__d('control_panel', 'The user has been saved.'), ['class' => 'success']);
                return $this->redirect(['action' => 'settings']);
            }
            $this->Flash->error(__d('control_panel', 'The user could not be saved. Please, try again.'), ['class' => 'error']);
        }

        $this->set('user', $user);
    }
}
