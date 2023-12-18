@extends('dashboard.layouts.main')
@section('title', 'Home')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
            <!-- card1 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/3">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">
                                        Sistem Pendukung Keputusan dengan:
                                    </p>
                                    <h5 class="mb-0 font-bold">
                                        Metode TOPSIS

                                    </h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card2 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/3">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">
                                        Jumlah Criteria
                                    </p>
                                    <h5 class="mb-0 font-bold">
                                        @if ($latestCriterias)
                                            {{-- Menampilkan data terakhir jika ada --}}
                                            {{ $latestCriterias->id }}
                                        @else
                                            0
                                        @endif

                                    </h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card3 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-4 xl:w-1/3">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">
                                        Jumlah Alternatif
                                    </p>
                                    <h5 class="mb-0 font-bold">
                                        @if ($latestAlternatives)
                                            {{-- Menampilkan data terakhir jika ada --}}
                                            {{ $latestAlternatives->id }}
                                        @else
                                            0
                                        @endif

                                    </h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full px-3 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap -mx-3">
                            <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
                                <div class="flex flex-col h-full">
                                    <p class="pt-2 mb-1 font-semibold">Penjelasan Metode</p>
                                    <h5 class="font-bold">Metode TOPSIS</h5>
                                    <p class="mb-12">
                                        Metode SPK TOPSIS (Technique for Order Preference by Similarity to Ideal Solution)
                                        adalah suatu teknik yang digunakan dalam pengambilan keputusan multi-kriteria untuk
                                        memilih alternatif terbaik dari sejumlah pilihan yang tersedia. Langkah-langkah
                                        dalam metode ini dimulai dengan mengidentifikasi kriteria yang relevan, normalisasi
                                        matriks keputusan untuk membandingkan nilai kriteria secara objektif, dan pembobotan
                                        kriteria berdasarkan tingkat kepentingannya. Setelah itu, dilakukan perhitungan
                                        matriks solusi ideal positif dan negatif untuk menentukan nilai ideal dari setiap
                                        kriteria. Kemudian, dihitung jarak setiap alternatif terhadap solusi ideal positif
                                        dan negatif, serta skor proksimitas relatif untuk menentukan kedekatan relatif
                                        setiap alternatif terhadap solusi ideal. Dari perhitungan ini, alternatif dengan
                                        skor proksimitas terbesar atau terdekat dengan solusi ideal positif dan terjauh dari
                                        solusi ideal negatif akan diurutkan sebagai alternatif terbaik. Metode TOPSIS ini
                                        sering digunakan dalam berbagai bidang untuk membantu pengambilan keputusan yang
                                        lebih terukur dan sistematis dalam situasi di mana ada banyak pilihan dan kriteria
                                        yang perlu dipertimbangkan.
                                    </p>
                                    <a class="mt-auto mb-0 font-semibold leading-normal text-sm group text-slate-500"
                                        href="https://robertsoczewica.medium.com/what-is-topsis-b05c50b3cd05" target="_blank">
                                        Read More
                                        <i
                                            class="fas fa-arrow-right ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="max-w-full px-3 mt-12 ml-auto text-center lg:mt-0 lg:w-5/12 lg:flex-none">
                                <div class="h-full bg-gradient-to-tl from-purple-700 to-pink-500 rounded-xl">
                                    <img src="../assets/img/shapes/waves-white.svg"
                                        class="absolute top-0 hidden w-1/2 h-full lg:block" alt="waves" />
                                    <div class="relative flex items-center justify-center h-full">
                                        <img class="relative z-20 w-full pt-6"
                                            src="../assets/img/illustrations/rocket-white.png" alt="rocket" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="leading-normal text-center text-sm text-slate-500 lg:text-left">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-semibold text-slate-700"
                                target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                        <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://creative-tim.com/blog"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license"
                                    class="block px-4 pt-0 pb-1 pr-0 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer> --}}
    </div>
@endsection
