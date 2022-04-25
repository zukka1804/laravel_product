<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\TestMail;      //Mailableクラス
use Mail;

class MailController extends Controller
{
    public function index()
    {
        return view('mail.index');
    }

    public function send(Request $request)
    {
        $rules = [
            'name' => 'required|',
            'message' => 'required'
        ];

        $messages = [
            'name.required' => '名前を入力してください。',
            'message.required' => 'メッセージを入力してください。'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect('/mail')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validate();

        Mail::to('admin@hoge.co.jp')->send(new TestMail($data));

        session()->flash('success', '送信しました！');
        return back();
    }
}