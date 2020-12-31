@extends('page.app')
@section('extra-css')
<link href="/web_assets/css/listing.css" rel="stylesheet">
@endsection
@section('content')
<style>
/* Pagination */
ul.pagination {
  text-align: center;
  margin-top: 15px;
}
ul.pagination li {
  color: #333;
  display: inline-block;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  border-radius: 3px;
  margin: 0 2px;
}
ul.pagination li:hover {
  background-color: #f0f0f0;
}
ul.pagination li.active {
  background-color: #333;
  color: white;
}
</style>	
<main>
    <div class="page_header element_to_stick">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
                    <h1>Basic Meals Plan</h1>
                    <!-- <a href="#0">Change address</a> -->
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="search_bar_list">
                        <input type="text" class="form-control" placeholder="Dishes, restaurants or cuisines">
                        <button type="submit"><i class="icon_search"></i></button>
                    </div>
                </div>
            </div>
            <!-- /row -->		       
        </div>
    </div>
    <!-- /page_header -->

    <div class="container margin_30_20">			
        <div class="row">

            <div class="col-lg-12">
                <!-- <div class="row">
                    <div class="col-12">
                        <h2 class="title_small">Top Categories</h2>
                        <div class="owl-carousel owl-theme categories_carousel_in listing">
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_1.jpg" alt="" class="owl-lazy"></a>
                                    <a href="#0"><h3>Pizza</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_2.jpg" alt="" class="owl-lazy"></a>
                                    <a href="#0"><h3>Sushi</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_3.jpg" alt="" class="owl-lazy"></a>
                                    <a href="#0"><h3>Dessert</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_4.jpg" alt="" class="owl-lazy"></a>
                                    <a href="#0"><h3>Hamburgher</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_5.jpg" alt="" class="owl-lazy"></a>
                                    <a href="#0"><h3>Ice Cream</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_6.jpg" alt="" class="owl-lazy"></a>
                                    <a href="#0"><h3>Kebab</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_7.jpg" alt="" class="owl-lazy"></a>
                                    <a href="#0"><h3>Italian</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_8.jpg" alt="" class="owl-lazy"></a>
                                    <a href="#0"><h3>Chinese</h3></a>
                                </figure>
                            </div>	
                        </div>
                    </div>
                </div> -->
                <!-- /row -->

                <div class="promo">
                    <h3>Free Delivery for your first 14 days!</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                    <i class="icon-food_icon_delivery"></i>
                </div>
                <!-- /promo -->
                
                <div class="row">
                   <!--  <div class="col-12"><h2 class="title_small">Top Rated</h2></div> -->
                @foreach($food_package as $row)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                        <div class="strip">
                            <figure>
                                <!-- <span class="ribbon off">15% off</span> -->
                                <img src="/item_files/{{$row->image}}" data-src="/item_files/{{$row->image}}" class="img-fluid lazy" alt="">
                                <a href="/single-item/{{$row->id}}" class="strip_info">
                                    <small>{{$row->category_name_english}}</small>
                                    <div class="item_title">
                                        <h3>{{$row->package_title_english}}</h3>
                                        <!-- <small>27 Old Gloucester St</small> -->
                                    </div>
                                </a>
                            </figure>
                            <ul>
                                <li>
                                    <!-- <span class="take yes">Takeaway</span>  -->
                                    <span class="deliv yes">Free Delivery</span>
                                </li>
                                <li>
                                    <div class="score"><strong>8.9</strong></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
                </div>
                <!-- /row -->
                <center>{!! $food_package->links('page.pagination') !!}</center>
                <!-- <div class="pagination_fg">
                    <a href="#">&laquo;</a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">&raquo;</a>
                </div> -->
            </div>
            <!-- /col -->
        </div>		
    </div>
    <!-- /container -->
    
</main>
<!-- /main -->

@endsection
@section('extra-js')
    <script src="/web_assets/js/sticky_sidebar.min.js"></script>
    <script src="/web_assets/js/specific_listing.js"></script>
@endsection