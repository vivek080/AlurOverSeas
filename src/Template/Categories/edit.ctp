


<div class="col-md-6">
    <?= $this->Form->create($category, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Category') ?></legend>
        <?php
            echo $this->Form->control('name',['class' => 'form-control']);
            echo $this->Form->input('path', ['type' => 'file', 'class' => 'form-control']);
        ?>
    </fieldset><br>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-success']) ?>&nbsp;&nbsp;&nbsp;
    <?= $this->Html->link('Cancel',['action'=>'index'],['class' => 'btn btn-primary danger']); ?>
    <?= $this->Form->end() ?>
</div>
<nav class="col-md-2">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $category->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
