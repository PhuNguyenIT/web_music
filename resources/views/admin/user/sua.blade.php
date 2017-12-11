@extends('admin.layout.index')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{$user->name}}
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->


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

                    <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/user/sua/{{$user->id}}" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Nhập họ tên" value="{{$user->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập email" value="{{$user->email}}" readonly="" />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="changePassword" id="changePassword">
                        <label>Password</label>
                        <input type="password" class="form-control password" name="password" placeholder="Nhập password mới" disabled />
                    </div>
                    <div class="form-group">
                        <label>Re enter Password</label>
                        <input type="password" class="form-control password" name="passwordAgain" placeholder="Nhập lại password mới" disabled />
                    </div>
                    <div class="form-group">
                        <label>Phân quyền</label>
                        <label class="radio-inline">
                            <input name="quyen" value="0"
                            @if($user->quyen == 0)
                            {{"checked"}}
                            @endif
                             type="radio" checked="">User
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="1" 
                            @if($user->quyen == 1)
                            {{"checked"}}
                            @endif
                             type="radio">Admin
                        </label>

                    </div>
                    <div class="form-group">
                      <label>Avatar</label>
                      <input type="file" name="Hinh" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

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

   
