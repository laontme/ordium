@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Подписано вами</div>
                    <div class="card-body">
                        <ul class="list-group list-group mb-3">

                            @foreach($orders as $order)
                                <x-orders.card :order="$order" :has-link="false"/>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
