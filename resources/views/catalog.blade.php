@extends('layouts.app')

@section('title', 'Welcome')

@section('sidebar')
    @parent
    <p>this is append to parent sidebar</p>
@endsection

@section('content')
    <p>Flower catalog table</p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Parent_Id</th>
        </tr>
        </thead>
        <tbody>
        @foreach($catalogs as $catalog)
            <tr>
                <td>{{$catalog->id}}</td>
                <td>{{$catalog->name_catalog}}</td>
                <td>{{$catalog->parent_id}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$catalogs->links()}}
    {!! Form::open(['method' => 'POST','route' => ['catalogs.store']]) !!}
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name_catalog') !!}
    <br>
    {!! Form::label('parent_id', 'Parent catalog:') !!}
    {!! Form::select('parent_id',$catalos) !!}
    <br>
    {!! Form::submit('Create') !!}
    {!! Form::close() !!}
@endsection
