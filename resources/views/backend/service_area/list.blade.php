@extends('backend.layouts.backendMasterLayout')
@section('title','Service Area List')
@section('backendContent')

<div class="row">
   <div class="col-12">
      <div class="card card-default">

        <div class="card-header align-items-center">
            <h2 class="">Service Area List</h2>
            <a href="{{ route('admin.service-area.create') }}" class="btn btn-primary btn-pill create__btn">Create Service Area</a>
            <a href="" class="btn btn-success modifiy__btn">Modify Service Area</a>
         </div>

         <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
               <thead>
                  <tr>
                     <th></th>
                     <th>Name</th>
                     <th>Creared At</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @forelse ($service_areas as $service_area)
                 <tr>
                    <td><input type="checkbox" class="check_box" name="check_box" value="{{ $service_area->id }}"></td>
                    <td>{{ Str::words($service_area->name,10) }}</td> 
                    <td>{{ date('Y-m-d h:i:s a',strtotime($service_area->created_at)) }}</td>
                        
                    <td>
                        <a href="{{ route('admin.service-area.edit',$service_area) }}" class="btn btn-success"><i class="fas fa-edit"></i></a> <!--Edit-->
                        <form action="{{ route('admin.service-area.destroy',$service_area) }}" method="POST" class="d-inline-block"> <!--Delete-->
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
                $('.create__btn').hide();
            }
            else{
                $('.modifiy__btn').hide();
                $('.create__btn').show();
            }
        });
    });
</script>
@endpush