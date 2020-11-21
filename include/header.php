<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title?> - <?=$nameweb?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="theme-color" content="#000">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?=csrf()?>">
    <meta name="logged-in" content="0">
    <link rel="canonical" href="">
    <meta property="og:image" content="">
    <meta property="fb:app_id" content="">
    <link rel="stylesheet" href="/theme/css/interface.css?id=fde29cbca40eea8f6585">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha256-BtbhCIbtfeVWGsqxk1vOHEYXS6qcvQvLMZqjtpWUEx8=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/4.2.8/css/tooltipster.bundle.css" integrity="sha512-3zyscitq6+9V1nGiptsXHLVaJaAMCUQeDW34fygk9LdcM+yjYIG19gViDKuDGCbRGXmI/wiY9XjdIHdU55G97g==" crossorigin="anonymous" />
    <script src="/theme/scripts/plugins.js"></script>
    <link rel="stylesheet" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/4.2.8/js/tooltipster.bundle.min.js"></script>
    <link rel="stylesheet" href="/theme/css/loading.css" />
    <script src="/theme/js/jquery.imageorder.js"></script>
    <style>
        .background-body {
            background: rgba(25, 26, 26, .8) url('/theme/images/background.jpg') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .nav-submenu {
            color:black;
        }
        .div-radius {
            background-color:#566573;
            border-radius: 5px;
        }
        .tab-main-page {
            border-radius:10px;
            background-color:#fff;
            border-color: #e4e5e7 #dadbdd rgba(202,204,206,.8);
            border-style: solid;
            border-width: 1px;
        }
        hr {
            height: 1px;
            background:rgba(0,0,0,.125);
        }
        
        .style-1::-webkit-scrollbar-track
        {
        	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        	border-radius: 10px;
        	background-color: #F5F5F5;
        }
        
        .style-1::-webkit-scrollbar
        {
        	width: 12px;
        	background-color: #F5F5F5;
        }
        
        .style-1::-webkit-scrollbar-thumb
        {
        	border-radius: 10px;
        	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        	background-color: #555;
        }
        
        .active-hover-comic {
            border: 1px solid #566573;
            border-radius: 0 100px 100px 0;
            min-width:45%;
        }
        .active-hover-comic:hover {
            color:#566573;
            background-color:white;
        }
        .active-hover-comic2 {
            border: 1px solid #f7b42c;
            border-radius: 0 100px 100px 0;
            min-width:45%;
            background-color:#f7b42c;
        }
        .active-hover-comic2:hover {
            color:#f7b42c;
            background-color:white;
        }
        .active-hover-comic3 {
            border: 1px solid #7fc400;
            border-radius: 0 100px 100px 0;
            min-width:45%;
            background-color:#7fc400;
        }
        .active-hover-comic3:hover {
            color:#7fc400;
            background-color:white;
        }
        .statis-comic {
            padding-left: 15px;
            color:#424242;
        }
        .statis-comic:hover {
            color:#424242;
        }
        .comment-padding {
            padding-right: 60px;
        }
        @media only screen and (max-width: 768px) {
          .comment-padding {
            padding-right: 15px;
          }
          .padding-none {
            padding-right: 3px;
            padding-left: 0px;
          }
        }
        .manga-info-top {
            position: absolute;
            font-size:17px;
            top: 4px;
            left: 5px;
        }

        .manga-info-top > span{
            margin-right: 5px;
        }

        .news-item {
            padding:4px 4px;
            margin:0px;
            border-bottom:1px solid #566573;
        }
        .inner{
            position:relative;
            top:0px;
        }
        .outer{
            overflow:hidden;
        }
        .genres-menu {
            max-height: 400px;
            overflow-y: scroll;
        }
        .comic-chapter-info {
            margin-left:0px;
        }
        .manga-content div {
            margin-bottom: 15px;
        }
        .manga-action {
            width: 270px;
            margin: 30px auto;
        }
        section.chapter .manga-content {
            text-align: center;
        }
        .manga-action .button {
            float: left;
            width: 60px;
            height: 30px;
            margin-right: 10px;
            font-size: 20px;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            background: #03986f;
        }
        .manga-action .chapter-select {
            position: relative;
            float: left;
            width: 120px;
            height: 30px;
            margin-right: 10px;
            padding: 0 10px;
            border-radius: 5px;
            text-align: left;
        }
        .manga-action .button a {
            color: #fff;
            display: block;
        }
        .comic-chapter-img {
            margin-top:30px;
        }
        .comic-chapter-img img {
           margin-bottom:3px;
           width: 100%;
        }
        
        @media (min-width: 768px){
            .navbar-header {
                float: left;
            }
            .comic-chapter-info {
                margin-left:50px;
            }
            .comic-chapter-img img {
                margin-bottom:3px;
                width: 78%;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            .chapter-container {
                padding-right: 50px;
                padding-left: 50px;
            }
        }
    </style>    
</head>

<body class="style-1 background-body">
    <input type="hidden" id="csrf_key" value="<?php $_SESSION['csrf_key'] = csrf();echo $_SESSION['csrf_key']; ?>">
    <div id="page-top"></div>
    <div data-scrollto="#page-top" class="backtoTop"><i class="fas fa-angle-double-up"></i></div>
    <div id="navbar" style="background-color:#333;color:white;" class="headroom">
        <div class="container">
            <div id="sidenav-icon" class="none-xl none-l">
                <div class="sidenav-icon-content">
                    <span class="sidenav-icon_white" style="background-color:white;"></span>
                    <span class="sidenav-icon_white" style="background-color:white;"></span>
                    <span class="sidenav-icon_white" style="background-color:white;"></span>
                </div>
                <ul class="navbar-menu none hidden-block at-mobile unstyle" style="background-color:#333;">
                    <div class="navbar-search block none-m in-navbar-menu">
                        <form class="" action="/" method="get">
                            <input type="hidden" name="widget" value="search" />
                            <input class="search-input" type="text" placeholder="Tìm Truyện" name="title" value="">
                            <button class="search-submit" type="submit" value="Tìm kiếm"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <li><a class="nav-menu_item" href="/bxh"><span class="">BXH</span></a></li>
                    <li><a class="nav-menu_item" href="/lichsu"><span class="">Lịch Sử</span></a></li>
                    <li class="nav-has-submenu">
                        <a class="nav-menu_item">
                            <span class="">Thể Loại</span>
                            <i class="fas fa-chevron-down dropdown-icon" style="float: right; margin-top: 6px"></i>
                        </a>
                        <ul class="nav-submenu list-unstyled none" style="color:white;overflow: auto;max-height: 320px;">
                            <?php 
                                $query_genres_menu = $conn->query("SELECT * FROM `comics_genres`");
                                if ($query_genres_menu->num_rows > 0){
                                    while ($row_genres_menu = $query_genres_menu->fetch_array()){
                                        echo '<li><center><a href="/the-loai/'.$row_genres_menu['id'].'"><span>'.$row_genres_menu['label'].'</span></a></center></li>';
                                    }
                                   
                                }
                            ?>
                            
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <div class="navbar-header navbar-logo-wrapper" style="padding-top: 1rem;margin-right:0px;">
                <a class="navbar-brand" href="/" title="Trang chủ" style="color: #03a899;"> <small><i class="fas fa-heart" aria-hidden="true" style="color:tomato"></i></small><b><u> <?=$nameweb?></u></b></a>
            </div>
            <?php 
            if (!client()){
            ?>
                <div id="navbar-user" class="guest">
                    <a class="login-link" href="#register" onclick="$('#register_modal').modal('show');"> <i class="fas fa-users"></i> Đăng Ký</a>
                    <a class="login-link" href="#login" onclick="$('#login_modal').modal('show');"> <i class="fas fa-key"></i> Đăng nhập</a>
                </div>
            <?php
            } else {
            ?>    
                <div id="navbar-user">
                    <div class="nav-user_icon">
                        <div class="nav-user_avatar">
                            <img src="<?=client()['profile_image']?>">
                        </div>
                        <div class="at-user_avatar"></div>
                        <ul class="account-sidebar hidden-block unstyled none" style="background-color: #333;">
                            <li>
                                <a href="/history-read"><i class="fas fa-history"></i><span>Lịch sử Đọc</span></a>
                            </li>
                            <hr class="none block-l">
                            <li>
                                <a href="/comic-reg"><i class="fas fa-heart"></i><span>Truyện Theo dõi</span></a>
                            </li>
                            <hr class="none block-l">
                            <li>
                                <a href="/logout"><i class="fas fa-sign-out-alt"></i><span> Đăng Xuất</span></a>
                            </li>
                        </ul>
                    </div>
                    <div id="series-unread-icon" class="user-sublink appearing">
                        <a class="link-item" href="/thong-bao">
                            <div class="icon-wrapper">
                            <i class="fas fa-exclamation-circle"></i>

                                <span class="noti-unread">0</span></div>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="navbar-mainblock">
                <div class="navbar-search none block-m">
                    <form class="" action="/" method="get">
                        <input type="hidden" name="widget" value="search" />
                        <input class="search-input" type="text" placeholder="Tìm Truyện" name="title" value="">
                        <button class="search-submit" type="submit" value="Tìm kiếm"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <ul style="background-color:#333;" class="navbar-menu at-navbar none d-lg-block unstyled" >
                    <li><a class="nav-menu_item" href="/bxh"><i class="fas fa-pen-nib menu-icon"></i><span class="">BXH</span></a></li>
                    <li><a class="nav-menu_item" href="/lichsu"><i class="fas fa-book menu-icon"></i><span class="">Lịch Sử</span></a></li>
                    <li class="nav-item">
                        <a data-toggle="dropdown" href="#" aria-expanded="true" class="nav-link nav-menu_item"><i class="far fa-books"></i><span class="d-none d-lg-inline ml-1">Thể loại <i class="fas fa-chevron-down dropdown-icon"></i></span></a>
                        <div class="dropdown-menu manga-mega-menu genres-menu w-100 col-md-5" style="margin: auto;">
                            <div class="row no-gutters">
                                <?php 
                                $query_genres_menu = $conn->query("SELECT * FROM `comics_genres`");
                                if ($query_genres_menu->num_rows > 0){
                                    while ($row_genres_menu = $query_genres_menu->fetch_array()){
                                        echo '<div class="col-4 col-md-2"><a title="" href="/the-loai/'.$row_genres_menu['id'].'" class="dropdown-item genres-item">'.$row_genres_menu['label'].'</a></div>';
                                    }
                                   
                                }
                                 ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <div class="page-top-group  at-index ">
    </div>
