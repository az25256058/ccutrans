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
                                <h4 class="panel-title">
                                    {{$product->name}}
                                </h4>
                                <h5 align="right">
                                    <a>問與答(25)</a>&nbsp;
                                      單價:{{$product->price}} 數量:{{$product->amount}}
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
                                    <form>
                                        <label for="amount">數量:</label>
                                        <input type="number" name="amount" id="amount">
                                        <input type="submit" role="button">
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

                </div>
            </div>

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset">
                    <h4>About</h4>
                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet
                        fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>
                <div class="sidebar-module">
                    <h4>Archives</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">March 2014</a></li>
                        <li><a href="#">February 2014</a></li>
                        <li><a href="#">January 2014</a></li>
                        <li><a href="#">December 2013</a></li>
                        <li><a href="#">November 2013</a></li>
                        <li><a href="#">October 2013</a></li>
                        <li><a href="#">September 2013</a></li>
                        <li><a href="#">August 2013</a></li>
                        <li><a href="#">July 2013</a></li>
                        <li><a href="#">June 2013</a></li>
                        <li><a href="#">May 2013</a></li>
                        <li><a href="#">April 2013</a></li>
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>Elsewhere</h4>
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

@endsection
