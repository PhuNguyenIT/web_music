 @extends('admin.layout.index')

@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
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

                        <form action="admin/song/sua/{{$song->id}}" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                            <div class="form-group">
                                <label>Choose Style</label>
                                <select class="form-control" name="Style">
                                  @foreach($style as $st)
                                    <option value="{{$st->id}}">{{$st->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Choose Album</label>
                                <select class="form-control" name="Album">
                                  @foreach($album as $al)
                                    <option value="{{$al->id}}">{{$al->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Choose Singer</label>
                                <select class="form-control" name="Singer">
                                  @foreach($singer as $si)
                                    <option value="{{$si->id}}">{{$si->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name of song</label>
                                <input class="form-control" name="Ten" placeholder="Input name" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="demo" class="form-control ckeditor" rows="3" name="TomTat"></textarea>
                            </div>
                            <div class="form-group">
                              <label>Sound</label>
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

@endsection