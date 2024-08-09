<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>crud dashboard</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="./lib/css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="./lib/css/custom.css">
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		
		
		<!--google fonts -->
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
	
	   <!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
	  <style>
        canvas{
            height: 600px !important;
            /* width: 600px !important; */
        }
    </style>
  </head>
  <body>
  


<div class="wrapper">
     
	  <div class="body-overlay"></div>
	 
	 <!-------sidebar--design------------>
	 
	 <div id="sidebar">
	    <div class="sidebar-header">
		   <h3><img src="./lib/img/logo.png" class="img-fluid"/><span>Admin</span></h3>
		</div>
		
		<ul class="list-unstyled component m-0">
		<li class="dropdown">
		  <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">fact_check</i>Order
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu4" >
		     <li >
				<a href="index.php?mode=admin&act=oder_manage">Order</a></li>
			
		  </ul>
		  </li>
	
		  
		  <li class="dropdown">
		  <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">inventory_2</i>Product
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu1">
		     <li><a href="index.php?mode=admin&act=product">Product Manage</a></li>
			
		  </ul>
		  </li>
		  
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">category</i>Category
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu2">
		  <li><a href="index.php?mode=admin&act=category">Category</a></li>
			
		  </ul>
		  </li>
		  
	
		  
		  
		
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">person</i>User
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu5">
		     <li><a href="index.php?mode=admin&act=user">User</a></li>
			 
		  </ul>
		  </li>
		  
		  <li class="dropdown">
		  <a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">comment</i>Comment
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu6">
		     <li><a href="index.php?mode=admin&act=comment">Comment</a></li>
		
		  </ul>
		  </li>
		  
		  
		
		  
		
		  <li class="">
		  <a href="index.php" class=""><i class="material-icons">home</i>Home </a>
		  </li>
		  <li class="">
		  <a href="index.php?act=logout" class=""><i class="material-icons">logout</i>Logout </a>
		  </li>
		
		</ul>
	 </div>
	 
<div id="content">
	 <div class="top-navbar">
  <div class="xd-topbar">
    <div class="row">
      <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
        <div class="xp-menubar">
          <span class="material-icons text-white">signal_cellular_alt</span>
        </div>
      </div>