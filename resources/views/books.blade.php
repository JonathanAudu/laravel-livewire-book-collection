@extends('layouts.app')

@section('content')
    @livewire('book-form')
    <hr>
    <br>
    @livewire('books')
@endsection
