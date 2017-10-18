
<div id="sidebar-wrapper" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"data-position="right" class="navbar-default navbar-static-side1" style="padding-top: 8px;">
   
        <form action="/services_find" method="POST" class="hidden-sm hidden-xs" style="display: block !important; padding-bottom: 30px;padding: 5px; ">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="input-icon right text-white"><a href=""><i class="fa fa-search"></i></a><input type="text" placeholder="Search here..." class="form-control text-black" name="find"/></div>
        </form>

       <div class="btn-group" style="margin-top:40px;  margin-bottom: 20px; width: 100%;padding: 3px;">
            <label class="col-md-12 control-label" style="padding-left: 5px;">Category</label>
            <button type="button" class="btn btn-default" style="width: 88%;overflow: hidden;">{{$filter[0]}}</button>
            <button type="button" data-toggle="dropdown" data-delay="1000" data-close-others="true" class="btn btn-primary dropdown-toggle"><i class="fa fa-angle-down"></i></button>
            <ul class="dropdown-menu scrollable-menu">
                <li><a href="/category_all">All</a></li>
                @foreach($taxonomys as $taxonomy)
                <li><a href="/category_{{$taxonomy->taxonomy_id}}">{{$taxonomy->name}}</a></li>
                @endforeach
            </ul>
        </div>

     <!--   <div class="btn-group" style="margin-bottom: 40px; width: 100%;">
            <label class="col-md-12 control-label" style="padding-left: 0;">Location</label>
            <button type="button" class="btn btn-default" style="width: 88%;overflow: hidden;">{{$filter[1]}}</button>
            <button type="button" data-toggle="dropdown" data-delay="1000" data-close-others="true" class="btn btn-primary dropdown-toggle"><i class="fa fa-angle-down"></i></button>
            <ul class="dropdown-menu scrollable-menu">
                <li><a href="/location_all">All</a></li>
                @foreach($locations as $location)
                <li><a href="/location_{{$location->location_id}}">{{$location->name}}</a></li>
                @endforeach
            </ul>
        </div>-->

        <div class="btn-group" style="margin-top: 20px;margin-bottom: 40px; width: 100%;padding: 3px; ">
            <label class="col-md-12 control-label" style="padding-left: 5px;">Organization</label>
            <button type="button" class="btn btn-default" style="width: 88%;overflow: hidden;">{{$filter[2]}}</button>
            <button type="button" data-toggle="dropdown" data-delay="1000" data-close-others="true" class="btn btn-primary dropdown-toggle"><i class="fa fa-angle-down"></i></button>
            <ul class="dropdown-menu scrollable-menu">
                <li><a href="/organization_all">All</a></li>
                @foreach($organizations as $organization)
                <li><a href="/organization_{{$organization->organization_id}}">{{$organization->name}}</a></li>
                @endforeach
            </ul>
        </div>

    <!--    <div class="btn-group" style="margin-bottom: 40px; width: 100%;padding: 5px; ">
            <label class="col-md-12 control-label" style="padding-left: 5px;">Service</label>
            <button type="button" class="btn btn-default" style="width: 88%;overflow: hidden;">{{$filter[3]}}</button>
            <button type="button" data-toggle="dropdown" data-delay="1000" data-close-others="true" class="btn btn-primary dropdown-toggle"><i class="fa fa-angle-down"></i></button>
            <ul class="dropdown-menu scrollable-menu">
                <li><a href="/service_all">All</a></li>
                @foreach($services as $service)
                <li><a href="/service_{{$service->service_id}}">{{$service->name}}</a></li>
                @endforeach
            </ul>
        </div>-->


</div>
