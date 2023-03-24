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
                        PHẦN MỀM QUẢN LÝ DỮ LIỆU QUAN TRẮC TỰ ĐỘNG </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                        aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarColor02">
                        <ul class="navbar-nav mr-auto">
                            <!--                        <li class="nav-item active">-->
                            <!--                          <a class="nav-link" href="#">PHẦN MỀM QUẢN LÝ DỮ LIỆU QUAN TRẮC TỰ ĐỘNG <span class="sr-only">(current)</span></a>-->
                            <!--                        </li>-->
                            <!-- <li class="nav-item">
                          <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">About</a>
                        </li> -->
                        </ul>
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- Content Row -->
                    <div class="card">
                        <h5 class="card-header">Trạm</h5>
                        <div class="card-body">
                            <div class="row">
                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-12 col-md-12 mb-4 w-100" style="height: 250px; overflow-y: scroll;">
                                    <div class="row" id='systemList'>

                                    </div>

                                </div>

                                <!-- Content Row -->

                            </div>
                        </div>
                    </div>

                    <div class="card mt-2">
                        <h5 class="card-header">Trạng thái các trạm</h5>
                        <div class="card-body">
                            <div class="row" style=" ">
                                <div class="col-sm-4">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"> Tổng quan
                                        </div>
                                        <hr>
                                        <div class="mb-2"> Tổng số trạm: <b>60</b></div>
                                        <div class="mb-2"> Hoạt động: <b>60</b></div>
                                        <div class="mb-2"> Mất kết nối : <b>60</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <table class="table table-striped">
                                            <thead>
                                                <!--                                        <tr>-->
                                                <!--                                            <form class="form-inline">-->
                                                <!--                                                <th scope="col">-->
                                                <!--                                                    <select class="form-control">-->
                                                <!--                                                        <option>Default select</option>-->
                                                <!--                                                    </select></th>-->
                                                <!--                                                <th scope="col">-->
                                                <!--                                                    <input class="form-control " type="search" placeholder="Search"-->
                                                <!--                                                           aria-label="Search">-->
                                                <!--                                                    &lt;!&ndash;                                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>&ndash;&gt;-->
                                                <!--                                                </th>-->
                                                <!--                                            </form>-->
                                                <!--                                        </tr>-->
                                                <tr>
                                                    <th scope="col">Trạm hoạt động</th>
                                                    <th scope="col">Trạng thái</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <div style="height: 200px; overflow-y: scroll;">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td>System 1</td>
                                                        <td>
                                                            <div class="border bg-success"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 2</td>
                                                        <td>
                                                            <div class="border bg-success"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 3</td>
                                                        <td>
                                                            <div class="border bg-success"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 1</td>
                                                        <td>
                                                            <div class="border bg-success"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 2</td>
                                                        <td>
                                                            <div class="border bg-success"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 3</td>
                                                        <td>
                                                            <div class="border bg-success"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 1</td>
                                                        <td>
                                                            <div class="border bg-success"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 2</td>
                                                        <td>
                                                            <div class="border bg-success"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 3</td>
                                                        <td>
                                                            <div class="border bg-success"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <table class="table table-striped">
                                            <thead>
                                                <!--                                        <tr>-->
                                                <!--                                            <form class="form-inline">-->
                                                <!--                                                <th scope="col">-->
                                                <!--                                                    <select class="form-control">-->
                                                <!--                                                        <option>Default select</option>-->
                                                <!--                                                    </select></th>-->
                                                <!--                                                <th scope="col">-->
                                                <!--                                                    <input class="form-control " type="search" placeholder="Search"-->
                                                <!--                                                           aria-label="Search">-->
                                                <!--                                                    &lt;!&ndash;                                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>&ndash;&gt;-->
                                                <!--                                                </th>-->
                                                <!--                                            </form>-->
                                                <!--                                        </tr>-->
                                                <tr>
                                                    <th scope="col">Trạm sự cố </th>
                                                    <th scope="col">Trạng thái</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <div style="height: 200px; overflow-y: scroll;">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td>System 1</td>
                                                        <td>
                                                            <div class="border bg-danger"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 1</td>
                                                        <td>
                                                            <div class="border bg-danger"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 1</td>
                                                        <td>
                                                            <div class="border bg-danger"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 1</td>
                                                        <td>
                                                            <div class="border bg-danger"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 1</td>
                                                        <td>
                                                            <div class="border bg-danger"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 1</td>
                                                        <td>
                                                            <div class="border bg-danger"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>System 1</td>
                                                        <td>
                                                            <div class="border bg-danger"
                                                                style="width:15px; height:15px"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 100%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">System </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <!-- Area Chart -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <button type="button" class="btn btn-primary"
                                                onclick="updateLabel('Temperature')">Temperature
                                            </button>
                                            <button type="button" class="btn btn-secondary"
                                                onclick="updateLabel('Humidity')">Humidity
                                            </button>
                                            <button type="button" class="btn btn-secondary"
                                                onclick="updateLabel('Height above sea level')">Height above sea level
                                            </button>
                                            <button type="button" class="btn btn-secondary"
                                                onclick="updateLabel('Actual height')">Actual height
                                            </button>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <!-- <canvas id="myAreaChart"></canvas> -->
                                            <canvas id="myChart1"
                                                style="height: 400px!important; display: block; box-sizing: border-box; width: 1564px;"
                                                width="1564" height="400px"></canvas>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper 365 323 -->
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{asset('js/index.js')}}"></script>

</body>

</html>
