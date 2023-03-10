<link rel="stylesheet" href="css/user-profile.css">

<?php
  include('head.inc.php');
  include('header.inc.php');
  include('nav.inc.php');
  include('user-profile.inc.php');
  include('footer.inc.php');
?>

<section class="user-profile">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="user-profile__avatar">
          <img src="path/to/avatar.jpg" alt="User Avatar">
        </div>
      </div>
      <div class="col-md-8">
        <div class="user-profile__details">
          <h2 class="user-profile__name">John Doe</h2>
          <p class="user-profile__location"><i class="fas fa-map-marker-alt"></i> New York City</p>
          <ul class="user-profile__stats">
            <li><strong>Properties Listed:</strong> 10</li>
            <li><strong>Properties Sold:</strong> 5</li>
            <li><strong>Properties Rented:</strong> 3</li>
          </ul>
          <div class="user-profile__bio">
            <h3>About Me</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor mauris eget sapien efficitur, sit amet bibendum lorem faucibus. Etiam finibus elit nec elit accumsan tincidunt. Duis gravida suscipit felis, ut efficitur purus tincidunt sit amet. In ullamcorper ante vel velit faucibus pharetra. Nam et dolor consequat, aliquam elit id, scelerisque libero. Sed nec arcu vitae est finibus facilisis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc sit amet tincidunt turpis, sit amet tincidunt libero. Nulla facilisi.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
