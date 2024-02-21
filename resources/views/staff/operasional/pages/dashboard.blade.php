@extends('staff.layouts.app')

@section('content')
    <div class="grid grid-cols-1 pb-6">
        <div class="md:flex items-center justify-between px-[2px]">
            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Dashboard</h4>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center rtl:mr-2">
                            <i
                                class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                            <a href="#"
                                class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Dashboard</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-6 gap-y-0 2xl:gap-6 md:grid-cols-2 2xl:grid-cols-4">
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body">
                <div>
                    <div class="grid items-center grid-cols-12 gap-6">
                        <div class="col-span-6">
                            <span class="text-gray-700 dark:text-zinc-100">My Reports</span>
                            <h4 class="my-4 font-medium text-gray-800 text-21 dark:text-gray-100">
                                <span class="counter-value" data-target="865.2">{{$countReport}}</span>
                                Reports
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body">
                <div>
                    <div class="grid items-center grid-cols-12 gap-6">
                        <div class="col-span-6">
                            <span class="text-gray-700 dark:text-zinc-100">Report Disetujui</span>
                            <h4 class="my-4 font-medium text-gray-800 text-21 dark:text-gray-100">
                                <span class="counter-value" data-target="865.2">{{$reportAcc}}</span>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="flex items-center mt-1">
                    <span
                        class="badge font-medium bg-green-50 text-green-500 text-11 px-1.5 py-[1.5px] rounded dark:bg-green-500/20">Disetujui</span>
                    {{-- <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last week</span> --}}
                </div>
            </div>
        </div>
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body">
                <div>
                    <div class="grid items-center grid-cols-12 gap-6">
                        <div class="col-span-6">
                            <span class="text-gray-700 dark:text-zinc-100">Report Ditolak</span>
                            <h4 class="my-4 font-medium text-gray-800 text-21 dark:text-gray-100">
                                <span class="counter-value" data-target="865.2">{{$reportReject}}</span>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="flex items-center mt-1">
                    <span
                        class="badge font-medium bg-red-50 text-red-500 text-11 px-1.5 py-[1.5px] rounded dark:bg-red-500/20">Pending</span>
                    {{-- <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last week</span> --}}
                </div>
            </div>
        </div>
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body">
                <div>
                    <div class="grid items-center grid-cols-12 gap-6">
                        <div class="col-span-6">
                            <span class="text-gray-700 dark:text-zinc-100">Report Pending</span>
                            <h4 class="my-4 font-medium text-gray-800 text-21 dark:text-gray-100">
                                <span class="counter-value" data-target="865.2">{{$reportPending}}</span>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="flex items-center mt-1">
                    <span
                        class="badge font-medium bg-yellow-50 text-yellow-500 text-11 px-1.5 py-[1.5px] rounded dark:bg-yellow-500/20">Pending</span>
                    {{-- <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last week</span> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
