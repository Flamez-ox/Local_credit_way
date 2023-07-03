@extends('admin.admin_master')

@section('body')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pins Table</h1>
                
            
        </div>
        <div  style="text-align: right; margin-buttom:5px">
            <a href="{{ route('delete_pin_all') }}" class="btn btn-success " onClick="return confirm('Are you sure?');">Delete all pins</a>
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
                                        <th>Pins</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pins as $item)
                                            <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $item->pins }}</td>
                                        
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('delete_pin', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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