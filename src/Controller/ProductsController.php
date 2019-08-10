<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories']
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {

              $data = $this->request->data;
              $uploaded_path = "/img/uploads/Products";
              // $tmp_name = $this->request->data['path']['tmp_name'];
              $image_name = $this->request->data['path']['name'];
              $savedata=array(
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'description' => $data['description'],
                'path' => $uploaded_path."/".$image_name
              );
            $product = $this->Products->patchEntity($product, $savedata);
            if ($this->Products->save($product)) {
                move_uploaded_file($data['path']['tmp_name'],WWW_ROOT.'img/uploads/Products/'.$image_name);
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $uploaded_path = "/img/uploads/Products";
            // $tmp_name = $this->request->data['path']['tmp_name'];
            $data = $this->request->getData();
            $image_name = $this->request->getData()['path']['name'];

            if ($image_name=='' || empty($image_name)) {
              $savedata=array(
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'description' => $data['description'],
                'path' => $product['path'],
                );
              $product = $this->Products->patchEntity($product, $savedata);
              if ($this->Products->save($product)) {
                  $this->Flash->success(__('The product has been saved.'));

                  return $this->redirect(['action' => 'index']);
              }
              $this->Flash->error(__('The product could not be saved. Please, try again.'));

            }
            else {
              $savedata=array(
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'description' => $data['description'],
                'path' => $uploaded_path."/".$image_name
              );
              $product = $this->Products->patchEntity($product, $savedata);
              if ($this->Products->save($product)) {
                move_uploaded_file($data['path']['tmp_name'],WWW_ROOT.'img/uploads/Products/'.$image_name);
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
              }
              $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }

        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
