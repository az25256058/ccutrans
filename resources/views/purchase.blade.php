@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#product" aria-controls="product" role="tab" data-toggle="tab">購物車</a>
            </li>

            <li role="presentation">
                <a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">未回覆評論</a>
            </li>
            <li role="presentation">
                <a href="#commented" aria-controls="commented" role="tab" data-toggle="tab">已回覆評論</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="product">

                <div class="list-group" style="margin-top:10px;">
                    @foreach($purchases as $purchase)
                    <div class="list-group-item" style="min-height:120px;" >
                        <div class="row-action-primary">
                            <div class="row-picture">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->


                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    @foreach( $purchase->product->photos as $photo )
                                        <div class="item {{$loop->first ? 'active':'' }}">
                                            <img src="storage/{{$photo->photo_name}}.{{$photo->photo_type}}" alt="...">
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
                        <div class="row-content">
                            <div class="least-content">

                                <img src="//graph.facebook.com/{{$purchase->user->facebook_id}}/picture?width=30&height=30">
                                <a href="https://facebook.com/{{$purchase->user->facebook_id}}">{{$purchase->user->name}}</a>
                            </div>
                            <h4 class="list-group-item-heading">{{$purchase->product->name}} <small>數量：{{$purchase->amount}} 價格：{{$purchase->amount*$purchase->product->price}}</small></h4>

                            <p class="list-group-item-text">{{$purchase->product->description}}</p>
                            <footer>
                                <div class="row">
                                    <div class="col-cm-6"></div>
                                    <div class="col-cm-2">



                                    </div>
                                    <div class="col-cm-4">

                                         <span class="pull-right buttons">
                                             <a href="{{url('detail/'.$purchase->product_id)}}">
                                                 <button class="btn btn-sm btn-default"><i class="fa fa-fw fa-eye"></i> 詳細</button>
                                             </a>
                                             <a href="{{'cancel/'.$purchase->product_id}}">
                                                 <button class="btn btn-sm btn-primary"><i class="fa fa-fw fa-times"></i> 取消</button>
                                             </a>

                                         </span>
                                    </div>
                                </div>
                            </footer>
                        </div>

                    </div>


                    <div class="list-group-separator"></div>

                    @endforeach

                </div>

            </div>



            <div role="tabpanel" class="tab-pane fade" id="comment">
                @foreach($purchases as $purchase)
                    @php($flag=0)
                    @php($cnt=0)
                    @php($yes=0)
                    @foreach($purchase->product->comments as $comment)
                        @if($comment->user_id==$purchase->user_id)

                            @if(is_null($comment->response))
                                @php($cnt ++)
                            @endif
                            @php($yes=1)
                        @endif
                    @endforeach
                    @if($cnt==0 || $yes!=1)
                        @php($flag=1)
                    @endif
                    @if($flag==0)
                        <div class="panel panel-default col-md-10 col-md-offset-1" style="padding: 0;margin-top:10px;">
                            <div class="panel-heading" >

                                <div class="row">

                                    <div class="col-md-8">
                                        <p>{{$purchase->product->name}}</p>
                                    </div>
                                </div>



                            </div>
                            <div class="panel-body list-group">
                                @foreach($purchase->product->comments as $comment)
                                    @if(is_null($comment->response))
                                        <div class="list-group-item">
                                            <div class="row-action-primary">
                                                <img src="//graph.facebook.com/{{$comment->user->facebook_id}}/picture?width=100&height=100"
                                                     class="img-circle">
                                            </div>
                                            <div class="row-content">
                                                <div class="least-content"><p>{{$comment->updated_at->diffForHumans()}}</p></div>
                                                @if(Auth::id()==$purchase->product->user->id && is_null($comment->response))
                                                    <div class="action-secondary" style="padding-top: 10px;">
                                                        <a role="button" class="btn btn-primary" data-toggle="modal" data-target="#response">
                        <span class="glyphicon glyphicon-share-alt" aria-hidden="true"
                              style="font-size: 12px;"></span> 回覆</a></div>
                                                    <div class="modal" id="response">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                        ×
                                                                    </button>
                                                                    <p>
                                                                        <img src="//graph.facebook.com/{{$comment->user->facebook_id}}/picture?width=50&height=50"
                                                                             class="img-circle">&nbsp;&nbsp;{{$comment->comment}}<span
                                                                                class="pull-right">{{$comment->updated_at->diffForHumans()}}</span>
                                                                    </p>
                                                                </div>

                                                                <form method="post" action="{{url('response/'.$comment->id)}}"
                                                                      enctype="application/x-www-form-urlencoded">

                                                                    {{csrf_field()}}
                                                                    <div class="modal-body">
                                                                        <div class="form-group{{ $errors->has('response') ? ' has-error' : '' }} label-floating">
                                                                            <label for="response" class="control-label">回覆留言</label>
                                                                            <input id="response" class="form-control" type="text"
                                                                                   name="response" required>
                                                                            @if ($errors->has('response'))
                                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('response') }}</strong>
                                                        </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">取消
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary">回覆</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <h4 class="list-group-item-heading"><a
                                                            href="https://facebook.com/{{$comment->user->facebook_id}}">{{$comment->user->name}}</a>
                                                </h4>

                                                <p class="list-group-item-text">{{$comment->comment}}</p>
                                                @if(!is_null($comment->response))
                                                    <p class="list-group-item-text"><strong style="font-weight: bold;">賣家回覆</strong> : {{$comment->response}}
                                                        <span class="pull-right">{{$comment->response_at->diffForHumans()}}</span></p>
                                                @endif
                                            </div>
                                        </div>

                                    @endif
                                @endforeach
                            </div>

                        </div>

                    @endif
                @endforeach

            </div>


            <div role="tabpanel" class="tab-pane fade" id="commented">
                @foreach($purchases as $purchase)
                    @php($flag=0)
                    @php($cnt=0)
                    @php($yes=0)
                    @foreach($purchase->product->comments as $comment)
                        @if($comment->user_id==$purchase->user_id)

                            @if(!is_null($comment->response))
                                @php($cnt ++)
                            @endif
                            @php($yes=1)
                        @endif
                    @endforeach
                    @if($cnt==0 || $yes!=1)
                        @php($flag=1)
                    @endif
                    @if($flag==0)
                        <div class="panel panel-default col-md-10 col-md-offset-1" style="padding: 0;margin-top:10px;">
                            <div class="panel-heading" >

                                <div class="row">

                                    <div class="col-md-8">
                                        <p>{{$purchase->product->name}}</p>
                                    </div>
                                </div>



                            </div>
                            <div class="panel-body list-group">
                                @foreach($purchase->product->comments as $comment)
                                    @if(!is_null($comment->response))
                                        @if($purchase->user_id==$comment->user->id)
                                        <div class="list-group-item">
                                            <div class="row-action-primary">
                                                <img src="//graph.facebook.com/{{$comment->user->facebook_id}}/picture?width=100&height=100"
                                                     class="img-circle">
                                            </div>
                                            <div class="row-content">
                                                <div class="least-content"><p>{{$comment->updated_at->diffForHumans()}}</p></div>


                                                <h4 class="list-group-item-heading"><a
                                                            href="https://facebook.com/{{$comment->user->facebook_id}}">{{$comment->user->name}}</a>
                                                </h4>

                                                <p class="list-group-item-text">{{$comment->comment}}</p>
                                                @if(!is_null($comment->response))
                                                    <p class="list-group-item-text"><strong style="font-weight: bold;">賣家回覆</strong> : {{$comment->response}}
                                                        <span class="pull-right">{{$comment->response_at->diffForHumans()}}</span></p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="list-group-separator"></div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>

                        </div>

                    @endif
                @endforeach

            </div>
        </div>

    </div>




@endsection

@section('scripts')

@endsection
