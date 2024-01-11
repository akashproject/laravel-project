@extends('backend.layouts.backendMasterLayout')
@section('title','Mail Template List')
@section('backendContent')

<div class="row">
   <div class="col-12">
      <div class="card card-default">

        <div class="card-header align-items-center">
            <h2 class="">Mail Template List</h2>
            <a href="{{ route('admin.mail-template.create') }}" class="btn btn-primary btn-pill create__btn">Create Mail Template</a>
            <a href="" class="btn btn-success modifiy__btn">Modify Mail Template</a>
         </div>

         <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
               <thead>
                  <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Subject</th>
                      <!--<th>Status</th>-->
                      <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @forelse($mail_templates as $mail_template)
                  <tr>
                    <td><input type="checkbox" class="check_box" name="check_box" value="{{ $mail_template->id }}"></td>
                    <td>
                      {{ $mail_template->name ?? '--' }}
                    </td>
                    <td>
                      {{ $mail_template->slug ?? '--' }}
                    </td>
                    <td>
                      {{ $mail_template->subject ?? '--' }}
                    </td>
                    <td>
                      <a href="{{ route('admin.mail-template.edit', $mail_template) }}" class="btn btn-success">
                        <i class="fas fa-edit"></i>
                      </a> <!--Edit-->
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