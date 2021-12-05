@if($order->completed)
    <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-success">
@else
    <li class="list-group-item d-flex justify-content-between align-items-start">
        @endif
        <div class="ms-2 me-auto">

            <div class="fw-bold">
                <span class="badge bg-primary rounded-pill">№{{$order->id}}</span>
                @if($hasLink)
                    <a href="{{ route("orders.show", ["id" => $order->id], false) }}" class="link-primary">
                        {{$order->title}}
                    </a>
                @else
                    {{$order->title}}
                @endif
                <span class="badge bg-success rounded-pill">{{$date}}</span>
            </div>

            @if($short)
                {{\Illuminate\Support\Str::limit($order->description, 300)}}
            @else
                {{$order->description}}
            @endif

            <div class="mt-2">
                Подписан:
                @forelse($order->emissions as $emission)
                    @if($loop->last)
                        @if($emission->id == auth()->id())
                            <b>
                                <code>{{$emission->name}} ({{\Illuminate\Support\Str::lower($emission->role->title)}})</code>
                            </b>
                        @else
                            <code>{{$emission->name}} ({{\Illuminate\Support\Str::lower($emission->role->title)}})</code>
                        @endif
                    @else
                        @if($emission->id == auth()->id())
                            <b>
                                <code>{{$emission->name}} ({{\Illuminate\Support\Str::lower($emission->role->title)}})</code>
                            </b>,
                        @else
                            <code>{{$emission->name}} ({{\Illuminate\Support\Str::lower($emission->role->title)}})</code>,
                        @endif

                    @endif
                @empty
                    <code>Подписано никем</code>
                @endforelse
            </div>

            <div class="mt-2">
                К исполнению:
                @forelse($order->assignments as $assignment)
                    @if($loop->last)
                        @if($assignment->id == auth()->id())
                            <b>
                                <code>{{$assignment->name}} ({{\Illuminate\Support\Str::lower($assignment->role->title)}})</code>
                            </b>
                        @else
                            <code>{{$assignment->name}} ({{\Illuminate\Support\Str::lower($assignment->role->title)}})</code>
                        @endif

                    @else
                        @if($assignment->id == auth()->id())
                            <b>
                                <code>{{$assignment->name}} ({{\Illuminate\Support\Str::lower($assignment->role->title)}})</code>
                            </b>,
                        @else
                            <code>{{$assignment->name}} ({{\Illuminate\Support\Str::lower($assignment->role->title)}})</code>,
                        @endif
                    @endif
                @empty
                    <code>Никому не назначено</code>
                @endforelse
            </div>

            <div class="btn-group mt-2">
                @if($order->assignments->contains(auth()->user()) && !$order->completed)
                    <a href="{{route("orders.complete", ["id" => $order->id], false)}}" class="btn btn-primary">
                        Выполнено
                    </a>
                @endif

                @if($order->emissions->contains(auth()->user()))
                    <a href="{{route("orders.delete", ["id" => $order->id], false)}}" class="btn btn-danger">
                        Удалить
                    </a>

                    @if(!$order->completed)
                        <a href="{{route("orders.edit", ["id" => $order->id], false)}}" class="btn btn-warning">
                            Изменить
                        </a>
                    @endif
                @endif
            </div>

        </div>
    </li>
