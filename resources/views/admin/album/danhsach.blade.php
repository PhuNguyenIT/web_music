@extends('admin.layout.index')

@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Album
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    @if(session('thongbao'))
                      <div class="alert alert-success">
                        {{session('thongbao')}}
                      </div>
                    @endif


                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Short_name</th>
                                <th>Image</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Album as $Al)
                            <tr class="even gradeC" align="center">
                                <td>{{$Al->id}}</td>
                                <td>{{$Al->name}}</td>
                                <td>{{$Al->short_name}}</td>
                                <td><div class="">
                          <img width="100px" src="upload/img/album/{{$Al->img}}" alt=""/>
                        </div></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/album/xoa/{{$Al->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/album/sua/{{$Al->id}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection