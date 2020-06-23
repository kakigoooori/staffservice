<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\PoolRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pool;


class BaseController extends Controller
{
    //top画面
    public function getTop() {
        return view('top/top');
    }


    //新規登録画面
    public function create() 
    {
        return view('create/create');
    }

    public function createCheck(CreateRequest $request) 
    {
        return view('create/createcomplete')->with('input', $request->all());
    }

    public function createlDone(CreateRequest $request) 
    {
        $user_record = new User;

        $user_record->name = $request->name;
        $user_record->password = $request->password;
        
        $user_record->save();
    

        //戻る場所を指定しておく↓

      return redirect()->action('BaseController@getTop');

    }


    //login画面
    public function getLogin() {
        return view('login/login');
    }


    //投稿画面
    public function getPool() 
    {
        return view('pool/pool');
    }

    public function poolCheck(PoolRequest $request) 
    {
        return view('pool/poolcomplete')->with('input', $request->all());
    }

    public function poolDone(PoolRequest $request) 
    {
        $pool_record = new Pool;

        $pool_record->work = $request->work;
        $pool_record->price = $request->price;
        $pool_record->genre  = $request->genre ;
        $pool_record->start = $request->start;
        $pool_record->end = $request->end;
        $pool_record->worknote = $request->worknote;
        $pool_record->save();
    

        //戻る場所を指定しておく↓

      return redirect()->action('BaseController@getTop');

    }




    //検索画面
    public function getSearch(Request $request) {
        
        $id = $request->input('id');
        $work = $request->input('work');
        $price = $request->input('price');
        $genre1 = $request->input('genre1');
        $genre2 = $request->input('genre2');
        $genre3 = $request->input('genre3');
        $genre4 = $request->input('genre4');
        $genre5 = $request->input('genre5');
        $genre6 = $request->input('genre6');
        $genre7 = $request->input('genre7');

        $query = Pool::query();
 
        
        if (!empty($work)) {
            $query->where('work', 'LIKE', "%{$work}%");
        }
 
        if (!empty($price)) {
            $query->where('price', '>=', $price);
        }

        
        if (!empty($genre1)) {
            $query->where(function($query) use($genre1, $genre2,$genre3,$genre4,$genre5,$genre6,$genre7){
            $query->where('genre', '=', "$genre1")
            ->orwhere('genre', '=', "$genre2")
            ->orwhere('genre', '=', "$genre3")
            ->orwhere('genre', '=', "$genre4")
            ->orwhere('genre', '=', "$genre5")
            ->orwhere('genre', '=', "$genre6")
            ->orwhere('genre', '=', "$genre7");
        });
        }

        if (!empty($genre2)) {
            $query->where(function($query) use($genre1, $genre2,$genre3,$genre4,$genre5,$genre6,$genre7){
            $query->where('genre', '=', "$genre2")
            ->orwhere('genre', '=', "$genre1")
            ->orwhere('genre', '=', "$genre3")
            ->orwhere('genre', '=', "$genre4")
            ->orwhere('genre', '=', "$genre5")
            ->orwhere('genre', '=', "$genre6")
            ->orwhere('genre', '=', "$genre7");
        });
        }

        if (!empty($genre3)) {
            $query->where(function($query) use($genre1, $genre2,$genre3,$genre4,$genre5,$genre6,$genre7){
            $query->where('genre', '=', "$genre3")
            ->orwhere('genre', '=', "$genre1")
            ->orwhere('genre', '=', "$genre2")
            ->orwhere('genre', '=', "$genre4")
            ->orwhere('genre', '=', "$genre5")
            ->orwhere('genre', '=', "$genre6")
            ->orwhere('genre', '=', "$genre7");
        });
        }

        if (!empty($genre4)) {
            $query->where(function($query) use($genre1, $genre2,$genre3,$genre4,$genre5,$genre6,$genre7){
            $query->where('genre', '=', "$genre4")
            ->orwhere('genre', '=', "$genre1")
            ->orwhere('genre', '=', "$genre2")
            ->orwhere('genre', '=', "$genre3")
            ->orwhere('genre', '=', "$genre5")
            ->orwhere('genre', '=', "$genre6")
            ->orwhere('genre', '=', "$genre7");
        });
          
        }

        if (!empty($genre5)) {
            $query->where(function($query) use($genre1, $genre2,$genre3,$genre4,$genre5,$genre6,$genre7){
            $query->where('genre', '=', "$genre5")
            ->orwhere('genre', '=', "$genre1")
            ->orwhere('genre', '=', "$genre2")
            ->orwhere('genre', '=', "$genre3")
            ->orwhere('genre', '=', "$genre4")
            ->orwhere('genre', '=', "$genre6")
            ->orwhere('genre', '=', "$genre7");
        });
            
        }

        if (!empty($genre6)) {
            $query->where(function($query) use($genre1, $genre2,$genre3,$genre4,$genre5,$genre6,$genre7){
            $query->where('genre', '=', "$genre6")
            ->orwhere('genre', '=', "$genre1")
            ->orwhere('genre', '=', "$genre2")
            ->orwhere('genre', '=', "$genre3")
            ->orwhere('genre', '=', "$genre4")
            ->orwhere('genre', '=', "$genre5")
            ->orwhere('genre', '=', "$genre7");
        });
        }

        if (!empty($genre7)) {
            $query->where(function($query) use($genre1, $genre2,$genre3,$genre4,$genre5,$genre6,$genre7){
            $query->where('genre', '=', "$genre7")
            ->orwhere('genre', '=', "$genre1")
            ->orwhere('genre', '=', "$genre2")
            ->orwhere('genre', '=', "$genre3")
            ->orwhere('genre', '=', "$genre4")
            ->orwhere('genre', '=', "$genre5")
            ->orwhere('genre', '=', "$genre6");
        });
        }
 
        $search = $query->get();
 
        return view('search/search', compact('search','id', 'work', 'price','genre1','genre2','genre3','genre4','genre5','genre6','genre7'));

    }

    public function getProduct($id)
    {
      
            $Product_data = Pool::find($id);
            if (is_null($Product_data)) {
              return redirect()->action('BaseController@getSearch');
            }
        


            return view('Product/Product')->with(
              'input', [
                'work' => $Product_data->work,
                'price' => $Product_data->price,
                'genre' => $Product_data->genre,
                'start' => $Product_data->start,
                'end' => $Product_data->end,
                'worknote' => $Product_data->worknote,
                'id' => $id
              ]);
        
    }

    
}