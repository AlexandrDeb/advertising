@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-default">
                    @component('components.panel_heading')
                    {{$page_title}}
                    @endcomponent
                    <div class="panel-body">
                        @component('components.page_form')
                        @slot('route_name')
                        {{$form_route}}
                        @endslot
                        {{$button}}
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
