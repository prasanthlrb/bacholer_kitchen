
@extends('page.app')
@section('extra-css')
<link href="/web_assets/css/detail-page.css" rel="stylesheet">
<link href="/web_assets/css/order-sign_up.css" rel="stylesheet">

@endsection
@section('content')
<style type="text/css">

.msger {
  display: flex;
  flex-flow: column wrap;
  justify-content: space-between;
  width: 100%;
  max-width: 867px;
  margin: 25px 10px;
  height: calc(100% - 50px);
  border: var(--border);
  border-radius: 5px;
  background: var(--msger-bg);
  box-shadow: 0 15px 15px -5px rgba(0, 0, 0, 0.2);
}

.msger-header {
  display: flex;
  justify-content: space-between;
  padding: 10px;
  border-bottom: var(--border);
  background: #eee;
  color: #666;
}

.msger-chat {
  flex: 1;
  overflow-y: auto;
  padding: 10px;
}
.msger-chat::-webkit-scrollbar {
  width: 6px;
}
.msger-chat::-webkit-scrollbar-track {
  background: #ddd;
}
.msger-chat::-webkit-scrollbar-thumb {
  background: #bdbdbd;
}
.msg {
  display: flex;
  align-items: flex-end;
  margin-bottom: 10px;
}
.msg:last-of-type {
  margin: 0;
}
.msg-img {
  width: 50px;
  height: 50px;
  margin-right: 10px;
  background: #ddd;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  border-radius: 50%;
}
.msg-bubble {
  max-width: 450px;
  padding: 15px;
  border-radius: 15px;
  background: var(--left-msg-bg);
}
.msg-info {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}
.msg-info-name {
  margin-right: 10px;
  font-weight: bold;
}
.msg-info-time {
  font-size: 0.85em;
}

.left-msg .msg-bubble {
  border-bottom-left-radius: 0;
}

.right-msg {
  flex-direction: row-reverse;
}
.right-msg .msg-bubble {
  background: var(--right-msg-bg);
  color: #000;
  border-bottom-right-radius: 0;
}
.right-msg .msg-img {
  margin: 0 0 0 10px;
}

.msger-inputarea {
  display: flex;
  padding: 10px;
  border-top: var(--border);
  background: #eee;
}
.msger-inputarea * {
  padding: 10px;
  border: none;
  border-radius: 3px;
  font-size: 1em;
}
.msger-input {
  flex: 1;
  background: #ddd;
}
.msger-send-btn {
  margin-left: 10px;
  background: rgb(0, 196, 65);
  color: #fff;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.23s;
}
.msger-send-btn:hover {
  background: rgb(0, 180, 50);
}

.msger-chat {
  background-color: #fcfcfe;
}

</style>
	<main class="bg_gray">
		<div class="container margin_60_20">
		    <div class="row justify-content-center">
		        <div class="col-xl-6 col-lg-8">
		        	<div class="box_order_form">
					    <div class="head">
					        <div class="title">
					            <h3>Chat To Admin</h3>
					        </div>
					    </div>
					    <!-- /head -->
					    <div class="main">
<section class="msger">

  <main class="msger-chat">
    

    
  </main>

  <form id="customer_form" method="post" class="msger-inputarea">
  	{{csrf_field()}}
  	<input type="hidden" value="{{$customer->id}}" name="customer_id" id="customer_id">
    <input id="customer_text" name="customer_text" type="text" class="msger-input" placeholder="Enter your message...">
    <button onclick="SalonChatSave()" type="button" class="msger-send-btn">Send</button>
  </form>
</section>
					    </div>
					</div>
		        </div>
		        <!-- /col -->
		        <div class="col-xl-4 col-lg-4" id="sidebar_fixed">
		            <div class="box_order">
		                <div class="head">
		                    <h3>MENU</h3>
		                </div>
		                <!-- /head -->
		                <div class="main">
		                	<ul class="clearfix">
		                	<li><a href="/customer/chat-to-admin">Chat To Admin</a></li>
				            	<li><a href="/customer/view-location">Update Location</a></li>
				            	<li><a href="/customer/view-profile">Update Profile</a></li>
				            	<li><a href="/customer/change-password">Change Password</a></li>
		                  </ul>
		                </div>
		            </div>
		            <!-- /box_booking -->
		        </div>

		    </div>
		    <!-- /row -->
		</div>
		<!-- /container -->
		
	</main>
	<!-- /main -->

	@endsection
@section('extra-js')
    <script src="/web_assets/js/sticky_sidebar.min.js"></script>
    <script src="/web_assets/js/specific_listing.js"></script>
    <script src="/web_assets/js/specific_detail.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script type="text/javascript">
Pusher.logToConsole = true;
var pusher = new Pusher('edfd9e5888422481e7d9', {
  cluster: 'ap2'
});
var channel = pusher.subscribe('<?php echo $customer->id; ?>');
channel.bind('chat-event', function(data) {
  console.log(data);
  viewChat(<?php echo $customer->id; ?>);
});

viewChat(<?php echo $customer->id; ?>);
function viewChat(id)
{
  $.ajax({
    url : '/customer/get-customer-chat/'+id,
    type: "GET",
    success: function(data)
    {
      $('.msger-chat').html(data.html);
    }
  });
}

function SalonChatSave(){
  //alert($("#service_id").val());
  var formData = new FormData($('#customer_form')[0]);
  $.ajax({
      url : '/customer/save-customer-chat',
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data)
      {
        console.log(data);                
        $("#customer_form")[0].reset();
        //$('.table').load(location.href+' .table');
        toastr.success('Chat Send Successfully', 'Successfully Update');
        //window.location.href="/vendor/coupon/";
        //viewChat(data);
      },
      error: function (data, errorThrown) {
        var errorData = data.responseJSON.errors;
        $.each(errorData, function(i, obj) {
          toastr.error(obj[0]);
        });
      }
  });
}
</script>
@endsection