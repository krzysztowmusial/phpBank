<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: rgb(249, 249, 251);
            font-size: 14px;
        }

        button {
            padding: 5px 10px;
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            text-transform: uppercase;
            font-size: 12px;
        }

        button:hover {
            background: #f7bc34;
            color: white;
            transition: .2s;
        }

        main {
            width: 1300px;
            min-height: calc(100vh - 6em);
            margin: 3em auto;
            display: grid;
            grid-template-columns: calc(250px + 4em) auto;
            box-shadow: white 1px 1px 1px inset, rgba(0, 0, 0, 0.1) -1px 0px 1px inset, rgba(0, 0, 0, 0.1) -10px 20px 20px;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        aside {
            padding: 2em;
            display: grid;
            grid-template-rows: 50px auto 50px;
            background: linear-gradient(rgb(244, 245, 249) 0%, white 100%);
            box-shadow: white 1px 1px 1px inset, rgba(0, 0, 0, 0.1) -1px 0px 1px inset, rgba(0, 0, 0, 0.1) -10px 20px 20px;
        }

            .logo {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .aside {
                padding: 56px 0 2em 0;
            }

            .footer {
                display: flex;
                justify-content: center;
                align-items: flex-end;
            }

        article {
            background: white;
            padding: 2em;
            display: grid;
            grid-template-rows: 50px auto;
        }

            nav {
                display: flex;
                align-items: center;
            }

                .navigation {
                    display: flex;
                    list-style: none;
                    margin: 0;
                }

                ul {
                    width: 100%;
                }

                li {
                    margin-right: 1em;
                    display: flex;
                    align-items: center;
                }

                .profile {
                    margin-left: auto;
                    margin-right: 0;
                }
                .profile__info {
                    font-size: 12px;
                    text-align: right;
                    margin-right: 1em;
                }
                .profile__avatar {
                    width: 50px;
                    height: 50px;
                    border-radius: 20%;
                    background: grey;
                }

            .content {
                padding: 56px 0;
            }

            /* CARDS */

            .first {
                background: linear-gradient(90deg, #ffc3a0 0%,#ffafbd 100% );
            }
            .second {
                background:linear-gradient(45deg, #fc5c7d 0%,#6a82fb 100% );
            }

            .mycards {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
                    
            .mycard {
                position: relative;
                align-items: flex-end;
                width: 250px;
                height: 150px;
                margin-bottom: 1em;
                box-shadow: -5px 10px 10px rgba(0, 0, 0, 0.1), inset 1px 1px 1px rgba(255, 255, 255, 0.5), inset -1px -2px 1px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
                transition: .3s;
                cursor: pointer;
                color: white;
                display: flex;
                align-items: flex-end;
            }
                        
            .mycard:hover {
                background-size: 400% 400%;
                // margin-left: .5em;
                transition: .3s;
                animation: linear-gradient(to bottom, #f4f5f9 0%, white 100% ) 5s ease infinite;
            }
                        
            .mycard-dane {
                width: 100%;
                padding: 2em;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .mastercard {
                height: 22px;
                position: relative;
                bottom: 0;
            }            
                                    
            .circle {
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background-color: rgba(255, 255, 255, 0.5);
                border: 1px solid white;
            }
                        
            .circle:nth-child(1) {
                position: absolute;
                right: 12px;
            }
            .cricle:nth-child(2) {
                position: absolute;
                right: 0px;
                background-color: rgba(255, 255, 255, 0.3);
            }
                                
            .visa {
                font-weight: 500;
                font-size: 18.5px;
                font-style: italic;
            }
                        
            .mycard.add {
                border: 1px solid rgba(0, 0, 0, 0.1);
                background: #f9f9fb;
                box-shadow: none;
                display: flex;
                justify-content: center;
                align-items: center;
                color: rgb(36, 36, 36);
            }

            .mycardremove {
                position: absolute;
                top: .5em;
                right: .5em;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0;
            }

    </style>
</head>
<body>

    <main>
        <aside>
            <div class="logo">
                <svg width="120" height="30" viewBox="0 0 120 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.1655 0.465881L26.2997 7.73294V22.2671L13.1655 29.5341L0.0313721 22.2671V7.73294L13.1655 0.465881Z" fill="url(#paint0_linear)"/>
                    <path d="M13.1149 0.465888L0.0341636 22.2671L13.1149 29.5341L26.1956 7.73295L13.1149 0.465888Z" fill="url(#paint1_linear)"/>
                    <path d="M13.1148 0.465888L26.1956 22.2671L13.1148 29.5341L0.0341308 7.73295L13.1148 0.465888Z" fill="url(#paint2_linear)"/>
                    <path d="M54.1299 19.434C54.1299 20.3019 53.9223 21.0629 53.5072 21.717C53.1047 22.3711 52.5638 22.9245 51.8846 23.3774C51.2179 23.8176 50.4506 24.1509 49.5827 24.3774C48.7148 24.5912 47.828 24.6981 46.9223 24.6981H36.2997V23.566C36.8783 23.566 37.3437 23.522 37.6959 23.434C38.0607 23.3333 38.3374 23.1824 38.5261 22.9811C38.7274 22.7673 38.8594 22.4906 38.9223 22.1509C38.9978 21.7987 39.0355 21.3774 39.0355 20.8868V9.22641C39.0355 8.73585 38.9978 8.32075 38.9223 7.98113C38.8594 7.62893 38.7274 7.3522 38.5261 7.15094C38.3374 6.93711 38.0607 6.78616 37.6959 6.69811C37.3437 6.59748 36.8783 6.54717 36.2997 6.54717V5.41509H47.0544C48.1487 5.41509 49.0858 5.55975 49.8657 5.84906C50.6456 6.13836 51.2808 6.50314 51.7714 6.9434C52.2619 7.38365 52.6204 7.86792 52.8469 8.39623C53.0858 8.92453 53.2053 9.43396 53.2053 9.92453C53.2053 10.4151 53.155 10.8805 53.0544 11.3208C52.9663 11.761 52.7588 12.1698 52.4318 12.5472C52.1173 12.9245 51.6582 13.2767 51.0544 13.6038C50.4632 13.9182 49.6582 14.2013 48.6393 14.4528C50.5764 14.8428 51.9726 15.4591 52.828 16.3019C53.6959 17.1321 54.1299 18.1761 54.1299 19.434ZM48.4506 10.283C48.4506 9.75472 48.3814 9.2956 48.2431 8.90566C48.1173 8.50314 47.8972 8.16981 47.5827 7.90566C47.2682 7.64151 46.8531 7.44654 46.3374 7.32075C45.8343 7.18239 45.1991 7.11321 44.4318 7.11321C44.3186 7.11321 44.2053 7.1195 44.0921 7.13208C43.9915 7.14465 43.8972 7.15723 43.8091 7.16981C43.7085 7.18239 43.6079 7.19497 43.5072 7.20755V13.8302C43.6079 13.8428 43.7085 13.8491 43.8091 13.8491C43.8972 13.8616 43.9915 13.8679 44.0921 13.8679C44.2053 13.8679 44.3186 13.8679 44.4318 13.8679C45.7902 13.8679 46.7965 13.5472 47.4506 12.9057C48.1173 12.2516 48.4506 11.3774 48.4506 10.283ZM49.111 19.566C49.111 18.1195 48.6959 17.0692 47.8657 16.4151C47.0481 15.7484 45.9035 15.4151 44.4318 15.4151C44.3186 15.4151 44.2053 15.4214 44.0921 15.434C43.9915 15.434 43.8972 15.4403 43.8091 15.4528C43.7085 15.4654 43.6079 15.4717 43.5072 15.4717V21.3396C43.5072 22.0189 43.633 22.4717 43.8846 22.6981C44.1487 22.9119 44.545 23.0189 45.0733 23.0189C45.5261 23.0189 45.9852 22.9748 46.4506 22.8868C46.9286 22.7987 47.3626 22.6289 47.7525 22.3774C48.155 22.1258 48.4821 21.7799 48.7336 21.3396C48.9852 20.8868 49.111 20.2956 49.111 19.566Z" fill="#323232"/>
                    <path d="M66.4129 24.6981V23.566C67.2557 23.566 67.8406 23.4969 68.1676 23.3585C68.5072 23.2201 68.677 22.9874 68.677 22.6604C68.677 22.5849 68.6645 22.478 68.6393 22.3396C68.6141 22.1887 68.5513 21.9748 68.4506 21.6981C68.3626 21.4088 68.2305 21.0377 68.0544 20.5849C67.8783 20.1195 67.633 19.5346 67.3186 18.8302H61.1487C60.9349 19.3585 60.7462 19.8428 60.5827 20.283C60.4443 20.6604 60.3123 21.0252 60.1865 21.3774C60.0733 21.717 60.0167 21.9371 60.0167 22.0377C60.0167 22.5157 60.2179 22.8742 60.6204 23.1132C61.0355 23.3522 61.6896 23.5031 62.5827 23.566V24.6981H55.4129V23.566C55.7399 23.5031 56.0292 23.4277 56.2808 23.3396C56.545 23.239 56.7902 23.088 57.0167 22.8868C57.2557 22.673 57.4821 22.3899 57.6959 22.0377C57.9097 21.673 58.1362 21.2075 58.3752 20.6415L64.8091 5H65.9412L73.0921 21.283C73.2808 21.7107 73.4947 22.0692 73.7336 22.3585C73.9726 22.6352 74.2242 22.8679 74.4884 23.0566C74.7525 23.2327 75.0167 23.3585 75.2808 23.434C75.5575 23.5094 75.8217 23.5535 76.0733 23.566V24.6981H66.4129ZM64.0355 11.4906L61.7525 17.1698H66.5827L64.0355 11.4906Z" fill="#323232"/>
                    <path d="M96.0921 6.54717C95.6393 6.54717 95.2682 6.57862 94.9789 6.64151C94.7022 6.69182 94.4821 6.79245 94.3186 6.9434C94.1676 7.09434 94.0607 7.30818 93.9978 7.58491C93.9349 7.84906 93.9035 8.19497 93.9035 8.62264V25H92.2431L80.9789 10.434V21.4906C80.9789 21.9308 81.023 22.2893 81.111 22.566C81.2116 22.8302 81.3626 23.0377 81.5638 23.1887C81.7651 23.3396 82.0292 23.4403 82.3563 23.4906C82.6833 23.5409 83.0858 23.566 83.5638 23.566V24.6981H76.7148V23.566C77.1676 23.566 77.545 23.5409 77.8469 23.4906C78.1613 23.4403 78.4192 23.3396 78.6204 23.1887C78.8217 23.0377 78.9664 22.8302 79.0544 22.566C79.1425 22.2893 79.1865 21.9308 79.1865 21.4906V8.15094C78.8972 7.77358 78.6645 7.47799 78.4884 7.26415C78.3123 7.05031 78.1425 6.89308 77.9789 6.79245C77.828 6.67925 77.6582 6.61006 77.4695 6.58491C77.2808 6.54717 77.0292 6.5283 76.7148 6.5283V5.41509H83.0544L92.111 17.1509V8.62264C92.111 8.19497 92.0733 7.84906 91.9978 7.58491C91.9223 7.30818 91.7965 7.09434 91.6204 6.9434C91.4443 6.79245 91.1991 6.69182 90.8846 6.64151C90.5701 6.57862 90.1802 6.54717 89.7148 6.54717V5.41509H96.0921V6.54717Z" fill="#323232"/>
                    <path d="M108.979 24.6981V23.566C109.507 23.566 109.891 23.4906 110.13 23.3396C110.369 23.1761 110.488 22.9686 110.488 22.717C110.488 22.5535 110.457 22.3774 110.394 22.1887C110.344 21.9874 110.231 21.7799 110.054 21.566L104.922 16.1321L104.413 16.566V20.8868C104.413 21.3774 104.444 21.7987 104.507 22.1509C104.57 22.4906 104.683 22.7673 104.847 22.9811C105.023 23.1824 105.262 23.3333 105.564 23.434C105.866 23.522 106.262 23.566 106.753 23.566V24.6981H97.2053V23.566C97.784 23.566 98.2494 23.522 98.6016 23.434C98.9664 23.3333 99.2431 23.1824 99.4318 22.9811C99.633 22.7673 99.7651 22.4906 99.828 22.1509C99.9035 21.7987 99.9412 21.3774 99.9412 20.8868V9.22641C99.9412 8.73585 99.9035 8.32075 99.828 7.98113C99.7651 7.62893 99.633 7.3522 99.4318 7.15094C99.2431 6.93711 98.9664 6.78616 98.6016 6.69811C98.2494 6.59748 97.784 6.54717 97.2053 6.54717V5.41509H106.658V6.54717C106.18 6.54717 105.797 6.59748 105.507 6.69811C105.218 6.78616 104.992 6.93711 104.828 7.15094C104.664 7.3522 104.551 7.62893 104.488 7.98113C104.438 8.32075 104.413 8.73585 104.413 9.22641V13.7547C105.583 12.7107 106.627 11.7484 107.545 10.8679C107.935 10.4906 108.319 10.1195 108.696 9.75472C109.073 9.37736 109.407 9.03145 109.696 8.71698C109.985 8.38994 110.218 8.11321 110.394 7.88679C110.583 7.6478 110.677 7.47799 110.677 7.37736C110.677 7 110.526 6.7673 110.224 6.67925C109.935 6.59119 109.469 6.54717 108.828 6.54717V5.41509H116.885V6.54717C116.457 6.54717 116.092 6.57233 115.79 6.62264C115.488 6.66038 115.218 6.72956 114.979 6.83019C114.74 6.91824 114.507 7.04403 114.281 7.20755C114.067 7.35849 113.822 7.54088 113.545 7.75472L107.96 13.4906L115.394 21.2264C115.822 21.6792 116.237 22.0566 116.639 22.3585C117.042 22.6604 117.419 22.8994 117.771 23.0755C118.136 23.2516 118.469 23.3774 118.771 23.4528C119.086 23.5283 119.363 23.566 119.602 23.566V24.6981H108.979Z" fill="#323232"/>
                    <defs>
                    <linearGradient id="paint0_linear" x1="0.615646" y1="15" x2="28.2305" y2="16.1627" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FF7021"/>
                    <stop offset="1" stop-color="#FFDF58"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear" x1="2.06897" y1="26.918" x2="20.9633" y2="2.50066" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FF7021"/>
                    <stop offset="1" stop-color="#F5D13A"/>
                    </linearGradient>
                    <linearGradient id="paint2_linear" x1="-6.36086" y1="13.8373" x2="27.9397" y2="16.4534" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FF7021"/>
                    <stop offset="1" stop-color="#F5D13A"/>
                    </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="aside">
                @if (Auth::check())
                    <div class="mycards">
                        @foreach ($cards as $card)
                        {{-- <a href="{{ route('card', ['id' => $card->id]) }}"> --}}
                            <div class="mycard flex {{ $card->color }}">
                                <form method="POST" action="{{ url('dashboard/card/remove/'.$card->id)}}">
                                    @csrf
                        
                                    <button type="submit" class="mycardremove btn-danger">-</button>
                                </form>
                                <div class="mycard-dane">
                                    <div>●●●● {{ $card->number }}</div>
                                    @if ($card->brand === 'mastercard')
                                    <div class="mastercard">
                                        <div class="circle"></div>
                                        <div class="circle"></div>
                                    </div>
                                    @else
                                    <div class="visa">
                                        VISA
                                    </div>
                                    @endif
                                </div>
                            </div>
                        {{-- </a> --}}
                        @endforeach
                        <a href="{{ route('card_add') }}">
                            <div class="mycard add">
                                <div>Add new card</div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
            <div class="footer">
                <a href="https://github.com/krzysztowmusial" target="_blank">Krzysztof Musiał</a>
            </div>
        </aside>
        <article>
            <nav>
                <ul class="navigation">
                    <li>
                        <a class="{{ (request()->is('/')) ? 'active' : '' }}" href="{{ url('/') }}">
                            Home
                        </a>
                    </li>
                    @guest
                    <li>
                        <a class="{{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a class="{{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <li class="profile">
                        <div class="profile__info">
                            <div class="profile__name">{{ $user->name }} {{ $user->surname }}</div>
                            <div class="profile__email">{{ $user->email }}</div>
                        </div>
                        <div class="profile__avatar" style="background: url({{ $user->photo }}); background-position: center center; background-size: contain;"></div>
                    </li>
                    @endguest
                </ul>
            </nav>
            <div>
                @yield('content')
            </div>
        </article>
    </main>

</body>
</html>
