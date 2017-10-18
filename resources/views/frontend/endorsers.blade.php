@include('layouts.style')
<title>All Endorsers</title>

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
                    div.DTS div.dataTables_scrollBody {
                        background: transparent; 
                    }
                    .dataTables_filter{
                        margin-top: -65px;
                        margin-right: 180px;
                        
                    }
                    div.dataTables_wrapper div.dataTables_filter {
                        float: left;
                    }
                    @media (max-width: 991px){
                        .dataTables_filter{
                            margin-top: -55px;
                            margin-right: 180px;
                        }
                        .portlet.light .dataTables_wrapper .dt-buttons {
                            margin-top: -55px;
                        }
                    }
                    @media (max-width: 767px){
                        .portlet.light .dataTables_wrapper .dt-buttons {
                            margin-top: -59px;
                        }
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
                                        <h1>All Endorsers </h1>
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
                                            <h4>{{$endpost->title}}</h4>
                                            {!! $endpost->body !!}
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                            <div class="portlet light ">
                                                <div class="portlet-title">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon" style="background-color: #fafafa;">
                                                                        Type                                                   
                                                                </span>
                                                                <select id="single-prepend-text" class="form-control type select2" name="" onchange="javascript:location.href = this.value;">
                                                                    <option></option>
                                                                    @foreach($types as $type)
                                                                        <option value="type_{{$type->type}}">{{$type->type}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon" style="background-color: #fafafa;">
                                                                    Year</span>
                                                                <select id="single-append-radio" class="form-control year select2"  name="" onchange="javascript:location.href = this.value;">
                                                                    <option></option>
                                                                        <option value="year_2013">2013</option>
                                                                        <option value="year_2017">2017</option>               
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>-->
                            
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                                                        <thead>
                                                            <tr>
                                                                <th>Endorser&nbsp;Name</th>
                                                                <th>Type</th>
                                                                <th>2013</th>
                                                                <th>2017</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($organizations as $organization)
                                                            <tr>
                                                                <td><a href="/endorser_{{$organization->organization}}">{{$organization->organization}}</a></td>
                                                                <td>{{$organization->type}}</td>
                                                                <td>{{sizeof(explode(",", $organization->endorsements2013))}}</td>
                                                                <td>{{sizeof(explode(",", $organization->endorsments2017))}}</td>
                                                                <td>{{sizeof(explode(",", $organization->endorsements2013)) + sizeof(explode(",", $organization->endorsments2017))}}</td>
                                                            @endforeach
                                                            </tr>                                                           
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
<script type="text/javascript">

var type = <?php print_r(json_encode($id1)) ?>;
var year = <?php print_r(json_encode($id2)) ?>;

$( document ).ready(function() {
    $(".type.select2").select2({
            placeholder: type,
            width: null
        });
    $(".year.select2").select2({
            placeholder: year,
            width: null
        });
});
</script>

