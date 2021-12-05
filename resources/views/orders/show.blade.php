@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="list-group list-group mb-3">
                    <x-orders.card :order="$order" :short="false" :has-link="false"/>
                </ul>
            </div>
        </div>
    </div>
@endsection

