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
                            <td><a data-toggle="collapse" data-parent="#tbody" aria-expanded="true"
                                   aria-controls="detail{{$product->id}}" href="#detail{{$product->id}}">詳細資料</a><br/>
                                <a data-toggle="collapse" data-parent="#tbody" aria-expanded="true"
                                   aria-controls="edit{{$product->id}}" href="#edit{{$product->id}}">編輯</a><br/>
                                <a data-toggle="modal" href="#cancel{{$product->id}}"
                                   data-target=".bs-example-modal-lg">取消</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="padding-bottom: 0px; padding-top: 0px;">
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
                                        <p>一個滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車阿</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="padding-bottom: 0px; padding-top: 0px;">
                                <div id="edit{{$product->id}}" class="collapse" role="tabpanel"
                                     aria-labelledby="heading{{$product->id}}">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                        shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                        cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                        Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                        you probably haven't heard of them accusamus labore sustainable VHS.
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
                                                        123456
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
                    <form class="form-horizontal" method="post" action="post" enctype="multipart/form-data">
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
                            <div class="col-md-4" style="padding-left: 0px;">
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
                            <div class="col-md-4" style="padding-right: 0px;">
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
                            <br/>
                            <input type="file" id="images[]" name="images[]" multiple/> <br/>
                            @if($errors -> has('images.*'))
                                <div class="alert alert-warning" role="alert">{{  $errors->first('images.*') }}</div>
                            @endif
                        </div>
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
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        function showDetails(product_id) {
            $.get('showDetails/' + product_id, function (result) {
                console.log(result)
            })
        }
    </script>
@endsection
