<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Centro PDV</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="/compras">Compras</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#">Link</a></li> -->

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            <?php echo AuthComponent::user('username'); ?><span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="/users/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</a></li>
            <li>
              <a href="/users/add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo Usuário</a>
            </li>
            <li role="separator" class="divider"></li>
            <li>
              <a href="/users/logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>  Sair</a>
            </li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
