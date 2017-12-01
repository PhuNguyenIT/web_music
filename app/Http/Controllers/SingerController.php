<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Singer;

class SingerController extends Controller
{
    public function getDanhsach(){
      $Singer = Singer::all();       
      return view('admin.singer.danhsach',['Singer'=>$Singer]);  
    }

    public function getThem(){
    	return view('admin.singer.them');
    }

    public function postThem(Request $request){
    	$this->validate($request,[
    		'ten' => 'required|min:3|max:100'
    							],
    							[
    		'ten.required' => 'Chưa nhập tên album',
    		'ten.min' => 'Tên phải có ít nhất 3 ký tự',
    		'ten.max' => 'Độ dài tối đa là 100 ký tự',
    							]);
    	$Singer = new Singer;
    	$Singer->name = $request->ten;
    	

    	if ($request->hasFile('hinh')) {  //ktra có up hình or not
        $file = $request->file('hinh');
        $duoi = $file->getClientOriginalExtension();  //lấy đuôi file
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
          return redirect('admin/singer/them')->with('loi',' Chỉ được chọn file có phần mở rộng là jpg, jpeg, png');
        }
        $name = $file->getClientOriginalName();  //lấy tên hình nguyên bản
        $hinh = str_random(4)."_".$name;  //tên hình khi save lại : "4 ký tự random" + "_" + name nguyên bản
        while (file_exists("upload/img/singer/".$hinh)) {  //ktra đã tồn tại hình có tên tương tự chưa
          $hinh = str_random(4)."_".$name;    //thì random tiếp
        }
        $file->move("upload/img/singer/",$hinh);  // move hình đã upload vào folder upload/hinh, save vs tên đã xào nấu ở trên :3
        $Singer->img = $hinh;
      }
      else {
        $Singer->img = "";
      }

    $Singer->save();

    return redirect('admin/singer/them')->with('thongbao','Thêm thành công');
    }

    public function getXoa($id){
        $singer = Singer::find($id);
        $singer->delete();

      return redirect('admin/singer/danhsach')->with('thongbao', 'Xóa thành công');
    }

    public function getSua($id){
        $singer = Singer::find($id);  
        return view('admin.singer.sua',['singer'=>$singer]);
    }

    public function postSua(Request $request, $id){
        $singer = Singer::find($id);
        $this->validate($request,[
          'name' =>'required|min:3|max:100'
      ],
      [
          'name.required'=>'Chưa nhập tên singer',
          'name.min'=>'Tên quá ngắn',
          'name.max'=>'Tên quá dài'
      ]);

        $singer->name = $request->name;
    
        if ($request->hasFile('hinh')) {  //ktra có up hình or not
        $file = $request->file('hinh');
        $duoi = $file->getClientOriginalExtension();  //lấy đuôi file
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
          return redirect('admin/singer/sua')->with('loi',' Chỉ được chọn file có phần mở rộng là jpg, jpeg, png');
        }
        $name = $file->getClientOriginalName();  //lấy tên hình nguyên bản
        $Hinh = str_random(4)."_".$name;  //tên hình khi save lại : "4 ký tự random" + "_" + name nguyên bản
        while (file_exists("upload/img/singer/".$Hinh)) {  //ktra đã tồn tại hình có tên tương tự chưa
          $Hinh = str_random(4)."_".$name;    //thì random tiếp
        }
        $file->move("upload/img/singer/",$Hinh);  // move hình đã upload vào folder upload/hinh, save vs tên đã xào nấu ở trên :3
          unlink("upload/img/singer/".$singer->img);   //xóa hình cũ
        $singer->img = $Hinh;  //up hình ms
      }

      $singer->save();


      return redirect('admin/singer/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }
}
