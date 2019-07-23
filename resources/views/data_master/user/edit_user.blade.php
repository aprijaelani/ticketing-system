@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" method="post" action="update">
				{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Edit Data </strong> Service Points</h3>
					<ul class="panel-controls">
						<li><a href="" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-4 control-label">Nama</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('name') ?: $user->name }}" name="name" id="name" class="form-control" placeholder="Name"/>
							{!! $errors->first('name', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Email</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('email') ?: $user->email }}" name="email" id="email" class="form-control" placeholder="Email"/>
							{!! $errors->first('email', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
					<div class="form-group">
						<label class="col-md-4 control-label">Telepon</label>
						<div class="col-md-4">                                            
							<input name="telepon" value="{{ old('telepon') ?: $user->telepon }}" id="telepon" type="number" class="form-control" placeholder="Telepon"/>     
							{!! $errors->first('telepon', '<span class="help-block">:message</span>')!!}        
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Service Point</label>
						<div class="col-md-4">
							<select class="form-control select" name="service_point_id" data-live-search="true" required>
                                    <option>Pilih Service Point</option>
                                    @foreach ($service_points as $service_point)
                                    <option value="{{ $service_point->id }}">{{ $service_point->nama }}</option required>                                   @endforeach
                            </select>
						</div>
					</div>

					<div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Level</label>
                        
                            <div class="col-md-4">
                                <select class="form-control select" name="level" data-live-search="true" required>
                                    <option>Level</option>
                                    <option value="1">Monitoring</option>
                                    <option value="2">Service Point Leader</option>
                                    <option value="3">Engineer</option>
                                </select>
                            </div>
                        </div>
				</div>
				<div class="panel-footer">
					<div class="col-sm-offset-2 col-sm-10">
						<button class="btn btn-primary">Clear Form</button>                            
						<button class="btn btn-info pull-right">Update</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>   
@endsection