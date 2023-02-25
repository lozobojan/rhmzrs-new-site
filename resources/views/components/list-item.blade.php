<div class="job-list mb-10">
    <a href="{{ $type }}/{{$item->id}}" class="card mb-4 lift">
        <div class="card-body p-5">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-5 mb-2 mb-md-0 d-flex align-items-center text-body"><b>{{ $item->title }}</b></div>
                <div class="col-5 col-md-3 text-body d-flex align-items-center">
                    <i class="uil uil-clock me-1"></i> {{ \Illuminate\Support\Carbon::parse($item->date)->format('d/m/Y') }}
                </div>
                @if($item->description)
                <div
                    class="col-7 col-md-4 col-lg-3 text-body d-flex align-items-center">
                    <i class="uil uil-align-justify me-1"></i> {{ $item->description }}
                </div>
                @endif
                <div class="d-none d-lg-block col-1 text-center text-body">
                    <i class="uil uil-angle-right-b"></i>
                </div>
            </div>
        </div>
    </a>
</div>

