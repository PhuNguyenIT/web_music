@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Style
                    <small>Danh sách</small>
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
                        <th>Tên thể loại</th>
                        <th>Tên Không dấu</th>
                        
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($Style as $st)  <!--với mỗi thể loại lấy từ TheLoaiController -->
                    <tr class="odd gradeX" align="center">
                        <td>{{$st->id}}</td>
                        <td>{{$st->name}}</td>
                        <td>{{$st->short_name}}</td>
                        
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/style/xoa/{{$st->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/style/sua/{{$st->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
