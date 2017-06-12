@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">我販賣的商品</a>
            </li>
            <li role="presentation">
                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">張貼販賣</a>
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
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>商品訊息</th>
                        <th>數量</th>
                        <th>小計(元)</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    @foreach($products as $product)
                        <tr class="panel-heading" role="tab" id="heading{{$product->id}}">
                            <td>{{ $product->name  }}</td>
                            <td>{{ $product->amount }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a data-toggle="collapse" data-parent="#tbody" aria-expanded="true"
                                   aria-controls="detail{{$product->id}}" href="#detail{{$product->id}}">詳細資料</a><br/>
                                <a data-toggle="collapse" data-parent="#tbody" aria-expanded="true"
                                   aria-controls="edit{{$product->id}}" href="#edit{{$product->id}}">編輯</a><br/>
                                <a data-toggle="collapse" data-parent="#tbody" aria-expanded="true"
                                   aria-controls="purchaser{{$product->id}}" href="#purchaser{{$product->id}}">購買者</a><br/>
                            <!--  <a data-toggle="modal" href="/delete/{{$product->id}}"
                                   data-target=".bs-example-modal-lg">取消</a> !-->
                                <a href="{{url('delete/'.$product->id)}}">刪除</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="padding-bottom: 0; padding-top: 0;">
                                <div id="detail{{$product->id}}" class="collapse" role="tabpanel"
                                     aria-labelledby="heading{{$product->id}}">
                                    <div class="col-md-3" style="padding-top: 15px; padding-bottom: 15px;">
                                        @php($photo = $product->photos()->get()->first())
                                        <a data-toggle="modal" data-target="#img{{$product->id}}"
                                           href="#img{{$product->id}}"><img
                                                    src="storage/{{$photo->photo_name}}.{{$photo->photo_type}}"
                                                    width="100%"/></a>
                                    </div>
                                    <div class="col-md-9" style="padding-top: 15px; padding-bottom: 15px;">
                                        <p>詳細資料:</p>
                                        <p>{{$product->description}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="padding-bottom: 0; padding-top: 0;">
                                <div id="edit{{$product->id}}" class="collapse" role="tabpanel"
                                     aria-labelledby="heading{{$product->id}}">
                                    <div class="panel-body">

                                        <form class="form-horizontal" method="post" action="{{url('update')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <input type="hidden" name="productid" value="{{$product->id}}"/>
                                                <div class="col-md-4" style="padding-left: 0;">
                                                    <label for="price">單價</label>
                                                    <input type="number" class="form-control" id="price" name="price" min="0"
                                                           value="{{$product->price}}" required/>
                                                    <br/>
                                                    @if($errors -> has('price'))
                                                        <div class="alert alert-warning" role="alert">{{  $errors->first('price') }}</div>
                                                    @endif
                                                </div>
                                                <div class="col-md-4" style="padding-left: 7px; padding-right: 7px;">
                                                    <label for="amount">數量</label>
                                                    <input type="number" class="form-control" id="amount" name="amount" min="1"
                                                           value="{{$product->amount}}" required/>
                                                    <br/>
                                                    @if($errors -> has('amount'))
                                                        <div class="alert alert-warning" role="alert">{{  $errors->first('amount') }}</div>
                                                    @endif
                                                </div>
                                                <label for="text">
                                                    商品描述</label>
                                                <textarea name="description" id="text" class="form-control" rows="5" cols="15"
                                                          required="required">{{$product->description}}</textarea>
                                                @if($errors -> has('description'))
                                                    <div class="alert alert-warning" role="alert">{{  $errors->first('description') }}</div>
                                                @endif
                                                <br/>
                                                <button class="btn btn-lg btn-primary" type="submit">確定</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="padding-bottom: 0; padding-top: 0;">
                                <div id="purchaser{{$product->id}}" class="collapse" role="tabpanel"
                                     aria-labelledby="heading{{$product->id}}">
                                    <div class="panel panel-body">


                                       <div class="panel-body">
                                           <table class="table">
                                               <tbody>
                                               @if($product->purchases->isEmpty())
                                                   <td>尚無購買者</td>
                                               @else

                                               <thead>
                                               <tr>
                                                   <th>購買者</th>
                                                   <th>購買數量</th>
                                                   <th>金額</th>
                                                   <th>時間</th>
                                               </tr>
                                               </thead>


                                               @foreach($product->purchases()->latest()->get() as $purchase)
                                                <tr>
                                                       <td>
                                                           <img src="//graph.facebook.com/{{$purchase->user->facebook_id}}/picture?width=50&height=50">
                                                           <a href="https://facebook.com/{{$purchase->user->facebook_id}}">{{$purchase->user->name}}</a>
                                                       </td>
                                                       <td>
                                                            {{$purchase->amount}}
                                                       </td>
                                                        <td>
                                                            {{$purchase->amount*$purchase->product->price}}
                                                        </td>
                                                        <td>
                                                            {{$purchase->updated_at->diffForHumans()}}
                                                        </td>
                                                </tr>
                                               @endforeach
                                               @endif
                                               </tbody>

                                           </table>
                                       </div>

                                    </div>



                                </div>
                            </td>
                        </tr>

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
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="profile">

                <div class="jumbotron" style="padding: 50px;">
                    <form class="form-horizontal" method="post" action="{{url('post')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">商品名稱</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="商品名稱" required/>
                            <br/>
                            @if($errors -> has('name'))
                                <div class="alert alert-warning" role="alert">{{  $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="col-md-4" style="padding-left: 0;">
                                <label for="price">單價</label>
                                <input type="number" class="form-control" id="price" name="price" min="0"
                                       placeholder="元" required/>
                                <br/>
                                @if($errors -> has('price'))
                                    <div class="alert alert-warning" role="alert">{{  $errors->first('price') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4" style="padding-left: 7px; padding-right: 7px;">
                                <label for="amount">數量</label>
                                <input type="number" class="form-control" id="amount" name="amount" min="1"
                                       placeholder="數量" required/>
                                <br/>
                                @if($errors -> has('amount'))
                                    <div class="alert alert-warning" role="alert">{{  $errors->first('amount') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4" style="padding-right: 0;">
                                <label for="inlineFormCustomSelect">商品種類</label>
                                <select class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control"
                                        id="inlineFormCustomSelect"
                                        name="category" required>
                                    <option selected>選擇分類...</option>
                                    <option value="1">食物</option>
                                    <option value="2">男裝</option>
                                    <option value="3">女裝</option>
                                    <option value="4">日用品</option>
                                    <option value="5">美妝</option>
                                    <option value="6">書籍</option>
                                    <option value="7">數位家電</option>
                                    <option value="8">傢俱</option>
                                    <option value="9">其他</option>
                                </select>
                                <br/>
                                @if($errors -> has('category'))
                                    <div class="alert alert-warning"
                                         role="alert">{{  $errors->first('category') }}</div>
                                @endif
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="images[]">上傳照片</label>
                            <small>(Ctrl+左鍵可以一次上傳多張相片)</small>
                            <input type="file" id="images[]" name="images[]" multiple/> <br/>
                        </div>
                        @if($errors -> has('images'))
                            <div class="alert alert-warning" role="alert">{{  $errors->first('images.*') }}</div>
                        @endif
                        @if($errors -> has('images.*'))
                            <div class="alert alert-warning" role="alert">{{  $errors->first('images.*') }}</div>
                        @endif
                        <div class="form-group">
                            <label for="text">
                                商品描述</label>
                            <textarea name="description" id="text" class="form-control" rows="5" cols="15"
                                      required="required" placeholder="對商品的描述..."></textarea>
                            @if($errors -> has('description'))
                                <div class="alert alert-warning" role="alert">{{  $errors->first('description') }}</div>
                            @endif
                            <br/>
                            <button class="btn btn-lg btn-primary" type="submit">確定</button>
                        </div>
                    </form>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="comment">
                @php($flag=0)
                @foreach($products as $product)
                    @php($flag=0)
                    @php($cnt=0)
                    @foreach($product->comments as $comment)
                        @if(is_null($comment->response))
                            @php($cnt++)
                        @endif

                    @endforeach
                    @if($product->comments->count()==0||$cnt==0)
                        @php($flag=1)
                    @endif


                    @if($flag == 0)

                <div class="panel panel-default col-md-10 col-md-offset-1" style="padding: 0;margin-top:10px;">
                    <div class="panel-heading" >

                        <div class="row">

                            <div class="col-md-8">
                                <p>{{$product->name}}</p>
                            </div>
                        </div>



                    </div>
                    <div class="panel-body list-group">
                        @foreach($product->comments as $comment)
                            @if(is_null($comment->response))
                                <div class="list-group-item">
                                    <div class="row-action-primary">
                                        <img src="//graph.facebook.com/{{$comment->user->facebook_id}}/picture?width=100&height=100"
                                             class="img-circle">
                                    </div>
                                    <div class="row-content">
                                        <div class="least-content"><p>{{$comment->updated_at->diffForHumans()}}</p></div>
                                        @if(Auth::id()==$product->user->id && is_null($comment->response))
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

                @foreach($products as $product)
                    @php($flag=0)
                    @php($cnt=0)
                    @foreach($product->comments as $comment)
                        @if(!is_null($comment->response))
                            @php($cnt ++)
                        @endif
                    @endforeach
                    @if($product->comments->count()!=0 && $cnt!=0)

                        <div class="panel panel-default col-md-10 col-md-offset-1" style="padding: 0;margin-top:10px;">
                            <div class="panel-heading" >

                                <div class="row">

                                    <div class="col-md-8">
                                        <p>{{$product->name}}</p>
                                    </div>
                                </div>



                            </div>
                            <div class="panel-body list-group">
                                @foreach($product->comments as $comment)
                                   @if(!is_null($comment->response))
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
