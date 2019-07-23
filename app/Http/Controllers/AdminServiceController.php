<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Customer;
use App\ServicePoint;
use App\AdminService;
use DB;
use Charts;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $merchant)
    {
        $data_user = Auth::user();
        $admin_services = AdminService::orderBy('id')->with('merchant','service_point')->get();
        return view('service_admin.list_admin_service',compact('data_user','admin_services','service_point'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_user = Auth::user();
        $merchants = Customer::all();
        $service_points = ServicePoint::all();
        return view('service_admin.create_admin_service',compact('data_user','merchants','service_points'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AdminService::create([
            'nomor_laporan' => request('nomor_laporan'),
            'merchant_id' => request('merchant_id'),
            'service_point_id' => request('service_point_id'),
            'description' => request('description'),
            'status' => 1,
            ]);
        flash()->overlay("Service is Created", 'Greet');
        return redirect("/admin-services");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminService  $adminService
     * @return \Illuminate\Http\Response
     */
    public function show(AdminService $adminService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminService  $adminService
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminService $adminService)
    {
        $data_user = Auth::user();
        $merchants = Customer::all();
        $service_points = ServicePoint::all();
        $admin_services = AdminService::find('id');
        $nama_merchant = Customer::whereId($adminService['merchant_id'])->get();
        $nama_service_point = ServicePoint::whereId($adminService['service_point_id'])->get();
        // print($nama_merchant[0]['id']);exit;
        // print_r(json_decode(json_encode($nama_service_point[0]['nama'])));exit;
        return view('service_admin.edit_admin_service',compact('adminService','data_user','merchants','service_points','nama_merchant','nama_service_point'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminService  $adminService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        AdminService::where('id',$id)->update([
            'nomor_laporan'         => request('nomor_laporan'),
            'merchant_id'           => request('merchant_id'),
            'service_point_id'      => request('service_point_id'),
            'description'           => request('description'),
            'status'                => 1,
            ]);
        flash()->overlay("Service is Updated", 'Greet');
        return redirect("/admin-services");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminService  $adminService
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminService $adminService)
    {
        $admin_service = AdminService::find($request->id);
        $admin_service->delete();
        return redirect("/admin-services");
    }

    public function delete(Request $request)
    {
        $admin_service = AdminService::find($request->id);
        $admin_service->delete();
        return redirect("/admin-services");
    }

    public function report()
    {
        $data_user = Auth::user();
        $services_completed = AdminService::where('status',4)->whereMonth('created_at',date('m'))->orderBy('id')->with('merchant','service_point')->get();
        return view('service_admin.report',compact('data_user','services_completed'));
    }

    public function postRepost(Request $request)
    {
        $data_user = Auth::user();
        $date_from = $request['date_from'];
        $date_to =  $request['date_to'];
        $mulai = date('d F Y', strtotime($date_from));
        $selesai = date('d F Y', strtotime($date_to));
        $services_completed = AdminService::where('status',4)->whereDate('created_at','>=',$date_from)->whereDate('created_at','<=',$date_to)->with('merchant','service_point','user','work_order')->get();
        return view('print',compact('data_user','services_completed','mulai','selesai'));

    }

    public function dashboard ()
    {
        $data_user = Auth::user();
        $total_service_point = ServicePoint::count();
        $total_merchant = Merchant::count();
        $total_service_completed = AdminService::where('status',4)->whereMonth('created_at',date('m'))->count();
        $total_service_active = AdminService::where('status','!=',4)->count();
        $total_engineer = User::where('level',3)->count();
        $total_case = DB::table('admin_services')
                        ->leftjoin('service_points','service_points.id','=','admin_services.service_point_id')
                        ->leftjoin('users','users.id','=','admin_services.user_id')
                ->select('admin_services.service_point_id','service_points.nama', DB::raw('count(admin_services.service_point_id) as total_service'))
                ->where('admin_services.status',4)
                ->groupBy('service_point_id')
                ->get();
                // print_r($total_case);exit;

        $total_case_engineer = DB::table('admin_services')
                        ->leftjoin('users','users.id','=','admin_services.user_id')
                        ->leftjoin('service_points','service_points.id','=','admin_services.service_point_id')
                ->select('service_points.nama','users.name', DB::raw('count(admin_services.user_id) as total_service'))
                ->where('admin_services.status',4)
                ->groupBy('user_id')
                ->get();
        $chart = Charts::database(AdminService::where('status',4)->get(), 'bar', 'highcharts')
            ->elementLabel("Total Services")
            ->dimensions(500, 320)
            ->responsive(false)
            ->groupByMonth(date('Y'), true);

        return view('dashboard',compact('data_user','total_service_point','total_merchant','total_service','total_service_active','total_engineer','total_service_completed','total_case','total_case_engineer','chart'));
    }

    public function schedule()
    {
        $data_user = Auth::user();
        $engineer_services = AdminService::where('status',2)->orderBy('id')->with('merchant','service_point','user')->get();
        return view('service_admin.list_schedule_services',compact('data_user','engineer_services'));
    }   

    public function completed()
    {
        $data_user = Auth::user();
        $services_completed = AdminService::where('status',4)->whereMonth('created_at',date('m'))->orderBy('id')->with('merchant','service_point')->get();
        // print_r(json_decode(json_encode($data_user)));exit;
        return view('service_admin.list_completed_services',compact('data_user','services_completed'));
    }

    public function detailServicesCompleted($id)
    {
        $data_user = Auth::user();
        $detail_services = AdminService::with('merchant','service_point','user','work_order')->find($id);
        // print_r(json_decode(json_encode($detail_services)));exit;
        return view('service_admin.detail_services_completed',compact('detail_services','data_user'));
    }

    public function test ()
    {
        return view('print');
    }

}
