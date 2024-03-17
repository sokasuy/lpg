@extends('layouts.main')

@section('title')
    <title>LPG | Dashboard</title>
@endsection

@section('sidebar_menu')
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('dashboard.home') }}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                            <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Widgets
                                <span class="right badge badge-danger">New</span>
                            </p>
                            </a>
                        </li> --}}
            {{-- <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Layout Options
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">6</span>
                                </p>
                                </a>
                                <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Top Navigation</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Top Navigation + Sidebar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/boxed.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Boxed</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Sidebar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Sidebar <small>+ Custom Area</small></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Navbar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-footer.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Footer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Collapsed Sidebar</p>
                                    </a>
                                </li>
                                </ul>
                            </li> --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                        Charts
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Buying Power</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                UI Elements
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/icons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Icons</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/buttons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buttons</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/sliders.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sliders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/modals.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modals & Alerts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/navbar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Navbar & Tabs</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/timeline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Timeline</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/ribbons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ribbons</p>
                                </a>
                            </li>
                            </ul>
                        </li> --}}
            {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Forms
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/forms/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Elements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/advanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Advanced Elements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/editors.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Editors</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/validation.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Validation</p>
                                </a>
                            </li>
                            </ul>
                        </li> --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Master
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Master Barang</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Reports
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('reports.logbook') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Logbook</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Authentication
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Permission</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li class="nav-header">EXAMPLES</li> --}}
            {{-- <li class="nav-item">
                            <a href="pages/calendar.html" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Calendar
                                <span class="badge badge-info right">2</span>
                            </p>
                            </a>
                        </li> --}}
            {{-- <li class="nav-item">
                            <a href="pages/gallery.html" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Gallery
                            </p>
                            </a>
                        </li> --}}
            {{-- <li class="nav-item">
                            <a href="pages/kanban.html" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Kanban Board
                            </p>
                            </a>
                        </li> --}}
            {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Mailbox
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inbox</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compose</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/read-mail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Read</p>
                                </a>
                            </li>
                            </ul>
                        </li> --}}
            {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Pages
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoice</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/profile.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/e-commerce.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-commerce</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/projects.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Projects</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/project-add.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Add</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/project-edit.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Edit</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/project-detail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Detail</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/contacts.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contacts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/faq.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/contact-us.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact us</p>
                                </a>
                            </li>
                            </ul>
                        </li> --}}
            {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon far fa-plus-square"></i>
                            <p>
                                Extras
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Login & Register v1
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/examples/login.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Login v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/register.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Register v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/forgot-password.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Forgot Password v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/recover-password.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Recover Password v1</p>
                                    </a>
                                </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Login & Register v2
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/examples/login-v2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Login v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/register-v2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Register v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Forgot Password v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/recover-password-v2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Recover Password v2</p>
                                    </a>
                                </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/lockscreen.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lockscreen</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Legacy User Menu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/language-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Language Menu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/404.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 404</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/500.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 500</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/pace.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pace</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/blank.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blank Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Starter Page</p>
                                </a>
                            </li>
                            </ul>
                        </li> --}}
            {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-search"></i>
                            <p>
                                Search
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/search/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Search</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/search/enhanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Enhanced</p>
                                </a>
                            </li>
                            </ul>
                        </li> --}}
            {{-- <li class="nav-header">MISCELLANEOUS</li> --}}
            {{-- <li class="nav-item">
                            <a href="iframe.html" class="nav-link">
                            <i class="nav-icon fas fa-ellipsis-h"></i>
                            <p>Tabbed IFrame Plugin</p>
                            </a>
                        </li> --}}
            {{-- <li class="nav-item">
                            <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Documentation</p>
                            </a>
                        </li> --}}
            {{-- <li class="nav-header">MULTI LEVEL EXAMPLE</li> --}}
            {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Level 1</p>
                            </a>
                        </li> --}}
            {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                Level 1
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Level 2
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Level 3</p>
                                    </a>
                                </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                                </a>
                            </li>
                            </ul>
                        </li> --}}
            {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Level 1</p>
                            </a>
                        </li> --}}
            {{-- <li class="nav-header">LABELS</li> --}}
            {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p class="text">Important</p>
                            </a>
                        </li> --}}
            {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>Warning</p>
                            </a>
                        </li> --}}
            {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Informational</p>
                            </a>
                        </li> --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <!-- /.card -->
            {{-- PURCHASE --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-line mr-1"></i>
                        Grafik MAP Agen
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#map-agen-chart-line" data-toggle="tab">Line</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#map-agen-chart-bar" data-toggle="tab">Bar</a>
                            </li>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control select2bs4-placeholder-agen" id="cboagen_grafikperagen"
                                    style="width: 100%;">
                                    @foreach ($dataCbo['dataAgen'] as $d)
                                        <option></option>
                                        <option value="{{ $d->kodeagen }}"> {{ $d->kodeagen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control select2bs4" id="cbo_kategorifilterperagen" style="width: 100%;">
                                    <option value="agen_berdasarkan_bulan">Berdasarkan Bulan</option>
                                    <option value="agen_berdasarkan_tanggal">Berdasarkan Tanggal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group cbo-filter-kategori-map-agen" id="cbo_agen_berdasarkan_bulan">
                                <select class="form-control select2bs4-periode" id="cbo_bulanperagen"
                                    style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group cbo-filter-kategori-map-agen" id="cbo_agen_berdasarkan_tanggal">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="dtp_peragen">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary" id="btn_mapagenchart">Submit</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <!-- radio -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rbOptionPersen" id="rb_semua"
                                    value="semua" checked>
                                <label class="form-check-label" for="rbSemua">Semua</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rbOptionPersen" id="rb_kurangdari"
                                    value="kurang dari">
                                <label class="form-check-label" for="rbKurangDari">&lt100%</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rbOptionPersen" id="rb_lebihdari"
                                    value="lebih dari">
                                <label class="form-check-label" for="rbLebihDari">&gt105%</label>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content p-0">
                        <!-- Morris chart - Purchase -->
                        <div class="chart tab-pane" id="map-agen-chart-line" style="position: relative; height: auto;">
                            <canvas id="canvas_agenmapchart_line"
                                style="min-height: 250px; height: 250px; max-height: 100%; max-width: 100%;">Your browser
                                does
                                not
                                support the canvas element.
                            </canvas>
                        </div>
                        <div class="chart tab-pane active" id="map-agen-chart-bar"
                            style="position: relative; height: auto;">
                            <canvas id="canvas_agenmapchart_bar"
                                style="min-height: 250px; height: 250px; max-height: 100%; max-width: 100%;">Your
                                browser
                                does
                                not
                                support the canvas element.
                            </canvas>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            {{-- PURCHASE --}}
            <!-- /.card -->

            <!-- /.card -->
            {{-- PROFIT LOSS --}}

            {{-- PROFIT LOSS --}}
            <!-- /.card -->
        </section>
        <!-- /.Left col -->

        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-6 connectedSortable">
            <!-- Map card -->
            <!-- /.card -->
            {{-- SALES --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-line mr-1"></i>
                        Grafik MAP Pangkalan
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#map-pangkalan-chart-line" data-toggle="tab">Line</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#map-pangkalan-chart-bar" data-toggle="tab">Bar</a>
                            </li>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control select2bs4-placeholder-agen" id="cboagen_grafikperpangkalan"
                                    style="width: 100%;">
                                    <option></option>
                                    @foreach ($dataCbo['dataAgen'] as $d)
                                        <option value="{{ $d->kodeagen }}"> {{ $d->kodeagen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <select class="form-control select2bs4-placeholder-pangkalan"
                                    id="cbopangkalan_grafikperpangkalan" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary" id="btn_mappangkalanchart">Submit</button>
                        </div>
                    </div>
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane" id="map-pangkalan-chart-line"
                            style="position: relative; height: auto;">
                            <canvas id="canvas_pangkalanmapchart_line"
                                style="min-height: 250px; height: 250px; max-height: 100%; max-width: 100%;">Your
                                browser does not
                                support the canvas element.</canvas>
                        </div>
                        <div class="chart tab-pane active" id="map-pangkalan-chart-bar"
                            style="position: relative; height: auto;">
                            <canvas id="canvas_pangkalanmapchart_bar"
                                style="min-height: 250px; height: 250px; max-height: 100%; max-width: 100%;">Your
                                browser does not
                                support the canvas element.</canvas>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            {{-- SALES --}}
            <!-- /.card -->

            <!-- /.card -->
            {{-- OBAT TERLARIS --}}

            {{-- OBAT TERLARIS --}}
            <!-- /.card -->
        </section>
        <!-- right col -->
    </div>
@endsection

@section('jsbawah')
    <script type="text/javascript">
        //==========================================================================================
        // $(function() {
        //FUNGSINYA INI SAMA DENGAN DOMContentLoaded
        // });
        //==========================================================================================

        document.addEventListener('DOMContentLoaded', (event) => {
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4-placeholder-agen').select2({
                theme: 'bootstrap4',
                placeholder: "AGEN",
                allowClear: false
            });
            $('.select2bs4-placeholder-pangkalan').select2({
                theme: 'bootstrap4',
                placeholder: "PANGKALAN",
                allowClear: false
            });
            $('.select2bs4-periode').select2({
                theme: 'bootstrap4',
                placeholder: "PERIODE",
                allowClear: false
            });
            $('.select2bs4').select2({
                theme: 'bootstrap4',
                allowClear: false
            });

            //Date range picker
            $('#dtp_peragen').daterangepicker();

            //$("div#cbo_agen_berdasarkan_bulan").hide();
            $("div#cbo_agen_berdasarkan_tanggal").hide();
        });
        //==========================================================================================

        // 4 Oktober 2023 untuk memindah combobox langsung ke tahun yang sekarang
        // function selectElement(id, valueToSelect) {
        //     let element = document.getElementById(id);
        //     element.value = valueToSelect;
        // }

        //==========================================================================================
        //FILTER
        const btnMapAgenChart = document.querySelector('#btn_mapagenchart');
        btnMapAgenChart.addEventListener('click', refreshMapAgenChart);
        const cboKategoriFilterPerAgen = document.getElementById('cbo_kategorifilterperagen');
        $("#cbo_kategorifilterperagen").on("change", function() {
            let kategoriFilterPerAgen = cboKategoriFilterPerAgen.value;
            $("div.cbo-filter-kategori-map-agen").hide();
            $("#cbo_" + kategoriFilterPerAgen).show();
        });
        //==========================================================================================

        $("#cboagen_grafikperagen").on("change", function() {
            const cboAgenMapPerAgen = document.getElementById('cboagen_grafikperagen');
            getPeriodePerAgen(cboAgenMapPerAgen.value);
        });

        function getPeriodePerAgen(kodeagen) {
            $.ajax({
                type: 'POST',
                url: '{{ route('home.refreshperiodemapagen') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    kodeagen: kodeagen
                },
                success: function(response) {
                    if (response.status == 'ok') {
                        $("#cbo_bulanperagen").html(response.msg);
                    }
                },
                error: function(response, textStatus, errorThrown) {
                    console.log(response);
                }
            });
        };

        $("#cboagen_grafikperpangkalan").on("change", function() {
            const cboAgenMapPerPangkalan = document.getElementById('cboagen_grafikperpangkalan');
            getPangkalan(cboAgenMapPerPangkalan.value);
        });

        function getPangkalan(kodeagen) {
            $.ajax({
                type: 'POST',
                url: '{{ route('home.refreshpangkalanmap') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    kodeagen: kodeagen
                },
                success: function(response) {
                    if (response.status == 'ok') {
                        $("#cbopangkalan_grafikperpangkalan").html(response.msg);
                    }
                },
                error: function(response, textStatus, errorThrown) {
                    console.log(response);
                }
            });
        };

        //Map Agen
        let labelAgenMap = 0;
        let dataAgenMap = 0;
        const dataAgenMapChartBar = {
            labels: labelAgenMap,
            datasets: [{
                label: '%',
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1,
                data: dataAgenMap
            }]
        };
        const configAgenMapBar = {
            type: 'bar',
            data: dataAgenMapChartBar,
            options: {}
        };
        const myChartAgenMapBar = new Chart(
            document.getElementById('canvas_agenmapchart_bar'),
            configAgenMapBar
        );

        //Map Pangkalan
        let labelPangkalanMap = 0;
        let dataPangkalanMap = 0;
        const dataPangkalanMapChartBar = {
            labels: labelPangkalanMap,
            datasets: [{
                label: '%',
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1,
                data: dataPangkalanMap
            }]
        };
        const configPangkalanMapBar = {
            type: 'bar',
            data: dataPangkalanMapChartBar,
            options: {}
        };
        const myChartPangkalanMapBar = new Chart(
            document.getElementById('canvas_pangkalanmapchart_bar'),
            configPangkalanMapBar
        );

        function refreshMapAgenChart() {
            let kategoriFilterPerAgenValue = cboKategoriFilterPerAgen.value;
            let isiKategoriFilterPerAgenValue;
            let cboKategoriFilterPerAgenValue;
            let myArr = kategoriFilterPerAgenValue.split("_");
            let kodeAgen;

            kodeAgen = document.getElementById('cboagen_grafikperagen');
            if (myArr[2] === "bulan") {
                cboKategoriFilterPerAgenValue = document.getElementById('cbo_bulanperagen');
            } else if (myArr[2] === "tanggal") {
                cboKategoriFilterPerAgenValue = document.getElementById('dtp_peragen');
            }
            isiKategoriFilterPerAgenValue = cboKategoriFilterPerAgenValue.value;

            $.ajax({
                type: 'POST',
                url: '{{ route('home.refreshagenmapchart') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    kriteria: myArr[2],
                    isiFilter: isiKategoriFilterPerAgenValue,
                    kodeAgen: kodeAgen.value
                },
                success: function(response) {
                    if (response.status == 'ok') {
                        myChartAgenMapBar.data.labels = response.labels.persentase;
                        myChartAgenMapBar.data.datasets[0].data = response.data
                            .persentase; // or you can iterate for multiple datasets
                        myChartAgenMapBar.update(); // finally update our chart
                        // {{-- ######### dari jhonatan ######## --}}
                        // myChartBestsellerDoughnut.data.labels = response.msg.labels;
                        // myChartBestsellerDoughnut.data.datasets[0].data = response.msg
                        //     .data; // or you can iterate for multiple datasets
                        // myChartBestsellerDoughnut.update(); // finally update our chart
                        // {{-- ######### dari jhonatan ######## --}}
                    }
                },
                error: function(response, textStatus, errorThrown) {
                    console.log(response);
                }
            });
        };
    </script>
@endsection
