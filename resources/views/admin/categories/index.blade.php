@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-8">
        <a
                href="{{ route("admin.add-categories") }}"
                class="btn btn-primary my-2">
                    <i class="fa fa-plus"></i>
            </a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Title</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $data)
                
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->slug}}</td>
                            <td>
                                <a href=""><i class="fa fa-trash"></i></a>
                                &nbsp;
                                <a href=""><i class="fa fa-edit"></i></a>

                            </td>
                            </td>
                        </tr>
                </tbody>
                    @endforeach
            </table>
            <hr>
            <div class="justify-content-center d-flex">
            </div>
        </div>
    </div>
</div>
@endsection
