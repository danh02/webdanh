<?php 
include "admin/includes/database.php";
include "admin/includes/blogs.php";
include "admin/includes/tags.php";
include "admin/includes/comments.php";
include "admin/includes/categories.php";
include "admin/includes/users.php";

$database = new database();
$db = $database->connect();


$user = new user($db);
$new_comment = new comment($db);
$new_tag = new tag($db);

$new_blog = new blog($db);

$new_blog->n_blog_post_id = $_GET['id'];
$new_blog->read_single();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_comment'])) {
        $new_comment->n_blog_comment_parent_id = 0;
        $new_comment->n_blog_post_id = $_GET['id'];
        $new_comment->v_comment_author = $_POST['c_name'];
        $new_comment->v_comment_author_email = $_POST['c_email'];
        $new_comment->v_comment = $_POST['c_message'];
        $new_comment->d_date_created = date('y-m-d', time());
        $new_comment->d_time_created = date('h:i:s', time());
        $new_comment->create();
        
    }

    if (isset($_POST['submit_comment_reply'])) {
        $new_comment->n_blog_comment_parent_id = $_POST['blog_comment_id'];
        $new_comment->n_blog_post_id = $_GET['id'];
        $new_comment->v_comment_author = $_POST['c_name_reply'];
        $new_comment->v_comment_author_email = $_POST['c_email_reply'];
        $new_comment->v_comment = $_POST['c_message_reply'];
        $new_comment->d_date_created = date('y-m-d', time());
        $new_comment->d_time_created = date('h:i:s', time());
        $new_comment->create();
        
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
                <div class="page-header flex justify-content-center align-items-center" style="background-image: url('images/blog-bg.jpg')">
                    <h1>The Story</h1>
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

    <div class="container single-page blog-page">
        <div class="row">
            <div class="col-12">
                <div class="content-wrap">
                    <header class="entry-header">
                        <div class="posted-date">
                            January 30, 2018
                        </div><!-- .posted-date -->

                        <h2 class="entry-title"><?php echo $new_blog->v_post_title ?></h2>
                        <?php 
                        $new_tag->n_blog_post_id = $_GET['id'];
                           $new_tag->read_single(); ?>
                        <div class="tags-links">
                            <a href="#"><?php echo $new_tag->v_tag ?></a>
                        </div><!-- .tags-links -->
                    </header><!-- .entry-header -->

                    <figure class="featured-image">
                        <img src="images/upload/<?php echo $new_blog->v_main_image_url ?>" alt="">
                    </figure><!-- .featured-image -->

                    <div class="entry-content">
                        <p>  <?php echo $new_blog->v_post_content ?></p>
                    </div><!-- .entry-content -->

                    <blockquote class="blockquote-text">
                        <p> <?php echo $new_blog->v_post_summary ?></p>
                    </blockquote><!-- .blockquote-text -->

                   
                    <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                        <ul class="post-share flex align-items-center order-3 order-lg-1">
                            <label>Share</label>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul><!-- .post-share -->
                        
                        <div class="comments-count order-1 order-lg-3">
                       
                        </div><!-- .comments-count -->
                    </footer><!-- .entry-footer -->
                </div><!-- .content-wrap -->
                <div class="comments-form">
                        <div class="comment-respond">
                            <h3 class="comment-reply-title">Leave a reply</h3>

                            <form class="comment-form" name="cmt_form" onsubmit="return check_respond()" id="contactForm" method="post" action="" >
                                <input type="text" name="c_name" id="cName" placeholder="Name">
                                <input type="email" name="c_email" id="cEmail" placeholder="Email">
                                <textarea rows="18" cols="6" name="c_message" id="cMessage" placeholder="Messages"></textarea>
                                <input type="submit" name="submit_comment" id="submit" value="Post Comment" >
                            </form><!-- .comment-form -->


                        </div><!-- .comment-respond -->
                    </div>
                <div class="content-area">
                    <div class="post-comments">
                        
                        <h3 class="comments-title">Comments</h3>
                        <?php
                            $new_comment->n_blog_post_id = $_GET['id'];
                            $rss_comment = $new_comment->read_single_blog_post();
                            //$num_comment = $rs_comment->rowCount();
                            ?>
                        <ol class="comment-list">
                            <?php
                                    //while ($rows = $rss_comment->fetch()) {
                                        //if ($rows['n_blog_comment_parent_id'] == 0) {
                                    ?>
                            <li class="comment">
                                <div class="comment-body flex justify-content-between">
                                    <figure class="comment-author-avatar">
                                        <img src="images/user-1.jpg" alt="user">
                                    </figure><!-- .comment-author-avatar -->

                                    <div class="comment-wrap">
                                        <div class="comment-author flex flex-wrap align-items-center">
                                            <span class="fn">
                                                <a href="#"><?php //echo $rows['v_comment_author'] ?></a>
                                            </span><!-- .fn -->

                                            <span class="comment-meta">
                                                <a href="#"><?php // echo $rows['d_date_created'] ?></a>
                                            </span><!-- .comment-meta -->

                                            <div class="reply">
                                                <a href="#">Reply</a>
                                            </div><!-- .reply -->
                                        </div><!-- .comment-author -->

                                        <p><?php //echo $rows['v_comment'] ?> </p>

                                    </div><!-- .comment-wrap -->
                                </div><!-- .comment-body -->
                            </li><!-- .comment -->
                        <?php //}} ?>
                        </ol><!-- .comment-list -->
                    </div><!-- .post-comments -->

                    <!-- .comments-form -->
                </div><!-- .content-area -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .outer-container -->

<?php include "footer.php" ?><!-- .sit-footer -->

<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/custom.js'></script>
<script>
    function check_respond() {
            if (document.cmt_form.c_name.value == "") {
                alert("Author name is not empty!");
                document.cmt_form.c_name.focus();
                return false;
            }
            if (document.cmt_form.c_email.value == "") {
                alert("Author email is not empty!");
                document.cmt_form.c_email.focus();
                return false;
            }
            if (document.cmt_form.c_message.value == "") {
                alert("Author message is not empty!");
                document.cmt_form.c_message.focus();
                return false;
            }
            return true;

        }
</script>

</body>
</html>