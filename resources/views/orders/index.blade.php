@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Все приказы</div>
                    <div class="card-body">
                        <ul class="list-group list-group mb-3">

                            @foreach ($orders as $order)
                                @if($order->completed)
                                    <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-start">
                                @else
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                @endif
                                    <div class="ms-2 me-auto">

                                        <div class="fw-bold">
                                            <a href="{{ route("orders.show", ["id" => $order->id], false) }}"
                                               class="link-primary">{{$order->title}}</a>
                                            <span class="badge bg-primary rounded-pill">O-{{$order->id}}</span>
                                            <span class="badge bg-success rounded-pill">{{$order->created_at}}</span>
                                        </div>

                                        {{\Illuminate\Support\Str::limit($order->description, 300)}}

                                        <div class="mt-2">
                                            Подписан: {{$order->issuedBy->name}}
                                        </div>

                                        <div class="mt-2">
                                            Назначено: {{$order->assignedTo->name}}
                                        </div>

                                        @if($order->assignedTo->id == \Illuminate\Support\Facades\Auth::id() && !$order->completed)
                                            <div class="mt-2">
                                                <a href="{{route("orders.complete", ["id" => $order->id], false)}}" class="btn btn-primary">Выполнено</a>
                                            </div>
                                        @endif

                                        @if($order->issuedBy->id == \Illuminate\Support\Facades\Auth::id())
                                            <div class="mt-2">
                                                <a href="{{route("orders.delete", ["id" => $order->id], false)}}" class="btn btn-danger">Удалить</a>
                                            </div>

                                            @if(!$order->completed)
                                                <div class="mt-2">
                                                    <a href="{{route("orders.edit", ["id" => $order->id], false)}}" class="btn btn-warning">Изменить</a>
                                                </div>
                                            @endif
                                        @endif

                                    </div>
                                </li>
                            @endforeach

                        </ul>

                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

