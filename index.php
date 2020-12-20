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
                <a href="products.html" class="btn btn-danger btn-lg active">Shop Now</a>
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
                        <a href="products.html#apple">
                            <div class="thumbnail">
                                <img class="w-100 h-100" src="./img/ipnone7plus.png" alt="galaxy note 8 plus">
                                <div class="caption">
                                    <h4>Apple</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col col-sm-3">
                        <a href="products.html#samsung">
                            <div class="thumbnail">
                                <img class="w-100 h-100" src="./img/samsungnote8plus.png" alt="galaxy note 8 plus">
                                <div class="caption">
                                    <h4>Samsung</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col col-sm-3">
                        <a href="products.html#oneplus">
                            <div class="thumbnail">
                                <img class="w-100 h-100" src="./img/op5t.png" alt="oneplus">
                                <div class="caption">
                                    <h4>OnePlus</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col col-sm-3">
                        <a href="products.html#xiaomi">
                            <div class="thumbnail">
                                <img class="w-100 h-100" src="./img/mimix2.png" alt="mi mix 2">
                                <div class="caption">
                                    <h4>Xioami</h4>
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