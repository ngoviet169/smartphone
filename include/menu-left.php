<div class="container">

        <div class="row main-left">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li class="list-group-item menu1 active">
                        Menu
                    </li>
                    <?php
                        include('connect.php');

                        $sql = ('select * from categories');
                        $recordset = $db->query($sql);
                        
                        
                        while ($row = $recordset->fetch(PDO::FETCH_ASSOC)) {
                                                   
                    ?>
                        <li class="list-group-item menu1">
                            <a href="index.php?function=<?php echo $row['cate_name']; ?>"><?php echo $row['cate_name']; ?></a>
                        </li>
                    <?php
                        }
                    
                    ?>
                    
                    <!--
                    <ul>
                        <li class="list-group-item">
                            <a href="#">Samsung galaxy S</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Samsung galaxy Y</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Samsung galaxy note</a>
                        </li>
                    </ul>

                    <li href="#" class="list-group-item menu1">
                        <a href="#">Sony</a>
                    </li>

                    <ul>
                        <li class="list-group-item">
                            <a href="#">Sony Ericsson</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Sony Xperia</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Sony Z</a>
                        </li>
                    </ul>


                    <li href="#" class="list-group-item menu1">
                        <a href="#">Apple</a>
                    </li>
                    <ul>
                        <li class="list-group-item">
                            <a href="#">Iphone 5</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Iphone 6</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Ipod</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Ipad</a>
                        </li>
                    </ul>


                    <li href="#" class="list-group-item menu1">
                        <a href="#">HTC</a>
                    </li>
                    <ul>
                        <li class="list-group-item">
                            <a href="#">HTC Touch</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">HTC Touch and Type</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">HTC Type</a>
                        </li>
                    </ul>

                    <li href="#" class="list-group-item menu1">
                        <a href="#">Xiaomi</a>
                    </li>
                    <ul>
                        <li class="list-group-item">
                            <a href="#">Xiaomi Note</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Xiaomi MI</a>
                        </li>
                    </ul>

                    <li href="#" class="list-group-item menu1">
                        <a href="#">BlackBerry</a>
                    </li>
                    <ul>
                        <li class="list-group-item">
                            <a href="#">BlackBerry Q</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">BlackBerry Z</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Classic</a>
                        </li>
                    </ul>
                    -->
                </ul>
            </div>

            