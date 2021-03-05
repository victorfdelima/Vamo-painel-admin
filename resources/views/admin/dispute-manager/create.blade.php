@extends('admin.layout.base')

@section('title', 'New Dispute Manager')

@section('content')


    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">@lang('admin.dispute-manager.add_dispute_manager')</h4>
              <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="{{route('admin.dispute-manager.store')}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.account-manager.full_name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ old('name') }}" name="name" required id="name" placehold="@lang('admin.account-manager.full_name')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="bmd-label-floating">@lang('admin.email')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="email" required name="email" value="{{old('email')}}" id="email" placehold="@lang('admin.email')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="bmd-label-floating">@lang('admin.password')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" name="password" id="password" placehold="@lang('admin.password')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="bmd-label-floating">@lang('admin.account-manager.password_confirmation')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placehold="@lang('admin.dispute-manager.password_confirmation')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="mobile" class="bmd-label-floating">@lang('admin.mobile')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="{{ old('mobile') }}" name="mobile" required id="mobile" placehold="@lang('admin.mobile')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.dispute-manager.add_dispute_manager')</button>
                        <a href="{{route('admin.dispute-manager.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
