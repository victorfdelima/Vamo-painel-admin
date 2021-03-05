@extends('admin.layout.base')

@section('title', 'Admin ')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                @if(Setting::get('demo_mode', 0) == 1)
                <div class="col-md-12" style="height:50px;color:red;">
                            ** Demo Mode : @lang('admin.demomode')
                        </div>
                        @endif
                    <h5 class="card-title ">
                        @lang('admin.users.Users')
                        @if(Setting::get('demo_mode', 0) == 1)
                        <span class="pull-right">(*personal information hidden in demo)</span>
                        @endif               
                    </h5>
                    @can('role-create')
                    <a href="{{ route('admin.sub-admins.create') }}" style="margin-left: 1em;" class="btn pull-right"><i class="fa fa-plus"></i> Add Administrator</a>
                    @endcan
            </div>
            <div class="card-body">
              <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th>@lang('admin.id')</th>
                        <th>@lang('admin.name')</th>
                        <th>@lang('admin.email')</th>
                        <th>@lang('admin.mobile')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>
                            <form action="{{ route('admin.sub-admins.destroy', $user->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                @if( Setting::get('demo_mode', 0) == 0)
                                @can('sub-admin-edit')
                                <a href="{{ route('admin.sub-admins.edit', $user->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> @lang('admin.edit')</a>
                                @endcan
                                @can('sub-admin-delete')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> @lang('admin.delete')</button>
                                @endcan
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>@lang('admin.id')</th>
                        <th>@lang('admin.name')</th>
                        <th>@lang('admin.mobile')</th>
                        <th>@lang('admin.email')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    jQuery.fn.DataTable.Api.register( 'buttons.exportData()', function ( options ) {
        if ( this.context.length ) {
            var jsonResult = $.ajax({
                url: "{{url('admin/user')}}?page=all",
                data: {},
                success: function (result) {
                    p = new Array();
                    $.each(result.data, function (i, d)
                    {
                        var item = [d.id,d.first_name, d.last_name, d.email,d.mobile,d.rating, d.wallet_balance];
                        p.push(item);
                    });
                },
                async: false
            });
            var head=new Array();
            head.push("ID", "First Name", "Last Name", "Email", "Mobile", "Rating", "Wallet Amount");
            return {body: p, header: head};
        }
    } );

    $('#table-5').DataTable( {
        responsive: true,
        paging:false,
            info:false,
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
    } );
</script>
@endsection
