<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
  <div class="sidebar-brand d-flex flex-column align-items-center justify-content-center">
    <div class="sidebar-brand-icon">
      <div style="font-size: 36px; font-weight: bold;">CONCEPT</div>
    </div>
    <div style="font-size: 14px; margin-top: 5px;">Admin System</div>
  </div>
  
  
  <hr class="sidebar-divider my-9">
  
  <li class="nav-item mt-5">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  
  <li class="nav-item mt-3">
    <a class="nav-link" href="{{ route('products') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Product</span>
    </a>
  </li>
  
  <hr class="sidebar-divider d-none d-md-block">
</ul>
