<?php
    session_start();
    include('../koneksi.php');
    $user_id = $_SESSION['user_id'];
    $sql_ = mysqli_query($conn, "SELECT * FROM tbl_assessor AS a inner join tbl_user AS b on a.user_id = b.user_id WHERE a.user_id = '$user_id' ");
    $result_ = mysqli_fetch_array($sql_);
?>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                        <span>
                             <?php echo "<img alt='image' class='img-circle' width='52px' height='52px' src='images/".$result_['foto']."'>"?>
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $result_['username'] ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $result_['level_user'] ?><b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <?php echo "<li><a href='profile.php?iduser=".$user_id."'>Profile</a></li>" ?>
                                <li><a href="">Contacts</a></li>
                                <li><a href="">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="../logout.php">Logout</a></li>
                            </ul>
                    </div>
                    <div class="logo-element">
                        <center><?php echo "<img width='40px' height='40px' class='img-circle' src='images/".$result_['foto']."'>"?></center>
                    </div>
                </li>
                <li>
                    <a href="seleksi.php"><i class="fa fa-list-ul"></i> <span class="nav-label">seleksi</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="../logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>