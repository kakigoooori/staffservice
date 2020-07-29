function delete_alert(e){
   if(!window.confirm('本当に削除しますか？')){
      window.alert('キャンセルされました'); 
      return false;
   }
   document.deleteform.submit();
};

function ok_alert(e){
    if(!window.confirm('承諾してもよろしいですか？相手にメールが届きます。')){
       window.alert('キャンセルされました'); 
       return false;
    }
    document.deleteform.submit();
 };


 function pass_alert(e){
    if(!window.confirm('お断りしてもよろしいですか？相手にメールが届きます。')){
       window.alert('キャンセルされました'); 
       return false;
    }
    document.deleteform.submit();
 };



 
 function login_alert(e){
 window.confirm('ここから先は会員専用メニューです会員登録を済ませてからご利用ください。'); 
   
   document.deleteform.submit();
};