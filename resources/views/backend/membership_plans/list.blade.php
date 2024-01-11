@extends('backend.layouts.backendMasterLayout')
@section('title','Membership Plan List')
@section('backendContent')

<div class="row">
   <div class="col-12">
      <div class="card card-default">

        <div class="card-header align-items-center">
            <h2 class="">Membership Plans</h2>
            <a href="{{ route('admin.membership-plans.create') }}" class="btn btn-primary btn-pill create__btn">Create Plan</a>
            <a href="" class="btn btn-success modifiy__btn">Modify Plan</a>
         </div>


         <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
               <thead>
                  <tr>
                     <th></th>
                     <th>Image</th>
                     <th>Name</th>
                     <th>Price</th>
                     <th>Tenure </th>
                     {{-- <th>Feature Title</th> --}}
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @forelse ($membershipPlans as $plan)
                 <tr>
                    <td><input type="checkbox" class="check_box" name="check_box" value="{{ $plan->id }}"></td>
                    <td class="py-0">
                        <img src="{{ !empty($plan->image) ? asset('storage/membership_plans/'.$plan->image) : asset('backend_assets/images/default-image.png') }}" alt="Membership Image">
                     </td>
                    <td>{{ $plan->name }}</td>
                    <td>{{ $plan->price }}</td>
                    <td style="display: block;">{{ $plan->tenure }}</td>
                    {{-- <td>{{ Str::limit($plan->feature_title,45) }}</td> --}}


                    <td>
                        {{-- <a href="javascript:void(0)" plan-id="{{ $plan->id }}" class="btn btn-status btn-active-{{ $plan->id }}" @if($plan->status == 'active'){{'style=display:inline-block;'}}@else{{'style=display:none;'}}@endif><i class='fas fa-toggle-on fa-2x'></i> </a>

                        <a href="javascript:void(0)" plan-id="{{ $plan->id }}" class="btn btn-status btn-inactive-{{ $plan->id }}" @if($plan->status == 'inactive'){{'style=display:inline-block;'}}@else{{'style=display:none;'}}@endif><i class='fas fa-toggle-off fa-2x'></i> </a>  --}}


                        <label class="switch switch-primary switch-pill form-control-label ">
                          <input type="checkbox" plan-id="{{ $plan->id }}" class="switch-input form-check-input btn-status btn-active-{{ $plan->id }}" value="on" 

                          @if($plan->status == 'active'){{'checked','style=display:block;'}}@else{{'style=display:none;'}}@endif >

                          <input type="checkbox" plan-id="{{ $plan->id }}" class="switch-input form-check-input btn-status btn-inactive-{{ $plan->id }}" value="on" 

                          @if($plan->status == 'inactive'){{'style=display:block;'}}@else{{'style=display:none;'}}@endif >


                          <span class="switch-label"></span>
                          <span class="switch-handle"></span>
                        </label>


                        {{-- <label class="switch switch-primary switch-pill form-control-label ">
                          <input type="checkbox" plan-id="{{ $plan->id }}" class="switch-input form-check-input btn-status btn-inactive-{{ $plan->id }}" value="on" 

                          @if($plan->status == 'inactive'){{'style=display:inline-block;'}}@else{{'style=display:none;'}}@endif checked>
                          <span class="switch-label"></span>
                          <span class="switch-handle"></span>
                        </label> --}}

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
            console.log("plan-id"+planId)

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


        $('.modifiy__btn').hide();
        // $('.create__btn').show();
        $('input.check_box').on('change', function() {

            if ($('.check_box').is(":checked")) {
                $('input.check_box').not(this).prop('checked', false);  
                $('.modifiy__btn').show();
                let curObj = $(this),
                    routePath = curObj.parent().parent().find('a')
                $('.modifiy__btn').attr('href',routePath.attr('href'))
                // $('.create__btn').hide();
            }
            else{
                $('.modifiy__btn').hide();
                // $('.create__btn').show();
            }
        });
    });
</script>
@endpush