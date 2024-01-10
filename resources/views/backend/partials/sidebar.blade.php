<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img width="60" height="22" viewBox="40 60 60 40" fill="none" src="{{asset('backend')}}/img/logo.png" >
                 
          
              </span>
            <span class="app-brand-text demo menu-text fw-bold">{{ ('Teb Core')}}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->is(app()->getLocale().'/admin') ? 'active' : '' }}">
            <a href="{{route('admin.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{__('cp.dashboard')}}</div>
            </a>
        </li>

        <!-- Dashboards -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Categories</span>
        </li>
        <li class="menu-item {{ request()->is(app()->getLocale().'/admin/categories*') || request()->is(app()->getLocale().'/admin/sub-categories*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-id"></i>
                <div>{{__('cp.categories')}}</div>
                <div class="badge bg-primary rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is(app()->getLocale().'/admin/categories*') ? 'active' : '' }}">
                    <a href="{{route('admin.categories.index')}}" class="menu-link">
                        <div>{{__('cp.main_categories')}}</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is(app()->getLocale().'/admin/sub-categories*') ? 'active' : '' }}">
                    <a href="{{route('admin.sub-categories.index')}}" class="menu-link">
                        <div>{{__('cp.sub_categories')}}</div>
                    </a>
                </li>
            </ul>
           
            <!--    doctor -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Doctors</span>
            </li>
            <li class="menu-item {{ request()->is(app()->getLocale().'/admin/doctors/index') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-id"></i>
                    <div>{{__('cp.doctors')}}</div>
                    {{-- <div class="badge bg-primary rounded-pill ms-auto"></div> --}}
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->is(app()->getLocale().'/admin/doctors/index') ? 'active' : '' }}">
                        <a href="{{route('admin.tables')}}" class="menu-link">
                            <div>{{__('cp.doctors')}}</div>
                        </a>
                    </li>
                    {{-- <li class="menu-item {{ request()->is(app()->getLocale().'/admin/sub-categories*') ? 'active' : '' }}">
                        <a href="{{route('admin.sub-categories.index')}}" class="menu-link">
                            <div>{{__('cp.sub_categories')}}</div>
                        </a>
                    </li> --}}
                </ul>
                <!-- end doctor-->








                  <!--    hospital -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Hospital</span>
            </li>
            <li class="menu-item {{ request()->is(app()->getLocale().'/admin/hospitals/index') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-id"></i>
                    <div>{{__('cp.hospitals')}}</div>
                    {{-- <div class="badge bg-primary rounded-pill ms-auto">3</div> --}}
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->is(app()->getLocale().'/admin/hospitals/index') ? 'active' : '' }}">
                        <a href="{{route('admin.hospitals.index')}}" class="menu-link">
                            <div>{{__('cp.hospitals')}}</div>
                        </a>
                    </li>
                    {{-- <li class="menu-item {{ request()->is(app()->getLocale().'/admin/sub-categories*') ? 'active' : '' }}">
                        <a href="{{route('admin.sub-categories.index')}}" class="menu-link">
                            <div>{{__('cp.sub_categories')}}</div>
                        </a>
                    </li> --}}
                </ul>
            </li>
                <!-- end hospital-->
                  <!--    courses -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Courses</span>
            </li>
            <li class="menu-item {{ request()->is(app()->getLocale().'/admin/courses/index')}}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-id"></i>
                    <div>{{__('cp.courses')}}</div>
                    {{-- <div class="badge bg-primary rounded-pill ms-auto"></div> --}}
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->is(app()->getLocale().'/admin/courses/index') ? 'active' : '' }}">
                        <a href="{{route('admin.courses.index')}}" class="menu-link">
                            <div>{{__('cp.courses')}}</div>
                        </a>
                    </li>
                    {{-- <li class="menu-item {{ request()->is(app()->getLocale().'/admin/exam_questions/index') ? 'active' : '' }}">
                        <a href="{{route('admin.exam_questions.index')}}" class="menu-link">
                            <div>{{__('cp.exam_questions')}}</div>
                        </a>
                    </li> --}}
                    <li class="menu-item {{ request()->is(app()->getLocale().'/admin/lessons/index') ? 'active' : '' }}">
                        <a href="{{route('admin.lessons.index')}}" class="menu-link">
                            <div>{{__('cp.lessons')}}</div>
                        </a>
                    </li>
                    {{-- <li class="menu-item {{ request()->is(app()->getLocale().'/admin/questions/index') ? 'active' : '' }}">
                        <a href="{{route('admin.questions.index')}}" class="menu-link">
                            <div>{{__('cp.questions')}}</div>
                        </a>
                    </li> --}}
                </ul>
            </li>
                <!-- end courses-->
<!--article-->
<li class="menu-header small text-uppercase">
    <span class="menu-header-text">Article</span>
</li>
<li class="menu-item {{ request()->is(app()->getLocale().'/admin/articles/index') }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-id"></i>
        <div>{{__('cp.articles')}}</div>
        {{-- <div class="badge bg-primary rounded-pill ms-auto"></div> --}}
    </a>
    <ul class="menu-sub">
        <li class="menu-item {{ request()->is(app()->getLocale().'/admin/articles/index') ? 'active' : '' }}">
            <a href="{{route('admin.article.index')}}" class="menu-link">
                <div>{{__('cp.articles')}}</div>
            </a>
        </li>
      
        {{-- <li class="menu-item {{ request()->is(app()->getLocale().'/admin/sub-categories*') ? 'active' : '' }}">
            <a href="{{route('admin.sub-categories.index')}}" class="menu-link">
                <div>{{__('cp.sub_categories')}}</div>
            </a>
        </li> --}}
    </ul>
</li>
<!--endarticle-->
        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{__('cp.location')}}</span>
        </li>
        <li class="menu-item {{ request()->is(app()->getLocale().'/admin/countries*') || request()->is(app()->getLocale().'/admin/cities*') ||
request()->is(app()->getLocale().'/admin/areas*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-id"></i>
                <div>{{__('cp.location')}}</div>
                {{-- <div class="badge bg-primary rounded-pill ms-auto"></div> --}}
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is(app()->getLocale().'/admin/countries*') ? 'active' : '' }}">
                    <a href="{{route('admin.countries.index')}}" class="menu-link">
                        <div>{{__('cp.countries')}}</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is(app()->getLocale().'/admin/cities*') ? 'active' : '' }}">
                    <a href="{{route('admin.cities.index')}}" class="menu-link">
                        <div>{{__('cp.cities')}}</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is(app()->getLocale().'/admin/areas*') ? 'active' : '' }}">
                    <a href="{{route('admin.areas.index')}}" class="menu-link">
                        <div>{{__('cp.areas')}}</div>
                    </a>
                </li>
            </ul>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{__('cp.treatments')}}</span>
        </li>
        <li class="menu-item {{ request()->is(app()->getLocale().'/admin/treatments*') || request()->is(app()->getLocale().'/admin/cases*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-id"></i>
                <div>{{__('cp.treatments')}}</div>
                {{-- <div class="badge bg-primary rounded-pill ms-auto"></div> --}}
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is(app()->getLocale().'/admin/treatments*') ? 'active' : '' }}">
                    <a href="{{route('admin.treatments.index')}}" class="menu-link">
                        <div>{{__('cp.treatments')}}</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is(app()->getLocale().'/admin/cases*') ? 'active' : '' }}">
                    <a href="{{route('admin.cases.index')}}" class="menu-link">
                        <div>{{__('cp.cases')}}</div>
                    </a>
                </li>
            </ul>
        <li class="menu-item {{ request()->is(app()->getLocale().'/admin/nationality') ? 'active' : '' }}">
            <a href="{{route('admin.nationality.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{__('cp.nationality')}}</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is(app()->getLocale().'/admin/insurance') ? 'active' : '' }}">
            <a href="{{route('admin.insurance.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{__('cp.insurance')}}</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is(app()->getLocale().'/admin/currencies') ? 'active' : '' }}">
            <a href="{{route('admin.currencies.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{__('cp.currencies')}}</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is(app()->getLocale().'/admin/services') ? 'active' : '' }}">
            <a href="{{route('admin.services.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{__('cp.services')}}</div>
            </a>
        </li>
            <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Members</span>
        </li>

        <li class="menu-item {{ request()->is(app()->getLocale().'/admin/users*') ? 'active' : '' }}">
            <a href="{{route('admin.users.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div>{{__('cp.users')}}</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Logout</span>
        </li>

        <li class="menu-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="menu-link" href="{{route('logout')}}"
                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    <i class="ti ti-logout me-2 ti-sm"></i>
                    <div>{{__('cp.logout')}}</div>
                </a>
            </form>
        </li>
    </ul>
</aside>
