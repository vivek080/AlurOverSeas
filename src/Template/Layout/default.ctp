
<!DOCTYPE html>
<html lang="en">
<head>

  <?php $parameters = $this->request->getAttribute('params');?>
  <?php
    if($parameters['controller']=='Pages' ){
      ?><title>Alur Overseas &#8211; Export And Import</title><?php
    }
    elseif ($parameters['controller']=='Categories'){
      ?><title>CATEGORIES</title><?php
    }
    elseif ($parameters['controller']=='Products'){
      ?><title>Products</title><?php
    }
    elseif ($parameters['controller']=='Users'){
      ?><title>USER Profile</title><?php
    }
    elseif ($parameters['controller']=='Users' && $parameters['action']=='login' ){
      ?><title>LOGIN</title><?php
    }
    else{
      ?><title>Alur Overseas &#8211; Export And Import</title><?php
    }
  ?>
  <!-- <title>Alur Overseas &#8211; Export And Import</title> -->
  <link rel="icon" href="/img/logo0.jpg" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet/css" href="css/style.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<?= $this->Html->css('style.css') ?>

</head>
<body>

  <script>
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
  </script>


  <!-- <nav  style="height:5px; background-color:#0056b3;">
  </nav> -->
  <!-- Navigation -->


  <nav class ="navbar navbar-expand-md navbar-light text-body " style="background-color: white">
      <div class="container">
          <a href="/" class="navbar-brand  font-weight-bold ">
          	<img style="width: 240px; height:60px;" src="/img/logo1.jpg">
          </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse text-center" id="collapsenavbar">
          <ul class="navbar-nav navbar-padding ml-auto">

            <li class="nav-item ">
              <a href="/" class="active nav-link" >HOME</a>
            </li>
            <li class="nav-item ">
              <a href="/aboutus" class="active nav-link" >ABOUT US</a>
            </li>
            <li class="nav-item ">
              <a href="/ourproducts" class="active nav-link" >OUR PRODUCTS</a>
            </li>
            <li class="nav-item ">
              <a href="/contact" class="active nav-link" >CONTACT US</a>
            </li>
            <?php $parameters = $this->request->getAttribute('params');
            // $user = $this->Users->get($id, ['contain' => []]);?>
            <?php if($loggedIn): ?>

                <?php if($parameters['controller']=='Pages' || $parameters['controller']=='Categories' || $parameters['controller']=='Products'): ?>
                  <li class="nav-item "><?= $this->Html->link('VIEW USER',['controller'=>'users','action'=>'index'],[ 'class' => 'active nav-link']); ?></li>
                  <li class="nav-item "><?= $this->Html->link('LOGOUT',['controller'=>'users','action'=>'logout'],[ 'class' => 'active nav-link']); ?></li>
                <?php else: ?>
                  <li class="nav-item "><?= $this->Html->link('LOGOUT',['controller'=>'users','action'=>'logout'],[ 'class' => 'active nav-link']); ?></li>
                <?php endif; ?>
            <?php else: ?>
                <li class="nav-item "><?= $this->Html->link('LOGIN',['controller'=>'users','action'=>'login'],[ 'class' => 'active nav-link']); ?></li>
            <?php endif; ?>

          </ul>
        </div>
      </div>
  </nav>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<div class="">
  <?php echo $this->element('script')?>
  <?= $this->Flash->render() ?>
  <div class=" body-wrapper">
    <?php $parameters = $this->request->getAttribute('params');?>
    <?php if($parameters['controller']!='Pages' && $parameters['action']!='login' ){
      ?><div class="row"><?php
        echo $this->element('sidebar');
        echo $this->fetch('content');
      ?></div><?php
    }
    else {
      echo $this->fetch('content');
    }
    ?>
  </div>
</div>

  <!-- Footer -->

<div class="col-sm-12" style="background-color: #292c2e; padding-top: 30px; padding-bottom: 20px; item-align:center; justify-content:center; text-align: center;">
  	<div class="container" style="background-color: #33383b; padding-top: 30px; padding-bottom: 30px; padding-left: 50px; padding-right: 50px; font:sans-serif;">
  		<div class="row" style="color: #AAA">

        <div class="col-sm-4 sm-text-center">
  				<div class="footer-left">
  					<p class="footer-company-name" >
  						<h3 style="color: white; font-size: 1.35rem;"><span style="color: #5383d3">Alur Overseas</span> Pvt. Ltd</h3>
  						Copyright &copy; 2019 - All Rights Reserved
  					</p><br>
  					<div class="cin-no">
  					       <span><b>CIN:</b> U74999KA2016PTC096340</span>
  					</div>
    					<a href='https://www.stat-counter.org/' style="text-decoration: none; color: #AAA;">stat-counter.org</a>
    					<script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=9392658d29db0a19e59ccc3f1589e8318fa6f864'></script>
    					<script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/483580/t/9"></script>
  				</div><br><br>
  			</div>

  			<div class="col-sm-4 sm-text-center" >
  					<div class="footer-center">
  							<div class="icons">
  								<span class="icon-wrap">
  									<i class="fa fa-map-marker" style="font-size: 1.5rem; color: white;"></i>
  								</span>
  								<div>
  									<span>Sy.No. 10/3, Plot No. 123 <br>Parijat Marg,Vinayak Nagar,<br>Belgaum 590010, Karnataka, India</span>
  			          </div>
  							</div><br>

  							<div class="icons">
  								<span class="icons icon-wrap">
  									<i class="icons fa fa-phone" style="font-size: 1.5rem; color: white"></i>
  								</span>
  								<div>+91-7337868336</div>
  			          <div> +91-9448110793</div>
  							</div><br>

  							<div class="icons">
  								<span class="icons icon-wrap">
  									<i class="icons fa fa-envelope " style="font-size: 1.5rem; color: white"></i>
  								</span>
  								 <div><a href="mailto:aoplbgm123@gmail.com" style="text-decoration: none; color: #AAA;">aoplbgm123@gmail.com</a></div>
  								 <div><a href="mailto:vikranthalur@hotmail.com" style="text-decoration: none; color: #AAA;">vikranthalur@hotmail.com</a></div>
  								 <div><a href="vikranthalur@gmail.com" style="text-decoration: none; color: #AAA;"> vikranthalur@gmail.com</a></div>
  							</div><br>
  					</div>
  			</div>

  			<div class="col-sm-4 sm-text-center" style="item-align:center; justify-content:center; text-align: center;">
  				<div class="footer-right">
  						<div class="icon icons footer-icons flex-container">
  								  <div><a href="#"><i class="icons fa fa-yahoo " style="font-size: 1.5rem; color: white;"></i></a></div>
  								  <div><a href="#"><i class="fa fa-facebook" style="font-size: 1.5rem; color: white;"></i></a></div>
  								  <div><a href="#"><i class="fa fa-instagram" style="font-size: 1.5rem; color: white;"></i></a></div>
  						</div>
  						<br>
  						<p class="footer-company-about">
  							<span>Designed by</span>
  							<p>WeTrunk IT Solutions Belgaum Karnataka</p>
  						</p>
  				</div>
  			</div>

  		</div>
  	</div>
  </div>
    <!-- End of Footer -->
</div>

</body>
</html>
