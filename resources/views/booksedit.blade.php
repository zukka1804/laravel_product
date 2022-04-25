@extends('layouts.app')
@section('content')
    <div class="row container">
        <div class="col-md-12">
            <!-- ↓バリデーションエラーの表示に使用-->
						@include('common.errors')
            <!-- ↑バリデーションエラーの表示に使用-->
            <form action="{{ url('books/update') }}" method="POST">
                <!-- donator_name -->
                <div class="form-group p-2">
                    <label for="donator_name">寄付希望者名</label>
                    <input type="text" name="donator_name" class="form-control" id="donator_name" value="{{$book->donator_name}}">
                </div>
                <!--/ donator_name -->
                
                <!-- zipcode -->
                <div class="form-group p-2">
                    <label for="zipcode">郵便番号</label>
                    <input type="text" name="zipcode" class="form-control" id="zipcode" value="{{$book->zipcode}}">
                </div>
                <!--/ zipcode -->
                
                <!-- address -->
                <div class="form-group p-2">
                    <label for="address">住所</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{$book->address}}">
                </div>
                <!--/ address -->
                
                <!-- meet -->
                <div class="form-group p-2">
                    <label for="meet">面談候補日</label>
                    <input type="text" name="meet" class="form-control" id="meet" value="{{$book->meet}}">
                </div>
                <!--/ meet -->             
                
                <!-- published -->
                <div class="form-group p-2">
                    <label for="published">登録日</label>
                    <input type="date" name="published" class="form-control" id="published" value="{{$book->published}}">
                </div>
                <!--/ published -->
                
                <!-- Save ボタン/Back ボタン -->
                <div class="form-group p-2">
	                <div class="well well-sm">
	                    <button type="submit" class="btn btn-primary">Save</button>
	                    <a class="btn btn-link pull-right" href="{{ url('/') }}"> Back</a>
	                </div>
                </div>
                <!--/ Save ボタン/Back ボタン -->
                
                <!-- id 値を送信 -->
                <input type="hidden" name="id" value="{{$book->id}}" />
                <!--/ id 値を送信 -->
                
                <!-- CSRF -->
                @csrf
                <!--/ CSRF -->
            </form>
        </div>
    </div>
@endsection