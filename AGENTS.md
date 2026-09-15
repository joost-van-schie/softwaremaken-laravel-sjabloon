# Afspraken voor dit project

Dit project is gestart vanuit het Laravel-sjabloon van softwaremaken.nl. Deze
afspraken gelden voor iedereen die eraan werkt, mens of AI-agent. Ze zorgen dat
de app veilig blijft, op de hosting van softwaremaken.nl blijft draaien en
later zonder herbouw uit te breiden is.

## De stack (niets anders)

- Laravel 13 op PHP 8.3, MySQL als database.
- Livewire met Blade voor de schermen, Filament voor beheerschermen.
- Inloggen, rollen en rechten via de ingebouwde auth van Laravel en policies
  per model. "Gebruiker A ziet B niet" is een regel, geen wens.
- Assets via Vite; `npm run build` gebeurt op GitHub, niet op de hosting.
- Geen Node op de hosting, geen real-time (websockets), geen queues buiten de
  database-driver, geen eigen daemons. De hosting is shared hosting.

## Veilig, altijd

- Geheimen (API-sleutels, wachtwoorden) staan alleen in `.env` op de
  hostingomgeving; nooit in de code, nooit in git. `.env` staat in `.gitignore`.
- `APP_DEBUG=false` in productie. Foutmeldingen tonen geen stacktraces aan
  bezoekers.
- Alle invoer wordt gevalideerd met Form Requests of `$request->validate()`.
- Uploads gaan via `Storage` met een whitelist van bestandstypen, nooit
  rechtstreeks naar `public/`.
- Alleen Eloquent en de query builder; geen ruwe SQL met invoer erin.
- CSRF-bescherming blijft aan; formulieren gebruiken `@csrf`.
- Rate limiting op alle formulieren die iets aanmaken of versturen.

## Werkwijze

- Klein beginnen: één scherm dat werkt is beter dan vijf die half werken.
- Elke wijziging in een aparte commit met een duidelijke omschrijving.
- Migraties zijn altijd vooruit: nooit een bestaande migratie aanpassen als hij
  al live is; maak een nieuwe.
- Tests voor de belangrijkste flows (`php artisan test`) vóór je pusht.
- Push naar `main` zet de app live (zie `.github/workflows/deploy.yml`).

## Hoe de hosting werkt

- Bij elke push naar `main` bouwt GitHub Actions de app en zet hem via SSH neer
  in `~/app` op je hostingomgeving; `public_html` wijst naar `~/app/public`.
- Migraties draaien automatisch (`php artisan migrate --force`).
- De scheduler draait via een cron-regel op de hosting (elke minuut
  `php artisan schedule:run`); de queue via `queue:work --stop-when-empty` in
  diezelfde cron.
- Loop je vast? https://softwaremaken.nl/hulp
