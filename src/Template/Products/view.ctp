<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<br><br>
<div class="">

<div class="col-md-9">
    <h3><?= h($product->name) ?></h3>

    <div class="row">
      <div class="container">

        <img class="img-fluid" src='<?php echo $product['path']; ?>'></img><br><br>
        <h4><?= __('Description') ?></h4>
        <p style="font-size:20px; font-family: Libre Baskerville;"><?= $product['description']; ?></p>
    </div>
  </div>

</div>
</div>
