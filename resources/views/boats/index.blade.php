@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of boats</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('boats.create') }}"> Create New Boat</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($boats as $boat)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $boat->name }}</td>
            <td>{{ $boat->description }}</td>
            <td>
                <form action="{{ route('boats.destroy',$boat->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('boats.show',$boat->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('boats.edit',$boat->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $boats->links() !!}
      
@endsection