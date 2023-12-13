<aside
    class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
    <div class="h-19.5">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
            <img src="../assets/img/logo_decisionet.png"
                class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Decisio-Net</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap {{ request()->is('/') ? 'shadow-soft-xl rounded-lg bg-white px-4 font-semibold text-slate-700' : 'px-4' }} transition-colors"
                    href="{{ route('home.index') }}">
                    <div
                        class="{{ request()->is('/') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : ''}} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px" x="0" y="0"
                            viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve"
                            class="">
                            <g>
                                <path
                                    d="M197.332 0h-160C16.746 0 0 16.746 0 37.332v96c0 20.59 16.746 37.336 37.332 37.336h160c20.59 0 37.336-16.746 37.336-37.336v-96C234.668 16.746 217.922 0 197.332 0zM197.332 213.332h-160C16.746 213.332 0 230.078 0 250.668v224C0 495.254 16.746 512 37.332 512h160c20.59 0 37.336-16.746 37.336-37.332v-224c0-20.59-16.746-37.336-37.336-37.336zM474.668 341.332h-160c-20.59 0-37.336 16.746-37.336 37.336v96c0 20.586 16.746 37.332 37.336 37.332h160C495.254 512 512 495.254 512 474.668v-96c0-20.59-16.746-37.336-37.332-37.336zM474.668 0h-160c-20.59 0-37.336 16.746-37.336 37.332v224c0 20.59 16.746 37.336 37.336 37.336h160c20.586 0 37.332-16.746 37.332-37.336v-224C512 16.746 495.254 0 474.668 0zm0 0"
                                    fill="#ffffff" opacity="1" data-original="#000000" class="{{ request()->is('/') ? '' : 'fill-slate-800'}}"></path>
                            </g>
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap {{ request()->is('criterias') ? 'shadow-soft-xl rounded-lg bg-white px-4 font-semibold text-slate-700' : 'px-4' }} transition-colors"
                    href="{{ route('criterias.index') }}">
                    <div
                        class="{{ request()->is('criterias') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : ''}} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px" x="0" y="0"
                            viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve">
                            <g>
                                <path
                                    d="M0 .005v438.491c.34 2.44 2.1 12.96 8.04 23.01 8.14 13.79 20.27 20.49 37.069 20.49 17.19 0 29.449-6.66 37.499-20.37 5.44-9.26 7.09-18.82 7.43-21.11v-64.209h295.934V.005H0zm71.739 333.693L40.07 295.899l23-19.26 12.24 14.6 31.679-27.01 19.46 22.83-54.71 46.639zm0-99.188L40.07 196.711l23-19.27 12.24 14.61 31.679-27.009 19.46 22.83-54.71 46.638zm0-99.198-31.67-37.799 23-19.26 12.24 14.6 31.679-27.01 19.46 22.83-54.709 46.639zm265.994 164.237H149.817V269.55h187.916v29.999zm0-89.678H149.817v-29.999h187.916v29.999zm0-89.688H149.817v-30h187.916v30z"
                                    fill="#ffffff" opacity="1" data-original="#000000" class="{{ request()->is('criterias') ? '' : 'fill-slate-800'}}">
                                </path>
                                <path
                                    d="M120.038 406.307v35.849l-.07.71c-.17 1.76-1.93 17.67-11.49 33.949-9.42 16.05-28.059 35.179-63.369 35.179h394.432c39.949 0 72.459-32.509 72.459-72.459v-33.229H120.038z"
                                    fill="#ffffff" opacity="1" data-original="#000000"
                                    class="{{ request()->is('criterias') ? '' : 'fill-slate-800 opacity-60'}}"></path>
                            </g>
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Criteria</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap {{ request()->is('alternatives') ? 'shadow-soft-xl rounded-lg bg-white px-4 font-semibold text-slate-700' : 'px-4' }} transition-colors"
                    href="{{ route('alternatives.index') }}">
                    <div
                        class="{{ request()->is('alternatives') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : ''}} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px" x="0" y="0"
                        viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve">
                        <g>
                            <path
                                d="M0 .005v438.491c.34 2.44 2.1 12.96 8.04 23.01 8.14 13.79 20.27 20.49 37.069 20.49 17.19 0 29.449-6.66 37.499-20.37 5.44-9.26 7.09-18.82 7.43-21.11v-64.209h295.934V.005H0zm71.739 333.693L40.07 295.899l23-19.26 12.24 14.6 31.679-27.01 19.46 22.83-54.71 46.639zm0-99.188L40.07 196.711l23-19.27 12.24 14.61 31.679-27.009 19.46 22.83-54.71 46.638zm0-99.198-31.67-37.799 23-19.26 12.24 14.6 31.679-27.01 19.46 22.83-54.709 46.639zm265.994 164.237H149.817V269.55h187.916v29.999zm0-89.678H149.817v-29.999h187.916v29.999zm0-89.688H149.817v-30h187.916v30z"
                                fill="#ffffff" opacity="1" data-original="#000000" class="{{ request()->is('alternatives') ? '' : 'fill-slate-800'}}">
                            </path>
                            <path
                                d="M120.038 406.307v35.849l-.07.71c-.17 1.76-1.93 17.67-11.49 33.949-9.42 16.05-28.059 35.179-63.369 35.179h394.432c39.949 0 72.459-32.509 72.459-72.459v-33.229H120.038z"
                                fill="#ffffff" opacity="1" data-original="#000000"
                                class="{{ request()->is('alternatives') ? '' : 'fill-slate-800 opacity-60'}}"></path>
                        </g>
                    </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Alternatives</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap {{ request()->is('values') ? 'shadow-soft-xl rounded-lg bg-white px-4 font-semibold text-slate-700' : 'px-4' }} transition-colors"
                    href="{{ route('values.index') }}">
                    <div
                        class="{{ request()->is('values') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : ''}} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>box-</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(603.000000, 0.000000)">
                                            <path class="{{ request()->is('values') ? '' : 'fill-slate-800'}}"
                                                d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                            </path>
                                            <path class="{{ request()->is('values') ? '' : 'fill-slate-800 opacity-60'}}"
                                                d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z">
                                            </path>
                                            <path class="{{ request()->is('values') ? '' : 'fill-slate-800 opacity-60'}}"
                                                d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Matrix Score</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap {{ request()->is('mabac') ? 'shadow-soft-xl rounded-lg bg-white px-4 font-semibold text-slate-700' : 'px-4' }} transition-colors"
                    href="{{ route('mabac.index') }}">
                    <div
                        class="{{ request()->is('mabac') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : ''}} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>settings</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF"
                                    fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(304.000000, 151.000000)">
                                            <polygon class="{{ request()->is('mabac') ? '' : 'fill-slate-800 opacity-60'}}"
                                                points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                            </polygon>
                                            <path class="{{ request()->is('mabac') ? '' : 'fill-slate-800 opacity-60'}}"
                                                d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z">
                                            </path>
                                            <path class="{{ request()->is('mabac') ? '' : 'fill-slate-800'}}"
                                                d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Calculation</span>
                </a>
            </li>
    </div>
</aside>
