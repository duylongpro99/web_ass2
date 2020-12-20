 <!-- Header -->
 <?php
    include('./common/common.php');
    include('./common/intro.php');
    include('./common/header.php');
    ?>
 <!-- body -->
 <br>
 <br>

 <div class="container">
     <!-- Jumbotron Header -->
     <div class="jumbotron home-spacer text-center" id="products-jumbotron">

         <h1>Welcome to Apple Store</h1>
     </div>
     <hr>
     <br>

     <div class="row">
         <div class="col-sm-3" style="margin-bottom:50px">
             <div class="card">
                 <div class="card-header color">
                     <h3 style="color:orange">Products</h3>
                 </div>
                 <ul class="list-group list-group-flush">
                     <li class="list-group-item"><a href="#Mac"><span style="color:black">Mac</span></a></li>
                     <li class="list-group-item"><a href="#iPad"><span style="color:black">iPad</span></a></li>
                     <li class="list-group-item"><a href="#iPhone"><span style="color:black">iPhone</span></a></li>
                     <li class="list-group-item"><a href="#Watch"><span style="color:black">Watch</span></a></li>
                 </ul>
             </div>
         </div>


         <div class="col-sm-9 text-center">

             <div class="card-group" style="margin-bottom:50px">
                 <div class="card w-100">
                     <div class="card-header color">
                         <h3 id="Mac" style="color:orange">Mac</h3>
                     </div>

                     <div class="card-body">
                         <div class="row row-cols-1 row-cols-md-3">
                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="./img/macbook-air-segment_GEO_US.png" alt="macbook-air">
                                     <div class="card-body">
                                         <h3>MacBook Air</h3>
                                         <p>Price: $999 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="./img/macbook-pro-segment-2019_GEO_US.png" alt="macbook pro">
                                     <div class="card-body">
                                         <h3>MacBook Pro</h3>
                                         <p>Price: $1699 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class=" card-img-top" style="padding:10px" src="./img/imac-segment_GEO_US.png"
                                         alt="iMac">
                                     <div class="card-body">
                                         <h3>iMac</h3>
                                         <p>Price: $1049 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="./img/imac-pro-segment_GEO_US.png" alt="iMac Pro">
                                     <div class="card-body">
                                         <h3>iMac Pro</h3>
                                         <p>Price: $4599 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>
                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px" src="./img/mac-pro-segment-2019.png"
                                         alt="Mac Pro">
                                     <div class="card-body">
                                         <h3>Mac Pro</h3>
                                         <p>Price: $5599 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>
                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="./img/mac-mini-segment-202011.png" alt="Mac mini">
                                     <div class="card-body">
                                         <h3>Mac mini</h3>
                                         <p>Price: $699 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>
                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="./img/pro-display-segment-2019.png" alt="Pro display XDR">
                                     <div class="card-body">
                                         <h3>Pro Display XDR</h3>
                                         <p>Price: $4599 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="card-group" style="margin-bottom:50px">
                 <div class="card w-100">
                     <div class="card-header color">
                         <h3 id="iPad" style="color:orange">iPad</h3>
                     </div>

                     <div class="card-body">
                         <div class="row row-cols-1 row-cols-md-3">
                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="./img/ipad-segment-ipad-pro-202009.png" alt="iPad pro">
                                     <div class="card-body">
                                         <h3>iPad Pro</h3>
                                         <p>Price: $749 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="./img/ipad-segment-ipad-air-202009.png" alt="ipad air">
                                     <div class="card-body">
                                         <h3>iPad Air</h3>
                                         <p>Price: $549 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class=" card-img-top" style="padding:10px"
                                         src="./img/ipad-segment-ipad-202009.png" alt="ipad">
                                     <div class="card-body">
                                         <h3>iPad</h3>
                                         <p>Price: $309 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="./img/ipad-segment-ipad-mini-202009.png" alt="ipad mini">
                                     <div class="card-body">
                                         <h3>iPad mini</h3>
                                         <p>Price: $379 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="card-group" style="margin-bottom:50px">
                 <div class="card w-100">
                     <div class="card-header color">
                         <h3 id="iPhone" style="color:orange">iPhone</h3>
                     </div>

                     <div class="card-body">
                         <div class="row row-cols-1 row-cols-md-3">
                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="./img/iphone-12-pro-max-512gb.jpg" alt="iphone 12 Pro max">
                                     <div class="card-body">
                                         <h3>iPhone 12 Pro Max</h3>
                                         <p>Price: $1799 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="./img/iphone-12-256gb-195920-105925-400x400.jpg" alt="ipnone 12">
                                     <div class="card-body">
                                         <h3>iPhone 12 256GB</h3>
                                         <p>Price: $799</p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class=" card-img-top" style="padding:10px"
                                         src="./img/iphone-11-pro-max-512gb.jpg" alt="ipnone 11 pro max">
                                     <div class="card-body">
                                         <h3>iPhone 11 Pro Max</h3>
                                         <p>Price: $1699 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px" src="./img/iphone7.png"
                                         alt="ipnone 7 plus">
                                     <div class="card-body">
                                         <h3>iPhone 7 PLUS</h3>
                                         <p>Price: $ 499 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>
                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="./img/iphone-se-128gb-2020-hop-moi-292720-102759-400x400.jpg"
                                         alt="ipnone se">
                                     <div class="card-body">
                                         <h3>iPhone SE</h3>
                                         <p>Price: $560 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>
                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="./img/iphone-8-plus-128gb-082720-052716-400x400.jpg" alt="ipnone 8 Plus">
                                     <div class="card-body">
                                         <h3>iPhone 8 Plus</h3>
                                         <p>Price: $599 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="card-group" style="margin-bottom:50px">
                 <div class="card w-100">
                     <div class="card-header color">
                         <h3 id="Watch" style="color:orange">Watch</h3>
                     </div>

                     <div class="card-body">
                         <div class="row row-cols-1 row-cols-md-3">
                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="./img/apple-watch-s6-lte-40mm-vien-nhom-day-cao-su-ava-400x400.jpg"
                                         alt="apple watch s6">
                                     <div class="card-body">
                                         <h3>Apple Watch S6</h3>
                                         <p>Price: $599 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px" src="./img/apple-watch-se.jpg"
                                         alt="apple watch se">
                                     <div class="card-body">
                                         <h3>Apple Watch SE</h3>
                                         <p>Price: $345 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class=" card-img-top" style="padding:10px" src="./img/apple-watch-s5.jpg"
                                         alt="apple watch s5">
                                     <div class="card-body">
                                         <h3>Apple Watch S5</h3>
                                         <p>Price: $474 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px" src="./img/apple-watch-s3-lte.jpg"
                                         alt="apple watch s3">
                                     <div class="card-body">
                                         <h3>Apple Watch S3</h3>
                                         <p>Price: $300 </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <?php
    include('./common/footer.php');
    ?>