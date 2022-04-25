@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('寄付希望者一覧') }}</div>

                <div class="card-body">
    <div class="alert alert-primary">
        <div>あなたが登録した寄付希望者様の一覧です</div>
        <div>面談可能日当について変更がある場合には</br>更新や削除をお願いします。</div>
    </div>
    <table class="table table-striped ">
        <!-- テーブルヘッダ -->
        <thead>
            <th>寄付登録者一覧</th>
            <th>&nbsp;</th>
        </thead>
        <!-- テーブル本体 -->
        <tbody>
            @if(isset($books))
                @foreach ($books as $book)
                    <tr>
                        <!-- 本タイトル -->
                        <td class="table-text">
                            <div>{{ $book->donator_name }}</div>
                        </td>
                        <td>
                            <form action="{{ url('book/'.$book->id.'/like') }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    削除
                                </button>
                            </form>
                        </td>
                        <!-- 本: 更新ボタン -->
                        <td>
                            <a href="{{ url('booksedit/'.$book->id) }}">
                                <button type="submit" class="btn btn-primary">更新</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
