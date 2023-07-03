@extends('admin.admin_master')

@section('body')


<div class="main-content">
    <section class="section">
            <div class="section-header">
                <h1> Edit Post </h1>
                <div class="ml-auto">
                    <a href="{{ route('show_users') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back to Users</a>
                </div>
            </div>
        <div class="section-body">
            <form action="{{ route('update_user_submit',$users->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5>Edit User</h5>
                                    <div class="form-group mb-3">
                                    <div class="form-group mb-3">

                                        <div class="form-group mb-3">
                                            <label>User Status</label>
                                            <select class="form-control" name="user_status">
                                                <option  class="text-success" value="active" @if ($users->user_status == 'active') selected @endif  >Active</option>
                                                <option  class="text-danger" value="deactive" @if ($users->user_status == 'deactive') selected @endif >Deactive</option>
                                            </select>
                                        </div>


                                        <div class="form-group mb-3">
                                            <label>Existing Photo</label>
                                            <div>
                                                <img src="{{ asset('user/clients/img/'.$users->photo) }}" alt="Existing photo" width="100px">
                                            </div>
                                        </div>
                                        <label>Change Photo</label>
                                        <div>
                                            <input type="file" name ="photo">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label> First Name</label>
                                        <input type="text" class="form-control" name="first_name" value="{{ $users->first_name }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label> Sur Name</label>
                                        <input type="text" class="form-control" name="surname" value="{{ $users->surname }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ $users->email }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $users->phone }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Country</label>
                                        <input type="text" class="form-control" name="country" value="{{ $users->country }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender">
                                            <option  value="Male" @if ($users->gender == 'Male') selected @endif  >Male</option>
                                            <option  value="Female" @if ($users->gender == 'Female') selected @endif >Female</option>
                                            <option  value="Rather not say" @if ($users->gender == 'Rather not say') selected @endif >Rather not say</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Account Type</label>
                                        <select class="form-control" name="acct_type">
                                            <option  value="Savings" @if ($users->acct_type == 'Savings') selected @endif  >Savings</option>
                                            <option  value="Current" @if ($users->acct_type == 'Current') selected @endif >Current</option>
                                            <option  value="Business" @if ($users->acct_type == 'Business') selected @endif >Business</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Account Balance(USD)</label>
                                        <input  class="form-control" name="acct_balance" value="{{ $users->acct_balance }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Account Balance(EUR)</label>
                                        <input  class="form-control" name="acct_euro" value="{{ $users->acct_euro }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Account Balance(Pounds)</label>
                                        <input  class="form-control" name="acct_pounds" value="{{ $users->acct_pounds }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Show Profile on dashboard</label>
                                        <select class="form-control" name="show_profile_on_dashboard">
                                            <option  value="Show" @if ($users->show_profile_on_dashboard == 'Show') selected @endif  >Show</option>
                                            <option  value="Hide" @if ($users->show_profile_on_dashboard == 'Hide') selected @endif >Hide</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Date of Birth</label>
                                        <input  class="form-control" name="date_of_birth" value="{{ $users->date_of_birth }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Address</label>
                                        <textarea  class="form-control snote" name="address" value="{{ $users->address }}">{{ $users->address }}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Password</label>
                                        <input  class="form-control" name="password" value="">
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