<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

use App\Logic\User\UserRepository;
use App\Models\Post;
use App\Models\Taxonomy;
use App\Models\Service;
use App\Models\Location;
use App\Models\Organization;
use App\Models\Detail;
use App\Models\Program;
use App\Models\Contact;

use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class ServiceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $services = Service::all();
        $locations = Location::all();
        $taxonomys = Taxonomy::all();
        $organizations = Organization::all();
        $service_name = 'All';
        $location_name = '&nbsp;';
        $organization_name = '&nbsp;';
        $service_type_name = '&nbsp;';
        $filter = collect([$service_type_name, $location_name, $organization_name, $service_name]);

        $services_all = DB::table('services')->leftjoin('phones', 'services.phones', 'like', DB::raw("concat('%', phones.phone_id, '%')"))->select('services.*', DB::raw('group_concat(phones.phone_number) as phone_numbers'))->groupBy('services.id')->leftjoin('organizations', 'services.organization', '=', 'organizations.organization_id')->leftjoin('taxonomies', 'services.taxonomy', '=', 'taxonomies.taxonomy_id')->select('services.*', DB::raw('group_concat(phones.phone_number) as phone_numbers'), DB::raw('organizations.name as organization_name'), DB::raw('taxonomies.name as taxonomy_name'))->get();

        return view('frontend.services', compact('services','locations','organizations', 'taxonomys','service_name','filter','services_all'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        $services = Service::all();
        $locations = Location::all();
        $taxonomys = Taxonomy::all();
        $organizations = Organization::all();
        $service = Service::where('service_id','=',$id)->first();
        $service_organization = Service::where('service_id','=', $id)->value('organization');
        $service_program = Service::where('service_id','=', $id)->value('programs');
        $service_taxonomy = Service::where('service_id','=', $id)->value('taxonomy');
        $service_contact = Service::where('service_id','=', $id)->value('contacts');
        $service_map = DB::table('services')->where('service_id','=',$id)->leftjoin('locations', 'services.locations', 'like', DB::raw("concat('%', locations.location_id, '%')"))->leftjoin('address', 'locations.address', 'like', DB::raw("concat('%', address.address_id, '%')"))->get();

        $organization = Organization::where('organization_id', '=', $service_organization)->value('name');
        $program = Program::where('program_id', '=', $service_program)->value('name');
        $taxonomy = Taxonomy::where('taxonomy_id', '=', $service_taxonomy)->select('taxonomy_id', 'name')->first();
        $contacts = Contact::where('contact_id', '=', $service_contact)->value('name');

        //sidebar menu
        $service_name = Service::where('service_id','=', $id)->value('name');
        $location_name = '&nbsp;';
        $organization_name = '&nbsp;';
        $service_type_name = '&nbsp;';

        //$service_locations = DB::table('services')->where('service_id', '=', $id)->leftjoin('locations', 'services.locations', 'like', DB::raw("concat('%', locations.location_id, '%')"))->select('locations.name')->get();
        //$lat = DB::table('services')->where('service_id','=',$id)->leftjoin('locations', 'services.locations', '=', 'locations.location_id')-> value('latitude');
       //$long = DB::table('services')->where('service_id','=',$id)->leftjoin('locations', 'services.locations', '=', 'locations.location_id')-> value('longitude');
        
        //Mapper::map($lat, $long, ['zoom' => 5]);
        
        $service_details = DB::table('services')->where('service_id', '=', $id)->leftjoin('details', 'services.details', 'like', DB::raw("concat('%', details.detail_id, '%')"))->select('details.value', 'details.detail_type')->get();
 
        $filter = collect([$service_type_name, $location_name, $organization_name, $service_name]);
        return view('frontend.service', compact('services','locations','organizations', 'taxonomys','service_name','service','organization','program','taxonomy', 'contacts', 'service_map','filter', 'service_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $services = Service::all();
        $locations = Location::all();
        $taxonomys = Taxonomy::all();
        $organizations = Organization::all();
        $service_name = '&nbsp;';
        $location_name = '&nbsp;';
        $organization_name = '&nbsp;';
        $service_type_name = '&nbsp;';
        $filter = collect([$service_type_name, $location_name, $organization_name, $service_name]);
        $find = $request->input('find');
        $services_all = DB::table('services')->leftjoin('phones', 'services.phones', 'like', DB::raw("concat('%', phones.phone_id, '%')"))->select('services.*', DB::raw('group_concat(phones.phone_number) as phone_numbers'))->groupBy('services.id')->leftjoin('organizations', 'services.organization', '=', 'organizations.organization_id')->leftjoin('taxonomies', 'services.taxonomy', '=', 'taxonomies.taxonomy_id')->select('services.*', DB::raw('group_concat(phones.phone_number) as phone_numbers'), DB::raw('organizations.name as organization_name'), DB::raw('taxonomies.name as taxonomy_name'))->where('services.name', 'like', '%'.$find.'%')
            ->orwhere('services.description', 'like', '%'.$find.'%')
            ->orwhere('organizations.name', 'like', '%'.$find.'%')
            ->orwhere('taxonomies.name', 'like', '%'.$find.'%')
            ->get();
        return view('frontend.services', compact('services','locations','organizations', 'taxonomys','service_name','filter','services_all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
