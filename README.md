# FleetLink Magazyn 3.0

System zarządzania urządzeniami GPS — aplikacja webowa oparta na PHP i MySQL.

## Funkcje

- **Dashboard** — panel główny ze statystykami i ostatnimi zdarzeniami
- **Urządzenia GPS** — zarządzanie urządzeniami, producentami i modelami
- **Magazyn** — stan magazynowy, przyjęcia, wydania i korekty
- **Montaże** — rejestrowanie montaży i demontaży urządzeń w pojazdach
- **Serwisy** — planowanie i rejestracja serwisów
- **Klienci** — baza klientów i pojazdów
- **CRM** — oferty, umowy i protokoły zdawczo-odbiorcze
- **Statystyki** — raporty i wykresy
- **Kalendarz** — widok kalendarza montaży i serwisów
- **Użytkownicy** — zarządzanie kontami (panel admina)

## Wymagania

- PHP 7.4 lub nowszy (zalecane PHP 8.x)
- MySQL 5.7 lub nowszy (lub MariaDB 10.3+)
- Serwer Apache z mod_rewrite

## Instalacja

1. Skopiuj pliki na serwer (np. przez FTP lub bezpośrednio na hosting)
2. Otwórz w przeglądarce: `https://twojadomena.pl/setup.php`
3. Postępuj zgodnie z kreatorem instalacji:
   - **Krok 1**: Podaj dane dostępowe do bazy MySQL
   - **Krok 2**: Utwórz tabele bazy danych
   - **Krok 3**: Utwórz konto administratora
4. Po zakończeniu instalacji zaloguj się przez `login.php`

> **Uwaga bezpieczeństwa**: Po instalacji zalecamy usunięcie lub zablokowanie pliku `setup.php`.

## Struktura plików

```
├── index.php              # Punkt wejścia (przekierowanie do login.php)
├── login.php              # Strona logowania
├── logout.php             # Wylogowanie
├── setup.php              # Kreator instalacji
├── dashboard.php          # Panel główny
├── devices.php            # Urządzenia GPS
├── inventory.php          # Magazyn
├── installations.php      # Montaże
├── services.php           # Serwisy
├── clients.php            # Klienci
├── vehicles.php           # Pojazdy
├── offers.php             # Oferty
├── contracts.php          # Umowy
├── protocols.php          # Protokoły
├── manufacturers.php      # Producenci
├── models.php             # Modele urządzeń
├── users.php              # Użytkownicy (admin)
├── settings.php           # Ustawienia
├── email.php              # Wysyłka e-mail
├── statistics.php         # Statystyki
├── calendar.php           # Kalendarz
├── includes/              # Pliki pomocnicze PHP
│   ├── auth.php           # Uwierzytelnianie i sesje
│   ├── db.php             # Połączenie z bazą danych
│   ├── functions.php      # Funkcje pomocnicze
│   ├── config.template.php # Szablon konfiguracji
│   ├── schema.sql         # Schemat bazy danych
│   ├── header.php         # Nagłówek HTML i nawigacja
│   └── footer.php         # Stopka HTML
└── assets/
    ├── css/style.css      # Style CSS
    └── js/app.js          # JavaScript
```

## Technologie

- **Backend**: PHP (bez frameworka)
- **Baza danych**: MySQL / MariaDB (PDO)
- **Frontend**: Bootstrap 5.3, Font Awesome 6.5, FullCalendar 6
- **Bezpieczeństwo**: CSRF tokens, bcrypt passwords, session hardening, .htaccess headers
