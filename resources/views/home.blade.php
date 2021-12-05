@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            Вполнено:
            <div class="progress mb-4" style="height: 30px;">
                <div class="progress-bar" role="progressbar" style="width: {{$completed}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{round($completed, 1)}}%</div>
            </div>
            <div class="card">
                <div class="card-header">Последние приказы</div>
                <div class="card-body">
                    <ul class="list-group list-group mb-3">

                        @foreach ($orders as $order)
                            <x-orders.card :order="$order"/>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
