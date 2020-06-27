# phpBank
1. O projekcie
2. Wykorzystane technologie
3. Uruchomienie projektu
4. Szczegółowy opis projektu
    1. Autoryzacja użytkownika
    2. Transakcje pieniężne
    3. Kontakty
    4. Karty
5. Podsumowanie

## O projekcie
Projekt zaliczeniowy przedmiotu poświęconemu Laravelowi.
Założeniem projektu było stworzenie aplikacji bankowej we wskazanym frameworku.
Aplikacja miała umożliwiać autoryzację użytkowników oraz wykonywanie między nimi przelewów.

## Wykorzystane technologie
1. Laravel
2. MySQL

## Uruchomienie projektu
Po pobraniu projektu z repozytorium należy w głównym katalogu utworzyć plik .env oraz wypełnić go swoimi danymi dostępu do bazy danych, na wzór:

``DB_CONNECTION=mysql``  
``DB_HOST=127.0.0.1``  
``DB_PORT=3306``  
``DB_DATABASE=project_phpbank``  
``DB_USERNAME=root``  
``DB_PASSWORD=``  

## Szczegółowy opis projektu
### Autoryzacja użytkownika
Autoryzację użytkownika oparłem na wbudowanym w Laravel systemie.
Zaimplementowaną na starcie migrację bazy danych dotyczącą użytkowników rozszerzyłem o potrzebne pola, takie jak:
- surname (nazwisko użytkownika),
- gender (potrzebne przy generowaniu zdjęcia uzytkownika),
- saldo (ilość pieniędzy na koncie użytkownika),
- photo (generowane automatycznie na podstawie płci użytkownika, losowane za pomocą API https://randomuser.me/),
- account (generowany losowo numer konta użytkownika).
Logowanie odbywa się za pomocą adresu email.
### Transakcje pieniężne
Możliwe operacje:
- odczyt ilości pieniędzy na koncie,
- doładowanie konta wskazaną sumą,
- wykonanie przelewu na konto innego użytkownika.
Historia operacji (ostatnie 6) wyświetlana jest na stronie głównej po zalogowaniu (w dashboardzie).
Transfer pieniędzy na konto innego użytkownika możliwe jest zarówno za pomocą indywidualnego numeru konta, jak również za pomocą adresu email.  

Każda operacja transferu pieniędzy opisana jest w encji 'transactions' przy pomocy trzech kolumn.  
Dwie z nich są kluczami zewnętrznymi:  
- 'from', powiązane z kolumną 'id' tabeli 'users' - jest to nadawca przelewu, czyli zalogowany użytkownik,
- 'to', będące wartością 'id' odbiorcy przelewu.  

Oraz kolumna 'amount' - kwota przelewu/doładowania.
TransactionsController obsługuje dwie operacje.  
Pierwszą z nich jest zwykły przelew z konta użytkownika na konto innego użytkownika.  
Kontroler umożliwia wysłanie maksymalnie kwoty równej obecnego salda (odczytanego z tabeli 'users').  
Jeżeli operacja może dojść do skutku, kontroler tworzy nowy wiersz w tabeli 'transactions', a także aktualizuje 'saldo' w tabeli 'users' - nadawcy odejmuje, a odbiorcy dodaje kwotę 'amount'.  
Drugą operacją jest doładowanie konta - na potrzeby testowania aplikacji funkcja ta nie ma żadnych ograniczeń.  
W gruncie rzeczy jest to taka sama operacja jak przelew z konta na konto, z tą różnicą, że zarówno 'from', jak i 'to' pobiera wartość 'id' zalogowanego użytkownika, a 'amount' nie jest odejmowane, jest tylko dodawane.  
W historii operacji na dashboardzie wiersze tabeli 'transactions' dotyczące zalogowanego użytkownika są odpowiednio interpretowane i różnie wyświetlane.
Jeżeli jest to przelew wychodzący, to wyświetlany jest na czerwono, jeżeli przychodzący z zewnątrz, to na zielono.  
Jeżeli operacja jest doładowaniem konta, to wyświetlana jest bez danych nadawcy i odbiorcy, zmaiast tego wyświetla napis "Doładowanie konta".
### Kontakty
Istnieje możliwość dodawania i usuwania użytkowników do listy kontaktów.
Po dodaniu kontaktu, jego zdjęcie wyświetlane jest na dashboardzie po zalogowaniu, można wyświetlić również szczegóły takie jak imię, nazwisko, adres email (przydatny przy wykonywaniu przelewu do znajomego).
Za kontakty odpowiedzialna jest encja 'contacts' w bazie danych. Jej struktura opiera się na dwóch kluczach zewnętrznych.
Pierwszym kluczem jest id użytkownika, który dodaje osobę do kontaktów, drugim kluczem jest id dodawanego użytkownika.
Dzięki temu dodanie znajomego do kontaktów nie jest równoznaczne z tym, że my zostaniemy dodani do jego listy znajomych.
Skutkuje to indywidualnymi, niepowiązanymi ze sobą listami kontaktów.
### Karty
Dodatkową funkcją jest umożliwienie użytkownikom dodawanie i usuwanie kart przypisanych do konta.
Nie ma ta funkcja praktycznego zastosowania w aplikacji, rozbudowuje jednak ją o funkcje potencjalnie przydatną w zastosowaniu w rzeczywistości, gdzie taka karta mogłaby być wykorzystana w płatnościach zbliżeniowych.
Kontroler odpowiedzialny za obsługę kart umożliwia stworzenie karty o wybranym kolorze, marce a także generuje trzy cyfrowy kod CCV.

## Podsumowanie
Praca nad tym projektem nauczyła mnie praktycznych umiejętności tworzenia aplikacji we frameworku, z którym nie miałem wcześniej do czynienia.
Jest to zarazem pierwszy projekt wykonany przeze mnie w języku PHP.
I choć nie sądzę bym się do tego języka przekonał, to jednak Laravel pozytywnie mnie zaskoczył.
Podoba mi się integracja frameworku z bazą danych, praca z layoutami blade również na pierwszy rzut oka wygląda na przyjemną.
Zaintrygował mnie system migracji bazy danych, wcześniej nie miałem z tym do czynienia, ale widzę, że w innych technologiach również jest to rozwiązanie stosowane.
Wydaje się bardzo przydatne na etapie produkcyjnym.
Najważniejszą rzeczą, którą wyciągnąłem z tego projektu jest praca nad routingiem, zarówno operacji GET, jak i POST, a także wykorzystania Controllerów do ich obsługi.
