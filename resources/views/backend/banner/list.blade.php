@extends('backend.layouts.backendMasterLayout')
@section('title','Banner List')
@section('backendContent')

<div class="row">
   <div class="col-12">
      <div class="card card-default">

        <div class="card-header align-items-center">
            <h2 class="">Banner List</h2>
            <a href="{{ route('admin.banner.create') }}" class="btn btn-primary btn-pill create__btn">Create Banner</a>
            <a href="" class="btn btn-success modifiy__btn">Modify Banner</a>
         </div>

         <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
               <thead>
                  <tr>
                     <th></th>
                     <th></th>
                     <th>Title</th>
                     <th>Sub Title</th>
                     <th>Btn Label</th>
                     <th>Btn Url</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @forelse ($banners as $banner)
                 <tr>
                    <td><input type="checkbox" class="check_box" name="check_box" value="{{ $banner->id }}"></td>
                    <td class="py-0">
                        <img src="{{ !empty($banner->banner) ? asset('storage/banners/'.$banner->banner) : asset('backend_assets/images/default-image.png') }}" alt="Banner Image">
                     </td>
                    <td>{{ Str::words($banner->title,8) }}</td>
                    <td>{{ Str::words($banner->sub_title,8) }}</td>
                    <td>{{ $banner->banner_btn_label }}</td>
                    <td>{{ $banner->banner_btn_link }}</td>

                    {{-- <td>{{ $banner->image }}</td> --}}
                    {{-- <td>{{ date('Y-m-d',strtotime($banner->created_at)); }}</td> --}}

                    {{-- <td>
                        <a href="javascript:void(0)" plan-id="{{ $banner->id }}" class="btn btn-status btn-active-{{ $banner->id }}" @if($banner->status == 'active'){{'style=display:inline-block;'}}@else{{'style=display:none;'}}@endif><i class='fas fa-toggle-on fa-2x'></i> </a>

                        <a href="javascript:void(0)" plan-id="{{ $banner->id }}" class="btn btn-status btn-inactive-{{ $banner->id }}" @if($banner->status == 'inactive'){{'style=display:inline-block;'}}@else{{'style=display:none;'}}@endif><i class='fas fa-toggle-off fa-2x'></i> </a>
                    </td> --}}
                    <td>
                        <a href="{{ route('admin.banner.edit',$banner) }}" class="btn btn-success"><i class="fas fa-edit"></i></a> <!--Edit-->
                        <form action="{{ route('admin.banner.destroy',$banner) }}" method="POST" class="d-inline-block"> <!--Delete-->
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