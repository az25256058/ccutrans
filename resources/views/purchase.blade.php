@extends('layouts.app')

@section('content')
    <div class="col-lg-10 col-md-offset-1">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">我的購物車</a>
            </li>
        </ul>


        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                @if($purchases->isEmpty())
                    <div class="alert alert-info text-center" role="alert">尚無購買</div>
                @endif

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
                            @foreach($purchases as $purchase)
                                <tr>
                                    <td>
                                        <a href="#">{{$purchase->facebook_id}}</a>
                                        {{$purchase->name}}
                                    </td>
                                    <td>
                                        {{$purchase->amount}}
                                    </td>
                                    <td>
                                        {{$purchase->price * $purchase->amount}}
                                    </td>
                                    <td>
                                        <a href="#">取消</a>
                                    </td>
                                </tr>
                            @endforeach

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
        </div>

    </div>
@endsection

@section('scripts')

@endsection
