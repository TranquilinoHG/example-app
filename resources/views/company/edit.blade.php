@extends('layouts.app')
@section('content')
<div class="container">

<form method="post" action="{{url('/company/'.$company->id) }}"  enctype="multipart/form-data">
    @csrf
   {{ method_field('PATCH') }}
    @include('company.form',['Modo'=>'Edit'])
</form>


</div>
@endsection