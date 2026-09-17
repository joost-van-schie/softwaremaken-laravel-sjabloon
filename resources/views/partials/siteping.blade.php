{{-- Feedbacktool van softwaremaken.nl op een proefversie (SitePing). Staat alleen aan als SITEPING_ENABLED=true in .env;
     op productie-apps blijft hij uit. Aan- en uitzetten gebeurt in de inlogomgeving van softwaremaken.nl. --}}
@if (filter_var(env('SITEPING_ENABLED', false), FILTER_VALIDATE_BOOLEAN) && env('SITEPING_PROJECT'))
    <script src="{{ env('SITEPING_WIDGET_URL', 'https://softwaremaken.nl/siteping/loader.js') }}" data-project="{{ env('SITEPING_PROJECT') }}" data-endpoint="{{ env('SITEPING_ENDPOINT', 'https://softwaremaken.nl/api/siteping') }}" defer></script>
@endif
