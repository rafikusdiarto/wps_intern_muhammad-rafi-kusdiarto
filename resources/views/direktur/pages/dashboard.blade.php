@extends('direktur.layouts.app')

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
                            <span class="text-gray-700 dark:text-zinc-100">All Manager Reports</span>
                            <h4 class="my-4 font-medium text-gray-800 text-21 dark:text-gray-100">
                                <span class="counter-value" data-target="865.2">{{ $countReport }}</span>
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
                                <span class="counter-value" data-target="865.2">{{ $reportAcc }}</span>
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
                                <span class="counter-value" data-target="865.2">{{ $reportReject }}</span>
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
                                <span class="counter-value" data-target="865.2">{{ $reportPending }}</span>
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

    <div class="grid grid-cols-1 pb-6">
        <div class="md:flex items-center justify-between px-[2px]">
            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Calendar</h4>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                            Apps
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center rtl:mr-2">
                           <i class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                            <a href="#" class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Calendar</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>                    <!-- start grid -->
    <div class="grid grid-cols-1 gap-x-6 mb-5 xl:grid-cols-12 ">
        <!-- start col -->
        <div class="grid-cols-1 lg:col-span-4 2xl:col-span-3">
            <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                <div class="card-body">
                    <button class="w-full mb-3 text-base text-white border-transparent shadow-md btn bg-violet-500 dark:shadow-none shadow-violet-200" id="btn-new-event" data-tw-toggle="modal" data-tw-target="#report-modal"><i class="mdi mdi-plus-circle-outline"></i> Manager & Staff Report
                    </button>

                    <div id="external-events">
                        <br>
                        <p class="text-gray-500 dark:text-zinc-100/80">Report Statu</p>
                        <div class="mt-4">
                            <div class="cursor-move bg-green-600/30 px-4 py-2 rounded text-green-600 mx-2 my-[5px] dark:bg-green-100 text-[13px]" data-class="bg-green-500">
                                <i class="align-middle mdi mdi-checkbox-blank-circle text-11 ltr:mr-2 rtl:ml-2"></i>Accepted Reports
                            </div>
                            <div class="cursor-move bg-yellow-500/30 px-4 py-2 rounded text-yellow-500 mx-2 my-[5px] dark:bg-yellow-100 text-[13px]" data-class="bg-yellow-500">
                                <i class="align-middle mdi mdi-checkbox-blank-circle text-11 ltr:mr-2 rtl:ml-2"></i>Pending Reports
                            </div>
                            <div class="cursor-move bg-red-500/30 px-4 py-2 rounded text-red-500 mx-2 my-[5px] dark:bg-red-100 text-[13px]" data-class="bg-red-500">
                                <i class="align-middle mdi mdi-checkbox-blank-circle text-11 ltr:mr-2 rtl:ml-2"></i>Rejected Reports
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-12">
                        <div class="col-span-12 mt-12">
                            <img src="{{asset('assets/images/undraw-calendar.svg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <!-- start col -->
        <div class="grid-cols-1 lg:col-span-8 2xl:col-span-9">
            <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                <div class="space-y-5 card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <div class="relative z-10 hidden modal" id="report-modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay"></div>
            <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600 sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white dark:bg-zinc-600">
                        <div class="flex items-center p-4 border-b rounded-t border-gray-50 dark:border-zinc-700">
                            <h5 class="text-lg font-semibold text-gray-900 dark:text-gray-100 " id="modal-title">Report Detail</h5>
                            <button class="inline-flex items-center px-2 py-1 ml-auto text-sm text-gray-400 border-transparent rounded-lg btn hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 dark:hover:bg-zinc-600" type="button" id="eventModal-close" data-tw-dismiss="modal">
                                <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                            </button>
                        </div>

                        <form class="needs-validation" name="event-form" id="form-report" autocomplete="off" novalidate>
                            <div class="p-6 space-y-6">
                                <div>
                                    <label for="report-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ">Report</label>
                                    <input type="text" id="report-title" readonly class="border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 dark:text-" placeholder="Insert Event Name" required>
                                </div>
                                <div>
                                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ">Status</label>
                                    <input type="text" id="status" readonly class="border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 dark:text-" placeholder="Insert Event Name" required>
                                </div>

                            </div>

                            <div class="px-4 py-3 bg-gray-50 sm:flex sm:px-6 dark:bg-zinc-700">
                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 ml-auto text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm btn dark:text-gray-100 hover:bg-gray-50/50 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm dark:bg-zinc-700 dark:border-zinc-600 dark:hover:bg-zinc-600 dark:focus:bg-zinc-600 dark:focus:ring-zinc-700 dark:focus:ring-gray-500/20" data-tw-dismiss="modal">Cancel</button>
                                <a href="{{url('direktur/manager-report')}}" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-500 border border-transparent rounded-md shadow-sm btn hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm dark:focus:ring-green-500/30" id="btn-save-event">Action</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('extraJS')
<script>

document.addEventListener("DOMContentLoaded", function () {

    document.getElementById('report-modal');
    var modalTitle = document.getElementById('modal-title');
    var formEvent = document.getElementById('form-report');
    var selectedEvent = null;
    var newEventData = null;
    var selectedEvent = null;
    var newEventData = null;
    var eventObject = null;
    /* initialize the calendar */

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var calendarEl = document.getElementById('calendar');

    function loadDataFromAPI() {
        fetch('http://127.0.0.1:8000/api/manager-report')
            .then(response => response.json())
            .then(data => {
                updateCalendarWithData(data);
                console.log(data);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    // Fungsi untuk memperbarui kalender dengan data baru
    function updateCalendarWithData(data) {
        data.forEach(report => {
            let eventClassName = '';
            if (report.status === 'DISETUJUI') {
                eventClassName = 'bg-green-600/30 text-green-600';
            } else if (report.status === 'DITOLAK') {
                eventClassName = 'bg-red-500/30 text-red-500';
            } else {
                eventClassName = 'bg-yellow-500/30 text-yellow-500';
            }

            calendar.addEvent({
                title: report.report,
                start: new Date(report.created_at),
                status: report.status,
                className: eventClassName,
            });
        })
        calendar.render();
    }
    loadDataFromAPI();


    function getInitialView() {
        if (window.innerWidth >= 768 && window.innerWidth < 1200) {
            return 'timeGridWeek';
        } else if (window.innerWidth <= 768) {
            return 'listMonth';
        } else {
            return 'dayGridMonth';
        }
    }

    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'local',
        editable: true,
        droppable: true,
        selectable: true,
        initialView: getInitialView(),
        themeSystem: 'bootstrap',
        headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'dayGridMonth'
        },
        // responsive
        windowResize: function (view) {
            var newView = getInitialView();
            calendar.changeView(newView);
        },

        eventClick: function (data) {
            document.getElementById("report-modal").classList.remove('hidden');
            selectedEvent = data.event;
            document.getElementById("report-title").value = selectedEvent.title;
            document.getElementById("status").value = selectedEvent.status;
            if(selectedEvent.extendedProps && selectedEvent.extendedProps.status) {
                document.getElementById('status').value = selectedEvent.extendedProps.status;
            }
            modalTitle.innerText = 'Detail Laporan';
            newEventData = null;
        },
    });

});
</script>
@endsection
