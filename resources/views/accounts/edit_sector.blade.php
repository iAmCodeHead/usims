@extends('layouts.app')
@section('title', 'Edit Sector')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="side-navbar">
            @include('layouts.leftside-menubar')
        </div>
        <div class="col-md-8" id="main-container">
            <div class="panel panel-default">
                <div class="page-panel-title">Edit Sector</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @isset($sector)
                    <form class="form-horizontal" action="{{url('accounts/update-sector')}}" method="post">
                      {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$sector->id}}">
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label for="name" class="col-md-4 control-label">Sector Name</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control" name="name" value="{{$sector->name}}" placeholder="Sector Name" required>

                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                          <label for="type" class="col-md-4 control-label">Sector Type: {{ucfirst($sector->type)}} (Current)</label>

                          <div class="col-md-6">
                              <select class="form-control" name="type">
                                    <option value="income">Income</option>
                                    <option value="expense">Expense</option>
                              </select>

                              @if ($errors->has('type'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('type') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </div>
                    </form>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
