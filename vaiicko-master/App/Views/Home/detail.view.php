 <section class="event-hero" style="background-image: url(<?= $link->asset('images/detail-hero.jpg') ?>); background-repeat: no-repeat; background-size: cover;  " >
        <div class="event-hero-content">
            <h1>Koncert kapely Nirvana</h1>
            <p>📅 25. Nov 2024 | 📍 NTC Aréna, Bratislava</p>
        </div>
    </section>

    <div class="event-container">

        <section class="event-details">
            <h2>O podujatí</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.
            </p>
            <p>
                Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci.
            </p>

            <h2 class="section-title">Harmonogram</h2>
            <ul class="schedule-list">
                <li><strong>19:00</strong> – Otvorenie brán</li>
                <li><strong>20:00</strong> – Predskokan (Kapela ABC)</li>
                <li><strong>21:00</strong> – Hlavný program (Kapela XYZ)</li>
            </ul>

            <h2 class="section-title">Recenzie používateľov</h2>
            <div class="reviews-list">
                <article class="review-item">
                    <strong>Jozef Mak</strong> <span class="rating">⭐⭐⭐⭐⭐</span>
                    <p>Skvelá akcia, lístky som kúpil bez problémov. Určite prídem znova!</p>
                </article>
                <article class="review-item">
                    <strong>Anna Nováková</strong> <span class="rating">⭐⭐⭐⭐</span>
                    <p>Dobrý koncert, len škoda, že meškali 15 minút.</p>
                </article>
            </div>
        </section>

        <aside class="event-sidebar">
            <div class="checkout-widget">
                <h3>Rezervácia lístkov</h3>

                <form action="#" method="POST" class="checkout-form">
                    <label for="ticket-quantity">Počet lístkov:</label>
                    <select id="ticket-quantity" name="quantity">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>

                    <div class="price-calc">
                        <span>Cena spolu:</span>
                        <strong>25,00 €</strong>
                    </div>

                    <button type="button" class="btn-buy">Kúpiť lístky</button>

                    <div class="progress-bar-container">
                        <p class="availability-text">Zostáva 15 lístkov</p>
                        <div class="progress-bar"><div class="progress-fill"></div></div>
                    </div>
                </form>
            </div>
        </aside>

    </div>




