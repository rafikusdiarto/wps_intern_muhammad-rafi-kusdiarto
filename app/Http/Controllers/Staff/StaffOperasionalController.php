<?php

namespace App\Http\Controllers\Staff;

use App\Models\ReportStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaffOperasionalController extends Controller
{

    public function dashboard()
    {
        $countReport = ReportStaff::where('staff_id', Auth::user()->id)->count();
        $reportPending = ReportStaff::where('status', 'PENDING')->where('staff_id', Auth::user()->id)->count();
        $reportAcc = ReportStaff::where('status', 'DISETUJUI')->where('staff_id', Auth::user()->id)->count();
        $reportReject = ReportStaff::where('status', 'DITOLAK')->where('staff_id', Auth::user()->id)->count();
        return view('staff.operasional.pages.dashboard', [
            'countReport'=> $countReport,
            'reportPending'=> $reportPending,
            'reportAcc'=> $reportAcc,
            'reportReject'=> $reportReject,
        ]);
    }

    public function index()
    {
        try {
            $reportStaff = ReportStaff::where('staff_id', Auth::user()->id)->get()    ;
            return view('staff.operasional.pages.index', ['getReportStaff' => $reportStaff]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function create()
    {
        try {
            return view('staff.operasional.pages.create');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'report' => 'required',
            'file_report' => 'mimes:pdf,doc,docx',
        ],
        [
            'required' => ':attribute wajib diisi',
        ]);
        try {

            if ($request->hasFile('file_report')) {
                $file = $request->file('file_report');
                $fileName = $file->getClientOriginalName();
                $filePath = 'report-staff/' . $fileName;
                $file->move('report-staff', $fileName);
            }else {
                $filePath = '';
            }

            $reportStaff = ReportStaff::create([
                'report' => $request->report,
                'staff_id' => $request->staff_id,
                'file_report' => $filePath,
                'status' => "PENDING"
            ]);
            return redirect('staff-operasional/report')->with('success', 'data successfully created');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $reportStaff = ReportStaff::findOrFail($id);
            return view('staff.operasional.pages.edit', ['getReportStaff' => $reportStaff]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'report' => 'required',
            'file_report' => 'mimes:pdf,doc,docx'
        ],
        [
            'required' => ':atribute wajib diisi'
        ]);
        try {
            $reportStaff = ReportStaff::findOrFail($id);

            if ($request->hasFile('file_report')) {
                if (file_exists(( $reportStaff->file_report))) {
                    unlink(( $reportStaff->file_report));
                }
                $file = $request->file('file_report');
                $fileName = $file->getClientOriginalName();
                $filePath = 'report-staff/' . $fileName;
                $file->move('report-staff', $fileName);
            }else {
                $filePath = $reportStaff->file_report;
            }

            $reportStaff = ReportStaff::findOrFail($id)->update([
                'report' => $request->report,
                'staff_id' => $request->staff_id,
                'file_report' => $filePath,
                'status' => "PENDING"
            ]);
            return redirect('staff-operasional/report')->with('success', 'data successfully updated');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $reportStaff = ReportStaff::findOrFail($id);

            if (file_exists(( $reportStaff->file_report))) {
                unlink(( $reportStaff->file_report));
            }

            $reportStaff->delete();
            return redirect('staff-operasional/report')->with('success', 'data sucessfully delete');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function download($file)
    {
        try {
            return response()->download(public_path('/report-staff/' . $file));
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
