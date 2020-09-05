<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\ages;
use Log;

class IndexController extends Controller
{
    public function index() {
        // $items = DB::select('select * from ages order by sort');
        //以下授業まで消さないで！
        // 簡易的な書き方
        // DB::tableでtable指定 ascで昇順
        // $items = DB::table('ages')->orderBy('sort', 'asc')-> get();
        //
        //modelでの取得方法
        //1.use する
        //$items = ages::all();
        //or
        $itemInstance = ages::orderBy('sort', 'asc');
        $items = $itemInstance->get();
        // https://qiita.com/shosho/items/2fe88dc92aa3739e8602
        // Log::debug($items);
        return view('index',['items' => $items]);
    }
    public $validateMessages = [
        "required" => "必須項目です。",
        "email" => "メールアドレスの形式で入力してください。",
        "max:10000" => "10000文字以内で入力してください。",
        ];
    public $validateRules =[
        'name' => 'required|string|max:200',
        'gender' => 'required',
        'ages' =>'required',
        'mail' =>'required|email|max:255',
        'permission' =>'boolean',
        'description' =>'string|max:10000|nullable',
       ];
    public function post(Request $request) {
       $validator = Validator::make($request->all(), $this->validateRules,$this->validateMessages);
      // バリデーションエラーだった場合
      if ($validator->fails()) {
            return redirect('index')
            ->withErrors($validator)
            ->withInput();
      }
        $name = $request->name;
        $ages = $request->ages;
        $mail = $request->mail;
        $permission = $request->permission;

        $description = $request->description;
        $num = $request->gender;
        if($num === 1) {
            $gender = '男性';
        }else{
            $gender = '女性';
        }
        $data = [
            'name' => $name,
            'gender' => $gender,
            'ages' => $ages,
            'mail' => $mail,
            'permission' => $permission,
            'description' => $description,
            ];
        return view('confirm', $data);
    }
    
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validateRules,$this->validateMessages);
      // バリデーションエラーだった場合
      if ($validator->fails()) {
            return redirect('index')
            ->withErrors($validator)
            ->withInput();
      }
      
        $name = $request->name;
        $gender = $request->gender;
        $ages = $request->ages;
        $mail = $request->mail;
        $permission = $request->permission;
        $description = $request->description;
        $genderNum = $gender === '男性'? 1 : 2;
        $permissionNum = $permission ? 1 : 0;
        
        $param = [
            'name' => $name,
            'gender' => $genderNum,
            'ages' => $ages,
            'mail' => $mail,
            'permission' => $permissionNum,
            'description' => $description,
            ];
        DB::insert('insert into answers(fullname,gender,age_id,email,is_send_email,feedback) 
        values(:name,:gender,:ages,:mail,:permission,:description)',$param);
        return redirect('index');
    }
}
