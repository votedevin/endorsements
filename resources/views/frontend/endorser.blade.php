@include('layouts.style')
<title>Endorser Profile</title>

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                @include('layouts.menu')
                <style type="text/css">
                    #endorsers{
                        color: #f1f1f1;
                        background: #4E5966;
                    }
                    #endorsers a{
                        color: #ffffff;
                    }
                    #sample_1_filter{
                        display: none;
                    }
                    div.DTS div.dataTables_scrollBody {
                        background: transparent; 
                    }
                </style>
                </div>
            </div>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="container">
                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title">
                                        <h1>Endorser</h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        <div class="note note-blue">
                                            <p style="padding-bottom: 20px;font-size: 24px;"><b>{{$organization->organization}} </b><span class="label label-sm label-primary circle">{{$organization->type}}</span></p>
                                            <a href="{{$organization->website}}" target="_blank"><img src="https://image.flaticon.com/icons/svg/34/34735.svg" width="30" height="30" style="margin-top: -20px;"></a>
                                            <a href="{{$organization->twitter}}" target="_blank" class="socicon-btn socicon-btn-circle socicon-solid bg-green font-white bg-hover-grey-salsa socicon-twitter tooltips" data-original-title="Twitter" aria-describedby="tooltip212351"></a>
                                            <a href="{{$organization->facebook}}" target="_blank" class="socicon-btn socicon-btn-circle socicon-solid bg-blue font-white bg-hover-grey-salsa socicon-facebook tooltips" data-original-title="Facebook" aria-describedby="tooltip356210"></a>
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6" style="padding-right: 1px;">
                                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption font-green">
                                                        <span class="caption-subject bold">2013 Primary Endorsements</span>
                                                    </div>
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body table-both-scroll">
                                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                                        <thead>
                                                            <tr>
                                                                <th>Candidate&nbsp;Name</th>
                                                                <th>Party</th>
                                                                <th>Office</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($endorsers as $endorser)
                                                            @if($endorser->elected2013==1)
                                                            <tr>
                                                                <td style="color: #f00;">{{$endorser->lastname2013}} {{$endorser->firstname2013}}</td>
                                                                <td style="color: #f00;">{{$endorser->party2013}}</td>
                                                                <td style="color: #f00;"><a href="office_{{$endorser->office_sought2013}}" style="color: #f00;">{{$endorser->name}}</a></td>
                                                            </tr>
                                                            @else
                                                            <tr>
                                                                <td>{{$endorser->lastname2013}} {{$endorser->firstname2013}}</td>
                                                                <td>{{$endorser->party2013}}</td>
                                                                <td style="color: #f00;"><a href="office_{{$endorser->office_sought2013}}">{{$endorser->name}}</a></td>
                                                            </tr>
                                                            @endif
                                                             @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding-left: 1px;">
                                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption font-red">
                                                        <span class="caption-subject bold">2017 Primary Endorsements</span>
                                                    </div>
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body table-both-scroll">
                                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_4">
                                                        <thead>
                                                            <tr>
                                                                <th>Candidate&nbsp;Name</th>
                                                                <th>Party</th>
                                                                <th>Office</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($endorserts as $endorsert)
                                                            <tr>
                                                                <td>{{$endorsert->last2017}} {{$endorsert->first2017}}</td>
                                                                <td>{{$endorsert->party2017}}</td>
                                                                <td style="color: #f00;"><a href="office_{{$endorsert->office_sought2017}}">{{$endorsert->name}}</a></td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>
            @include('layouts.footer')
        </div>

    </body>


@include('layouts.script')


