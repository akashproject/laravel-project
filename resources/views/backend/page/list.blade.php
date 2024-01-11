@extends('backend.layouts.backendMasterLayout')
@section('title','Page List')
@section('backendContent')

<div class="row">
   <div class="col-12">
      <div class="card card-default">

        <div class="card-header align-items-center">
            <h2 class="">Page List</h2>
            <a href="{{ route('admin.page.create') }}" class="btn btn-primary btn-pill create__btn">Create Page</a>
            <a href="" class="btn btn-success modifiy__btn">Modify Banner</a>
         </div>

         <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
               <thead>
                  <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Page Template</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @forelse ($pages as $page)
                 <tr>
                    <td><input type="checkbox" class="check_box" name="check_box" value="{{ $page->id }}"></td>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>
                        {{ !empty($page->page_template)? ucwords(str_replace('_', ' ', $page->page_template)) : '' }}
                    </td>
                    <td>{{ $page->created_at->format('d/m/Y H:i:s'); }}</td>
                    <td>
                        <a href="{{ route('admin.page.edit', $page) }}"
                        class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>

                        <form action="{{ route('admin.page.destroy',$page) }}" method="POST" onclick="return confirm('Are you sure?')" style="display: inline-block; width: 40px; margin: 0 5px;">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>

                    {{-- <td>
                        <a href="{{ route('admin.page.edit',$page) }}" class="btn btn-success"><i class="fas fa-edit"></i></a> <!--Edit-->
                        <form action="{{ route('admin.page.destroy',$page) }}" method="POST" class="d-inline-block"> <!--Delete-->
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button> 
                        </form>
                    </td> --}}
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