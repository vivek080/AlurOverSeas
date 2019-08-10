
<div class="col-md-6">
    <?= $this->Form->create($category, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Category') ?></legend>
        <?php
            echo $this->Form->control('name',['class' => 'form-control']);
            echo $this->Form->input('path', ['type' => 'file', 'class' => 'form-control']);
        ?>
    </fieldset><br>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-success']) ?>&nbsp;&nbsp;&nbsp;
    <?= $this->Html->link('Cancel',['action'=>'index'],['class' => 'btn btn-primary danger']); ?>
    <?= $this->Form->end() ?>
</div>
