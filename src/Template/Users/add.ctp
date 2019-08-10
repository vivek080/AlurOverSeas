
<div class="col-md-4">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('name',['class'=>'form-control']);
            echo $this->Form->control('email',['class'=>'form-control']);
            echo $this->Form->control('password',['class'=>'form-control']);
            echo $this->Form->control('role',['class'=>'form-control']);
        ?>
    </fieldset><br>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success']) ?>&nbsp;&nbsp;&nbsp;
    <?= $this->Html->link('Cancel',['action'=>'index'],['class' => 'btn btn-primary danger']); ?>
    <?= $this->Form->end() ?>
</div>
