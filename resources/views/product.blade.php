@extends('layouts.app')

@section('css')
    <style>
        div.product :hover {
            transition-duration: 1s;
            box-shadow: 4px 4px 3px #878787;
            background: #F5F5F5;
        }

        div.product * :hover {
            box-shadow: initial;
            background: initial;
        }
    </style>
@endsection

@section('content')
    <div class="container">

        <div class="blog-header">
            <h1 class="blog-title">The Bootstrap Blog</h1>
            <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
        </div>

        <div class="row">

            <div class="col-sm-8 blog main">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    @foreach($products as $product)
                        <div class="panel panel-default product">
                            <div class="panel-heading" role="tab" id="heading{{$product->id}}" data-toggle="collapse"
                                 data-parent="#accordion" href="#collapse{{$product->id}}" aria-expanded="true"
                                 aria-controls="collapse{{$product->id}}">
                                <h3 class="panel-title">
                                    {{$product->name}}
                                </h3>
                                <h5 align="right">
                                    <a>有意願購買者( <b>{{count($product->purchases)}}</b> )</a>&nbsp;
                                    <a>問與答( <b>{{count($product->comments)}}</b> )</a>&nbsp;
                                    單價: <b>{{$product->price}}</b> &nbsp; 數量: <b>{{$product->amount}}</b>
                                </h5>
                            </div>
                            <div id="collapse{{$product->id}}" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="heading{{$product->id}}">
                                <div class="panel-body">
                                    <div class="col-md-3">
                                        @php($photo = $product->photos()->get()->first())
                                        <a data-toggle="modal" data-target="#img{{$product->id}}"
                                           href="#img{{$product->id}}"><img
                                                    src="storage/{{$photo->photo_name}}.{{$photo->photo_type}}"
                                                    width="100%"/></a>
                                    </div>
                                    <div class="col-md-9">
                                        賣家 :
                                        <a href="https://www.facebook.com/profile.php?id=100000335517561">{{$product->user->name}}</a>
                                        <p>{{$product->description}}</p>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form class="form-inline" method="post" action="purchase/{{$product->id}}">
                                        {{csrf_field()}}
                                        <div class="form-group col-md-5">
                                            <label for="amount{{$product->id}}">數量:</label>
                                            <input type="number" name="amount" id="amount{{$product->id}}"
                                                   class="form-control" min="1"
                                                   required oninput="input({{$product->id}},{{$product->price}});">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" role="button" class="btn btn-default">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="output{{$product->id}}">總價:</label>
                                            <input id="output{{$product->id}}" class="form-control" disabled>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

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
                                                    <img src="storage/{{$photo->photo_name}}.{{$photo->photo_type}}"
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
                    @endforeach

                </div>
                <div>{{ $products->render() }}</div>

            </div>

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

        </div><!-- /.row -->

    </div>

@endsection

@section('scripts')
    <script>
        function input(pid, price) {
            var x = document.getElementById('amount' + pid).value;
            document.getElementById('output' + pid).value = price * x;
        }
    </script>

@endsection
