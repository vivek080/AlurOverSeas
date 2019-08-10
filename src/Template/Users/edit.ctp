<div class="col-md-4">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
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

<nav class="col-md-2"><br>
    <!-- <ul class="side-nav" style="text-decoration:none;"> -->
        <div class="heading"><?= __('Actions') ?></div>
        <div><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],['' => 'btn btn-primary danger'],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></div><br>
        <div><?= $this->Html->link(__('List Users'), ['action' => 'index'],['' => 'btn btn-primary danger']) ?></div>
    <!-- </ul> -->
</nav>
