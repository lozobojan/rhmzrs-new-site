<li class="nav-item has-treeview {{ request()->is("admin/links*") ? "menu-open" : "" }} {{ request()->is("admin/pages*") ? "menu-open" : "" }} {{ request()->is("admin/posts*") ? "menu-open" : "" }} {{ request()->is("admin/public-competitions*") ? "menu-open" : "" }} {{ request()->is("admin/public-purchases*") ? "menu-open" : "" }} {{ request()->is("admin/projects*") ? "menu-open" : "" }} {{ request()->is("admin/questionnaires*") ? "menu-open" : "" }} {{ request()->is("admin/questions*") ? "menu-open" : "" }} {{ request()->is("admin/answers*") ? "menu-open" : "" }}">
    <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/links*") ? "active" : "" }} {{ request()->is("admin/pages*") ? "active" : "" }} {{ request()->is("admin/posts*") ? "active" : "" }} {{ request()->is("admin/public-competitions*") ? "active" : "" }} {{ request()->is("admin/public-purchases*") ? "active" : "" }} {{ request()->is("admin/projects*") ? "active" : "" }} {{ request()->is("admin/questionnaires*") ? "active" : "" }} {{ request()->is("admin/questions*") ? "active" : "" }} {{ request()->is("admin/answers*") ? "active" : "" }}"
       href="#">
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
                <a href="{{ route("admin.links.index") }}"
                   class="nav-link {{ request()->is("admin/links") || request()->is("admin/links/*") ? "active" : "" }}">
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
                <a href="{{ route("admin.pages.index") }}"
                   class="nav-link {{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "active" : "" }}">
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
                <a href="{{ route("admin.posts.index") }}"
                   class="nav-link {{ request()->is("admin/posts") || request()->is("admin/posts/*") ? "active" : "" }}">
                    <i class="fa-fw nav-icon fas fa-bullhorn">

                    </i>
                    <p>
                        {{ trans('cruds.post.title') }}
                    </p>
                </a>
            </li>
        @endcan
        @can('public_competition_access')
            <li class="nav-item">
                <a href="{{ route("admin.public-competitions.index") }}"
                   class="nav-link {{ request()->is("admin/public-competitions") || request()->is("admin/public-competitions/*") ? "active" : "" }}">
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
                <a href="{{ route("admin.public-purchases.index") }}"
                   class="nav-link {{ request()->is("admin/public-purchases") || request()->is("admin/public-purchases/*") ? "active" : "" }}">
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
                <a href="{{ route("admin.document-and-regulations.index") }}"
                   class="nav-link {{ request()->is("admin/document-and-regulations") || request()->is("admin/document-and-regulations/*") ? "active" : "" }}">
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
                <a href="{{ route("admin.projects.index") }}"
                   class="nav-link {{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "active" : "" }}">
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
                <a href="{{ route("admin.questionnaires.index") }}"
                   class="nav-link {{ request()->is("admin/questionnaires") || request()->is("admin/questionnaires/*") ? "active" : "" }}">
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
                <a href="{{ route("admin.questions.index") }}"
                   class="nav-link {{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "active" : "" }}">
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
                <a href="{{ route("admin.answers.index") }}"
                   class="nav-link {{ request()->is("admin/answers") || request()->is("admin/answers/*") ? "active" : "" }}">
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
