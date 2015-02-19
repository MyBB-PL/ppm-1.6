<?php
/**
 * MyBB 1.6
 * Copyright 2010 MyBB Group, All Rights Reserved
 *
 * Website: http://mybb.com
 * License: http://mybb.com/about/license
 *
 * $Id$
 */

$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (1, 'Archiwum ZIP', 'application/zip', 'zip', 1024, 'images/attachtypes/zip.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (2, 'Obraz JPG', 'image/jpeg', 'jpg', 500, 'images/attachtypes/image.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (3, 'Dokument tekstowy', 'text/plain', 'txt', 200, 'images/attachtypes/txt.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (4, 'OBraz GIF', 'image/gif', 'gif', 500, 'images/attachtypes/image.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (6, 'Plik PHP', 'application/octet-stream', 'php', 500, 'images/attachtypes/php.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (7, 'Obraz PNG', 'image/png', 'png', 500, 'images/attachtypes/image.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (8, 'Dokument Microsoft Word', 'application/msword', 'doc', 1024, 'images/attachtypes/doc.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (9, 'Plik HTM', 'application/octet-stream', 'htm', 100, 'images/attachtypes/html.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (10, 'Plik HTML', 'application/octet-stream', 'html', 100, 'images/attachtypes/html.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (11, 'Obraz JPEG', 'image/jpeg', 'jpeg', 500, 'images/attachtypes/image.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (12, 'Archiwum GZIP', 'application/x-gzip', 'gz', 1024, 'images/attachtypes/tar.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (13, 'Archiwum TAR', 'application/x-tar', 'tar', 1024, 'images/attachtypes/tar.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (14, 'Arkusz stylów CSS', 'text/css', 'css', 100, 'images/attachtypes/css.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (15, 'Dokument Adobe PDF', 'application/pdf', 'pdf', 2048, 'images/attachtypes/pdf.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (16, 'Mapa bitowa', 'image/bmp', 'bmp', 500, 'images/attachtypes/image.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (17, 'Dokument Microsoft Word 2007', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', 1024, 'images/attachtypes/doc.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (18, 'Arkusz kalkulacyjny Microsoft Excel', 'application/vnd.ms-excel', 'xls', 1024, 'images/attachtypes/xls.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (19, 'Arkusz kalkulacyjny Microsoft Excel 2007', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'xlsx', 1024, 'images/attachtypes/xls.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (20, 'Prezentacja Microsoft PowerPoint', 'application/vnd.ms-powerpoint', 'ppt', 1024, 'images/attachtypes/ppt.gif');";
$inserts[] = "INSERT INTO mybb_attachtypes (atid, name, mimetype, extension, maxsize, icon) VALUES (21, 'Prezentacja PowerPoint 2007', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'pptx', 1024, 'images/attachtypes/ppt.gif');";

$inserts[] = "INSERT INTO mybb_calendars (name,disporder,startofweek,showbirthdays,eventlimit,moderation,allowhtml,allowmycode,allowimgcode,allowvideocode,allowsmilies) VALUES ('Domyślny kalendarz',1,0,1,4,0,0,1,1,1,1);";

$inserts[] = "INSERT INTO mybb_forums (fid, name, description, linkto, type, pid, parentlist, disporder, active, open, threads, posts, lastpost, lastposter, lastposttid, allowhtml, allowmycode, allowsmilies, allowimgcode, allowvideocode, allowpicons, allowtratings, status, usepostcounts, password, showinjump, modposts, modthreads, modattachments, style, overridestyle, rulestype, rulestitle, rules) VALUES (1, 'Kategoria', '', '', 'c', 0, '1', 1, 1, 1, 0, 0, 0, '0', 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, '', 1, 0, 0, 0, 0, 0, 0, '', '');";
$inserts[] = "INSERT INTO mybb_forums (fid, name, description, linkto, type, pid, parentlist, disporder, active, open, threads, posts, lastpost, lastposter, lastposttid, allowhtml, allowmycode, allowsmilies, allowimgcode, allowvideocode, allowpicons, allowtratings, status, usepostcounts, password, showinjump, modposts, modthreads, modattachments, style, overridestyle, rulestype, rulestitle, rules) VALUES (2, 'Dział', '', '', 'f', 1, '1,2', 1, 1, 1, 0, 0, 0, '0', 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, '', 1, 0, 0, 0, 0, 0, 0, '', '');";

$inserts[] = "INSERT INTO mybb_helpdocs (hid, sid, name, description, document, usetranslation, enabled, disporder) VALUES (1, 1, 'Rejestracja', 'Obowiązki i przywileje zarejestrowanych.', 'Większość funkcji forum jest dostępne tylko dla osób zarejestrowanych. Rejestracja jest darmowa i trwa niecałe 5 minut. Po rejestracji możesz pisać wiadomości, ustawiać opcje dotyczące wyglądu i zarządzać swoim profilem. Do korzystania z niektórych funkcji wymagana jest rejestracja - są to: subskrypcje, zmienianie stylów, dostęp do prywatnego notatnika, pisanie prywatnych wiadomości do innych użytkowników.', 1, 1, 1);";
$inserts[] = "INSERT INTO mybb_helpdocs (hid, sid, name, description, document, usetranslation, enabled, disporder) VALUES (2, 1, 'Aktualizowanie profilu', 'Zmienianie ustawień profilu.', 'Po rejestracji na forum, możesz zmieniać informacje osobiste w profilu, takie jak: komunikatory, Twoje hasło, lub - jeśli potrzeba - adres e-mail. Wszystkie z tych informacji i ustawień można ustawić w [panelu użytkownika] znajdującym się u góry po prawej. Następnie kliknij [Edytuj profil] i aktualizuj swoje ustawienia. Pamiętaj o kliknięciu w przycisk [Zatwierdź], aby zmiany zostały zachowane.', 1, 1, 2);";
$inserts[] = "INSERT INTO mybb_helpdocs (hid, sid, name, description, document, usetranslation, enabled, disporder) VALUES (3, 1, 'Ciasteczka w MyBB', 'MyBB używa ciasteczek do przechowywania Twoich informacji o zalogowaniu.', 'MyBulletinBoard tworzy ciasteczka (cookies) w których przechowuje informacje o zalogowaniu. Ciasteczka to małe pliki przechowywane na Twoim komputerze; ciasteczka utworzone przez daną stronę działają tylko na tej stronie. Ciasteczka MyBB sprawdzają kiedy ostatnio i czy w ogóle przeczytano poszczególne wątki. Aby wyczyścić wszystkie ciasteczka, kliknij <a href=\"misc.php?action=clearcookies&amp;key={1}\">tutaj</a>.', 1, 1, 3);";
$inserts[] = "INSERT INTO mybb_helpdocs (hid, sid, name, description, document, usetranslation, enabled, disporder) VALUES (4, 1, 'Logowanie i wylogowywanie', 'Jak się zalogować i wylogować.', 'Gdy się zalogujesz, ciasteczka na Twoim komputerze zostaną ustawione tak, abyś mógł przeglądać forum zalogowany bez ciągłej potrzeby logowania. Wylogowanie czyści Twoje ciasteczka dotyczące logowania. Aby zalogować, kliknij [Logowanie] u góry, pod nawigacją. Aby się wylogować, kliknij [Wyloguj] w tym samym miejscu. Wyczyszczenie ciasteczek w Twojej przeglądarce da ten sam efekt.', 1, 1, 4);";
$inserts[] = "INSERT INTO mybb_helpdocs (hid, sid, name, description, document, usetranslation, enabled, disporder) VALUES (5, 2, 'Pisanie nowego wątku', 'Rozpoczynanie wątku na forum.', 'Jeśli chcesz utworzyć nowy wątek na forum, wybierz dział w którym chcesz go napisać, a następnie kliknij na przycisk [Nowy wątek]. Jeśli zobaczysz komunikat \"Nie masz uprawnień\" oznacza to, że nie masz uprawnień na pisanie w danym dziale.', 1, 1, 1);";
$inserts[] = "INSERT INTO mybb_helpdocs (hid, sid, name, description, document, usetranslation, enabled, disporder) VALUES (6, 2, 'Odpowiadanie w wątku', 'Odpowiadanie na forum.', 'Wybierz wątek, w którym chcesz odpowiedzieć. Kliknij na przycisk [Odpowiedz] znajdujący się u góry ekranu. Pamiętaj również, że ".$mybb->input['adminuser']."istrator mógł nałożyć restrykcje, więc możliwe, że nie będziesz mieć możliwości odpowiadania w niektórych działach. Moderator może usunąć wątek, w którym przez określony czas nie będzie odpowiedzi.', 1, 1, 2);";
$inserts[] = "INSERT INTO mybb_helpdocs (hid, sid, name, description, document, usetranslation, enabled, disporder) VALUES (7, 2, 'MyCode', 'Wszystko o MyCode.', 'Możesz używać MyCode - to uproszczona wersja HTML. <p>\n\r[b]Pogrubiony tekst[/b]\n\r&nbsp;&nbsp;&nbsp;<b>Pogrubiony tekst</b> <p>[i]Kursywa[/i]\n\r&nbsp;&nbsp;&nbsp;<i>Kursywa</i> <p>[u]Podkreślenie[/u]\n\r&nbsp;&nbsp;&nbsp;<u>Podkreślenie</u> <p>[s]Przekreślenie[/s]\n\r&nbsp;&nbsp;&nbsp;<strike>Przekreślenie</strike> <p>\n\r[url]http://www.przykladowy.adres.pl/[/url]\n\r&nbsp;&nbsp;&nbsp;<a href=\"http://www.przykladowy.adres.pl/\">http://www.przykladowy.adres.pl/</a> <p>[url=http://www.strona.pl/]Tytuł[/url]\n\r&nbsp;&nbsp;&nbsp;<a href=\"http://www.strona.pl/\">Tytuł</a> <p>[email]mojemail@serwer.pl[/email]\n\r&nbsp;&nbsp;&nbsp;<a href=\"mailto:mojemail@serwer.pl\">mojemail@serwer.pl</a> <p>[email=mojemail@serwer.pl]Napisz do mnie![/email]\n\r&nbsp;&nbsp;&nbsp;<a href=\"mailto:mojemail@serwer.pl\">Napisz do mnie!</a> <p>[email=mojemail@serwer.pl?subject=temat]e-mail z tematem[/email]\n\r&nbsp;&nbsp;&nbsp;<a href=\"mailto:mojemail@serwer.pl?subject=temat\">email z tematem</a> <p>\n\r[quote]Cytat[/quote]\n\r&nbsp;&nbsp;&nbsp;<quote>Cytat</quote> <p>[code]kod[/code]\n\r&nbsp;&nbsp;&nbsp;<code>kod</code> <p>\n\r[img]http://www.php.net/images/php.gif[/img]\n\r&nbsp;&nbsp;&nbsp;<img src=\"http://www.php.net/images/php.gif\"> <p>[img=50x50]http://www.php.net/images/php.gif[/img]\n\r&nbsp;&nbsp;&nbsp;<img src=\"http://www.php.net/images/php.gif\" width=\"50\" height=\"50\"> <p>\n\r[color=red]Czerwony kolor[/color]\n\r&nbsp;&nbsp;&nbsp;<font color=\"red\">Czerwony kolor</font> <p>[size=medium]Rozmiar medium[/size]\n\r&nbsp;&nbsp;&nbsp;<span style=\"font-size: medium;\">Rozmiar medium</span> <p>[font=Tahoma]Czcionka Tahoma[/font]\n\r&nbsp;&nbsp;&nbsp;<font face=\"Tahoma\">Czcionka Tahoma</font> <p>\n\r[align=center]Wycentrowany[/align]<div align=\"center\">Wycentrowany</div> <p>[align=right]Wyrównany do prawej[/align]<div align=\"right\">Wyrównany do prawej</div> <p>\n\r[list]<br />[*]Punkt #1\n\r[*]Punkt #2\n\r[*]Punkt #3\n\r[/list]\n\r<ul><li>Punkt #1</li><li>Punkt #2</li><li>Punkt #3</li> </ul> <p>Możesz również ustalić typ punktowania - dostępne typy: liczbowy [list=1] i alfabetyczny [list=a].</p>', 1, 1, 3);";

$inserts[] = "INSERT INTO mybb_helpsections (sid, name, description, usetranslation, enabled, disporder) VALUES (1, 'Rejestracja i podstawy', 'Podstawowe informacje, pomocne w rejestracji i tworzeniu profilu.', 1, 1, 1);";
$inserts[] = "INSERT INTO mybb_helpsections (sid, name, description, usetranslation, enabled, disporder) VALUES (2, 'Pisanie', 'Podstawy używania forum - tworzenie wątków, odpowiadanie itp.', 1, 1, 2);";

$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(1, 'Błąd', 'images/icons/bug.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(2, 'Ostrzeżenie', 'images/icons/exclamation.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(3, 'Pytanie', 'images/icons/question.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(4, 'Uśmiech', 'images/icons/smile.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(5, 'Smutek', 'images/icons/sad.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(6, 'Oczko', 'images/icons/wink.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(7, 'Duży uśmiech', 'images/icons/biggrin.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(8, 'Język', 'images/icons/tongue.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(9, 'Kostka', 'images/icons/brick.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(10, 'Serce', 'images/icons/heart.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(11, 'Informacja', 'images/icons/information.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(12, 'Żarówka', 'images/icons/lightbulb.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(13, 'Muzyka', 'images/icons/music.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(14, 'Zdjęcie', 'images/icons/photo.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(15, 'Tęcza', 'images/icons/rainbow.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(16, 'Szok', 'images/icons/shocked.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(17, 'Gwiazdka', 'images/icons/star.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(18, 'Kciuk w górę', 'images/icons/thumbsdown.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(19, 'Kciuk w dół', 'images/icons/thumbsup.gif');";
$inserts[] = "INSERT INTO mybb_icons (iid, name, path) VALUES(20, 'Wideo', 'images/icons/video.gif');";

$inserts[] = "INSERT INTO mybb_profilefields (fid, name, description, disporder, type, length, maxlength, required, editable, hidden, postnum) VALUES (1, 'Miejscowość', 'Gdzie mieszkasz?', 1, 'text', 0, 255, 0, 1, 0, 0);";
$inserts[] = "INSERT INTO mybb_profilefields (fid, name, description, disporder, type, length, maxlength, required, editable, hidden, postnum) VALUES (2, 'O sobie', 'Wpisz kilka zdań o swojej osobie.', 2, 'textarea', 0, 0, 0, 1, 0, 0);";
$inserts[] = "INSERT INTO mybb_profilefields (fid, name, description, disporder, type, length, maxlength, required, editable, hidden, postnum) VALUES (3, 'Płeć', 'Wybierz swoją płeć z listy.', 0, 'select\nnie wybrano\nmężczyzna\nkobieta\ninna', 0, 0, 0, 1, 0, 0);";

$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(1, 'Uśmiech', ':)', 'images/smilies/smile.gif', 1, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(2, 'Oczko', ';)', 'images/smilies/wink.gif', 2, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(3, 'Cwaniak', ':cool:', 'images/smilies/cool.gif', 3, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(4, 'Duży uśmiech', ':D', 'images/smilies/biggrin.gif', 4, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(5, 'Język', ':P', 'images/smilies/tongue.gif', 5, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(6, 'Wywracanie oczami', ':rolleyes:', 'images/smilies/rolleyes.gif', 6, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(7, 'Nieśmiały', ':shy:', 'images/smilies/shy.gif', 7, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(8, 'Smutny', ':(', 'images/smilies/sad.gif', 8, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(9, 'Małpka', ':at:', 'images/smilies/at.gif', 9, 0);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(10, 'Anioł', ':angel:', 'images/smilies/angel.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(11, 'Zły', ':@', 'images/smilies/angry.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(12, 'Zawstydzony', ':blush:', 'images/smilies/blush.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(13, 'Zdezorientowany', ':s', 'images/smilies/confused.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(14, 'Podejrzany', ':dodgy:', 'images/smilies/dodgy.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(15, 'Wykrzyknik', ':exclamation:', 'images/smilies/exclamation.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(16, 'Serce', ':heart:', 'images/smilies/heart.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(17, 'Huh', ':huh:', 'images/smilies/huh.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(18, 'Pomysł', ':idea:', 'images/smilies/lightbulb.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(19, 'Śpiący', ':sleepy:', 'images/smilies/sleepy.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(20, 'Niezdecydowany', ':-/', 'images/smilies/undecided.gif', 0, 1);";
#Emotikony wykonane przez Polski Support MyBB - http://www.mybboard.pl
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(21, 'Cyklop', ':cyklop:', 'images/smilies/cyklop.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(22, 'Diabeł', ':diabel:', 'images/smilies/devil.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(23, 'O matko', ':facepalm:', 'images/smilies/facepalm.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(24, 'Firefox', ':ff:', 'images/smilies/ff.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(25, 'Szczęśliwy', ':lol:', 'images/smilies/happy.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(26, 'Ninja', ':ninja:', 'images/smilies/ninja.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(27, 'Opera', ':opera:', 'images/smilies/opera.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(28, 'Plask', ':plask:', 'images/smilies/plask.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(29, 'Zawstydzony', ':zawstydzony:', 'images/smilies/shamefaced.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(30, 'Szczerbol', ':szczerbol:', 'images/smilies/szczerbol.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(31, 'Szczerbol', ':E', 'images/smilies/szczerbol2.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(32, 'Ściana', ':sciana:', 'images/smilies/wall.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(33, 'Zdziwko', ':zdziwko:', 'images/smilies/wow.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(34, 'Przytulanie', ':przytul:', 'images/smilies/wub.gif', 0, 1);";
$inserts[] = "INSERT INTO mybb_smilies (sid, name, find, image, disporder, showclickable) VALUES(35, 'xD', 'xD', 'images/smilies/xd.gif', 0, 1);";


$inserts[] = "INSERT INTO mybb_spiders (name,useragent) VALUES ('Google','Googlebot');";
$inserts[] = "INSERT INTO mybb_spiders (name,useragent) VALUES ('Lycos','lycos');";
$inserts[] = "INSERT INTO mybb_spiders (name,useragent) VALUES ('Ask.com','Teoma');";
$inserts[] = "INSERT INTO mybb_spiders (name,useragent) VALUES ('What You Seek','whatuseek');";
$inserts[] = "INSERT INTO mybb_spiders (name,useragent) VALUES ('Internet Archive','archive_crawler');";
$inserts[] = "INSERT INTO mybb_spiders (name,useragent) VALUES ('Alexa Internet','ia_archiver');";
$inserts[] = "INSERT INTO mybb_spiders (name,useragent) VALUES ('Bing','bingbot');";
$inserts[] = "INSERT INTO mybb_spiders (name,useragent) VALUES ('Yahoo!','Slurp');";
$inserts[] = "INSERT INTO mybb_spiders (name,useragent) VALUES ('Baidu','Baiduspider');";

$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('1','calendar','<lang:group_calendar>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('2','editpost','<lang:group_editpost>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('3','forumbit','<lang:group_forumbit>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('4','forumjump','<lang:group_forumjump>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('5','forumdisplay','<lang:group_forumdisplay>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('6','index','<lang:group_index>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('7','error','<lang:group_error>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('8','memberlist','<lang:group_memberlist>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('9','multipage','<lang:group_multipage>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('10','private','<lang:group_private>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('11','portal','<lang:group_portal>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('12','postbit','<lang:group_postbit>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('13','redirect','<lang:group_redirect>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('14','showthread','<lang:group_showthread>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('15','usercp','<lang:group_usercp>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('16','online','<lang:group_online>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('17','moderation','<lang:group_moderation>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('18','nav','<lang:group_nav>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('19','search','<lang:group_search>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('20','showteam','<lang:group_showteam>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('21','reputation','<lang:group_reputation>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('22','newthread','<lang:group_newthread>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('23','newreply','<lang:group_newreply>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('24','member','<lang:group_member>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('25','warnings','<lang:group_warning>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('26','global','<lang:group_global>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('27','header','<lang:group_header>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('28','managegroup','<lang:group_managegroup>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('29','misc','<lang:group_misc>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('30','modcp','<lang:group_modcp>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('31','php','<lang:group_php>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('32','polls','<lang:group_polls>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('33','post','<lang:group_post>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('34','printthread','<lang:group_printthread>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('35','report','<lang:group_report>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('36','smilieinsert','<lang:group_smilieinsert>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('37','stats','<lang:group_stats>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('38','xmlhttp','<lang:group_xmlhttp>');";
$inserts[] = "INSERT INTO mybb_templategroups (gid,prefix,title) VALUES ('39','footer','<lang:group_footer>');";

$inserts[] = "INSERT INTO mybb_usertitles (utid, posts, title, stars, starimage) VALUES (1, 0, 'Świeżo zarejestrowany', 1, '');";
$inserts[] = "INSERT INTO mybb_usertitles (utid, posts, title, stars, starimage) VALUES (2, 1, 'Początkujący', 2, '');";
$inserts[] = "INSERT INTO mybb_usertitles (utid, posts, title, stars, starimage) VALUES (3, 50, 'Użytkownik', 3, '');";
$inserts[] = "INSERT INTO mybb_usertitles (utid, posts, title, stars, starimage) VALUES (4, 250, 'Dużo pisze', 4, '');";
$inserts[] = "INSERT INTO mybb_usertitles (utid, posts, title, stars, starimage) VALUES (5, 750, 'Stały bywalec', 5, '');";

$inserts[] = "INSERT INTO mybb_threads (tid, fid, subject, icon, poll, uid, username, dateline, firstpost, lastpost, lastposter, lastposteruid, views, replies, closed, sticky, numratings, totalratings, notes, visible, unapprovedposts, attachmentcount, deletetime) VALUES (1, 2, 'Witamy w MyBB!', 0, 0, 1, '".$mybb->input['adminuser']."', ".TIME_NOW.", 1, ".TIME_NOW.", '".$mybb->input['adminuser']."', 1, 1, 0, '', 0, 0, 0, '', 1, 0, 0, 0);";
$inserts[] = "INSERT INTO mybb_posts (pid, tid, replyto, fid, subject, icon, uid, username, dateline, message, ipaddress, longipaddress, includesig, smilieoff, edituid, edittime, visible, posthash) VALUES
(1, 1, 0, 2, 'Witamy w MyBB!', 0, 1, '".$mybb->input['adminuser']."', ".TIME_NOW.", 'Dziękujemy za wybranie MyBB. Instalacja przebiegła poprawnie i Twoje forum jest gotowe do użytku. Jeżeli podczas pracy z MyBB napotkasz jakiś problem, nie bój się zapytać na forum [url=http://forum.mybboard.pl]oficjalnego Polskiego Supportu MyBB[/url]. Zachęcamy Cię także do zapoznania się z naszym [url=http://mybboard.pl]portalem[/url], gdzie możesz znaleźć najnowsze wiadomości ze świata MyBB oraz do odwiedzenia [url=http://wiki.mybboard.pl]polskiej Wiki[/url]. Powodzenia w przygodzie z MyBB!', '127.0.0.1', 2130706433, 0, 0, 0, 0, 1, '5721abfb03fd4e4ab211c718a9fd3d42');";
$inserts[] = "UPDATE mybb_forums SET threads='1', posts='1', lastpost='".TIME_NOW."', lastposter='".$mybb->input['adminuser']."', lastposteruid='1', lastposttid='1', lastpostsubject='Witamy w MyBB!' WHERE fid='2';";


?>