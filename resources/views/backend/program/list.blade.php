@extends('backend.layouts.backendMasterLayout')
@section('title','Program List')
@section('backendContent')

<div class="row">
   <div class="col-12">
      <div class="card card-default">

        <div class="card-header align-items-center">
            <h2 class="">Program List</h2>
            <a href="{{ route('admin.program.create') }}" class="btn btn-primary btn-pill create__btn">Create Program</a>
            <a href="" class="btn btn-success modifiy__btn">Modify Program</a>
         </div>

         <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
               <thead>
                  <tr>
                     <th></th>
                     <th>Image</th>
                     <th>Title</th>
                     <th>From Time</th>
                     <th>To Time</th>
                     <th>Location</th>
                     <th>Type</th>
                     <th>Price</th>
                     <th>Program Date</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @forelse ($programs as $program)
                 <tr>
                    <td><input type="checkbox" class="check_box" name="check_box" value="{{ $program->id }}"></td>
                    <td class="py-0">
                        <img src="{{ !empty($program->image) ? asset('storage/programs/'.$program->image) : asset('backend_assets/images/default-image.png') }}" alt="Program Image">
                     </td>
                    <td>{{ $program->title }}</td>
                    <td>{{ date('h:i A',strtotime($program->from_time)) }}</td>
                    <td>{{ date('h:i A',strtotime($program->to_time)) }}</td>
                    <td>{{ $program->location }}</td>
                    <td>{{ ucfirst($program->program_type) }}</td>
                    <td>{{ $program->price ?? 0 }}</td>
                    <td>{{ date('Y-m-d',strtotime($program->program_date)) }}</td>
                    <td>
                        <a href="{{ route('admin.program.edit',$program) }}" class="btn btn-success"><i class="fas fa-edit"></i></a> <!--Edit-->
                        <form action="{{ route('admin.program.destroy',$program) }}" method="POST" class="d-inline-block"> <!--Delete-->
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