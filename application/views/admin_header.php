<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#" style='font-size:25px'>Furistic Shop</a>
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarCollapse"
    aria-controls="navbarCollapse"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
      <li class="nav-item active">
        <a class="nav-link text-success" href="<?= base_url('dashboard'); ?>" style='font-size:20px'>Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-success" href="<?= base_url('add-items'); ?>" style='font-size:20px'>Add Items</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-success" href="<?= base_url('view-items'); ?>" style='font-size:20px'>View Items</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-success" href="#" style='font-size:20px'>Orders</a>
      </li>
    </ul>
    <form class="form-inline ml-auto mt-2 mt-md-0">
        <h5 class ="text-success font-italic mr-sm-4"><?=$this->session->userdata('first_name');?> <?=$this->session->userdata('last_name');?></h5>
      <a href ="<?= base_url('user-logout'); ?>" class="btn btn-outline-success my-2 my-sm-0">Logout <span class='fas fa-sign-out-alt' style='font-size:20px'></span></a>
    </form>
  </div>
</nav>
