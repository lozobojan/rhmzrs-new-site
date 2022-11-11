<div class="mt-6">
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    @foreach($riverBasins as $riverBasin)
        <div>
            <h2>{{ $riverBasin->title }}</h2>
            {{ $riverBasin->photo }}
            <p>{!!  $riverBasin->description !!}</p>
        </div>
    @endforeach
</div>
