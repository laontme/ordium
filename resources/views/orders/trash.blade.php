@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Удалено</div>

                    <div class="card-body">
                        @foreach($orders as $order)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">

                                    <div class="fw-bold">
                                        {{$order->title}}
                                        <span class="badge bg-primary rounded-pill">O-{{$order->id}}</span>
                                        <span class="badge bg-success rounded-pill">{{$order->created_at}}</span>
                                    </div>

                                    {{\Illuminate\Support\Str::limit($order->description, 300)}}

{{--                                    @if($order->id == \Illuminate\Support\Facades\Auth::id())--}}
                                    <div class="mt-2">
                                        <a href="{{route("orders.restore", ["id" => $order->id], false)}}" class="btn btn-secondary">Восстановить</a>
                                    </div>
{{--                                    @endif--}}

                                </div>
                            </li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
