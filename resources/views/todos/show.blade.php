@extends('layouts.app')

@section('title')
    Todo Show
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h3 fw-bold">{{ $todo->title }}</div>
                    <div class="card-body">
                        <ul class="list-group pe-0">
                                <li class="list-group-item">
                                    {{ $todo->description }}
                                </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="d-flex mb-3 me-3">
                        <a class="btn btn-warning" href="{{ route("todos.edit" , ["todo" => $todo->id]) }}">ویرایش</a>

                        <form class="me-2" method="POST" action="{{ route("todos.delete" , ["todo" => $todo->id]) }}">
                            @csrf
                            @method("delete")
                            <button class="btn btn-danger">حذف</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection