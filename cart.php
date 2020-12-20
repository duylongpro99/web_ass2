 <!-- Header -->
<?php
    include('./common/intro.php');
    include('./common/header.php');
?>
<!-- body -->
<div class="container w-96 px-0" style=" max-width: 96vw; margin-left: 2%; margin-top: 40px;">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Item Number</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>

                        <tbody>
                            <tr class="item">
                                <td class="amount">2</td>
                                <td>Table</td>
                                <td class="price">500000</td>
                                <td><a> X </a></td>
                            </tr>
                            <tr class="item">
                                <td class="amount">8</td>
                                <td>Chair</td>
                                <td class="price">100000</td>
                                <td><a class='remove_item_link'> X </a></td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td></td>
                                <td class="total">Total</td>
                                <td class="confirm"><button type="button" onclick="pay()" class="btn btn-primary">Caculate</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./js/cart.js"></script>
<?php
    include('./common/footer.php');
?>