<?php
require("./common/common.php");
?>

<!-- Header -->
<?php
include('./common/intro.php');
include('./common/header.php');
?>

<!-- Content -->
<div id="content">
    <div id="banner_image">
        <div class="container">
            <div id="banner_content">
                <h1>Biggest Online Mobile Store</h1>
                <h4>
                    <p>20%&nbsp;&nbsp;OFF&nbsp;&nbsp;on all products.</p>
                </h4>
                <br />
                <br />
                <a href="products.php" class="btn btn-danger btn-lg active">Shop Now</a>
            </div>
        </div>
    </div>
    <br />
    <br />
    <div class="container text-center">
        <div class="card w-100">
            <div class="card-header">
                <h3 style="color:orange">
                    Choose&nbsp;&nbsp;From&nbsp;&nbsp;wide&nbsp;&nbsp;ranges&nbsp;&nbsp;of&nbsp;&nbsp;brands
                </h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col col-sm-3">
                        <a href="products.php#iphone">
                            <div class="thumbnail">
                                <img class="w-100 h-100"
                                    src="https://cdn.tgdd.vn/Products/Images/42/225380/TimerThumb/iphone-12-mini.jpg"
                                    alt="ip 12 mini">
                                <div class="caption">
                                    <h4>Iphone</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col col-sm-3">
                        <a href="products.php#macbook">
                            <div class="thumbnail">
                                <img class="w-100 h-100" style="padding-bottom: 82px"
                                    src="https://cdn.tgdd.vn/Products/Images/44/220174/apple-macbook-air-2020-i3-220174-1-600x600.jpg"
                                    alt="mac air">

                            </div>
                            <div class="caption">
                                <h4>Macbook</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col col-sm-3">
                        <a href="products.php#watch">
                            <div class="thumbnail">
                                <img class="w-100 h-100"
                                    src="https://cdn.tgdd.vn/Products/Images/7077/229033/apple-watch-s6-lte-40mm-vien-nhom-day-cao-su-ava-600x600.jpg"
                                    alt="watch s6">
                                <div class="caption">
                                    <h4>Watch</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col col-sm-3">
                        <a href="products.php#mac">
                            <div class="thumbnail">
                                <img class="w-100 h-100"
                                    src="https://cdn.tgdd.vn/Products/Images/5698/228850/apple-mac-mini-i3-mxnf2saa-600x600.jpg"
                                    alt="mac mini">
                                <div class="caption">
                                    <h4>Mac</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php
include('./common/footer.php');
?>