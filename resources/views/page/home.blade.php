@extends('page.app_home')
@section('extra-css')
<link href="/web_assets/css/home.css" rel="stylesheet">
<link href="{{asset('autocomplete/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')

<main>
    <div class="hero_single version_1">
        <div class="opacity-mask">
            <div class="container">
                <div class="row justify-content-lg-start justify-content-md-center">
                    <div class="col-xl-6 col-lg-8">
                        <h1>Delivery Food Delicious Have More Fun</h1>
                        <p>Crunch All You Want Make Fun Of Spicy & Hot Crispy </p>
                        <form id="form" action="/search-package" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="row no-gutters custom-search-input">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <input class="form-control no_border_r" type="text" id="autocomplete" name="autocomplete" placeholder="Search Food packages...">
                                        <input type="hidden" name="package_id" id="package_id">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn_1 gradient" type="submit">Search</button>
                                </div>
                            </div>
                            <!-- /row -->
                            <!-- <div class="search_trends">
                                <h5>Trending:</h5>
                                <ul>
                                    <li><a href="#0">Sushi</a></li>
                                    <li><a href="#0">Burgher</a></li>
                                    <li><a href="#0">Chinese</a></li>
                                    <li><a href="#0">Pizza</a></li>
                                </ul>
                            </div> -->
                        </form>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <div class="wave hero"></div>
    </div>
    <!-- /hero_single -->

    <div class="container margin_30_60">
        <div class="main_title center">
            <span><em></em></span>
            <h2>Popular Categories</h2>
            <p>Celebrate flavor. Celebrate life</p>
        </div>
        <!-- /main_title -->

            <div class="owl-carousel owl-theme carousel_4">
                @foreach($category as $row)
                <div class="item">
                    <div class="strip">
                        <figure>
                            <!-- <span class="ribbon off">40</span> -->
                            <img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" class="owl-lazy" alt="" width="460" height="310">
                            <a href="/item-list/{{$row->id}}" class="strip_info">
                                <small>40</small>
                                <div class="item_title">
                                    <h3>{{$row->category_name_english}}</h3>
                                </div>
                            </a>
                        </figure>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /carousel -->
    </div>
    <!-- /container -->

    <div class="bg_gray">
        <div class="container margin_60_40">
            <div class="main_title">
                <span><em></em></span>
                <h2>Basic Meals Plan</h2>
                <p>Delicious food on time</p>
                <a href="/item-list/16">View All &rarr;</a>
            </div>
            <div class="row add_bottom_25">
                <?php $row_count = 0; ?>
                @foreach($basic_plan as $key => $row)
                @if($row_count%2 == 0)
                <div class="col-lg-6">
                    <div class="list_home">
                        <ul>
                            <li>
                                <a href="/single-item/{{$row->id}}">
                                    <figure>
                                        <img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="" class="lazy">
                                    </figure>
                                    <div class="score"><strong>9.5</strong></div>
                                    <em>{{$row->category_name_english}}</em>
                                    <h3>{{$row->package_title_english}}</h3>
                                    <ul>
                                        <!-- <li><span class="ribbon off">-30%</span></li> -->
                                        <li>Price AED <?php $row->breakfast_price+ $row->lunch_price+ $row->dinner_price ?></li>
                                    </ul>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @else
                <div class="col-lg-6">
                    <div class="list_home">
                        <ul>
                            <li>
                                <a href="/single-item/{{$row->id}}">
                                    <figure>
                                        <img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" alt="" class="lazy">
                                    </figure>
                                    <div class="score"><strong>9.5</strong></div>
                                    <em>{{$row->category_name_english}}</em>
                                    <h3>{{$row->package_title_english}}</h3>
                                    <ul>
                                        <!-- <li><span class="ribbon off">-30%</span></li> -->
                                        <li>Price AED <?php $row->breakfast_price+ $row->lunch_price+ $row->dinner_price ?></li>
                                    </ul>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
                <?php $row_count++; ?>
                @endforeach
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /bg_gray -->

    <div class="bg_gray">
        <div class="container margin_60_40">

            <div class="banner lazy" data-bg="url(/web_assets/img/bannerimg-1.jpg)">
                <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                    <div>
                        <small>Bachelor Kitchen Delivery</small>
                        <h3>Basic meal plan</h3>
                        <p>We Bring The Good Basic meal plan To Life</p>
                        <a href="/item-list/16" class="btn_1 gradient">Start Now!</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /bg_gray -->

    <div class="container margin_30_60">
        <div class="main_title">
            <span><em></em></span>
            <h2>Diet Plan</h2>
            <p>Fresh, colorful, delicious</p>
            <a href="/item-list/17">View All</a>
        </div>

        <div class="owl-carousel owl-theme carousel_4">
                @foreach($diet_plan as $row)
                <div class="item">
                    <div class="strip">
                        <figure>
                            <img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" class="owl-lazy" alt="" width="460" height="310">
                            <a href="/single-item/{{$row->id}}" class="strip_info">
                                <small>{{$row->category_name_english}}</small>
                                <div class="item_title">
                                    <h3>{{$row->package_title_english}}</h3>
                                    <!-- <small>27 Old Gloucester St</small> -->
                                </div>
                            </a>
                        </figure>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /carousel -->
    </div>
    <!-- /container -->

    <!-- /row -->
    <div class="bg_gray">
        <div class="container margin_60_40">

            <div class="banner lazy" data-bg="url(/web_assets/img/bannerimg-3.jpg)">
                <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                    <div>
                        <small>Bachelor Kitchen</small>
                        <h3>Diet Plan</h3>
                        <p>Diet Plan In Our Restaurant Fills You Up Inside.</p>
                        <a href="/item-list/17" class="btn_1 gradient">Start Now!</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /bg_gray -->

    <div class="shape_element_2">
        <div class="container margin_60_0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box_how">
                                <figure><img src="/web_assets/img/lazy-placeholder-100-100-white.png" data-src="/web_assets/img/how_1.svg" alt="" width="150" height="167" class="lazy"></figure>
                                <h3>EASY TO ORDER</h3>
                                <p>Simply ordering for any menu, even with product options and combos by our websites & app.</p>
                            </div>
                            <div class="box_how">
                                <figure><img src="/web_assets/img/lazy-placeholder-100-100-white.png" data-src="/web_assets/img/how_2.svg" alt="" width="130" height="145" class="lazy"></figure>
                                <h3>QUICK SERVICE</h3>
                                <p>quickly prepare the meals immediately after a customer places an order. </p>
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <div class="box_how">
                                <figure><img src="/web_assets/img/lazy-placeholder-100-100-white.png" data-src="/web_assets/img/how_3.svg" alt="" width="150" height="132" class="lazy"></figure>
                                <h3>ENJOY YOUR FOOD</h3>
                                <p>Enjoying your food should be about choosing a variety of healthy foods and flavours that you like.</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-center mt-3 d-block d-lg-none"><a href="#0" class="btn_1 medium gradient pulse_bt mt-2">Register Now!</a></p>
                </div>
                <div class="col-lg-5 offset-lg-1 align-self-center">
                    <div class="intro_txt">
                        <div class="main_title">
                            <span><em></em></span>
                            <h2>Start Ordering Now</h2>
                        </div>
                        <p class="lead"> The Ordering.app will allow customers to order right from your website, Google Search, Google Maps and more.</p>
                        <p><a href="#0" class="btn_1 medium gradient pulse_bt mt-2">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /shape_element_2 -->

</main>
<!-- /main -->

@endsection
@section('extra-js')
<script src="{{ asset('autocomplete/jquery-ui.min.js') }}"></script>
<script>
$('.header').addClass('black_nav');


$(document).ready(function(){

  $( "#autocomplete" ).autocomplete({
    source: function( request, response ) {
      // Fetch data
      $.ajax({
        url:"/get-package",
        dataType: "json",
        data: request, 
        success: function( data ) {
            if(data.response == 'true') 
            {
                response(data.message);
            }
        }
      });
    },
    select: function (event, ui) {
        $(this).val(ui.item.label); 
        var package_id = ui.item.id; 
        $("#package_id").val(package_id); 
        // $.ajax({
        //     url : '/get-package/'+package_id,
        //     type: "GET",
        //     dataType: "JSON",
        //     success:function(response) {
        //         $("#package_id").val(response.id);    
        //     }
        // });
    }       
  });
});
</script>
@endsection