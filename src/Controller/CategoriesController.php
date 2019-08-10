<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

     public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        // $this->Auth->allow(['getcategories']);
    }

    public function index()
    {
        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('category', $category);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $uploaded_path = "/img/uploads/Category";
            // $tmp_name = $this->request->data['path']['tmp_name'];
            $image_name = $this->request->data['path']['name'];
            $savedata=array(
              'name' => $data['name'],
              'path' => $uploaded_path."/".$image_name
            );

            $category = $this->Categories->patchEntity($category, $savedata);
            if ($this->Categories->save($category)) {
                move_uploaded_file($data['path']['tmp_name'],WWW_ROOT.'img/uploads/Category/'.$image_name);
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            // $data = $this->request->data;
            $data = $this->request->getData();
            $uploaded_path = "/img/uploads/Category";
            // $tmp_name = $this->request->data['path']['tmp_name'];
            $image_name = $this->request->getData()['path']['name'];
            if ($image_name=='' || empty($image_name)){
                  $savedata=array(
                    'name' => $data['name'],
                    'path' => $category['path']
                  );
                  $category = $this->Categories->patchEntity($category, $savedata);
                  if ($this->Categories->save($category)) {
                      $this->Flash->success(__('The category has been saved.'));
                      return $this->redirect(['action' => 'index']);
                  }
                  $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
            else{
                  $savedata=array(
                    'name' => $data['name'],
                    'path' => $uploaded_path."/".$image_name
                  );
                  $category = $this->Categories->patchEntity($category, $savedata);
                  if ($this->Categories->save($category)) {
                      move_uploaded_file($data['path']['tmp_name'],WWW_ROOT.'img/uploads/Category/'.$image_name);
                      $this->Flash->success(__('The category has been saved.'));
                      return $this->redirect(['action' => 'index']);
                  }
                  $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('category'));

    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getcategories()
    {
      // echo json_encode(4543);
      // $Categories =$this->Categories->find('all');
      // $this->set(compact('categories'));
      // $this->set('_serialize','categories');
      $categories = $this->paginate($this->Categories);

      $this->set(compact('categories'));
      echo json_encode($categories);
      return $this->response;

    }
}
