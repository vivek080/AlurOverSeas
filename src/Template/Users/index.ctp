<div class="container">
      <h3><?= __('Users') ?></h3>
      <table class="table table-border table-responsive">
        <thead>
          <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('email') ?></th>

            <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user): ?>
            <tr>
              <td><?= $this->Number->format($user->id) ?></td>
              <td><?= h($user->name) ?></td>
              <td><?= h($user->email) ?></td>

              <td class="actions">
                <?= $this->Html->link(__(''), ['action' => 'view', $user->id],['class' => 'action-icons fa fa-eye']) ?>
                <?= $this->Html->link(__(''), ['action' => 'edit', $user->id],['class' => 'action-icons fa fa-edit']) ?>
                <?= $this->Form->postLink(__(''), ['action' => 'delete', $user->id], ['class' => 'action-icons fa fa-trash','confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="paginator" style="text-align:center">
        <ul class="pagination" >
          <?= $this->Paginator->first('<< ' . __('first')) ?>
          <?= $this->Paginator->prev('< ' . __('previous')) ?>
          <?= $this->Paginator->numbers() ?>
          <?= $this->Paginator->next(__('next') . ' >') ?>
          <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
      </div>
</div>
