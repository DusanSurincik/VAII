# EventHub

Dušan Šurinčík

5ZYI31

## Stručný opis projektu
EventHub je webová aplikácia slúžiaca ako sprostredkovateľský portál pre kultúrne, športové a vzdelávacie podujatia. Hlavným cieľom aplikácie je umožniť používateľom prehľadávať nadchádzajúce akcie, filtrovať ich podľa kategórie alebo miesta konania a jednoducho si na ne rezervovať alebo zakúpiť lístky. Organizátorom a správcom na druhej strane poskytuje prehľadný nástroj na vytváranie podujatí, spravovanie kapacít a sledovanie predajov.

Aplikácia rieši problém neprehľadnej propagácie lokálnych akcií a absencie jednoduchého rezervácie lístkov.

## Role v projekte
1. Návštevník (Neregistrovaný používateľ)
   - Oprávnenia: Prezeranie zoznamu podujatí, detailov akcií, vyhľadávanie a filtrovanie podľa kategórií / miest konania. Nemôže vytvárať rezervácie.
3. Registrovaný používateľ (Zákazník)
   - Oprávnenia: Všetky možnosti návštevníka + vytváranie rezervácií lístkov, zobrazenie svojich zakúpených lístkov v osobnej zóne, stornovanie rezervácie.
5. Organizátor / Admin
   - Oprávnenia: Vytváranie, úprava a mazanie podujatí, správa miest konania a kategórií, prehľad štatistík predaných lístkov.

## Prípady použitia podľa rolí
1. Návštevník
   - Vyhľadá podujatie podľa názvu alebo kategórie.
   - Zobrazí si detail konkrétnej akcie (popis, dátum, miesto, zostávajúca kapacita, cena).
   - Registruje sa alebo sa prihlási do systému.
2. Registrovaný používateľ
   - Prihlási sa do aplikácie prostredníctvom formulára.
   - Rezervuje si lístok na zvolené podujatie.
   - Zobrazí si zoznam svojich rezervovaných lístkov.
   - Zruší svoju rezerváciu.
3. Organizátor / Admin
   - Pridá nové podujatie vrátane stanovenia kapacity a ceny.
   - Upraví detaily existujúceho podujatia alebo ho zmaže.
   - Spravuje zoznam miest konania (pridanie novej sály/miesta).

## Plánované entity
1. users
   - Atribúty: id, email, password_hash, first_name, last_name, role (user/admin).
2. venues
   - Atribúty: id, name, address, city, capacity.
3. categories
   - Atribúty: id, title (napr. Koncert, Divadlo, Šport).
4. events
   - Atribúty: id, title, description, event_date, ticket_price, available_tickets, venue_id (FK), category_id (FK), created_by (FK na users).
5. tickets
   - Atribúty: id, user_id (FK), event_id (FK), ticket_code, status (reserved/cancelled).

## Vzťahy medzi entitami
  - venues (1) : (N) events – Na jednom mieste konania sa môže konať viacero podujatí.
  - categories (1) : (N) events – V jednej kategórii môže byť zaradených viacero podujatí.
  - users (1) : (N) events – Jeden admin/organizátor môže vytvoriť viacero podujatí.
  - users (1) : (N) tickets – Jeden používateľ si môže rezervovať viacero lístkov.
  - events (1) : (N) tickets – Na jedno podujatie sa viaže viacero lístkov.
  - users (M) : (N) events – Vzťah M:N realizovaný prostredníctvom dekompozičnej tabuľky tickets.
    
## Hlavné stránky aplikácie
1. Domovská stránka: Prehľad najbližších podujatí s vyhľadávacím panelom a filtrovaním podľa kategórie.
2. Detail podujatia: Kompletné informácie o akcii, mapa/adresa miesta konania, stav počtu voľných lístkov a tlačidlo pre rezerváciu lístka.
3. Moje lístky: Zóna pre prihlásených používateľov s prehľadom zakúpených/rezervovaných lístkov a možnosťou zrušenia.
4. Prihlasovacia a registračná stránka: Formuláre na autentifikáciu používateľa.
5. Admin panel – Správa podujatí: Tabuľka so zoznamom akcií, formulár na vytvorenie/úpravu podujatia.

## Rozdelenie funkcionality
Základné funkcie:
 - Prihlasovanie a registrácia s bezpečne hašovaným heslom.
 - Kompletné CRUD operácie nad entitami events a venues.
 - Zobrazenie zoznamu a detailu podujatí.
 - Vytvorenie a zrušenie rezervácie lístka.
 - Ochrana pred SQL Injection.

Rozširujúce funkcie:
 - Interaktívny výber sedadiel.
 - Generovanie PDF lístka s QR kódom.
 - Hodnotenia podujatí (1-5 hviezičiek).
 - Exportovať dátum podujatia do kalendára.
 - Zľavové kupóny a promo kódy.
