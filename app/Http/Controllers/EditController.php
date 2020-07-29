<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class EditController extends Controller
{

         //mypage edit画面へのログイン
         public function edit($id)
         {
         
            // ログインしていたら、mypage editを表示
             if (Auth::check()) {

              $user_data = User::find($id);
              if (is_null($user_data)) {
                return redirect()->action('BaseController@change');
              }
           
              return view('mypage/mypage_edit')->with(
                'input', [
                  'name' => $user_data->name,
                  'password' => $user_data->password,
                  'nickname' => $user_data->nickname,
                  'email' => $user_data->email,
                  'area' => $user_data->area,
                  'gender' => $user_data->gender,
                  'note' => $user_data->note,
                  'image' => $user_data->image,
                  'id' => $id
                ]);

                } else {
           // ログインしていなかったら、alert画面を表示
                  return view('alert/alert');
    
                }
         }



    public function editCheck(Request $request, $id)
         {
           
           $input = $request->all() + ['id' => $id];
          
           if ($request->hasFile('image')) {
           $request->image->storeAs('public/images', Auth::id() . '.jpg');
          
           $is_image = false;
           if (Storage::disk('local')->exists('public/images/' . Auth::id() . '.jpg')) {
            $is_image = true;
           }
           return view('mypage/mypage_edit_check')->with('input', $input)->with('is_image', $is_image);
          }
          
          else{

             $input = $request->all() + ['id' => $id]+ ['image' => NULL];
        
          return view('mypage/mypage_edit_check')->with('input', $input);
          }
         }


         public function editDone(Request $request, $id)
         {
         
           $user_record = User::find($id);
           $user_record->name = $request->name;
           $user_record->nickname  = $request->nickname;
           $user_record->gender = $request->gender;
           $user_record->area = $request->area; 
           $user_record->note = $request->note;
           $user_record->image = $request->image;
           $user_record->save();
     
           return redirect()->action('BaseController@mypage');
         
        }

        public function showChangePasswordForm() {
          return view('mypage/changepassword');
  
      }
      
      public function changePassword(Request $request) {
      
          //現在のパスワードと新しいパスワードが違っているかを調べる
          if(strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
              return redirect()->back()->with('change_password_error', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
          }
  
          //パスワードを変更
          $user = Auth::user();
          $user->password = bcrypt($request->get('new-password'));
          $user->save();
  
          return redirect()->back()->with('change_password_success', 'パスワードを変更しました。');
}

}