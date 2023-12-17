<div class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-1 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
    id="add-alternative" aria-hidden="true">
    <div
        class="relative w-96 m-2 transition-transform duration-300 pointer-events-none sm:m-7 sm:max-w-125 sm:mx-auto lg:mt-2 ease-soft-out -translate-y-13">
        <div
            class="relative flex flex-col w-full bg-white border border-solid pointer-events-auto bg-clip-padding border-black/20 rounded-xl outline-0">
            <form action="{{ route('alternatives.store') }}" method="POST">
                @csrf
                <div
                    class="flex items-center justify-between p-4 border-b border-solid shrink-0 border-slate-100 rounded-t-xl">
                    <h5 class="mb-0 leading-normal" id="ModalLabel">Tambahkan alternative Baru</h5>

                    <button type="button" data-modal-toggle="add-alternative"
                        class="fa fa-close w-4 h-4 ml-auto box-content p-2 text-black border-0 rounded-1.5 opacity-50 cursor-pointer -m-2 "
                        data-dismiss="add-alternative"></button>
                </div>
                <div class="relative flex-auto p-4">
                    <p>Kode Alternative</p>
                    <p class=" text-xl font-semibold mb-4">A{{ $lastAlternativeId + 1 }}</p>
                    <p>Nama Alternative</p>
                    <input dropzone name="name" id="name" type="text" placeholder="eg: Muhmammad Raihan"
                        class="mb-4 mt-2 focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
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
