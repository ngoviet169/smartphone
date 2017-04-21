<?php
    include('connect.php');
?>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Category</th>
            <th>Name</th>
            <th>Level</th>
            <th>Description</th>
            <th>Image</th>
            <th>Price</th>
            <th>Buy</th>
            <th>Sold</th>
            <th>Stock</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "select * from product join categories on product.cate_id = categories.id order by prod_id desc";

            $recordset = $db->query($sql);

            while ($row = $recordset->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr class="odd gradeX" align="center">
                    <td><?php echo $row['prod_id']; ?></td>
                    <td><?php echo $row['cate_name']; ?></td>
                    <td><?php echo $row['prod_name']; ?></td>
                    <td><?php echo $row['prod_level']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['picture']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['buy']; ?></td>
                    <td><?php echo $row['sold']; ?></td>
                    <td><?php echo $row['in_stock']; ?></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/categories/delete/{{$ca->id}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?function=cate_edit">Edit</a></td>
                </tr>
            <?php
                # code...
            }
        ?>                
    </tbody>
</table>