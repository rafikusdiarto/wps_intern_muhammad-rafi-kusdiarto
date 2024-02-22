<?php

namespace App\Http\Controllers\Direktur;

use App\Models\ReportStaff;
use Illuminate\Http\Request;
use App\Models\ReportManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DirekturController extends Controller
{

    public function dashboard()
    {
        $countReport = ReportManager::count();
        $reportPending = ReportManager::where('status', 'PENDING')->count();
        $reportAcc = ReportManager::where('status', 'DISETUJUI')->count();
        $reportReject = ReportManager::where('status', 'DITOLAK')->count();
        return view('direktur.pages.dashboard', [
            'countReport'=> $countReport,
            'reportPending'=> $reportPending,
            'reportAcc'=> $reportAcc,
            'reportReject'=> $reportReject,
        ]);
    }

    public function staffReport()
    {
        try {
            $reportManager = ReportManager::all();
            return view('direktur.pages.manager-report', ['getReportManager'=> $reportManager]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
    public function staffReportApi()
    {
        try {
            $reportManager = ReportManager::all();
            return response()->json($reportManager);

        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function accStaffReport(Request $request, $id)
    {
        try {
            $reportStaff = ReportManager::findOrFail($id);
            $reportStaff->update([
                'status' => "DISETUJUI"
            ]);
            return redirect()->back()->with('success','data successfully update');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function rejectStaffReport(Request $request, $id)
    {
        try {
            $reportManager = ReportManager::findOrFail($id);
            $reportManager->update([
                'status' => "DITOLAK"
            ]);
            return redirect()->back()->with('success','data successfully update');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $reportManager = ReportManager::findOrFail($id);
            return view('direktur.pages.edit', ['getReportManager' => $reportManager]);
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
            $reportManager = ReportManager::findOrFail($id);

            if ($request->hasFile('file_report')) {
                if (file_exists(( $reportManager->file_report))) {
                    unlink(( $reportManager->file_report));
                }
                $file = $request->file('file_report');
                $fileName = $file->getClientOriginalName();
                $filePath = 'report-manager/' . $fileName;
                $file->move('report-manager', $fileName);
            }else {
                $filePath = $reportManager->file_report;
            }

            $reportManager = ReportManager::findOrFail($id)->update([
                'report' => $request->report,
                'manager_id' => $request->manager_id,
                'file_report' => $filePath,
                'status' => "PENDING"
            ]);
            return redirect('direktur/report')->with('success', 'data successfully updated');
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
            $reportManager = ReportManager::findOrFail($id);

            if (file_exists(( $reportManager->file_report))) {
                unlink(( $reportManager->file_report));
            }

            $reportManager->delete();
            return redirect('direktur/report')->with('success', 'data sucessfully delete');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function download($file)
    {
        try {
            return response()->download(public_path('/report-manager/' . $file));
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
