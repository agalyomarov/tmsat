  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <div class="sidebar">
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                      <a href="{{ route('main') }}" class="nav-link">
                          <i class="nav-icon fa fa-home"></i>
                          <p>Главная</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.diller') }}" class="nav-link">
                          <i class="nav-icon fa fa-male"></i>
                          <p>Диллеры</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.client') }}" class="nav-link">
                          <i class="nav-icon fa fa-users"></i>
                          <p>Клиенты</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.news') }}" class="nav-link">
                          <i class="nav-icon fa-solid fa-square-rss"></i>
                          <p>Новости</p>
                      </a>
                  </li>
              </ul>
          </nav>
      </div>
  </aside>
