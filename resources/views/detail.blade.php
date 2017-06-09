@extends('layouts.app')

@section('content')



    <div class="container col-md-10 col-md-offset-1">

        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
            <li class=""><a href="{{url('product-0')}}">全部分類
                </a></li>
            <li class=""><a href="{{url('product-1')}}">食物食材
                </a></li>
            <li class=""><a href="{{url('product-2')}}">男裝
                </a></li>
            <li class=""><a href="{{url('product-3')}}">女裝
                </a></li>
            <li class=""><a href="{{url('product-4')}}">日用品
                </a></li>
            <li class=""><a href="{{url('product-5')}}">美妝產品
                </a></li>
            <li class=""><a href="{{url('product-6')}}">書籍類
                </a></li>
            <li class=""><a href="{{url('product-7')}}">數位家電
                </a></li>
            <li class=""><a href="{{url('product-8')}}">傢俱類
                </a></li>
            <li class=""><a href="{{url('product-9')}}">其他
                </a></li>
        </ul>

        <div class="col-md-4">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach( $product->photos as $photo )
                        <li data-target="#carousel-example-generic"
                            data-slide-to="{{ $loop->index }}"
                            class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @foreach( $product->photos as $photo )
                        <div class="item {{$loop->first ? 'active':'' }}">
                            <img src="{{ asset('storage/'.$photo->photo_name.'.'.$photo->photo_type) }}"
                                 alt="...">
                            <div class="carousel-caption">
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button"
                   data-slide="prev" onclick="$('.carousel').carousel('prev');">
                    <span class="icon-prev" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button"
                   data-slide="next" onclick="$('.carousel').carousel('next');">
                    <span class="icon-next" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="col-md-8">
            
        </div>

    </div>



@endsection