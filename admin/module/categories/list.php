<?php
    include('connect.php');
?>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Categories Name</th>
            <th>Note</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "select * from categories";

            $recordset = $db->query($sql);

            while ($row = $recordset->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr class="odd gradeX" align="center">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['cate_name']; ?></td>
                    <td><?php echo $row['note']; ?></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?function=deleteCate&id=<?php echo $row['id']; ?>" onClick="return confirm('Really want to delete this categories ?');"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?function=cate_edit&id=<?php echo $row['id']; ?>">Edit</a></td>
                </tr>
            <?php
                # code...
            }
        ?>                
    </tbody>
</table>