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
use App\Http\Requests\ClientWorksRequest;
use App\clientWorks;
use App\client;

class BaseController extends Controller
{

    private function csvworkcolmns()
    {
        $csvlist = array(
           
            'name' => '案件名',
            'price' => '月額報酬',
            'start' => '開発開始',
            'end' => '開発終了',
            'genre' => '業界',
            'add01' => '郵便番号',
            'add02' => '都道府県',
            'add03' => '以降住所',
            'remote' => 'リモート',
            'jobcontent' => '職務内容',
            'required_skill' => '必須スキル',
            'Welcome_skills' => '歓迎スキル',
            'note' => '勤務地情報・備考欄',
                    );
        return $csvlist;
    }
    
    public function downloadworks($id)
    {
        // 出力項目定義
        $csvlist = $this->csvworkcolmns(); //auth_information + profiles
    
        // ファイル名
        $filename = "auth_info_profiles_".date('Ymd').".csv";
    
        // 仮ファイルOpen
        $stream = fopen('php://temp', 'r+b');
    
        // *** ヘッダ行 ***
        $output = array();
    
        foreach($csvlist as $key => $value){
            $output[] = $value;
        }
    
        // CSVファイルを出力
        fputcsv($stream, $output);
    
        // *** データ行 ***
        $blocksize = 100; // QUERYする単位
        for($i=0 ; true ; $i++) {
            $query = Clientworks::query();
            $query->where('id','=',$id); //id指定
            $query->skip($i * $blocksize); // 取得開始位置
            $query->take($blocksize); // 取得件数を指定
            $lists = $query->get();
           //デバッグ
            //$list_sql = $query->toSql();
            //\Log::debug('$list_sql="' . $list_sql . '"');
    
            // レコードあるか？
            if ($lists->count() == 0) {
                break;
            }
    
            foreach ($lists as $list) {
                $output = array();
                foreach ($csvlist as $key => $value) {
                    $output[] = str_replace(array("\r\n", "\r", "\n"), '', $list->$key);
                }
                // CSVファイルを出力
                fputcsv($stream, $output);
            }
        }
    
        // ポインタの先頭へ
        rewind($stream);
    
        // 改行変換
        $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
    
        // 文字コード変換
        $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
    
        // header
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        );
    
        return \Response::make($csv, 200, $headers);
    }
    

    public function clientworkMore($id)
    {

         // ログインしていたら、mypageを表示
         if (Auth::check()) {
        
          $clientworkmore_data = clientworks::find($id)->user;
          
      
            $clientworkmore_data = clientworks::find($id);
            if (is_null($clientworkmore_data)) {
              return redirect()->action('BaseController@clientworkList');
            }

            return view('clientWorks/clientworkMore',compact('clientworkmore_data',))->with(
              'input', [
                'name' => $clientworkmore_data->name,
                'price' => $clientworkmore_data->price,
                'start' => $clientworkmore_data->start,
                'end' => $clientworkmore_data->end,
                'genre' => $clientworkmore_data->genre,
                'add01' => $clientworkmore_data->add01,
                'add02' => $clientworkmore_data->add02,
                'add03' => $clientworkmore_data->add03,
                'remote' => $clientworkmore_data->remote,
                'tool' => $clientworkmore_data->tool,
                'jobcontent' => $clientworkmore_data->jobcontent,
                'required_skill' => $clientworkmore_data->required_skill,
                'Welcome_skills' => $clientworkmore_data->Welcome_skills,
                'note' => $clientworkmore_data->note,
                'id' => $id,
              ]);

            } else {
                // ログインしていなかったら、alert画面を表示
                    return view('alert/alert');
        
                }
        
    }

    //client edit 画面へのログイン
    public function clientworkEdit($id)
    {
        
            $clientEdit_data = client::find($id);
            if (is_null($clientEdit_data)) {
              return redirect()->action('BaseController@clientList');
            }
        


            return view('client/clientEdit')->with(
              'input', [
              'name' => $clientEdit_data->name,
               'name_kana' => $clientEdit_data->name_kana,
               'email' => $clientEdit_data->email,
               'office_name' => $clientEdit_data->office_name,
               'add01' => $clientEdit_data->add01,
               'add02' => $clientEdit_data->add02,
               'add03' => $clientEdit_data->add03,
               'tel' => $clientEdit_data->tel,
               'url' => $clientEdit_data->url,
               'date' => $clientEdit_data->date,
               'genre' => $clientEdit_data->genre,
               'note' => $clientEdit_data->note,
               'id' => $id
               
              ]);
    }



    public function clientworkEditcheck(clientRequest $request, $id)
    {
      $input = $request->all() + ['id' => $id];
      return view('client/clientEditcheck')->with('input', $input);
    }

    public function clientworkEditdone(clientRequest $request, $id)
    {
     
       $clientEdit_record = client::find($id);
      $clientEdit_record->name = $request->name;
      $clientEdit_record->name_kana = $request->name_kana;
      $clientEdit_record->email  = $request->email ;
      $clientEdit_record->office_name = $request->office_name;
      $clientEdit_record->add01 = $request->add01;
      $clientEdit_record->add02 = $request->add02;
      $clientEdit_record->add03 = $request->add03;
      $clientEdit_record->tel = $request->tel;
      $clientEdit_record->url = $request->url;
      $clientEdit_record->date = $request->date;
      $clientEdit_record->genre = $request->genre;
      $clientEdit_record->note = $request->note;
     


      $clientEdit_record->save();
      
      //戻る場所を指定しておく↓

    return redirect()->action('BaseController@clientList');

  
   }

   
   //mypool delete 画面へのログイン

   public function clientworkDelete($id)
   {
     
       $disp_data = client::find($id);
       return view('client/client_delete')->with('data', $disp_data);
    
   }


   public function clientDeleteworkdone($id)
  {
     
      $delete_client = client::find($id);
      $delete_client->delete();
      return redirect()->action('BaseController@clientList');
   
  }



    public function clientworkList(Request $request) {

    
        $name = $request->input('name');
        $price = $request->input('price');
        $start = $request->input('start');
        $end = $request->input('end');
    
        $genre = $request->input('genre');
        $add01 = $request->input('add01');
        $add02 = $request->input('add02');
        $add03 = $request->input('add03');
        $remote = $request->input('remote');
        $tool = $request->input('tool');
        $jobcontent = $request->input('jobcontent');
        $required_skill = $request->input('required_skill');
        $Welcome_skills = $request->input('Welcome_skills');
        $note = $request->input('note');
       
        $query = Clientworks::query();

 
        if (!empty($name)) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        
        if (!empty($price)) {
            $query->where('tel', 'LIKE', "%{$price}%");
        }

        if (!empty($start)) {
            $query->where('start', 'LIKE', "%{$start}%");
        }
        
        if (!empty($end)) {
            $query->where('end', 'LIKE', "%{$end}%");
        }

        if (!empty($add02)) {
            $query->where('add02', 'LIKE', "%{$add02}%");
        }
 
       

        if (!empty($genre)) {
            $query->where('genre', 'LIKE', "%{$genre}%");
        }
 

        if (!empty($tool)) {
            $query->where('tool', 'LIKE', "%{$tool}%");
        }


        
        if (!empty($required_skill)) {
            $query->where('required_skill', 'LIKE', "%{$required_skill}%");
        }

        
        if (!empty($Welcome_skills)) {
            $query->where('Welcome_skills', 'LIKE', "%{$Welcome_skills}%");
        }
 
        $clientworkList = $query->get();
 
        return view('clientworkList/clientworkList', compact('clientworkList','name','price', 'start','end','genre','add01','add02','add03','remote','tool','jobcontent','required_skill','Welcome_skills','note'));

    }

    private function csvclientcolmns()
{
    $csvlist = array(
       
        'name' => '名前',
        'name_kana' => 'フリガナ',
        'email' => 'メールアドレス',
        'office_name' => '事業所名',
        'add01' => '所在地',
        'tel' => '電話番号',
        'url' => 'url',
        'add01' => '所在地',
        'date' => '契約締結日',
        'genre' => '職種',
        'note' => '備考欄',
    );
    return $csvlist;
}

public function downloadclient($id)
{
    // 出力項目定義
    $csvlist = $this->csvclientcolmns(); //auth_information + profiles

    // ファイル名
    $filename = "auth_info_profiles_".date('Ymd').".csv";

    // 仮ファイルOpen
    $stream = fopen('php://temp', 'r+b');

    // *** ヘッダ行 ***
    $output = array();

    foreach($csvlist as $key => $value){
        $output[] = $value;
    }

    // CSVファイルを出力
    fputcsv($stream, $output);

    // *** データ行 ***
    $blocksize = 100; // QUERYする単位
    for($i=0 ; true ; $i++) {
        $query = Client::query();
        $query->where('id','=',$id); //id指定
        $query->skip($i * $blocksize); // 取得開始位置
        $query->take($blocksize); // 取得件数を指定
        $lists = $query->get();
       //デバッグ
        //$list_sql = $query->toSql();
        //\Log::debug('$list_sql="' . $list_sql . '"');

        // レコードあるか？
        if ($lists->count() == 0) {
            break;
        }

        foreach ($lists as $list) {
            $output = array();
            foreach ($csvlist as $key => $value) {
                $output[] = str_replace(array("\r\n", "\r", "\n"), '', $list->$key);
            }
            // CSVファイルを出力
            fputcsv($stream, $output);
        }
    }

    // ポインタの先頭へ
    rewind($stream);

    // 改行変換
    $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));

    // 文字コード変換
    $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');

    // header
    $headers = array(
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="'.$filename.'"',
    );

    return \Response::make($csv, 200, $headers);
}

   public function clientWorks(clientWorksRequest $request) 

    {

        
              // ログインしていたら、mypageを表示
        if (Auth::check()) {

            $client_id = $request->input('client_id');

           

            //user_idとIDが一致したとき表示する。
           

  

            return view('clientWorks/clientWorks',compact('client_id'));
         } else {
        // ログインしていなかったら、alert画面を表示
            return view('alert/alert');

        }
    }
    public function clientWorksCheck(clientWorksRequest $request) 
    {
        
         
        return view('clientWorks/clientWorks_complete')->with('input', $request->all());;
        
    }

    public function clientWorksDone(clientWorksRequest $request)
    {
        $ClientWorks_record = new ClientWorks;

        $ClientWorks_record->name = $request->name;
        $ClientWorks_record->price = $request->price;
        $ClientWorks_record->start = $request->start;
        $ClientWorks_record->end = $request->end;
        $ClientWorks_record->genre = $request->genre;
        $ClientWorks_record->add01 = $request->add01;
        $ClientWorks_record->add02 = $request->add02;
        $ClientWorks_record->add03 = $request->add03;
        $ClientWorks_record->remote = $request->remote;
        $ClientWorks_record->tool = $request->tool;
        $ClientWorks_record->job_content= $request->jobcontent;
        $ClientWorks_record->required_skill = $request->required_skill;
        $ClientWorks_record->Welcome_skills = $request->Welcome_skills;
        $ClientWorks_record->note = $request->note;
        $ClientWorks_record->save();
    

        //戻る場所を指定しておく↓

      return redirect()->action('BaseController@clientList');

    }




    public function clientMore($id)
    {

         // ログインしていたら、mypageを表示
         if (Auth::check()) {
        
          $clientdata = client::find($id)->user;
          
      
            $client_data = client::find($id);
            if (is_null($client_data)) {
              return redirect()->action('BaseController@clientList');
            }

            return view('client/clientMore',compact('clientdata',))->with(
              'input', [
                'name' => $client_data->name,
                'name_kana' => $client_data->name_kana,
                'email' => $client_data->email,
                'office_name' => $client_data->office_name,
                'add01' => $client_data->add01,
                'add02' => $client_data->add02,
                'add03' => $client_data->add03,
                'tel' => $client_data->tel,
                'url' => $client_data->url,
                'date' => $client_data->date,
                'genre' => $client_data->genre,
                'tel' => $client_data->tel,
                'note' => $client_data->note,
                'id' => $id,
              ]);

            } else {
                // ログインしていなかったら、alert画面を表示
                    return view('alert/alert');
        
                }
        
    }

    //client edit 画面へのログイン
    public function clientEdit($id)
    {
        
            $clientEdit_data = client::find($id);
            if (is_null($clientEdit_data)) {
              return redirect()->action('BaseController@clientList');
            }
        


            return view('client/clientEdit')->with(
              'input', [
              'name' => $clientEdit_data->name,
               'name_kana' => $clientEdit_data->name_kana,
               'email' => $clientEdit_data->email,
               'office_name' => $clientEdit_data->office_name,
               'add01' => $clientEdit_data->add01,
               'add02' => $clientEdit_data->add02,
               'add03' => $clientEdit_data->add03,
               'tel' => $clientEdit_data->tel,
               'url' => $clientEdit_data->url,
               'date' => $clientEdit_data->date,
               'genre' => $clientEdit_data->genre,
               'note' => $clientEdit_data->note,
               'id' => $id
               
              ]);
    }



    public function clientEditcheck(clientRequest $request, $id)
    {
      $input = $request->all() + ['id' => $id];
      return view('client/clientEditcheck')->with('input', $input);
    }

    public function clientEditdone(clientRequest $request, $id)
    {
     
       $clientEdit_record = client::find($id);
      $clientEdit_record->name = $request->name;
      $clientEdit_record->name_kana = $request->name_kana;
      $clientEdit_record->email  = $request->email ;
      $clientEdit_record->office_name = $request->office_name;
      $clientEdit_record->add01 = $request->add01;
      $clientEdit_record->add02 = $request->add02;
      $clientEdit_record->add03 = $request->add03;
      $clientEdit_record->tel = $request->tel;
      $clientEdit_record->url = $request->url;
      $clientEdit_record->date = $request->date;
      $clientEdit_record->genre = $request->genre;
      $clientEdit_record->note = $request->note;
     


      $clientEdit_record->save();
      
      //戻る場所を指定しておく↓

    return redirect()->action('BaseController@clientList');

  
   }

   
   //mypool delete 画面へのログイン

   public function clientDelete($id)
   {
     
       $disp_data = client::find($id);
       return view('client/client_delete')->with('data', $disp_data);
    
   }


   public function clientDeletedone($id)
  {
     
      $delete_client = client::find($id);
      $delete_client->delete();
      return redirect()->action('BaseController@clientList');
   
  }

    public function create()
    {
      return view('clientList/clientList');
    }

 //クライアントリスト
 public function clientList(Request $request) {

    
        $name = $request->input('name');
        $add02 = $request->input('add02');
        $tel = $request->input('tel');
        $genre = $request->input('genre');
    
        $query = Client::query();

 
        if (!empty($name)) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        
        if (!empty($add02)) {
            $query->where('add02', 'LIKE', "%{$add02}%");
        }
 
        if (!empty($tel)) {
            $query->where('tel', 'LIKE', "%{$tel}%");
        }

        if (!empty($genre)) {
            $query->where('genre', 'LIKE', "%{$genre}%");
        }
 
 
        $clientList = $query->get();
 
        return view('clientList/clientList', compact('clientList','name','add02', 'tel','genre'));

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
        $client_record->add01 = $request->add01;
        $client_record->add02 = $request->add02;
        $client_record->add03 = $request->add03;
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