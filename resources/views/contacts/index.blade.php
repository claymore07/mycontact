@extends('layouts.main')




@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <div class="pul-left">
                All Contacts
            </div>
            <div class="pull-right">
                <a href="{{route('contacts.create')}}" class="btn btn-success">
                    <i class="glyphicon glyphicon-plus"></i>
                    Add Contact
                </a>
            </div>
        </div>
        @if(Session::has('message'))
        <div class=" alert alert-success">
            {{session('message')}}
        </div>
        @endif
        <table class="table">
            @foreach($contacts as $contact)
            <tr>
                <td class="middle">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object " style="height: 100px; width: 100px"  src="/images/{{$contact->photo?$contact->photo:''}}" alt="{{$contact->name}}">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Contact 1</h4>
                            <address>
                                <strong>{{$contact->name}}</strong><br>
                                {{$contact->email}}
                            </address>
                        </div>
                    </div>
                </td>
                <td width="100" class="middle">
                    {!! Form::open(['method'=>'DELETE', 'action'=>['ContactsController@destroy',$contact->id]]) !!}
                    {!! Form::token() !!}
                    <div>
                        <a href="{{route('contacts.edit', $contact->id)}}" class="btn btn-circle btn-default btn-xs" title="Edit">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>


                        <button onclick="return confirm('آیا مطمئن می باشید؟');" type="submit" href="{{route('contacts.destroy', $contact->id)}}" class="btn btn-circle btn-danger btn-xs" title="Edit">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
          @endforeach
        </table>
    </div>

    <div class="text-center">
        <nav>
           {{$contacts->appends(Request::query())->render()}}
        </nav>
    </div>

@endsection
