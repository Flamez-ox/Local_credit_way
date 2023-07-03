@extends('admin.admin_master')

@section('body')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Local Transation Table</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <?php $id = 1; ?>
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Account Name</th>
                                        <th>Account Number</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($local_transactions as $item)
                                            <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $item->acct_name}}</td>
                                        <td>{{ $item->acct_number }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        
                                        <td class="pt_10 pb_10">
                                            <a class="btn btn-primary" href="{{ route('edit_local_transaction', $item->id) }}">Edit</a>
                                            <a href="{{ route('delete_local_transaction', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                        
                                    </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection