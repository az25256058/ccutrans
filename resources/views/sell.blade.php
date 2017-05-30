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
                    <tbody>
                    @foreach($products as $product)
                        <tr onclick="showDetails({{ $product->id }})">
                            <td>{{ $product->name  }}</td>
                            <td>{{ $product->amount }}</td>
                            <td>{{ $product->price }}</td>
                            <td><a href="#">取消</a>
                                <a href="#">編輯</a></td>
                        </tr>
                        <tr>
                            <td colspan="4"><div class="collapse{{ $product->id  }}"></div></td>
                        </tr>

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
        $.get('showDetails/'+product_id ,function (response) {
            console.log(response)
        })
    }
</script>
@endsection
