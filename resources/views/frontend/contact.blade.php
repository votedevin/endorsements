@include('layouts.style')
<title>Contact</title>

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                @include('layouts.menu')
                <style type="text/css">
                    #contact{
                        color: #f1f1f1;
                        background: #4E5966;
                    }
                    #contact a{
                        color: #ffffff;
                    }
                    #sample_1_filter{
                        display: none;
                    }
                    .dt-buttons{
                        margin-top: 0 !important;
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
                                        <h1>Contact</h1>
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
                                            <p>{{$posts->title}}</p>
                                            
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        {!! $posts->body !!}
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

