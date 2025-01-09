<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Supermercado</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="{{ route('products.create') }}" class="nav-link active" aria-current="page" href="#">Cadastrar</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('products.index') }}" class="nav-link active" aria-current="page" href="#">Listar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>