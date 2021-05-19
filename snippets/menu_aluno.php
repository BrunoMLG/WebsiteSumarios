 
 <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="lista_disc_alunos.php"><img style="height: 40px; margin-left: 5%;" src="images/LogoPorto.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="lista_disc_alunos.php">Home </span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="sumarios_alunos.php">Sumarios</a>
            </li>

          </ul>
          <div class="collapse navbar-collapse justify-content-end" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="perfil_aluno.php"><i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION["nome"]); ?> </a></li>
              </ul> 
              <ul class="navbar-nav ml-auto">
                <li class="nav-item "><a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Sair </a></li>
              </ul> 
          </div>
          
        </div>
      </nav>