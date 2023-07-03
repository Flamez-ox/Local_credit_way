@extends('admin.admin_master')

@section('body')


<div class="main-content">
    <section class="section">
            <div class="section-header">
                <h1> Edit Wire Transaction </h1>
                <div class="ml-auto">
                    <a href="{{ route('wire_transactions') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back to Wire Tansactions</a>
                </div>
            </div>
        <div class="section-body">
            <form action="{{ route('update_wire_transaction',$wire_transaction->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if ($wire_transaction->pin_verify == 'Yes')
                                <h3 class="text-success">Pin verify: {{ $wire_transaction->pin_verify }}</h3>
                                @else
                                <h3 class="text-danger">Pin verify: No</h3>
                                @endif
                            <div class="card-body">
                                
                                
                                <h5>Edit Transaction</h5>
                                    <div class="form-group mb-3">
                                    <div class="form-group mb-3">
                                            <h6>Confirm Wire Transaction from {{ $wire_transaction->currency }} Account</h6>
                                        <div class="form-group mb-3">
                                            <label>Wire Status</label>
                                            <select class="form-control" name="status">
                                                <option  class="text-danger" value="Not approved" @if ($wire_transaction->status == 'Not approved') selected @endif  >Not Approved</option>
                                                <option  class="text-success" value="approved" @if ($wire_transaction->status == 'approved') selected @endif >Approved</option>
                                            </select>
                                        </div>

                                    <div class="form-group mb-3">
                                        <label>Account Name</label>
                                        <input type="text" class="form-control" name="acct_name" value="{{ $wire_transaction->acct_name }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Account Number</label>
                                        <input type="text" class="form-control" name="acct_number" value="{{ $wire_transaction->acct_number }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>amount</label>
                                        <input type="text" class="form-control" name="amount" value="{{ $wire_transaction->amount }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>IBAN</label>
                                        <input type="text" class="form-control" name="iban" value="{{ $wire_transaction->iban }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Description</label>
                                        <input type="text" class="form-control" name="description" value="{{ $wire_transaction->description }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Date of Created</label>
                                        <input  class="form-control" name="created_at" value="{{ $wire_transaction->created_at }}">
                                    </div>
                                   
                             <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </div>
                        </div>
                    </div>
            </form>
        </div>
    </section>
</div>
@endsection