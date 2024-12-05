<?php $navbar = ['class' => 'nav-link']; ?>
<?php $navbarob = ['class' => 'navbar-brand']; ?>
<?php 
    $img = array(
        'src' => 'obrazky/bloodpact.jpg',
        'alt' => '',
        'style' => 'width: 50px;'
    );
    


?>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
          <?= anchor('pokus', img($img), $navbarob) ?>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <?= anchor('pokus', 'Logo', $navbar); ?>
              </li>
              <li class="nav-item">
                <?= anchor('pisnicky', 'Top písničky', $navbar); ?>
              </li>
              <li class="nav-item">
                <?= anchor('koncerty', 'Koncerty', $navbar); ?>
              </li>
              <li class="nav-item">
                <?= anchor('alba', 'Alba', $navbar); ?>
              </li>
            </ul>
          </div>
        </div>
      </nav>