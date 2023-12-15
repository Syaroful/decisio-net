@extends('dashboard.layouts.main')
@section('title', 'criteria')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6>Tabel Matrix Penilaian</h6>
                    </div>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternative</th>
                                        @foreach ($criteria as $criterion)
                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                C{{ $criterion->id }}
                                            </th>
                                        @endforeach
                                        <th
                                            class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alternatives as $alternative)
                                        <tr>
                                            <td
                                                class="px-6 text-start align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span class="text-sm leading-tight text-slate-400">
                                                    A{{ $alternative->id }}
                                                </span>
                                            </td>
                                            @foreach ($criteria as $criterion)
                                                @php
                                                    $penilaianForCriteria = $value
                                                        ->where('alternative_id', $alternative->id)
                                                        ->where('criteria_id', $criterion->id)
                                                        ->first();
                                                @endphp
                                                <td
                                                    class="p-2 text-start align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <span class="text-sm leading-tight text-slate-400">
                                                        {{ $penilaianForCriteria ? $penilaianForCriteria->score : 0 }}
                                                    </span>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-1 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
                        id="add-criteria" aria-hidden="true">
                        <div
                            class="relative w-96 m-2 transition-transform duration-300 pointer-events-none sm:m-7 sm:max-w-125 sm:mx-auto lg:mt-2 ease-soft-out -translate-y-13">
                            <div
                                class="relative flex flex-col w-full bg-white border border-solid pointer-events-auto bg-clip-padding border-black/20 rounded-xl outline-0">
                                <form action="{{ route('criterias.store') }}" method="post">
                                    <div
                                        class="flex items-center justify-between p-4 border-b border-solid shrink-0 border-slate-100 rounded-t-xl">
                                        <h5 class="mb-0 leading-normal" id="ModalLabel">Tambahkan Criteria Baru</h5>

                                        <button type="button" data-modal-toggle="add-criteria"
                                            class="fa fa-close w-4 h-4 ml-auto box-content p-2 text-black border-0 rounded-1.5 opacity-50 cursor-pointer -m-2 "
                                            data-dismiss="add-criteria"></button>
                                    </div>
                                    <div class="relative flex-auto p-4">
                                        <p>Nama Criteria</p>
                                        <input dropzone type="text" placeholder="eg: Harga"
                                            class="mb-4 mt-2 focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                        <p>Tipe</p>
                                        <select name="type" id="type"
                                            class="mb-4 mt-2 focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                            <option value="benefit">Benefit</option>
                                            <option value="cost">Cost</option>
                                        </select>
                                        <p>Bobot</p>
                                        <input dropzone type="number" step="0.01" value="0.01"
                                            class="mb-4 mt-2 focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                    </div>
                                    <div
                                        class="flex flex-wrap items-center justify-end p-3 border-t border-solid shrink-0 border-slate-100 rounded-b-xl">
                                        <button type="button" data-toggle="modal" data-target="#import"
                                            class="inline-block px-8 py-2 m-1 mb-4 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
