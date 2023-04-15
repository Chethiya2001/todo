@extends('layouts.app')

@section('content')
<div class="continer">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">Todo List</h1>
        </div>
        
            <div class="col-lg-12">
                <div class="container">
                <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form"> {{--use encrypt img uploding and need CSRF token to send data--}}
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                                <div class="form-group">
                                    <input class="form-control form-control-lg" type="text" name="title" placeholder="Enter Task">
                                </div> 
                        </div>   
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                    </div>
                </form>
                </div>
            </div>

        </div>
        <div class="col-lg-12 mt-5">
            <div>
                <table class="table table-striped table-dark ">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $task->title }}</td>
                            <td>
                                @if ($task ->done == 0)
                                    <span class="badge bg-warning">Not completed</span>
                                @else
                                    <span class="badge bg-success">Completed</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('todo.delete',$task->id) }}" class="button btn-danger" ><i class="fa-sharp fa-solid fa-trash fa-beat" style="color: #ff0000;"></i></a>
                                <a href="{{ route('todo.done',$task->id) }}" class="button btn-success" ><i class="fa-sharp fa-solid fa-check fa-beat" style="color: #00ff40;"></i></a>
                            </td>
                          </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <style>
        .page-title {
            padding-top:5vh ;
            font-size: 4rem;
            color: rgb(77, 233, 54);
        }

    </style>
@endpush