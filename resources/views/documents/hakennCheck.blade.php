@extends('layout/layout')
 @section('content')
 



   
   
    <h2>労働者派遣契約</h2>
<br>
　<p> {{ $input['company'] }}
    <input type="hidden" name="company" value="{{ $input['company'] }}">株式会社（派遣先）と {{ $input['company2'] }}
    <input type="hidden" name="company2" value="{{ $input['company2'] }}">株式会社（派遣元事業主）（とは、次のとおり労働者派遣契約を締結する。</p>
１　業務内容
　 {{ $input['jobcontent'] }}
    <input type="hidden" name="jobcontent" value="{{ $input['jobcontent'] }}">
<p>　（労働者派遣事業の適正な運営の確保及び派遣労働者の保護等に関する法律施行令第４条第１項第３号の事務用機器操作に該当。）</p>
２　就業場所

（〒　 {{ $input['workplace'] }}
    <input type="hidden" name="workplace" value="{{ $input['workplace'] }}">
<p>　TEL{{ $input['tel'] }}
    <input type="hidden" name="tel" value="{{ $input['tel'] }}">）</p>
３　指揮命令者 <br>
<p>{{ $input['Orderer'] }}
    <input type="hidden" name="Orderer" value="{{ $input['Orderer'] }}"></p>
４　派遣期間 
{{ $input['workstart'] }}
    <input type="hidden" name="workstart" value="{{ $input['workstart'] }}">
～
{{ $input['workend'] }}
    <input type="hidden" name="workend" value="{{ $input['workend'] }}"><br>
<p>（※紹介予定派遣の場合は、６ヶ月以内の期間とする。）</p>
５　就業日
<p>月～金（ただし、祝日、年末年始（12月29日から１月３日）、夏季休業（８月13日から８月16日）を除く。）<p>
<p>６　就業時間　{{ $input['worktimestart'] }}
    <input type="hidden" name="worktimestart" value="{{ $input['worktimestart'] }}">
～
{{ $input['worktimeend'] }}
    <input type="hidden" name="worktimeend" value="{{ $input['worktimeend'] }}"><br></p>
<p>７　休憩時間　{{ $input['reststart'] }}
    <input type="hidden" name="reststart" value="{{ $input['reststart'] }}">
～
{{ $input['resttimeend'] }}
    <input type="hidden" name="resttimeend" value="{{ $input['resttimeend'] }}"><br></p></p>
８　安全及び衛生<br>
　<p>派遣先及び派遣元は、労働者派遣法第44条から第47条の２までの規定により課された各法令を遵守し、自己に課された法令上の責任を負う。なお、派遣就業中
の安全及び衛生については、派遣先の安全衛生に関する規定を適用することとし、その他については、派遣元の安全衛生に関する規定を適用する。
９　派遣労働者からの苦情の処理</p>
(１)　苦情の申出を受ける者<br>
派遣先　　　 　　{{ $input['Complaintman'] }}
    <input type="hidden" name="Complaintman" value="{{ $input['Complaintman'] }}"><br>
派遣先電話番号　 {{ $input['Complainttel'] }}
    <input type="hidden" name="Complainttel" value="{{ $input['Complainttel'] }}"><br>
派遣元事業主　　 {{ $input['Complaintman2'] }}
    <input type="hidden" name="Complaintman2" value="{{ $input['Complaintman2'] }}"><br>
<p>派遣先電話番号　 {{ $input['Complainttel2'] }}
    <input type="hidden" name="Complainttel2" value="{{ $input['Complainttel2'] }}"><br></p>
(２)　苦情処理方法、連携体制等<br>
①　派遣元事業主における(１)記載の者が苦情の申出を受けたときは、ただちに派遣元責任者の{{ $input['Responsible'] }}
    <input type="hidden" name="Responsible" value="{{ $input['Responsible'] }}">へ連絡することとし、当該派遣元責任者が中心となって、誠意をもって、遅滞なく、当該苦情の適切迅速な処理を図ることとし、その結果について必ず派遣労働者に通知することとする。<br>
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
　　{{ $input['Responsibleman'] }}
    <input type="hidden" name="Responsibleman" value="{{ $input['Responsibleman'] }}">
　　TEL{{ $input['Responsibletel'] }}
    <input type="hidden" name="Responsibletel" value="{{ $input['Responsibletel'] }}"><br>
<p>12　派遣先責任者</p>
　　{{ $input['Responsibleman2'] }}
    <input type="hidden" name="Responsibleman2" value="{{ $input['Responsibleman2'] }}">
　　TEL{{ $input['Responsibletel2'] }}
    <input type="hidden" name="Responsibletel2" value="{{ $input['Responsibletel2'] }}"><br>
<p>13　就業日外労働</p>
　５の就業日以外の就労は、１か月に２日の範囲で命ずることができるものとする。<br>
<p>14　時間外労働
　６の就業時間外の労働は1日{{ $input['overtimeday'] }}
    <input type="hidden" name="overtimeday" value="{{ $input['overtimeday'] }}">時間、１ヶ月{{ $input['overtimemonth'] }}
    <input type="hidden" name="overtimemonth" value="{{ $input['overtimemonth'] }}">時間、1年{{ $input['overtimeyear'] }}
    <input type="hidden" name="overtimeyear" value="{{ $input['overtimeyear'] }}">時間の範囲で命ずることができるものとする。</p>
<p>15　派遣人員　{{ $input['people'] }}
    <input type="hidden" name="people" value="{{ $input['people'] }}"> 人</p>
<p>16　派遣労働者の福祉の増進のための便宜の供与
　派遣先は、派遣労働者に対し、派遣先が雇用する労働者が利用する診療所、給食施設、レクリエーション施設等の施設又は設備について、利用することができるよう便宜供与することとする。
（紹介予定派遣に係る契約である場合は下記の項目例を記載）</p>
17　紹介予定派遣に関する事項<br>
(１)　派遣先が雇用する場合に予定される労働条件等<br>
契約期間{{ $input['Contractperiod'] }}
    <input type="hidden" name="Contractperiod" value="{{ $input['Contractperiod'] }}"><br>
業務内容　　　　{{ $input['jobcontent'] }}
    <input type="hidden" name="jobcontent" value="{{ $input['jobcontent'] }}"><br>
就業場所　　　　{{ $input['workplace'] }}
    <input type="hidden" name="workplace" value="{{ $input['workplace'] }}"><br>
（　TEL　{{ $input['tel'] }}
    <input type="hidden" name="tel" value="{{ $input['tel'] }}">）<br>
始業・就業　　　始業：　{{ $input['worktimestart'] }}
    <input type="hidden" name="worktimestart" value="{{ $input['worktimestart'] }}">終業:{{ $input['worktimeend'] }}
    <input type="hidden" name="worktimeend" value="{{ $input['worktimeend'] }}"><br>
休憩時間{{ $input['totalrest'] }}
    <input type="hidden" name="totalrest" value="{{ $input['totalrest'] }}">分<br>
所定時間外労働　有の場合（１日  {{ $input['overdaytime'] }}
    <input type="hidden" name="overdaytime" value="{{ $input['overdaytime'] }}">時間、１か月  {{ $input['overmonthtime'] }}
    <input type="hidden" name="overmonthtime" value="{{ $input['overmonthtime'] }}">時間、１年  {{ $input['overyeartime'] }}
    <input type="hidden" name="overyeartime" value="{{ $input['overyeartime'] }}">時間の範囲内）<br>
休　　日　　　　毎週{{ $input['restday'] }}
    <input type="hidden" name="restday" value="{{ $input['restday'] }}"><br>
　　　　　　　　<br>
休　　暇　　　　年次有給休暇{{ $input['paid'] }}
    <input type="hidden" name="paid" value="{{ $input['paid'] }}"><br>
　　　　　　　　その他　　：{{ $input['restvalue'] }}
    <input type="hidden" name="restvalue" value="{{ $input['restvalue'] }}"><br>
賃　　金　　　　基本賃金　月給{{ $input['salary'] }}
    <input type="hidden" name="salary" value="{{ $input['salary'] }}">（毎月{{ $input['endworkday'] }}
    <input type="hidden" name="endworkday" value="{{ $input['endworkday'] }}">日締切、毎月{{ $input['salaryday'] }}
    <input type="hidden" name="salaryday" value="{{ $input['salaryday'] }}">支払）<br>
通勤手当：{{ $input['Commuting'] }}
    <input type="hidden" name="Commuting" value="{{ $input['Commuting'] }}"><br>
所定時間外、休日又は深夜労働に対して支払われる割増賃金率<br>
・所定時間外：{{ $input['overtime'] }}
    <input type="hidden" name="overtime" value="{{ $input['overtime'] }}"><br>
昇給：{{ $input['up'] }}
    <input type="hidden" name="up" value="{{ $input['up'] }}"><br>
賞与：{{ $input['bonus'] }}
    <input type="hidden" name="bonus" value="{{ $input['bonus'] }}"><br>
社会保険の加入状況　{{ $input['insurance'] }}
    <input type="hidden" name="insurance" value="{{ $input['insurance'] }}"><br>
(２)　その他<br>
・　派遣先は、職業紹介を受けることを希望しなかった又は職業紹介を受けた者を雇用しなかった場合には、その理由を、派遣元事業主に対して書面により明示する。<br>
・　紹介予定派遣を経て派遣先が雇用する場合には、年次有給休暇及び退職金の取扱いについて、労働者派遣の期間を勤務期間に含めて算入することとする。



@stop