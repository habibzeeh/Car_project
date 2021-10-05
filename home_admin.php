
<?php
$user = $_SESSION["user"];

$count = $m->vm->getCount();
$daily_count = $m->vm->getTodayCount();
$daily_count_unique = $m->vm->getTodayCountUnique();
$count_unique = $m->vm->getCountUnique();
$users_count = $m->um->count();

function getValue($array,$key){
    if(isset($array[$key])) return $array[$key];
    return 0;
}

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
            <?php include 'side_nav_bar_admin.php'; ?>
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
                        <h4 class="font-weight-bold py-3 mb-0">Dashboard</h4>
                        <div class="row">
                            <!-- 2nd row Start -->
                            <div class="col-md-12">
                                <div class="card d-flex w-100 mb-4">
                                    <div class="row no-gutters row-bordered row-border-light h-100">
                                        <div class="d-flex col-md-6 col-lg-4 align-items-center">
                                            <div class="card-body">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="lnr lnr-earth text-primary display-4"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-0 text-muted">Total <span class="text-primary"> Hits</span></h6>
                                                        <h4 class="mt-3 mb-0"><?=$daily_count ." / " . $count ;?></h4>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-muted">Last 24 Hours / All Times</p>
                                            </div>
                                        </div>
                                        <div class="d-flex col-md-6 col-lg-4 align-items-center">
                                            <div class="card-body">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="lnr lnr-users text-primary display-4"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-0 text-muted">Unique <span class="text-primary">Visitors</span></h6>
                                                        <h4 class="mt-3 mb-0"><?=$daily_count_unique . " / " .$count_unique;?></h4>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-muted">Last 24 Hours / All Times</p>
                                            </div>
                                        </div>
                                        <div class="d-flex col-md-6 col-lg-4 align-items-center">
                                            <div class="card-body">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="lnr lnr-user text-primary display-4"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-0 text-muted">Register <span class="text-primary">Users</span></h6>
                                                        <h4 class="mt-3 mb-0"><?=$users_count;?></h4>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-muted">All Times</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Staustic card 3 Start -->
                            </div>
                            <!-- 2nd row Start -->
                        </div>
                        <div class="row">
                            <!-- 1st row Start -->
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header with-elements">
                                        <h6 class="card-header-title mb-0">Statistics</h6>
                                        <div class="card-header-elements ml-auto">
                                            <label class="text m-0">
                                                <span class="text-light text-tiny font-weight-semibold align-middle">SHOW STATS</span>
                                                <span class="switcher switcher-sm d-inline-block align-middle mr-0 ml-2"><input type="checkbox" class="switcher-input" checked=""><span class="switcher-indicator"><span class="switcher-yes"></span><span class="switcher-no"></span></span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <canvas id="car_sale_chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 1st row Start -->
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

        <?php

        $visitors = $m->vm->getRecordsLastWeek();
        $chart_data = array();

        foreach ($visitors as $v){
            $chart_data[$v->date] = getValue($chart_data,$v->date) + 1 ;
        }
        ?>

        let ChartNames = [];
        let ChartValues = [];
        <?php foreach($chart_data as $key => $val){ ?>
        ChartNames.push('<?php echo $key; ?>');
        ChartValues.push('<?php echo $val; ?>');

        <?php } ?>




        let c1 = document.getElementById("car_sale_chart").getContext('2d');
        let chart = new Chart(c1, {
            type: 'line',
            data: {
                labels: ChartNames,
                datasets: [{
                    label: 'Daily Visitors',
                    borderColor: '#716aca',
                    borderWidth: 3,
                    fill: false,
                    data: ChartValues
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Chart.js Drsw Line on Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: true
                },
                elements: {
                    line: {
                        tension: 0.4
                    }
                }
            }
        });
    </script>
</body>

