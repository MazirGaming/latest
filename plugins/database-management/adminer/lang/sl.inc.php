<?php

/**
 * Vvveb
 *
 * Copyright (C) 2022  Ziadin Givan
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 */

$translations = [
	// label for database system selection (MySQL, SQLite, ...)
	'System'                                                   => 'Sistem',
	'Server'                                                   => 'Strežnik',
	'Username'                                                 => 'Uporabniško ime',
	'Password'                                                 => 'Geslo',
	'Permanent login'                                          => 'Trajna prijava',
	'Login'                                                    => 'Prijavi se',
	'Logout'                                                   => 'Odjavi se',
	'Logged as: %s'                                            => 'Prijavljen kot: %s',
	'Logout successful.'                                       => 'Prijava uspešna.',
	'Invalid credentials.'                                     => 'Neveljavne pravice.',
	'Language'                                                 => 'Jezik',
	'Invalid CSRF token. Send the form again.'                 => 'Neveljaven token CSRF. Pošljite formular še enkrat.',
	'No extension'                                             => 'Brez dodatkov',
	'None of the supported PHP extensions (%s) are available.' => 'Noben od podprtih dodatkov za PHP (%s) ni na voljo.',
	'Session support must be enabled.'                         => 'Podpora za seje mora biti omogočena.',
	'Session expired, please login again.'                     => 'Seja je potekla. Prosimo, ponovno se prijavite.',
	'%s version: %s through PHP extension %s'                  => 'Verzija %s: %s preko dodatka za PHP %s',
	'Refresh'                                                  => 'Osveži',

	// text direction
	'ltr' => 'ltr',

	'Privileges'             => 'Pravice',
	'Create user'            => 'Ustvari uporabnika',
	'User has been dropped.' => 'Uporabnik je odstranjen.',
	'User has been altered.' => 'Uporabnik je spremenjen.',
	'User has been created.' => 'Uporabnik je ustvarjen.',
	'Hashed'                 => 'Zakodirano',
	'Column'                 => 'Stolpec',
	'Routine'                => 'Postopek',
	'Grant'                  => 'Dovoli',
	'Revoke'                 => 'Odvzemi',

	'Process list'                     => 'Seznam procesov',
	'%d process(es) have been killed.' => ['Končan je %d proces.', 'Končana sta %d procesa.', 'Končani so %d procesi.', 'Končanih je %d procesov.'],
	'Kill'                             => 'Končaj',

	'Variables' => 'Spremenljivke',
	'Status'    => 'Stanje',

	'SQL command'                            => 'Ukaz SQL',
	'%d query(s) executed OK.'               => ['Uspešno se je končala %d poizvedba.', 'Uspešno sta se končali %d poizvedbi.', 'Uspešno so se končale %d poizvedbe.', 'Uspešno se je končalo %d poizvedb.'],
	'Query executed OK, %d row(s) affected.' => ['Poizvedba se je uspešno izvedla, spremenjena je %d vrstica.', 'Poizvedba se je uspešno izvedla, spremenjeni sta %d vrstici.', 'Poizvedba se je uspešno izvedla, spremenjene so %d vrstice.', 'Poizvedba se je uspešno izvedla, spremenjenih je %d vrstic.'],
	'No commands to execute.'                => 'Ni ukazov za izvedbo.',
	'Error in query'                         => 'Napaka v poizvedbi',
	'Execute'                                => 'Izvedi',
	'Stop on error'                          => 'Ustavi ob napaki',
	'Show only errors'                       => 'Pokaži samo napake',
	// sprintf() format for time of the command
	'%.3f s'  => '%.3f s',
	'History' => 'Zgodovina',
	'Clear'   => 'Počisti',

	'File upload'                                                                    => 'Naloži datoteko',
	'From server'                                                                    => 'z strežnika',
	'Webserver file %s'                                                              => 'Datoteka na spletnem strežniku %s',
	'Run file'                                                                       => 'Zaženi datoteko',
	'File does not exist.'                                                           => 'Datoteka ne obstaja.',
	'File uploads are disabled.'                                                     => 'Nalaganje datotek je onemogočeno.',
	'Unable to upload a file.'                                                       => 'Ne morem naložiti datoteke.',
	'Maximum allowed file size is %sB.'                                              => 'Največja velikost datoteke je %sB.',
	'Too big POST data. Reduce the data or increase the %s configuration directive.' => 'Preveliko podatkov za POST. Zmanjšajte število podatkov ali povečajte nastavitev za %s.',

	'Export' => 'Izvozi',
	'Output' => 'Izhod rezultata',
	'open'   => 'odpri',
	'save'   => 'shrani',
	'Format' => 'Format',
	'Data'   => 'Podatki',

	'Database'                     => 'Baza',
	'database'                     => 'baza',
	'Use'                          => 'Uporabi',
	'Select database'              => 'Izberi bazo',
	'Invalid database.'            => 'Neveljavna baza.',
	'Database has been dropped.'   => 'Baza je zavržena.',
	'Databases have been dropped.' => 'Baze so zavržene.',
	'Database has been created.'   => 'Baza je ustvarjena.',
	'Database has been renamed.'   => 'Baza je preimenovana.',
	'Database has been altered.'   => 'Baza je spremenjena.',
	'Alter database'               => 'Spremeni bazo',
	'Create database'              => 'Ustvari bazo',
	'Database schema'              => 'Shema baze',

	// thousands separator - must contain single byte
	','                           => ' ',
	'0123456789'                  => '0123456789',
	'Engine'                      => 'Pogon',
	'Collation'                   => 'Zbiranje',
	'Data Length'                 => 'Velikost podatkov',
	'Index Length'                => 'Velikost indeksa',
	'Data Free'                   => 'Podatkov prosto ',
	'Rows'                        => 'Vrstic',
	'%d in total'                 => 'Skupaj %d',
	'Analyze'                     => 'Analiziraj',
	'Optimize'                    => 'Optimiziraj',
	'Check'                       => 'Preveri',
	'Repair'                      => 'Popravi',
	'Truncate'                    => 'Skrajšaj',
	'Tables have been truncated.' => 'Tabele so skrajšane.',
	'Move to other database'      => 'Premakni v drugo bazo',
	'Move'                        => 'Premakni',
	'Tables have been moved.'     => 'Tabele so premaknjene.',
	'Copy'                        => 'Kopiraj',
	'Tables have been copied.'    => 'Tabele so kopirane.',

	'Routines'                                     => 'Postopki',
	'Routine has been called, %d row(s) affected.' => ['Klican je bil postopek, spremenjena je %d vrstica.', 'Klican je bil postopek, spremenjeni sta %d vrstici.', 'Klican je bil postopek, spremenjene so %d vrstice.', 'Klican je bil postopek, spremenjenih je %d vrstic.'],
	'Call'                                         => 'Pokliči',
	'Parameter name'                               => 'Ime parametra',
	'Create procedure'                             => 'Ustvari postopek',
	'Create function'                              => 'Ustvari funkcijo',
	'Routine has been dropped.'                    => 'Postopek je zavržen.',
	'Routine has been altered.'                    => 'Postopek je spremenjen.',
	'Routine has been created.'                    => 'Postopek je ustvarjen.',
	'Alter function'                               => 'Spremeni funkcijo',
	'Alter procedure'                              => 'Spremeni postopek',
	'Return type'                                  => 'Vračalni tip',

	'Events'                  => 'Dogodki',
	'Event has been dropped.' => 'Dogodek je zavržen.',
	'Event has been altered.' => 'Dogodek je spremenjen.',
	'Event has been created.' => 'Dogodek je ustvarjen.',
	'Alter event'             => 'Spremeni dogodek',
	'Create event'            => 'Ustvari dogodek',
	'At given time'           => 'v danem času',
	'Every'                   => 'vsake',
	'Schedule'                => 'Urnik',
	'Start'                   => 'Začetek',
	'End'                     => 'Konec',
	'On completion preserve'  => 'Po zaključku ohrani',

	'Tables'                                                         => 'Tabele',
	'Tables and views'                                               => 'Tabele in pogledi',
	'Table'                                                          => 'Tabela',
	'No tables.'                                                     => 'Ni tabel.',
	'Alter table'                                                    => 'Spremeni tabelo',
	'Create table'                                                   => 'Ustvari tabelo',
	'Table has been dropped.'                                        => 'Tabela je zavržena.',
	'Tables have been dropped.'                                      => 'Tabele so zavržene.',
	'Table has been altered.'                                        => 'Tabela je spremenjena.',
	'Table has been created.'                                        => 'Tabela je ustvarjena.',
	'Table name'                                                     => 'Ime tabele',
	'Show structure'                                                 => 'Pokaži zgradbo',
	'engine'                                                         => 'pogon',
	'collation'                                                      => 'zbiranje',
	'Column name'                                                    => 'Ime stolpca',
	'Type'                                                           => 'Tip',
	'Length'                                                         => 'Dolžina',
	'Auto Increment'                                                 => 'Samodejno povečevanje',
	'Options'                                                        => 'Možnosti',
	'Comment'                                                        => 'Komentar',
	'Default values'                                                 => 'Privzete vrednosti',
	'Drop'                                                           => 'Zavrzi',
	'Are you sure?'                                                  => 'Ste prepričani?',
	'Move up'                                                        => 'Premakni gor',
	'Move down'                                                      => 'Premakni dol',
	'Remove'                                                         => 'Odstrani',
	'Maximum number of allowed fields exceeded. Please increase %s.' => 'Največje število dovoljenih polje je preseženo. Prosimo, povečajte %s.',

	'Partition by'   => 'Porazdeli po',
	'Partitions'     => 'Porazdelitve',
	'Partition name' => 'Ime porazdelitve',
	'Values'         => 'Vrednosti',

	'View'                   => 'Pogledi',
	'View has been dropped.' => 'Pogled je zavržen.',
	'View has been altered.' => 'Pogled je spremenjen.',
	'View has been created.' => 'Pogled je ustvarjen.',
	'Alter view'             => 'Spremeni pogled',
	'Create view'            => 'Ustvari pogled',

	'Indexes'                    => 'Indeksi',
	'Indexes have been altered.' => 'Indeksi so spremenjeni.',
	'Alter indexes'              => 'Spremeni indekse',
	'Add next'                   => 'Dodaj naslednjega',
	'Index Type'                 => 'Tip indeksa',
	'Column (length)'            => 'Stolpec (dolžina)',

	'Foreign keys'                                                                                                                         => 'Tuji ključi',
	'Foreign key'                                                                                                                          => 'Tuj ključ',
	'Foreign key has been dropped.'                                                                                                        => 'Tuj ključ je zavržen.',
	'Foreign key has been altered.'                                                                                                        => 'Tuj ključ je spremenjen.',
	'Foreign key has been created.'                                                                                                        => 'Tuj ključ je ustvarjen.',
	'Target table'                                                                                                                         => 'Ciljna tabela',
	'Change'                                                                                                                               => 'Spremeni',
	'Source'                                                                                                                               => 'Izvor',
	'Target'                                                                                                                               => 'Cilj',
	'Add column'                                                                                                                           => 'Dodaj stolpec',
	'Alter'                                                                                                                                => 'Spremeni',
	'Add foreign key'                                                                                                                      => 'Dodaj tuj ključ',
	'ON DELETE'                                                                                                                            => 'pri brisanju',
	'ON UPDATE'                                                                                                                            => 'pri posodabljanju',
	'Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.' => 'Izvorni in ciljni stolpec mora imeti isti podatkovni tip. Obstajati mora indeks na ciljnih stolpcih in obstajati morajo referenčni podatki.',

	'Triggers'                  => 'Sprožilniki',
	'Add trigger'               => 'Dodaj sprožilnik',
	'Trigger has been dropped.' => 'Sprožilnik je odstranjen.',
	'Trigger has been altered.' => 'Sprožilnik je spremenjen.',
	'Trigger has been created.' => 'Sprožilnik je ustvarjen.',
	'Alter trigger'             => 'Spremeni sprožilnik',
	'Create trigger'            => 'Ustvari sprožilnik',
	'Time'                      => 'Čas',
	'Event'                     => 'Dogodek',
	'Name'                      => 'Naziv',

	'select'                     => 'izberi',
	'Select'                     => 'Izberi',
	'Select data'                => 'Izberi podatke',
	'Functions'                  => 'Funkcije',
	'Aggregation'                => 'Združitev',
	'Search'                     => 'Išči',
	'anywhere'                   => 'kjerkoli',
	'Search data in tables'      => 'Išče podatke po tabelah',
	'Sort'                       => 'Sortiraj',
	'descending'                 => 'padajoče',
	'Limit'                      => 'Limita',
	'Text length'                => 'Dolžina teksta',
	'Action'                     => 'Dejanje',
	'Unable to select the table' => 'Ne morem izbrati tabele',
	'No rows.'                   => 'Ni vrstic.',
	'%d row(s)'                  => ['%d vrstica', '%d vrstici', '%d vrstice', '%d vrstic'],
	'Page'                       => 'Stran',
	'last'                       => 'Zadnja',
	'Whole result'               => 'Cel razultat',
	'%d byte(s)'                 => ['%d bajt', '%d bajta', '%d bajti', '%d bajtov'],

	'Import'                        => 'Uvozi',
	'%d row(s) have been imported.' => ['Uvožena je %d vrstica.', 'Uvoženi sta %d vrstici.', 'Uvožene so %d vrstice.', 'Uvoženih je %d vrstic.'],

	// in-place editing in select
	'Ctrl+click on a value to modify it.' => 'Ctrl+klik na vrednost za urejanje.',
	'Use edit link to modify this value.' => 'Uporabite urejanje povezave za spreminjanje te vrednosti.',

	// %s can contain auto-increment value
	'Item%s has been inserted.'      => 'Predmet%s je vstavljen.',
	'Item has been deleted.'         => 'Predmet je izbrisan.',
	'Item has been updated.'         => 'Predmet je posodobljen.',
	'%d item(s) have been affected.' => ['Spremenjen je %d predmet.', 'Spremenjena sta %d predmeta.', 'Spremenjeni so %d predmeti.', 'Spremenjenih je %d predmetov.'],
	'New item'                       => 'Nov predmet',
	'original'                       => 'original',
	// label for value '' in enum data type
	'empty'                  => 'prazno',
	'edit'                   => 'uredi',
	'Edit'                   => 'Uredi',
	'Insert'                 => 'Vstavi',
	'Save'                   => 'Shrani',
	'Save and continue edit' => 'Shrani in nadaljuj z urejanjem',
	'Save and insert next'   => 'Shrani in vstavi tekst',
	'Clone'                  => 'Kloniraj',
	'Delete'                 => 'Izbriši',

	'E-mail'                       => 'E-mail',
	'From'                         => 'Od',
	'Subject'                      => 'Zadeva',
	'Attachments'                  => 'Priponke',
	'Send'                         => 'Pošlji',
	'%d e-mail(s) have been sent.' => ['Poslan je %d e-mail.', 'Poslana sta %d e-maila.', 'Poslani so %d e-maili.', 'Poslanih je %d e-mailov.'],

	// data type descriptions
	'Numbers'       => 'Števila',
	'Date and time' => 'Datum in čas',
	'Strings'       => 'Nizi',
	'Binary'        => 'Binarni',
	'Lists'         => 'Seznami',
	'Network'       => 'Mrežni',
	'Geometry'      => 'Geometrčni',
	'Relations'     => 'Relacijski',

	'Editor' => 'Urejevalnik',
	// date format in Editor: $1 yyyy, $2 yy, $3 mm, $4 m, $5 dd, $6 d
	'$1-$3-$5' => '$6.$4.$1',
	// hint for date format - use language equivalents for day, month and year shortcuts
	'[yyyy]-mm-dd' => 'd.m.[rrrr]',
	'now'          => 'zdaj',

	// general SQLite error in create, drop or rename database
	'File exists.'                         => 'Datoteka obstaja.',
	'Please use one of the extensions %s.' => 'Prosim, uporabite enega od dodatkov %s.',

	// PostgreSQL and MS SQL schema support
	'Alter schema'             => 'Spremeni shemo',
	'Create schema'            => 'Ustvari shemo',
	'Schema has been dropped.' => 'Shema je zavržena.',
	'Schema has been created.' => 'Shema je ustvarjena.',
	'Schema has been altered.' => 'Shema je spremenjena.',
	'Schema'                   => 'Shema',
	'Invalid schema.'          => 'Neveljavna shema.',

	// PostgreSQL sequences support
	'Sequences'                  => 'Sekvence',
	'Create sequence'            => 'Ustvari sekvenco',
	'Sequence has been dropped.' => 'Sekvenca je zavržena.',
	'Sequence has been created.' => 'Sekvence je ustvarjena.',
	'Sequence has been altered.' => 'Sekvence je spremenjena.',
	'Alter sequence'             => 'Spremni sekvenco',

	// PostgreSQL user types support
	'User types'             => 'Uporabniški tipi',
	'Create type'            => 'Ustvari tip',
	'Type has been dropped.' => 'Tip je zavržen.',
	'Type has been created.' => 'Tip je ustvarjen.',
	'Alter type'             => 'Spremeni tip',
];
