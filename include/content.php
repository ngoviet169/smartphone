<div class="col-md-9">
                <div class="panel panel-default">            
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h2 style="margin-top:0px; margin-bottom:0px;">
                            <?php
                                $chucnang = '';
                                if(isset($_GET['function']))
                                    $chucnang = $_GET['function'];

                                if($chucnang == 'aboutus'){
                                    echo "About Us";
                                } else if ($chucnang == 'contact') {
                                    echo "Contact Us";
                                } else if ($chucnang == 'signup') {
                                    echo "Registration";
                                } else if ($chucnang == 'signin') {
                                    echo "User Login";
                                } else if($chucnang == 'SamSung'){
                                    echo "Samsung";
                                } else if($chucnang == 'Sony'){
                                    echo "Sony";
                                } else if($chucnang == ""){
                                    echo "New product";
                                } else if($chucnang == 'showCart'){
                                    echo "Shopping Cart";
                                } else if($chucnang == 'detail'){
                                    echo "Detail";
                                }
                            ?>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <!-- item -->
                        <div class="row-item row">
                            <?php
                                
                                switch ($chucnang) {

                                    case '':
                                        include('include/lastAdd.php');
                                        break;

                                    case 'aboutus':
                                        include('include/introduce.php');
                                        break;

                                    case 'contact':
                                        include('include/contact.php');
                                        break;
                                    
                                    case 'signup':
                                        include('include/signup.php');
                                        break;

                                    case 'signin':
                                        include('include/signin.php');
                                        break;

                                    case 'SamSung':
                                        include('include/samsung.php');
                                        break;

                                    case 'Sony':
                                        include('include/sony.php');
                                        break;

                                    case 'logout':
                                        include('logout.php');
                                        break;
                                    
                                    case 'addCart':
                                        include('addCart.php');
                                        break;

                                    case 'showCart':
                                        include('showCart.php');
                                        break;

                                    case 'updateCart':
                                        include('updateCart.php');
                                        break;    

                                    case 'delCart':
                                        include('delCart.php');
                                        break;

                                    case 'detail':
                                        include('detail.php');
                                        break;

                                    case 'comment':
                                        include('comment.php');
                                        break;
                                    default:
                                        
                                        break;
                                }
                            ?>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>