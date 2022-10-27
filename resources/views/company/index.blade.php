@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
    {{Session::get('mensaje')}}
@endif
<a href="{{url('company/create')}}" class="btn btn-success" >Add company</a>

<table class="table table-light">
    <thread class="thread-light">
        <tr>
            
            <th>#</th>
            <th>name</th>
            <th>email</th>
            <th>website</th>
            <th>logo</th>
        </tr>
    </thread>    


<tbody>
    @foreach($companies as $company)
    <tr>
        <td>{{$company->id}}</td>
        <td>{{$company->name}}</td>
        <td>{{$company->email}}</td>
        <td>
            <img width="70" src="{{asset('storage').'/'.$company->logo}}" alt="">
        </td>
    
        <td>
            <a href="{{url('/company/'.$company->id.'/edit')}}">
                edit
            </a>
            <form method="post" action="{{url('/company/'.$company->id)}}">
                @csrf
                {{method_field('DELETE')}}
                <input type="submit" onclick="return confirm('Quieres borrar?')" value="delete">
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{!!$companies->links()!!}
</div>
@endsection