@extends('layout')

@section('step')
    <progress-step :active="2"></progress-step>
@endsection

@section('content')
    <vehicle-property
        model="{{ $model }}"
        milage="{{ $milage }}"
        :form-data='@json($data)'
    >
    </vehicle-property>
@endsection
