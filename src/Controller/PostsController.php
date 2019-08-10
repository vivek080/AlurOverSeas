<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);

        $this->set('post', $post);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        // $uploaded_path = "/img/uploads/";
        // $tmp_name = $this->request->data['path']['tmp_name'];
        // $image_name = $this->request->data['path']['name'];

        if ($this->request->is('post')){
          $data = $this->request->data;
          $uploaded_path = "/img/uploads";
          // $tmp_name = $this->request->data['path']['tmp_name'];
          $image_name = $this->request->data['path']['name'];
          $savedata=array(
            'name' => $data['name'],
            'description' => $data['description'],
            'path' => $uploaded_path."/".$image_name
          );

          $post = $this->Posts->patchEntity($post, $savedata);

        // }

        // if ($this->request->is('post')) {
        //     $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                move_uploaded_file($data['path']['tmp_name'],WWW_ROOT.'img/uploads/'.$image_name);
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('post'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

          $data = $this->request->data;
          $uploaded_path = "/img/uploads";
          // $tmp_name = $this->request->data['path']['tmp_name'];
          $image_name = $this->request->data['path']['name'];
          $savedata=array(
            'name' => $data['name'],
            'description' => $data['description'],
            'path' => $uploaded_path."/".$image_name
          );

          $post = $this->Posts->patchEntity($post, $savedata);

        // }

        // if ($this->request->is('post')) {
        //     $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                move_uploaded_file($data['path']['tmp_name'],WWW_ROOT.'img/uploads/'.$image_name);
            // $post = $this->Posts->patchEntity($post, $this->request->getData());
            // if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('post'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // public function beforeFilter(Event $event){
    //   // $this->Auth->deny(['controller' => 'users']);
    //   // $this->Auth->deny('users');
    //   $this->Auth->deny(['controller' => 'users', 'action' => 'display', 'index']);
    // }
    //


}
