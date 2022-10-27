@extends('layouts.app')
@section('content')
<div class="container">
<form method="post" action="{{url('employer')}}" enctype="multipart/form-data">
@csrf
@include('employer.form',['Modo'=>'Add'])

</form>

</div>
@endsection