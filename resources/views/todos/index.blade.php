@extends('layouts.app')

@section('title')
    Todo Index
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
                    <h1 class="h2 fw-bold">صفحه اصلی</h1>
                    <a class="btn btn-primary" href="{{ route('todos.create') }}">ایجاد تسک</a>
                </div>
                <div class="card">
                    <div class="card-header h3 fw-bold">تسک ها</div>
                    <div class="card-body">
                        <ul class="list-group pe-0">
                            @foreach ($todos as $todo)
                                <li class="list-group-item d-flex justify-content-between">
                                    {{ $todo->title }}
                                    <div>
                                        <a class="btn btn-primary" href="{{ route('todos.show' , ['todo' => $todo->id]) }}">نمایش</a>
                                        @if ($todo->is_complete == 0)
                                            <a class="btn btn-success" href="{{ route('todos.completed' , ['todo' => $todo->id]) }}">انجام شد</a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5">{{ $todos->links() }}</div>
            </div>
            
        </div>
    </div>
@endsection