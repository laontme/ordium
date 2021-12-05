@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создать приказ</div>
                    <div class="card-body">
                        <form method="POST" action="{{route("orders.insert", $absolute = false)}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Заголовок</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title"
                                           value="{{ old('title') }}" required>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Текст</label>

                                <div class="col-md-6">
                                    <textarea name="description" id="description" cols="30" rows="5"
                                              class="form-control @error('description') is-invalid @enderror"
                                              required>{{ old('description') }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="assignments" class="col-md-4 col-form-label text-md-right">Назначить</label>

                                <div class="col-md-6">
                                    @foreach($users as $user)
                                        <input type="checkbox" name="assignments[]" id="assignment-{{$user->id}}" value="{{$user->id}}">
                                        <label for="assignment-{{$user->id}}">{{$user->name}} ({{Str::lower($user->role->title)}})</label>
                                        <br>
                                    @endforeach

{{--                                    <select name="assignments[]" id="assignments" multiple--}}
{{--                                            class="form-select @error('assignments') is-invalid @enderror" required>--}}
{{--                                        @foreach($users as $user)--}}
{{--                                            @if (collect(old('assignments'))->contains($user->id))--}}
{{--                                                <option selected value="{{ $user->id }}">{{$user->name}}</option>--}}
{{--                                            @else--}}
{{--                                                <option value="{{ $user->id }}">{{$user->name}}</option>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}

                                    @error('assignments')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="emissions" class="col-md-4 col-form-label text-md-right">Подписывают</label>

                                <div class="col-md-6">

{{--                                    <select name="emissions[]" id="emissions" multiple--}}
{{--                                            class="form-select @error('emissions') is-invalid @enderror" required>--}}
                                    @foreach($users as $user)
                                        @if($user->role_id != 4)
                                            <input type="checkbox" name="emissions[]" id="emissions-{{$user->id}}" value="{{$user->id}}">
                                            <label for="emissions-{{$user->id}}">{{$user->name}} ({{Str::lower($user->role->title)}})</label>
                                            <br>
                                        @endif
                                    @endforeach
{{--                                        @foreach($users as $user)--}}
{{--                                            @if (collect(old('emissions'))->contains($user->id))--}}
{{--                                                <option selected value="{{ $user->id }}">{{$user->name}}</option>--}}
{{--                                            @else--}}
{{--                                                <option value="{{ $user->id }}">{{$user->name}}</option>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}

                                    @error('emissions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <input type="submit" class="btn btn-primary" value="Создать">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

