<div class="container">
  <div class="row">

<div class="col-md-8">
    <h3><?= h($user->name) ?></h3>
    <table class="table">
        <tr>
          <th scope="row"><?= __('Id') ?></th>
          <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>
<div class="col-md-4">
  <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
  <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
  <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
  <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>

</div>
</div>

</div>
