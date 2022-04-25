<?php

namespace App\Http\Controllers;
use Auth; // 冒頭付近に追加
use App\Models\User; // 追加
use Illuminate\Http\Request;
use App\Models\Book;
use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	// 中略
	//
	// 管理者ページ ※便宜的にBookコントローラーに作成
	public function adminIndex()
	{
		// 1対多の複数の例
		$users = User::with('books')->get();
		return view('admin', ['users' => $users]);
	}

     
     
     
     
     
     
     
    public function index()
    {
        $books = Book::orderBy('created_at', 'asc')->get();
        return view('books', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// バリデーション
	    $validator = Validator::make($request->all(), [
	        'donator_name'   => 'required | min:3 | max:255',
	        'zipcode' => 'required | min:1 | max:8',
	        'address'   => 'required | min:5 | max:255',
	        'meet'   => 'required | min:1 | max:255',
	        'published'   => 'required',
	    ]);

			// バリデーション:エラー時の処理
	    if ($validator->fails()) {
	        return redirect('/')
	            ->withInput()
	            ->withErrors($validator);
	    }
			
		// 登録処理
        $book = new Book;
        $book->user_id    =  Auth::id(); // ここを追加
        $book->donator_name =    $request->donator_name;
        $book->zipcode =  $request->zipcode;
        $book->address =  $request->address;
        $book->meet =  $request->meet;
        $book->published =    $request->published;
        $book->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('booksedit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
		// バリデーション
		$validator = Validator::make($request->all(), [
		    'id' => 'required', // storeに対しての追加分
		    'donator_name'   => 'required | min:3 | max:255',
	        'zipcode' => 'required | min:1 | max:8',
	        'address'   => 'required | min:5 | max:255',
	        'meet'   => 'required | min:1 | max:255',
	        'published'   => 'required',
		]);

		// バリデーション:エラー
		if ($validator->fails()) {
		    return redirect('/booksedit/'.$request->id)
		        ->withInput()
		        ->withErrors($validator);
		}

        $book = Book::find($request->id);
        $book->donator_name =    $request->donator_name;
        $book->zipcode =  $request->zipcode;
        $book->address =  $request->address;
        $book->meet =  $request->meet;
        $book->published =    $request->published;
        $book->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/');
    }
}