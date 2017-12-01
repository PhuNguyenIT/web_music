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

        $style->save();

    return redirect('admin/style/them')->with('thongbao','Thêm thành công'); 
    }

    public function getSua($id){
      
    }

    public function postSua(Request $request, $id){
  
    }

    public function getXoa($id){
        $style = Style::find($id);
        $style->delete();

      return redirect('admin/style/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
