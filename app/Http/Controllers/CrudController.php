<?php
public function index(Request $request)
{
  #キーワード受け取り
  $keyword = $request->input('keyword');

  #クエリ生成
  $query = User::query();

  #もしキーワードがあったら
  if(!empty($keyword))
  {
    $query->where('name','like','%'.$keyword.'%')->orWhere('mail','like','%'.$keyword.'%');
  }

  #ページネーション
  $data = $query->orderBy('created_at','desc')->paginate(10);
  return view('crud.index')->with('data',$data)
  ->with('keyword',$keyword)
  ->with('message','ユーザーリスト');
}
