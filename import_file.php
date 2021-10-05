<?php include 'Header.php';
$user = $user = $_SESSION["user"];
$path = $m->fm->makeUserDir($user->id);
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $temp =  $_FILES["file"]["tmp_name"];
    $file_path = $path . "file.csv";
    move_uploaded_file($temp, $file_path);
    header('Location: import_view.php');
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
                        <div class="row py-3 mb-0 w-100">

                            <h4 class="font-weight-bold py-3 mb-0 w-50">Copart</h4>

                        </div>

                        <div class="card mb-4">
                            <h6 class="card-header">Import File</h6>
                            <div class="card-body">
                                <form action="import_file.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="form-label w-100">CSV File</label>
                                        <input type="file" accept=".csv" name="file" id="file">
                                        <small class="form-text text-muted">Please select the csv file exported from Copart.</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload</button>
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