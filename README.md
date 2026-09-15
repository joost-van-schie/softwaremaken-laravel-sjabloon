# Laravel-sjabloon van softwaremaken.nl

Startpunt voor een app die je zelf bouwt met AI en live zet via
[softwaremaken.nl](https://softwaremaken.nl): Laravel 13, Livewire, Filament,
MySQL, en een kant-en-klare deploy naar je eigen hostingomgeving.

## Zo begin je

1. Klik op **Use this template** op GitHub (of gebruik de knop "Begin met het
   sjabloon" op softwaremaken.nl) en geef je repository een naam.
2. Clone hem, kopieer `.env.example` naar `.env` en draai:

   ```bash
   composer install
   php artisan key:generate
   php artisan migrate
   npm install && npm run dev
   php artisan serve
   ```

3. Maak een beheerder voor Filament: `php artisan make:filament-user`.
4. Bouw je app. Lees `AGENTS.md`: daar staan de afspraken die jouw AI-agent
   moet volgen.
5. Live zetten: koppel deze repository op softwaremaken.nl en klik op
   **Zet live**. Daarna zet elke push naar `main` je app automatisch live.

## Wat zit erin

- Laravel 13, PHP 8.3, MySQL
- Livewire 3 voor interactieve schermen zonder aparte frontend
- Filament 4 voor beheerschermen (`/admin`)
- `.github/workflows/deploy.yml`: bouwen op GitHub, neerzetten via SSH
- `AGENTS.md`: de afspraken voor mens en agent

## Hulp

Loop je vast? Plan een hulpsessie via https://softwaremaken.nl/hulp.
