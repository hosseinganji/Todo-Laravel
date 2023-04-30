<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index(){

        $todos = Todo::latest()->paginate(5);
        
        return view("todos.index" , compact("todos"));
    }   
    
    public function show(Todo $todo){

        return view("todos.show" , compact("todo"));
    }   

    public function create(){

        return view("todos.create");
    }
    
    public function store(Request $request){

        // DB::table("todos")->insert([
        //     'title' => $request->title,
        //     'description' => $request->description
        // ]);
        // return "true";
        $request->validate([
            "title" => "required",
            "description" => "required"

        ]);

        Todo::create([
            "title" => $request->title,
            "description" => $request->description
        ]);
        // alert()->success('با تشکر', 'تسک با موفقیت ایجاد شد')->autoClose(10000);
        // alert()->question('Are you sure?','You won\'t be able to revert this!');
        // alert()->question('Title','Lorem Lorem Lorem');

        toast('تسک با موفقیت ایجاد شد!','success')->position('top')->autoClose(5000)->hideCloseButton();

        return redirect()->route("todos.index");
    }

    public function edit(Todo $todo){

        return view("todos.edit" , compact("todo"));
    }

    public function update(Todo $todo , Request $request){

        $request->validate([
            "title" => "required",
            "description" => "required"
        ]);

        $todo->update([
            "title" => $request->title,
            "description" => $request->description
        ]);

            toast('تسک با موفقیت ویرایش شد!','success')->position('top')->autoClose(5000)->hideCloseButton();
            return redirect()->route("todos.index");

    }

    public function delete(Todo $todo){
        $todo->delete();
        toast('تسک با موفقیت حذف شد!','error')->position('top')->autoClose(5000)->hideCloseButton();
        return redirect()->route("todos.index");
    }
    
    public function completed(Todo $todo){
        $todo->update([
            "is_complete" => 1
        ]);
        toast('تسک مورد نظر به وضعیت انجام شده تغییر پیدا کرد!','success')->position('top')->autoClose(5000)->hideCloseButton();
        return redirect()->route("todos.index");
    }

    
}
