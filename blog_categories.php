<?php 
include "admin/includes/database.php";
include "admin/includes/categories.php";
include "admin/includes/blogs.php";

$database = new database();
$db = $database->connect();
$new_blog = new blog($db);

$new_blog->n_category_id = $_GET['id'];
$blogblog = $new_blog->read_single_category();
$new_category = new category($db);
$result = $new_category->read();

if (isset($_GET['id'])) {
    $cate = new category($db);
    $cate->n_category_id = $_GET['id'];
    $cate->read_single();
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
                <div class="swiper-container hero-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="hero-content flex justify-content-center align-items-center flex-column">
                                <img src="images/slider.jpg" alt="">
                            </div><!-- .hero-content -->
                        </div><!-- .swiper-slide -->

                        <div class="swiper-slide">
                            <div class="hero-content flex justify-content-center align-items-center flex-column">
                                <img src="images/slider.jpg" alt="">
                            </div><!-- .hero-content -->
                        </div><!-- .swiper-slide -->

                        <div class="swiper-slide">
                            <div class="hero-content flex justify-content-center align-items-center flex-column">
                                <img src="images/slider.jpg" alt="">
                            </div><!-- .hero-content -->
                        </div><!-- .swiper-slide -->
                    </div><!-- .swiper-wrapper -->

                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- Add Arrows -->
                    <div class="swiper-button-next flex justify-content-center align-items-center">
                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44"><path d="M27,22L27,22L5,44l-2.1-2.1L22.8,22L2.9,2.1L5,0L27,22L27,22z"></path></svg></span>
                    </div>
                    <div class="swiper-button-prev flex justify-content-center align-items-center">
                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44"><path d="M0,22L22,0l2.1,2.1L4.2,22l19.9,19.9L22,44L0,22L0,22L0,22z"></path></svg></span>
                    </div>
                </div><!-- .swiper-container -->
            </div><!-- .col -->
        </div><!-- .row -->

        <div class="container">
            <div class="row">
                <div class="offset-lg-9 col-12 col-lg-3">
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

    <div class="container single-page">
        <div class="row">
            <div class="col-12 col-lg-9">

                <?php
                        while ($rows = $blogblog->fetch()) {
                        ?>
                <div class="content-wrap">
                    <header class="entry-header">
                        <?php
                                                $cate->n_category_id = $rows['n_category_id'];
                                                $cate->read_single();
                                                ?>
                        <div class="posted-date">
                            <?php echo $cate->v_category_title; ?>
                        </div><!-- .posted-date -->

                        <h2 class="entry-title"><?php echo $rows['v_post_title']; ?></h2>

                        <div class="tags-links">
                            <a href="#"><?php echo $rows['v_post_title']; ?></a>
                        </div><!-- .tags-links -->
                    </header><!-- .entry-header -->

                    <figure class="featured-image">
                        <img src="images/upload/<?php echo $rows['v_main_image_url']?>" alt="">
                    </figure><!-- .featured-image -->

                    <div class="entry-content">
                        <p><?php echo $rows['v_post_meta_title']; ?> </p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                        <ul class="post-share flex align-items-center order-3 order-lg-1">
                            <label>Share</label>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul><!-- .post-share -->

                        <a class="read-more order-2" href="blog.php?id=<?php echo $rows['n_blog_post_id'] ?>">Read more</a>

                        <div class="comments-count order-1 order-lg-3">
                            <a href="#">2 Comments</a>
                        </div><!-- .comments-count -->
                    </footer><!-- .entry-footer -->
                </div><!-- .content-wrap -->
            <?php } ?>

                <div class="pagination">
                    <ul class="flex align-items-center">
                        <li class="active"><a href="#">01.</a></li>
                        <li><a href="#">02.</a></li>
                        <li><a href="#">03.</a></li>
                    </ul>
                </div>
            </div><!-- .col -->

            <div class="col-12 col-lg-3">
                <div class="sidebar">
                    <div class="about-me">
                        <h2>I’m Danh Stone</h2>

                        <p>My life is stone, stone is my life,      <br> That's it!. #H5N1</p>
                    </div><!-- .about-me -->

                    <div class="recent-posts">
                        <h3>Category</h3>
                        <?php
      while ($rows = $result->fetch()) {
      ?>
                        
                        <p><a href="blog_categories.php?id=<?php echo $rows['n_category_id'] ?>"><?php echo $rows['v_category_title'] ?></a></p>
                    <?php } ?>
                        
                    </div><!-- .recent-posts -->

                </div><!-- .sidebar -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .outer-container -->
<?php include "footer.php" ?><
<!-- .sit-footer -->

<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/custom.js'></script>

</body>
</html>