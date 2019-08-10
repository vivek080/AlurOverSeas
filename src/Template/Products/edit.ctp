
<div class="col-md-5">
    <?= $this->Form->create($product, ['type' => 'file']) ?>

        <?php
            echo $this->Form->control('category_id', ['options' => $categories,'class'=>'form-control']);
            echo $this->Form->control('name',['class'=>'form-control']);
            echo $this->Form->control('description',['class'=>'form-control']);?>
            <br><img src="<?php echo $product['path'] ?>" style="width:100px; height:100px; margin-left:40px"><br>
            <?php echo $this->Form->input('path', ['type' => 'file', 'class' => 'form-control']);?>

        <br>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success']) ?>&nbsp;&nbsp;&nbsp;
    <?= $this->Html->link('Cancel',['action'=>'index'],['class' => 'btn btn-primary danger']); ?>
    <?= $this->Form->end() ?>
</div>
