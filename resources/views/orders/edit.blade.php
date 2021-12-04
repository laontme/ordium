@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Изменить приказ <span class="badge bg-primary rounded-pill">O-{{$order->id}}</span></div>
                    <div class="card-body">
                        <form method="POST" action="{{route("orders.update", ["id" => $order->id], false)}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Заголовок</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $order->title) }}" required>

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
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $order->description) }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="assigned" class="col-md-4 col-form-label text-md-right">Назначить</label>

                                <div class="col-md-6">

                                    <select name="assigned" id="assigned" class="form-select @error('assigned') is-invalid @enderror" required>
                                        @foreach($users as $user)
                                            @if (old('assigned', $order->assignedTo->id) == $user->id)
                                                <option selected value="{{ $user->id }}">{{$user->name}}</option>
                                            @else
                                                <option value="{{ $user->id }}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <input type="submit" class="btn btn-primary" value="Сохранить">
                            </div>
                        </form>
{{--                        <ul class="list-group list-group mb-3">--}}

{{--                            @foreach ($orders as $order)--}}
{{--                                <li class="list-group-item d-flex justify-content-between align-items-start">--}}
{{--                                    <div class="ms-2 me-auto">--}}

{{--                                        <div class="fw-bold">--}}
{{--                                            <a href="{{ route("orders.show", ["id" => $order->id], false) }}"--}}
{{--                                               class="link-primary">{{$order->title}}</a>--}}
{{--                                            <span class="badge bg-primary rounded-pill">O-{{$order->id}}</span>--}}
{{--                                            <span class="badge bg-success rounded-pill">{{$order->created_at}}</span>--}}
{{--                                        </div>--}}

{{--                                        {{\Illuminate\Support\Str::limit($order->description, 300)}}--}}

{{--                                        <div class="mt-2">--}}
{{--                                            Подписан: {{$order->issuedBy->name}}--}}
{{--                                        </div>--}}

{{--                                        <div class="mt-2">--}}
{{--                                            Назначено: {{$order->assignedTo->name}}--}}
{{--                                        </div>--}}

{{--                                        @if($order->assignedTo->id == \Illuminate\Support\Facades\Auth::id())--}}
{{--                                            <div class="mt-2">--}}
{{--                                                <a href="{{route("orders.complete", ["id" => $order->id], false)}}" class="btn btn-primary">Выполнено</a>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}

{{--                                        @if($order->issuedBy->id == \Illuminate\Support\Facades\Auth::id())--}}
{{--                                            <div class="mt-2">--}}
{{--                                                <a href="{{route("orders.delete", ["id" => $order->id], false)}}" class="btn btn-danger">Удалить</a>--}}
{{--                                            </div>--}}

{{--                                            <div class="mt-2">--}}
{{--                                                <a href="{{route("orders.edit", ["id" => $order->id], false)}}" class="btn btn-warning">Изменить</a>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}

{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}

{{--                        </ul>--}}

{{--                        {{ $orders->links() }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

