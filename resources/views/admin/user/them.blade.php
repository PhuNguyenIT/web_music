@extends('admin.layout.index')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
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
                <form action="admin/user/them" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Nhập họ tên" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập email" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập password" />
                    </div>
                    <div class="form-group">
                        <label>Re enter Password</label>
                        <input type="password" class="form-control" name="passwordAgain" placeholder="Nhập lại password" />
                    </div>
                    <div class="form-group">
                        <label>Phân quyền</label>
                        <label class="radio-inline">
                            <input name="quyen" value="0" type="radio" checked="">User
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="1" type="radio">Admin
                        </label>

                    </div>
                    <div class="form-group">
                      <label>Avatar</label>
                      <input type="file" name="Hinh" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
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

   
