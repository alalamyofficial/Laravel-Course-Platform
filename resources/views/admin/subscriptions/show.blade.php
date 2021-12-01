@extends('admin.template')

@section('content')

@if(count($subscriptions)>0)
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <div class="mb-3">
                <h6>Subscriptions ({{$subscriptions_count}})</h6>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stripe ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stripe Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stripe Plan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created At</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Action</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="myTable">
                @foreach($subscriptions as $subscription)

                <tr>


                    <td>
                        <div class="d-flex px-2">
                            <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="margin-left:8px">{{$subscription->user_id}}</h6>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="d-flex px-2">
                            <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="margin-left:8px">{{$subscription->name}}</h6>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="d-flex px-2">
                            <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="margin-left:8px">{{$subscription->stripe_id}}</h6>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="d-flex px-2">
                            <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="margin-left:8px">{{$subscription->stripe_status}}</h6>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="d-flex px-2">
                            <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="margin-left:8px">{{$subscription->stripe_plan}}</h6>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="d-flex px-2">
                            <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="margin-left:8px">{{$subscription->quantity}}</h6>
                            </div>
                        </div>
                    </td>

                    <td>
                        <p class="text-sm font-weight-bold mb-0">
                            {{ \Carbon\Carbon::parse($subscription->created_at)->diffForHumans() }}
                        </p>
                    </td>

                    <td>
                        <div class="ms-auto">
                            <form action="{{route('admin.subscription.destroy',$subscription->id)}}" 
                                method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0">
                                    <i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete
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
    </div>
@else
    <center><b>No Subscriptions Found</b></center>
@endif

@endsection