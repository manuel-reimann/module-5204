# WebApp Spicy Stuff

- Projekt von Manuel Reimann
- WDD 921, Modul WBD5204
- Abgabedatum: 03.05.2023

---

## Informationen zur Datenbank

Die Datenbank-Datei befindet sich direkt im Ordner "Modulprojekt" und heisst "a_chilli_db". Diese kann direkt so im localhost installiert werden.
Um die Datenbank zu konfigurieren, sollte man die DB-Konfigurationsdatei bearbeiten.

Diese befindet sich hier: "src/config/config.php".

Aktuelle Settings:

- $host = "localhost";
- $user = "root";
- $dbpwd = "root"; //change to nothing if using windows
- $dbName = "a_chilli_db";

Sollte Windows / XAMP verwendet werden, sollte die Variable $dbpwd auf "" gesetzt werden. Ausserdem sollte folgender Ordnerpfad noch angepasst werden:

- define('IMAGE_PATH', 'assets/images/' . IMAGE_FOLDER);

---

## Wichtige Infos zur Benutzung

- Darkmode-toggler funktioniert in Chrome nur wenn im Computer keine Preferenz angegeben wird! In Firefox geht es immer.
- Wird ein Account oder ein Chilli gelöscht, löscht diese Aktion auch alle Einträge in der favourites-Tabelle (kaskadierend)

---

## Registrierte User (zum Ausprobieren)

- Username: Manu

  Password: Test123?

- Username: Martin

  Password: Test123?

---

## Technische Basis

Das Projekt wurde mit HTML, CSS, Javascript, PHP (OOP), PDO und MYSQL erstellt. Ausserdem wurden Frameworks & Libaries wie Tailwind, Fontawesome und Flowbite benutzt. Tailwind wurde via CLI initialisiert. Die Umgebung lässt sich wie folgt zusammenfassen:

PHP-Version: 8.0.8
Webserver: Apache
lokaler Webserver: Mamp
Datenbankserver: MySQL Version 5.7.34
MySQL-Port: 8889

---

## Über das Projekt

Es handelt sich hier um ein rein fiktives Schulprojekt im Rahmen des Moduls 5204 der SAE Zürich. Sollte das App tatsächlich mal verwendet werden, würde ich auf jeden Fall noch Filter hinzufügen mit welchen man die Chillis gemäss Ihren Eigenschaften filtern kann. Leider überstieg das die Vorgaben und hätte die Komplexität des Projekts um ein vielfaches erhöht. Deshalb bleibt es vorerst beim "liken" der Karten. Ich habe jedenfalls extrem viel gelernt durch diese Arbeit.
