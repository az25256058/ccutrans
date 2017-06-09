@extends('layouts.app')

@section('css')
    <style>
        div.product :hover {
            transition-duration: 0.3s;
            box-shadow: 4px 4px 3px #878787;
            background: #F5F5F5;
        }

        div.product * :hover {
            box-shadow: initial;
            background: initial;
        }
        div.product :hover img.product_pic{
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }

    </style>
@endsection

@section('content')
    <div class="container">


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

        @if(count($products)==0)
            <h1>沒有商品QQ</h1>
        @endif


        @foreach($products as $product)
            <div class="col-md-2 product" style="padding: 10px; height: 365px;">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top" style="height: 150px; overflow: hidden;">
                        @php($photo = $product->photos()->get()->first())
                        <a href="{{url('detail/'.$product->id)}}">
                        <img src="storage/{{$photo->photo_name}}.{{$photo->photo_type}}" class="img-thumbnail product_pic"
                             style="max-height: 150px;"></a>
                    </div>
                    <div class="uk-card-body" style="padding: 5px;">
                        <div class="">
                            <img src="//graph.facebook.com/{{$product->user->facebook_id}}/picture?width=30&height=30">
                            <a href="https://facebook.com/{{$product->user->facebook_id}}">{{$product->user->name}}</a>
                        </div>
                        <div class="uk-card-body" style="padding: 10px;">
                            @php($tmp = substr($product->name, 0, 34))
                            <p style="word-break: break-all;">{{ $tmp.(strlen($tmp)==34 ? '...':'') }}</p>
                        </div>

                        <div class="uk-card-body" style="padding: 5px;">
                            <div class="col-md-6" style="color: #2ca02c; font-weight: bold; padding: 5px;">
                                <p><span class="glyphicon glyphicon-usd" aria-hidden="true"
                                         style="font-size: 12px;"></span>{{$product->price}}</p>
                            </div>
                            <div class="col-md-6" style=" padding: 5px;">
                                <p><span class="glyphicon glyphicon-inbox" aria-hidden="true"
                                         style="font-size: 12px;"></span> {{$product->price}}</p>
                            </div>
                        </div>

                        <div class="uk-card-footer" style="padding: 5px;">
                            <div class="col-md-6">
                                <p style="margin: 0 0 0 0;"><span class="glyphicon glyphicon-comment" aria-hidden="true"
                                         style="font-size: 12px;"></span> {{$product->comments->count()}}</p>
                            </div>
                            <div class="col-md-6">
                                <p style=" margin: 0 0 0 0;"><a href="{{url('detail/'.$product->id)}}">more..</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach


        <div class="col-md-12  text-center">{{ $products->render() }}</div>


    <!--
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset">
                    <h4>關於</h4>
                    <p>買賣交流網站</p>
                </div>
                <div class="sidebar-module">
                    <h4>分類</h4>
                    <ol class="list-unstyled">
                        <li><a href="{{url('product-0')}}">查看全部</a></li>
                        <li><a href="{{url('product-1')}}">食物、食材類</a></li>
                        <li><a href="{{url('product-2')}}">男裝</a></li>
                        <li><a href="{{url('product-3')}}">女裝</a></li>
                        <li><a href="{{url('product-4')}}">日用品</a></li>
                        <li><a href="{{url('product-5')}}">美妝產品</a></li>
                        <li><a href="{{url('product-6')}}">書籍類</a></li>
                        <li><a href="{{url('product-7')}}">數位家電</a></li>
                        <li><a href="{{url('product-8')}}">傢俱類</a></li>
                        <li><a href="{{url('product-9')}}">其他</a></li>
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>Link</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div><!-- /.blog-sidebar -->


    </div>

@endsection

@section('scripts')

@endsection
