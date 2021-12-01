@extends('admin.template')

@section('content')

<div class="col-12">
    <a href="{{route('admin.category.create')}}" class="btn bg-gradient-primary btn-sm mb-3">Add Category</a>

    @if(count($categories)>0)   
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="mb-3">
                    <h6>Categories ({{$categories_count}})</h6> 
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Who Created</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created At</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Action</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
                    @foreach($categories as $category)
                    <tr>
                        <td>
                        <div class="d-flex px-2">
                            <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="margin-left:8px">{{$category->name}}</h6>
                            </div>
                        </div>
                        </td>

                        <td>
                        <div class="d-flex px-2">
                            <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="margin-left:8px">{{$category->user->name}}</h6>
                            </div>
                        </div>
                        </td>

                        <td>
                        <p class="text-sm font-weight-bold mb-0">{{$category->created_at->diffForHumans()}}</p>
                        </td>

                        <td>
                            <div class="ms-auto">
                                <form action="{{route('admin.category.destroy',$category->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-link text-dark px-3 mb-0" 
                                        href="{{route('admin.category.edit',$category->id)}}">
                                        <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" 
                                        ><i class="far fa-trash-alt me-2" aria-hidden="true"></i>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>     

                    </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    @else
        <center><b>No Categories Found</b></center>
    @endif
            
</div>

@endsection