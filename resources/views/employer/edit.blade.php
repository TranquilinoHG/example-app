@extends('layouts.app')
@section('content')
<div class="container">

<form method="post" action="{{url('/employer/'.$employer->id) }}"  enctype="multipart/form-data">
    @csrf
   {{ method_field('PATCH') }}
    @include('employer.form',['Modo'=>'Edit'])
</form>


</div>
@endsection