<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;            

class StyleController extends Controller
{
    public function getDanhsach(){
      $Style = Style::all();       
      return view('admin.style.danhsach',['Style'=>$Style]);  
    }

    public function getThem(){
      return view('admin.style.them');
    }

    public function postThem(Request $request){
       $this->validate($request,[
            'ten' => 'required|min:3|max:100'
                                ],
                                [
            'ten.required' => 'Chưa nhập tên style',
            'ten.min' => 'Tên phải có ít nhất 3 ký tự',
            'ten.max' => 'Độ dài tối đa là 100 ký tự',
                                ]);
        $style = new Style;
        $style->name = $request->ten;
        $style->short_name = changeTitle($request->ten);

        if ($request->hasFile('hinh')) {  //ktra có up hình or not
        $file = $request->file('hinh');
        $duoi = $file->getClientOriginalExtension();  //lấy đuôi file
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'gif'){
          return redirect('admin/style/them')->with('loi',' Chỉ được chọn file có phần mở rộng là jpg, jpeg, png');
        }
        $name = $file->getClientOriginalName();  //lấy tên hình nguyên bản
        $hinh = str_random(4)."_".$name;  //tên hình khi save lại : "4 ký tự random" + "_" + name nguyên bản
        while (file_exists("upload/img/style/".$hinh)) {  //ktra đã tồn tại hình có tên tương tự chưa
          $hinh = str_random(4)."_".$name;    //thì random tiếp
        }
        $file->move("upload/img/style/",$hinh);  // move hình đã upload vào folder upload/hinh, save vs tên đã xào nấu ở trên :3
        $style->img = $hinh;
      }
      else {
        $style->img = "";
      }

        $style->save();

    return redirect('admin/style/them')->with('thongbao','Thêm thành công'); 
    }

    public function getSua($id){
        $style = Style::find($id);
        return view('admin.style.sua',['style'=>$style]);
    }

    public function postSua(Request $request, $id){
        $style = Style::find($id);
         $this->validate($request,[
            'ten' => 'required|min:3|max:100'
                                ],
                                [
            'ten.required' => 'Chưa nhập tên style',
            'ten.min' => 'Tên phải có ít nhất 3 ký tự',
            'ten.max' => 'Độ dài tối đa là 100 ký tự',
                                ]);

        $style->name = $request->ten;
        $style->short_name = changeTitle($request->ten);

        if ($request->hasFile('hinh')) {  //ktra có up hình or not
        $file = $request->file('hinh');
        $duoi = $file->getClientOriginalExtension();  //lấy đuôi file
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
          return redirect('admin/style/sua')->with('loi',' Chỉ được chọn file có phần mở rộng là jpg, jpeg, png');
        }
        $name = $file->getClientOriginalName();  //lấy tên hình nguyên bản
        $hinh = str_random(4)."_".$name;  //tên hình khi save lại : "4 ký tự random" + "_" + name nguyên bản
        while (file_exists("upload/img/style/".$hinh)) {  //ktra đã tồn tại hình có tên tương tự chưa
          $hinh = str_random(4)."_".$name;    //thì random tiếp
        }
        $file->move("upload/img/style/",$hinh);  // move hình đã upload vào folder upload/hinh, save vs tên đã xào nấu ở trên :3
        unlink("upload/img/style/".$style->img);
        $style->img = $hinh;
      }
      else {
        $style->img = "";
      }

        $style->save();

    return redirect('admin/style/sua')->with('thongbao','Sửa thành công');

    }

    public function getXoa($id){
        $style = Style::find($id);
        $style->delete();

      return redirect('admin/style/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
