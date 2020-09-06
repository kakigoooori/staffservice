@extends('layout/maillayout')
@section('content')    

<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8">
</script>


{{ csrf_field() }}
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="card" >

  <div class="card-header">
  <h2>スタッフにメールを送信します</h2>
  </div>
  <table class="table">

  <tr>
    <td>送信元</td>
    <td>
    {{ Auth::user()->name }}
    </td>
  </tr>

  <tr>
    <td>送信元アドレス</td>
    <td>
    {{ Auth::user()->email }}
    </td>
  </tr>

  </table>

  <table class="table">
  <tr>
      <th>番号</th>
      <th>氏名</th>
      <th>メールアドレス</th>
  </tr>
  @foreach (array_map(null,$id,$name,$mail) as [$val1,$val2,$val3]) 
  <tr>
    <td>{{ $val1 }}</td>
    <td>{{ $val2 }}</td>
    <td>{{ $val3 }}</td>
  </tr>
   @endforeach
  </table>

<div class="card">
<p><b>タイトル</b></p>
<div class="form-group">
  <input type="text" name="title" value="" size="65">
</div>
<p><b>備考</b></p>
<div class="form-group" >
<textarea name="note" rows="6" cols="65" 
      @if(!empty($errors->first('note'))) border-danger @endif
      value="" placeholder="">{{ old('note') }}
</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('note')}}</span>
     </p>   
</div>
</div>

</div>
<input type="submit" value="メール送信" class="btn btn-primary" style="width:100px;height:50px">    
</form>
</div>
</div>
</div>
@stop
