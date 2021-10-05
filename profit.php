<?php include 'Header.php';

$user = $user = $_SESSION["user"];

$sold_cars = $m->sm->getAll($user->id);
$sold_cars_count = sizeof($sold_cars);
$make_chart_data = array();
$model_chart_data = array();

foreach ($sold_cars as $s){
    $car = $m->cr->get($s->car_id);
    $make_chart_data[$car->make] = getValue($make_chart_data,$car->make) + 1 ;
    $model_chart_data[$car->model] = getValue($model_chart_data,$car->model) + 1 ;
}

function getValue($array,$key){
    if(isset($array[$key])) return $array[$key];
    return 0;
}


include 'Header_files.php';
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.1/dist/chart.min.js"></script>

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
                        <h4 class="font-weight-bold py-3 mb-0">Profit charts</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">Make Sold</div>
                                    <div class="card-body">
                                            <div>
                                                <canvas id="make_chart"></canvas>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">Model Sold</div>
                                    <div class="card-body">
                                        <div>
                                            <canvas id="model_chart"></canvas>
                                        </div>
                                    </div>
                                </div>
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

<script>


    let backgroundColors = [
        "#2ecc71",
        "#3498db",
        "#95a5a6",
        "#9b59b6",
        "#f1c40f",
        "#e74c3c",
        "#34495e"
    ];

    let makeChartNames = [];
    let makeChartValues = [];
    let modelChartNames = [];
    let modelChartValues = [];
    <?php foreach($make_chart_data as $key => $val){ ?>
    makeChartNames.push('<?php echo $key; ?>');
    makeChartValues.push('<?php echo $val; ?>');
    <?php } ?>

    <?php foreach($model_chart_data as $key => $val){ ?>
    modelChartNames.push('<?php echo $key; ?>');
    modelChartValues.push('<?php echo $val; ?>');
    <?php } ?>


    let c1 = document.getElementById("make_chart").getContext('2d');
    let makeChart = new Chart(c1, {
        type: 'polarArea',
        data: {
            labels: makeChartNames,
            datasets: [{
                backgroundColor: backgroundColors,
                data: makeChartValues
            }]
        }
    });

    let c2 = document.getElementById("model_chart").getContext('2d');
    let modelChart = new Chart(c2, {
        type: 'polarArea',
        data: {
            labels: modelChartNames,
            datasets: [{
                backgroundColor: backgroundColors,
                data: modelChartValues
            }]
        }
    });
</script>

</body>


<!--https://www.chartjs.org/-->