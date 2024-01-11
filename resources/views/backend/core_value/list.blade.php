@extends('backend.layouts.backendMasterLayout')
@section('title','Core Value List')
@section('backendContent')

<div class="row">
   <div class="col-12">
      <div class="card card-default">

        <div class="card-header align-items-center">
            <h2 class="">Core Value List</h2>
            <a href="{{ route('admin.core-value.create') }}" class="btn btn-primary btn-pill create__btn">Create Core Value</a>
            <a href="" class="btn btn-success modifiy__btn">Modify Core Value</a>
         </div>

         <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
               <thead>
                  <tr>
                     <th></th>
                     <th>Image</th>
                     <th>Title</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @forelse ($core_values as $core_value)
                 <tr>
                    <td><input type="checkbox" class="check_box" name="check_box" value="{{ $core_value->id }}"></td>
                    <td class="py-0">
                        <img src="{{ !empty($core_value->image) ? asset('storage/core_values/'.$core_value->image) : asset('backend_assets/images/default-image.png') }}" alt="Core Value Image">
                     </td>
                    <td>{{ Str::words($core_value->title,10) }}</td>
                    <td>
                        <a href="{{ route('admin.core-value.edit',$core_value) }}" class="btn btn-success"><i class="fas fa-edit"></i></a> <!--Edit-->
                        <form action="{{ route('admin.core-value.destroy',$core_value) }}" method="POST" class="d-inline-block"> <!--Delete-->
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