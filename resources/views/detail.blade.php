@extends('layout')

@section('step')
    <progress-step :active="1"></progress-step>
@endsection

@section('content')
    <vehicle-detail
        property-url='{{ route('property') }}'
        :make-data='@json($makes)'
        :model-data='@json($models)'
        :form-data='@json($data)'
    ></vehicle-detail>
@endsection
