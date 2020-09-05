<!DOCTYPE html>
<html lanag="ja">
    <head>
     <meta charset="utf-8"/>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        .padding {
            padding:10px;
        }
        .name-box {
            padding-right: 50px;
        }
        .age-box {
            padding-right: 150px;
        }
        #form-box {
            border: solid 1px gray;
            padding-top: 50px;
        }
        #index-box {
            padding: 100px 0;
        }
        .col-4,.col-6,.col-8,.col-12 {
            padding-bottom: 50px;
        }
        table td {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        table th {
            
        }
    </style>
    </head>
    <body>
        <div class="container">
         <h1 class="col-12">アンケート管理システム</h1>
        <form action="{{url('system/answer/index')}}" method="GET" class="row" id="form-box" name="searchForm">
            @csrf
            <!--氏名検索-->
            <div class="form-inline col-4">
              <label for="name" class="padding">氏名</label>
                <input type="text" name="name" class="form-control name-box" id="name" @isset($name) value="{{$name}}" @else value="" @endisset placeholder="入力してください">
              </div>
           <!--年代-->
           <div class="form-inline col-4">
            <label class="padding">年代</label>
            <select class="custom-select age-box" name="ages">
              <option value="" selected>すべて</option> 
               @foreach ($ageDatas as $ageData)
               <option value="{{$ageData->age}}" @if($ages === $ageData->age) selected @endif>{{$ageData->age}}</option>
               @endforeach
            </select>
           </div>
           <!--性別-->
           <div class="col-4">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="" checked>
              <label class="form-check-label padding" for="exampleRadios1">
                すべて
              </label>
              <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="1" @if($gender == 1) checked="checked" @endif>
              <label class="form-check-label padding" for="exampleRadios2">
                男性
              </label>
              <input class="form-check-input" type="radio" name="gender" id="exampleRadios3" value="2" @if($gender == 2) checked="checked" @endif>
              <label class="form-check-label padding" for="exampleRadios3">
                女性
              </label>
           </div>
          </div>
           <!--登録日-->
               <div class="form-inline col-8">
              <label for="date" class="padding">登録日</label>
                <input type="date" name="startDate" class="form-control name-box" id="date" 
                @isset($startDate) value="{{$startDate}}" @else value="" @endisset placeholder="入力してください">
              <label for="date" class="padding">〜</label>
                <input type="date" name="endDate" class="form-control name-box" id="date" 
                @isset($endDate) value="{{$endDate}}" @else value="" @endisset placeholder="入力してください">
              </div>
           <!--送信許可-->
           <div class="form-inline col-4">
               <span class="padding">メール送信許可</span>
               <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1" name="permission" value="1" @if($permission == 1) checked="checked" @endif>
                  <label class="custom-control-label" for="customCheck1">許可のみ</label>
                </div>
           </div>
           <!--キーワード-->
           <div class="form-inline col-6">
              <label for="keyword" class="padding">キーワード</label>
                <input type="text" name="keyword" class="form-control name-box" id="keyword"
                @isset($keyword) value="{{$keyword}}" @else value="" @endisset placeholder="キーワードを入力">
           </div>
        <!--ぼたん-->
        <div class="d-flex justify-content-center col-12">
            <button type="button" onclick="formReset()" class="btn btn-outline-primary">リセット</button>
            <input class="btn btn-success" type="submit" value="検索"/>
        </div>
        </form>
       </div>
        
        <div class="container" id="index-box">
        @if(session('msg'))
        <p class="bg-primary text-center text-white py-4">{{session('msg')}}</p>
        @endif
        <form class="row" method="POST" action="/system/answer/index">
            @csrf
            <div class="col-6">
                
             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal3">
                  選択したアンケートを削除
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
                
                    　　全{{$items->total()}}件中
                    　　{{$items->firstItem()}}~{{$items->lastItem()}}件表示
            </div>
            
           <div class="col-6">
            {{ $items->links()}}
           </div>
           
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th>
                  <input type="checkbox" name="all" value="1" id="checkAll"><span class="padding">全選択</span>
                  </th>
                  <th>ID</th>
                  <th>氏名</th>
                  <th>性別</th>
                  <th>年代</th>
                  <th>内容</th>
                </tr>
              </thead>
                <tbody id="datas">
                 @foreach($items as $item)
                <tr>
                  <td>
                　<input type="checkbox" name="datas[]" value="{{$item->id}}" class="data"><span class="padding">選択</span>
                  </td>
                  <td>{{$item->id}}</td>
                  <td>{{$item->fullname}}</td>
                  <td>@if($item->gender == 1)男性@else女性@endif</td>
                  <td>{{$item->age_id}}</td>
                  <td>{{$item->feedback}}</td>
                  <td>
                     <a href="/system/answer/{{$item->id}}">
                      <button type="button" class="btn btn-primary">詳細</button>
                     </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </form>
             @if($items->total() == 0)
             <div>
             <p class="bg-warning text-center text-secondary py-4">該当するアンケートがありません。</p>
             </div>
             @endif
        </div>
        </div>
        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        function formReset() {
            document.searchForm.reset();
          }
        $('#checkAll').on('change', function() {
          // 「選択肢」のチェック状態を切替える
          $('.data').prop('checked', $(this).is(':checked'));
        });
        
         $('.data').on('change', function() {
          // 「全選択」のチェック状態を切替える
         if ($('#datas :checked').length == $('#items :input').length){
            $('#checkAll').prop('checked', true);
          }else{
            $('#checkAll').prop('checked', false);
          }
        });
    </script> 
    </body>
</html>
