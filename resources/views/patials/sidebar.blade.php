<section class="sidebar">
   
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">TABLEAU DE BORD</li>
      
      <li><a href="{{ route('admin.souscribe') }}"><i class="fa fa-book"></i> <span>SOUSCRIPTIONS</span></a></li>
      <li><a href="#"><i class="fa fa-book"></i> <span>STATISTIQUES</span></a></li>
      <li><a href="{{ route('admin.transporteur') }}"><i class="fa fa-book"></i> <span>TRANSPORTEURS</span></a></li>
      <li><a href="{{ route('admin.ville') }}"><i class="fa fa-book"></i> <span>VILLES</span></a></li>
      <li><a href="{{ route('admin.agent') }}"><i class="fa fa-book"></i> <span>AGENTS</span></a></li>
      <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-book"></i> <span>DECONNEXION</span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
</section>