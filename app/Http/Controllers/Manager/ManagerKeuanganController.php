<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Models\ReportManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManagerKeuanganController extends Controller
{

    public function dashboard()
    {
        $countReport = ReportManager::where('manager_id', Auth::user()->id)->count();
        $reportPending = ReportManager::where('status', 'PENDING')->where('manager_id', Auth::user()->id)->count();
        $reportAcc = ReportManager::where('status', 'DISETUJUI')->where('manager_id', Auth::user()->id)->count();
        $reportReject = ReportManager::where('status', 'DITOLAK')->where('manager_id', Auth::user()->id)->count();
        return view('manager.keuangan.pages.dashboard', [
            'countReport'=> $countReport,
            'reportPending'=> $reportPending,
            'reportAcc'=> $reportAcc,
            'reportReject'=> $reportReject,
        ]);
    }

    public function index()
    {
        try {
            $reportManager = ReportManager::where('manager_id', Auth::user()->id)->get();
            return view('manager.keuangan.pages.index', ['getReportManager' => $reportManager]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function staffReport()
    {
        try {
            return view('manager.keuangan.pages.staff-report');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function create()
    {
        try {
            return view('manager.keuangan.pages.create');
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
                $filePath = 'report-manager/' . $fileName;
                $file->move('report-manager', $fileName);
            }else {
                $filePath = '';
            }

            $reportManager = ReportManager::create([
                'report' => $request->report,
                'manager_id' => $request->manager_id,
                'file_report' => $filePath,
                'status' => "PENDING"
            ]);
            return redirect('manager-keuangan/report')->with('success', 'data successfully created');
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
            $reportManager = ReportManager::findOrFail($id);
            return view('manager.keuangan.pages.edit', ['getReportManager' => $reportManager]);
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
            return redirect('manager-keuangan/report')->with('success', 'data successfully updated');
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
            return redirect('manager-keuangan/report')->with('success', 'data sucessfully delete');
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
