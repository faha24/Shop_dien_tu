<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Cart</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">Cart</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <!-- Billing Details -->
                <div class="billing-details">
                    <table class="table" id="bang">
                        <tr>
                            <th></th>
                            <th>sản phẩm</th>
                            <th>tên</th>
                            <th>số lượng</th>
                            <th>giá</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th><input type="checkbox" name="check"></th>
                            <th>
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="./img/product01.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">980.00</h4><span>$</span>
                                    </div>

                                </div>

                            </th>
                            <th>product name goes here</th>
                            <th>
                                <div class="cart_qt">
                                    <button id="plus"><i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                    <input type="number" style="width: 20px;" id="qty" value="1">
                                    <button id="minus"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                </div>
                            </th>
                            <th id="product-price">98000</th>
                            <th hidden>98000</th>
                            <th> <button class="cart_delete"><a href=""><i class="fa fa-close"></i></a></button></th>
                        </tr>
                        <tr>
                            <th><input type="checkbox" name="check"></th>
                            <th>
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="./img/product01.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">980.00</h4><span>$</span>
                                    </div>

                                </div>

                            </th>
                            <th>product name goes here</th>
                            <th>
                                <div class="cart_qt">
                                    <button id="plus"><i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                    <input type="number" style="width: 20px;" value="1" id="qty">
                                    <button id="minus"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                </div>
                            </th>
                            <th id="product-price">98000</th>
                            <th hidden>98000</th>
                            <th> <button class="cart_delete"><a href=""><i class="fa fa-close"></i></a></button></th>
                        </tr>
                    </table>

                </div>
                <!-- /Billing Details -->



                <!-- Order Details -->

                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <div class="row">

            <div class="col-md-10">
                <!-- Billing Details -->
                <div class="billing-details">
                    <input type="checkbox" id="checkAll"> Chọn tất cả
                </div>
                <!-- /Billing Details -->



                <!-- Order Details -->

                <!-- /Order Details -->
            </div>
            <div class="col-md-2">
                <!-- Billing Details -->
                <div class="billing-details">
                    <h5>Tổng tiền (1 Sản phẩm): <b class="text-danger" id="sum">1000</b> Đ</h1>
                        <button class="btn btn-danger">Mua hàng</button>
                </div>
                <!-- /Billing Details -->



                <!-- Order Details -->

                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- NEWSLETTER -->

    <!-- /NEWSLETTER -->



    <!-- jQuery Plugins -->
    <!-- <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script> -->
    <script>
        var checkAll = document.getElementById("checkAll");
        var qty = document.querySelectorAll('#qty');
        var sum = document.getElementById("sum");
        var table = document.getElementById("bang");
        var plus = document.querySelectorAll("#plus")
        var minus = document.querySelectorAll("#minus")
        var product_price = document.querySelectorAll('#product-price');
        var check = document.querySelectorAll('input[name=check]');
        plus.forEach(element => {
            element.addEventListener('click', () => {


                var prarent = element.parentElement;
                var up = Number(prarent.children[1].value) + 1;
                var qty = prarent.children[1].value = up;
                var price = prarent.parentElement.parentElement.children[4];
                var total_price = prarent.parentElement.parentElement.children[5].textContent;

                price.innerHTML = qty * total_price;
                summm();
            })

        });

        minus.forEach(element => {
            element.addEventListener('click', () => {


                var prarent = element.parentElement;
                var down = Number(prarent.children[1].value) - 1;
                if (down < 0) {
                    down = 1;
                }
                var qty = prarent.children[1].value = down;
                var price = prarent.parentElement.parentElement.children[4];

                var total_price = prarent.parentElement.parentElement.children[5].textContent;

                price.innerHTML = qty * total_price;

                summm();

            })
        });


        checkAll.addEventListener('click', () => {

                if (checkAll.checked == true) {


                    for (const iterator of check) {

                        iterator.checked = true;

                        // prarent
                        // prarent.childen
                        //childen.textcontent
                        // arrr.push =childen.textcontent

                        // iterator.checked = false;

                        if (iterator.checked == false) {
                            iterator.checked = true

                        }





                    }


                } else {
                    for (const iterator of check) {
                        if (iterator.checked == true) {
                            iterator.checked = false;
                            if (iterator.checked == false) {
                                iterator.checked = false
                            }
                        }
                    }

                }
                summm();
            }

        )

        function check_one() {

        check.forEach(element => {
            element.addEventListener('click',()=>{
           
              if(element){
                
                  summm();
                 
              }
            })
        });   
             
            }
         check_one()
        


        //      table.addEventListener('click',(e)=>{
        //               var tong = 0   ;
        //      for (const item of product_price) {

        //     tong += Number(item.textContent);
        //   }
        //   console.log(Number(tong));
        //   sum.innerHTML = tong;
        // })

        function summm() {

            var total = 0
       //     for (const item of product_price) {
for (const chon of check) {
    if(chon.checked == true){
        //
         total += Number(chon.parentElement.parentElement.children[4].textContent);
    }else{
        if(chon.checked == true){
            total += Number(chon.parentElement.parentElement.children[4].textContent);
        }

    }
    
}
                
        //    }
            sum.innerHTML = total;

        }
    </script>