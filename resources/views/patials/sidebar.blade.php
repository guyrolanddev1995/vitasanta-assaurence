<section class="sidebar">
   
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">TABLEAU DE BORD</li>
      <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> <span>TABLEAU DE BORD</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-tag" aria-hidden="true"></i> <span>SOUSCRIPTIONS</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.souscribe') }}">VOYAGEURS</a></li>
          <li><a href="{{ route('admin.livreur') }}">LIVREURS</a></li>
          <li><a href="{{ route('admin.vehicule') }}">VEHICULES</a></li>
        </ul>
    </li>
      <li><a href="#"><i class="fa fa-area-chart"></i> <span>STATISTIQUES</span></a></li>
      <li><a href="{{ route('admin.transporteur') }}"><i class="fa fa-truck"></i> <span>TRANSPORTEURS</span></a></li>
      <li><a href="{{ route('admin.ville') }}"><i class="fa fa-map"></i> <span>VILLES</span></a></li>
      <li><a href="{{ route('admin.agent') }}"><i class="fa fa-user"></i> <span>AGENTS</span></a></li>
      <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> <span>DECONNEXION</span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
</section>