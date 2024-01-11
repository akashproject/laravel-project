@extends('backend.layouts.backendMasterLayout')
@section('title','Fund Raiser List')
@section('backendContent')

<div class="row">
   <div class="col-12">
      <div class="card card-default">

        <div class="card-header align-items-center">
            <h2 class="">Fund Raiser List</h2>
            <a href="{{ route('admin.fund-raiser.create') }}" class="btn btn-primary btn-pill create__btn">Create Fund Raiser</a>
            <a href="" class="btn btn-success modifiy__btn">Modify Fund Raiser</a>
         </div>

         <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
               <thead>
                  <tr>
                     <th></th>
                     <th>Icon</th>
                     <th>Title</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @forelse ($fund_raisers as $fund_raiser)
                 <tr>
                    <td><input type="checkbox" class="check_box" name="check_box" value="{{ $fund_raiser->id }}"></td>
                    <td class="py-0">
                        <img src="{{ !empty($fund_raiser->icon) ? asset('storage/fund_raisers/'.$fund_raiser->icon) : asset('backend_assets/images/default-image.png') }}" alt="Fund Raiser Icon">
                     </td>
                    <td>{{ Str::words($fund_raiser->title,10) }}</td>
                    <td>
                        <a href="{{ route('admin.fund-raiser.edit',$fund_raiser) }}" class="btn btn-success"><i class="fas fa-edit"></i></a> <!--Edit-->
                        <form action="{{ route('admin.fund-raiser.destroy',$fund_raiser) }}" method="POST" class="d-inline-block"> <!--Delete-->
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
        $('.modifiy__btn').hide();
        // $('.create__btn').show();
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