<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){
      if($this->request->is('post')){
        $user=$this->Auth->identify();
        if($user){
          $this->Auth->setUser($user);
          if($this->Auth->user()["role"] == 'user'){

            return $this->redirect(['controller'=>'posts']);
          }else{

            return $this->redirect(['controller'=>'users']);
          }
        }
        //bad login
        $this->Flash->error('Incorrect Login',['class'=>'flasherror']);
      }
    }

    public function logout(){
      $this->Flash->success('you are logged out',['class'=>'logout flashsuccess']);
      return $this->redirect($this->Auth->logout());
    }

    // public function initialize(){
    //   if($this->Auth->user()["role"] == 'user'){
    //     $this->redirect(['controller'=>'posts']);
    //   }
    //   else{
    //     $this->redirect(['controller'=>'users']);
    //   }
    // }

    public function getSaveContactDetails()
    {
      $response['status'] = false;
      if ($this->request->is('post')) {
        $this->loadModel('Contacts');
        $contact = $this->Contacts->newEntity();
        $contacts = $this->request->getData();
        // $email = $contact['email'];
        // $message = $contact['message'];
        // ['email'];
        // print_r $contacts['message'];
        $contact = $this->Contacts->patchEntity($contact, $contacts);
        if ($this->Contacts->save($contact)) {
          // print_r($contacts['email']);
          // exit;
          $response['status'] = true;
          $response['message'] = "Message sent Successfully.";
          $email = new Email();
          $email
              ->from(['vicky.h0898@gmail.com'=>'my Site'])
              ->to('vivekhiremath1440@gmail.com')
              ->subject('ALUR Contact us Message')
              ->send($contacts['message']);

        }else{
          $response['message'] = "Unable to send message, Try again.";
        }
      }else{
        $response['message'] = "Unable to send message, Try again.";

      }

      echo json_encode($response);
      return $this->response;



    }


}
