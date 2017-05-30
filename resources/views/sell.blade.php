@extends('layouts.app')

@section('content')
    <div class="col-lg-10 col-md-offset-1">

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
                    <tr>
                        <td>
                            <a id="" href="https://www.facebook.com/profile.php?id=100000335517561">張志源</a>
                            &nbsp;包包
                        </td>
                        <td>5</td>
                        <th>30</th>
                        <th><a href="#">取消</a></th>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="profile">

                <div class="jumbotron" style="padding: 50px;">
                    <h2 class="display-3">Share your lives</h2>
                    <p class="lead">Attention : The size of photo must be less than 85KB.</p>
                    <form class="form-horizontal" method="post" action="/sellstore" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <input type="text" name="name"/>
                        <br/>
                        <input type="number" name="price" min="0">
                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="category">
                            <option selected>Choose...</option>
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
                        <label for="name">
                            上傳照片</label>
                        <input type="file" name="image" multiple/> <br/>
                        @if($errors -> has('image'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                </span>
                        @endif

                            <label for="name">
                                商品描述</label>
                            <textarea name="text" id="text" class="form-control" rows="5" cols="15" required="required" placeholder="對商品的描述..."></textarea>

                        <br/>
                        <button class="btn btn-lg btn-success" type="submit">確定</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection
