@extends('vendor.speedy.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3" id="recommends_chart">
                {!! $recommends_chart->container() !!}
            </div>
            <div class="col-md-3" id="jobs_chart">
                {!! $jobs_chart->container() !!}
            </div>
            <div class="col-md-3" id="acts_chart">
                {!! $acts_chart->container() !!}
            </div>
            <div class="col-md-3" id="companies_chart">
                {!! $companies_chart->container() !!}
            </div>
        </div>
        <!-- 分隔线 -->
        <div class="col-sm-12" style="padding: 40px 0 ;">
            <hr style=" height:1px;border:none;border-top:1px solid #EDEDED;"/>
        </div>
        <div class="row">
            <div class="col-md-4" id="keywords_bar">
                {!! $keywords_bar->container() !!}
            </div>
            <div class="col-md-6 col-md-offset-1" id="keywords_bar">
                {!! $hot_jobs_bar->container() !!}
            </div>
        </div>
        <!-- 分隔线 -->
        <div class="col-sm-12" style="padding: 40px 0 ;">
            <hr style=" height:1px;border:none;border-top:1px solid #EDEDED;"/>
        </div>
        <div class="row" style="display:inline;">
            <div class="col-md-4" id="areas_bar">
                <div>热门地区</div>
                <div>{!! $areas_bar->container() !!}</div>
            </div>
            <div class="col-md-6 col-md-offset-1" id="areas_bar" style="line-height:150px;">
                <div>所有地区职位</div>
                <div>
                    <table class="table table-bordered table-hover" style="text-align: center;table-layout: fixed;">
                        <thead>
                        <tr class="active">
                            @foreach($area_jobs_array as $a)
                                <th style="text-align: center">{{ $a['city'] }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($area_jobs_array as $a)
                                <td style="vertical-align: middle;">{{ $a['count'] }}</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- 分隔线 -->
        <div class="col-sm-12" style="padding: 40px 0 ;">
            <hr style=" height:1px;border:none;border-top:1px solid #EDEDED;"/>
        </div>
        <div class="row">
            <div class="col-md-4" id="industries_bar">
                <div>热门行业</div>
                <div>{!! $industries_bar->container() !!}</div>
            </div>
            <div class="col-md-6 col-md-offset-1" id="areas_bar" style="line-height:150px;">
                <div>所有地区职位</div>
                <div>
                    <table class="table table-bordered table-hover" style="text-align: center;table-layout: fixed;">
                        <thead>
                        <tr class="active">
                            @foreach($industry_jobs_array as $i)
                                <th style="text-align: center">{{ $i['industry'] }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($industry_jobs_array as $i)
                                <td style="vertical-align: middle;">{{ $i['count'] }}</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    {!! $recommends_chart->script() !!}
    {!! $jobs_chart->script() !!}
    {!! $acts_chart->script() !!}
    {!! $companies_chart->script() !!}
    {!! $keywords_bar->script() !!}
    {!! $areas_bar->script() !!}
    {!! $industries_bar->script() !!}
    {!! $hot_jobs_bar->script() !!}
@endsection
