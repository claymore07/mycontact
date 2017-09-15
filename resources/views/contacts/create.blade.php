@extends('layouts.main')


@section('content')
    @include('includes.includes')
    <div class="col-xs-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Add Contact</strong>
            </div>
            {!! Form::open(['method'=>'POST', 'action'=>'ContactsController@store', 'files'=>true]) !!}
                @include('contacts.form')
            {!! Form::close() !!}
        </div>

    </div>
    </div>
    </div>

@endsection


