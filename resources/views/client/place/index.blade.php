@extends('layouts/client/app')
@section('title',__('site.Places'))
@section('content')

    @if(auth()->user()->verified())

        <div class="container mt-3">

            <span class="table-add mb-3 mr-2 text-info">
            <a class="text-info" href="#a"><i class="fas fa-tint mr-2 fa-2x"></i></a>
            </span>

            <span class="table-add mb-3 mr-2 ">
                <a class="text-warning" href="#b"><i class="fas fa-lightbulb mr-2 fa-2x"></i></a>
            </span>

            <span class="table-add mb-3 mr-2">
                <a class="text-default" href="#c" ><i class="fas fa-phone-alt mr-2 fa-2x"></i></a>
            </span>

        </div>

        <div class="container py-4  ">
            <div class="row ">


                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="z-depth-5">
                        <h5 class="card-header darken-1 text-center py-4" id="a">
                            <strong>@lang('site.water')</strong>
                            <i class="fas fa-tint mr-2 fa-1x"></i>
                        </h5>
                            <div class="under-line-blue w-100 ">
                            </div>
                            @foreach($places_water as $pl)
                            @if(app()->getLocale()=='ar')
                                <ul class="faq">
                                    <li>
                                        <h3 class="question accordion">
                                        {{$pl->name}}
                                        </h3>
                                        <div class="answer">
                                        {{$pl->location}}
                                        <span class="table-add float-right mb-2 ">
                                            <a href="{{route('places.show',$pl->id)}}" class="text-success">
                                                <i class="fa fa-location-arrow fa-2x" aria-hidden="true"></i>
                                            </a>
                                        </span>
                                        </div>
                                    </li>
                                </ul>
                            @else
                                <ul class="faq">
                                    <li>
                                        <h3 class="question accordion">
                                        {{$pl->name_en}}
                                        </h3>
                                        <div class="answer">
                                        {{$pl->location_en}}
                                        <span class="table-add float-right mb-2 ">
                                            <a href="{{route('places.show',$pl->id)}}" class="text-success">
                                                <i class="fa fa-location-arrow fa-2x" aria-hidden="true"></i>
                                            </a>
                                        </span>
                                        </div>
                                    </li>
                                </ul>
                            @endif
                        
                             @endforeach
                    </div>
                </div>



                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="z-depth-5">
                        <h5 class="card-header darken-1 text-center py-4" id="b">
                            <strong>@lang('site.electrec')</strong>
                            <i class="fas fa-lightbulb mr-2 fa-1x"></i>
                         </h5>
                            <div class="under-line-blue w-100">
                            </div>
                            @foreach($places_electricity as $pl)
                            @if(app()->getLocale()=='ar')
                                <ul class="faq">
                                    <li>
                                        <h3 class="question accordion">
                                        {{$pl->name}}
                                        </h3>
                                        <div class="answer">
                                        {{$pl->location}}
                                        <span class="table-add float-right mb-2 ">
                                            <a href="{{route('places.show',$pl->id)}}" class="text-success">
                                                <i class="fa fa-location-arrow fa-2x" aria-hidden="true"></i>
                                            </a>
                                        </span>
                                        </div>
                                    </li>
                                </ul>
                            @else
                                <ul class="faq">
                                    <li>
                                        <h3 class="question accordion">
                                        {{$pl->name_en}}
                                        </h3>
                                        <div class="answer">
                                        {{$pl->location_en}}
                                        <span class="table-add float-right mb-2 ">
                                            <a href="{{route('places.show',$pl->id)}}" class="text-success">
                                                <i class="fa fa-location-arrow fa-2x" aria-hidden="true"></i>
                                            </a>
                                        </span>
                                        </div>
                                    </li>
                                </ul>
                            @endif
                            @endforeach
                    </div>
                </div>



                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="z-depth-5">
                        <h5 class="card-header darken-1 text-center py-4" id="c">
                            <strong>@lang('site.phone')</strong>
                            <i class="fas fa-phone-alt mr-2 fa-1x"></i>
                         </h5>
                        <div class="under-line-blue w-100">
                        </div>
                            @foreach($places_telecome as $pl)
                            @if(app()->getLocale()=='ar')
                                <ul class="faq">
                                    <li>
                                        <h3 class="question accordion">
                                        {{$pl->name}}
                                        </h3>
                                        <div class="answer">
                                        {{$pl->location}}
                                        <span class="table-add float-right mb-2 ">
                                            <a href="{{route('places.show',$pl->id)}}" class="text-success">
                                                <i class="fa fa-location-arrow fa-2x" aria-hidden="true"></i>
                                            </a>
                                        </span>
                                        </div>
                                    </li>
                                </ul>
                            @else
                                <ul class="faq">
                                    <li>
                                        <h3 class="question accordion">
                                        {{$pl->name_en}}
                                        </h3>
                                        <div class="answer">
                                        {{$pl->location_en}}
                                        <span class="table-add float-right mb-2 ">
                                            <a href="{{route('places.show',$pl->id)}}" class="text-success">
                                                <i class="fa fa-location-arrow fa-2x" aria-hidden="true"></i>
                                            </a>
                                        </span>
                                        </div>
                                    </li>
                                </ul>
                            @endif
                             @endforeach
                    </div>
                </div>

            </div>
        </div>

        @else
    <div class="card-body px-lg-5 pt-0 py-4 mt-4">
       <div class="z-depth-5">
            <h5 class="card-header darken-1 text-center py-4">
                <strong>@lang('site.verified1') </strong>
            </h5>
                <div class="md-form text-center py-4">
                    <h5>@lang('site.verified2')!! </h5>
                    <h5>@lang('site.verified3') <i class="fab fa-angellist"></i></h5>
                </div>
         </div>
    </div>
    @endif()
    
@endsection

@push('script')
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("activee");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>

@endpush










