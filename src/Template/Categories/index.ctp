

<div class="col-md-9">
    <h3><?= __('Categories') ?></h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- <th scope="col">< $this->Paginator->sort('id') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col">Image</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <!-- <td>< $this->Number->format($category->id) ?></td> -->
                <td><?= h($category->name) ?></td>
                <td><img src='<?php echo $category['path']; ?>' style="width:100px; height: 40px;"></img></td>
                <td class="actions">
                    <?= $this->Html->link(__(''), ['action' => 'view', $category->id],['class' => 'action-icons fa fa-eye']) ?>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $category->id],['class' => 'action-icons fa fa-edit']) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $category->id], ['class' => 'action-icons fa fa-trash','confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator" style="text-align:center; justify-content:center;">
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



<!-- <div class="row">
  <div class="container">
  <div class="col-md-12">
    <h3>
      ?= __('Categories') ?>
    </h3>
    <table class="table ">
            ?php $i = 0;
            foreach ($categories as $category):
                if($i%3 == 0){
                  echo"<tr>";
                }
                 // echo WWW_ROOT.'img\uploads\Category\\'.$category['path'];
                 // return;
                 ?>
                <td><img src='?php echo $category['path']; ?>' style="width:300px; height: 175px;"></img><br><h4>?php echo $category['name']; ?></h4></td>
              ?php
                // echo "<td><img src='$category['path']' alt=''></td>";
                if($i%2 == 2){
                  echo"</tr>";
                }
                $i++;
              endforeach; ?>

    </table>
  </div>
</div>
</div> -->
