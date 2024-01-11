@extends('backend.layouts.backendMasterLayout')
@section('title','Strategic Priority List')
@section('backendContent')

<div class="row">
   <div class="col-12">
      <div class="card card-default">

        <div class="card-header align-items-center">
            <h2 class="">Strategic Priority List</h2>
            <a href="{{ route('admin.strategic-priority.create') }}" class="btn btn-primary btn-pill create__btn">Create Strategic Priority</a>
            <a href="" class="btn btn-success modifiy__btn">Modify Strategic Priority</a>
         </div>

         <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
               <thead>
                  <tr>
                     <th></th>
                     <th>Image</th>
                     <th>Title</th>
                     {{-- <th>Sub Title</th> --}}
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @forelse ($strategic_priorities as $strategic_priority)
                 <tr>
                    <td><input type="checkbox" class="check_box" name="check_box" value="{{ $strategic_priority->id }}"></td>
                    <td class="py-0">
                        <img src="{{ !empty($strategic_priority->image) ? asset('storage/strategic_priorities/'.$strategic_priority->image) : asset('backend_assets/images/default-image.png') }}" alt="Strategic Priority Image">
                     </td>
                    <td>{{ Str::words($strategic_priority->title,10) }}</td>
                    {{-- <td>{{ Str::words($strategic_priority->sub_title,10) }}</td> --}}
                    <td>
                        <a href="{{ route('admin.strategic-priority.edit',$strategic_priority) }}" class="btn btn-success"><i class="fas fa-edit"></i></a> <!--Edit-->
                        <form action="{{ route('admin.strategic-priority.destroy',$strategic_priority) }}" method="POST" class="d-inline-block"> <!--Delete-->
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