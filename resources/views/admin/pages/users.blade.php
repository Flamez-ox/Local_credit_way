@extends('admin.admin_master')

@section('body')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Users Table</h1>
        </div>
        <div  style="text-align: right; margin-buttom:5px">
            <a href="{{ route('email_all_users') }}" class="btn btn-success">Email all Users</a>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $item->surname.' '.$item->first_name }}</td>
                                        <td>{{ $item->email }}</td>

                                        @if ( $item->user_status == 'deactive')
                                            <td class="text-danger"><b>{{ $item->user_status }}</b></td>
                                                
                                        @else
                                            <td class="text-success"><b>{{ $item->user_status }}</b></td>
                                            
                                        @endif
                                        
                                        <td class="pt_10 pb_10">
                                            <a class="btn btn-primary" href="{{ route('edit_users', $item->id) }}">Edit</a>
                                            <a href="{{ route('delete_users', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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