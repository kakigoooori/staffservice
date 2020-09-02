@extends('layout/layout')
@section('content')
<form method="post" action="/documents/hakennCheck">
{{ csrf_field() }}
<h2>労働者派遣契約</h2>
<br>
　<p><input name="company" type="text">株式会社（派遣先）と<input name="company2" type="text">株式会社（派遣元事業主）（とは、次のとおり労働者派遣契約を締結する。</p>
１　業務内容
　<textarea class="field" name="jobcontent" cols="70" rows="1"></textarea>
<p>　（労働者派遣事業の適正な運営の確保及び派遣労働者の保護等に関する法律施行令第４条第１項第３号の事務用機器操作に該当。）</p>
２　就業場所

（〒　<textarea class="field" name="workplace" cols="70" rows="1"></textarea>
<p>　TEL<input name="tel" type="text">）</p>
３　指揮命令者 <br>
<p><textarea class="field" name="Orderer" cols="70" rows="1"></textarea></p>
４　派遣期間 
<input type="date" name="workstart" value="<?php echo date('Y-m-d');?>">
～
<input type="date" name="workend" value="<?php echo date('Y-m-d');?>"><br>
<p>（※紹介予定派遣の場合は、６ヶ月以内の期間とする。）</p>
５　就業日
<p>月～金（ただし、祝日、年末年始（12月29日から１月３日）、夏季休業（８月13日から８月16日）を除く。）<p>
<p>６　就業時間　<input type="time" name="worktimestart" value="<?php echo date('Y-m-d');?>">
～
<input type="time" name="worktimeend" value="<?php echo date('Y-m-d');?>"><br></p>
<p>７　休憩時間　<input type="time" name="reststart" value="<?php echo date('Y-m-d');?>">
～
<input type="time" name="resttimeend" value="<?php echo date('Y-m-d');?>"><br></p></p>
８　安全及び衛生<br>
　<p>派遣先及び派遣元は、労働者派遣法第44条から第47条の２までの規定により課された各法令を遵守し、自己に課された法令上の責任を負う。なお、派遣就業中
の安全及び衛生については、派遣先の安全衛生に関する規定を適用することとし、その他については、派遣元の安全衛生に関する規定を適用する。
９　派遣労働者からの苦情の処理</p>
(１)　苦情の申出を受ける者<br>
派遣先　　　 　　<input name="Complaintman" type="text"><br>
派遣先電話番号　 <input name="Complainttel" type="text"><br>
派遣元事業主　　 <input name="Complaintman2" type="text"><br>
<p>派遣先電話番号　 <input name="Complainttel2" type="text"><br></p>
(２)　苦情処理方法、連携体制等<br>
①　派遣元事業主における(１)記載の者が苦情の申出を受けたときは、ただちに派遣元責任者の<input name="Responsible" type="text">へ連絡することとし、当該派遣元責任者が中心となって、誠意をもって、遅滞なく、当該苦情の適切迅速な処理を図ることとし、その結果について必ず派遣労働者に通知することとする。<br>
②　派遣先における(１)記載の者が苦情の申出を受けたときは、ただちに派遣先責任者のへ連絡することとし、当該派遣先責任者が中心となって、誠意をもって、遅滞なく、当該苦情の適切かつ迅速な処理を図ることとし、その結果について必ず派遣労働者に通知することとする。<br>
<p>③　派遣先及び派遣元事業主は、自らでその解決が容易であり、即時に処理した苦情の他は、相互に遅滞なく通知するとともに、密接に連絡調整を行いつつ、その解決を図ることとする。</p>
10　労働者派遣契約の解除に当たって講ずる派遣労働者の雇用の安定を図るための措置<br>
(１)　労働者派遣契約の解除の事前の申入れ<br>
<p>　派遣先は、専ら派遣先に起因する事由により、労働者派遣契約の契約期間が満了する前の解除を行おうとする場合には、派遣元の合意を得ることはもとより、あらかじめ相当の猶予期間をもって派遣元に解除の申入れを行うこととする。</p>
(２)　就業機会の確保<br>
<p>　派遣元事業主及び派遣先は、労働者派遣契約の契約期間が満了する前に派遣労働者の責に帰すべき事由によらない労働者派遣契約の解除を行った場合には、派遣先の関連会社での就業をあっせんする等により、当該労働者派遣契約に係る派遣労働者の新たな就業機会の確保を図ることとする。</p>
(３)　損害賠償等に係る適切な措置<br>
<p>　派遣先は、派遣先の責に帰すべき事由により労働者派遣契約の契約期間が満了する前に労働者派遣契約の解除を行おうとする場合には、派遣労働者の新たな就業機会の確保を図ることとし、これができないときには、少なくとも当該労働者派遣契約の解除に伴い派遣元事業主が当該労働者派遣に係る派遣労働者を休業させること等を余儀なくされたことにより生じた損害の賠償を行わなければならないこととする。例えば、派遣元事業主が当該派遣労働者を休業させる場合は休業手当に相当する額以上の額について、派遣元事業主がやむを得ない事由により当該派遣労働者を解雇する場合は、派遣先による解除の申入れが相当の猶予期間をもって行われなかったことにより派遣元事業主が解雇の予告をしないときは30日分以上、当該予告をした日から解雇の日までの期間が30日に満たないときは当該解雇の日の30日前の日から当該予告の日までの日数分以上の賃金に相当する額以上の額について、損害の賠償を行わなければならないこととする。その他派遣先は派遣元事業主と十分に協議した上で適切な善後処理方策を講ずることとする。また、派遣元事業主及び派遣先の双方の責に帰すべき事由がある場合には、派遣元事業主及び派遣先のそれぞれの責に帰すべき部分の割合についても十分に考慮することとする。</p>
(４)　労働者派遣契約の解除の理由の明示<br>
<p>　派遣先は、労働者派遣契約の契約期間が満了する前に労働者派遣契約の解除を行おうとする場合であって、派遣元事業主から請求があったときは、労働者派遣契約の解除を行った理由を派遣元事業主に対し明らかにすることとする。</p>
<p>11　派遣元責任者</p>
　　<input name="Responsibleman" type="text">
　　TEL<input name="Responsibletel" type="text"><br>
<p>12　派遣先責任者</p>
　　<input name="Responsibleman2" type="text">
　　TEL<input name="Responsibletel2" type="text"><br>
<p>13　就業日外労働</p>
　５の就業日以外の就労は、１か月に２日の範囲で命ずることができるものとする。<br>
<p>14　時間外労働
　６の就業時間外の労働は1日<input type="time" name="overtimeday">時間、１ヶ月<input type="time" name="overtimemonth">時間、1年<input type="time" name="overtimeyear">時間の範囲で命ずることができるものとする。</p>
<p>15　派遣人員　<select class="my_class" name="people">
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
    
</select> 人</p>
<p>16　派遣労働者の福祉の増進のための便宜の供与
　派遣先は、派遣労働者に対し、派遣先が雇用する労働者が利用する診療所、給食施設、レクリエーション施設等の施設又は設備について、利用することができるよう便宜供与することとする。
（紹介予定派遣に係る契約である場合は下記の項目例を記載）</p>
17　紹介予定派遣に関する事項<br>
(１)　派遣先が雇用する場合に予定される労働条件等<br>
契約期間<input type="text" name="Contractperiod"><br>
業務内容　　　　<br>
就業場所　　　　<br>
（　TEL　）<br>
始業・就業　　　始業：　　：終業<br>
休憩時間<input type="time" name="totalrest">分<br>
所定時間外労働　有の場合（１日  <input type="text" name="overdaytime">時間、１か月  <input type="text" name="overmonthtime">時間、１年  <input type="text" name="overyeartime">時間の範囲内）<br>
休　　日　　　　毎週<input type="text" name="restday"><br>
　　　　　　　　<br>
休　　暇　　　　年次有給休暇<input type="text" name="paid"><br>
　　　　　　　　その他　　：<input type="text" name="restvalue"><br>
賃　　金　　　　基本賃金　月給<input type="text" name="salary">（毎月<input type="text" name="endworkday">日締切、毎月<input type="text" name="salaryday">支払）<br>
通勤手当：<input type="text" name="Commuting"><br>
所定時間外、休日又は深夜労働に対して支払われる割増賃金率<br>
・所定時間外：<input type="text" name="overtime"><br>
昇給：<input type="text" name="up"><br>
賞与：<input type="text" name="bonus"><br>
社会保険の加入状況　<input type="text" name="insurance"><br>
(２)　その他<br>
・　派遣先は、職業紹介を受けることを希望しなかった又は職業紹介を受けた者を雇用しなかった場合には、その理由を、派遣元事業主に対して書面により明示する。<br>
・　紹介予定派遣を経て派遣先が雇用する場合には、年次有給休暇及び退職金の取扱いについて、労働者派遣の期間を勤務期間に含めて算入することとする。

<br><input type="submit" value="反映する" class="btn btn-primary">    </form>
@stop