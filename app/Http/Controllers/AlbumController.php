<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumController extends Controller
{
    public function getDanhsach(){
      $Album = Album::all();       
      return view('admin.album.danhsach',['Album'=>$Album]);  
    }

    public function getThem(){
    	return view('admin.album.them');
    }

    public function postThem(Request $request){
    	$this->validate($request,[
    		'ten' => 'required|min:3|max:100|unique:Album,name'
    							],
    							[
    		'ten.required' => 'Chưa nhập tên album',
    		'ten.min' => 'Tên phải có ít nhất 3 ký tự',
    		'ten.max' => 'Độ dài tối đa là 100 ký tự',
        'ten.unique' => 'Tên Album đã tồn tại'
    							]);
    	$Album = new Album;
    	$Album->name = $request->ten;
    	$Album->short_name = changeTitle($request->ten);

    	if ($request->hasFile('hinh')) {  //ktra có up hình or not
        $file = $request->file('hinh');
        $duoi = $file->getClientOriginalExtension();  //lấy đuôi file
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
          return redirect('admin/album/them')->with('loi',' Chỉ được chọn file có phần mở rộng là jpg, jpeg, png');
        }
        $name = $file->getClientOriginalName();  //lấy tên hình nguyên bản
        $hinh = str_random(4)."_".$name;  //tên hình khi save lại : "4 ký tự random" + "_" + name nguyên bản
        while (file_exists("upload/img/album/".$hinh)) {  //ktra đã tồn tại hình có tên tương tự chưa
          $hinh = str_random(4)."_".$name;    //thì random tiếp
        }
        $file->move("upload/img/album/",$hinh);  // move hình đã upload vào folder upload/hinh, save vs tên đã xào nấu ở trên :3
        $Album->img = $hinh;
      }
      else {
        $Album->img = "";
      }

    $Album->save();

    return redirect('admin/album/them')->with('thongbao','Thêm thành công');
    }

    public function getXoa($id){
        $album = Album::find($id);
        $album->delete();

      return redirect('admin/album/danhsach')->with('thongbao', 'Xóa thành công');
    }

    public function getSua($id){
        $album = Album::find($id);  
        return view('admin.album.sua',['album'=>$album]);
    }

    public function postSua(Request $request, $id){
        $album = Album::find($id);
        $this->validate($request,[
          'name' =>'required|unique:Album,name|min:3|max:100'
      ],
      [
          'name.required'=>'Chưa nhập tên album',
          'name.unique' =>'Tên đã tồn tại',
          'name.min'=>'Tên quá ngắn',
          'name.max'=>'Tên quá dài'
      ]);

        $album->name = $request->name;
        $album->short_name = changeTitle($request->name);


        if ($request->hasFile('hinh')) {  //ktra có up hình or not
        $file = $request->file('hinh');
        $duoi = $file->getClientOriginalExtension();  //lấy đuôi file
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
          return redirect('admin/theloai/sua')->with('loi',' Chỉ được chọn file có phần mở rộng là jpg, jpeg, png');
        }
        $name = $file->getClientOriginalName();  //lấy tên hình nguyên bản
        $Hinh = str_random(4)."_".$name;  //tên hình khi save lại : "4 ký tự random" + "_" + name nguyên bản
        while (file_exists("upload/theloai/".$Hinh)) {  //ktra đã tồn tại hình có tên tương tự chưa
          $Hinh = str_random(4)."_".$name;    //thì random tiếp
        }
        $file->move("upload/img/album/",$Hinh);  // move hình đã upload vào folder upload/hinh, save vs tên đã xào nấu ở trên :3
          unlink("upload/img/album/".$album->img);   //xóa hình cũ
        $album->img = $Hinh;  //up hình ms
      }

      $album->save();


      return redirect('admin/album/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }


}
