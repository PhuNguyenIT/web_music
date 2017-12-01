@extends('admin.layout.index')

@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Song
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
                                <th>Image</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Singer as $si)
                            <tr class="even gradeC" align="center">
                                <td>{{$si->id}}</td>
                                <td>{{$si->name}}</td>
                                <td><div class="">
                          <img width="100px" src="upload/img/singer/{{$si->img}}" alt=""/>
                        </div></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/singer/xoa/{{$si->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/singer/sua/{{$si->id}}">Edit</a></td>
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