@extends('layouts.app')
@section('content')
<div class="container">
<form method="post" action="{{url('company')}}" enctype="multipart/form-data">
@csrf
@include('company.form',['Modo'=>'Add'])

</form>

</div>
@endsection