@extends('staff.layouts.app')

@section('content')
@if (session('error'))
<div class="flex items-center rounded bg-red-50 alert-dismissible">
    <div class="relative w-12 h-12 text-center bg-red-400 ltr:rounded-l rtl:rounded-r">
        <div
            class="after:content-[''] after:border-[6px] after:border-transparent ltr:after:border-l-red-400 rtl:after:border-r-red-400 after:absolute ltr:after:-right-3 rtl:after:-left-3 after:top-[1.15rem]">
        </div>
        <i class="mdi mdi-block-helper align-middle text-white leading-[3.5]"></i>
    </div>
    <p class="text-red-700 ltr:ml-4 rtl:mr-4">Error, {{ session('error') }}</p>
    <button class="text-lg alert-close ltr:ml-auto rtl:mr-auto text-zinc-500 ltr:pr-5 rtl:pl-5"><i
            class="mdi mdi-close"></i></button>
</div>
@endif
    <div class="grid grid-cols-1 pb-6">
        <div class="md:flex items-center justify-between px-[2px]">
            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Staff
            </h4>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                            Forms
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center rtl:mr-2">
                            <i
                                class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                            <a href="#"
                                class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Add
                                Report
                            </a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="grid grid-cols-1">
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Create Report</h6>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-12 gap-x-6">
                    <div class="col-span-12 lg:col-span-6">
                        <form action="{{ url('staff-keuangan/report') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}" id="">
                            <div class="mb-4">
                                <label for="example-text-input"
                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Report</label>
                                <textarea
                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 placeholder:text-gray-800 dark:text-zinc-100"
                                    type="text" name="report" placeholder="enter your report"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="example-text-input"
                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">File Report</label>
                                <input
                                    class="w-full placeholder:text-13 py-1.5 text-13 rounded border-gray-100 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                    type="file" name="file_report">
                            </div>
                            <div class="mt-6">
                                <button type="submit"
                                    class="font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
