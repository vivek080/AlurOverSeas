  <div class="col-md-9" style="justify-content:center; item-align:center; text-align: center">
    <h4 style="text-align:center"><?= __($category['name']) ?></h4><br>
    <?php if (!empty($category->products)): ?>
    <div class="row ">
            <?php foreach ($category->products as $products): ?>
                <?php
                // if($i%3 == 0){
                  echo"<div class='col-md-4' style='justify-content:center; item-align:center; text-align: center'>";
                // }
                 ?>
                  <?php echo $this->Html->image($products['path'], [
                    'url' => ['controller' => 'products','action' => 'view',$products['id']],
                    'class' => 'category_img img-fuild'
                  ]); ?>
                  <br>
                  <h4><?php echo $this->Html->link($products['name'], ['controller' => 'products','action' => 'view',$products['id']]); ?></h4>
                  <p style="text-align:center;"><?php echo $this->Html->link('Read more', ['controller' => 'products','action' => 'view',$products['id']]); ?></p>

                    <?php if($Auth->user()['role'] == 'admin'): ?>
                      <div><?= $this->Html->link(__('Edit'), ['controller' => 'products','action' => 'edit', $products->id]) ?> &nbsp;&nbsp;&nbsp;
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'products','action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete {0}?', $products->name)]) ?>  </div>
                    <?php endif;?>


              <?php
                // echo "<td><img src='$category['path']' alt=''></td>";
                // if($i%2 == 2){
                  echo"</div>";
                // }
                // $i++; ?>
            <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
