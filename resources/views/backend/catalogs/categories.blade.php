@extends('backend.layouts.backendMasterLayout')
@section('title','Category List')
@section('backendContent')

<div class="row">
   <div class="col-12">
      <div class="card card-default">

         <div class="card-header align-items-center">
            <h2 class="">Category List</h2>
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-pill create__btn">Create Category</a>
            <a href="" class="btn btn-success modifiy__btn">Modify Category</a>
         </div>

         <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
               <thead>
                  <tr>
                     <th></th>
                     <th>Title</th>
                     <th>Slug</th>
                     <th>Published On</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @forelse ($categories as $category)
                 <tr>
                    
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