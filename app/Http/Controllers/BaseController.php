<?php

namespace App\Http\Controllers;
use App\Http\Requests\PoolRequest;
use Illuminate\Http\Request;
use App\Model\Pool;
use App\Model\Genuine;
use App\User;
use App\Skill;
use App\Salary;
use App\Family;
use App\Hope;
use App\Agreement;
use App\Memo;
use App\Comment;
use App\Buy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Mail\Receive;
use App\Mail\Complete;
use App\Http\Requests\clientRequest;
use Carbon\Carbon;

class BaseController extends Controller
{
public function client() 
    {
                // ログインしていたら、mypageを表示
                if (Auth::check()) {
                    return view('client/client');
                 } else {
                // ログインしていなかったら、Login画面を表示
                    return view('alert/alert');
        
                }
    }
    public function clientCheck(clientRequest $request) 
    {
        return view('client/clientcomplete')->with('input', $request->all());
    }

    public function clientDone(clientRequest $request) 
    {
        $client_record = new client;

        $client_record->name = $request->name;
        $client_record->email = $request->email;
        $client_record->area  = $request->area ;
        $client_record->genre = $request->genre;
        $client_record->note = $request->note;
        $client_record->save();
    

        //戻る場所を指定しておく↓

      return redirect()->action('BaseController@top');

    }


    //top画面
    public function getTop() {
        return view('top/top');
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



    //仮登録者 検索画面
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


        //本登録 検索画面
        public function mainSearch(Request $request) {

            $id = $request->input('id');
            $id2 = $request->input('id2');
            $name = $request->input('name');
            $phonetic = $request->input('phonetic');
            $gender = $request->input('gender');
            $age = $request->input('age');
            $age2 = $request->input('age2');
            $nickname = $request->input('nickname');
            $certification1 = $request->input('certification1');
            $pref01 = $request->input('pref01');
            $addr01 = $request->input('addr01');
            $station = $request->input('station');


        
            $query =Genuine::query();

            $query->Join('skill','genuine.id','=','skill.genuine_id')->select('genuine.*');

            if (!empty($id)) {
                $query->where('genuine_id', '>=', $id);
            }

            elseif (!empty($id2)) {
                $query->where('genuine_id', '<=', $id2);
            }
     
            if (!empty($name)) {
                $query->where('name', 'LIKE', "%{$name}%");
            }
            
            if (!empty($phonetic)) {
                $query->where('phonetic', 'LIKE', "%{$phonetic}%");
            }
     
            if (!empty($gender)) {
                $query->where('gender', 'LIKE', "%{$gender}%");
            }
    
            if (!empty($age)) {
                $query->where('age', '>=', $age);
            }

            elseif (!empty($age2)) {
                $query->where('age', '<=', $age2);
            }

            if (!empty($nickname)) {
                $query->where('nickname', 'LIKE', "%{$nickname}%");
            }

            if (!empty($certification1)) {
                $query->where('certification1', 'LIKE', "%{$certification1 }%");
            }

            if (!empty($pref01)) {
                $query->where('pref01', 'LIKE', "%{$pref01}%");
            }

            if (!empty($addr01)) {
                $query->where('addr01', 'LIKE', "%{$addr01}%");
            }

            if (!empty($station)) {
                $query->where('station', 'LIKE', "%{$station}%");
            }
     
     
            $search = $query->get();

        
     
            return view('search/mainsearch', compact('search','id','id2','name','phonetic', 'gender','age','age2','nickname','certification1','pref01','addr01','station'));
    
        }


        private function csvcolmns()
        {
            $csvlist = array(
                'name' => '名前',
                'nickname' => '担当者',
            );
            return $csvlist;
        }

        
public function download1(Request $request)
{
    $id = $request->input('id');
    $id2 = $request->input('id2');
    $name = $request->input('name');
    $phonetic = $request->input('phonetic');
    $gender = $request->input('gender');
    $age = $request->input('age');
    $age2 = $request->input('age2');
    $nickname = $request->input('nickname');
    $certification1 = $request->input('certification1');
    $pref01 = $request->input('pref01');
    $addr01 = $request->input('addr01');
    $station = $request->input('station');

    // 出力項目定義
    $csvlist = $this->csvcolmns(); //auth_information + profiles

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
        $query = Genuine::query();
        $query->Join('skill','genuine.id','=','skill.genuine_id'); //内部結合

        if (!empty($id)) {
            $query->where('genuine_id', '>=', $id);
        }

        elseif (!empty($id2)) {
            $query->where('genuine_id', '<=', $id2);
        }
 
        if (!empty($name)) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        
        if (!empty($phonetic)) {
            $query->where('phonetic', 'LIKE', "%{$phonetic}%");
        }
 
        if (!empty($gender)) {
            $query->where('gender', 'LIKE', "%{$gender}%");
        }

        if (!empty($age)) {
            $query->where('age', '>=', $age);
        }

        elseif (!empty($age2)) {
            $query->where('age', '<=', $age2);
        }

        if (!empty($nickname)) {
            $query->where('nickname', 'LIKE', "%{$nickname}%");
        }

        if (!empty($certification1)) {
            $query->where('certification1', 'LIKE', "%{$certification1 }%");
        }

        if (!empty($pref01)) {
            $query->where('pref01', 'LIKE', "%{$pref01}%");
        }

        if (!empty($addr01)) {
            $query->where('addr01', 'LIKE', "%{$addr01}%");
        }

        if (!empty($station)) {
            $query->where('station', 'LIKE', "%{$station}%");
        }

        $query->orderBy('genuine.id');
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


        
        


    //本登録ページ

    public function getProduct($id)
    {

         // ログインしていたら、mypageを表示
         if (Auth::check()) {
        
            $Product_data = Pool::find($id);
            if (is_null($Product_data)) {
              return redirect()->action('BaseController@getSearch');
            }


            return view('Product/Product')->with(
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

    public function productDone(Request $request) 
    {
        $genuine_record = new Genuine;

        $genuine_record->entryday = $request->entryday;
        $genuine_record->name = $request->name;
        $genuine_record->phonetic = $request->phonetic;
        $genuine_record->gender = $request->gender;
        $genuine_record->consort = $request->consort;
        $genuine_record->parent = $request->parent;
        $genuine_record->year = $request->year;
        $genuine_record->month = $request->month;
        $genuine_record->day = $request->day;
        $genuine_record->age = $request->age;
        $genuine_record->zip01 = $request->zip01;
        $genuine_record->pref01 = $request->pref01;
        $genuine_record->addr01 = $request->addr01;
        $genuine_record->line = $request->line;
        $genuine_record->station = $request->station;
        $genuine_record->tel = $request->tel;
        $genuine_record->mobiletel = $request->mobiletel;
        $genuine_record->email = $request->email;
        $genuine_record->mobilemail = $request->mobilemail;
        $genuine_record->emergencytel = $request->emergencytel;
        $genuine_record->joincompany = $request->joincompany;
        $genuine_record->save();

        $skill_recode = new Skill;
        $skill_recode->genuine_id = $genuine_record->id;
        $skill_recode->nickname = $request->nickname;
        $skill_recode->performance1 = $request->performance1;
        $skill_recode->performance2 = $request->performance2;
        $skill_recode->performance3 = $request->performance3;
        $skill_recode->performance4 = $request->performance4;
        $skill_recode->performance5 = $request->performance5;
        $skill_recode->rank = $request->rank;
        $skill_recode->score = $request->score;
        $skill_recode->pc = $request->pc;
        $skill_recode->manners = $request->manners;
        $skill_recode->sensible = $request->sensible;
        $skill_recode->certification1 = $request->certification1;
        $skill_recode->learn1 = $request->learn1;
        $skill_recode->certification2 = $request->certification2;
        $skill_recode->learn2 = $request->learn2;
        $skill_recode->certification3 = $request->certification3;
        $skill_recode->learn3 = $request->learn3;
        $skill_recode->certification4 = $request->certification4;
        $skill_recode->learn4 = $request->learn4;
        $skill_recode->certification5 = $request->certification5;
        $skill_recode->learn5 = $request->learn5;
        $skill_recode->skill1 = $request->skill1;
        $skill_recode->skill2 = $request->skill2;
        $skill_recode->skill3 = $request->skill3;
        $skill_recode->note = $request->note;
        $skill_recode->save();

        $salary_recode = new Salary;
        $salary_recode->genuine_id = $genuine_record->id;
        $salary_recode->basic = $request->basic;
        $salary_recode->allowance = $request->allowance;
        $salary_recode->insurance = $request->insurance;
        $salary_recode->mynumber = $request->mynumber;
        $salary_recode->bankname = $request->bankname;
        $salary_recode->storename = $request->storename;
        $salary_recode->account_number = $request->account_number;
        $salary_recode->account_name = $request->account_name;
        $salary_recode->note = $request->note;
        $salary_recode->save();

        
        $family_recode = new Family;
        $family_recode->genuine_id = $genuine_record->id;
        $family_recode->consort = $request->consort;
        $family_recode->parent = $request->parent;
        $family_recode->children = $request->children;
        $family_recode->children2 = $request->children2;
        $family_recode->children3 = $request->children3;
        $family_recode->note = $request->note;
        $family_recode->save();

        
        $hope_recode = new Hope;
        $hope_recode->genuine_id = $genuine_record->id;
        $hope_recode->job = $request->job;
        $hope_recode->place = $request->place;
        $hope_recode->industry = $request->industry;
        $hope_recode->annual_income = $request->annual_income;
        $hope_recode->startday = $request->startday;
        $hope_recode->priority1 = $request->priority1;
        $hope_recode->priority2 = $request->priority2;
        $hope_recode->priority3 = $request->priority3;
        $hope_recode->note = $request->note;
        $hope_recode->save();

        
        $salary_recode = new Agreement;
        $salary_recode->genuine_id = $genuine_record->id;
        $salary_recode->contract = $request->contract;
        $salary_recode->place = $request->place;
        $salary_recode->time = $request->time;
        $salary_recode->break = $request->break;
        $salary_recode->overtime = $request->overtime;
        $salary_recode->holiday = $request->holiday;
        $salary_recode->paid = $request->paid;
        $salary_recode->other = $request->other;
        $salary_recode->note = $request->note;
        $salary_recode->save();

        $memo_recode = new Memo;
        $memo_recode->genuine_id = $genuine_record->id;
        $memo_recode->note = $request->note;
        $memo_recode->save();
    

        //戻る場所を指定しておく↓

       return redirect()->action('BaseController@getgenuine', ['id' => $genuine_record->id])->with('success', '更新が完了しました。');

    }


    public function getsalary($id)
    {

         // ログインしていたら、mypageを表示
         if (Auth::check()) {
        
          
      
            $salary_data = Genuine::find($id);
            if (is_null($salary_data)) {
                return back()->with('success', '基本情報を記入し更新を押してください。');
            }


            return view('Product/salary')->with(
              'input', [
                'entryday' => $salary_data->entryday,
                'name' => $salary_data->name,
                'phonetic' => $salary_data->phonetic,
                'gender' => $salary_data->gender,
                'consort' => $salary_data->consort,
                'parent' => $salary_data->parent,
                'year' => $salary_data->year,
                'month' => $salary_data->month,
                'day' => $salary_data->day,
                'age' => $salary_data->age,
                'zip01' => $salary_data->zip01,
                'pref01' => $salary_data->pref01,
                'addr01' => $salary_data->addr01,
                'line' => $salary_data->line,
                'station' => $salary_data->station,
                'tel' => $salary_data->tel,
                'mobiletel' => $salary_data->mobiletel,
                'email' => $salary_data->email,
                'mobilemail' => $salary_data->mobilemail,
                'emergencytel' => $salary_data->emergencytel,
                'joincompany' => $salary_data->joincompany,
                'id' => $id,
              ]);
              

            } else {
                // ログインしていなかったら、alert画面を表示
                    return view('alert/alert');
        
                }
        
     }

     public function salarydone(Request $request, $id)
     {
 
         $salary = Genuine::find($id)->salary;
  
         foreach ($salary as $v) {
                       
             $salary_recode =Salary::find($v->id);
         }
 
 
         $salary_recode->basic = $request->basic;
         $salary_recode->allowance = $request->allowance;
         $salary_recode->insurance = $request->insurance;
         $salary_recode->mynumber = $request->mynumber;
         $salary_recode->bankname = $request->bankname;
         $salary_recode->storename = $request->storename;
         $salary_recode->account_number = $request->account_number;
         $salary_recode->account_name = $request->account_name;
         $salary_recode->note = $request->note;
         $salary_recode->save();

         $genuine_record = Genuine::find($id);
         $genuine_record->entryday = $request->entryday;
         $genuine_record->name = $request->name;
         $genuine_record->phonetic = $request->phonetic;
         $genuine_record->gender = $request->gender;
         $genuine_record->consort = $request->consort;
         $genuine_record->parent = $request->parent;
         $genuine_record->year = $request->year;
         $genuine_record->month = $request->month;
         $genuine_record->day = $request->day;
         $genuine_record->age = $request->age;
         $genuine_record->zip01 = $request->zip01;
         $genuine_record->pref01 = $request->pref01;
         $genuine_record->addr01 = $request->addr01;
         $genuine_record->line = $request->line;
         $genuine_record->station = $request->station;
         $genuine_record->tel = $request->tel;
         $genuine_record->mobiletel = $request->mobiletel;
         $genuine_record->email = $request->email;
         $genuine_record->mobilemail = $request->mobilemail;
         $genuine_record->emergencytel = $request->emergencytel;
         $genuine_record->joincompany = $request->joincompany;
         $genuine_record->save();
   
         return redirect()->action('BaseController@getgenuine', ['id' => $id])->with('success', '更新が完了しました。');
         
     }


    public function getgenuine($id)
    {

         // ログインしていたら、mypageを表示
         if (Auth::check()) {
        
            $skilldata = Genuine::find($id)->skill;
      
            $genuine_data = Genuine::find($id);
            if (is_null($genuine_data)) {
                return back()->with('success', '基本情報を記入し更新を押してください。');
            }

            return view('Product/genuine',compact('skilldata',))->with(
              'input', [
                'entryday' => $genuine_data->entryday,
                'name' => $genuine_data->name,
                'phonetic' => $genuine_data->phonetic,
                'gender' => $genuine_data->gender,
                'consort' => $genuine_data->consort,
                'parent' => $genuine_data->parent,
                'year' => $genuine_data->year,
                'month' => $genuine_data->month,
                'day' => $genuine_data->day,
                'age' => $genuine_data->age,
                'zip01' => $genuine_data->zip01,
                'pref01' => $genuine_data->pref01,
                'addr01' => $genuine_data->addr01,
                'line' => $genuine_data->line,
                'station' => $genuine_data->station,
                'tel' => $genuine_data->tel,
                'mobiletel' => $genuine_data->mobiletel,
                'email' => $genuine_data->email,
                'mobilemail' => $genuine_data->mobilemail,
                'emergencytel' => $genuine_data->emergencytel,
                'joincompany' => $genuine_data->joincompany,
                'id' => $id,
              ]);
              

            } else {
                // ログインしていなかったら、alert画面を表示
                    return view('alert/alert');
        
                }
        
    }

    public function skilldone(Request $request, $id)
    {

        $skill = Genuine::find($id)->skill;
 
        foreach ($skill as $v) {
                      
            $skill_recode =Skill::find($v->id);
        }


        $skill_recode->nickname = $request->nickname;
        $skill_recode->performance1 = $request->performance1;
        $skill_recode->performance2 = $request->performance2;
        $skill_recode->performance3 = $request->performance3;
        $skill_recode->performance4 = $request->performance4;
        $skill_recode->performance5 = $request->performance5;
        $skill_recode->rank = $request->rank;
        $skill_recode->score = $request->score;
        $skill_recode->pc = $request->pc;
        $skill_recode->manners = $request->manners;
        $skill_recode->sensible = $request->sensible;
        $skill_recode->certification1 = $request->certification1;
        $skill_recode->learn1 = $request->learn1;
        $skill_recode->certification2 = $request->certification2;
        $skill_recode->learn2 = $request->learn2;
        $skill_recode->certification3 = $request->certification3;
        $skill_recode->learn3 = $request->learn3;
        $skill_recode->certification4 = $request->certification4;
        $skill_recode->learn4 = $request->learn4;
        $skill_recode->certification5 = $request->certification5;
        $skill_recode->learn5 = $request->learn5;
        $skill_recode->skill1 = $request->skill1;
        $skill_recode->skill2 = $request->skill2;
        $skill_recode->skill3 = $request->skill3;
        $skill_recode->note = $request->note;
        $skill_recode->save();

        $genuine_record = Genuine::find($id);
        $genuine_record->entryday = $request->entryday;
        $genuine_record->name = $request->name;
        $genuine_record->phonetic = $request->phonetic;
        $genuine_record->gender = $request->gender;
        $genuine_record->consort = $request->consort;
        $genuine_record->parent = $request->parent;
        $genuine_record->year = $request->year;
        $genuine_record->month = $request->month;
        $genuine_record->day = $request->day;
        $genuine_record->age = $request->age;
        $genuine_record->zip01 = $request->zip01;
        $genuine_record->pref01 = $request->pref01;
        $genuine_record->addr01 = $request->addr01;
        $genuine_record->line = $request->line;
        $genuine_record->station = $request->station;
        $genuine_record->tel = $request->tel;
        $genuine_record->mobiletel = $request->mobiletel;
        $genuine_record->email = $request->email;
        $genuine_record->mobilemail = $request->mobilemail;
        $genuine_record->emergencytel = $request->emergencytel;
        $genuine_record->joincompany = $request->joincompany;
        $genuine_record->save();
  
        return redirect()->action('BaseController@getgenuine', ['id' => $id])->with('success', '更新が完了しました。');
        
    }


    public function getfamily($id)
    {

         // ログインしていたら、mypageを表示
         if (Auth::check()) {
        
            $skilldata = Genuine::find($id)->family;
      
            $genuine_data = Genuine::find($id);
            if (is_null($genuine_data)) {
                return back()->with('success', '基本情報を記入し更新を押してください。');
            }

            return view('Product/family',compact('skilldata',))->with(
              'input', [
                'entryday' => $genuine_data->entryday,
                'name' => $genuine_data->name,
                'phonetic' => $genuine_data->phonetic,
                'gender' => $genuine_data->gender,
                'consort' => $genuine_data->consort,
                'parent' => $genuine_data->parent,
                'year' => $genuine_data->year,
                'month' => $genuine_data->month,
                'day' => $genuine_data->day,
                'age' => $genuine_data->age,
                'zip01' => $genuine_data->zip01,
                'pref01' => $genuine_data->pref01,
                'addr01' => $genuine_data->addr01,
                'line' => $genuine_data->line,
                'station' => $genuine_data->station,
                'tel' => $genuine_data->tel,
                'mobiletel' => $genuine_data->mobiletel,
                'email' => $genuine_data->email,
                'mobilemail' => $genuine_data->mobilemail,
                'emergencytel' => $genuine_data->emergencytel,
                'joincompany' => $genuine_data->joincompany,
                'id' => $id,
              ]);
              

            } else {
                // ログインしていなかったら、alert画面を表示
                    return view('alert/alert');
        
                }
        
     }

     public function familydone(Request $request, $id)
     {
 
         $family = Genuine::find($id)->salary;
  
         foreach ($family as $v) {
                       
             $family_recode =Family::find($v->id);
         }
 
 
         $family_recode->consort = $request->consort;
         $family_recode->parent = $request->parent;
         $family_recode->children = $request->children;
         $family_recode->children2 = $request->children2;
         $family_recode->children3 = $request->children3;
         $family_recode->note = $request->note;
         $family_recode->save();

         $genuine_record = Genuine::find($id);
         $genuine_record->entryday = $request->entryday;
         $genuine_record->name = $request->name;
         $genuine_record->phonetic = $request->phonetic;
         $genuine_record->gender = $request->gender;
         $genuine_record->consort = $request->consort;
         $genuine_record->parent = $request->parent;
         $genuine_record->year = $request->year;
         $genuine_record->month = $request->month;
         $genuine_record->day = $request->day;
         $genuine_record->age = $request->age;
         $genuine_record->zip01 = $request->zip01;
         $genuine_record->pref01 = $request->pref01;
         $genuine_record->addr01 = $request->addr01;
         $genuine_record->line = $request->line;
         $genuine_record->station = $request->station;
         $genuine_record->tel = $request->tel;
         $genuine_record->mobiletel = $request->mobiletel;
         $genuine_record->email = $request->email;
         $genuine_record->mobilemail = $request->mobilemail;
         $genuine_record->emergencytel = $request->emergencytel;
         $genuine_record->joincompany = $request->joincompany;
         $genuine_record->save();
   
         return redirect()->action('BaseController@getgenuine', ['id' => $id])->with('success', '更新が完了しました。');
         
     }

     public function gethope($id)
     {
 
          // ログインしていたら、mypageを表示
          if (Auth::check()) {

         
            $skilldata = Genuine::find($id)->hope;
       
            $genuine_data = Genuine::find($id);
            if (is_null($genuine_data)) {
                return back()->with('success', '基本情報を記入し更新を押してください。');
            }

            return view('Product/hope',compact('skilldata',))->with(
              'input', [
                'entryday' => $genuine_data->entryday,
                'name' => $genuine_data->name,
                'phonetic' => $genuine_data->phonetic,
                'gender' => $genuine_data->gender,
                'consort' => $genuine_data->consort,
                'parent' => $genuine_data->parent,
                'year' => $genuine_data->year,
                'month' => $genuine_data->month,
                'day' => $genuine_data->day,
                'age' => $genuine_data->age,
                'zip01' => $genuine_data->zip01,
                'pref01' => $genuine_data->pref01,
                'addr01' => $genuine_data->addr01,
                'line' => $genuine_data->line,
                'station' => $genuine_data->station,
                'tel' => $genuine_data->tel,
                'mobiletel' => $genuine_data->mobiletel,
                'email' => $genuine_data->email,
                'mobilemail' => $genuine_data->mobilemail,
                'emergencytel' => $genuine_data->emergencytel,
                'joincompany' => $genuine_data->joincompany,
                'id' => $id,
              ]);
               
 
             } else {
                 // ログインしていなかったら、alert画面を表示
                     return view('alert/alert');
         
                 }
         
      }
 
      public function hopedone(Request $request, $id)
      {
  
          $hope = Genuine::find($id)->hope;
   
          foreach ($hope as $v) {
                        
              $hope_recode =Hope::find($v->id);
          }
  
  
          $hope_recode->job = $request->job;
          $hope_recode->place = $request->place;
          $hope_recode->industry = $request->industry;
          $hope_recode->annual_income = $request->annual_income;
          $hope_recode->startday = $request->startday;
          $hope_recode->priority1 = $request->priority1;
          $hope_recode->priority2 = $request->priority2;
          $hope_recode->priority3 = $request->priority3;
          $hope_recode->note = $request->note;
          $hope_recode->save();
 
          $genuine_record = Genuine::find($id);
          $genuine_record->entryday = $request->entryday;
          $genuine_record->name = $request->name;
          $genuine_record->phonetic = $request->phonetic;
          $genuine_record->gender = $request->gender;
          $genuine_record->consort = $request->consort;
          $genuine_record->parent = $request->parent;
          $genuine_record->year = $request->year;
          $genuine_record->month = $request->month;
          $genuine_record->day = $request->day;
          $genuine_record->age = $request->age;
          $genuine_record->zip01 = $request->zip01;
          $genuine_record->pref01 = $request->pref01;
          $genuine_record->addr01 = $request->addr01;
          $genuine_record->line = $request->line;
          $genuine_record->station = $request->station;
          $genuine_record->tel = $request->tel;
          $genuine_record->mobiletel = $request->mobiletel;
          $genuine_record->email = $request->email;
          $genuine_record->mobilemail = $request->mobilemail;
          $genuine_record->emergencytel = $request->emergencytel;
          $genuine_record->joincompany = $request->joincompany;
          $genuine_record->save();
    
          return redirect()->action('BaseController@getgenuine', ['id' => $id])->with('success', '更新が完了しました。');
          
      }

      public function getagreement($id)
      {
  
           // ログインしていたら、mypageを表示
           if (Auth::check()) {
          
            $skilldata = Genuine::find($id)->agreement;
        
            $genuine_data = Genuine::find($id);
            if (is_null($genuine_data)) {
                return back()->with('success', '基本情報を記入し更新を押してください。');
            }

            return view('Product/agreement',compact('skilldata',))->with(
              'input', [
                'entryday' => $genuine_data->entryday,
                'name' => $genuine_data->name,
                'phonetic' => $genuine_data->phonetic,
                'gender' => $genuine_data->gender,
                'consort' => $genuine_data->consort,
                'parent' => $genuine_data->parent,
                'year' => $genuine_data->year,
                'month' => $genuine_data->month,
                'day' => $genuine_data->day,
                'age' => $genuine_data->age,
                'zip01' => $genuine_data->zip01,
                'pref01' => $genuine_data->pref01,
                'addr01' => $genuine_data->addr01,
                'line' => $genuine_data->line,
                'station' => $genuine_data->station,
                'tel' => $genuine_data->tel,
                'mobiletel' => $genuine_data->mobiletel,
                'email' => $genuine_data->email,
                'mobilemail' => $genuine_data->mobilemail,
                'emergencytel' => $genuine_data->emergencytel,
                'joincompany' => $genuine_data->joincompany,
                'id' => $id,
              ]);
                
  
              } else {
                  // ログインしていなかったら、alert画面を表示
                      return view('alert/alert');
          
                  }
          
       }
  
       public function agreementdone(Request $request, $id)
       {
   
           $agreement = Genuine::find($id)->agreement;
    
           foreach ($agreement as $v) {
                         
               $agreement_recode =Agreement::find($v->id);
           }
   
   
           $agreement_recode->place = $request->place;
           $agreement_recode->time = $request->time;
           $agreement_recode->break = $request->break;
           $agreement_recode->overtime = $request->overtime;
           $agreement_recode->holiday = $request->holiday;
           $agreement_recode->paid = $request->paid;
           $agreement_recode->other = $request->other;
           $agreement_recode->note = $request->note;
           $agreement_recode->save();
  
           $genuine_record = Genuine::find($id);
           $genuine_record->entryday = $request->entryday;
           $genuine_record->name = $request->name;
           $genuine_record->phonetic = $request->phonetic;
           $genuine_record->gender = $request->gender;
           $genuine_record->consort = $request->consort;
           $genuine_record->parent = $request->parent;
           $genuine_record->year = $request->year;
           $genuine_record->month = $request->month;
           $genuine_record->day = $request->day;
           $genuine_record->age = $request->age;
           $genuine_record->zip01 = $request->zip01;
           $genuine_record->pref01 = $request->pref01;
           $genuine_record->addr01 = $request->addr01;
           $genuine_record->line = $request->line;
           $genuine_record->station = $request->station;
           $genuine_record->tel = $request->tel;
           $genuine_record->mobiletel = $request->mobiletel;
           $genuine_record->email = $request->email;
           $genuine_record->mobilemail = $request->mobilemail;
           $genuine_record->emergencytel = $request->emergencytel;
           $genuine_record->joincompany = $request->joincompany;
           $genuine_record->save();
     
           return redirect()->action('BaseController@getgenuine', ['id' => $id])->with('success', '更新が完了しました。');
           
       }

       public function getmemo($id)
       {
   
            // ログインしていたら、mypageを表示
            if (Auth::check()) {
           
             
                $skilldata = Genuine::find($id)->memo;
        
                $genuine_data = Genuine::find($id);
                if (is_null($genuine_data)) {
                    return back()->with('success', '基本情報を記入し更新を押してください。');
                }
    
                return view('Product/memo',compact('skilldata',))->with(
                  'input', [
                    'entryday' => $genuine_data->entryday,
                    'name' => $genuine_data->name,
                    'phonetic' => $genuine_data->phonetic,
                    'gender' => $genuine_data->gender,
                    'consort' => $genuine_data->consort,
                    'parent' => $genuine_data->parent,
                    'year' => $genuine_data->year,
                    'month' => $genuine_data->month,
                    'day' => $genuine_data->day,
                    'age' => $genuine_data->age,
                    'zip01' => $genuine_data->zip01,
                    'pref01' => $genuine_data->pref01,
                    'addr01' => $genuine_data->addr01,
                    'line' => $genuine_data->line,
                    'station' => $genuine_data->station,
                    'tel' => $genuine_data->tel,
                    'mobiletel' => $genuine_data->mobiletel,
                    'email' => $genuine_data->email,
                    'mobilemail' => $genuine_data->mobilemail,
                    'emergencytel' => $genuine_data->emergencytel,
                    'joincompany' => $genuine_data->joincompany,
                    'id' => $id,
                  ]);
                 
   
               } else {
                   // ログインしていなかったら、alert画面を表示
                       return view('alert/alert');
           
                   }
           
        }
   
        public function memodone(Request $request, $id)
        {
    
            $memo= Genuine::find($id)->memo;
     
            foreach ($memo as $v) {
                          
                $memo_recode =Memo::find($v->id);
            }
    
            $memo_recode->note = $request->note;
            $memo_recode->save();
   
            $genuine_record = Genuine::find($id);
            $genuine_record->entryday = $request->entryday;
            $genuine_record->name = $request->name;
            $genuine_record->phonetic = $request->phonetic;
            $genuine_record->gender = $request->gender;
            $genuine_record->consort = $request->consort;
            $genuine_record->parent = $request->parent;
            $genuine_record->year = $request->year;
            $genuine_record->month = $request->month;
            $genuine_record->day = $request->day;
            $genuine_record->age = $request->age;
            $genuine_record->zip01 = $request->zip01;
            $genuine_record->pref01 = $request->pref01;
            $genuine_record->addr01 = $request->addr01;
            $genuine_record->line = $request->line;
            $genuine_record->station = $request->station;
            $genuine_record->tel = $request->tel;
            $genuine_record->mobiletel = $request->mobiletel;
            $genuine_record->email = $request->email;
            $genuine_record->mobilemail = $request->mobilemail;
            $genuine_record->emergencytel = $request->emergencytel;
            $genuine_record->joincompany = $request->joincompany;
            $genuine_record->save();
      
            return redirect()->action('BaseController@getgenuine', ['id' => $id])->with('success', '更新が完了しました。');
            
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