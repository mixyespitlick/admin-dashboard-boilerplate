@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-header-title">
        <h4>Dashboard</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#!">Pages</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#!">Dashboard</a>
            </li>
        </ul>
    </div>
</div>
<div class="page-body">
    <div class="row">
        <div class="col-md-12 col-xl-4">
            <div class="card table-card">
                <div class="">
                    <div class="row-table">
                        <div class="col-sm-6 card-block-big br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="
                        icofont icofont-eye-alt
                        text-success
                      "></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>10k</h5>
                                    <span>Visitors</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-block-big">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="
                        icofont icofont-ui-music
                        text-danger
                      "></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>100%</h5>
                                    <span>Volume</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row-table">
                        <div class="col-sm-6 card-block-big br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icofont icofont-files text-info"></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>2000 +</h5>
                                    <span>Files</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-block-big">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="
                        icofont icofont-envelope-open
                        text-warning
                      "></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>120</h5>
                                    <span>Mails</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4">
            <div class="card table-card">
                <div class="">
                    <div class="row-table">
                        <div class="col-sm-6 card-block-big br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div id="barchart" style="height: 40px; width: 40px"></div>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>1000</h5>
                                    <span>Shares</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-block-big">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="
                        icofont icofont-network
                        text-primary
                      "></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>600</h5>
                                    <span>Network</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row-table">
                        <div class="col-sm-6 card-block-big br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div id="barchart2" style="height: 40px; width: 40px"></div>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>350</h5>
                                    <span>Returns</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-block-big">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="
                        icofont icofont-network-tower
                        text-primary
                      "></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>100%</h5>
                                    <span>Connections</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4">
            <div class="card table-card widget-primary-card">
                <div class="">
                    <div class="row-table">
                        <div class="col-sm-3 card-block-big">
                            <i class="icofont icofont-star"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>4000 +</h4>
                            <h6>Ratings Received</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card table-card widget-success-card">
                <div class="">
                    <div class="row-table">
                        <div class="col-sm-3 card-block-big">
                            <i class="icofont icofont-trophy-alt"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>17</h4>
                            <h6>Achievements</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                    <div id="chartdiv"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary btn-sm">
                        Week
                    </button>
                    <button class="btn btn-primary btn-sm">
                        Month
                    </button>
                    <button class="btn btn-primary btn-sm">
                        Year
                    </button>
                </div>
                <div class="card-block">
                    <div id="morris-extra-area"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card table-1-card">
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-capitalize">
                                    <th>Type</th>
                                    <th>Lead Name</th>
                                    <th>Views</th>
                                    <th>Favourites</th>
                                    <th>Last Visit</th>
                                    <th>Last Action</th>
                                    <th>Last Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#!">Buyer</a></td>
                                    <td>Denish Ann</td>
                                    <td>153</td>
                                    <td>100</td>
                                    <td>20</td>
                                    <td>9.23 A.M.</td>
                                    <td>9/27/2015</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-danger" href="#!">Lanload</a>
                                    </td>
                                    <td>John Doe</td>
                                    <td>121</td>
                                    <td>100</td>
                                    <td>20</td>
                                    <td>6.23 A.M.</td>
                                    <td>8/27/2015</td>
                                </tr>
                                <tr>
                                    <td><a href="#!">Buyer</a></td>
                                    <td>Henry Joe</td>
                                    <td>154</td>
                                    <td>140</td>
                                    <td>30</td>
                                    <td>7.54 P.M.</td>
                                    <td>4/30/2015</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-danger" href="#!">Lanload</a>
                                    </td>
                                    <td>Sara Soudein</td>
                                    <td>153</td>
                                    <td>100</td>
                                    <td>20</td>
                                    <td>9.23 A.M.</td>
                                    <td>5/20/2016</td>
                                </tr>
                                <tr>
                                    <td><a href="#!">Buyer</a></td>
                                    <td>Denish Ann</td>
                                    <td>153</td>
                                    <td>100</td>
                                    <td>20</td>
                                    <td>9.23 A.M.</td>
                                    <td>3/26/2015</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-info" href="#!">Lanload</a>
                                    </td>
                                    <td>Stefen Joe</td>
                                    <td>153</td>
                                    <td>100</td>
                                    <td>20</td>
                                    <td>11.45 A.M.</td>
                                    <td>5/20/2017</td>
                                </tr>
                                <tr>
                                    <td><a href="#!">Buyer</a></td>
                                    <td>Mark Backlus</td>
                                    <td>153</td>
                                    <td>100</td>
                                    <td>20</td>
                                    <td>12.40 A.M.</td>
                                    <td>3/27/2017</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection