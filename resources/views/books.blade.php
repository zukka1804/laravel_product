@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
   
    <div class="card-body">
         <div class="p-3 mb-2 bg-primary text-white">
        <div class="card-title">
            寄付希望者入力フォーム
        </div>
    </div>
        <!-- ↓バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- ↑バリデーションエラーの表示に使用-->

        <!-- 本登録フォーム -->
    @if(Auth::check())
        <form action="{{ url('books') }}" method="POST" class="form-horizontal">
            @csrf
            <!-- 本のタイトル -->
            <div class="form-group col-md-6 p-2">
                <label for="donator_name" class="col-sm-3 control-label">寄付希望者名</label>
                <input type="text" name="donator_name" class="form-control" id="donator_name" value="{{ old('donator_name') }}">
            </div>
            <!-- 冊数 -->
            <div class="form-group col-md-6 p-2">
                <label for="zipcode" class="col-sm-3 control-label">郵便番号</label>
                <input type="text" name="zipcode" class="form-control" id="zipcode" value="{{ old('zipcode') }}">
            </div>
            <!-- 金額 -->
            <div class="form-group col-md-6 p-2">
                <label for="address" class="col-sm-3 control-label">住所</label>
                <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
            </div>
            <!-- 面談候補日 -->
            <div class="form-group col-md-6 p-2">
                <label for="meet" class="col-sm-3 control-label">面談可能な日時<br/>(ヘルパー在室日時）</label>
                <input type="text" name="meet" class="form-control" id="meet" value="{{ old('meet') }}">
            </div>
            
            <!-- 公開日 -->
            <div class="form-group col-md-6 p-2">
                <label for="published" class="col-sm-3 control-label">最短面談可能日</label>
                <input type="date" name="published" class="form-control" id="published" value="{{ old('published') }}">
            </div>
            <!-- 本 登録ボタン -->
            <div class="form-group p-2">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    @endif
    </div>
	<!-- Book: 既に登録されてる本のリスト -->
    @if (count($books) > 0)
        <div class="card-body">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <thead>
                    <th>あなたが登録した寄付希望者</th>
                    <th>&nbsp;</th>
                </thead>
                <!-- テーブル本体 -->
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <!-- 本タイトル -->
                            <td class="table-text">
                     @if($book->user_id === Auth::id())
                                <div>{{ $book->donator_name }}　様</div>
                     @endif
                            </td>
                            <!-- 本: 削除ボタン -->
                            <td>
                        @if($book->user_id === Auth::id())
                                <form action="{{ url('book/'.$book->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        削除
                                    </button>
                                </form>
                        @endif
                            </td>
                            <!-- 本: 更新ボタン -->
                            <td>
                        @if($book->user_id === Auth::id())
                                <a href="{{ url('booksedit/'.$book->id) }}">
                                    <button type="submit" class="btn btn-primary">更新</button>
                                </a>
                        @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection