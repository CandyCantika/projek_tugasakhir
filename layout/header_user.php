
<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

include 'koneksi.php';

$email = isset($_POST['email']) ? $_POST['email'] : null; 
$password = isset($_POST['password']) ? $_POST['password'] : null; 

if ($email && $password) { 
    $query = $koneksi->prepare("SELECT nama, role FROM multi_users WHERE email = ? AND password = ?");
    $query->bind_param('ss', $email, $password); 
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['role'] = $row['role'];
    } else {
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>TripEase</title>
    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/logotravel.png">
    <link href="public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>


<body>
	<!-- <div id="preloader">
		<div class="loader"></div>
	</div> -->

	<div id="main-wrapper" class="wallet-open active">

	
		<div class="nav-header" style="display: flex; align-items: center;">
			<a href="dashboard_user.php" class="brand-logo" style="display: flex; align-items: center;">
				<img src="public/assets/images/logo_2.png" class="logo-abbr" width="50" height="50" alt="">
				<div class="brand-title" style="margin-left: 10px;">
					<h2 style="color: darkblue; margin: 0;"><b>TripEase</b></h2>
				</div>
			</a>

			</a>
			<div class="nav-control">
				<div class="hamburger">
					<span class="line"></span><span class="line"></span><span class="line"></span>
					<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect x="22" y="11" width="4" height="4" rx="2" fill="#2A353A" />
						<rect x="11" width="4" height="4" rx="2" fill="#2A353A" />
						<rect x="22" width="4" height="4" rx="2" fill="#2A353A" />
						<rect x="11" y="11" width="4" height="4" rx="2" fill="#2A353A" />
						<rect x="11" y="22" width="4" height="4" rx="2" fill="#2A353A" />
						<rect width="4" height="4" rx="2" fill="#2A353A" />
						<rect y="11" width="4" height="4" rx="2" fill="#2A353A" />
						<rect x="22" y="22" width="4" height="4" rx="2" fill="#2A353A" />
						<rect y="22" width="4" height="4" rx="2" fill="#2A353A" />
					</svg>
				</div>
			</div>
		</div>


		<div class="header">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div class="collapse navbar-collapse justify-content-between">
						
						<div class="header-left">
							<div class="input-group ">
								<!-- <input type="text" class="form-control" placeholder="Search here...">
								<span class="input-group-text"><a href="javascript:void(0)">
										<svg width="15" height="15" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M17.5605 15.4395L13.7527 11.6317C14.5395 10.446 15 9.02625 15 7.5C15 3.3645 11.6355 0 7.5 0C3.3645 0 0 3.3645 0 7.5C0 11.6355 3.3645 15 7.5 15C9.02625 15 10.446 14.5395 11.6317 13.7527L15.4395 17.5605C16.0245 18.1462 16.9755 18.1462 17.5605 17.5605C18.1462 16.9747 18.1462 16.0252 17.5605 15.4395V15.4395ZM2.25 7.5C2.25 4.605 4.605 2.25 7.5 2.25C10.395 2.25 12.75 4.605 12.75 7.5C12.75 10.395 10.395 12.75 7.5 12.75C4.605 12.75 2.25 10.395 2.25 7.5V7.5Z" fill="#01A3FF" />
										</svg> -->
									</a></span>
							</div>
						</div>
						<ul class="navbar-nav header-right">

							<li class="nav-item">
								<div class="dropdown header-profile2">
									<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<div class="header-info2 d-flex align-items-center">
											<div class="d-flex align-items-center sidebar-info">
												<div>
													<h4 class="mb-0"><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Guest'; ?></h4>
													<span class="d-block text-end"><?php echo isset($_SESSION['role']) ? $_SESSION['role'] : 'Visitor'; ?></span>
												</div>
											</div>
											<img src="public/assets/images/pfp_2.png" alt="">
										</div>
									</a>
								</div>

						</ul>
					</div>
				</nav>
			</div>

		</div>
	
		<div class="dlabnav">
			<div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">

					<li>
						<a class="" href="kendaraan_user.php">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-bus-front" viewBox="0 0 16 16">
								<path d="M5 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0m8 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-6-1a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2zm1-6c-1.876 0-3.426.109-4.552.226A.5.5 0 0 0 3 4.723v3.554a.5.5 0 0 0 .448.497C4.574 8.891 6.124 9 8 9s3.426-.109 4.552-.226A.5.5 0 0 0 13 8.277V4.723a.5.5 0 0 0-.448-.497A44 44 0 0 0 8 4m0-1c-1.837 0-3.353.107-4.448.22a.5.5 0 1 1-.104-.994A44 44 0 0 1 8 2c1.876 0 3.426.109 4.552.226a.5.5 0 1 1-.104.994A43 43 0 0 0 8 3" />
								<path d="M15 8a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1V2.64c0-1.188-.845-2.232-2.064-2.372A44 44 0 0 0 8 0C5.9 0 4.208.136 3.064.268 1.845.408 1 1.452 1 2.64V4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v3.5c0 .818.393 1.544 1 2v2a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5V14h6v1.5a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-2c.607-.456 1-1.182 1-2zM8 1c2.056 0 3.71.134 4.822.261.676.078 1.178.66 1.178 1.379v8.86a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 11.5V2.64c0-.72.502-1.301 1.178-1.379A43 43 0 0 1 8 1" />
							</svg>
							<span class="nav-text">Sewa Mobil</span>
						</a>
					</li>


					<li>
						<a class="" href="wisata_user.php">
							<i class="bi bi-globe"></i>
							<span class="nav-text">Paket Wisata</span>
						</a>
					</li>

					<li>
						<a class="" href="riwayat_booking.php">
							<i class="bi bi-receipt"></i>
							<span class="nav-text">Riwayat Booking</span>
						</a>
					</li>

					<a href="index.php" onclick="return confirm('Apakah anda yakin ingin log out?');" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
							<polyline points="16 17 21 12 16 7"></polyline>
							<line x1="21" y1="12" x2="9" y2="12"></line>
						</svg>
						<span class="nav-text">Logout</span>
					</a>

					<div class="">
						<div class="media">
						</div>
					</div>
				</ul>
			</div>
		</div>
