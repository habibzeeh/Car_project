
<?php

$user = $_SESSION["user"];

$cars = $m->cr->getAll($user->id);
$sold_cars = $m->sm->getAll($user->id);
$show_rooms = $m->sr->getAll($user->id);
$containers = $m->cm->getAll($user->id);

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
                        <h4 class="font-weight-bold py-3 mb-0">Dashboard</h4>
                        <div class="row">
                            <!-- 1st row Start -->
                            <div class="col-lg-7">
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
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card mb-4 bg-pattern-2-dark">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="lnr lnr-diamond display-4 text-primary"></div>
                                                    <div class="ml-3">
                                                        <div class="text-muted large">Total Earnings</div>
                                                        <div class="text-large">$13000</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-4 bg-pattern-2 bg-primary text-white">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="lnr lnr-diamond display-4"></div>
                                                    <div class="ml-3">
                                                        <div class="large">This Month Earning</div>
                                                        <div class="text-large">$100</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card d-flex w-100 mb-4">
                                            <div class="row no-gutters row-bordered row-border-light h-100">
                                                <div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">
                                                    <div class="card-body media align-items-center text-dark">
                                                        <i class="lnr lnr-car display-4 d-block text-primary"></i>
                                                        <span class="media-body d-block ml-3"><span class="text-big mr-1 text-primary"><?=sizeof($cars);?></span>
                                                            <br>
                                                            <small class="text-muted">Cars</small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">
                                                    <div class="card-body media align-items-center text-dark">
                                                        <i class="lnr lnr-apartment display-4 d-block text-primary"></i>
                                                        <span class="media-body d-block ml-3"><span class="text-big"><span class="mr-1 text-primary"><?=sizeof($show_rooms);?></span>
                                                            <br>
                                                            <small class="text-muted">Show Rooms</small>
                                                        </span>
                                                    </span></div>
                                                </div>
                                                <div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">
                                                    <div class="card-body media align-items-center text-dark">
                                                        <i class="lnr lnr-database display-4 d-block text-primary"></i>
                                                        <span class="media-body d-block ml-3"><span class="text-big"><span class="mr-1 text-primary"><?=sizeof($containers);?></span>
                                                            <br>
                                                            <small class="text-muted">Containers</small>
                                                        </span>
                                                    </span></div>
                                                </div>
                                                <div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">
                                                    <div class="card-body media align-items-center text-dark">
                                                        <i class="lnr lnr-cart display-4 d-block text-primary"></i>
                                                        <span class="media-body d-block ml-3"><span class="text-big"><span class="mr-1 text-primary"><?=sizeof($sold_cars);?></span>
                                                            <br>
                                                            <small class="text-muted">Sold</small>
                                                        </span>
                                                    </span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 1st row Start -->
                        </div>
                        <div class="row">
                            <!-- 2nd row Start -->
                            <div class="col-md-12">
                                <div class="card d-flex w-100 mb-4">
                                    <div class="row no-gutters row-bordered row-border-light h-100">
                                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                                            <div class="card-body">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="lnr lnr-earth text-primary display-4"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-0 text-muted">Total <span class="text-primary">Subscription</span></h6>
                                                        <h4 class="mt-3 mb-0">7652<i class="ion ion-md-arrow-round-down ml-3 text-danger"></i></h4>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-muted">48% From Last 24 Hours</p>
                                            </div>
                                        </div>
                                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                                            <div class="card-body">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="lnr lnr-cart text-primary display-4"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-0 text-muted"><span class="text-primary">Order</span> Status</h6>
                                                        <h4 class="mt-3 mb-0">6325<i class="ion ion-md-arrow-round-up ml-3 text-success"></i></h4>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-muted">36% From Last 6 Months</p>
                                            </div>
                                        </div>
                                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                                            <div class="card-body">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="lnr lnr-users text-primary display-4"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-0 text-muted">Unique <span class="text-primary">Visitors</span></h6>
                                                        <h4 class="mt-3 mb-0">652<i class="ion ion-md-arrow-round-down ml-3 text-danger"></i></h4>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-muted">36% From Last 6 Months</p>
                                            </div>
                                        </div>
                                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                                            <div class="card-body">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="lnr lnr-magic-wand text-primary display-4"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-0 text-muted">Monthly <span class="text-primary">Earnings</span></h6>
                                                        <h4 class="mt-3 mb-0">5963<i class="ion ion-md-arrow-round-up ml-3 text-success"></i></h4>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-muted">36% From Last 6 Months</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Staustic card 3 Start -->
                            </div>
                            <!-- 2nd row Start -->
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
        $sold_chart_data = array();

        foreach ($sold_cars as $s){
            $car = $m->cr->get($s->car_id);
            $sold_chart_data[$car->make] = getValue($sold_chart_data,$car->make) + 1 ;
        }
        ?>

        let SoldChartNames = [];
        let SoldChartValues = [];
        <?php foreach($sold_chart_data as $key => $val){ ?>
        SoldChartNames.push('<?php echo $key; ?>');
        SoldChartValues.push('<?php echo $val; ?>');
        <?php } ?>


        let c1 = document.getElementById("car_sale_chart").getContext('2d');
        let chart = new Chart(c1, {
            type: 'line',
            data: {
                labels:
                    ["Jab","Feb","Mar","Apr","May","june"],
                datasets: [{
                    label: 'Car Solds',
                    borderColor: '#716aca',
                    borderWidth: 3,
                    fill: false,
                    data: [4,3,1,6,1,4]
                },
                    {
                        label: 'Car Buyed',
                        borderColor: '#555555',
                        borderWidth: 3,
                        fill: false,
                        data: [10,5,6,8,3,8]
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

