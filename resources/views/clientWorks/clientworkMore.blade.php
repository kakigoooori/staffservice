@extends('layout/layout')
@section('content')

{{ csrf_field() }}
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="card" >

<tr>
    <td>　掲載期間</td>
    <td>
    {{ $input['start'] }}
    </td>
  </tr>

  <tr>
    <td>～
    </td>
    <td>
    {{ $input['end'] }}
    </td>
  </tr>

  <div class="card-header">
  <h2>{{ $input['name'] }}</h2>
  </div>

  <table class="table">

  <tr>
    <td>クライアント情報</td>
    <td>
    {{ $clientworkmore->name }}
    </td>
  </tr>

  <tr>
    <td>月額報酬</td>
    <td>
    {{ $input['price'] }}
    </td>
  </tr>

  <tr>
    <td>開発開始</td>
    <td>
    {{ $input['devstart'] }}
    </td>
  </tr>

  <tr>
    <td>開発終了</td>
    <td>
    {{ $input['devend'] }}
    </td>
  </tr>


  <tr>
    <td>業界</td>
    <td>
    {{ $input['genre'] }}
    </td>
  </tr>

  <tr>
    <td>勤務地</td>
    <td>
    {{ $input['add01'] }}
    {{ $input['add02'] }}
    {{ $input['add03'] }}
    </td>
  </tr>
  

  <tr>
    <td>最寄り駅</td>
    <td>
    {{ $input['station'] }}
    </td>
  </tr>

  <tr>
    <td>リモート開発</td>
    <td>
    {{ $input['remote'] }}
    </td>
  </tr>

  <tr>
    <td>使用言語</td>
    <td>
    {{ $input['tool'] }}
    </td>
  </tr>

  <tr>
    <td>職務内容</td>
    <td>
    {{ $input['jobcontent'] }}
    </td>
  </tr>
  
  <tr>
    <td>必須スキル</td>
    <td>
    {{ $input['required_skill'] }}
    </td>
  </tr>

  <tr>
    <td>歓迎スキル</td>
    <td>
    {{ $input['Welcome_skills'] }}
    </td>
  </tr>

  </table>

  <table class="table">
  <tr>
    <td>
      <h5>勤務地情報・備考欄</h5>
        <div class="card" >{!! nl2br(e( $input['note'] ))!!}
        </div>
    </td>
  </tr>
  </table>
  <p><a class="btn btn-primary" href=/csv/download/{{$input['id'] }} target="_blank"> CSV download その1</a></p>


</td>
</tr>
</table>

</div>
<div class="card" >
<div class="card-header">
  <h2>候補スタッフ</h2>
  </div>
<form method="get">
<table class="table table-hover">

<tr>
    <th>性別</th>
    <th>年齢</th>
    <th>資格</th>
    <th>都道府県</th>
</tr>

<tr>
    <th>
    <select name="gender" >
    <option value="" selected>未選択</option>
    <option value="男">男</option>
    <option value="女">女</option>
    </select>
    </th>
    <th>
    <select name="age" >
    <option value="" selected></option>
    <option value="0">0</option> 
    <option value="1">1</option> 
    <option value="2">2</option> 
    <option value="3">3</option> 
    <option value="4">4</option> 
    <option value="5">5</option> 
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option> 
    <option value="10">10</option> 
    <option value="11">11</option> 
    <option value="12">12</option> 
    <option value="13">13</option> 
    <option value="14">14</option> 
    <option value="15">15</option> 
    <option value="16">16</option> 
    <option value="17">17</option> 
    <option value="18">18</option> 
    <option value="19">19</option> 
    <option value="20">20</option> 
    <option value="21">21</option> 
    <option value="22">22</option> 
    <option value="23">23</option> 
    <option value="24">24</option> 
    <option value="25">25</option> 
    <option value="26">26</option> 
    <option value="27">27</option> 
    <option value="28">28</option> 
    <option value="29">29</option> 
    <option value="30">30</option> 
    <option value="31">31</option> 
    <option value="32">32</option> 
    <option value="33">33</option> 
    <option value="34">34</option> 
    <option value="35">35</option> 
    <option value="36">36</option> 
    <option value="37">37</option> 
    <option value="38">38</option> 
    <option value="39">39</option> 
    <option value="40">40</option> 
    <option value="41">41</option> 
    <option value="42">42</option> 
    <option value="43">43</option> 
    <option value="44">44</option> 
    <option value="45">45</option> 
    <option value="46">46</option> 
    <option value="47">47</option> 
    <option value="48">48</option> 
    <option value="49">49</option> 
    <option value="50">50</option> 
    <option value="51">51</option> 
    <option value="52">52</option> 
    <option value="53">53</option> 
    <option value="54">54</option> 
    <option value="55">55</option> 
    <option value="56">56</option> 
    <option value="57">57</option> 
    <option value="58">58</option> 
    <option value="59">59</option> 
    <option value="60">60</option> 
    <option value="61">61</option> 
    <option value="62">62</option> 
    <option value="63">63</option> 
    <option value="64">64</option> 
    <option value="65">65</option> 
    <option value="66">66</option> 
    <option value="67">67</option> 
    <option value="68">68</option> 
    <option value="69">69</option> 
    <option value="70">70</option> 
    <option value="71">71</option> 
    <option value="72">72</option> 
    <option value="73">73</option> 
    <option value="74">74</option> 
    <option value="75">75</option> 
    <option value="76">76</option> 
    <option value="77">77</option> 
    <option value="78">78</option> 
    <option value="79">79</option> 
    <option value="80">80</option> 
    <option value="81">81</option> 
    <option value="82">82</option> 
    <option value="83">83</option> 
    <option value="84">84</option> 
    <option value="85">85</option> 
    <option value="86">86</option> 
    <option value="87">87</option> 
    <option value="88">88</option> 
    <option value="89">89</option> 
    <option value="90">90</option> 
    <option value="91">91</option> 
    <option value="92">92</option> 
    <option value="93">93</option> 
    <option value="94">94</option> 
    <option value="95">95</option> 
    <option value="96">96</option> 
    <option value="97">97</option> 
    <option value="98">98</option> 
    <option value="99">99</option>
    </select>～
    <select name="age2" >
    <option value="" selected></option>
    <option value="0">0</option> 
    <option value="1">1</option> 
    <option value="2">2</option> 
    <option value="3">3</option> 
    <option value="4">4</option> 
    <option value="5">5</option> 
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option> 
    <option value="10">10</option> 
    <option value="11">11</option> 
    <option value="12">12</option> 
    <option value="13">13</option> 
    <option value="14">14</option> 
    <option value="15">15</option> 
    <option value="16">16</option> 
    <option value="17">17</option> 
    <option value="18">18</option> 
    <option value="19">19</option> 
    <option value="20">20</option> 
    <option value="21">21</option> 
    <option value="22">22</option> 
    <option value="23">23</option> 
    <option value="24">24</option> 
    <option value="25">25</option> 
    <option value="26">26</option> 
    <option value="27">27</option> 
    <option value="28">28</option> 
    <option value="29">29</option> 
    <option value="30">30</option> 
    <option value="31">31</option> 
    <option value="32">32</option> 
    <option value="33">33</option> 
    <option value="34">34</option> 
    <option value="35">35</option> 
    <option value="36">36</option> 
    <option value="37">37</option> 
    <option value="38">38</option> 
    <option value="39">39</option> 
    <option value="40">40</option> 
    <option value="41">41</option> 
    <option value="42">42</option> 
    <option value="43">43</option> 
    <option value="44">44</option> 
    <option value="45">45</option> 
    <option value="46">46</option> 
    <option value="47">47</option> 
    <option value="48">48</option> 
    <option value="49">49</option> 
    <option value="50">50</option> 
    <option value="51">51</option> 
    <option value="52">52</option> 
    <option value="53">53</option> 
    <option value="54">54</option> 
    <option value="55">55</option> 
    <option value="56">56</option> 
    <option value="57">57</option> 
    <option value="58">58</option> 
    <option value="59">59</option> 
    <option value="60">60</option> 
    <option value="61">61</option> 
    <option value="62">62</option> 
    <option value="63">63</option> 
    <option value="64">64</option> 
    <option value="65">65</option> 
    <option value="66">66</option> 
    <option value="67">67</option> 
    <option value="68">68</option> 
    <option value="69">69</option> 
    <option value="70">70</option> 
    <option value="71">71</option> 
    <option value="72">72</option> 
    <option value="73">73</option> 
    <option value="74">74</option> 
    <option value="75">75</option> 
    <option value="76">76</option> 
    <option value="77">77</option> 
    <option value="78">78</option> 
    <option value="79">79</option> 
    <option value="80">80</option> 
    <option value="81">81</option> 
    <option value="82">82</option> 
    <option value="83">83</option> 
    <option value="84">84</option> 
    <option value="85">85</option> 
    <option value="86">86</option> 
    <option value="87">87</option> 
    <option value="88">88</option> 
    <option value="89">89</option> 
    <option value="90">90</option> 
    <option value="91">91</option> 
    <option value="92">92</option> 
    <option value="93">93</option> 
    <option value="94">94</option> 
    <option value="95">95</option> 
    <option value="96">96</option> 
    <option value="97">97</option> 
    <option value="98">98</option> 
    <option value="99">99</option>
    </select>       
    </th>
    <th>
    <input type="text" name="certification1" value="{{$certification1 }}">
    </th>
    <th>
    <input type="text" name="pref01" value="{{$pref01}}">
    </th>
</tr>
           

</table>

<table class="table table-hover">

<tr>

    <th>所在地</th>
    <th>最寄り駅</th>
    <th>希望職種</th>

</tr>

<tr>
    <th>
    <input type="text" name="addr01" value="{{$addr01}}">
    </th>
    <th>
    <input type="text" name="station" value="{{$station}}">
    </th>
    <th>
    <select name="job" >
     <option value="" selected>選択してください</option>
     <option value="情報・通信">情報・通信</option>
     <option value="動画サービス">動画サービス</option>
     <option value="ゲーム">ゲーム</option>
     <option value="教育">教育</option>
     <option value="医療・福祉">医療・福祉</option>
     <option value="銀行・証券・保険">銀行・証券・保険</option>
     <option value="不動産">不動産</option>
     <option value="EC・小売・流通">EC・小売・流通</option>
     <option value="SNS・コミュニティ">SNS・コミュニティ</option>
     <option value="交通・位置情報">交通・位置情報</option>
     <option value="旅行・宿泊・飲食">旅行・宿泊・飲食</option>
     <option value="広告">広告</option>
     <option value="メーカー">メーカー</option>
     <option value="その他">その他</option>
    </select>
    </th>
</tr>            

</table>
<table class="table table-hover">
    <tr>
    <th><p><input type="submit" value="検索する" formaction=/clientworkMore/{{$input['id'] }} class="btn btn-primary"></p></th>
    <th><p><input type="submit" value="メール送信" formaction=/clientworkMore/{{$input['id'] }} class="btn btn-primary"></p></th>
    <th><p><input type="submit" value="SMS送信" formaction=/clientworkMore/{{$input['id'] }} class="btn btn-primary"></p></th>
    </tr>
    </table>
</form>

<table class="table table-hover">
    <tr>
        <th>番号</th>
        <th>氏名</th>
        <th>氏名(カナ)</th>
        <th>年齢</th>
        <th>性別</th>
        <th>所在地</th>
        <th>連絡先</th>
        <th>詳細へ</th>
    </tr>
    @foreach ($search as $menu)
    <tr>
        <td>{{ $menu->id }}</td>
        <td>{{ $menu->name }}</td>
        <td>{{ $menu->phonetic}}</td>
        <td>{{ \Carbon\Carbon::createFromDate($menu->year,$menu->month,$menu->day)->age }}歳</td>
        <td>{{ $menu->gender }}</td>
        <td>{{ $menu->pref01 }}&nbsp;&nbsp;{{ $menu->addr01 }}</td>
        <td>{{ $menu->mobiletel }}</td>
        <td><a href="/genuine/{{ $menu->id }}" class="btn btn-success">詳細</a></td>
        <th></th>
    </tr>
    @endforeach

</table>
</div>
 </div>
 </div>
 </div>

 @stop