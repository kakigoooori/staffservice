<?php

namespace App\Http\Controllers;
use App\Http\Requests\PoolRequest;
use Illuminate\Http\Request;
use App\Model\Pool;
use App\User;
use App\Comment;
use App\Buy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Mail\Receive;
use App\Mail\Complete;
use App\Http\Requests\ClientRequest;
use App\client;

class BaseController extends Controller
{
 //検索画面
 public function clientList(Request $request) {




    $query = clientList::query();


    
    

    
    $clientlist = $query->get();

    return view('clientlist/clientlist', compact('clientlist'));

}





public function client() 

    {
                // 
                if (Auth::check()) {
                    return view('client/client');
                 } else {
                // ログインしていなかったら、Login画面を表示
                    return view('alert/alert');
        
                }
    }
    public function clientCheck(clientRequest $request) 
    {
        
         
        return view('client/clientcomplete')->with('input', $request->all());;
        
    }

    public function clientDone(clientRequest $request) 
    {
        $client_record = new Client;

        $client_record->name = $request->name;
        $client_record->name_kana = $request->name_kana;
        $client_record->email = $request->email;
        $client_record->office_name = $request->office_name;
        $client_record->address = $request->address;
        $client_record->tel = $request->tel;
        $client_record->url = $request->url;
        $client_record->date  = $request->date ;
        $client_record->genre = $request->genre;
        $client_record->note = $request->note;
        $client_record->save();
    

        //戻る場所を指定しておく↓

      return redirect()->action('BaseController@client');

    }


    //top画面
    public function getTop() {
        // 
        if (Auth::check()) {
            return view('client/client');
         } else {
        // ログインしていなかったら、Login画面を表示
            return view('alert/alert');

        return view('top/top');
    }
    }

     //alert画面
     public function alert() {
        return view('alert/alert');
    }

    
 
    //mypage top 画面へのログイン
    public function mypage()
    {
        
        // ログインしていたら、mypageを表示
        if (Auth::check()) {

            $like = User::find(Auth::id());

            return view('mypage/mypage',compact('like'));



         } else {
        // ログインしていなかったら、alert画面を表示
            return view('alert/alert');

        }
    }

    //mypage toukou 画面へのログイン
    public function mypagetoukou(Request $request)
    {
        
        // ログインしていたら、mypageを表示
        if (Auth::check()) {

            $user_id = $request->input('user_id');

            $query = Pool::query();

            //user_idとIDが一致したとき表示する。
            
            if (empty($user_id)) {
                $query->where('user_id', '=', (Auth::id()));
            }

            $search = $query->get();

            return view('mypage/mypage_toukou',compact('search','user_id'));
         } else {
        // ログインしていなかったら、alert画面を表示
            return view('alert/alert');

        }
    }


     //mypool edit 画面へのログイン
     public function mypoolEdit($id)
     {
         
             $mypool_data = Pool::find($id);
             if (is_null($mypool_data)) {
               return redirect()->action('BaseController@mypagetoukou');
             }
         
 
 
             return view('mypage/edit/mypool')->with(
               'input', [
               'work' => $mypool_data->work,
                'price' => $mypool_data->price,
                'genre' => $mypool_data->genre,
                'start' => $mypool_data->start,
                'end' => $mypool_data->end,
                'worknote' => $mypool_data->worknote,
                'user_id' => $mypool_data->user_id,
                'id' => $id
               ]);
     }
 
 
 
     public function mypoolEditcheck(PoolRequest $request, $id)
     {
       $input = $request->all() + ['id' => $id];
       return view('mypage/edit/mypool_check')->with('input', $input);
     }
 
     public function mypoolEditdone(PoolRequest $request, $id)
     {
      
        $mypool_record = Pool::find($id);
       $mypool_record->work = $request->work;
       $mypool_record->price = $request->price;
       $mypool_record->genre  = $request->genre ;
       $mypool_record->start = $request->start;
       $mypool_record->end = $request->end;
       $mypool_record->worknote = $request->worknote;
       $mypool_record->user_id = $request->user_id;
       $mypool_record->save();
       
       //戻る場所を指定しておく↓

     return redirect()->action('BaseController@mypagetoukou');

   
    }
 
    
    //mypool delete 画面へのログイン
 
    public function mypoolDelete($id)
    {
      
        $disp_data = Pool::find($id);
        return view('mypage/delete/mypool_delete')->with('data', $disp_data);
     
    }
 
 
    public function mypoolDeletedone($id)
   {
      
       $delete_user = Pool::find($id);
       $delete_user->delete();
       return redirect()->action('BaseController@mypagetoukou');
    
   }


        //mypage receive画面へのログイン
        public function mypagereceive()
        {
            
            // ログインしていたら、mypageを表示
            if (Auth::check()) {
                
                $query = Buy::select('id')->where('user_id',(Auth::id()))->get();

                $userreceives = Buy::find($query);
    
                $userreceive = [];
                foreach ($userreceives  as $v) {
                    $userreceive[] = $v->userreceive[0];
                }
    
                $pooldatas = Buy::find($query);
                // dd($pooldatas);
                $pooldata = [];
                foreach ($pooldatas as $v) {
                    $pooldata[] = $v->poolsent[0];
                }
    
                $buyids =Buy::find($query);
    
                $buyid = [];
                foreach($buyids as $v){
                    $buyid[] =$v;
                }

                return view('mypage/mypage_receive',compact('userreceive','pooldata','buyid'));
             } else {
            // ログインしていなかったら、alert画面を表示
                return view('alert/alert');
    
            }
        }

            //receive reaction 
    public function receivereaction(Request $request,$id)
    {
       
        $reaction = Buy::find($id);
        $reaction->reaction = $request->reaction;
        $reaction->save();

        $poolmail = Buy::find($id)->poolsent[0];
        $pooluser = Buy::find($id)->usersent[0];
        $usermail = Buy::find($id)->userreceive[0];
        Mail::to($usermail)->send(new Complete($usermail,$poolmail,$pooluser,$reaction));

        return redirect()->action('BaseController@mypagereceive');
     
    }


        //mypage send画面へのログイン
    public function mypagesend()
    {
        
        // ログインしていたら、mypageを表示
        if (Auth::check()) {

            
            $query = Buy::select('id')->where('login_id',(Auth::id()))->get();

            $userdatas = Buy::find($query);

            $userdata = [];
            foreach ($userdatas  as $v) {
                $userdata[] = $v->usersent[0];
            }

            $pooldatas = Buy::find($query);
            // dd($pooldatas);
            $pooldata = [];
            foreach ($pooldatas as $v) {
                $pooldata[] = $v->poolsent[0];
            }

            $buyids =Buy::find($query);

            $buyid = [];
            foreach($buyids as $v){
                $buyid[] =$v;
            }


            return view('mypage/mypage_send',compact('userdata','pooldata','buyid'));

         } else {
        // ログインしていなかったら、alert画面を表示
            return view('alert/alert');

        }
    }

    //sent 削除
    public function mypagesenddelete($id)
    {
       
        $delete_sent = Buy::find($id);
        $delete_sent->delete();
        return redirect()->action('BaseController@mypagesend');
     
    }

            //mypage change画面へのログイン
     public function mypagechange()
     {
     
        // ログインしていたら、mypageを表示
         if (Auth::check()) {
         $db_result = Auth::user();
         return view('mypage/mypage_change')->with('edit', $db_result);
           
         } else {
       // ログインしていなかったら、alert画面を表示
           return view('alert/alert');

         }
     }

        //mypage delete

         public function mypagedelete() {

            return view("mypage/delete");
        }

        public function delete() {

            $user = Auth::user();

            Auth::logout(); // ログアウト、update処理が行われる。

            $user->delete(); // ユーザが削除される。

            return view("mypage/delete_done");
        }


    

        //mypage profile画面へのログイン
        public function mypageprofile()
        {
            
            // ログインしていたら、mypageを表示
            if (Auth::check()) {
                return view('mypage/mypage_profile');
             } else {
            // ログインしていなかったら、alert画面を表示
                return view('alert/alert');
    
            }
        }

    //投稿画面
    public function getPool() 
    {
                // ログインしていたら、mypageを表示
                if (Auth::check()) {
                    return view('pool/pool');
                 } else {
                // ログインしていなかったら、Login画面を表示
                    return view('alert/alert');
        
                }
    }


    
    public function poolCheck(PoolRequest $request) 
    {
        return view('pool/poolcomplete')->with('input', $request->all());
    }

    public function poolDone(PoolRequest $request) 
    {
        $pool_record = new Pool;

        $pool_record->entryday = $request->entryday;
        $pool_record->nickname = $request->nickname;
        $pool_record->name = $request->name;
        $pool_record->phonetic = $request->phonetic;
        $pool_record->gender = $request->gender;
        $pool_record->year = $request->year;
        $pool_record->month = $request->month;
        $pool_record->day = $request->day;
        $pool_record->zip01 = $request->zip01;
        $pool_record->pref01 = $request->pref01;
        $pool_record->addr01 = $request->addr01;
        $pool_record->tel = $request->tel;
        $pool_record->mobiletel = $request->mobiletel;
        $pool_record->email = $request->email;
        $pool_record->mobilemail = $request->mobilemail;
        $pool_record->job = $request->job;
        $pool_record->judge = $request->judge;
        $pool_record->interviewday = $request->interviewday;
        $pool_record->start_time = $request->start_time;
        $pool_record->end_time = $request->end_time;
        $pool_record->place = $request->place;
        $pool_record->note = $request->note;
        $pool_record->save();
    

        //戻る場所を指定しておく↓

      return redirect()->action('BaseController@mypagetoukou');

    }



    //検索画面
    public function getSearch(Request $request) {


        $nickname = $request->input('nickname');
        $judge = $request->input('judge');
        $place = $request->input('place');
        $interviewday = $request->input('interviewday');
    
        $query = Pool::query();

 
        if (!empty($nickname)) {
            $query->where('nickname', 'LIKE', "%{$nickname}%");
        }
        
        if (!empty($judge)) {
            $query->where('judge', 'LIKE', "%{$judge}%");
        }
 
        if (!empty($place)) {
            $query->where('place', 'LIKE', "%{$place}%");
        }

        if (!empty($interviewday)) {
            $query->where('interviewday', 'LIKE', "%{$interviewday}%");
        }
 
 
        $search = $query->get();
 
        return view('search/search', compact('search','nickname','judge', 'place','interviewday'));

    }

    //商品ページ

    public function getProduct($id)
    {

         // ログインしていたら、mypageを表示
         if (Auth::check()) {
        
          $userdata = Pool::find($id)->user;
          $like = Pool::find($id);
      
            $Product_data = Pool::find($id);
            if (is_null($Product_data)) {
              return redirect()->action('BaseController@getSearch');
            }

            return view('Product/Product',compact('userdata','like'))->with(
              'input', [
                'entryday' => $Product_data->entryday,
                'nickname' => $Product_data->nickname,
                'name' => $Product_data->name,
                'phonetic' => $Product_data->phonetic,
                'gender' => $Product_data->gender,
                'year' => $Product_data->year,
                'month' => $Product_data->month,
                'day' => $Product_data->day,
                'zip01' => $Product_data->zip01,
                'pref01' => $Product_data->pref01,
                'addr01' => $Product_data->addr01,
                'tel' => $Product_data->tel,
                'mobiletel' => $Product_data->mobiletel,
                'email' => $Product_data->email,
                'mobilemail' => $Product_data->mobilemail,
                'job' => $Product_data->job,
                'judge' => $Product_data->judge,
                'interviewday' => $Product_data->interviewday,
                'start_time' => $Product_data->start_time,
                'end_time' => $Product_data->end_time,
                'place' => $Product_data->place,
                'note' => $Product_data->note,
                'id' => $id,
              ]);

            } else {
                // ログインしていなかったら、alert画面を表示
                    return view('alert/alert');
        
                }
        
    }


       // 申し込み完了画面
       public function ProductCheck (Request $request,$id)
       {

        $buy_record = new Buy;

         $buy_record->user_id = $request->user_id;
         $buy_record->login_id  = $request->login_id;
         $buy_record->pool_id = $request->pool_id;
         $buy_record->save();

        $poolmail = Pool::find($id);

        $usermail = Auth::user();
        Mail::to($usermail)->send(new Contact($usermail,$poolmail));


        $sellmail = Pool::find($id)->user[0];
        Mail::to($sellmail)->send(new Receive($sellmail,$poolmail));


        return view('Product/Product_check')->with('input', $request->all());
     
       }


     //プロフィールページ

     public function getProfile($id)
     {  

        $users = Auth::user();

        $pooldata  = User::find($id)->poolprofile;

        $Profile_data = User::find($id);
    
        return view('profile/profile',compact('pooldata','users'))->with(
            'input', [
              'nickname' => $Profile_data->nickname,
              'area' => $Profile_data->area,
              'gender' => $Profile_data->gender,
              'note' => $Profile_data->note,
              'id' => $id,
              'image' =>$Profile_data->image
            ]);
         
     }

  

               //mypage _chat 画面へのログイン
    public function mypagechat($id)
    {
        
        // ログインしていたら、表示
        if (Auth::check()) {

            $chatuser = User::find($id);

            $comments = Comment::get();
            return view('mypage/mypage_chat',compact('comments'))->with(
                'input', [
                  'nickname' => $chatuser->nickname,
                  'id' => $id,
                  ]);

         } else {
        // ログインしていなかったら、alert画面を表示
            return view('alert/alert');

        }
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        

        $comment = $request->input('comment');
        $bord_id = $request->input('bord_id');
        Comment::create([
            'login_id' => $user->id,
            'name' => $user->nickname,
            'comment' => $comment,
            'bord_id' =>  $bord_id
        ]);
        return back();
    }


 

}