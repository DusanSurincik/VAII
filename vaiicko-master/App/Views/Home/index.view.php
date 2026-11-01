<section class="hero">
    <div class="hero-content">
        <h1>Objavte najlepšie podujatia v meste</h1>
        <form class="search-form" action="#" method="GET">
            <input type="text" placeholder="Hľadať podujatie alebo kategóriu..." name="search">
            <button type="submit">Hľadať</button>
        </form>
    </div>
</section>

<section class="events-section">
    <h2>Najbližšie podujatia</h2>
    <div class="events-grid">

        <article class="event-card">
            <a href="<?= $link->url('home.detail') ?>" class="card-link-wrapper">
                <img src="<?= $link->asset('images/concert.jpg') ?>" alt="Koncert kapely Nirvana" class="card-image">
                <div class="card-content">
                    <h3>Koncert kapely Nirvana</h3>
                    <p class="meta">📅 25. Nov 2024 | 📍 NTC Aréna</p>
                    <p class="price">Cena od: 25,00 €</p>
                    <span class="btn-primary">Rezervovať lístky</span>
                </div>
            </a>
        </article>

        <article class="event-card">
            <a href="<?= $link->url('home.detail') ?>" class="card-link-wrapper">
                <img src="<?= $link->asset('images/hamlet.jpg') ?>" alt="Divadelné predstavenie Hamlet" class="card-image">
                <div class="card-content">
                    <h3>Divadelné predstavenie Hamlet</h3>
                    <p class="meta">📅 02. Dec 2024 | 📍 SND</p>
                    <p class="price">Cena od: 15,00 €</p>
                    <span class="btn-primary">Rezervovať lístky</span>
                </div>
            </a>
        </article>

        <article class="event-card">
            <a href="<?= $link->url('home.detail') ?>" class="card-link-wrapper">
                <img src="<?= $link->asset('images/slovan.jpg') ?>" alt="Hokejový zápas" class="card-image">
                <div class="card-content">
                    <h3>Hokejový zápas Slovan</h3>
                    <p class="meta">📅 10. Dec 2024 | 📍 Zimný štadión</p>
                    <p class="price">Cena od: 12,00 €</p>
                    <span class="btn-primary">Rezervovať lístky</span>
                </div>
            </a>
        </article>

    </div>
</section>

<section class="categories-section">
    <h2>Preskúmať podľa kategórie</h2>
    <div class="category-pills">
        <a href="#" class="pill">🎵 Hudba</a>
        <a href="#" class="pill">🎭 Divadlo</a>
        <a href="#" class="pill">⚽ Šport</a>
        <a href="#" class="pill">🎓 Prednášky</a>
    </div>
</section>