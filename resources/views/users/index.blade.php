@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Users
            @role('admin')
            <a class="btn btn-success pull-right" href="{{ route('users.create') }}">
                <i class="glyphicon glyphicon-plus"></i> 
                Create
            </a>
            @endrole
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($users->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            @role('admin')<th>PASSWORD</th>@endrole
                            <th>ROLE</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                @role('admin')<td>{{$user->password}}</td>@endrole
                                <td>{{$user->getRoleNames()[0]}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('users.show', $user->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    @role('admin')
                                        <a class="btn btn-xs btn-warning" href="{{ route('users.edit', $user->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                        </form>
                                    @endrole
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $users->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

    @auth
    <a class="btn btn-success pull-right" href="{{ action('UserController@export') }}">
        <i class="glyphicon glyphicon-plus"></i> 
        Export Excel
    </a>
    @endauth

@endsection
