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

		<link rel="stylesheet" type="text/css" href="./Css/new_style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

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
					<a href="index.php" class="topbar-home-link topbar-btn text-center fl"><span>Clothes Shop Admin Site</span></a>
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
								<a href="#">
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
								<a href="admin_account.php">
									<b class="sidebar-icon"><img src="Images/icon_cost.png" width="16" height="16" /></b>
									<span class="text-normal">Account</span>
								</a>
							</li>
						</ul>
					</div> -->
				</div>
			</div>
			<div class="view-product">
				<div class="authority">
					<div class="authority-head">
						<div class="manage-head">
							<h6 class="layout padding-left manage-head-con">Clothes List
							<span class="fr text-small text-normal padding-top">Last Update Time: <?php echo $admin_data["admin_latest_update"]?></span>
							<!-- <span class="fr margin-large-right padding-top text-small text-normal">Latest Version：<em class="text-main">2.4.0.160708</em></span> -->
							</h6>
						</div>
					</div>
					<div class="authority-content">
						<div class="action-panel w-full d-flex f-direction-row f-justify-right" style="padding: 20px;">
							<a href="clothes_create.php"><input type="button" value="Add New Clothe" class="submit fl"></a>
						</div>
						<div class="list-content show">
							<div class="offcial-table tr-border clearfix">
								<div class="tr-th clearfix">
									<div class="th w10">Clothes ID</div>
									<div class="th w20">CLothes Name</div>
									<div class="th w10">Clothes Type</div>
									<div class="th w15">Clothes Brand</div>
									<div class="th w10">Clothes Size</div>
									<div class="th w10">CLothes Price</div>
									<div class="th w10">Clothes Stock</div>
									<div class="th w15">Action</div>
								</div>
								
								<?php    
									$num_rows = 0; // Initialize the $num_rows variable 
									$records_per_page = 15; // Number of records per page
									$page_number = 1; // Assuming you want to fetch records for the second page

									$offset = ($page_number - 1) * $records_per_page; // Calculate the offset
									$query = $con->query(
										"SELECT c.clothes_id,c.clothes_name, ct.clothes_type_name, cb.clothes_brand_name, cs.clothes_size_name, c.clothes_price,c.clothes_stock 
										FROM clothes c
										INNER JOIN clothes_type ct ON c.clothes_type = ct.clothes_type_id
										INNER JOIN clothes_brand cb ON c.clothes_brand = cb.clothes_brand_id 
										INNER JOIN clothes_size cs ON c.clothes_size = cs.clothes_size_id
										ORDER BY c.clothes_id
										LIMIT $records_per_page OFFSET $offset;"
									);
									if($query->num_rows > 0){
									while($row = $query->fetch_assoc()){
									$num = 1+$num_rows++;
								?> 
									<div class="tr clearfix border-bottom-none">
										<div class="td w10">
											<?php echo $row['clothes_id'];?>
										</div>
										<div class="td w20">
											<?php echo $row['clothes_name'];?>
										</div>
										<div class="td w10">
											<?php echo $row['clothes_type_name'];?>
										</div>
										<div class="td w15">
											<?php echo $row['clothes_brand_name'];?>
										</div>
										<div class="td w10">
											<?php echo $row['clothes_size_name'];?>
										</div>
										<div class="td w10">
											<?php echo $row['clothes_price'];?>
										</div>
										<div class="td w10">
											<?php echo $row['clothes_stock'];?>
										</div>
										<div class="td w15 d-flex f-direction-row f-justify-center gap-8">
											<a href="./clothes_edit.php?id=<?php echo $row['clothes_id']?>" callback="del_site(624)" data-id="" class="button-word2 btn_ajax_confirm"> <i class="fas fa-edit"></i> Edit</a>
											<a onclick="confirmationDelete(event)" 
												href="Backend/clothes_delete_process.php?id=<?php echo $row['clothes_id'];?>" 
												style="color: red;" name="delete">
												<i class="fas fa-trash-alt"></i> Delete
											</a>
										</div>
									</div>
								<?php 
										}
									} 
								?>   
							</div>
						</div> 
						<div class="show-page padding-big-right">
							<div class="page">
								<div class="page">
									<ul class="offcial-page margin-top margin-big-right">
										<li>Total <em class="margin-small-left margin-small-right"><?php echo $num; ?></em> entries</li>
										<li>Each Page <em class="margin-small-left margin-small-right">15</em> entries</li>
										<li><a href="?page=<?php echo max(1, $currentPage - 1); ?>" class="next <?php echo ($currentPage <= 1) ? 'disable' : ''; ?>">Prev</a></li>
										<li></li>
										<li><a href="?page=<?php echo min(ceil($num / 15), $currentPage + 1); ?>" class="next <?php echo ($currentPage >= ceil($num / 15)) ? 'disable' : ''; ?>">Next</a></li>
										<li><span class="fl">Total <em class="margin-small-left margin-small-right"><?php echo ceil(($num / 15)); ?></em> Pages</span></li>
									</ul>
								</div>
							</div>
						</div>

					</div>
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

			function confirmationDelete(event) {
				var confirmed = confirm("Confirm to delete this clothes?");
				if (!confirmed) {
					event.preventDefault();
				}
			}
		</script>
	</body>

</html>