@if (isset($breadcrumbs))
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            @foreach ($breadcrumbs as $key => $breadcrumb)
                @if(!is_array($breadcrumb))
                    <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb }}</li>
                @else
                    @if(!isset($breadcrumb['route']) && isset($breadcrumb['label']))
                        <li class="breadcrumb-item">
                           {{ $breadcrumb['label'] }}
                        </li>
                    @else
                    <li class="breadcrumb-item">
                        <a href="{{ $breadcrumb['route'] }}">{{ $breadcrumb['label'] }}</a>
                    </li>
                    @endif
                @endif
            @endforeach
        </ol>
    </nav>
@endif
