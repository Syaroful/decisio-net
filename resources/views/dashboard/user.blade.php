@extends('dashboard.layouts.dashboardmain')
@section('title', 'User')
@section('content')
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 flex-0">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6">
                    <h5 class="mb-0 dark:text-white">Datatable Search</h5>
                    <p class="mb-0 text-sm leading-normal">A lightweight, extendable, dependency-free javascript HTML table
                        plugin.</p>
                </div>
                <div class="table-responsive p-6 overflow-x-auto">
                    <table class="table table-flush" datatable id="datatable-search">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-sm font-normal leading-normal">Tiger Nixon</td>
                                <td class="text-sm font-normal leading-normal">System Architect</td>
                                <td class="text-sm font-normal leading-normal">Edinburgh</td>
                                <td class="text-sm font-normal leading-normal">61</td>
                                <td class="text-sm font-normal leading-normal">2011/04/25</td>
                                <td class="text-sm font-normal leading-normal">$320,800</td>
                            </tr>
                            <tr>
                                <td class="text-sm font-normal leading-normal">Garrett Winters</td>
                                <td class="text-sm font-normal leading-normal">Accountant</td>
                                <td class="text-sm font-normal leading-normal">Tokyo</td>
                                <td class="text-sm font-normal leading-normal">63</td>
                                <td class="text-sm font-normal leading-normal">2011/07/25</td>
                                <td class="text-sm font-normal leading-normal">$170,750</td>
                            </tr>
                            <tr>
                                <td class="text-sm font-normal leading-normal">Ashton Cox</td>
                                <td class="text-sm font-normal leading-normal">Junior Technical Author</td>
                                <td class="text-sm font-normal leading-normal">San Francisco</td>
                                <td class="text-sm font-normal leading-normal">66</td>
                                <td class="text-sm font-normal leading-normal">2009/01/12</td>
                                <td class="text-sm font-normal leading-normal">$86,000</td>
                            </tr>
                            <tr>
                                <td class="text-sm font-normal leading-normal">Cedric Kelly</td>
                                <td class="text-sm font-normal leading-normal">Senior Javascript Developer</td>
                                <td class="text-sm font-normal leading-normal">Edinburgh</td>
                                <td class="text-sm font-normal leading-normal">22</td>
                                <td class="text-sm font-normal leading-normal">2012/03/29</td>
                                <td class="text-sm font-normal leading-normal">$433,060</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
