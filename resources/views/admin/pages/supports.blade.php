@extends('admin.admin_master')

@section('body')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Complaint Table</h1>
        </div>
         <div  style="text-align: right; margin-buttom:5px">
            <a href="{{ route('delete_complaint_all') }}" class="btn btn-success " onClick="return confirm('Are you sure?');">Delete all Complaints</a>
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
                                        <th>Subject</th>
                                        <th>Complaints</th>
                                        <th>User_Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($supports as $item)
                                            <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->message }}</td>
                                        <td>{{ $item->user_email }}</td>
                                        
                                        <td class="pt_10 pb_10">
                                            <a class="btn btn-primary" href="{{ route('reply_users', $item->user_email) }}">Reply User</a>
                                            <a href="{{ route('delete_complaint', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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