@include('layouts.style')
<title>Office</title>

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                @include('layouts.menu')
                <style type="text/css">
                    #offices{
                        color: #f1f1f1;
                        background: #4E5966;
                    }
                    #offices a{
                        color: #ffffff;
                    }
                    div.DTS div.dataTables_scrollBody {
                        background: transparent; 
                    }
                    .portlet.light{
                        height: 290px;
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
                                        <h1>Office</h1>
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
                                        <div class="note note-info">
                                            <p style="padding-bottom: 20px;font-size: 24px;"><b>{{$office->name}} </b><span class="label label-sm label-primary circle">{{$office->borough}}</span></p>
                                            <p style="font-size: 18px;">{{$office->neighborhoods}}</p>
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                                <div class="container">
                                    <div class="m-heading-1 border-green m-bordered">
                                        <p style="font-size: 20px; color: #f00;">2017 Primary Endorsements</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                            @foreach($candidaters as $candidater)
                                                 <div class="col-md-4">
                                                    <!-- BEGIN PORTLET-->
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption font-purple-plum">
                                                                <i class="icon-speech font-purple-plum"></i>
                                                                <span class="caption-subject bold uppercase">{{$candidater->last2017}} {{$candidater->first2017}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body scrollspy-example"  data-spy="scroll" data-target="#navbar-example2">
                                                            <div id="context" data-toggle="context" data-target="#context-menu">
                                                                <p><span class="label label-sm label-primary circle">Party</span> {{$candidater->party2017}}</p>
                                                                 <p><span class="label label-sm label-primary circle">Endorser</span></p>
                                                                @php
                                                                    $endorses = (explode(",", $candidater->organization_name))
                                                                @endphp
                                                                @foreach($endorses as $endorse)
                                                                    <p style="margin-left: 20px;"><a href="endorser_{{$endorse}}">{{$endorse}}</a><p>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END PORTLET-->
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="m-heading-1 border-red m-bordered">
                                        <p style="font-size: 20px; color: #3598dc;">2013 Primary Endorsements</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @foreach($candidates as $candidate)
                                                @if($candidate->elected2013==1)
                                                <div class="col-md-4">
                                                    <!-- BEGIN PORTLET-->
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption font-purple-plum">
                                                                <i class="icon-speech font-purple-plum"></i>
                                                                <span class="caption-subject bold uppercase" style="color: #f00;">{{$candidate->lastname2013}} {{$candidate->firstname2013}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body scrollspy-example"  data-spy="scroll" data-target="#navbar-example2">
                                                            <div id="context" data-toggle="context" data-target="#context-menu">
                                                                <p><span class="label label-sm label-primary circle">Party</span> {{$candidate->party2013}}</p>
                                                                 <p><span class="label label-sm label-primary circle">Endorser</span></p>
                                                                @php
                                                                    $endorsers = (explode(",", $candidate->organization_name))
                                                                @endphp
                                                                @foreach($endorsers as $endorser)
                                                                    <p style="margin-left: 20px;"><a href="endorser_{{$endorser}}">{{$endorser}}</a><p>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END PORTLET-->
                                                </div>
                                                @else
                                                <div class="col-md-4">
                                                    <!-- BEGIN PORTLET-->
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption font-purple-plum">
                                                                <i class="icon-speech font-purple-plum"></i>
                                                                <span class="caption-subject bold uppercase">{{$candidate->lastname2013}} {{$candidate->firstname2013}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body scrollspy-example"  data-spy="scroll" data-target="#navbar-example2">
                                                            <div id="context" data-toggle="context" data-target="#context-menu">
                                                                <p><span class="label label-sm label-primary circle">Party</span> {{$candidate->party2013}}</p>
                                                                 <p><span class="label label-sm label-primary circle">Endorser</span></p>
                                                                @php
                                                                    $endorsers = (explode(",", $candidate->organization_name))
                                                                @endphp
                                                                @foreach($endorsers as $endorser)
                                                                    <p style="margin-left: 20px;"><a href="endorser_{{$endorser}}">{{$endorser}}</a><p>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END PORTLET-->
                                                </div>
                                                @endif
                                            @endforeach
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
