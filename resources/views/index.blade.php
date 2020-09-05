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
    span {
        color: red;
        padding-left: 20px;
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
     label, input[type='checkbox'] {
     cursor: pointer;
     }
     #check-box {
         border-radius: 0px;
         padding: 10px;
     }
     #submit-btn {
         padding: 10px 20px;
     }
     .red {
         color: red;
     }
    </style>
    <body>

       <form class="container" action="/confirm" method="post">
           @csrf
           <div class="row">
               
                <h1 class="col-12 center">システムへのご感想をお聞かせください</h1>
                
                <div class="offset-2 col-4 index">氏名<span>※</span></div>
                <div class="col-6">
                    <input class="box" type="text" name="name" placeholder="入力してください" value = "{{ old('name') }}"/>
                    @if($errors->has('name'))<p class="red">{{ $errors->first('name') }}</p> @endif
                </div>
                
               <div class="offset-2 col-4">性別<span>※</span></div>
               <div class="col-6">
               <input class="radio-btn" type="radio" name="gender" value="1" 
               @if(old('gender') !== "2") checked="checked" @endif/>男性
               <input class="radio-btn" type="radio" name="gender" value="2" 
               @if(old('gender') === "2") checked="checked" @endif/>女性   
               </div>
              <div class="offset-2 col-4 index">年代<span>※</span></div>
              <div class="col-6">
              <select class="box" name="ages">
               <option value="" selected>選択してください</option> 
               @foreach ($items as $item)
               <option value="{{$item->age}}" @if(old('ages')===$item->age) selected @endif>{{$item->age}}</option>
               @endforeach
              </select> 
                @if($errors->has('ages'))<p class="red">{{ $errors->first('ages') }}</p> @endif
              </div>
              
              
               <div class="offset-2 col-4 index">メールアドレス<span>※</span></div>
               <div class="col-6">
                 <input class="box" type="email" name="mail" placeholder="入力してください" value = "{{ old('mail') }}"/>
                 @if($errors->has('mail'))<p class="red">{{ $errors->first('mail') }}</p> @endif
               </div>
               
               <div class="offset-2 col-4">メール送信可否</div>
               <div class="col-6">登録したメールアドレスにメールマガジンをお送りしてよろしいですか？</div> 
 
           <div class="offset-6 col-6"><label for="sample-checkbox">
               <input id="check-box" type="checkbox" name="permission" value="1"  @if(old('permission')!== '1') checked="" @else checked="checked" @endif/>送信を許可します
           </label></div>
           
           <div class="offset-2 col-4">ご意見</div>
           <div class="col-6">
             <textarea id="text-box" name="description" cols="40" rows="4" placeholder="入力してください">{{ old('description') }}</textarea> 
             @if($errors->has('description'))<p class="red">{{ $errors->first('description') }}</p> @endif
           </div>
    
           <div class="col-12 center"><input id="submit-btn" type="submit" value="確認"/></div> 
         </div>
       </form> 
       
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>