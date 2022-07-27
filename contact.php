<?php
include "admin/includes/database.php";
include "admin/includes/contact.php";
$database = new database();
$db = $database->connect();

$new_contact = new contact($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['submit_contact'])) {
    $new_contact->v_fullname = $_POST['c_name'];
    $new_contact->v_email = $_POST['c_email'];
    $new_contact->v_phone = 0;
    $new_contact->v_message = $_POST['c_message'];
    $new_contact->d_date_created = date('y-m-d', time());
    $new_contact->d_time_created = date('h:i:s', time());
    $new_contact->f_contact_status = 1;
    $new_contact->create();
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hello World</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="outer-container">
    <?php include "header.php" ?><!-- .site-header -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-header flex justify-content-center align-items-center" style="background-image: url('images/contact-bg.jpg')">
                    <h1>Contact</h1>
                </div><!-- .page-header -->
            </div><!-- .col -->
        </div><!-- .row -->

        <div class="container">
            <div class="row">
                <div class="offset-lg-9 col-lg-3">
                    <a href="#">
                        <div class="yt-subscribe">
                            <img src="images/yt-subscribe.png" alt="Youtube Subscribe">
                            <h3>Subscribe</h3>
                            <p>To my Youtube Channel</p>
                        </div><!-- .yt-subscribe -->
                    </a>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .hero-section -->

    <div class="container single-page contact-page">
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="content-wrap">
                    <header class="entry-header">
                        <h2 class="entry-title">Do you like stone?? Join with me.</h2>

                        <div class="tags-links">
                            <a href="#">#winter</a>
                            <a href="#">#love</a>
                            <a href="#">#snow</a>
                            <a href="#">#january</a>
                        </div><!-- .tags-links -->
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p>Do you like stone?? Join with me. </p>
                    </div><!-- .entry-content -->

                    <div class="contact-page-social">
                        <ul class="flex align-items-center">
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div><!-- .header-bar-social -->

                    <form name="c_form" id="cForm" class="contact-form" method="post" action="">
                        <input type="text" name="c_name" id="cName" placeholder="Name">
                        <input type="email" name="c_email" id="cEmail" placeholder="Email">
                        <textarea name="c_message" id="cMessage"  rows="18" cols="6" placeholder="Messages"></textarea>
                        <input type="submit" name="submit_contact" value="Read More">
                    </form><!-- .contact-form -->
                </div><!-- .content-wrap -->
            </div><!-- .col -->

            <div class="col-12 col-lg-3">
                <div class="sidebar">
                    <div class="recent-posts">
                        <div class="recent-post-wrap">
                            <figure>
                                <img src="images/thumb-1.jpg" alt="">
                            </figure>

                            <header class="entry-header">
                                <div class="posted-date">
                                    January 30, 2018
                                </div><!-- .entry-header -->

                                <h3><a href="#">My fall in love story</a></h3>

                                <div class="tags-links">
                                    <a href="#">#winter</a>
                                    <a href="#">#love</a>
                                    <a href="#">#snow</a>
                                    <a href="#">#january</a>
                                </div><!-- .tags-links -->
                            </header><!-- .entry-header -->
                        </div><!-- .recent-post-wrap -->

                        <div class="recent-post-wrap">
                            <figure>
                                <img src="images/thumb-2.jpg" alt="">
                            </figure>

                            <header class="entry-header">
                                <div class="posted-date">
                                    January 30, 2018
                                </div><!-- .entry-header -->

                                <h3><a href="#">My fall in love story</a></h3>

                                <div class="tags-links">
                                    <a href="#">#winter</a>
                                    <a href="#">#love</a>
                                    <a href="#">#snow</a>
                                    <a href="#">#january</a>
                                </div><!-- .tags-links -->
                            </header><!-- .entry-header -->
                        </div><!-- .recent-post-wrap -->
                    </div><!-- .recent-posts -->

                    <div class="tags-list">
                        <a href="#">Music</a>
                        <a href="#">Love</a>
                        <a href="#">Car</a>
                        <a href="#">Stories</a>
                        <a href="#">Photography</a>
                        <a href="#">Music</a>
                        <a href="#">Car</a>
                    </div><!-- .tags-list -->
                </div><!-- .sidebar -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .outer-container -->

<?php include "footer.php" ?><!-- .sit-footer -->

<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/custom.js'></script>

</body>
</html>