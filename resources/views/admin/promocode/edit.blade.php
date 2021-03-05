@extends('admin.layout.base')

@section('title', 'Atualizar Cupom Promocional ')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap-datetimepicker.min.css')}}">

        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h5 class="card-title">@lang('admin.promocode.update_promocode')</h5>
                  <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
                </div>
                <div class="card-body">

                <form class="form-horizontal" action="{{route('admin.promocode.update', $promocode->id )}}"
                      method="POST" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">

                    <div class="form-group">
                        <label for="promo_code"
                               class="bmd-label-floating">@lang('admin.promocode.promocode')</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" value="{{ $promocode->promo_code }}"
                                   name="promo_code" required id="promo_code"
                                   placehold="@lang('admin.promocode.promocode')">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="percentage"
                               class="bmd-label-floating">@lang('admin.promocode.percentage')</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="number" value="{{ $promocode->percentage }}"
                                   name="percentage" required id="percentage"
                                   placehold="@lang('admin.promocode.percentage')">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="max_amount"
                               class="bmd-label-floating">@lang('admin.promocode.max_amount')</label>
                        <div class="col-xs-10">
                            <input type="number" class="form-control" name="max_amount" required id="max_amount"
                                   placehold="@lang('admin.promocode.max_amount')" value="{{$promocode->max_amount}}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="expiration"
                               class="bmd-label-floating">@lang('admin.promocode.expiration')</label>
                        <div class="col-xs-10">
                            <input class="form-control datetimepicker" type="text" value="{{ $promocode->expiration }}"
                                   name="expiration" required id="expiration"
                                   placehold="@lang('admin.promocode.expiration')">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="promo_description"
                               class="bmd-label-floating">@lang('admin.promocode.promo_description')</label>
                        <div class="col-xs-10">
                            <textarea id="promo_description" placehold="Description" class="form-control"
                                      name="promo_description">{{ $promocode->promo_description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="zipcode" class="bmd-label-floating"></label>
                        <div class="col-xs-10">
                            <button type="submit"
                                    class="btn btn-primary">@lang('admin.promocode.update_promocode')</button>
                            <a href="{{route('admin.promocode.index')}}"
                               class="btn btn-default">@lang('admin.cancel')</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('asset/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/js/moment-with-locales.min.js')}}"></script>
    <script type="text/javascript">
$(document).ready(function () {
    $(function () {
        $('.datetimepicker').datetimepicker({minDate: moment(), format: 'YYYY-MM-DD HH:mm'});
    });
});

$("#percentage").on('keyup', function () {
    var per = $(this).val() || 0;
    var max = $("#max_amount").val() || 0;
    $("#promo_description").val(per + '% off! Valor máximo de desconto R$' + max);
});

$("#max_amount").on('keyup', function () {
    var max = $(this).val() || 0;
    var per = $("#percentage").val() || 0;
    $("#promo_description").val(per + '% off! Valor máximo de desconto R$' + max);
});

</script>
@endsection

