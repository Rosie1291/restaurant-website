<?php 

// $msg="<p><h3>Number of views: ". $_COOKIE['count'] ." times</h3></p>";
// if(!isset($_COOKIE['count'])) {
//     $cookie = 1;
//     setcookie("count", $cookie);
// } else {
//     $cookie = ++$_COOKIE['count'];
//     setcookie("count", $cookie);
//     if ($cookie == 5) {
//         $msg = "<p><h2>Thanks for visiting, you have visited this page ". $_COOKIE['count'] ." times.</h2></p>";
//     } else if ($cookie == 10) {
//         $msg = "<p><h2>Welcome back, you have visited this page ". $_COOKIE['count'] ." times.</h2></p>";
//     } else if ($cookie == 15) {
//         $msg = "<p><h2>Great to see you again, you have visited this page ". $_COOKIE['count'] ." times.</h2></p>";
//     } else if ($cookie == 20) {
//         unset($_COOKIE['count']);
//         $cookie = 1;
//         setcookie("count", $cookie);
//     }
// }
// echo ($msg);

$page_title = 'Welcome to this Site!';
include('includes/header.html');

?>

<div class="hero">
  <div class="container">
	<div class="row d-flex align-items-center">
		<div class="col-lg-6 hero-left">
		    <h1 class="display-4 mb-5">We Love <br>Delicious Foods!</h1>
		    <div class="mb-2">
		    	<a class="btn btn-primary btn-shadow btn-lg" href="view_menu.php" role="button">Explore Menu</a>
		    </div>

        <ul class="hero-info list-unstyled d-flex text-center mb-0">
		    	<li class="border-right">
		    		<span class="lnr lnr-rocket"></span>
		    		<h5>
		    			Fast Delivery
		    		</h5>
		    	</li>
		    	<li class="border-right">
		    		<span class="lnr lnr-leaf"></span>
		    		<h5>
		    			Fresh Food
		    		</h5>
		    	</li>
		    	<li class="">
		    		<span class="lnr lnr-bubble"></span>
		    		<h5>
		    			24/7 Support
		    		</h5>
		    	</li>
		    </ul>
	    </div>
	</div>
  </div>
</div>
<div class="container">
    
        <div class="row">
            <div class="col-sm-5 img-bg d-flex shadow align-items-center justify-content-center justify-content-md-end img-2" style="background-image: url(img/combination.jpeg);">  
            </div>
            <div class="col-sm-7 py-5 pl-md-0 pl-4">
                <div class="heading-section pl-lg-5 ml-md-5">
                    <span class="subheading">
                        About
                    </span>
                    <h2>
                        Welcome to LingLing Restaurant
                    </h2>
                </div>
                <div class="pl-lg-5 ml-md-5">
                  <p>Come dine with us. We specialize in Asian cuisine, including Chinese, Japanese, Vietnamese, and Thai food.</p>
                </div>
            </div>
        </div>


 <?php


include('includes/footer.html');
?>