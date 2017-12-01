@extends('admin.layout.index')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Singer
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">


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

                        <form action="admin/singer/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="ten" placeholder="Please Enter name of singer" />
                            </div>
                          
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="hinh">
                            </div>
                         
                            <button type="submit" class="btn btn-default">Singer Add</button>
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

   
