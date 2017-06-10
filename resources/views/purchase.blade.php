@extends('layouts.app')

@section('content')

    <div class="container" style="padding:20px">

            <!-- Begin of rows -->
            @php($count = 0)
            @foreach($purchases as $purchase)
                @php($count ++)
            <div class="row carousel-row">
                <div class="col-xs-8 col-xs-offset-2 slide-row">
                    <div id="carousel-{{$count}}" class="carousel slide slide-carousel" data-ride="carousel">
                        <!-- Indicators -->

                        <ol class="carousel-indicators">
                            @php($len = count($purchase->product->photos))
                            @for($i = 0;$i<$len;$i++)
                                @if($i==0)

                                    <li data-target="#carousel-{{$count}}" data-slide-to="{{$len}}" class="active"></li>
                                @else
                                    <li data-target="#carousel-{{$count}}" data-slide-to="{{$len}}"></li>
                                @endif
                            @endfor
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @php($cnt = 1)
                            @foreach($purchase->product->photos as $photo)
                                @if($cnt == 1)
                                <div class="item active">
                                <img src="storage/{{$photo->photo_name}}.{{$photo->photo_type}}?rand={{$cnt}}" alt="Image" min-width="150px" min-height="150px">
                                </div>
                                @else
                                    <div class="item">
                                        <img src="storage/{{$photo->photo_name}}.{{$photo->photo_type}}?rand={{$cnt}}" alt="Image" width="150px" height="150px">
                                    </div>
                                @endif

                                @php($cnt = $cnt + 1)
                            @endforeach
                        </div>


                    </div>
                    <div class="slide-content">
                        <div class="row">
                            <div class="col-sm-2">
                                <h4>{{$purchase->product->name}}</h4>

                            </div>
                            <div class="col-sm-6">
                                <small>數量：{{$purchase->amount}}價格：{{$purchase->amount*$purchase->product->price}}</small>

                            </div>
                            <div class="col-sm-4">
                                <label>賣家：</label>
                                <img src="//graph.facebook.com/{{$purchase->user->facebook_id}}/picture?width=20&height=20">
                                <a href="https://facebook.com/{{$purchase->user->facebook_id}}">{{$purchase->product->user->name}}</a>
                            </div>
                        </div>
                        <p>

                            {{$purchase->product->description}}
                        </p>
                    </div>
                    <div class="slide-footer">

                        <span class="pull-right buttons">
                            <a href="/detail/{{$purchase->product_id}}" >
                                <button class="btn btn-sm btn-default"><i class="fa fa-fw fa-eye"></i> 詳細</button>
                            </a>

                            <a href="/cancel/{{$purchase->product_id}}">
                                <button class="btn btn-sm btn-primary"><i class="fa fa-fw fa-times"></i> 取消</button>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>





@endsection

@section('scripts')

@endsection
