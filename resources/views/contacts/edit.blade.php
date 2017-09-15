@extends('layouts.main')


@section('content')
    @include('includes.includes')
    <div class="col-xs-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Add Contact</strong>
            </div>
            {!! Form::model($contact,['method'=>'PUT', 'action'=>['ContactsController@update',$contact->id], 'files'=>true]) !!}
                @include('contacts.form')
            {!! Form::close() !!}
        </div>
    </div>
    </div>
    </div>

@endsection

