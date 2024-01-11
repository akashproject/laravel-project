@extends('backend.layouts.backendMasterLayout')
@section('title','Contact Details')
@section('backendContent')

<div class="container-fluid">

    <div class="col-12">
      <div class="card card-default">
        <div class="card-header align-items-center">
            <h2 class="">Contact Details</h2>
            <a href="{{ route('admin.contact.index') }}" class="btn btn-dark"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>

         </div>
            <div class="table-responsive">
              <table class="table table-bordered" id="pageList" width="100%" cellspacing="0">

                <tbody>

                  @if (!empty($contact))
                  <tr>
                    <th> Full Name </th>
                    <td>{{ $contact->first_name.' '.$contact->last_name }} </td>
                  </tr>

                  <tr>
                    <th>Email</th>
                    <td>{{ $contact->email }}</td>
                  </tr>

                  <tr>
                    <th width="15%">Phone Number</th>
                    <td>{{ $contact->phone_number }}</td>
                  </tr>

                  <tr>
                    <th>Message</th>
                    <td>{{ $contact->message }}</td>
                  </tr>

                  <tr>
                    <th>Date</th>
                   <td>{{ $contact->created_at->format('d/m/Y') }}</td>
                  </tr>

                  

                  @else
                    <td colspan="7">No data Found!!</td>
                  @endif

                </tbody>
              </table>
            </div>
        
      </div>
    </div>
  </div>

</div>
@endsection