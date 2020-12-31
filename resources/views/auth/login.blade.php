@extends('page.app_home')
@section('extra-css')
<link href="/web_assets/css/submit.css" rel="stylesheet">
@endsection
@section('content')
<main>
    <div class="hero_single inner_pages background-image" data-background="url(/web_assets/img/home_section_2.jpg)">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h1>Login</h1>
                        <p>More bookings from diners around the corner</p>
                        <a href="#submit" class="btn_1 gradient btn_scroll">Submit Now</a>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <div class="wave hero"></div>
    </div>
    <!-- /hero_single -->

        <div class="container margin_30_20" id="submit">            
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="text-center add_bottom_15">
                        <span><em></em></span>
                        <h2>Customer login</h2>
                    </div>
                    <div id="message-register"></div>
                    <form method="post" action="{{ route('login') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                      
                        
                        <div class="form-group text-center">
                            <input type="submit" class="btn_1 gradient" value="Submit" id="submit-register">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /container -->
    
</main>
<!-- /main -->

@endsection
@section('extra-js')

    <script src="/web_assets/js/common_scripts.min.js"></script>
    <script src="/web_assets/js/common_func.js"></script>

<script type="text/javascript">

function Save(){
  var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/verify-customer',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            if(data.status == 400){
                toastr.error(data.message);
            }
            else{
                toastr.success(data.message);
                //$("#form")[0].reset();
                window.location.href = "/login";
            }
        }
    });
}
</script>
@endsection