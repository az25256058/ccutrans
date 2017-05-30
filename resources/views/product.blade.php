@extends('layouts.app')

@section('content')
    <div class="col-lg-10 col-md-offset-1">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a>
            </li>
            <li role="presentation">
                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a>
            </li>
            <li role="presentation">
                <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a>
            </li>
            <li role="presentation">
                <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home">134456561</div>
            <div role="tabpanel" class="tab-pane fade" id="profile">*/**-/-/*-/-*/*-/-</div>
            <div role="tabpanel" class="tab-pane fade" id="messages">000000000000000000</div>
            <div role="tabpanel" class="tab-pane fade" id="settings">666666666666666666</div>
        </div>

    </div>

@endsection

@section('scripts')

@endsection
