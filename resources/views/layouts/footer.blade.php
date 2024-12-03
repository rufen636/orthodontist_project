
<footer class="card variant-outlined !bg-transparent">
    <div class="max-w-6xl mx-auto space-y-16 px-6 py-16 2xl:px-0">
        <div class="flex flex-wrap items-center justify-between gap-4 border-b pb-8">
            <a href="/">
                Ортодонт
            </a>
            <div class="flex gap-3">
{{--                <a href="https://github.com/tailus-ui" target="blank" aria-label="github" class="size-8 flex *:m-auto text-body hover:text-primary-600 dark:hover:text-primary-500">--}}
{{--                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">--}}
{{--                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>--}}
{{--                    </svg>--}}
{{--                </a>--}}
                <a href="https://twitter.com/tailus_ui" target="blank" aria-label="twitter" class="size-8 flex *:m-auto rounded-[--btn-border-radius] text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-500">
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M18.205 2.25h3.308l-7.227 8.26l8.502 11.24H16.13l-5.214-6.817L4.95 21.75H1.64l7.73-8.835L1.215 2.25H8.04l4.713 6.231zm-1.161 17.52h1.833L7.045 4.126H5.078z"/>
                    </svg>
                    </svg>
                </a>
                <a href="https://youtube.com/@tailus-ui" target="blank" aria-label="medium" class="size-8 flex *:m-auto rounded-[--btn-border-radius] text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-500">
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="m10 15l5.19-3L10 9zm11.56-7.83c.13.47.22 1.1.28 1.9c.07.8.1 1.49.1 2.09L22 12c0 2.19-.16 3.8-.44 4.83c-.25.9-.83 1.48-1.73 1.73c-.47.13-1.33.22-2.65.28c-1.3.07-2.49.1-3.59.1L12 19c-4.19 0-6.8-.16-7.83-.44c-.9-.25-1.48-.83-1.73-1.73c-.13-.47-.22-1.1-.28-1.9c-.07-.8-.1-1.49-.1-2.09L2 12c0-2.19.16-3.8.44-4.83c.25-.9.83-1.48 1.73-1.73c.47-.13 1.33-.22 2.65-.28c1.3-.07 2.49-.1 3.59-.1L12 5c4.19 0 6.8.16 7.83.44c.9.25 1.48.83 1.73 1.73"/></svg>
                </a>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6 sm:grid-cols-3">
            <div>
                <span class="font-medium text-gray-950 ">Контакты</span>
                <ul class="mt-4 list-inside space-y-4">
                    <li>
                        <a href="#" class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-500">контакты</a>
                    </li>

                </ul>
            </div>
            <div>
                <span class="text-sm font-medium text-gray-950">Прочее</span>
                <ul class="mt-4 list-inside space-y-4">
                    <li>
                        <a href="#" class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-500">Преимущества</a>
                    </li>
                    <li>
                        <a href="#" class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-500">Отзывы</a>
                    </li>
                    <li>
                        <a href="#" class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-500">Политика конфиденциальности</a>
                    </li>
                </ul>
            </div>
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
{{--        <div class="flex items-center justify-between rounded-md px-6 py-3 card variant-soft">--}}
{{--            <span class="text-title">&copy; tailus 2021 - Present</span>--}}
{{--            <a href="#" class="text-sm text-body hover:text-primary-600 dark:hover:text-primary-500">Licence</a>--}}
{{--        </div>--}}
    </div>
        </div>
</footer>
