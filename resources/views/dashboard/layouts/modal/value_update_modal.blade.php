<div class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-1 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
    id="add-value-{{ $alternative->id }}" aria-hidden="true">
    <div
        class="relative w-96 m-2 transition-transform duration-300 pointer-events-none sm:m-7 sm:max-w-125 sm:mx-auto lg:mt-2 ease-soft-out -translate-y-13">
        <div
            class="relative flex flex-col w-full bg-white border border-solid pointer-events-auto bg-clip-padding border-black/20 rounded-xl outline-0">
            <form action="{{ route('values.update', $alternative->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div
                    class="flex items-center justify-between p-4 border-b border-solid shrink-0 border-slate-100 rounded-t-xl">
                    <h5 class="mb-0 leading-normal" id="ModalLabel">Tambahkan Data Penilaian</h5>

                    <button type="button" data-modal-toggle="add-value-{{ $alternative->id }}"
                        class="fa fa-close w-4 h-4 ml-auto box-content p-2 text-black border-0 rounded-1.5 opacity-50 cursor-pointer -m-2 "
                        data-dismiss="add-value"></button>
                </div>
                <div class="mx-2 grid gap-4 mb-4 grid-cols-2">
                    <input type="text" name="alternative_id" hidden value="{{ $alternative->id }}">
                    @foreach ($criteria as $criterion)
                        <div class="col-span-2 sm:col-span-1">
                            <label for="score_{{ $criterion->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                C{{ $criterion->id }}
                            </label>
                            <input type="number" onchange="setTwoNumberDecimal" min="0" step="0.01"
                                value="{{ $penilaianForCriteria? $penilaianForCriteria->where('criteria_id', $criterion->id)->where('alternative_id', $alternative->id)->first()->score: 0 }}"
                                name="score[{{ $criterion->id }}]" id="score_{{ $criterion->id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="" required="">
                        </div>
                    @endforeach
                </div>
                <div
                    class="flex flex-wrap items-center justify-end p-3 border-t border-solid shrink-0 border-slate-100 rounded-b-xl">
                    <button type="submit" data-toggle="modal" data-target="#import"
                        class="inline-block px-8 py-2 m-1 mb-4 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
