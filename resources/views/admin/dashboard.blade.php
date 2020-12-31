@extends('admin.layouts')
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

  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
    <div class="card gradient-pomegranate">
      <div class="card-content">
        <div class="card-body pt-2 pb-0">
          <div class="media">
            <div class="media-body white text-left">
              <h3 class="font-large-1 mb-0">300 AED</h3>
              <span>Total Income</span>
            </div>
            <div class="media-right white text-right">
              <i class="icon-wallet font-large-1"></i>
            </div>
          </div>
        </div>
        <div class="height-75 WidgetlineChartshadow mb-2">
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
              <h3 class="font-large-1 mb-0">30</h3>
              <span>Today Breakfast</span>
            </div>
            <div class="media-right white text-right">
              <i class="icon-wallet font-large-1"></i>
            </div>
          </div>
        </div>
        <div class="height-75 WidgetlineChartshadow mb-2">
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
              <h3 class="font-large-1 mb-0">100</h3>
              <span>Total Lunch</span>
            </div>
            <div class="media-right white text-right">
              <i class="icon-wallet font-large-1"></i>
            </div>
          </div>
        </div>
        <div class="height-75 WidgetlineChartshadow mb-2">
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
              <h3 class="font-large-1 mb-0">60</h3>
              <span>Total Dinner</span>
            </div>
            <div class="media-right white text-right">
              <i class="icon-wallet font-large-1"></i>
            </div>
          </div>
        </div>
        <div class="height-75 WidgetlineChartshadow mb-2">
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
              <h4 class="font-medium-1 mt-1 mb-0">Jessica Rice</h4>
              <p class="text-muted font-small-3">UX Designer</p>
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
              <h4 class="font-medium-1 mt-1 mb-0">Jacob Rios</h4>
              <p class="text-muted font-small-3">HTML Developer</p>
            </div>
            <div class="mt-1">
              <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                <input type="checkbox" class="custom-control-input" id="customcheckbox2">
                <label class="custom-control-label" for="customcheckbox2"></label>
              </div>

            </div>
          </div>
          <div class="media mb-1">
            <a>
              <img alt="96x96" class="media-object d-flex mr-3 bg-success height-50 rounded-circle" src="/app-assets/img/portrait/small/avatar-s-3.png">
            </a>
            <div class="media-body">
              <h4 class="font-medium-1 mt-1 mb-0">Russell Delgado</h4>
              <p class="text-muted font-small-3">Database Designer</p>
            </div>
            <div class="mt-1">
              <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                <input type="checkbox" class="custom-control-input" id="customcheckbox3">
                <label class="custom-control-label" for="customcheckbox3"></label>
              </div>

            </div>
          </div>
          <div class="media mb-1">
            <a>
              <img alt="96x96" class="media-object d-flex mr-3 bg-warning height-50 rounded-circle" src="/app-assets/img/portrait/small/avatar-s-6.png">
            </a>
            <div class="media-body">
              <h4 class="font-medium-1 mt-1 mb-0">Sara McDonald</h4>
              <p class="text-muted font-small-3">Team Leader</p>
            </div>
            <div class="mt-1">
              <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                <input type="checkbox" class="custom-control-input" checked id="customcheckbox4">
                <label class="custom-control-label" for="customcheckbox4"></label>
              </div>

            </div>
          </div>
          <div class="media mb-1">
            <a>
              <img alt="96x96" class="media-object d-flex mr-3 bg-info height-50 rounded-circle" src="/app-assets/img/portrait/small/avatar-s-18.png">
            </a>
            <div class="media-body">
              <h4 class="font-medium-1 mt-1 mb-0">Janet Lucas</h4>
              <p class="text-muted font-small-3">Project Manger</p>
            </div>
            <div class="mt-1">
              <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                <input type="checkbox" class="custom-control-input" id="customcheckbox5">
                <label class="custom-control-label" for="customcheckbox5"></label>
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
        <h4 class="card-title">Top 5 Packages</h4>
      </div>
      <div class="card-content">
        <table class="table table-responsive-sm text-center">
          <thead>
            <tr>
              <th>Image</th>
              <th>Package Name</th>
              <th>Status</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><img class="media-object round-media height-50" src="/app-assets/img/elements/01.png" alt="Generic placeholder image" /></td>
              <td>Ferrero Rocher</td>
              <td>
                <a class="btn white btn-round btn-primary">Active</a>
              </td>
              <td>$19.94</td>
            </tr>
            <tr>
              <td><img class="media-object round-media height-50" src="/app-assets/img/elements/07.png" alt="Generic placeholder image" /></td>
              <td>Headphones</td>
              <td>
                <a class="btn white btn-round btn-danger">Disabled</a>
              </td>
              <td>$99.00</td>
            </tr>
            <tr>
              <td><img class="media-object round-media height-50" src="/app-assets/img/elements/11.png" alt="Generic placeholder image" /></td>
              <td>Camera</td>
              <td>
                <a class="btn white btn-round btn-info">Paused</a>
              </td>
              <td>$299.00</td>
            </tr>
            <tr>
              <td><img class="media-object round-media height-50" src="/app-assets/img/elements/14.png" alt="Generic placeholder image" /></td>
              <td>Beer</td>
              <td>
                <a class="btn white btn-round btn-success">Active</a>
              </td>
              <td>$24.51</td>
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