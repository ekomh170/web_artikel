<?php

include"../../config/url.php";
include "../../config/database.php";

$sql = "SELECT * FROM artikel";
$books = $conn->query($sql);

// Periksa apakah parameter 'id_artikel' telah diberikan di URL
if (isset($_GET['id'])) {
    $id_artikel = $_GET['id'];

    // Eksekusi kueri SQL untuk mendapatkan artikel berdasarkan ID
    $sql = "SELECT * FROM artikel WHERE id_artikel = $id_artikel";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $judul = $row["judul"];
        $sumber = $row["sumber"];
        $penulis = $row["penulis"];
        $tanggal = $row["tanggal"];
        $isi = $row["isi"];
        $gambar = $row["gambar"];
    } else {
        echo "Artikel tidak ditemukan.";
        exit;
    }
} else {
    echo "Parameter 'artikel' tidak ditemukan.";
    exit;
}



// var_dump($books);
// die;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Web Artikel</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="<?= base_url() ?>assets/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout ">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="<?= base_url() ?>assets/images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">

            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.html"><img src="<?= base_url() ?>assets/images/logobook.png"
                                            alt="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 location_icon_bottum">
                        <div class="row">
                            <div class="col-md-8 ">
                                <div class="menu-area">
                                    <div class="limit-box">
                                        <nav class="main-menu">
                                            <ul class="menu-area-main">
                                            <li class="active"><a href="<?= base_url() ?>master/artikel/artikel.php">Home</a> </li>
                                                <li> <a href="#about">About</a> </li>
                                                <li><a href="#product">Photos</a></li>
                                                <li><a href="#testimonial">Blog</a></li>
                                                <li><a href="#contact">Contact Us</a></li>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                <form class="search">
                                    <input class="form-control" type="text" placeholder="Search">
                                    <button><img src="<?= base_url() ?>assets/images/search_icon.png"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
    <!-- end header -->
    <section class="slider_section">
        <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="<?= base_url() ?>assets/images/header.jpg" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption relative">

                            <h1 style="color: black;">Artikel Ngampus</h1>
                            <span>ARTIKEL WEBSITE</span>

                            <p style="color: black;">“Buku-buku terbaik… adalah yang memberi tahu kamu apa yang sudah kamu ketahui.” – George
                                Orwell, 1984</p>
                            <a class="buynow" href="#about">About us</a>

                        </div>
                    </div>
                </div>

            </div>

    </section>

    <!-- about -->
    <div id="about" class="about">
        <div class="container">
            <div class="row">

                <div class="card col-xl-3 col-lg-3 col-md-3 co-sm-3">
                    <h1 class="card-header">Berita Terkini : </h1>

                    <div class="card-body">
                        <div class="">Sebelumnya : </div>
                        <?php if ($books->num_rows > 0) { ?>
                        <?php $iteration = 0;  ?>
                        <?php   foreach ($books as $row) { ?>
                        <div class="flex-none w-[280px]">
                            <article class="pl-9 mb-4">
                                <a aria-label="link description" href="<?= base_url() ?>master/artikel/detail_artikel.php?id=<?= $row['id_artikel']; ?>">
                                    <button class="btn btn-danger text-cnn_grey text-lg absolute left-0">
                                        0<?= $row["id_artikel"] ?> </button>
                                    <h2 class="text-base text-cnn_black_light group-hover:text-cnn_red">
                                        <?= $row["judul"] ?></h2>
                                </a>
                            </article>
                        </div>
                        <?php
                            $iteration++;

                            if ($iteration >= 3) {
                                break; 
                            }

                            ?>
                        <?php } ?>
                        <?php } ?>
                    </div>


                    </ul>
                </div>


                <div class="col-xl-7 col-lg-7 col-md-7 co-sm-7 card m-3">
                    <div class="about_box">
                        <h2 style="text-align: center;" class="m-3">By : <?= $sumber ?><br></h2>
                        <div class="about_img" style="  margin-bottom: 30px;">
                            <figure><img src="<?= base_url() ?>assets/img_ext/<?= $gambar ?>" alt="img" style="width: auto;
        height: auto;" /></figure>
                        </div>
                        <button class="btn btn-success ">Tanggal Terbit : <?= $tanggal ?><br></button>
                        <button class="btn btn-success float-right mb-3">Penulis : <?= $penulis ?><br></button>
                        <div class="mt-3">
                            <h2><?= $judul ?><br></h2>
                            <p><?= $isi ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->

    <!-- end clients -->

    <!--  footer -->
    <!-- <footr>
        <div class="footer top_layer ">
            <div class="container">

                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="address">
                            <a href="index.html"> <img src="<?= base_url() ?>assets/images/logo.png" alt="logo" /></a>
                            <p>dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                                et sdolor sit amet, consectetur adipiscing elit, </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="address">
                            <h3>Quick links</h3>
                            <ul class="Links_footer">
                                <li><img src="icon/3.png" alt="#" /> <a href="#"> Join Us</a> </li>
                                <li><img src="icon/3.png" alt="#" /> <a href="#">Maintenance</a> </li>
                                <li><img src="icon/3.png" alt="#" /> <a href="#">Language Packs</a> </li>
                                <li><img src="icon/3.png" alt="#" /> <a href="#">LearnPress</a> </li>
                                <li><img src="icon/3.png" alt="#" /> <a href="#">Release Status</a> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="address">
                            <h3>Subcribe email</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
                            <input class="form-control" placeholder="Your Email" type="type" name="Your Email">
                            <button class="submit-btn">Submit</button>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="address">
                            <h3>Contact Us</h3>

                            <ul class="loca">
                                <li>
                                    <a href="#"><img src="icon/loc.png" alt="#" /></a>London 145
                                    <br>United Kingdom </li>
                                <li>
                                    <a href="#"><img src="icon/email.png" alt="#" /></a>demo@gmail.com </li>
                                <li>
                                    <a href="#"><img src="icon/call.png" alt="#" /></a>+12586954775 </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="copyright">
            <div class="container">
                <p>© 2023 All Rights Reserved. Design By<a href="https://html.design/"> ?</a></p>

            </div>
        </div>
    </footr>

    <!-- end footer -->
    <!-- Javascript files-->
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery-3.0.0.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="<?= base_url() ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>
    <!-- javascript -->
    <script src="<?= base_url() ?>assets/js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function () {

                $(this).addClass('transition');
            }, function () {

                $(this).removeClass('transition');
            });
        });
    </script>

</body>

</html>