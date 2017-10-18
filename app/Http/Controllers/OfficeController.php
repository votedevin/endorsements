<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Logic\User\UserRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Organization;
use App\Models\Candidates2013;
use App\Models\Candidates2017;
use App\Models\Office;

class OfficeController extends Controller
{

    public function all()
    {
        $id1 = "Select...";
        $id2 = "Select...";
        $offices = Office::all();

        $officepost = DB::table('officeposts')->first();

        $boroughs = DB::table('boroughs')->get();

        $neighborhoods = DB::table('neighborhoods')->orderBy('neighborhoods.neighborhood_name','asc')->get();

        return view('frontend.offices', compact('offices', 'boroughs', 'neighborhoods', 'id1', 'id2', 'officepost'));
    }
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function find($id)

    {

        $office = DB::table('office_sought')->where('office_sought_id', '=', $id)->first();

        $candidaters = DB::table('2017_candidates')->where('office_sought2017', '=', $id)->leftjoin('organizations', '2017_candidates.organizations2017', 'like', DB::raw("concat('%', organizations.organization_id, '%')"))->select('2017_candidates.*', DB::raw('group_concat(organizations.organization) as organization_name'))->groupBy('2017_candidates.id')->get();

        $candidates = DB::table('2013_candidates')->orderBy('2013_candidates.elected2013','desc')->where('office_sought2013', '=', $id)->leftjoin('organizations', '2013_candidates.organizations2013', 'like', DB::raw("concat('%', organizations.organization_id, '%')"))->select('2013_candidates.*', DB::raw('group_concat(organizations.organization) as organization_name'))->groupBy('2013_candidates.id')->orderBy('2013_candidates.elected2013','desc')->get();

        return view('frontend.office', compact('office', 'candidaters', 'candidates'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function borough($id)
    {
        $id1=$id;
        $id2="Select...";

        $officepost = DB::table('officeposts')->first();

        $boroughs = DB::table('boroughs')->get();

        $neighborhoods = DB::table('neighborhoods')->orderBy('neighborhoods.neighborhood_name','asc')->get();

        $offices = DB::table('office_sought')->where('office_sought.borough', 'like', '%'.$id.'%')->get();

        return view('frontend.offices', compact('offices', 'boroughs', 'neighborhoods', 'id1', 'id2', 'officepost'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function neighborhood($id)
    {
        $id1="Select...";
        $id2=$id;

        $officepost = DB::table('officeposts')->first();

        $boroughs = DB::table('boroughs')->get();

        $neighborhoods = DB::table('neighborhoods')->orderBy('neighborhoods.neighborhood_name','asc')->get();

        $offices = DB::table('office_sought')->where('office_sought.neighborhoods', 'like', '%'.$id.'%')->get();

        return view('frontend.offices', compact('offices', 'boroughs', 'neighborhoods', 'id1','id2', 'officepost'));
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
        //
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
