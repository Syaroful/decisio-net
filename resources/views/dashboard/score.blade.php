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
                                            class="px-1 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
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
                                            <td
                                                class="px-1 text-start align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <button type="button" data-modal-target="add-value-{{ $alternative->id }}"
                                                    data-modal-toggle="add-value-{{ $alternative->id }}"
                                                    class="inline-block px-6 py-3 mr-3 my-3 font-bold text-center uppercase align-middle transition-all bg-transparent border rounded-lg cursor-pointer border-fuchsia-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-fuchsia-500">
                                                    Edit</button>
                                            </td>
                                            @include('dashboard.layouts.modal.value_store_modal')
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

@endsection
