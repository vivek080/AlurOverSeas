
<div class="container">

<div class="col-md-12">

  <h3><?= __('Categories') ?></h3>
  <table class="table ">
          <?php $i = 0; ?>
          <?php foreach ($categories as $category): ?>
              <?php
              if($i%3 == 0){
                echo"<tr>";
              }
               // echo WWW_ROOT.'img\uploads\Category\\'.$category['path'];
               // return;
               ?>
              <td><img src='<?php echo $category['path']; ?>' style="width:300px; height: 175px;"></img><br><h4><?php echo $category['name']; ?></h4></td>
            <?php
              // echo "<td><img src='$category['path']' alt=''></td>";
              if($i%2 == 2){
                echo"</tr>";
              }
              $i++; ?>
          <?php endforeach; ?>

  </table>


</div>

</div>
