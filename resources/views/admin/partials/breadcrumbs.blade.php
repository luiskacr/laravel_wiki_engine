@if(count($breadcrumbs))
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        @foreach($breadcrumbs as $breadcrumb => $link)
                            @if($link)
                                <li class="breadcrumb-item">
                                    <a href="{{$link}}">
                                        @if($breadcrumb == 'Home')
                                            <i class="uil-home-alt me-1"></i> {{$breadcrumb}}
                                        @else
                                            {{$breadcrumb}}
                                        @endif
                                    </a>
                                </li>
                            @else
                                <li class="breadcrumb-item active">
                                    @if($breadcrumb == 'Home')
                                        <i class="uil-home-alt me-1"></i> {{$breadcrumb}}
                                    @else
                                        {{$breadcrumb}}
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endif
