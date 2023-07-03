@extends('admin.admin_master')

@section('body')


<div class="main-content">
    <section class="section">
            <div class="section-header">
                <h1> Edit Transaction </h1>
                <div class="ml-auto">
                    <a href="{{ route('local_transactions') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back to Local Tansactions</a>
                </div>
            </div>
        <div class="section-body">
            <form action="{{ route('update_local_transaction',$local_transaction->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5>Edit Transaction</h5>
                                    <div class="form-group mb-3">
                                    <div class="form-group mb-3">

                                    <div class="form-group mb-3">
                                        <label>Account Name</label>
                                        <input type="text" class="form-control" name="acct_name" value="{{ $local_transaction->acct_name }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Account Number</label>
                                        <input type="text" class="form-control" name="acct_number" value="{{ $local_transaction->acct_number }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>amount</label>
                                        <input type="text" class="form-control" name="amount" value="{{ $local_transaction->amount }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Description</label>
                                        <input type="text" class="form-control" name="description" value="{{ $local_transaction->description }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Date of Created</label>
                                        <input  class="form-control" name="created_at" value="{{ $local_transaction->created_at }}">
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