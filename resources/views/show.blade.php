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

       <form class="container" method="POST" action="/system/answer/{{$datas->id}}">
           @csrf
           <div class="row">
                <h1 class="col-12 center">アンケート管理システム</h1>
                
                <div class="offset-2 col-4 index">ID</div>
                <div class="col-6">{{$datas->id}}</div> 
                <input type="hidden" name="id" value="{{$datas->id}}"/>
                
                <div class="offset-2 col-4 index">氏名</div>
                <div class="col-6">{{$datas->fullname}}</div>
                
               <div class="offset-2 col-4">性別</div>
               <div class="col-6">
               {{$datas->gender}}
               </div>
               
              <div class="offset-2 col-4 index">年代</div>
              <div class="col-6">
              {{$datas->age_id}}
              </div>
              
              
               <div class="offset-2 col-4 index">メールアドレス</div>
               <div class="col-6">{{$datas->email}}</div>
               
               <div class="offset-2 col-4">メール送信可否</div>
               <div class="col-6">
                   @if($datas->is_send_email)
                   <p>送信許可</p>
                   @else
                   <p>送信拒否</p>
                   @endif
               </div>
           
           <div class="offset-2 col-4">ご意見</div>
           <div class="col-6">
             {{$datas->feedback}}
           </div>
           
           <div class="offset-2 col-4">登録日時</div>
           <div class="col-6">
             {{$datas->created_at}}
           </div>
    
           <div class="col-12 center">
               <button id="btn" class="btn bg-success" type="button" onclick="history.back()">一覧に戻る</button>
               <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal3">
                  削除
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal3Label">削除確認</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                    　　本当に削除してよろしいですか？
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                        <input id="submit-btn" class="btn bg-danger text-white" type="submit" value="削除"/>
                      </div>
                    </div>
                  </div>
                </div>

        　　</div> 
         </div>
       </form> 
       
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>