<?php include 'Header.php';

$user = $user = $_SESSION["user"];
$path = $m->fm->makeUserDir($user->id);
$file_path = $path . "file.csv";

$file = fopen($file_path, 'r');
$csv = array();
$lines = file($file_path, FILE_IGNORE_NEW_LINES);
foreach ($lines as $key => $value)
    $csv[$key] = str_getcsv($value);

$cars = array();
for($i=1;$i<sizeof($csv);$i++){
    $car = Car::setData(
            "",
        $user->id,
        "",
        "",
        $csv[$i]["3"],
        $csv[$i]["1"],
        $csv[$i]["2"],
            "",
        convertPrice($csv[$i]["9"]),
            "",
            "",
            "",
            "",
            "",
            "",
            "",
        $csv[$i]["11"]
    );
    array_push($cars,$car);
}

function convertPrice($price){
    $price = str_replace(",","",$price);
    $price = str_replace("USD","",$price);
    $price = str_replace("","",$price);
    return $price;
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

                        <div class="card">

                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Model</th>
                                    <th>Make</th>
                                    <th>Buy($)</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; foreach($cars as $car):  ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $car->name; ?></td>
                                        <td><?= $car->model; ?></td>
                                        <td><?= $car->make; ?></td>
                                        <td><?= $car->buy; ?></td>
                                        <td><?= $car->purchase_date; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

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