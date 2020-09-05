<!DOCTYPE html>
<html lang="ja">
    <head>
     <meta charset="utf-8"/>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <style type="text/css">
    div {
        padding: 25px 0;
    }
    .index {
        line-height: 40px;
    }
    .center {
        text-align: center;
    }
     .box{
         padding: 10px 20px;
     }
     .radio-btn {
         padding: 10px;
     }
     #check-box {
         border-radius: 0px;
         padding: 10px;
     }
     #submit-btn,
     #btn {
         margin: 0 10px;
         padding: 10px 20px;
     }
    </style>
    <body>

       <form class="container" method="post" action='/result'>
           @csrf
           <div class="row">
               
                <h1 class="col-12 center">システムへのご感想をお聞かせください</h1>
                
                <div class="offset-2 col-4 index">氏名</div>
                <div class="col-6"><input type="hidden" name="name" value="{{$name}}" />{{$name}}</div>
                
               <div class="offset-2 col-4">性別</div>
               <div class="col-6">
               <input type="hidden" name="gender" value="{{$gender}}" />
               {{$gender}}
               </div>
               
              <div class="offset-2 col-4 index">年代</div>
              <div class="col-6">
              <input type="hidden" name="ages" value="{{$ages}}"/>
              {{$ages}}
              </div>
              
              
               <div class="offset-2 col-4 index">メールアドレス</div>
               <div class="col-6"><input class="box" type="hidden" name="mail" value="{{$mail}}"/>{{$mail}}</div>
               
               <div class="offset-2 col-4">メール送信可否</div>
               <div class="col-6">
                   @if($permission)
                   <p>送信許可</p>
                   @else
                   <p>送信拒否</p>
                   @endif
               </div>
                <input type="hidden" name="permission" value="{{$permission}}"/>
           
           <div class="offset-2 col-4">ご意見</div>
           <div class="col-6">
           <input type="hidden" name="description" value="{{$description}}"/>
             {{$description}}
           </div>
    
           <div class="col-12 center">
               <button id="btn" type="button" onclick="history.back()">再入力</button>
               <input id="submit-btn" type="submit" value="送信"/>
        　　</div> 
         </div>
       </form> 
       
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>