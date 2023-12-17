<div class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-1 left-0 z-50 justify-center items-center text-left w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
    id="edit-criteria-{{ $criterion->id }}" tabindex="-1" aria-hidden="true">
    <div
        class="relative w-96 m-2 transition-transform duration-300 pointer-events-none sm:m-7 sm:max-w-125 sm:mx-auto lg:mt-2 ease-soft-out -translate-y-13">
        <div
            class="relative flex flex-col w-full bg-white border border-solid pointer-events-auto bg-clip-padding border-black/20 rounded-xl outline-0">
            <form id="edit-form-{{ $criterion->id }}" action="{{ route('criterias.update', $criterion->id) }}"
                class="p-4 md:p-5" method="POST">
                @method('PUT')
                @csrf
                <div
                    class="flex items-center justify-between p-4 border-b border-solid shrink-0 border-slate-100 rounded-t-xl">
                    <h5 class="mb-0 leading-normal" id="ModalLabel">Edit
                        Criteria C{{ $criterion->id }}</h5>

                    <button type="button" data-modal-toggle="edit-criteria-{{ $criterion->id }}"
                        class="fa fa-close w-4 h-4 ml-auto box-content p-2 text-black border-0 rounded-1.5 opacity-50 cursor-pointer -m-2 "
                        data-dismiss="edit-criteria-{{ $criterion->id }}"></button>
                </div>
                <div class="relative flex-auto p-4">
                    <input name="id" type="hidden" value="{{ $criterion->id }}" />
                    <p>Nama Criteria</p>
                    <input dropzone type="text" name="name" id="name" value="{{ $criterion->name }}" required
                        class="mb-4 mt-2 focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    <p>Tipe</p>
                    <select name="type" id="type" required
                        class="mb-4 mt-2 focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                        <option value="benefit">Benefit</option>
                        <option value="cost">Cost</option>
                    </select>
                    <p>Bobot</p>
                    <input dropzone type="number" name="weight" id="weight" step="0.01"
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
