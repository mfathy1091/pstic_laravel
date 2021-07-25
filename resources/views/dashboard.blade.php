<!DOCTYPE html>
<html lang="en">
@section('title')
{{trans('main_trans.Main_title')}}
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
    <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css" >
</head>

<body style="font-family: 'Cairo', sans-serif">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

 <div id="pre-loader">
     <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
 </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title" >
                <div class="row">
                    <div class="col-sm-6" >
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">{{trans('main_trans.Dashboard_page')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>

            <br><br><br>
            
            <p>Is the client Registered:</p>

            <input type="radio" id="yes" name="fav_language" value="HTML">
            <label for="yes">Yes</label><br>
            
            <input type="radio" id="no" name="fav_language" value="CSS">
            <label for="no">No</label><br>


            <input id="file_number" type="text" placeholder="Enter the UNHCR Number" class="text">
            <button class="btn btn-success" id="unregistered">check</button>


            <script>
                var fileNumberInput = document.getElementById('file_number');
                fileNumberInput.addEventListener('blur', searchEvent);

                function searchEvent(e){
                    var query = e.target.value;
                    console.log(query);

                }
            </script>




            <br>
            <br>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Beneficiary</th>
                        <th>Services</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($julyBeneficiaries as $beneficiary)
                    <tr>
                        <td>{{ $beneficiary->individual->name }}</td>
                        <td>
                            <ul>
                                @foreach ($beneficiary->benefits as $benefit)
                                    <li>{{ $benefit->service->name }}</li>
                                @endforeach   
                            </ul>    
                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>













            <script src="js/dom.js"></script>



            <br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br>


            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select Month
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="">January</a>
                    <a class="dropdown-item" href="">February</a>
                    <a class="dropdown-item" href="">March</a>
                    <a class="dropdown-item" href="">April</a>
                    <a class="dropdown-item" href="">May</a>
                    <a class="dropdown-item" href="">June</a>
                </div>
            </div>


            <!-- widgets -->
            <div class="row" >
                <div class="col-xl-2 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h4 class="card-text text-dark">Ps Workers</h4>
                                    <h4>{{ $psWorkersCount }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" >
                <div class="col-xl-2 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h4 class="card-text text-dark">Ps Cases</h4>
                                    <h4>{{ $psCasesCount }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>Month</th>
                    <th>Referrals</th>
                </tr>
                @foreach ($months as $month)
                <tr>
                    <td>{{ $month->name }}</td>
                    <td>
                        <ul>
                            @foreach ($month->referrals as $referral)
                                <li>{{ $referral->file->number }}, {{ $referral->pivot->case_status }}</li>
                            @endforeach    
                        </ul>    
                    </td>

                </tr>
                @endforeach
            </table>

            <div class="container">
                <div class="col-md-12">
                    <div class="panel panel-default">
                            <div class="panel-heading">
                                Employee
                            </div>
                    <div class="panel-body">
                                <table class="table table-condensed table-striped">
                <thead>
                    <tr>
                                <th></th>
                      <th>Fist Name</th>
                      <th>Last Name</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Status</th>
                    </tr>
                </thead>
            
                <tbody>
                    <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                       <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                        <td>Carlos</td>
                        <td>Mathias</td>
                        <td>Leme</td>
                        <td>SP</td>
                          <td>new</td>
                    </tr>
                        
                    <tr>
                        <td colspan="12" class="hiddenRow">
                                        <div class="accordian-body collapse" id="demo1"> 
                          <table class="table table-striped">
                                  <thead>
                                    <tr class="info">
                                                                <th>Job</th>
                                                                <th>Company</th>
                                                                <th>Salary</th>		
                                                                <th>Date On</th>	
                                                                <th>Date off</th>	
                                                                <th>Action</th>	
                                                            </tr>
                                                        </thead>	
                                                      
                                                        <tbody>
                                                            
                                    <tr data-toggle="collapse"  class="accordion-toggle" data-target="#demo10">
                                                                <td> <a href="#">Enginner Software</a></td>
                                                                <td>Google</td>
                                                                <td>U$8.00000 </td>
                                                                <td> 2016/09/27</td>
                                                                <td> 2017/09/27</td>
                                                                <td> 
                                                                    <a href="#" class="btn btn-default btn-sm">
                                                              <i class="glyphicon glyphicon-cog"></i>
                                                                        </a>
                                                                </td>
                                                            </tr>
                                                            
                                                             <tr>
                        <td colspan="12" class="hiddenRow">
                                        <div class="accordian-body collapse" id="demo10"> 
                          <table class="table table-striped">
                                  <thead>
                                    <tr>
                                                                <td><a href="#"> XPTO 1</a></td>
                                                                <td>XPTO 2</td>
                                                                <td>Obs</td>
                                                            </tr>
                                    <tr>
                                                                <th>item 1</th>
                                                                <th>item 2</th>
                                                                <th>item 3 </th>
                                                                <th>item 4</th>
                                                                <th>item 5</th>
                                                                <th>Actions</th>
                                                            </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                                                <td>item 1</td>
                                                                <td>item 2</td>
                                                                <td>item 3</td>
                                                                <td>item 4</td>
                                                                <td>item 5</td>
                                                                <td>
                                                                        <a href="#" class="btn btn-default btn-sm">
                                                          <i class="glyphicon glyphicon-cog"></i>
                                                                        </a>
                                                                </td>
                                                            </tr>
                                  </tbody>
                               </table>
                          
                          </div> 
                      </td>
                    </tr>
                                                                                                                    
                                    <tr>
                                                                <td>Scrum Master</td>
                                                                <td>Google</td>
                                                                <td>U$8.00000 </td>
                                                                <td> 2016/09/27</td>
                                                                <td> 2017/09/27</td>
                                                                <td> <a href="#" class="btn btn-default btn-sm">
                                                              <i class="glyphicon glyphicon-cog"></i>
                                                                        </a>
                                                                </td>
                                                            </tr>
                                                            
                                                                    
                                    <tr>
                                                                <td>Back-end</td>
                                                                <td>Google</td>
                                                                <td>U$8.00000 </td>
                                                                <td> 2016/09/27</td>
                                                                <td> 2017/09/27</td>
                                                                <td> <a href="#" class="btn btn-default btn-sm">
                                                              <i class="glyphicon glyphicon-cog"></i>
                                                                        </a>
                                                                </td>
                                                            </tr>
                                                            
                                                                    
                                    <tr>
                                                                <td>Front-end</td>
                                                                <td>Google</td>
                                                                <td>U$8.00000 </td>
                                                                <td> 2016/09/27</td>
                                                                <td> 2017/09/27</td>
                                                                <td> <a href="#" class="btn btn-default btn-sm">
                                                              <i class="glyphicon glyphicon-cog"></i>
                                                                        </a>
                                                                </td>
                                                            </tr>
                                            
                           
                                  </tbody>
                               </table>
                          
                          </div> 
                      </td>
                    </tr>
                  
                  
                        
                    <tr data-toggle="collapse" data-target="#demo2" class="accordion-toggle">
                         <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                         <td>Silvio</td>
                        <td>Santos</td>
                        <td>São Paulo</td>
                        <td>SP</td>
                      <td> new</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="hiddenRow"><div id="demo2" class="accordian-body collapse">Demo2</div></td>
                    </tr>
                    <tr data-toggle="collapse" data-target="#demo3" class="accordion-toggle">
                        <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                        <td>John</td>
                        <td>Doe</td>
                        <td>Dracena</td>
                        <td>SP</td>
                      <td> New</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="hiddenRow"><div id="demo3" class="accordian-body collapse">Demo3 sadasdasdasdasdas</div></td>
                    </tr>
                </tbody>
            </table>
                        </div>
                    
                      </div> 
                    
                  </div>
                </div>
                   




    @include('layouts.footer-scripts')

</body>

</html>
