<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WishFlix - The Witcher 3</title>
    <link
      href="https://cdn.jsdelivr.net/npm/daisyui@5"
      rel="stylesheet"
      type="text/css"
    />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body>
    <div class="wishflix-shell">
      <header
        class="navbar wishflix-shell__navbar"
        aria-label="Navigation principale"
      >
        <div class="navbar-start">
          <a class="wishflix-shell__brand" href="/">WishFlix</a>
          <span class="wishflix-shell__tagline">Gaming catalog</span>
        </div>

        <nav
          class="navbar-center wishflix-shell__menu"
          aria-label="Liens principaux"
        >
          <a class="wishflix-shell__link" href="/"> Accueil </a>
          <a class="wishflix-shell__link" href="wishlist.html">
            Wishlist
            <span class="badge badge-secondary badge-sm">3</span>
          </a>
        </nav>

        <div class="navbar-end wishflix-shell__user">
          <span class="wishflix-shell__user-label">Invité</span>
          <a class="btn btn-primary btn-sm" href="login.html">Se connecter</a>
        </div>
      </header>

      <main class="wishflix-main" id="contenu-principal">
        <section class="wish-detail">
          <figure class="wish-detail__backdrop">
            <img
              src="{{ str_replace(['w=300', 'h=450'], ['w=1600', 'h=900'], $game['cover_url']) }}"              alt="Image de couverture de {{ $game['title'] }}"
              width="1600"
              height="900"
            />
          </figure>

          <div class="wish-detail__veil" aria-hidden="true"></div>

          <div class="wish-detail__content">
            <a class="btn btn-ghost btn-sm" href="{{ route('home') }}">Retour au catalogue</a>

            <p class="wish-detail__kicker">Fiche jeu</p>
            <h1 class="wish-detail__title">{{ $game['title'] }}</h1>

            <div class="wish-detail__meta">
              <span class="badge badge-primary">{{ $game['category'] }}</span>
              <span class="badge badge-outline">{{ $game['release_year'] }}</span>
              <span class="badge badge-ghost">{{ $game['platforms'] }}</span>
            </div>

            <p class="wish-detail__description">
              {{ $game['synopsis'] }}
            </p>

            <ul class="wish-detail__facts" aria-label="Informations sur le jeu">
              <li>
                <strong>Note:</strong>
                {{ $game['rating'] }}/5
              </li>
              <li>
                <strong>Duree:</strong>
                100h de jeu
              </li>
              <li>
                <strong>Etat:</strong>
                Disponible
              </li>
            </ul>

            <div class="wish-detail__actions">
              <button class="btn btn-secondary">Ajouter a la wishlist</button>
              <a class="btn btn-outline" href="wishlist.html"
                >Voir ma wishlist</a
              >
            </div>
          </div>
        </section>
      </main>

      <footer class="wishflix-footer" aria-label="Pied de page">
        <p class="wishflix-footer__text">WishFlix - Gaming Catalog</p>
      </footer>
    </div>
  </body>
</html>
