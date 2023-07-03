@extends('admin.admin_master')

@section('body')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Wire Transation Table</h1>
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
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Pin_Verified</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wire_transactions as $item)
                                            <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $item->acct_name}}</td>
                                        <td>{{ $item->acct_number }}</td>
                                        @if ( $item->status == 'Not approved')
                                            <td class="text-danger"><b>{{ $item->status}}</b></td>
                                                
                                        @elseif($item->status == 'approved')
                                            <td class="text-success"><b>{{ $item->status}}</b></td>

                                        @else
                                        <td class="text-info"><b>{{ $item->status}}</b></td>
                                        @endif

                                        @if ( $item->status == 'Not approved')
                                            <td class="text-danger"><b>{{ $item->amount}}</b></td>
                                                
                                        @else
                                            <td><b>{{ $item->amount}}</b></td>
                                        @endif
                                        
                                        @if ($item->pin_verify == 'Yes')
                                        <td class="text-success">{{ $item->pin_verify }}</td>
                                        @else
                                        <td class="text-danger">No</td>
                                        @endif
                                        
                                        
                                        <td class="pt_10 pb_10">
                                            <a class="btn btn-primary" href="{{ route('edit_wire_transaction', $item->id) }}">Edit</a>
                                            <a href="{{ route('delete_wire_transaction', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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