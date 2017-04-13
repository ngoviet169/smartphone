                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="index.php?function=addCate" method="POST">
                            
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="cate_name" placeholder="Enter name" />
                            </div>
                            
                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" rows="3" name="note"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-default"  name="add">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
