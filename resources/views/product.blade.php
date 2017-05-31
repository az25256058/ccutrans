@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="blog-header">
            <h1 class="blog-title">The Bootstrap Blog</h1>
            <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
        </div>

        <div class="row">

            <div class="col-sm-8 blog main">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne" onclick="$('#collapseOne').collapse();">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    滑板車
                                </a>
                            </h4>
                            <h5 align="right">
                                單價:100   數量:100
                            </h5>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="col-md-3">
                                    <img src="storage/ab6a15bf7f7d25194ab3a00682d90c4b-KZAmEjyh.jpeg" width="100%" />
                                </div>
                                <div class="col-md-9">
                                    賣家 : <a href="https://www.facebook.com/profile.php?id=100000335517561">張志源</a>
                                    <p>一個滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車阿</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    牛奶
                                </a>
                            </h4>
                            <h5 align="right">
                                單價:100   數量:100
                            </h5>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="col-md-3">
                                    <img src="1.jpg" width="100%" />
                                </div>
                                <div class="col-md-9">
                                    賣家 : <a href="https://www.facebook.com/profile.php?id=100000335517561">張志源</a>
                                    <p>一個滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車阿</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    狗鍊
                                </a>
                            </h4>
                            <h5 align="right">
                                單價:100   數量:100
                            </h5>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="col-md-3">
                                    <img src="1.jpg" width="100%" />
                                </div>
                                <div class="col-md-9">
                                    賣家 : <a href="https://www.facebook.com/profile.php?id=100000335517561">張志源</a>
                                    <p>一個滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車滑板車阿</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset">
                    <h4>About</h4>
                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
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
