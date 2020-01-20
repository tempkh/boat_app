@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of boats</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('boats.create') }}"> Create new boat</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    @if(!$boats->isEmpty())
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <!-- <th>Description</th> -->
            <th width="280px">Action</th>
        </tr>
        @foreach ($boats as $boat)
        <tr>
            <td>{{ ++$i }}</td>
            <td width="280px"><img class="img-fluid w-75" src="{{ $boat->image }}" /></td> 
            <td>{{ $boat->name }}</td>
            <!-- <td>{{ $boat->description }}</td> -->
            <td>
                <form action="{{ route('boats.destroy',$boat->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('boats.show',$boat->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('boats.edit',$boat->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')
    
                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @else
        <h3>There is no boat to display</h3>
    @endif
  
    {!! $boats->links() !!}
      
@endsection