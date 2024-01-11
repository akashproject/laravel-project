@extends('backend.layouts.backendMasterLayout')
@section('title','Membership Plan List')
@section('backendContent')

<div class="row">
   <div class="col-12">
      <div class="card card-default">

        <div class="card-header align-items-center">
            <h2 class="">Membership Plans</h2>
            <a href="{{ route('admin.membership-plans.create') }}" class="btn btn-primary btn-pill">Add Plan</a>
         </div>


         <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Price</th>
                     <th>Description</th>
                     <th>Tenure </th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @forelse ($membershipPlans as $plan)
                 <tr>
                    <td>{{ $plan->name }}</td>
                    <td>{{ $plan->price }}</td>
                    <td>{{ $plan->description }}</td>
                    <td style="display: block;">{{ $plan->tenure }}</td>

                    <td>
                         <a href="javascript:void(0)" plan-id="{{ $plan->id }}" class="btn btn-status btn-active-{{ $plan->id }}" @if($plan->status == 'active'){{'style=display:inline-block;'}}@else{{'style=display:none;'}}@endif><i class='fas fa-toggle-on fa-2x'></i> </a>

                        <a href="javascript:void(0)" plan-id="{{ $plan->id }}" class="btn btn-status btn-inactive-{{ $plan->id }}" @if($plan->status == 'inactive'){{'style=display:inline-block;'}}@else{{'style=display:none;'}}@endif><i class='fas fa-toggle-off fa-2x'></i> </a> 


                    </td>

                    <td>
                        <a href="{{ route('admin.membership-plans.edit',$plan) }}" class="btn btn-success"><i class="fas fa-edit"></i></a> <!--Edit-->
                        <form action="{{ route('admin.membership-plans.destroy',$plan) }}" method="POST" class="d-inline-block"> <!--Delete-->
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button> 
                        </form>
                    </td>
                </tr> 
                @empty
                        
                @endforelse
                   
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

@endsection

@push('backend-scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $(".btn-status").on('click', function() {
            let curObj =  $(this),
            planId = curObj.attr('plan-id');

            $.ajax({
                url: "{{ route('admin.membership-pan.status') }}",
                type: 'POST',
                data:{
                  id: planId,
                  _token:"{{ csrf_token() }}"
                },
                success:function(res){
                    if (res.error) {
                        toastr.success(res.error);
                    }

                  $(`.btn-active-${res.plan.id}`).hide();
                  $(`.btn-inactive-${res.plan.id}`).hide();

                  if(res.plan.status == 'active'){
                    $(`.btn-active-${res.plan.id}`).show();
                    toastr.success(res.status);
                  }
                  else{
                    $(`.btn-inactive-${res.plan.id}`).show();
                    toastr.success(res.status);
                  }
                }
            });
        });
    });
</script>
@endpush