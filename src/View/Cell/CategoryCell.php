<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Category cell
 */
class CategoryCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
      $this->loadModel('Categories');
      $categories = $this->paginate($this->Categories);
      $this->set(compact('categories'));
      // $this->categories->recursive = 1;
      // $Category = $this->categories->find('all');
      // $this->set('books', $Category);
    }
}
