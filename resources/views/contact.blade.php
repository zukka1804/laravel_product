/views/contact.blade.php

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5 text-center">
        <div class="col-8">
            <p class="h2">お問い合わせ</p>
        </div>
        <div class="col-md-8">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="contact">お問い合わせ内容をご記入ください。</label>
                    <textarea class="form-control" id="contact" rows="3" name="contact"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">送信</button>
            </form>
        </div>
    </div>
</div>
@endsection