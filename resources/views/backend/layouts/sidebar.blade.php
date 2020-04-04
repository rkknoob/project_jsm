@php
        $setting = \App\CoreFunction\Helper::menumain();
         $locale = \App\CoreFunction\Helper::language();
@endphp

<ul class="navbar-nav bg-gradient-primary-menu sidebar sidebar-dark accordion" id="accordionSidebar" style="float: left;">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/cms/dashboard">
        <div class="sidebar-brand-icon" id="showicon">
            <img src="{!! asset('jsmbeauty/src/logo.ico') !!} " style="height: auto; width: 50px;">
        </div>
        <div class="sidebar-brand-text mx-3"> BackOffice </div>
    </a>



    <hr class="sidebar-divider">

    @foreach($setting as $settings)
        <div class="sidebar-heading">
            {{$settings['name_en']}}
        </div>


        @foreach($settings['main_process'] as $key => $mainmenu)

                @if(!$mainmenu['submenu']->isEmpty())
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse{{$mainmenu['id']}}" aria-expanded="true" aria-controls="collapse{{$mainmenu['id']}}">
                        <i class="{{$mainmenu['icon']}}"></i>
                        <span>{{$mainmenu['name_en']}}</span>
                    </a>

                        <div id="collapse{{$mainmenu['id']}}" class="collapse {{ (request()->is($mainmenu['collapse'])) ? 'collapse show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                @foreach($mainmenu['submenu'] as $mainmenuss)
                                <a class="collapse-item" href="/{{$mainmenuss['uri']}}">
                                    <i class="{{$mainmenuss['icon']}}"></i> {{$mainmenuss->name_en}}
                                </a>
                                @endforeach
                            </div>
                        </div>
                </li>
                @else

                <li class="nav-item">
                    <a class="nav-link" href="{{$mainmenu['uri']}}">
                        <i class="{{$mainmenu['icon']}}"></i>
                        <span>{{$mainmenu['name_en']}}</span>
                    </a>
                    @foreach($mainmenu['submenu'] as $mainmenuss)
                        <div id="" class="" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="{{$mainmenuss['uri']}}">
                                    <i class="fas fa-plus-circle"></i> {{$mainmenuss->name_en}}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </li>
                @endif

        @endforeach
    @endforeach

    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

