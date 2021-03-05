@extends('admin.layout.base')

@section('title', 'Painel de controle ')

@section('styles')
    <link rel="stylesheet" href="{{asset('main/vendor/jvectormap/jquery-jvectormap-2.0.3.css')}}">
@endsection

@section('content')

            {{-- <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title pull-left">Filter Franchise</h4>
                </div>
        </div>
        @can('dashboard-menus')
        <div class="row">
            <div class="col-xl-4 col-lg-12">
                <div class="card card-chart">
                <div class="card-header card-header-success">
                    <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Daily Sales</h4>
                    <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="card card-chart">
                <div class="card-header card-header-warning">
                    <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Email Subscriptions</h4>
                    <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="card card-chart">
                <div class="card-header card-header-danger">
                    <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Completed Tasks</h4>
                    <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                    </div>
                </div>
                </div>
            </div>
            </div>
            @endcan
             --}}
            <div class="row">
                    @can('dashboard-menus')
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">local_taxi</i>
                        </div>
                        <p class="card-category">@lang('Total de passeios')</p>
                        <h3 class="card-title">
                            @if (!is_null($totalRides))
                                        {{$totalRides}}
                                    @endif
                        <small>Passeios</small>
                        </h3>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">money</i>
                        </div>
                        <p class="card-category">@lang('Receita')</p>
                        <h3 class="card-title">{{currency($revenue)}}</h3>
                    </div>
                    
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">supervisor_account</i>
                        </div>
                        <p class="card-category">@lang('Passageiros')</p>
                        <h3 class="card-title">{{$users}}</h3>
                    </div>
                    </div>
                </div>
                @endcan
            </div>
            
            <div class="row">
                @can('dashboard-menus')
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-times"></i>
                        </div>
                        <p class="card-category">@lang('admin.dashboard.cancel_count')</p>
                        <h3 class="card-title">
                            {{$user_cancelled}}
                        <small> Passeios</small>
                        </h3>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-default card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-times"></i>
                        </div>
                        <p class="card-category">@lang('admin.dashboard.provider_cancel_count')</p>
                        <h3 class="card-title">{{$provider_cancelled}}</h3>
                    </div>
                    
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <p class="card-category">@lang('Motorista')</p>
                        <h3 class="card-title">{{$provider}}</h3>
                    </div>
                    </div>
                </div>
                @endcan
            </div>

        <div class="row row-md mb-2">
            @can('wallet-summary')
                <div class="col-md-4">
                <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title pull-left">@lang('admin.dashboard.wallet_summary')</h4>
                </div>
                <div class="card-body">
                        <table class="table">
                            <tbody>
                            @php($total=$wallet['admin'])
                            <tr>
                                <th scope="row">@lang('admin.dashboard.wallet_summary_admin_credit')</th>
                                <td class="text-success">{{currency($wallet['admin'])}}</td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('admin.dashboard.wallet_summary_provider_credit')</th>
                                @if($wallet['provider_credit'])
                                    @php($total=$total-$wallet['provider_credit'][0]['total_credit'])
                                    <td class="text-success">{{currency($wallet['provider_credit'][0]['total_credit'])}}</td>
                                @else
                                    <td class="text-success">{{currency()}}</td>
                                @endif
                            </tr>

                            <tr>
                                <th scope="row">@lang('admin.dashboard.wallet_summary_provider_debit')</th>
                                @if($wallet['provider_debit'])

                                    <td class="text-danger">{{currency($wallet['provider_debit'][0]['total_debit'])}}</td>
                                @else
                                    <td class="text-danger">{{currency()}}</td>
                                @endif
                            </tr>
                            <tr>
                                <th scope="row">@lang('admin.dashboard.wallet_summary_commission')</th>
                                <td class="text-success">{{currency($wallet['admin_commission'])}}</td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('admin.dashboard.wallet_summary_peak_commission')</th>
                                <td class="text-success">{{currency($wallet['peak_commission'])}}</td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('admin.dashboard.wallet_summary_waitining_commission')</th>
                                <td class="text-success">{{currency($wallet['waiting_commission'])}}</td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('admin.dashboard.wallet_summary_discount')</th>
                                <td class="text-danger">{{currency($wallet['admin_discount'])}}</td>
                            </tr>
                            <tr>
                                @php($total=$total-($wallet['admin_tax']))
                                <th scope="row">@lang('admin.dashboard.wallet_summary_tax_amount')</th>
                                <td class="text-success">{{currency($wallet['admin_tax'])}}</td>
                            </tr>

                            <tr>
                                <th scope="row">@lang('admin.dashboard.wallet_summary_tips')</th>
                                <td class="text-danger">{{currency($wallet['tips'])}}</td>
                            </tr>

                            <tr>
                                <th scope="row">@lang('admin.dashboard.wallet_summary_referrals')</th>
                                <td class="text-danger">{{currency($wallet['admin_referral'])}}</td>
                            </tr>

                            <tr>
                                <th scope="row">@lang('admin.dashboard.wallet_summary_disputes')</th>
                                <td class="text-danger">{{currency($wallet['admin_dispute'])}}</td>
                            </tr>

                            <!--                             <tr>
                            <th scope="row text-right">@lang('admin.dashboard.wallet_summary_total')</th>
                            <td>{{currency($total)}}</td>
                        </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            @endcan
            @can('recent-rides')
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <h4 class="card-title pull-left">@lang('admin.dashboard.Recent_Rides')</h4>
                        </div>
                        <div class="card-body">
                                <table class="table">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tbody>
                                    @if (is_null($rides))
                                        <tr>
                                            <th>No Data
                                            </th>
                                        </tr>
                                    @else
                                        @foreach($rides as $index => $ride)
                                            <tr>
                                                <th scope="row">{{$index + 1}}</th>
                                                <td>{{$ride->user->first_name}} {{$ride->user->last_name}}</td>
                                                <td>
                                                    <a class="text-primary"
                                                        href="{{route('admin.requests.show',$ride->id)}}"><span
                                                                class="underline">@lang('admin.dashboard.View_Ride_Details')</span></a>
                                                </td>
                                                <td>
                                                    <span class="text-muted">{{$ride->created_at->diffForHumans()}}</span>
                                                </td>
                                                <td>
                                                    @if($ride->status == "COMPLETED")
                                                        <span class="tag tag-success">COMPLETO</span>
                                                    @elseif($ride->status == "CANCELLED")
                                                        <span class="tag tag-danger">CANCELADO</span>
                                                    @elseif($ride->status == "ARRIVED")
                                                        <span class="tag tag-info">ARRIVED</span>
                                                    @elseif($ride->status == "SEARCHING")
                                                        <span class="tag tag-info">SEARCHING</span>
                                                    @elseif($ride->status == "ACCEPTED")
                                                        <span class="tag tag-info">ACCEPTED</span>
                                                    @elseif($ride->status == "STARTED")
                                                        <span class="tag tag-info">STARTED</span>
                                                    @elseif($ride->status == "DROPPED")
                                                        <span class="tag tag-info">DROPPED</span>
                                                    @elseif($ride->status == "PICKEDUP")
                                                        <span class="tag tag-info">PICKEDUP</span>
                                                    @elseif($ride->status == "SCHEDULED")
                                                        <span class="tag tag-info">SCHEDULED</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>

@endsection

@section('scripts')

@endsection
