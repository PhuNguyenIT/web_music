@extends('admin.layout.index')


@section('content')

<div class="container">


    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	
				  	<div class="panel-body">

				  		@if(count($errors) > 0)
			                   <div class="alert alert-danger">  <!--div đỏ  -->
			                     @foreach($errors->all() as $err)
			                      {{$err}}<br>
			                     @endforeach
			                  </div>
			              @endif

			              @if(session('thongbao'))
			                <div class="alert alert-success">
			                  {{session('thongbao')}}
			                </div>
			              @endif

				    	<form action="nguoidung" method="POST">
				    	<input type="hidden" name="_token" value="{{csrf_token()}}">
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Nhập tên mới" name="name" aria-describedby="basic-addon1">
							</div>
							
							
							<br>	
							<div>
								<input type="checkbox" class="" name="checkpassword" id="changePassword">
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled="" />
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled=""/>
							</div>
							<br>
							
							<button type="submit" class="btn btn-default">Sửa
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
@endsection

@section('script')
  <script>
    $(document).ready(function(){
      $("#changePassword").change(function(){       //sự kiện thay đổi
        if($(this).is(":checked"))  //nếu checkbox có checked (== cho phép changePassword)
        {
          $(".password").removeAttr('disabled');  // các class .password remove thuộc tính html disabled
        }
        else {
          $(".password").attr('disabled','');  //ko check thì add thuộc tính disabled
        }
      });
    });
  </script>
@endsection