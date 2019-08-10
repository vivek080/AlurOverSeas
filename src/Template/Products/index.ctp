<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>

<div class="container">
    <h3><?= __('Products') ?></h3>
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
              <div class="text-fluid" style="padding:0 !important; padding-left: 0 !important; padding-right: 0 !important; "><?= $this->Paginator->sort('id') ?></div>
              <div class="col-3 text-fluid"><?= $this->Paginator->sort('category_id') ?></div>
              <div class="col-2 text-fluid"><?= $this->Paginator->sort('name') ?></div>
              <div class="col-2 text-fluid"><?= $this->Paginator->sort('Image') ?></div>
              <div class="col-2 text-fluid" class="actions" style="margin-left:50px;"><?= __('Actions') ?></div>
        </div>

        <!-- <div> -->
            <?php foreach ($products as $product): ?>
            <div class="row">
                <div class=" text-fluid" style="padding:0 !important;"><?= $this->Number->format($product->id) ?></div>
                <div class="col-3 text-fluid" ><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></div>
                <div class="col-2 text-fluid"><?= h($product->name) ?></div>
                <div class="col-2 text-fluid" ><img class="img" src='<?php echo $product['path'];?>' style="width:100px;"></img></div>
                <div class="col-2 text-fluid" class="actions" style="margin-left:50px;">

                    <?= $this->Html->link(__(''), ['action' => 'view', $product->id],['class' => 'action-icon fa fa-eye']) ?>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $product->id],['class' => 'action-icon fa fa-edit']) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $product->id],['class' => 'action-icon fa fa-trash','confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                </div>
            </div><hr>
            <?php endforeach; ?>
        <!-- </div> -->
      </div>
    </div>

    <div class="paginator" style="text-align:center">
        <ul class="pagination" style="text-align:center; justify-content:center;">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>&nbsp;&nbsp;
            <?= $this->Paginator->numbers() ?>&nbsp;&nbsp;
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
