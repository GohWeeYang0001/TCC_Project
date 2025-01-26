<?php
session_start();
include 'Backend/dbconnect.php';

$admin_id = 'GohWeeYang0001';

$query_admin = $con->query('SELECT * FROM admin WHERE admin.admin_id = "'.$admin_id.'"');
if($query_admin->num_rows > 0){
	$admin_data = $query_admin->fetch_assoc();
}  
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Clothes Shop Admin Site</title>
		<link rel="stylesheet" type="text/css" href="Css/identify.css" />
		<link rel="stylesheet" type="text/css" href="Css/layout.css" />
		<link rel="stylesheet" type="text/css" href="Css/account.css" />
		<link rel="stylesheet" type="text/css" href="Css/style.css" />
		<link rel="stylesheet" type="text/css" href="Css/control_index.css" />
		<link rel="stylesheet" type="text/css" href="Css/new_style.css">
		<script type="text/javascript" src="Js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="Js/layer/layer.js"></script>
		<script type="text/javascript" src="Js/haidao.offcial.general.js"></script>
		<script type="text/javascript" src="Js/select.js"></script>
		<script type="text/javascript" src="Js/haidao.validate.js"></script>
	</head>

	<body>
		<div class="view-topbar">
			<div class="topbar-console">
				<div class="tobar-head fl">
					<a href="#" class="topbar-logo fl">
					<span><img src="Images/Clothes_Images/clothes_logo.jpg" width="20" height="20"/></span>
					</a>
					<a href="index.php" class="topbar-home-link topbar-btn text-center fl"><span>Admin Site</span></a>
				</div>
			</div>
			<div class="topbar-info">
				<ul class="fr">
					<li class="fl topbar-info-item">
					<div class="dropdown">
						<a href="#" class="topbar-btn">
							<span class="fl text-normal"><?php echo $admin_data["admin_name"]?></span>
							<span class="icon-arrow-down"></span>
						</a>
						<ul class="dropdown-menu">
							<li ><a href="login.html" style="pointer-events: none; cursor: not-allowed;">Logout</a></li>
						</ul>
					</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="view-body">
			<div class="view-sidebar">
				<div class="sidebar-content">
					<div class="sidebar-nav">
						<div class="sidebar-title">
							<a href="#">
								<span class="icon"><b class="fl icon-arrow-down"></b></span>
								<span class="text-normal">Product & Service</span>
							</a>
						</div>
						<ul class="sidebar-trans">
							<li>
								<a href="index.php">
									<b class="sidebar-icon"><img src="Images/icon_author.png" width="16" height="16" /></b>
									<span class="text-normal">Clothes</span>
								</a>
							</li>
						</ul>
					</div>
					<!-- <div class="sidebar-nav">
						<div class="sidebar-title">
							<a href="#">
								<span class="icon"><b class="fl icon-arrow-down"></b></span>
								<span class="text-normal">Admin Manager</span>
							</a>
						</div>
						<ul class="sidebar-trans">
							<li>
								<a href="admin_account.html">
									<b class="sidebar-icon"><img src="Images/icon_cost.png" width="16" height="16" /></b>
									<span class="text-normal">Account</span>
								</a>
							</li>
						</ul>
					</div> -->
				</div>
			</div>
			<div class="view-product">
				<div class="company_identify">
					<div class="manage-head">
						<h6 class="padding-left manage-head-con">Add Clothes</h6>
					</div>
					<form id="clothes-create-form" action="Backend/clothes_create_process.php" method="post" autocomplete="off">
						<div class="basic-info-detail clearfix">
							<div class="unit-style padding-big-lr clearfix pd-b-20">
								<h4 class="real-name-head margin-large-top">Clothes Detail<span class="margin-left text-normal text-normal">fill in the clothes information</span></h4>
								<div class="real-name-con height-main margin-top-25 clearfix" style="display: none">
									<p class="content-left-zoon">
										Clothes ID
									</p>
									<div class="content-right-zoon">
										<input class="width-main input" type="text" datatype="*" name="clothes_id" value="0">
									</div>
								</div>
								<div class="real-name-con height-main margin-top-25 clearfix">
									<p class="content-left-zoon">
										Clothes Name
									</p>
									<div class="content-right-zoon">
										<input class="width-main input" type="text" datatype="*" name="clothes_name" value="" required>
									</div>
								</div>
								<div class="real-name-con height-main margin-top-25 clearfix">
									<p class="content-left-zoon">
										Clothes Type
									</p>
									<div class="content-right-zoon">
										<select class="width-main my-select" name="clothes_type" style="height: 34px;">
											
										<?php
											$query_ct = $con->query('SELECT * FROM clothes_type');
											if($query_ct->num_rows > 0){
												while($row_ct = $query_ct->fetch_assoc()){
										?>
											<option 
												value="<?php echo $row_ct["clothes_type_id"];?>" 
												<?php echo ("1" == $row_ct["clothes_type_id"]) ? 'selected' : ''; ?>
											>
    											<?php echo $row_ct["clothes_type_name"];?> 
											</option>
										<?php
												}
											}
										?>
										</select>
									</div>
								</div>
								<div class="real-name-con height-main margin-top-25 clearfix">
									<p class="content-left-zoon">
										Clothes Brand
									</p>
									<div class="content-right-zoon">
										<select class="width-main my-select" name="clothes_brand" style="height: 34px;">
										<?php
											$query_cb = $con->query('SELECT * FROM clothes_brand');
											if($query_cb->num_rows > 0){
												while($row_cb = $query_cb->fetch_assoc()){
										?>
											<option 
												value="<?php echo $row_cb["clothes_brand_id"];?>" 
												<?php echo ("BD1" == $row_cb["clothes_brand_id"]) ? 'selected' : ''; ?>
											>
    											<?php echo $row_cb["clothes_brand_name"];?> 
											</option>
										<?php
												}
											}
										?>
										</select>
									</div>
								</div>
								<div class="real-name-con height-main margin-top-25 clearfix">
									<p class="content-left-zoon">
										Clothes Size
									</p>
									<div class="content-right-zoon">
										<div class="radio-group d-flex f-direction-row">
											<?php
												$query_cs = $con->query('SELECT * FROM clothes_size');
												if($query_cs->num_rows > 0){
													while($row_cs = $query_cs->fetch_assoc()){
											?>
												<label>
													<input type="radio" name="clothes_size" value="<?php echo $row_cs["clothes_size_id"];?>"
														<?php echo ("0" == $row_cs["clothes_size_id"]) ? 'checked' : ''; ?>
													> 
													<?php echo $row_cs["clothes_size_name"];?> 
												</label>
											<?php
													}
												}
											?>
										</div>
									</div>
								</div>
								<div class="real-name-con height-main margin-top-25">
									<p class="content-left-zoon">
										Clothes Price (RM)
									</p>
									<div class="content-right-zoon">
										<div class="laydate-box fl">
											<input class="input hd-input" type="text" name="clothes_price" value="" placeholder="0.00" required/>
										</div>
									</div>
								</div>
								<div class="real-name-con height-main margin-top-25">
									<p class="content-left-zoon">
										Clothes Stock
									</p>
									<div class="content-right-zoon">
										<div class="laydate-box fl">
											<input class="input hd-input" type="number" name="clothes_stock" value="0" min="0" max="9999" required/>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="unit-style padding-large-tb clearfix" style="margin: 0 20px;">
							<div class="margin-large-top text-left content-left-zoon">
								<input type="submit" value="Add" name="submit" class="submit fl">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script>
			$(".sidebar-title").live('click', function() {
				if ($(this).parent(".sidebar-nav").hasClass("sidebar-nav-fold")) {
					$(this).next().slideDown(200);
					$(this).parent(".sidebar-nav").removeClass("sidebar-nav-fold");
				} else {
					$(this).next().slideUp(200);
					$(this).parent(".sidebar-nav").addClass("sidebar-nav-fold");
				}
			});
		</script>
	</body>

</html>