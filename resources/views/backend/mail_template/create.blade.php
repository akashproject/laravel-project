  @extends('backend.layouts.backendMasterLayout')
  @section('title','Create a new Mail template')
  @section('backendContent')
  <div class="row">
     <div class="col-12">
        <div class="card card-default">
           <div class="card-header align-items-center">
              <h2 class="">Create a new Mail template</h2>
           </div>
           <div class="card-body">
            <form class="forms-sample" action="{{ route('admin.mail-template.store') }}" method="POST" autocomplete="off">
              @csrf
              @include('backend.mail_template.form')
            </form>
          </div>
      </div>
   </div>
</div>
@endsection