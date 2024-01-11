@extends('backend.layouts.backendMasterLayout')
@section('title','Donation List')
@section('backendContent')

<div class="row">
   <div class="col-12">
      <div class="card card-default">

        <div class="card-header align-items-center">
            <h2 class="">Donation List</h2>
         </div>

         <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
               <thead>
                  <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Amount($)</th>
                      <th>Card Holder Name</th>
                      <!--<th>Status</th>-->
                      <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @forelse($donners as $donner)
                  <tr>
                    <td><input type="checkbox" class="check_box" name="check_box" value="{{ $donner->id }}"></td>
                    <td>{{ $donner->fullname ?? '' }}</td>
                    <td>{{ $donner->email ?? '' }}</td>
                    <td>{{ $donner->amount ?? '' }}</td>
                    <td>{{ $donner->card_holder_name ?? '' }}</td>
                    <td>
                        <form action="{{ route('admin.donation.destroy',$donner) }}" method="POST">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                       <!--Edit-->
                    </td>
                  </tr>
                @empty
                  <td colspan="5" class="text-center">No Template(s) Added Yet</td>
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
        $('.modifiy__btn').hide();
        $('input.check_box').on('change', function() {

            if ($('.check_box').is(":checked")) {
                $('input.check_box').not(this).prop('checked', false);  
                $('.modifiy__btn').show();
                let curObj = $(this),
                    routePath = curObj.parent().parent().find('a')
                $('.modifiy__btn').attr('href',routePath.attr('href'))
            }
            else{
                $('.modifiy__btn').hide();
            }
        });
    });
</script>
@endpush