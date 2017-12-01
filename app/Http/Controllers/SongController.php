<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Album;
use App\Style;
use App\Singer;

class SongController extends Controller
{
    public function getDanhsach(){
      $Song = Song::all();
      
      return view('admin.song.danhsach',['Song'=>$Song]);  
    }

    public function getThem(){
        $album = Album::all();
        $style = Style::all();
        $singer = Singer::all();
        return view('admin.song.them',['album'=>$album,'style'=>$style,'singer'=>$singer]);
    }

    public function postThem(Request $request){
        $this->validate($request,[
        'Style'=>'required',
        'Album'=>'required',
        'Singer'=>'required',
        'Ten'=>'required|min:3|unique:Song,name',
      ],
      [
        'Style.required' => 'Chưa chọn thể loại ',
        'Album.required' => 'Chưa chọn Album ',
        'Singer.required' => 'Chưa chọn Singer ',
        'Ten.required'=>'Chưa nhập Tên',
        'Ten.min'=>'Tên bài hát quá ngắn',
        'Ten.unique'=>'Tên bài hát đã tồn tại',
      ]);

      $baihat = new Song;
      $baihat->name = $request->Ten;
      $baihat->short_name = changeTitle($request->Ten);
      $baihat->idStyle = $request->Style;
      $baihat->idAlbum = $request->Album;
      $baihat->idSinger = $request->Singer;
      $baihat->description = $request->Description;

      if ($request->hasFile('Hinh')) {  //ktra có up hình or not
        $file = $request->file('Hinh');
        $duoi = $file->getClientOriginalExtension();  //lấy đuôi file
        if($duoi != 'mp3'){
          return redirect('admin/song/them')->with('loi',' Chỉ được chọn file có phần mở rộng là mp3');
        }
        $name = $file->getClientOriginalName();  //lấy tên hình nguyên bản
        $Hinh = str_random(4)."_".$name;  //tên hình khi save lại : "4 ký tự random" + "_" + name nguyên bản
        while (file_exists("upload/music/".$Hinh)) {  //ktra đã tồn tại hình có tên tương tự chưa
          $Hinh = str_random(4)."_".$name;    //thì random tiếp
        }
        $file->move("upload/music",$Hinh);  // move hình đã upload vào folder upload/hinh, save vs tên đã xào nấu ở trên :3
        $baihat->sound = $Hinh;
      }
      else {
        $baihat->sound = "";
        // return redirect('admin/song/them')->with('loi','Phải chọn file sound');
      }

      $baihat->save();
      
      return redirect('admin/song/them')->with('thongbao','Thêm thành công');


    }

    public function getSua($id){
      $song = Song::find($id);
      $album = Album::all();
      $style = Style::all();
      $singer = Singer::all();  
      return view('admin.song.sua',['song'=>$song,'album'=>$album,'style'=>$style,'singer'=>$singer]);
    }

    public function postSua(Request $request, $id){
      $song = Song::find($id);

      $this->validate($request,[
        'Style'=>'required',
        'Album'=>'required',
        'Singer'=>'required',
        'Ten'=>'required|min:3|unique:Song,name',
      ],
      [
        'Style.required' => 'Chưa chọn thể loại ',
        'Album.required' => 'Chưa chọn Album ',
        'Singer.required' => 'Chưa chọn Singer ',
        'Ten.required'=>'Chưa nhập Tên',
        'Ten.min'=>'Tên bài hát quá ngắn',
        'Ten.unique'=>'Tên bài hát đã tồn tại',
      ]);


      $song->name = $request->Ten;
      $song->short_name = changeTitle($request->Ten);
      $song->idStyle = $request->Style;
      $song->idAlbum = $request->Album;
      $song->idSinger = $request->Singer;
      $song->description = $request->Description;


      if ($request->hasFile('Hinh')) {  //ktra có up hình or not
        $file = $request->file('Hinh');
        $duoi = $file->getClientOriginalExtension();  //lấy đuôi file
        if($duoi != 'mp3'){
          return redirect('admin/song/them')->with('loi',' Chỉ được chọn file có phần mở rộng là mp3');
        }
        $name = $file->getClientOriginalName();  //lấy tên hình nguyên bản
        $Hinh = str_random(4)."_".$name;  //tên hình khi save lại : "4 ký tự random" + "_" + name nguyên bản
        while (file_exists("upload/music/".$Hinh)) {  //ktra đã tồn tại hình có tên tương tự chưa
          $Hinh = str_random(4)."_".$name;    //thì random tiếp
        }
        $file->move("upload/music",$Hinh);  // move hình đã upload vào folder upload/hinh, save vs tên đã xào nấu ở trên :3
        unlink("upload/music/".$song->sound); 
        $song->sound = $Hinh;
      }
      else {
        $song->sound = "";
        // return redirect('admin/song/them')->with('loi','Phải chọn file sound');
      }

      $song->save();
      
      return redirect('admin/song/sua/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getXoa($id){
        $song = Song::find($id);
        $song->delete();

      return redirect('admin/song/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
