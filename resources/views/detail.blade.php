@extends('layouts.app')

@section('css')
    <style>
        p{
            word-break: break-all;
        }
    </style>
@endsection

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

        <div class="modal fade" id="img{{$product->id}}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
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
                                    <img src="{{asset('storage/'.$photo->photo_name.'.'.$photo->photo_type) }}"
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
            </div>
        </div>

        <div class="col-md-4">

            <div id="carousel-outside" class="carousel slide" data-ride="carousel">
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
                            <a data-toggle="modal" data-target="#img{{$product->id}}"
                               href="#img{{$product->id}}">
                                <img src="{{ asset('storage/'.$photo->photo_name.'.'.$photo->photo_type) }}"
                                     alt="..."></a>
                            <div class="carousel-caption">
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button"
                   data-slide="prev" onclick="$('#carousel-outside').carousel('prev');">
                    <span class="icon-prev" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button"
                   data-slide="next" onclick="$('#carousel-outside').carousel('next');">
                    <span class="icon-next" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <h5 style="text-align: center">點選觀看放大圖片</h5>

        </div>


        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{$product->name}}</h4>
                    <h4 class="panel-title" style="color: #2ca02c; font-weight: bold;"><span
                                class="glyphicon glyphicon-usd" aria-hidden="true"
                                style="font-size: 12px;"></span>{{$product->price}}</h4>
                </div>
                <div class="panel-body">
                    <p>{{$product->description}}</p>
                </div>


                <form class="form-group" method="post" action="{{url('purchase/'.$product->id)}}"
                      enctype="application/x-www-form-urlencoded">
                    {{csrf_field()}}
                    <div class="panel-body">
                        <div class="form-inline">
                            <label for="amount">數量</label>
                            <input id="amount" name="amount" class="form-control" type="number" required min="1"
                                   max="{{$product->amount}}">
                            <small style="color: #5e5e5e">(剩餘{{$product->amount}}件)</small>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-inline">
                            <img src="//graph.facebook.com/{{$product->user->facebook_id}}/picture?width=30&height=30">
                            <a href="https://facebook.com/{{$product->user->facebook_id}}">{{$product->user->name}}</a>&nbsp;&nbsp;
                            <button class="btn btn-info"
                                    onclick="window.open('https://facebook.com/{{$product->user->facebook_id}}')">聯絡賣家
                            </button>
                            <button type="submit" class="btn btn-success">確定購買!!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- Comments -->



    </div>

    <div class="panel panel-default col-md-10 col-md-offset-1" style="padding: 0;">
        <div class="panel-heading">
            <p class="panel-title">商品留言 ( {{$product->comments->count()}} )</p>
        </div>
        <div class="panel-body list-group">
            @foreach($product->comments as $comment)
            <div class="list-group-item">
                <div class="row-action-primary">
                    <img src="//graph.facebook.com/{{$comment->user->facebook_id}}/picture?width=30&height=30">
                </div>
                <div class="row-content">
                    <div class="least-content"><p>{{$comment->updated_at->diffForHumans()}}</p></div>
                    @if(Auth::id()==$product->user->id)
                    <div class="action-secondary" style="padding-top: 10px;">
                        <a role="button" class="btn btn-primary">
                        <span class="glyphicon glyphicon-share-alt" aria-hidden="true"
                                style="font-size: 12px;"></span> 回覆</a></div>
                    @endif
                    <h4 class="list-group-item-heading"><a href="https://facebook.com/{{$comment->user->facebook_id}}">{{$comment->user->name}}</a></h4>

                    <p class="list-group-item-text">{{$comment->comment}}</p>
                </div>
            </div>
                @endforeach
        </div>
    </div>




@endsection