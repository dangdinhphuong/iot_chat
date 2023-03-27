<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>IOT</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" style="    background-color: #ffffff; color:black;" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
                    <a class="navbar-brand" href="#"> <img
                            src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30"
                            height="30" class="d-inline-block align-top" alt="">
                        Water level monitoring system in the MeKong River</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                        aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarColor02">
                        <ul class="navbar-nav mr-auto">
                            {{-- System --}}
                        </ul>
                        <a class="btn btn-secondary" href="{{ route('profile.show') }}"> {{ Auth::user()->name }}</a>
                
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- Content Row -->
                    <div class="card">
                        <h5 class="card-header">ThuyLoi University</h5>
                        <button class="btn btn-primary" onclick="loadData()">Update Data</button>
                        <div class="card-body">
                            <div class="row">
                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-12 col-md-12 mb-4 w-100" style="height: 250px; overflow-y: scroll;">
                                    <div class="row" id='nodeList'>

                                    </div>

                                </div>

                                <!-- Content Row -->

                            </div>
                        </div>
                    </div>

                    <div class="card mt-2">
                        <h5 class="card-header">Status of stations</h5>
                        <div class="card-body">
                            <div class="row " id="systemList">

                            </div>
                        </div>
                    </div>
                    <div class="card mt-2" id="dataSytem">
                        <h5 class="card-header">Dữ liệu trạm : <b id="title_stytem"></b> </h5>
                        <div class="card-body">
                            <div class="row ">
                                <canvas id="myChart1"
                                style="height: 400px!important; display: block; box-sizing: border-box; width: 1564px;"
                                width="1564" height="400px"></canvas>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Modal -->

            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper 365 323 -->
    </div>
    <div style="width:150px">

    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('js/index.js') }}"></script>
    <script>
        var data = {
            name: "phương"
        };
        var url = new URL('wss://socket-server-demo.herokuapp.com:443/controller');
        url.searchParams.set('data', JSON.stringify(data));
        var conn = new WebSocket(url.href);
    </script>
    <script>
    </script>
</body>

</html>
