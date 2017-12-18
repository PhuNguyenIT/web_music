<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Singer;
use App\Style;
use App\User;
use App\Song;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

  function __construct(){
      // $theloai = TheLoai::all();

      // view()->share('theloai',$theloai);

      if(Auth::check()){
        view()->share('nguoidung',Auth::user());   //truyền biến ng dùng sang mọi view, biến lấy từ user đang đn = pthuc Auth
      }

    }
  
	function trangchu(){
		$newalbum = Album::orderBy('id','desc')->limit(15)->get();
		$newsinger = Singer::orderBy('id','desc')->limit(8)->get();
    $style = Style::all();
		return view('pages.trangchu',['newalbum'=>$newalbum,'newsinger'=>$newsinger,'style'=>$style]);
	}

	function album(){
		$album=Album::paginate(12);  
		return view('pages.album',['album'=>$album]);  
	}

	function singer(){
    $singer=Singer::paginate(24);
		return view('pages.singer',['singer'=>$singer]);
	}

	function contact(){
		return view('pages.contact');
	}

	function style(){
    $style=Style::paginate(24);
		return view('pages.style',['style'=>$style]);
	}

	function songalbum($id){
    $Album = Album::find($id);  //tìm album có id cần tìm
    $songsamealbum = Song::where('idAlbum',$Album->id)->limit(10)->get(); //tìm all song in cùng album

		return view('pages.songalbum',['songsamealbum'=>$songsamealbum,'Album'=>$Album]);
	}

  function songsinger($id){
    $Singer = Singer::find($id);  //tìm singer có id cần tìm
    $songsamesinger = Song::where('idSinger',$Singer->id)->limit(10)->get(); //tìm all song in cùng singer

    return view('pages.songsinger',['songsamesinger'=>$songsamesinger,'Singer'=>$Singer]);
  }

  function songstyle($id){
    $Style = Style::find($id);  //tìm style có id cần tìm
    $songsamestyle = Song::where('idStyle',$Style->id)->paginate(20); //tìm all song in cùng style

    return view('pages.songstyle',['songsamestyle'=>$songsamestyle,'Style'=>$Style]);
  }

	function getNguoiDung(){
    $user = Auth::user();
    return view('pages.nguoidung',['user'=>$user]);
  	}

  	function postNguoiDung(Request $request){
    $this->validate($request,[
        'name'=>'required'
      ],
      [
        'name.required'=>'Chưa nhập tên'
      ]);

      $user = Auth::user();
      $user ->name = $request->name;


      if($request->changePassword ==  "on"){
        $this->validate($request,[
          'password'=>'required|min:3',
          'passwordAgain' => 'required|same:password'
        ],
        [
          'password.required'=>'Chưa nhập password',
          'password.min'=>'password quá ngắn',
          'passwordAgain.required'=>'Chưa nhập lại password',
          'passwordAgain.same'=>'password nhập lại chưa khớp'
        ]);
          $user ->password = bcrypt($request->password);   //bcrypt: mã hóa pass
      }

      if ($request->hasFile('Hinh')) {  //ktra có up hình or not
        $file = $request->file('Hinh');
        $duoi = $file->getClientOriginalExtension();  //lấy đuôi file
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
          return redirect('nguoidung')->with('loi',' Chỉ được chọn file có phần mở rộng là jpg, jpeg, png');
        }
        $name = $file->getClientOriginalName();  //lấy tên hình nguyên bản
        $Hinh = str_random(4)."_".$name;  //tên hình khi save lại : "4 ký tự random" + "_" + name nguyên bản
        while (file_exists("upload/img/user".$Hinh)) {  //ktra đã tồn tại hình có tên tương tự chưa
          $Hinh = str_random(4)."_".$name;    //thì random tiếp
        }
        $file->move("upload/img/user",$Hinh);  // move hình đã upload vào folder upload/hinh, save vs tên đã xào nấu ở trên :3
        unlink("upload/img/user/".$user->avatar);   //xóa hình cũ
        $user->avatar = $Hinh;  //up hình ms
      }

      $user->save();

      return redirect('nguoidung')->with('thongbao','Sửa thành công');
  }

  function timkiem(Request $request){
    $tukhoa = $request->tukhoa;
    $ketqua = Song::where('name','like',"%$tukhoa%")->take(30)->paginate(10);
    return view('pages.timkiem',['tukhoa'=>$tukhoa,'ketqua'=>$ketqua]);
  }

    
}
