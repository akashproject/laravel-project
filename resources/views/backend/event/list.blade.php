@extends('backend.layouts.backendMasterLayout')
@section('title','Event List')
@section('backendContent')

<div class="row">
   <div class="col-12">
      <div class="card card-default">

        <div class="card-header align-items-center">
            <h2 class="">Event List</h2>
            <a href="{{ route('admin.event.create') }}" class="btn btn-primary btn-pill create__btn">Create Event</a>
            <a href="" class="btn btn-success modifiy__btn">Modify Event</a>
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
                     <th>Organizer Name</th>
                     <th>Type</th>
                     <th>Event Date</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @forelse ($events as $event)
                 <tr>
                    <td><input type="checkbox" class="check_box" name="check_box" value="{{ $event->id }}"></td>
                    <td class="py-0">
                        <img src="{{ !empty($event->image) ? asset('storage/events/'.$event->image) : asset('backend_assets/images/default-image.png') }}" alt="Event Image">
                     </td>
                    <td>{{ Str::limit($event->title,40,',,,') }}</td>
                    <td>{{ date('H:i a', strtotime($event->from_date)) }}</td>
                    <td>{{ date('H:i a', strtotime($event->to_date)) }}</td>
                    
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->organizer_name }}</td>
                    <td>{{ ucfirst($event->event_type) }}</td>
                    <td>{{ date('Y-m-d',strtotime($event->event_date))}}</td>
                    <td>
                        <a href="{{ route('admin.event.edit',$event) }}" class="btn btn-success"><i class="fas fa-edit"></i></a> <!--Edit-->
                        <form action="{{ route('admin.event.destroy',$event) }}" method="POST" class="d-inline-block"> <!--Delete-->
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