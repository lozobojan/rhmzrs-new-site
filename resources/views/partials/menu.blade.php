<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('content_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/links*") ? "menu-open" : "" }} {{ request()->is("admin/pages*") ? "menu-open" : "" }} {{ request()->is("admin/gas-emissions*") ? "menu-open" : "" }} {{ request()->is("admin/earthquakes*") ? "menu-open" : "" }} {{ request()->is("admin/posts*") ? "menu-open" : "" }} {{ request()->is("admin/public-competitions*") ? "menu-open" : "" }} {{ request()->is("admin/river-basins*") ? "menu-open" : "" }} {{ request()->is("admin/flood-defense-points*") ? "menu-open" : "" }} {{ request()->is("admin/public-purchases*") ? "menu-open" : "" }} {{ request()->is("admin/projects*") ? "menu-open" : "" }} {{ request()->is("admin/questionnaires*") ? "menu-open" : "" }} {{ request()->is("admin/questions*") ? "menu-open" : "" }} {{ request()->is("admin/answers*") ? "menu-open" : "" }}{{ request()->is("admin/alerts*") ? "menu-open" : "" }}{{ request()->is("admin/seismic-station*") ? "menu-open" : "" }}{{ request()->is("admin/meteo-stations*") ? "menu-open" : "" }}{{ request()->is("admin/meteo-maps*") ? "menu-open" : "" }}{{ request()->is("admin/hydro-informations*") ? "menu-open" : "" }}{{ request()->is("admin/eco-stations*") ? "menu-open" : "" }}{{ request()->is("admin/winds*") ? "menu-open" : "" }}{{ request()->is("admin/accelero-stations*") ? "menu-open" : "" }}{{ request()->is("admin/bio-prognosis*") ? "menu-open" : "" }}{{ request()->is("admin/current-temperatures*") ? "menu-open" : "" }}" >
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/links*") ? "active" : "" }} {{ request()->is("admin/pages*") ? "active" : "" }} {{ request()->is("admin/gas-emissions*") ? "active" : "" }} {{ request()->is("admin/earthquakes*") ? "active" : "" }} {{ request()->is("admin/posts*") ? "active" : "" }} {{ request()->is("admin/public-competitions*") ? "active" : "" }} {{ request()->is("admin/public-purchases*") ? "active" : "" }} {{ request()->is("admin/river-basins*") ? "active" : "" }} {{ request()->is("admin/flood-defense-points*") ? "active" : "" }} {{ request()->is("admin/projects*") ? "active" : "" }} {{ request()->is("admin/questionnaires*") ? "active" : "" }} {{ request()->is("admin/questions*") ? "active" : "" }} {{ request()->is("admin/answers*") ? "active" : "" }} {{ request()->is("admin/alerts*") ? "active" : "" }}{{ request()->is("admin/seismic-station*") ? "active" : "" }}{{ request()->is("admin/meteo-stations*") ? "active" : "" }}{{ request()->is("admin/meteo-maps*") ? "active" : "" }}{{ request()->is("admin/hydro-informations*") ? "active" : "" }}{{ request()->is("admin/eco-stations*") ? "active" : "" }}{{ request()->is("admin/winds*") ? "active" : "" }}{{ request()->is("admin/accelero-stations*") ? "active" : "" }}{{ request()->is("admin/bio-prognosis*") ? "active" : "" }}{{ request()->is("admin/current-temperatures*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.contentManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('link_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.links.index") }}" class="nav-link {{ request()->is("admin/links") || request()->is("admin/links/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-link">

                                        </i>
                                        <p>
                                            {{ trans('cruds.link.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('page_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pages.index") }}" class="nav-link {{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.page.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('post_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.posts.index") }}" class="nav-link {{ request()->is("admin/posts") || request()->is("admin/posts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bullhorn">

                                        </i>
                                        <p>
                                            {{ trans('cruds.post.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('alert_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.alerts.index") }}" class="nav-link {{ request()->is("admin/alerts") || request()->is("admin/alerts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bell">

                                        </i>
                                        <p>
                                            {{ trans('cruds.alert.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('river_basin_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.river-basins.index") }}" class="nav-link {{ request()->is("admin/river-basins") || request()->is("admin/river-basins/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-water">

                                        </i>
                                        <p>
                                            {{ trans('cruds.riverBasin.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('flood_defense_point_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.flood-defense-points.index") }}" class="nav-link {{ request()->is("admin/flood-defense-points") || request()->is("admin/flood-defense-points/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-swimming-pool">

                                        </i>
                                        <p>
                                            {{ trans('cruds.floodDefensePoint.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('gas_emission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.gas-emissions.index") }}" class="nav-link {{ request()->is("admin/gas-emissions") || request()->is("admin/gas-emissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-smog">

                                        </i>
                                        <p>
                                            {{ trans('cruds.gasEmission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('earthquake_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.earthquakes.index") }}" class="nav-link {{ request()->is("admin/earthquakes") || request()->is("admin/earthquakes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-exclamation">

                                        </i>
                                        <p>
                                            {{ trans('cruds.earthquake.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                                @can('seismic-station_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.seismic-station.index") }}" class="nav-link {{ request()->is("admin/seismic-station") || request()->is("admin/seismic-station/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-rss">

                                            </i>
                                            <p>
                                                {{ trans('cruds.seismicStation.title') }}
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('meteo_station_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.meteo-stations.index") }}" class="nav-link {{ request()->is("admin/meteo-stations") || request()->is("admin/meteo-stations/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon far fa-sun">

                                            </i>
                                            <p>
                                                {{ trans('cruds.meteoStation.title') }}
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('meteo_map_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.meteo-maps.index") }}" class="nav-link {{ request()->is("admin/meteo-maps") || request()->is("admin/meteo-maps/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-map">

                                            </i>
                                            <p>
                                                {{ trans('cruds.meteoMap.title') }}
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('hydro_information_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.hydro-informations.index") }}" class="nav-link {{ request()->is("admin/hydro-informations") || request()->is("admin/hydro-informations/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-tint">

                                            </i>
                                            <p>
                                                {{ trans('cruds.hydroInformation.title') }}
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('eco_station_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.eco-stations.index") }}" class="nav-link {{ request()->is("admin/eco-stations") || request()->is("admin/eco-stations/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-leaf">

                                            </i>
                                            <p>
                                                {{ trans('cruds.ecoStation.title') }}
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('eco_information_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.eco-information.index") }}" class="nav-link {{ request()->is("admin/eco-information") || request()->is("admin/eco-information/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-leaf">

                                            </i>
                                            <p>
                                                {{ trans('cruds.ecoInformation.title') }}
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('homepage_cards_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.homepage-cards.index") }}" class="nav-link {{ request()->is("admin/homepage-cards") || request()->is("admin/homepage-cards/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-book">

                                            </i>
                                            <p>
                                                {{ trans('cruds.homepageCard.title') }}
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('wind_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.winds.index") }}" class="nav-link {{ request()->is("admin/winds") || request()->is("admin/winds/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-map-signs">

                                            </i>
                                            <p>
                                                {{ trans('cruds.wind.title') }}
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('accelero_station_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.accelero-stations.index") }}" class="nav-link {{ request()->is("admin/accelero-stations") || request()->is("admin/accelero-stations/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-signal">

                                            </i>
                                            <p>
                                                {{ trans('cruds.acceleroStation.title') }}
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('bio_prognosi_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.bio-prognosis.index") }}" class="nav-link {{ request()->is("admin/bio-prognosis") || request()->is("admin/bio-prognosis/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fab fa-pagelines">

                                            </i>
                                            <p>
                                                {{ trans('cruds.bioPrognosi.title') }}
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('current_temperature_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.current-temperatures.index") }}" class="nav-link {{ request()->is("admin/current-temperatures") || request()->is("admin/current-temperatures/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-thermometer-quarter">

                                            </i>
                                            <p>
                                                {{ trans('cruds.currentTemperature.title') }}
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                            @can('public_competition_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.public-competitions.index") }}" class="nav-link {{ request()->is("admin/public-competitions") || request()->is("admin/public-competitions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-gavel">

                                        </i>
                                        <p>
                                            {{ trans('cruds.publicCompetition.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('public_purchase_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.public-purchases.index") }}" class="nav-link {{ request()->is("admin/public-purchases") || request()->is("admin/public-purchases/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shopping-cart">

                                        </i>
                                        <p>
                                            {{ trans('cruds.publicPurchase.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('document_and_regulation_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.document-and-regulations.index") }}" class="nav-link {{ request()->is("admin/document-and-regulations") || request()->is("admin/document-and-regulations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-scroll">

                                        </i>
                                        <p>
                                            {{ trans('cruds.documentAndRegulation.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.projects.index") }}" class="nav-link {{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-project-diagram">

                                        </i>
                                        <p>
                                            {{ trans('cruds.project.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('questionnaire_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.questionnaires.index") }}" class="nav-link {{ request()->is("admin/questionnaires") || request()->is("admin/questionnaires/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-poll">

                                        </i>
                                        <p>
                                            {{ trans('cruds.questionnaire.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('question_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.questions.index") }}" class="nav-link {{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-question">

                                        </i>
                                        <p>
                                            {{ trans('cruds.question.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('answer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.answers.index") }}" class="nav-link {{ request()->is("admin/answers") || request()->is("admin/answers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-info">

                                        </i>
                                        <p>
                                            {{ trans('cruds.answer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
