@extends('dashboard.layouts.main')
@section('title', 'criterias')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="w-1/4 p-6 pb-0">
                        <button type="button" data-modal-target="add-criteria" data-modal-toggle="add-criteria"
                            class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">Tambahkan
                            Criteria</button>
                    </div>
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6>Tabel Criteria</h6>
                    </div>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            No</th>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Nama Criteria</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Bobot</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Tipe</th>
                                        <th
                                            class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($criteria as $criterion)
                                        <tr>
                                            <td
                                                class="px-6 text-start align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span class="text-sm leading-tight text-slate-400">C
                                                    {{ $criterion->id }}
                                                </span>
                                            </td>
                                            <td
                                                class="px-2 text-start align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span class="text-sm leading-tight text-slate-400">
                                                    {{ $criterion->name }}
                                                </span>

                                            </td>

                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span class="text-sm leading-tight text-slate-400">
                                                    {{ $criterion->weight }}
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="{{ $criterion->type === 'cost' ? 'bg-gradient-to-tl from-red-600 to-orange-400' : 'bg-gradient-to-tl from-green-600 to-lime-400' }} px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                                    {{ $criterion->type }}
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="relative">
                                                    <button dropdown-trigger aria-expanded="false" type="button"
                                                        class="inline-block px-4 py-2 mr-3 font-bold text-center uppercase align-middle transition-all bg-transparent border rounded-lg cursor-pointer border-fuchsia-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-fuchsia-500">Update</button>
                                                    <ul dropdown-menu
                                                        class="z-10 text-sm lg:shadow-soft-3xl duration-250 before:duration-350 before:font-awesome before:ease-soft w-32 before:text-5.5 transform-dropdown pointer-events-none absolute top-0 m-0 list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-0 py-2 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-7 before:left-auto before:top-0 before:z-40 before:text-white before:transition-all before:content-['\f0d8']">
                                                        <li>
                                                            <button type="button"
                                                                data-modal-target="edit-criteria-{{ $criterion->id }}"
                                                                data-modal-toggle="edit-criteria-{{ $criterion->id }}"
                                                                class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700">Edit</button>
                                                        </li>
                                                        <li>
                                                            <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700"
                                                                href="{{ route('criterias.destroy', $criterion->id) }}"
                                                                data-confirm-delete="true">Delete</a>
                                                        </li>

                                                    </ul>
                                                    {{-- Modal Body --}}
                                                    <div class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-1 left-0 z-50 justify-center items-center text-left w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
                                                        id="edit-criteria-{{ $criterion->id }}" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div
                                                            class="relative w-96 m-2 transition-transform duration-300 pointer-events-none sm:m-7 sm:max-w-125 sm:mx-auto lg:mt-2 ease-soft-out -translate-y-13">
                                                            <div
                                                                class="relative flex flex-col w-full bg-white border border-solid pointer-events-auto bg-clip-padding border-black/20 rounded-xl outline-0">
                                                                <form id="edit-form-{{ $criterion->id }}"
                                                                    action="{{ route('criterias.update', $criterion->id) }}"
                                                                    class="p-4 md:p-5" method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div
                                                                        class="flex items-center justify-between p-4 border-b border-solid shrink-0 border-slate-100 rounded-t-xl">
                                                                        <h5 class="mb-0 leading-normal" id="ModalLabel">Edit
                                                                            Criteria C{{ $criterion->id }}</h5>

                                                                        <button type="button"
                                                                            data-modal-toggle="edit-criteria-{{ $criterion->id }}"
                                                                            class="fa fa-close w-4 h-4 ml-auto box-content p-2 text-black border-0 rounded-1.5 opacity-50 cursor-pointer -m-2 "
                                                                            data-dismiss="edit-criteria-{{ $criterion->id }}"></button>
                                                                    </div>
                                                                    <div class="relative flex-auto p-4">
                                                                        <p>Nama Criteria</p>
                                                                        <input dropzone type="text" name="name"
                                                                            id="name" value="{{ $criterion->name }}"
                                                                            required
                                                                            class="mb-4 mt-2 focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                                                        <p>Tipe</p>
                                                                        <select name="type" id="type" required
                                                                            class="mb-4 mt-2 focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                                                            <option value="benefit">Benefit</option>
                                                                            <option value="cost">Cost</option>
                                                                        </select>
                                                                        <p>Bobot</p>
                                                                        <input dropzone type="number" name="weight"
                                                                            id="weight" step="0.01"
                                                                            value="{{ $criterion->weight }}" required
                                                                            class="mb-4 mt-2 focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                                                    </div>
                                                                    <div
                                                                        class="flex flex-wrap items-center justify-end p-3 border-t border-solid shrink-0 border-slate-100 rounded-b-xl">
                                                                        <button type="submit"
                                                                            class="inline-block px-8 py-2 m-1 mb-4 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Update
                                                                            Criteria</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @include('dashboard.layouts.modal.criteria_store_modal')

                </div>
            </div>
        </div>
    </div>

@endsection
