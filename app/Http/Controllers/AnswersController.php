<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\answers;
use App\ages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class AnswersController extends Controller
{
    public function index(Request $request)
    {
      if(Auth::check()){
            $name = $request->input('name');
            $ages = $request->input('ages');
            $gender = $request->input('gender');
            $startDate = $request->input('startDate');
            $endDate = $request->input('endDate');
            $permission = $request->input('permission');
            $keyword = $request->input('keyword');
            $datas =[
                'name' => $name,
                'ages' => $ages,
                'gender' => $gender,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'permission' => $permission,
                'keyword' => $keyword,
                ];
            
            $query = answers::query();
            
            if(!empty($name)) {
            $query->where('fullname', 'like', '%'.$name.'%');
            }
            if(!empty($ages)) {
            $query->where('age_id', $ages);
            }
            if($gender == 1){
                $query->where('gender', $gender);
            }else if($gender == 2){
                $query->where('gender', $gender);
            }
            if(!empty($startDate)){
                $query->where('created_at','>=',$startDate);
            }
            if(!empty($endDate)){
                $query->where('created_at','<=',$startDate);
            }
            if($permission == 1){
                $query->where('is_send_email',$permission);
            }
            if(!empty($keyword)) {
            $query->where('mail', 'like', '%'.$keyword.'%')
                  ->orWhere('feedback', 'like', '%'.$keyword.'%');
            }
            
           $ageDatas = ages::all();
           $items = $query->paginate(10);
           return view('list')->with([
           'ageDatas' => $ageDatas,
           'items' => $items,
           'name' => $name,
           'ages' => $ages,
           'gender' => $gender,
           'startDate' => $startDate,
           'endDate' => $endDate,
           'permission' => $permission,
           'keyword' => $keyword,
          ]);
      }else{
        return redirect('system');
      }
    }
    public function show($id){
        $param = ['id' => $id];
        $datas = DB::select('select * from answers where id = :id',$param);
        return view('show', ['datas' => $datas[0]]);
    }
    public function remove(Request $request){
        answers::find($request->id)->delete();
        $msg = '削除しました。';
        return redirect('system/answer/index')->with([
            'msg' => $msg,
            ]);
    }
    public function selectDelete(Request $request){
        $datas = $request->datas;
        foreach ($datas as $id) {
        answers::find($id)->delete();
       }
        $msg = '削除しました。';
        return redirect('system/answer/index')->with([
            'msg' => $msg,
            ]);
    }
}
