@extends('kitchen.layouts')
@section('extra-css')

@endsection
@section('body-section')
<!-- BEGIN : Main Content-->
<div class="main-content">
  <div class="content-wrapper">
    <!--Statistics cards Starts-->

<div class="row">
  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
    <div class="card gradient-blackberry">
      <div class="card-content">
        <div class="card-body pt-2 pb-0">
          <div class="media">
            <div class="media-body white text-left">
              <h3 class="font-large-1 mb-0">4</h3>
              <span>Total Customer</span>
            </div>
            <div class="media-right white text-right">
              <i class="ft-users font-large-1"></i>
            </div>
          </div>
        </div>
        <div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
    <div class="card gradient-ibiza-sunset">
      <div class="card-content">
        <div class="card-body pt-2 pb-0">
          <div class="media">
            <div class="media-body white text-left">
              <h3 class="font-large-1 mb-0">0</h3>
              <span>Total Packages</span>
            </div>
            <div class="media-right white text-right">
              <i class="icon-bulb font-large-1"></i>
            </div>
          </div>
        </div>
        <div id="Widget-line-chart1" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
        </div>

      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
    <div class="card gradient-green-tea">
      <div class="card-content">
        <div class="card-body pt-2 pb-0">
          <div class="media">
            <div class="media-body white text-left">
              <h3 class="font-large-1 mb-0">50</h3>
              <span>Total Orders</span>
            </div>
            <div class="media-right white text-right">
              <i class="icon-graph font-large-1"></i>
            </div>
          </div>
        </div>
        <div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
    <div class="card gradient-pomegranate">
      <div class="card-content">
        <div class="card-body pt-2 pb-0">
          <div class="media">
            <div class="media-body white text-left">
              <h3 class="font-large-1 mb-0">0</h3>
              <span>Total Drivers</span>
            </div>
            <div class="media-right white text-right">
              <i class="icon-wallet font-large-1"></i>
            </div>
          </div>
        </div>
        <div id="Widget-line-chart3" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
        </div>
      </div>
    </div>
  </div>
</div>
<!--Statistics cards Ends-->


<div class="row match-height">
  
  <div class="col-xl-4 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-0">Top 5 Customers</h4>
      </div>
      <div class="card-content">
        <div class="card-body">

          <div class="media mb-1">
            <a>
              <img alt="96x96" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle" src="/app-assets/img/portrait/small/avatar-s-12.png">
            </a>
            <div class="media-body">
              <h4 class="font-medium-1 mt-1 mb-0">LRB INFO TECH</h4>
              <p class="text-muted font-small-3">987654398</p>
            </div>
            <div class="mt-1">
              <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                <input type="checkbox" class="custom-control-input" checked id="customcheckbox1">
                <label class="custom-control-label" for="customcheckbox1"></label>
              </div>

            </div>
          </div>

          <div class="media mb-1">
            <a>
              <img alt="96x96" class="media-object d-flex mr-3 bg-danger height-50 rounded-circle" src="/app-assets/img/portrait/small/avatar-s-11.png">
            </a>
            <div class="media-body">
              <h4 class="font-medium-1 mt-1 mb-0">ARAVIND</h4>
              <p class="text-muted font-small-3">987654321</p>
            </div>
            <div class="mt-1">
              <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                <input checked type="checkbox" class="custom-control-input" id="customcheckbox2">
                <label class="custom-control-label" for="customcheckbox2"></label>
              </div>

            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>


  <div class="col-xl-8 col-lg-12 col-12">
    <div class="card">
      <div class="card-header pb-2">
        <h4 class="card-title">Upcomming Delivery Packages</h4>
      </div>
      <div class="card-content">
        <table class="table table-responsive-sm text-center">
          <thead>
            <tr>
              <th>Package Name</th>
              <th>Date</th>
              <th>Breakfast Qty</th>
              <th>Lunch Qty</th>
              <th>Dinner Qty</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Epitome Meals</td>
              <td>{{date('d-m-Y')}}</td>
              <td>14</td>
              <td>5</td>
              <td>14</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



  </div>
</div>
<!-- END : End Main Content-->
@endsection
@section('extra-js')

@endsection