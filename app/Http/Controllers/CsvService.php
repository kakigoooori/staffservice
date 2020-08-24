<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsvService 
{
    private function csvcolmns()
{
    $csvlist = array(
       
        'name' => '名前',
        
    );
    return $csvlist;
}

public function download1()
{
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
        $query = \App\Models\AuthInformation::query();
        $query->Join('profiles','auth_information.id','=','profiles.authinformation_id'); //内部結合
        $query->orderBy('auth_information.id');
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


}
