@extends('layouts.app')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Get Email</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('set_email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ array_has($errors,'email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if (array_has($errors,'email'))
                                    <span class="help-block">
                                        <strong>{!! $errors['email'] !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $id }}"/>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
