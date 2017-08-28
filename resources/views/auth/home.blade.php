@extends('layouts.app')

@section('content')
    <div class="container">

        @if (Auth::user())
            <div class="row">
                <div class="col-md-12 bodyTitle">
                    <h1>Welcome back {{Auth::user()->username}}</h1>
                </div>
            </div>
        @endif
        <div class="row">
            @if (Auth::guest())
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login or Register</div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login.post') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">Username</label>
                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control" name="username"
                                               value="{{ old('username') }}" required autofocus>
                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password"
                                               required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
            @endif
            <div class="row">
                @if($ads->total() == 0)
                    <div class="col-md-12 bodyTitle"><h1>We have no ads</h1></div>
                @else
                @foreach($ads as $ad)
                    @include('components.feed')
                @endforeach
                @endif
            </div>
            <div class="row" id="pagination_wrapper">{{$ads->links(('vendor.pagination.bootstrap-4'))}}</div>

    </div>
@endsection
