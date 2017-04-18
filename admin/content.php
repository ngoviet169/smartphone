<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
               
            <?php
                $chucnang = '';
                if(isset($_GET['function']))
                    $chucnang = $_GET['function'];

                switch ($chucnang) {
                    case 'cate_list': case '':
                        include('module/categories/list.php');
                        break;

                    case 'cate_add':
                        include('module/categories/add.php');
                        break;
                    
                    case 'cate_edit':
                        include('module/categories/edit.php');
                        break;

                    case 'prod_add':
                        include('module/product/add.php');
                        break;

                     case 'prod_list':
                        include('module/product/list.php');
                        break;

                    case 'editCate':
                        include('module/categories/function.php');
                        break;

                    case 'addCate':
                        include('module/categories/function.php');
                        break;

                    case 'deleteCate':
                        include('module/categories/function.php');
                        break;

                    case 'addProduct':
                        include('module/product/function.php');
                        break;
                    default:
                        # code...
                        break;
                }
            ?>
        </div>
                <!-- /.row -->
    </div>
            <!-- /.container-fluid -->
</div>