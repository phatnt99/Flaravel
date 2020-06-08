@extends('layouts.app')

@section('title', 'Send Mail Form')

@section('content')
    {!! Form::open(['method' => 'POST', 'route' => ['sendmail'], 'files' => true]) !!}
    {!! Form::label('to', 'To: ') !!}
    {!! Form::email('to') !!}
    <br>
    {!! Form::label('title', 'Title: ') !!}
    {!! Form::text('title') !!}
    <br>
    {!! Form::label('content', 'Content: ') !!}
    <br>
    {!! Form::textarea('content') !!}
    <br>
    {!! Form::label('attachment', 'Attachment: ') !!}
    {!! Form::file('attachment') !!}
    <br>
    {!! Form::submit('Send') !!}
    {!! Form::close() !!}
@endsection
