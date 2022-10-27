@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
    {{Session::get('mensaje')}}
@endif
<a href="{{url('employer/create')}}" class="btn btn-success" >Add employer</a>

<table class="table table-light">
    <thread class="thread-light">
        <tr>
            
            <th>#</th>
            <th>name</th>
            <th>last name</th>
            <th>company</th>
            <th>email</th>
            <th>phone</th>

        </tr>
    </thread>    


<tbody>
    @foreach($employers as $employer)
    <tr>
        <td>{{$employer->id}}</td>
        <td>{{$employer->name}}</td>
        <td>{{$employer->lastName}}</td>
        <td>{{$employer->company_id}}</td>
        <td>{{$employer->email}}</td>
        <td>{{$employer->phone}}</td>


        <td>
            <a href="{{url('/employer/'.$employer->id.'/edit')}}">
                edit
            </a>
            <form method="post" action="{{url('/employer/'.$employer->id)}}">
                @csrf
                {{method_field('DELETE')}}
                <input type="submit" onclick="return confirm('Quieres borrar?')" value="delete">
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{!!$employers->links()!!}
</div>
@endsection