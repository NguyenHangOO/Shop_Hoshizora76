<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HOSHIZORA76</title>
	<base href="/">
	<Link rel="shortcut icon" href="public/images/logo.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" > 
</head>
<body>
<div id="wrapper">
	<header>
		<div id="menuwrapperpic">
			<div  id="logo"> 
				<a href="/"> <img id="lg" src="public/images/logo-shop.png" ></a>
			</div>		
			<div  id="menuwrapper">
				<ul id="menubar">
					<li>
						<a data-toggle="tooltip" title="Giỏ hàng" class="cart"  href="./Order/CartKhachHang"><svg id="svg" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
						<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
						</svg>
							<?php
								if (isset($_SESSION['username'])){
								$row= json_decode($data["spcart"],true);
								$tongsp = count($row); ?>
								<sup><span class="badge badge-danger navbar-badge" style="margin-left:-10px;">
									<?php echo $tongsp; ?>
								</span></sup>
							<?php } ?>
						</a>	
					</li>
					<li>
						<a class="nav-link" data-toggle="tooltip" href="./Account/Notification" title="Thông báo"><svg id="svg" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
						<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
						</svg>
							<?php
								if (isset($_SESSION['username'])){
								$row= json_decode($data["tbuser"],true);
								$tongtb = count($row); ?>
								<sup><span class="badge badge-warning navbar-badge" style="margin-left:-10px;">
									<?php echo $tongtb; ?>
								</span></sup>
							<?php	} ?>
						</a>
					</li>
					<li id="help">
						<a href="help" data-toggle="tooltip" title="Trợ giúp"> <svg id="svg" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
						<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
						<path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
						</svg></a>
					</li>
					<li>
					<?php 
						if (isset($_SESSION['username']) && $_SESSION['username']){ ?>
							<!--echo '<a href="./Account/Infomation"data-toggle="tooltip" title="Bấm để thêm thông tin">'.$_SESSION["username"].'</a>'; -->
							<a href="./Account/Infomation"data-toggle="tooltip" title="<?php echo $_SESSION["nameuss"]; ?>" style="padding:6px 6px 6px;">
							<?php
								$row= json_decode($data["ttuser"],true);
								foreach ($row as list("img"=>$img,"fullname"=>$username)){ ?>
								<?php 
									if($img !="" && file_exists($img)){ ?>
										<img src="<?php echo $img ?>" style="width:32px;height:32px;border-radius:50%;">
									<?php }  else {?>
										<img src="./public/images/unnamed.png" style="width:32px;height:32px;border-radius:50%;">
									<?php } ?>
							<?php } ?>
							</a>
						<?php }
						else{ ?>
							<a href="./Register/Sigin" data-toggle="tooltip" title="Vui lòng đăng nhập!" style="padding-top:15px;"><i style="font-size:18px" class="far fa-user"></i></a>	
						<?php } ?>
					</li>
				</ul>
			</div>
			<div id="menusrch" >
				<form  class="form-inline my-2 my-lg-0" action="./Sreach/ProductOne" method="POST" >
					<?php 
						if(isset($data["dulieu"])){ ?>
							<input id="srch" name="dulieu" value="<?php echo $data["dulieu"] ?>" class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" >
					<?php	} else { ?>
					<input id="srch" name="dulieu" class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" >
					<?php } ?>
					<button id="btnsrch" name="btnSreach" class="btn btn-outline-success my-2 my-sm-0" type="submit" ><svg id="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
					<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
					</svg></button>	
				</form>			
			</div>
			<div id="menu-category">
				<div id="menu-header">
					<div id="toggle">
						<i id="tog" class="fas fa-bars"></i>
					</div>
					<nav class="menu-menu">
						<ul id="main-menu">
							<li><a href="Product/GroupCategory/176520"><i class="fas fa-paw"></i> Gấu bông</a></li>
							<li><a href="Product/GroupCategory/276520"><i class="fas fa-holly-berry"></i> Trang trí</a></li>
							<li><a href="Product/GroupCategory/376520"><i class="fab fa-canadian-maple-leaf"></i> Handmade <i class="fas fa-angle-down"></i></a>
								<ul class="sub-menu">
								<?php 
									$row= json_decode($data["dmsp1"],true);
									foreach ($row as list("id"=>$id,"tenloai"=>$tenloai,"icon"=>$icon)){?>
										<li><a href="<?php echo 'Product/Grouptype/376520/'.$id.'' ;?>"><i class="<?php echo $icon ;?>"></i> <?php echo $tenloai ;?></a></li>
								<?php } ?>	
								</ul>
							</li>
							<li><a href="Product/GroupCategory/476520"><i class="fas fa-gifts"></i> Ngày lễ <i class="fas fa-angle-down"></i></a>
								<ul class="sub-menu">
								<?php 
									$row= json_decode($data["dmsp3"],true);
									foreach ($row as list("id"=>$id,"tenloai"=>$tenloai,"icon"=>$icon)){?>
										<li><a href="<?php echo 'Product/Grouptype/476520/'.$id.'' ;?>"><i class="<?php echo $icon ;?>"></i> <?php echo $tenloai ;?></a></li>
								<?php }?>
								</ul>
							</li>
							<li><a href="Product/GroupCategory/576520"><i class="fas fa-clipboard"></i> Thiệp</a></li>
							<li><a href="Product/GroupCategory/676520"><i class="fas fa-laptop-house"></i> Văn phòng/học tập</a></li>
							<li><a href="Product/GroupCategory/776520"><i class="fas fa-circle"></i> Quả cầu tuyết</a></li>
							<li><a href="Product/GroupCategory/876520"><i class="fas fa-fan"></i> Khác</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<div class="banner">
	</div>