@extends('staff.layouts.app')

@section('content')
    @if (session('success'))
        <div class="flex items-center rounded bg-green-50 alert-dismissible">
            <div class="relative w-12 h-12 text-center bg-green-400 ltr:rounded-l rtl:rounded-r">
                <div
                    class="after:content-[''] after:border-[6px] after:border-transparent ltr:after:border-l-green-400 rtl:after:border-r-green-400 after:absolute ltr:after:-right-3 rtl:after:-left-3 after:top-[1.15rem]">
                </div>
                <i class="mdi mdi-check-all align-middle text-white leading-[3.5]"></i>
            </div>
            <p class="text-green-700 ltr:ml-4 rtl:mr-4">Success, {{ session('success') }}</p>
            <button class="text-lg alert-close ltr:ml-auto rtl:mr-auto text-zinc-500 ltr:pr-5 rtl:pl-5"><i
                    class="mdi mdi-close"></i></button>
        </div>
    @endif
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
    <div class="md:flex items-center justify-between px-[2px] mb-5">
        <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Staff Reports
        </h4>
    </div>
    <div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12">
        <div class="col-span-12 md:col-span-6 xl:col-span-3">
            <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                <img class="rounded" src="./assets/images/img-1.jpg" alt="">
                <div class="card-body">
                    <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">My Reports</h6>
                    <p class="text-gray-500 text-13 dark:text-zinc-100">Some quick example text to build on the card title
                        and make
                        up the bulk of the card's content.</p>
                    <a href="" class="text-blue-500 text-20 mt-6 dark:text-zinc-100">Report File</a>
                    <div class="flex mt-6 gap-2">
                        <a href=""
                            class="btn border-transparent bg-green-500 text-white py-2.5 shadow-md shadow-violet-200 dark:shadow-zinc-600">Accept</a>
                        <a href=""
                            class="btn border-transparent bg-red-500 text-white py-2.5 shadow-md shadow-violet-200 dark:shadow-zinc-600">Reject</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
