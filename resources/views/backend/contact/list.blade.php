@extends('backend.layouts.backendMasterLayout')
@section('title','Contact List')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Contact List</h2>
         </div>
         <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
               <thead>
                  <tr>
                     <th>Full Name</th>
                     <th>Email</th>
                     <th>Phone Number</th>
                     <th>Message</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @forelse ($contacts as $contact)
                  <tr>
                     <td>{{ $contact->first_name .' '. $contact->last_name}}</td>
                     <td>{{ $contact->email }}</td>
                     <td>{{ $contact->phone_number }}</td>
                     <td>{{ Str::words($contact->message,10) }}</td>
                     <td>
                        <form action="{{ route('admin.contact.destroy',$contact) }}" method="POST" class="d-inline-block" onclick="return confirm('Are you sure?')">
                           {{ csrf_field() }}
                           @method('DELETE')
                           <button class="btn btn-danger "><i class="fa-solid fa-trash"></i></button>
                        </form>
                        <a href="{{ route('admin.contact.details',$contact) }}" class="btn btn-primary" title="View Details"><i class="fa fa-eye" aria-hidden="true"></i> 
                        </a>
                     </td>
                  </tr>
                  @empty
                  <td colspan="7">No data Found!!</td>
                  @endforelse
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection