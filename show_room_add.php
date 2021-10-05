<?php include 'Header.php';

$user = $user = $_SESSION["user"];

$name = "";
$capacity = "";
$location = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $capacity = $_POST["capacity"];
    $location = $_POST["location"];

    if(strlen($name) == 0)
        $err = "Name Required \n" ;
    else{
        $show_room =  ShowRoom::setData("",$user->id,$name,$capacity,$location);
        $result = $m->sr->add($show_room);
        header('Location: show_rooms.php');
    }
}
include 'Header_files.php';
?>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <?php include 'side_nav_bar_user.php'; ?>
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->

            <?php include 'top_nav_bar_user.php';?>
                <!-- [ Layout navbar ( Header ) ] End -->

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <?php if(isset($err)):?>
                            <div class="alert alert-dark-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <?=$err?>
                            </div>
                        <?php endif; ?>

                        <div class="card mb-4">
                            <h6 class="card-header">Add Show Room</h6>
                            <div class="card-body">
                                <form action="show_room_add.php" method="post">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="Name of the show room" value="<?=$name;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Capacity</label>
                                        <input name="capacity" type="number" class="form-control" placeholder="Total Cars capacity" value="<?=$capacity;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Location</label>
                                        <input name="location" type="text" class="form-control" placeholder="Location / City of the show room" value="<?=$location;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right btn-primary">
                                        <span class="far fa-plus-square"></span>&nbsp;&nbsp;Add Show Room</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- [ content ] End -->

                    <!-- [ Layout footer ] Start -->
                    <?php include 'footer.php';?>
                    <!-- [ Layout footer ] End -->
                </div>
                <!-- [ Layout content ] Start -->
            </div>
            <!-- [ Layout container ] End -->


        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->

    <?php include 'libs.php';?>
</body>