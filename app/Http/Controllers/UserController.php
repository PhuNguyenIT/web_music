<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getDanhsach(){
      $user = User::all();
      return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getThem(){
      return view('admin.user.them');

    }

    public function postThem(Request $request){
      $this->validate($request,[
        'name'=>'required',
        'email'=> 'required|email|unique:users,email',
        'password'=>'required|min:3',
        'passwordAgain' => 'required|same:password'
      ],
      [
        'name.required'=>'Chưa nhập tên',
        'email.required'=>'Chưa nhập email',
        'email.email'=>'Email không đúng định dạng',
        'email.unique'=>'Email đã tồn tại',
        'password.required'=>'Chưa nhập password',
        'password.min'=>'password quá ngắn',
        'passwordAgain.required'=>'Chưa nhập lại password',
        'passwordAgain.same'=>'password nhập lại chưa khớp'
      ]);

      $user = new User;
      $user ->name = $request->name;
      $user ->email = $request->email;
      $user ->password = bcrypt($request->password);   //bcrypt: mã hóa pass
      $user ->quyen = $request ->quyen;

      if ($request->hasFile('Hinh')) {  //ktra có up hình or not
        $file = $request->file('Hinh');
        $duoi = $file->getClientOriginalExtension();  //lấy đuôi file
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
          return redirect('admin/user/them')->with('loi',' Chỉ được chọn file có phần mở rộng là jpg, jpeg, png');
        }
        $name = $file->getClientOriginalName();  //lấy tên hình nguyên bản
        $Hinh = str_random(4)."_".$name;  //tên hình khi save lại : "4 ký tự random" + "_" + name nguyên bản
        while (file_exists("upload/img/user".$Hinh)) {  //ktra đã tồn tại hình có tên tương tự chưa
          $Hinh = str_random(4)."_".$name;    //thì random tiếp
        }
        $file->move("upload/img/user",$Hinh);  // move hình đã upload vào folder upload/hinh, save vs tên đã xào nấu ở trên :3
        $user->avatar = $Hinh;
      }
      else {
        $user->Hinh = "";
      }

      $user->save();

      return redirect('admin/user/them')->with('thongbao','Thêm user thành công');
    }

    public function getSua($id){

    }

    public function postSua(Request $request, $id){

    }

    public function getXoa($id){
      $user = User::find($id);
      $user->delete();

      return redirect('admin/user/danhsach')->with('thongbao', 'Xóa thành công');
    }

    public function getdangnhapAdmin(){
      
    }

    public function postdangnhapAdmin(Request $request){
      
    }

    public function getdangxuatAdmin(){
      
    }
}
