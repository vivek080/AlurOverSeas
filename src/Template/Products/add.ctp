

<div class="col-md-5">
    <?= $this->Form->create($product, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
            echo $this->Form->control('category_id', ['options' => $categories,'class'=>'form-control']);
            echo $this->Form->control('name',['class'=>'form-control']);
            echo $this->Form->control('description',['class'=>'form-control']);
            echo $this->Form->input('path', ['type' => 'file', 'class' => 'form-control','class'=>'form-control']);
        ?>
    </fieldset><br>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success']) ?>&nbsp;&nbsp;&nbsp;
    <?= $this->Html->link('Cancel',['action'=>'index'],['class' => 'btn btn-primary danger']); ?>
    <?= $this->Form->end() ?>
</div>
