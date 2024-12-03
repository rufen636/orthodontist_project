<header id="header" class="group">
    <nav class="fixed overflow-hidden z-20 w-full border-b bg-white/50  backdrop-blur-2xl">
        <div class="px-6 m-auto max-w-6xl 2xl:px-0">
            <div class="flex flex-wrap items-center justify-between py-2 sm:py-4">
                <div class="w-full items-center flex justify-between lg:w-auto">
                    <a href="/">
                     Ортодонт
                    </a>
                </div>
                <div class="w-full group-data-[state=active]:h-fit h-0 lg:w-fit flex-wrap justify-end items-center space-y-8 lg:space-y-0 lg:flex lg:h-fit md:flex-nowrap">
                    <div class="mt-6 dark:text-body md:-ml-4 lg:pr-4 lg:mt-0">
                        <ul class="space-y-6 tracking-wide text-base lg:text-sm lg:flex lg:space-y-0">
                            <li>
                                <a href="#contacts" class="hover:link md:px-4 block">
                                    <span>Контакты</span>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="hover:link md:px-4 block">
                                    <span>Преимущества</span>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="hover:link md:px-4 block">
                                    <span>Ортодонты</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @auth
                        <ul class="space-y-6 tracking-wide text-base lg:text-sm lg:flex lg:space-y-0">
                        <li>
                            <a href="{{route('main.patients')}}" class="hover:link md:px-4 block">
                                <span>Пациенты</span>
                            </a>
                        </li>
                    </ul>
                        <div class="w-full space-y-2 gap-2 pt-6 pb-4 lg:pb-0 border-t items-center flex flex-col lg:flex-row lg:space-y-0 lg:w-fit lg:border-l lg:border-t-0 lg:pt-0 lg:pl-2">
                            <form action="{{route('logout')}}" method="get">
                                @csrf
                                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                    <span class="btn-label">Выйти</span>
                                </button>
                            </form>
                            <form action="{{route('main.profile')}}" method="get">
                                @csrf
                                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    <span>Профиль</span>
                                </button>
                            </form>
                        </div>
                    @endauth

                    @guest
                    <div class="w-full space-y-2 gap-2 pt-6 pb-4 lg:pb-0 border-t items-center flex flex-col lg:flex-row lg:space-y-0 lg:w-fit lg:border-l lg:border-t-0 lg:pt-0 lg:pl-2">
                        <form action="{{route('main.login')}}" method="get">
                            @csrf
                            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                <span class="btn-label">Вход</span>
                            </button>
                        </form>
                        <form action="{{route('main.register')}}" method="get">
                            @csrf
                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                <span>Регистрация</span>
                            </button>
                        </form>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>
