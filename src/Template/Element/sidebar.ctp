
  <nav class="col-md-2">
    <?php if($Auth->user()['role'] == 'admin'): ?>
      <div class="dropdown">
        <button class="btn btn-primary danger" ><?= __('Actions') ?></button><br>
          <div class="dropdown-content">
            <div class="side-nav" style="list-style: none; display: inline-block; "><br>
              <div><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'],['style'=>'text-decoration: none']) ?> </div>
              <div><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'],['style'=>'text-decoration: none']) ?> </div>
              <div><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'],['style'=>'text-decoration: none']) ?> </div>
              <div><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'],['style'=>'text-decoration: none']) ?> </div>
              <div><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add'],['style'=>'text-decoration: none']) ?> </div>
              <div><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index'],['style'=>'text-decoration: none']) ?> </div>
            </div>
          </div>
      </div><br>

      <?php endif;?>
  </nav>
