@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('寄付希望者管理ページ') }}</div>

                <div class="card-body">
                    <div class="alert alert-primary">
                        <div>寄付希望者の管理ページです</div>
                        <div>最短面談日以降の希望日に本人宅で打ち合わせをお願いします。</div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <th>支援者氏名</th>
                            <th>寄付希望者名</th>
                            <th>希望日時</th>
                            <th>最短面談日</th>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                @if($user->books() !== null)
                                <td>
                                    
                                        @foreach ($user->books as $books)
                                            {{$books->donator_name}}
                                        @endforeach
                                    
                                @endif
                                </td>
                                 @if($user->books() !== null)
                                <td>
                                    
                                        @foreach ($user->books as $books)
                                            {{$books->meet}}
                                        @endforeach
                                    
                                @endif
                                </td>
                                 @if($user->books() !== null)
                                <td>
                                    
                                        @foreach ($user->books as $books)
                                            {{$books->published}}
                                        @endforeach
                                    
                                @endif
                                </td>
                                
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--ここを編集-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection