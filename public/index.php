<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/2pgames/2pgames/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Sep 2020 16:23:48 GMT -->

<!-- Mirrored from pgames-4dad9.web.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Dec 2020 07:43:37 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- /Added by HTTrack -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="forntEnd-Developer" content="Mamunur Rashid (Nice to keep credit Loseb.R)">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 2pgames - Gaming HTML Template</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.html" type="image/x-icon">
    <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Plugin css -->
    <link rel="stylesheet" href="assets/css/plugin.css">

    <!-- stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css?v=1.6">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="loader loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- Header Area Start  -->
    <header class="header">
        <!-- Top Header Area Start -->
        <section class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content">
                            <div class="left-content">
                                <ul class="left-list">
                                </ul>
                            </div>
                            <div class="right-content">
                                <ul class="right-list">
                                    <li>
                                        <?php if(!isset($_SESSION['username'])) : ?>
                                        <a href="#" class="sign-in" data-toggle="modal" data-target="#login">
                                            <i class="fas fa-user"></i> Sign In
                                        </a>
                                        <?php else :?>
                                        <a href="#" class="sign-in" data-toggle="modal" data-target="#userInfo">
                                            
                                        </a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-user"></i> <?php echo $_SESSION['username'];?>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Profile</a>
                                                <a class="dropdown-item" href="#">Settings</a>
                                                <a class="dropdown-item" href="#">Support</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" id="sign-out-a" href="#">Sign out!</a>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Header Area End -->
        <!--Main-Menu Area Start-->
        <div class="mainmenu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="">
                                <h5>2PGames</h5>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
                            <div class="collapse navbar-collapse fixed-height" id="main_menu">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Home
										<div class="mr-hover-effect"></div>
										</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Games
										</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Leaderboard
										</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Contact
										</a>
                                    </li>
                                </ul>
                                <?php if(!isset($_SESSION['username'])) : ?>
                                    <a href="" class="mybtn1" data-toggle="modal" data-target="#signin"> Join</a>
                                <?php else :?>
                                    <a href="" class="mybtn1"> Profile</a>
                                <?php endif;?>
                            </div>
                        </nav>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--Main-Menu Area Start-->
    </header>
    <!-- Header Area End  -->

    <!-- Featured Game Area Start -->
    <section class="featured-game">
        <!-- Features Area Start -->
        <!-- <div class="features">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="feature-box">
							<div class="feature-box-inner">
								<div class="row">
									<div class="col-lg-4 col-md-6">
										<div class="single-feature">
											<div class="icon one">
												<img src="assets/images/feature/icon1.png" alt="">
											</div>
											<div class="content">
												<h4 class="title">
													Exclusive Offer
												</h4>
												<a href="#" class="link">read more <i class="fas fa-arrow-right"></i></a>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-6">
										<div class="single-feature">
											<div class="icon two">
												<img src="assets/images/feature/icon2.png" alt="">
											</div>
											<div class="content">
												<h4 class="title">
													Provably Fair
												</h4>
												<a href="#" class="link">read more <i class="fas fa-arrow-right"></i></a>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-6">
										<div class="single-feature">
											<div class="icon three">
												<img src="assets/images/feature/icon3.png" alt="">
											</div>
											<div class="content">
												<h4 class="title">
														24/7 Support
												</h4>
												<a href="#" class="link">read more <i class="fas fa-arrow-right"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
        <!-- Features Area End -->
        <div class="container">
            <div class="row justify-content-center" style="padding-top: 14em;">
                <div class="col-lg-8 col-md-10">
                    <div class="section-heading">
                        <h5 class="subtitle">
                            Try to check out our
                        </h5>
                        <h2 class="title">
                            featured games
                        </h2>
                        <p class="text">
                            Check out our latest featured game! To meet today's challenges & earn points. Top 10 players receive prizes every hour!
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="game-slider">
                        <div class="item">
                            <div class="single-game">
                                <div>2PRace</div>
                                <a id="raceWar" href="./Unity/Race" class="mybtn2">PLay NoW !</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-game">
                                <div>2PSpaceWars</div>
                                <a id="spaceWar" href="./Unity/Space" class="mybtn2" target="_blank">PLay NoW !</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-game">
                                <div>2PRock Paper Scissors</div>
                                <a id="paperWar" href="./Unity/Rock" class="mybtn2">PLay NoW !</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-game">
                                <div>2PRace</div>
                                <a href="#" class="mybtn2">PLay NoW !</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Game Area	End -->

    <!-- Latest Activities Area Start -->
    <section class="activities">
        <img class="shape shape1" src="assets/images/people/shape1.png" alt="">
        <img class="shape shape2" src="assets/images/people/shape2.png" alt="">
        <img class="shape shape3" src="assets/images/people/shape3.png" alt="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section-heading">
                        <h5 class="subtitle">
                            The Smarter Way
                        </h5>
                        <h2 class="title">
                            Leaderboard
                        </h2>
                        <p class="text">
                            Check your position
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-menu-area">
                        <ul class="nav nav-lend mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-all-bets-tab" data-toggle="pill" href="#pills-all-bets" role="tab" aria-controls="pills-all-bets" aria-selected="true">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-my-bets-tab" data-toggle="pill" href="#pills-my-bets" role="tab" aria-controls="pills-my-bets" aria-selected="false">Country</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-my-jackpots-tab" data-toggle="pill" href="#pills-my-jackpots" role="tab" aria-controls="pills-my-jackpots" aria-selected="false">Me</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all-bets" role="tabpanel" aria-labelledby="pills-all-bets-tab">
                            <div class="responsive-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">USER</th>
                                            <th scope="col">Point</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-my-bets" role="tabpanel" aria-labelledby="pills-my-bets-tab">
                            <div class="responsive-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">USER</th>
                                            <th scope="col">Point</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-my-jackpots" role="tabpanel" aria-labelledby="pills-my-jackpots-tab">
                            <div class="responsive-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">USER</th>
                                            <th scope="col">Point</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/people/p1.png" alt=""> Tom Bass
                                            </td>

                                            <td>
                                                10000
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Activities Area End -->


    <!-- Get Start Area Start -->
    <!-- <section class="get-start">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 d-flex align-self-center">
					<div class="left-area">
						<div class="section-heading">
							<h5 class="subtitle">
								every day lots of  wins
							</h5>
							<h2 class="title ">
									be one of them
							</h2>
							<p class="text">
									Get started in less than 5 min - no credit card 
									required.Gain early access to 2pgames and  experience crypto like never before. 
							</p>
							<a href="#" class="mybtn1">Play  Now!</a>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="right-image">
						<img src="assets/images/get-start.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>  -->
    <!-- Get Start Area End -->

    <!-- Recent Winners Area Start -->
    <!-- <section class="recent-winners">
			<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8 col-md-10">
							<div class="section-heading">
								<h5 class="subtitle">
									Try to Check out our
								</h5>
								<h2 class="title">
										Recent Winners
								</h2>
								<p class="text">
									We update our site regularly; more and more winners are added every day! To locate the most recent winner's information
								</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="single-winer">
								<div class="top-area">
									<div class="left">
										<h4 class="name">
												Leroy Roy 
										</h4>
										<p class="date">
												01.08.2019
										</p>
									</div>
									<div class="right">
										<p class="id">#5747e75482</p>
									</div>
								</div>
								<div class="bottom-area">
									<div class="left">
											0.099 ETH
									</div>
									<div class="right">
											<img src="assets/images/icon2.png" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-winer">
								<div class="top-area">
									<div class="left">
										<h4 class="name">
												Jeff Mack
										</h4>
										<p class="date">
												01.08.2019
										</p>
									</div>
									<div class="right">
										<p class="id">#5747e75482</p>
									</div>
								</div>
								<div class="bottom-area">
									<div class="left">
											0.099 ETH
									</div>
									<div class="right">
											<img src="assets/images/icon2.png" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-winer">
								<div class="top-area">
									<div class="left">
										<h4 class="name">
												Neal Morris
										</h4>
										<p class="date">
												01.08.2019
										</p>
									</div>
									<div class="right">
										<p class="id">#5747e75482</p>
									</div>
								</div>
								<div class="bottom-area">
									<div class="left">
											0.099 ETH
									</div>
									<div class="right">
											<img src="assets/images/icon2.png" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 text-xl-center">
							<a class="mybtn2" href="#">View All </a>
						</div>
					</div>
			</div>
		</section>  -->
    <!-- Recent Winners Area End -->

    <!-- Footer Area Start -->
    <footer class="footer" id="footer">
        <div class="subscribe-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="subscribe-box">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="heading-area">
                                            <h5 class="sub-title">
                                                subscribe to 2pgames
                                            </h5>
                                            <h4 class="title">
                                                To Get Exclusive Benefits
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-4 d-flex align-self-center">
                                        <div class="icon">
                                            <img src="assets/images/mail-box.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-8 d-flex align-self-center">
                                        <div class="form-area">
                                            <input type="text" placeholder="Your Email Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 d-flex align-self-center">
                                        <div class="button-area">
                                            <button class="mybtn1" type="submit">Subscribe
											<span><i class="fas fa-paper-plane"></i></span>
										</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-widget info-link-widget">
                        <h4 class="title">
                            About
                        </h4>
                        <ul class="link-list">
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i> About Us
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i> Contact Us
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i> Latest Blog
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i> Authenticity Guarantee
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i> Customer Reviews
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i> Privacy Policy

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-widget info-link-widget">
                        <h4 class="title">
                            help center
                        </h4>
                        <ul class="link-list">
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i>Help centre
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i>FAQ
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i>Quick Start Guide
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i>Tutorials
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-widget info-link-widget">
                        <h4 class="title">
                            Legal Info
                        </h4>
                        <ul class="link-list">
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i>Risk Warnings
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i>Privacy Notice
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i>Security
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i>Terms of Service
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-angle-double-right"></i>Complaints Policy

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="left-area">
                            <p>Copyright © 2019.All Rights Reserved By <a href="#">2pgames</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <ul class="copright-area-links">
                            <li>
                                <a href="#">Terms Of Use</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#">Help Cente</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- Back to Top Start -->
    <div class="bottomtotop">
        <i class="fas fa-chevron-right"></i>
    </div>
    <!-- Back to Top End -->

    <!-- Login Area Start -->
    <div class="modal fade login-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="modal-body">
                    <div class="logo-area">
                        <h5>2PGames</h5>>
                    </div>
                    <div class="header-area">
                        <h4 class="title">Great to have you back!</h4>
                        <p class="sub-title">Enter your details below.</p>
                    </div>
                    <div class="form-area">
                        <form id="login-form" name="login-form" action="javascript:void(0);" method="POST">
                            <div class="form-group">
                                <label for="login-input-email">Email</label>
                                <input type="email" class="input-field" id="login-input-email" placeholder="Enter your Email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="login-input-password">Password</label>
                                <input type="password" class="input-field" id="login-input-password" placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <div class="box">
                                    <div class="left">
                                        <input type="checkbox" class="check-box-field" id="input-save-password" name="passwordRem">
                                        <label for="input-save-password">Remember Password</label>
                                    </div>
                                    <div class="right">
                                        <a href="#">
											Forgot Password?
										</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="mybtn1">Log In</button>
                            </div>
                        </form>
                    </div>
                    <div class="form-footer">
                        <p>Not a member?
                            <a href="#" data-toggle="modal" data-target="#signin">Create account <i class="fas fa-angle-double-right"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Area End -->

    <!-- SignIn Area Start -->
    <div class="modal fade login-modal sign-in" id="signin" tabindex="-1" role="dialog" aria-labelledby="signin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="modal-body">
                    <div class="logo-area">
                        <h5>2PGames</h5>>
                    </div>
                    <div class="header-area">
                        <h4 class="title">Great to have you with us!</h4>
                        <p class="sub-title">Enter your details below.</p>
                    </div>
                    <div class="form-area">
                        <form id="signup-form" name="signup-form" action="javascript:void(0);" method="POST">
                            <div class="form-group">
                                <label for="input-name">Name</label>
                                <input type="text" class="input-field" id="input-name" placeholder="Enter your Name" name="username">
                            </div>
                            <div class="form-group">
                                <label for="input-email">Email</label>
                                <input type="email" class="input-field" id="input-email" placeholder="Enter your Email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="input-password">Password</label>
                                <input type="password" class="input-field" id="input-password" placeholder="Enter your password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="input-con-password">confirm password</label>
                                <input type="password" class="input-field" id="input-con-password" placeholder="Enter your Confirm Password" name="confirmpassword">
                            </div>
                            <div class="form-group">
                                <div class="check-group">
                                    <input type="checkbox" class="check-box-field" id="input-terms" name="agreecheck">
                                    <label for="input-terms">
													I agree with <a href="#">terms and Conditions</a> and  <a href="#">privacy policy</a>
											</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="mybtn1">Take Bonus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SignIn Area End -->

    <!-- jquery -->
    <script src=" assets/js/jquery.js "></script>
    <!-- popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- plugin js-->
    <script src="assets/js/plugin.js "></script>
    <script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js "></script>
    <!-- MpusemoverParallax JS-->
    <script src="assets/js/TweenMax.js "></script>
    <script src="assets/js/mousemoveparallax.js "></script>
    <!-- main -->
    <script src="assets/js/main.js "></script>
    <script src="assets/js/signup.js"></script>
</body>


<!-- Mirrored from pixner.net/2pgames/2pgames/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Sep 2020 16:25:37 GMT -->

<!-- Mirrored from pgames-4dad9.web.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Dec 2020 07:43:47 GMT -->

</html>