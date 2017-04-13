                    <?php
                        include('connect.php');

                        $id = $db->LastInsertId();
                        
                        $sql = "select * from categories where id = {$id}";

                        $recordset = $db->query($sql);

                        $row = $recordset->fetch(PDO::FETCH_BOTH);
                         
                    ?>

                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="categories/function.php" method="POST">
                            
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="cate_name" value="<?php echo $row['cate_name']; ?>" />
                            </div>
                            
                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" rows="3" name="note" value="<?php echo $row['note']; ?>"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-default"  name="add">Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
