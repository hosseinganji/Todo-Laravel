@extends('layouts.app')

@section('title')
    Todo Create
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">{{ count($errors) }} خطا وجود دارد</h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <hr>
                            <p class="mb-0">لطفا خطا @if(count($errors) == 1) @else {{ "ها" }} @endif را برطرف کنید و دوباره سعی کنید.</p>
                        </div>
                @endif
                <div class="card">
                    <div class="card-header h3 fw-bold">ایجاد تسک</div>
                    <div class="card-body">
                        <form action="{{ route("todos.store") }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input class="form-control @error('title')is-invalid @enderror" type="text" name="title" id="title" value="{{ old("title") }}">
                                {{-- @error('title')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                            </div>
                            <div class="form-group mt-3">
                                <label for="description">توضیحات</label>
                                <textarea class="form-control @error('description')is-invalid @enderror" type="text" name="description" id="description">{{ old("description") }}</textarea>
                                {{-- @error('description')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">ارسال</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection