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
                                <th>Short name</th>
                                <th>Singer</th>
                                <th>Listener number</th>
                             <!--    <th>Play </th> -->
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Song as $so)
                            <tr class="even gradeC" align="center">
                                <td>{{$so->id}}</td>
                                <td>{{$so->name}}</td>
                                <td>{{$so->short_name}}</td>
                                <td>
                                {{$so->Singer->name}}
                                </td>
                                <td>{{$so->count}}</td>

                               <!--  <td>
                                    <audio controls>
                                        <source src="upload/music/{{$so->sound}}" type="audio/ogg"/>
                                        <source src="upload/music/{{$so->sound}}" type="audio/mpeg">
                                    </audio>
                                </td>
 -->

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/song/xoa/{{$so->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/song/sua/{{$so->id}}">Edit</a></td>
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