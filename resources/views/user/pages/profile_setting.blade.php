@extends('user.user_master')

@section('Tittle', 'Profile setting')


@section('body')
<div class="content-w">
          <div class="content-i">
            <div class="content-box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">
                    <div class="element-box">
                      <form action="{{ route('user_setting_submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="element-info">
                          <div class="element-info-with-icon">
                            <div class="element-info-icon">
                              <div class="os-icon os-icon-wallet-loaded"></div>
                            </div>
                            @if(session()->get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                              <span aria-hidden="true"> &times;</span></button>
                              <strong>{{ session()->get('success') }} &#128578;</strong>
                            </div>
                            @endif
                            <div class="element-info-text">
                              <h5 class="element-inner-header">
                                Profile Settings
                              </h5>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for=""> Email address</label
                          ><input
                            class="form-control"
                            data-error="Your email address is invalid"
                            placeholder="Enter email"
                            required="required"
                            type="email" name="email" value="{{ $users->email }}"
                          />
                          <div
                            class="help-block form-text with-errors form-control-feedback"
                          ></div>
                        </div>
                        <div class="form-group">
                          <label for=""> Phone</label
                          ><input
                            class="form-control"
                            data-error="Your email address is invalid"
                            placeholder="Enter email"
                            required="required"
                            type="number" name="phone" value="{{ $users->phone }}"
                          />
                          <div
                            class="help-block form-text with-errors form-control-feedback"
                          ></div>
                        </div>
                        <div class="form-group">
                          <label for="">Country</label
                          ><input
                            class="form-control"
                            data-error="Your email address is invalid"
                            placeholder="Enter email"
                            required="required"
                            type="text" name="country" value="{{ $users->country }}"
                          />
                          <div
                            class="help-block form-text with-errors form-control-feedback"
                          ></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for=""> First Name</label
                                ><input
                                  class="form-control"
                                  data-error="Please input your First Name"
                                  placeholder="First Name"
                                  required="required"
                                  name="first_name"
                                  value="{{ $users->first_name }}"
                                />
                                <div
                                  class="help-block form-text with-errors form-control-feedback"
                                ></div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="">Last Name</label
                                ><input
                                  class="form-control"
                                  data-error="Please input your Last Name"
                                  placeholder="Last Name"
                                  required="required"
                                  name="surname"
                                  value="{{ $users->surname }}"
                                />
                                <div
                                  class="help-block form-text with-errors form-control-feedback"
                                ></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for=""> Date of Birth</label
                                ><input
                                  class="single-daterange form-control"
                                  placeholder="Date of birth"
                                  name="date_of_birth"
                                  value="{{ $users->date_of_birth }}"
                                />
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="">Profile</label>
                                  <input
                                    class="form-control"
                                    type="file"
                                    name="photo"
                                  />
                              </div>
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for=""> Password</label
                              ><input
                                class="form-control"
                                data-minlength="6"
                                placeholder="Password"
                               
                                type="password" name="password"
                              />
                              <div
                                class="help-block form-text text-muted form-control-feedback"
                              >
                                Minimum of 6 characters
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="">Confirm Password</label
                              ><input
                                class="form-control"
                                data-match-error="Passwords don&#39;t match"
                                placeholder="Confirm Password"
                                
                                type="password" name="same_password"
                              />
                              <div
                                class="help-block form-text with-errors form-control-feedback"
                              ></div>
                            </div>
                          </div>
                        </div>
                        <div class="form-buttons-w">
                          <button class="btn btn-primary" type="submit">
                            Submit
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection