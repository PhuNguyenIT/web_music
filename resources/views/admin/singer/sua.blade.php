 @extends('admin.layout.index')

@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Singer
                            <small>Edit</small>
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

                        <form action="admin/singer/sua/{{$singer->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Name of Album</label>
                                <input class="form-control" name="name" placeholder="Enter Name of Album" value="{{$singer->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Images</label><br>
                                <img width="100px" src="upload/img/singer/{{$singer->img}}" alt=""/>
                                <input type="file" name="hinh">
                            </div>
                            <button type="submit" class="btn btn-default">Singer Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection