@extends('layouts.app')

@section('content')
    <div class="col-lg-8 col-md-offset-2">

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
                                        <img src="//graph.facebook.com/{{$purchase->user->facebook_id}}/picture?width=30&height=30">
                                        <a href="https://facebook.com/{{$purchase->user->facebook_id}}">{{$purchase->product->user->name}}</a>
                                        {{$purchase->product->name}}
                                    </td>
                                    <td>
                                        {{$purchase->amount}}
                                    </td>
                                    <td>
                                        {{$purchase->product->price * $purchase->amount}}
                                    </td>
                                    <td>
                                        {{$purchase->product->description}}
                                    </td>
                                    <td>
                                        <a href="/cancel/{{$purchase->product_id}}">取消</a>
                                    </td>
                                </tr>
                            @endforeach



                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection
