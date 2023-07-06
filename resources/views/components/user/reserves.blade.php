@props([
    'reserves' => []
])
<div>
    <div>   
        予約状況：
        <div>
            @foreach( $reserves as $reserve )
                <div>
                    {{ $reserve->user_id }} {{ $reserve->start }} {{ $reserve->end }}
                </div>
            @endforeach
        </div>
    </div>
</div>