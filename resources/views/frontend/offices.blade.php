@include('layouts.style')
<title>All Offices</title>

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
                    .dataTables_filter{
                        margin-top: -65px;
                        margin-right: 180px;
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
                                        <h1>All Offices </h1>
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
                                            <h4>{{$officepost->title}}</h4>
                                            {!! $officepost->body !!}
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
                                                                    Borough                                                 
                                                                </span>
                                                                <select id="single-prepend-text" class="form-control borough select2" name="" onchange="javascript:location.href = this.value;">
                                                                    <option></option>
                                                                    @foreach($boroughs as $borough)
                                                                        <option value="borough_{{$borough->borough_name}}">{{$borough->borough_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon" style="background-color: #fafafa;">
                                                                        Neighborhood                                                   
                                                                </span>
                                                                <select id="single-prepend-text" class="form-control neighborhood select2" name="" onchange="javascript:location.href = this.value;">
                                                                    <option></option>
                                                                    @foreach($neighborhoods as $neighborhood)
                                                                        <option value="neighborhood_{{$neighborhood->neighborhood_name}}">{{$neighborhood->neighborhood_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                                                        <thead>
                                                            <tr>
                                                                <th>Office&nbsp;Name</th>
                                                                <th>Borough</th>
                                                                <th>2013 Candidates</th>
                                                                <th>2017 Candidates</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($offices as $office)
                                                            <tr>
                                                                <td><a href="office_{{$office->office_sought_id}}">{{$office->name}}</a></td>
                                                                <td>{{$office->borough}}</td>
                                                                <td>{{sizeof(explode(",", $office->candidates2013))}}</td>
                                                                <td>{{sizeof(explode(",", $office->candidates2017))}}</td>
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
<script type="text/javascript">

var borough = <?php print_r(json_encode($id1)) ?>;
var neighborhood = <?php print_r(json_encode($id2)) ?>;

$( document ).ready(function() {
    $(".borough.select2").select2({
            placeholder: borough,
            width: null
        });
    $(".neighborhood.select2").select2({
            placeholder: neighborhood,
            width: null
        });
});
</script>

