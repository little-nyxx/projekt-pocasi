<?php $navbar = ['class' => 'nav-link']; ?>
<?php $navbarob = ['class' => 'navbar-brand']; ?>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <?= anchor('zeme', 'Země', $navbar); ?>
              </li>
              <li class="nav-item">
                <?= anchor('vsechny', 'Seznam všech stanic Německa', $navbar); ?>
              </li>
            </ul>
          </div>
        </div>
      </nav>