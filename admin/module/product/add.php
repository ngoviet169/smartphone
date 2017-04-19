<div class="col-lg-12">
    <h1 class="page-header">Product
        <small>Add</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="index.php?function=addProduct" method="POST" enctype="multipart/form-data">
        <?php
            //include('connect.php');

            $sql = "select * from categories";

            $query = $db->query($sql);
        ?>
        
        <div class="form-group">
            <label>Category Name</label>
            <select class="selectpicker" name="categories">
                <?php
                    while($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['cate_name']; ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="prod_name" placeholder="Enter name" />
        </div>
        
        <div class="form-group">
            <label>Description</label>
            <input class="form-control" name="description" placeholder="Enter description" />
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image"/>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="price" placeholder="Enter price" />
        </div>
        
        <button type="submit" class="btn btn-default"  name="upload">Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
