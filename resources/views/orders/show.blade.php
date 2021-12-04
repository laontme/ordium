@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="list-group list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                {{$order->title}}
                                <span class="badge bg-primary rounded-pill">O-{{$order->id}}</span>
                                <span class="badge bg-success rounded-pill">{{$order->created_at}}</span>
                            </div>
                            <div class="my-2">
                                Подписан: {{$order->issuedBy->name}}
                            </div>
                            <div class="my-2">
                                Назначено: {{$order->assignedTo->name}}
                            </div>
                            {{$order->description}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

