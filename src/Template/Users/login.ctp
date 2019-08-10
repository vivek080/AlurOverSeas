<br>
<div class="form-signin">
  <div class="panel">
    <h1 class="h3 mb-3 font-weight-normal">LOG IN</h1>
    <?= $this->Form->create(); ?>
      <?= $this->form->input('email',['class'=>'form-control']); ?>
      <?= $this->form->input('password',['type'=>'password','class'=>'form-control']); ?>
      <?= $this->form->Submit('login',['class'=>'button button btn btn-lg btn-primary btn-block']) ?>
    <?= $this->Form->end(); ?>

  </div>
  <div class="row" style="height:50px;">

  </div>
</div>
