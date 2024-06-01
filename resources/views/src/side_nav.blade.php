  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
          {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
          <span class="brand-text font-weight-light">BCS Class</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              {{-- <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
              <div class="info">
                  <a href="#" class="d-block">{{ auth()->user()->name }}</a>
              </div>
          </div>

          @php
              function active($routes)
              {
                  if (is_array($routes)) {
                      foreach ($routes as $route) {
                          if (Request::routeIs($route) || Request::is($route)) {
                              return 'menu-open active';
                          }
                      }
                  } else {
                      if (Request::routeIs($routes) || Request::is($routes)) {
                          return 'active';
                      }
                  }
                  return '';
              }
          @endphp
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <li class="nav-item {{ active(['subject.index', 'chapter.index', 'topic.index']) }}">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Catalogue
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('past_exam.index') }}" class="nav-link {{ active('past_exam.index') }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Past Exams</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('subject.index') }}" class="nav-link {{ active('subject.index') }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Subjects</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('chapter.index') }}" class="nav-link {{ active('chapter.index') }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Chapters</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('topic.index') }}" class="nav-link {{ active('topic.index') }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Topics</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  {{-- @if (auth()->user()->roles->contains(function ($role, $i) {
            return $role->id == 4;
        }))
                      <li class="nav-item {{ active(['consignments*']) }}">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Consignments
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('consignments.index') }}" class="nav-link"
                                      {{ active('consignments.index') }}>
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>All Consignments</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('consignments.create') }}"
                                      class="nav-link {{ active('consignments.create') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Create New</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif --}}

                  {{-- <li class="nav-item {{ active(['report.*']) }}">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Reports
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      @if (auth()->user()->roles->contains(function ($role, $i) {
            return $role->id == 2;
        }))
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('report.trip') }}" class="nav-link {{ active('report.trip') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Trip Report</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('report.tripCount') }}"
                                      class="nav-link {{ active('report.tripCount') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Trip Count</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('report.voyageReport') }}"
                                      class="nav-link {{ active('report.voyageReport') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Voyage Report</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('report.currentInsight') }}"
                                      class="nav-link {{ active('report.currentInsight') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Current Insight</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('report.surveyStatus') }}"
                                      class="nav-link {{ active('report.surveyStatus') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Survey Status</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('report.currentDemurrageStatus') }}"
                                      class="nav-link {{ active('report.currentDemurrageStatus') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Demurrage Status</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('report.shipRevenue') }}"
                                      class="nav-link {{ active('report.shipRevenue') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Ship Revenue</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('report.importerRevenue') }}"
                                      class="nav-link {{ active('report.importerRevenue') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Importer Revenue</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('report.currentDockReport') }}"
                                      class="nav-link {{ active('report.currentDockReport') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Current Dock Report</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('report.shipWiseDockHistory') }}"
                                      class="nav-link {{ active('report.shipWiseDockHistory') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Ship Wise Dock History</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('report.serviceRequisitionReport') }}"
                                      class="nav-link {{ active('report.serviceRequisitionReport') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Service Requisition History</p>
                                  </a>
                              </li>
                          </ul>
                      @endif
                  </li> --}}
                  <li class="nav-item">
                      <a href="{{ route('logout') }}" class="nav-link">
                          <i class="fas fa-sign-out-alt nav-icon"></i>
                          <p>Logout</p>
                      </a>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
