<?php
/*
= LuxCal admin interface language file = ROMANIAN / ROMÂNĂ

Traducerea în limba română realizată de Laurențiu Florin Bubuianu (laurfb@gmail.com - laurfb.tk).
This file has been translated in română by Laurențiu Florin Bubuianu (laurfb@gmail.com - laurfb.tk).

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.
This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","4.7.8");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Niciunul",
"no" => "nu",
"yes" => "da",
"own" => "own",
"all" => "Toate",
"or" => "sau",
"back" => "Înapoi",
"ahead" => "Ahead",
"close" => "Închide",
"always" => "întotdeauna",
"at_time" => "/", //date and time separator (e.g. 30-01-2020 @ 10:45)
"times" => "times",
"cat_seq_nr" => "category sequence nr",
"rows" => "rânduri",
"columns" => "coloane",
"hours" => "hours",
"minutes" => "minute",
"user_group" => "paletă utilizator",
"event_cat" => "paletă categorie",
"id" => "ID",
"username" => "Nume utilizator",
"password" => "Parola",
"public" => "Public",
"logged_in" => "Autentificat",
"logged_in_l" => "autentificat",

//settings.php - fieldset headers + general
"set_general_settings" => "Setări generale",
"set_navbar_settings" => "Meniu",
"set_event_settings" => "Evenimente",
"set_user_settings" => "Setări utilizator",
"set_upload_settings" => "File Uploads",
"set_reminder_settings" => "Memento",
"set_perfun_settings" => "Funcții periodice (relevant doar dacă se folosește cron)",
"set_sidebar_settings" => "Bară laterală evenimente (relevant doar dacă este folosită)",
"set_view_settings" => "Setări vizualizare",
"set_dt_settings" => "Setări Dată/Oră",
"set_save_settings" => "Salvare setări",
"set_test_mail" => "Test email",
"set_mail_sent_to" => "Email de test trimis către",
"set_mail_sent_from" => "Acest email de test a fost trimis din pagina Setări a calendarului dumneavoastră",
"set_mail_failed" => "Sending test mail failed - recipient(s)",
"set_missing_invalid" => "setări lipsă sau incorecte (marcate)",
"set_settings_saved" => "Setările au fost salvate",
"set_save_error" => "Eroare Bază de date - Setările nu au putut fi salvate",
"hover_for_details" => "Detalii setări calendar",
"default" => "implicit",
"enabled" => "activ",
"disabled" => "inactiv",
"pixels" => "pixeli",
"warnings" => "Warnings",
"notices" => "Notices",
"visitors" => "Visitors",
"no_way" => "Nu sunteți autorizat să efectuați această operațiune",

//settings.php - general settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"versions_label" => "Versions",
"versions_text" => "• calendar version, followed by the database in use<br>• PHP version<br>• database version",
"calTitle_label" => "Titlu",
"calTitle_text" => "Titlul calendarului (utilizat și în emailul de notificare).",
"calUrl_label" => "URL calendar",
"calUrl_text" => "Adresa web completă a calendarului.",
"calEmail_label" => "Adresa de email",
"calEmail_text" => "The email address used to receive contact messages and to send or receive notification emails.<br>Format: \'email\' sau \'nume &#8826;email&#8827;\'",
"logoPath_label" => "Path/name of logo image",
"logoPath_text" => "If specified, a logo image will be displayed in the left upper corner of the calendar. If also a link to a parent page is specified (see below), then the logo will be a hyper-link to the parent page. The logo image should have a maximum height and width of 70 pixels.",
"backLinkUrl_label" => "Link către pagina părinte",
"backLinkUrl_text" => "URL-ul paginii părinte. Dacă introduceți aici o adresă URL, suplimentar, în partea stângă a barei meniu a calendarului, va fi afișat un buton <b>Înapoi</b> care permite întoarcerea la pagina părinte (pagina de unde a fost lansat calendarul). If a logo path/name has been specified (see above), then no Back button will be displayed, but the logo will become the back link instead.",
"timeZone_label" => "Fus orar",
"timeZone_text" => "Fusul orar folosit pentru afișarea orei curente exacte.",
"see" => "vezi",
"notifChange_label" => "Trimitere notificări privind modifcarea setărilor calendarului",
"notifChange_text" => "Când un utilizator adaugă, editează sau șterge un eveniment un mesaj de notificare va fi trimisă destinatarilor specificat.",
"chgRecipList" => "Lista de adrese",
"maxXsWidth_label" => "Max. width of small screens",
"maxXsWidth_text" => "For displays with a width smaller than the specified number of pixels, the calendar will run in a special responsive mode, leaving out certain less important elements.",
"rssFeed_label" => "Flux RSS",
"rssFeed_text" => "<b>Activ</b>: Pentru utilizatorii care au cel puțin drepturi de \'vizualizare\' un link pentru fluxul RSS va fi vizibil la baza calendarului iar un altul va fi adăugat și la începutul codului HTML al paginilor calendarului.",
"logging_label" => "Log calendar data",
"logging_text" => "The calendar can log error, warning and notice messages and visitors data. Error messages are always logged. Logging of warning and notice messages and visitors data can each be disabled or enabled by checking the relevant check boxes. All error, warning and notice messages are logged in the file \'logs/luxcal.log\' and visitors data are logged in the files \'logs/hitlog.log\' and \'logs/botlog.log\'.<br>Note: PHP error, warning and notice messages are logged at a different location, determined by your ISP.",
"maintMode_label" => "Maintenance mode",
"maintMode_text" => "When enabled, the calendar will run in maintenance mode, which means that useful maintenance information will be shown in the calendar footer bar.",
"reciplist" => "The recipient list can contain user names, email addresses, phone numbers and names of files with recipients (enclosed by square brackets), separated by semicolons. Files with recipients with one recipient per line should be located in the folder \'reciplists\'. When omitted, the default file extension is .txt",
"calendar" => "calendar",
"user" => "utilizator",
"database" => "database",

//settings.php - navigation bar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"contact_label" => "Contact button",
"contact_text" => "If enabled: A Contact button will be displayed in the side menu. Clicking this button will open a contact form, which can be used to send a message to the calendar administrator.",
"optionsPanel_label" => "Elemente în meniul Opțiuni",
"optionsPanel_text" => "Activează/dezactivează modurile de afișare din meniul Opțiuni.<br>• Meniul calendarului permite administratorului să schimbe calendarele. (util doar dacă sunt instalate mai multe calendare simultan)<br>• Opțiunea Grupuri a meniului permite afișarea selectivă a evenimentelor create de utilizatorii din grupul selectat.<br>• Opțiunea Utilizatori a meniului poate fi folosită pentru afișarea selectivă a evenimentelor corespunzătoare utilizatorului selectat.<br>• Opțiunea Categorie a meniului poate fi folosită similar pentru afișarea selectivă doar a anumitor categorii de evenimente.<br>• Meniul de selecție a limbii permite definirea limbii de afișare a calendarului (doar dacă calendarul are mai multe fișiere de limbă instalate)",
"calMenu_label" => "calendar",
"viewMenu_label" => "vedere",
"groupMenu_label" => "grupuri",
"userMenu_label" => "utilizatori",
"catMenu_label" => "categorie",
"langMenu_label" => "limbă",
"availViews_label" => "Vederi disponibile",
"availViews_text" => "Vederile calendarului disponibile public sau utilizatorilor autentificați reprezentate printr-o listă de numere separate prin virgulă. Semnificația numerelor:<br>1: vedere anuală<br>2: afișare lunără (7 zile)<br>3: afișarea lunii curente<br>4: afișare săptămânală (7 zile)<br>5: săptămâna curentă<br>6: afișare pe zile<br>7: afișarea evenimentelor următoare<br>8: afișarea modificărilor<br>9: afișare matricială (categorii)<br>10: afișare matricială (utilizatori)<br>11: afișare gantt chart",
"viewButtons_label" => "Afișare butoane în bara de navigare",
"viewButtons_text" => "Afișarea butoanelor de navigare pentru public și pentru utilizatorii autentificați, într-o formă specificată printr-o listă de numere.<br>Dacă un număr apare în listă, butonul corespunzător va fi afișat. Dacă nu se specifică niciun număr - niciun buton de vizualizare nu va fi afișat.<br>Semnificația numerelor:<br>1: An<br>2: Întreaga lună<br>3: Luna curentă<br>4: Întreaga săptămână<br>5: Săptămâna curentă<br>6: Zi<br>7: Care urmează<br>8: Modificări<br>9: Matricial-C<br>10: Matricial-U<br>11: Gantt Chart<br>Ordinea  numerelor determină modul de afișare al butoanelor.<br>Spre exemplu: \'24\' înseamnă că vor fi afișate butoanele \'Întraga lună\' și \'Întreaga săptămână\'.",
"defaultViewL_label" => "Mod inițial vizualizare (large display)",
"defaultViewL_text" => "Modul implicit de vizualizare la pornire pentru public și pentru utilizatorii neautentificați using large displays. <br>Se recomandă utilizarea modului \'Lunar\'.",
"defaultViewS_label" => "Mod inițial vizualizare (small display)",
"defaultViewS_text" => "Modul implicit de vizualizare la pornire pentru public și pentru utilizatorii neautentificați using small displays. <br>Se recomandă utilizarea modului \'Urmează\'.",
"language_label" => "Limba implicită",
"language_text" => "Fișierele specifice de limbă ui-{limbă}.php, ai-{limbă}.php, ug-{limbă}.php precum și fișierul ug-layout.png trebuie să fie prezente în directorul \'lang/\', unde textul {limba} reprezintă limba folosită pentru interfață, acesta trebuind să fie obligatoriu scris cu litere mici (minuscule)!",

//settings.php - events settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"privEvents_label" => "Postare evenimente private",
"privEvents_text" => "<b>Activ</b>: utilizatorul poate posta propriile evenimente private.<br>Evenimentele private vor fi vizibile doar pentru cel care le-a introdus.<br><b>Implicit</b>: când sunt adaugăte evenimente noi, opțiunea \'privat\' din fereastra Eveniment va fi selectată automat, în mod implicit.<br><b>Întotdeauna</b>: când sunt adăugate evenimente noi acestea vor fi întotdeauna evenimente private, opțiunea \'privat\' din fereastra Eveniment nemaifiind afișată.",
"aldDefault_label" => "Evenimente noi pentru toate zilele în mod implicit",
"aldDefault_text" => "Când se adaugă evenimente, în fereastra Eveniment opțiunea \'Toată ziua\' va fi selectată în mod implicit. Suplimentar, dacă nu se specifică un timp inițial evenimentul va deveni în mod automat un eveniment pentru toată ziua.",
"details4All_label" => "Afișare detalii evenimente pentru utilizatorii",
"details4All_text" => "<b>Inactiv</b>: detaliile evenimentului vor fi vizibile doar pentru proprietar și pentru utilizatorii care au primit dreptul \'toate evenimentele\' activat.<br><b>Activ</b>: detalile evenimentului sunt vizibile pentru toți utilizatorii.<br>Autentificat: detalile evenimentului vor fi vizibile autorului și tuturor utilizatorilor autentificați.",
"evtDelButton_label" => "Afișare buton ștergere în fereastra Eveniment",
"evtDelButton_text" => "Selectat: butonul Ștergere din fereastra evenimentului nu va fi afișat astfel încât chiar și utilizatorii cu drept de editare nu vor putea să șteargă evenimente.<br>Neselectat: butonul Ștergere va fi afișat pentru toți utilizatorii.<br>Manager: butonul Ștergere va fi afișat doar pentru utilizatorii cu drepturi de \'administrare\'.",
"eventColor_label" => "Paleta de culori folosită pentru afișarea evenimentelor",
"eventColor_text" => "Evenimentele din calendar pot fi afișate folosind fie paletele definite de utilizator fie paletele setate pentru categoria de eveniment.",
"defVenue_label" => "Default Venue",
"defVenue_text" => "In this text field a venue can be specified which will be copied to the Venue field of the event form when adding new events.",
"xField1_label" => "Câmp suplimentar 1",
"xField2_label" => "Câmp suplimentar 2",
"xFieldx_text" => "Dacă aceast câmp este inclus în afișarea ferestrei evenimentului, textul corespunzător va fi adăugat ferestrei Eveniment cât și tuturor modurilor de afișare corespunzătoare.<br>• etichetă: permite definirea/adăugarea unei etichete personalizate acestui câmp (max. 15 caractere). Spre ex.: \'Adresă de email\', \'Site web\', \'Număr de telefon\'<br>• Minimum user rights: the field will only be visible to users with the selected user rights or higher.",
"xField_label" => "Etichetă",
"min_rights" => "Minimum user rights",
"no_color" => 'no color',
"manager_only" => 'manager',

//settings.php - user accounts settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Auto-înregistrare",
"selfReg_text" => "Permite utilizatorilor făcă cont definit de a se auto-înregistra pentru a putea vizualiza calendarul.<br>Grup de utilizatori la care vor fi atribuiți utilizatorii care se auto-înregsitrează.",
"selfRegQA_label" => "Self registration question/answer",
"selfRegQA_text" => "When self registration is enabled, during the self-registration process the user will be asked this question and will only be able to self-register if the correct answer is given. When the question field is left blank, no question will be asked.",
"selfRegNot_label" => "Notificare auto-înregistrare",
"selfRegNot_text" => "Trimite un email la adresa proprie calendarului pentru a notifica apariția unei auto-înregistrări în calendar.",
"restLastSel_label" => "Restaurarea sesiunii ultimului utilizator",
"restLastSel_text" => "Sesiunea corespunzătoare ultimului utilizator (setare definită în Panoul de Opțiuni) va fi salvată, ea fiind automat reâncărcată la reconectarea acestuia la calendar.",
"cookieExp_label" => " Durata (în zile) de expirare cookie-uri 'Memorare utilizator'",
"cookieExp_text" => "Numărul de zile după care cookie-ul definit prin opțiunea \'Memorare utilizator\' (din fereastra de autentificare) va expira.",
"answer" => "answer",
"view" => "vizualizare",
"post_own" => 'postare activităţi proprii',
"post_all" => 'postare/editare toate activităţile',
"manager" => 'postare/manager',

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"templFields_text" => "Corespondența numerelor:<br>1: Locație<br>2: Categorie<br>3: Descriere<br>4: Câmp suplimentar 1 (vezi mai jos)<br>5: Câmp suplimentar 2 (vezi mai jos)<br>6: Email de notificare (doar dacă s-a solicitat o notificare)<br>7: Data/ora adăugării/modificării și utilizatorul asociat<br>8: Fișier pdf, imagine sau video  atașat ca hiperlink.<br>Ordinea numerelor în secvență va determina și ordinea de afișare a câmpurilor.",
"evtTemplate_label" => "Șabloane evenimente",
"evtTemplate_text" => "Câmpule eveniment de afișat în vederea generală a calendarului, evenimentele următoare cât și cele afișate în ferestrele tiphover pot fi stabilite printr-o secvență de numere.<br>Pentru fiecare număr din secvență butonul corespunzător va fi afișat.",
"evtTemplGen" => "Vedere generală",
"evtTemplUpc" => "Evenimente programate",
"evtTemplPop" => "Box tip Hover",
"sortEvents_label" => "Sort events on times or category",
"sortEvents_text" => "In the various views events can be sorted on the following criteria:<br>• event times<br>• event category sequence number",
"yearStart_label" => "Luna de start pentru modul de afișare 'Anual'",
"yearStart_text" => "Dacă se specifică o lună de start (1-12) pentru afișarea în modul \'Anual\', calendarul va fi afișat mereu pornind de la această lună, anul următor fiind afișat începând cu prima zi a lunii specificate (nu din prima zi a lunii ianuarie).<br>Valoarea \'0\' specifică faptul că afișarea lunilor se va baza pe data curentă.",
"YvRowsColumns_label" => "Numărul de luni si coloane de afișat în modul Anual",
"YvRowsColumns_text" => "Numărul de luni de afișat pe fiecare rând în modul \'Anual\'.<br>Recomandabil 3 sau 4.<br>Numărul de coloane (pentru patru luni) de afișat în modul de vizualizare \'Anual\'.<br>Recomandat 4 (pentru a avea 16 luni de vizualizat în pagină).",
"MvWeeksToShow_label" => "Numărul de săptămîni de afișat în modul 'Lunar'",
"MvWeeksToShow_text" => "Numărul de săptămâni de afișat în modul \'Lunar\'.<br>Recomandabil 10 pentru a avea 2.5 luni de vizualizat în pagină.<br>Valorile 0 și 1 au aici un rol special:<br>0: se afișează exact 1 lună - lăsând neafișate zilele de început și de final din pagină.<br>1: se afișează exact 1 lună - fiind afișate suplimentar și zilele de început și de final din pagină.",
"XvWeeksToShow_label" => "Săptămânile de afișat în vederea matricială",
"XvWeeksToShow_text" => "Numărul de săptămâni de afișat în vizualizarea matricială.",
"GvWeeksToShow_label" => "Săptămânile de afișat în vederea Gantt Chart",
"GvWeeksToShow_text" => "Numărul de săptămâni de afișat în vizualizarea Gantt Chart.",
"workWeekDays_label" => "Zilele săptămînii curente",
"workWeekDays_text" => "Zilele din calendar colorate ca zile de lucru de afișat în vederile calendarului sau, spre exemplu, în vederile Luna curentă sau Săptămâna curentă.<br>Introduceți un număr pentru fiecare zi de lucru.<br>ex. 12345: Luni - Vineri<br>N-au fost introduse zilele care sunt considerate zile de weekend.",
"weekStart_label" => "Prima zi a săptămînii",
"weekStart_text" => "Introduceți prima zi a săptămânii de lucru.",
"lookBackAhead_label" => "Numărul de zile de afișat în modul 'Care urmează'",
"lookBackAhead_text" => "Numărul de zile de afișat pentru modul evenimente \'Care urmează\', \'De văzut\' și în fluxul RSS.",
"dwStartEndHour_label" => "Orele de început și de sfârșit pentr vederile Zi/Săptămână",
"dwStartEndHour_text" => "Orele la care o zi normală de lucru începe sau se termină.<br>Spre exemplu, setând aceste valori la 6 și la 18 va permite conservarea spațiului de afișare prin eliminarea de la afișare a orelor de noapte (între 18/00 și 6.00).<br>Și selectorul de oră va folosi doaracest interval restrâns.",
"dwTimeSlot_label" => "Dimensiune rînd în modul 'Zilnic/Săptămânal'",
"dwTimeSlot_text" => "Dimensiune rând exprimată în minute.<br>Această valoare, împreună cu \'Ora de început\' (vezi mai sus), va determina numărul de linii (rânduri) maxim în modul \'Zilnic/Săptămânal\'.",
"dwTsHeight_label" => "Înălțime rând",
"dwTsHeight_text" => "Înălțime rând în modul \'Zilnic/Săptămânal\' (pixeli).",
"evtHeadX_label" => "Event layout in Month, Week and Day view",
"evtHeadX_text" => "Templates with placeholders of event fields that should be displayed. The following placeholders can be used:<br>#ts - start time<br>#tx - start and end time<br>#e - event title<br>#o - event owner<br>#v - venue<br>#lv - venue with label \'Venue:\' in front<br>#c - category<br>#lc - category with label \'Category:\' in front<br>#a - age (see note below)<br>#x1 - extra field 1<br>#lx1 - extra field 1 with label from Settings page in front<br>#x2 - extra field 2<br>#lx2 - extra field 2 with label from Settings page in front<br>#/ - new line<br>The fields are displayed in the specified order. Characters other than the placeholders will remain unchanged and will be part of the displayed event.<br>HTML-tags are allowed in the template. E.g. &lt;b&gt;#e&lt;/b&gt;.<br>The | character can be used to split the template in sections. If within a section a #-parameter results in an empty string, the whole section will be omitted.<br>Note: The age is shown if the event is part of a category with \'Repeat\' set to \'every year\' and the year of birth in parentheses is mentioned somewhere in the event\'s description field.",
"monthView" => "Month view",
"wkdayView" => "Week/Day view",
"ownerTitle_label" => "Afișare proprietar eveniment în titlul evenimentului",
"ownerTitle_text" => "În diverse moduri de vizualizare ale calendarului numele celui care a definit evenimentul va fi afișat în titlul evenimentului, la început.",
"showSpanel_label" => "Side panel in Month, Week and Day view",
"showSpanel_text" => "In Month, Week and Day view, right next to the main calendar, the following items can be shown:<br>• a mini calendar which can be used to look back or ahead without changing the date of the main calendar<br>• a decoration image corresponding to the current month<br>• an info area to post messages/announcements for each month.<br>If no items are selected, the side panel will not be shown.<br>See admin_guide.html for details.",
"spMiniCal" => "Mini calendar",
"spImages" => "Images",
"spInfoArea" => "Info area",
"showImgInMV_label" => "Afișare în modul 'Lunar'",
"showImgInMV_text" => "Activare/dezactivare afișare în modul Lună imagini într-unul din câmpurile evenimentului. When enabled, thumbnails will be shown in the day cells and when disabled, thumbnails will be shown in the on-mouse-over boxes instead.",
"urls" => "Linkuri URL",
"emails" => "email links",
"monthInDCell_label" => "Afișare lună în fiecare celulă corespunzătoare zilei",
"monthInDCell_text" => "Afișează în modul lunar numele lunii (primele 3 litere) în celula fiecărei zile",
"evtWinSmall_label" => "Reduced event window",
"evtWinSmall_text" => "When adding/editing events, the Event window will show a subset of the input fields. To show all fields, a plus-sign can be selected.",
"mapViewer_label" => "Map viewer URL",
"mapViewer_text" => "If a map viewer URL has been specified, an address in the event\'s venue field enclosed in !-marks, will be shown as an Address button in the calendar views. When hovering this button the textual address will be shown and when clicked, a new window will open where the address will be shown on the map.<br>The full URL of a map viewer should be specified, to the end of which the address can be joined.<br>Examples:<br>Google Maps: https://maps.google.com/maps?q=<br>OpenStreetMap: https://www.openstreetmap.org/search?query=<br>If this field is left blank, addresses in the Venue field will not be show as an Address button.",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Formatul datei (zz ll aaaa)",
"dateFormat_text" => "Șir de caractere care definește modul de afișare pentru dată în calendar.<br>Caracterele acceptate: a = pentru an, l = pentru lună și d = pentru zi.<br>Caracterele non-alfanumerice pot fi utilizate ca separator și vor fi copiate ca atare.<br>Exemplu:<br>a-l-z: 2013-10-31<br>l.z.a: 10.31.2013<br>z/l/a: 31/10/2013",
"dateFormat_expl" => "ex. a.l.z: 2013.10.31",
"MdFormat_label" => "Format dată (zz luna)",
"MdFormat_text" => "Șir de caractere care definește modul de afișare pentru dată în calendar, pentru lună și zi.<br>Caractere posibile: L = luna ca text, z = ziua în cifre.<br>Caracterele non-alfanumerice pot fi utilizate ca separator și vor fi copiate ca atare.<br>Exemplu:<br>z L: 12 Aprilie<br>L, z: Iulie, 14",
"MdFormat_expl" => "ex. L, z: Iulie, 14",
"MdyFormat_label" => "Format dată (zz lună aaaa)",
"MdyFormat_text" => "Șir de caractere care definește modul de afișare pentru dată în calendar, pentru zi, lună și an.<br>Caractere posibile: d = ziua în cifre, M = luna ca text, y = anul în cifre.<br>Caracterele non-alfanumerice pot fi utilizate ca separator și vor fi copiate ca atare.<br>Exemplu:<br>d M y: 12 Aprilie 2013<br>M d, y: Iulie 8, 2013",
"MdyFormat_expl" => "ex. L z, y: Iulie 8, 2013",
"MyFormat_label" => "Format dată (lună aaaa)",
"MyFormat_text" => "Șir de caractere care definește modul de afișare pentru dată în calendar, pentru lună și an.<br>Caractere posibile: L = luna ca text, y = anul în cifre.<br>Caracterele non-alfanumerice pot fi utilizate ca separator și vor fi copiate ca atare.<br>Exemplu:<br>L a: Aprilie 2013<br>a - L: 2013 - Iulie",
"MyFormat_expl" => "ex. L a: Aprilie 2013",
"DMdFormat_label" => "Format dată (ziua săptămânii zz lună)",
"DMdFormat_text" => "Șir de caractere care definește modul de afișare pentru dată în calendar, pentru ziua săptămânii, zi și lună.<br>Caractere posibile: ZS = ziua din săptămână ca text, L = luna ca text, d = ziua în cifre.<br>Caracterele non-alfanumerice pot fi utilizate ca separator și vor fi copiate ca atare.<br>Exemple:<br>ZS z L: Vineri 12 Aprilie<br>ZS, L z: Luni, Iulie 14",
"DMdFormat_expl" => "ex. ZS - L z: Duminică - Aprilie 6",
"DMdyFormat_label" => "Format dată (ziua săptămînii zz lună aaaa)",
"DMdyFormat_text" => "Șir de caractere care definește modul de afișare pentru dată în calendar, pentru ziua săptămânii, zi, lună și an.<br>Caractere posibile: ZS = ziua din săptămână ca text, L = luna ca text, z = ziua în cifre, a = anul în cifre.<br>Caracterele non-alfanumerice pot fi utilizate ca separator și vor fi copiate ca atare.<br>Exemple:<br>ZS z L a: Vineri 13 Aprilie 2013<br>ZS - L z, a: Luni - Iulie 16, 2013",
"DMdyFormat_expl" => "ex. ZS, L z, a: Luni, Iulie 16, 2013",
"timeFormat_label" => "Format timp (hh mm)",
"timeFormat_text" => "Șir de caractere care definește modul de afișare pentru oră în calendar.<br>Caractere posibile: h = oră, H = ore cu cifra zero la început, m = minute, a = am/pm (opțional), A = AM/PM (opțional).<br>Caracterele non-alfanumerice pot fi utilizate ca separator și vor fi copiate ca atare.<br>Exemplu:<br>h:m: 18:35<br>h.m a: 6.35 pm<br>H:mA: 06:35PM",
"timeFormat_expl" => "ex. h:m: 22:35 și h:mA: 10:35PM",
"weekNumber_label" => "Afișare număr săptămână",
"weekNumber_text" => "Afișarea numărului săptămânii în modurile relevante poate fi activată/dezactivată",
"time_format_us" => "12-ore AM/PM",
"time_format_eu" => "24-ore",
"sunday" => "Duminică",
"monday" => "Luni",
"time_zones" => "FUS ORAR",
"dd_mm_yyyy" => "zz-ll-aaaa",
"mm_dd_yyyy" => "ll-zz-aaaa",
"yyyy_mm_dd" => "aaaa-ll-zz",

//settings.php - file uploads settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"maxUplSize_label" => "Maximum file upload size",
"maxUplSize_text" => "Maximum allowed file size when users upload attachment or thumbnail files.<br>Note: Most PHP installations have this maximum set to 2 MB (php_ini file) ",
"attTypes_label" => "Attachment file types",
"attTypes_text" => "Comma-separated list with valid attachment file types that can be uploaded (e.g. \'.pdf,.jpg,.gif,.png,.mp4,.avi\')",
"tnlTypes_label" => "Thumbnail file types",
"tnlTypes_text" => "Comma-separated list with valid thumbnail file types that can be uploaded (e.g. \'.jpg,.jpeg,.gif,.png\')",
"tnlMaxSize_label" => "Thumbnail - maximum size",
"tnlMaxSize_text" => "Maximum thumbnail image size. If users upload larger thumbnails, the thumbnails will be automatically resized to the maximum size.<br>Note: High thumbnails will stretch the day cells in Month view, which may result in undesired effects.",
"tnlDelDays_label" => "Thumbnail delete margin",
"tnlDelDays_text" => "If a thumbnail is used since this number of days ago, it can not be deleted.<br>The value 0 days means the thumbnail can not be deleted.",
"days" =>"days",
"mbytes" => "MB",
"wxhinpx" => "W x H in pixels",

//settings.php - reminders settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"services_label" => "Servicii",
"services_text" => "Serviciile disponibile pentru a trimite un memento. Dacă nu selectați niciun serviciu secțiunea corespunzătoare dein fereastra Eveniment va fi eliminată.",
"smsCarrier_label" => "Model furnizor SMS",
"smsCarrier_text" => "Modelul de suport SMS permite definirea adresei de trimitere SMS: ppp#sss@carrier, unde . . .<br>• ppp: text opțional care va fi atașat în mod automat înaintea numărului de telefon<br>• #: loc pentru introducerea numărului de telefon (calendarul va înlocui caracterul # cu numărul/numerele de telefon corespunzătoare)<br>• sss: text opțional care va fi adăugat în mod automat după numărul de telefon, spre exemplu o un nume de utilizator sau o parolăcerută de anumiți operatori de telefonie<br>• @: caracter separator<br>• furnizor: adresa furnizorului (ex. mail2sms.com)<br>Model exemplu: #@xmobile.com, 0#@carr2.int, #myunmypw@sms.gway.net.",
"smsCountry_label" => "SMS country code",
"smsCountry_text" => "If the SMS gateway is located in a different country than the calendar, then the country code of the country where the calendar is used must be specified.<br>Select whether the \'+\' or \'00\' prefix is required.",
"smsSubject_label" => "SMS subject template",
"smsSubject_text" => "If specified, the text in this template will be copied in the subject field of the SMS email messages sent to the carrier. The text may contain the character #, which will be replaced by the phone number of the calendar or the event owner (depending on the setting above).<br>Example: \'FROMFHONENUMBER=#\'.",
"smsAddLink_label" => "Add event report link to SMS",
"smsAddLink_text" => "When checked, a link to the event report will be added to each SMS. By opening this link on their mobile phone, recipients will be able to view the event details.",
"maxLenSms_label" => "Maximum SMS message length",
"maxLenSms_text" => "SMS messages are sent with utf-8 character encoding. Messages up to 70 characters will result in one single SMS message; messages > 70 characters, with many Unicode characters, may be split into multiple messages.",
"calPhone_label" => "Calendar phone number",
"calPhone_text" => "The phone number used as sender ID when sending SMS notification messages.<br>Format: free, max. 20 digits (some countries require a telephone number, other countries also accept alphabetic characters).<br>If no SMS service is active or if no SMS subject template has been defined, this field may be blank.",
"notSenderEml_label" => "Expeditorul emailurilor de notificare",
"notSenderEml_text" => "Când calendarul trimite emailuri de notificare, câmpul corespunzător expeditorului poate conține fie adresa de email a calendarului fie adresa celui care a creat evenimentul. Astfel, în cazul în care se utilizează adresa utilizatorului, destinatarul poate folosi această adresă pentru a răspunde direct.",
"notSenderSms_label" => "Sender of notification SMSes",
"notSenderSms_text" => "When the calendar sends reminder SMSes, the sender ID of the SMS message can be either the calendar phone number, or the phone number of the user who created the event.<br>If \'user\' is selected and a user account has no phone number specified, the calendar phone number will be taken.<br>In case of the user phone number, the receiver can reply to the message.",
"defRecips_label" => "Default list of recipients",
"defRecips_text" => "If specified, this will be the default recipients list for email and/or SMS notifications in the Event window. If this field is left blank, the default recipient will be the event owner.",
"maxEmlCc_label" => "Max. no. of recipients per email",
"maxEmlCc_text" => "Normally ISPs allow a maximum number of recipients per email. When sending email or SMS reminders, if the number of recipients is greater than the number specified here, the email will be split in multiple emails, each with the specified maximum number of recipients.",
"mailServer_label" => "Utilizare <b>PHP mail</b> sau <b>SMTP mail</b>",
"mailServer_text" => "Modulul <b>PHP mail</b> este indicat să fie folosit pentru trimiterea unui număr relativ mic de emailuri, fără autentificare. Pentru un număr crescut de emailuri, când se impune și existența autentificării, este recomandat folosirea modulului <b>SMTP mail</b>.<br>Utilizarea <b>SMTP mail</b> presupune existența unui server de email dedicat, parametrii de configurare pentru utilizarea serverului SMTP trebuind să fie specificați mai jos.",
"smtpServer_label" => "Nume server SMTP",
"smtpServer_text" => "Dacă selectați modul <b>SMTP mail</b> va trebui să introduceți aici numele serverului SMTP. Spre exemplu: smtp.gmail.com.",
"smtpPort_label" => "Port SMTP",
"smtpPort_text" => "Dacă selectați modul <b>SMTP mail</b> va trebui să introduceți aici portul utilizat de serverul SMTP. Spre exemplu: 25, 465 sau 587. Gmail utilizează spre exemplu portul 465.",
"smtpSsl_label" => "SSL (Secure Sockets Layer)",
"smtpSsl_text" => "Dacă selectați modul <b>SMTP mail</b>, puteți selecta aici utilizarea modului SSL (Secure Sockets Layer). Spre exemplu pentru gmail opțiunea SSL trebuie activată.",
"smtpAuth_label" => "Autentificare SMTP",
"smtpAuth_text" => "Dacă opțiunea este selectată, numele și parola specificate mai jos vor fi utilizate ca date de autentificare pentru serverul de mail SMTP.<br>Pentru Gmail spre exemplu numele de utilizator face parte din adresa de email (partea dinaintea caracterului @).",
"cc_prefix" => "Country code starts with prefix + or 00",
"general" => "General",
"email" => "Email",
"sms" => "SMS",
"php_mail" => "PHP mail",
"smtp_mail" => "SMTP mail (completați câmpurile de mai jos)",

//settings.php - periodic function settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"cronHost_label" => "Host Cron job",
"cronHost_text" => "Specifică localizarea cron job care startează periodic scriptul. \'lcalcron.php\'.<br>• local: cron job rulează pe același server cu calendarul<br>• remote: cron job rulează pe un server separat sau lcalcron.php este rulat manual (testare)<br>• Adresă IP: cron job va rula de pe un server specificat prin această adresa IP.",
"cronSummary_label" => "Sumar Cron",
"cronSummary_text" => "Mod de trimitere a sumarului serviciului cron pe email la administratorul calendarului.<br>Opțiunea este utilă doar dacă pe server a fost activată cel puțin o acțiune în cron.",
"chgSummary_label" => "Daily calendar changes summary",
"chgSummary_text" => "Numărul de zile anterioare evenimentului utilizate pentru sumarul modificărilor.<br>Dacă numărul introdus este \'0\' nu se va trimite niciun sumar.",
"icsExport_label" => "Export zilnic pentru evenimente iCal",
"icsExport_text" => "<b>Activ</b>: Toate evenimentele aflate în intervalul -1 săptămână până peste 1 an vor fi exportate într-un fișier .ics în folderul \'files\' în formatul iCalendar.<br>Numele fișierului va fi generat pe baza numelui calendarului având eventualele spații înlocuite cu caracterul \'_\' (underscores), cu suprascrierea automată a fișierului mai vechi.",
"eventExp_label" => "Nr. zile expirare eveniment",
"eventExp_text" => "Numărul de zile după care un eveniment este șters în mod automat.<br>Pentru valoarea 0 sau dacă nu este definit niciun eveniment în lista cron, niciun eveniment nu va fi șters în mod automat.",
"maxNoLogin_label" => "Numărul maxim de zile acceptat fără logare",
"maxNoLogin_text" => "Dacă un utilizator nu se autentifică (nu accesează calendarul) în timpul numărului specificat de zile, contul corespunzator va fi automat șters.<br>Dacă valoare introdusă este \'0\' conturile utilizatorilor nu vor fi șterse niciodată.",
"local" => "local",
"remote" => "remote",
"ip_address" => "Adresă IP",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"popFieldsSbar_label" => "Câmpuri eveniment - fereastra laterală (tip hover)",
"popFieldsSbar_text" => "Câmpurile evenimentului care vor fi afișate într-o fereastră laterală tip hover pot fi specificate aici printr-o secvență de numere.<br>Dacă nu se specifică niciun câmp fereastra hover nu va mai fi afișată.",
"showLinkInSB_label" => "Afișare linkuri în zona de afișare laterală",
"showLinkInSB_text" => "Afișare URL-uri din descrierea evenimentului ca hyperlink în zona laterală a evenimentelor care urmează",
"sideBarDays_label" => "Zile de urmărit în zona de afișare laterală",
"sideBarDays_text" => "Numărul de zile de urmărit pentru evenimentele afișate în zona de afișare laterală.",

//login.php
"log_log_in" => "Autentificare",
"log_remember_me" => "Memorare utilizator",
"log_register" => "Înregistrare",
"log_change_my_data" => "Modificare date acces",
"log_save" => "Modifică",
"log_un_or_em" => "Nume utilizator sau email",
"log_un" => "Nume utilizator",
"log_em" => "Email",
"log_ph" => "Mobile phone number",
"log_answer" => "Your answer",
"log_pw" => "Parola",
"log_new_un" => "Nume utilizator nou",
"log_new_em" => "Adresă nouă de email",
"log_new_pw" => "Parola nouă",
"log_con_pw" => "Confirm Password",
"log_pw_msg" => "Aveți aici detaliile log pentru autentificare",
"log_pw_subject" => "parola dvs.",
"log_npw_subject" => "Noua dumneavoastră parolă",
"log_npw_sent" => "Noua parolă a fost trimisă",
"log_registered" => "Înregistrare corectă - Parola v-a fost deja trimisă prin email",
"log_em_problem_not_sent" => "Problemă email - parola dumneavoastră nu a putut să fie trimisă",
"log_em_problem_not_noti" => "Problemă email - nu se poate verifica administratorul",
"log_un_exists" => "Acest nume de utilizator există deja",
"log_em_exists" => "Această adresă de email există deja",
"log_un_invalid" => "Nume utilizator invalid (nr. minim de caractere - 2. Folosiți doar caracterele: A-Z, a-z, 0-9, and _-.) ",
"log_em_invalid" => "Adresă de email incorectă",
"log_ph_invalid" => "Invalid mobile phone number",
"log_sra_wrong" => "Incorrect answer to the question",
"log_sra_wrong_4x" => "You have answered incorrectly 4 times - try again in 30 minutes",
"log_un_em_invalid" => "Numele de utilizator / email incorecte",
"log_un_em_pw_invalid" => "Numele de utilizator / email sau parolă incorecte",
"log_pw_error" => "Passwords not matching",
"log_no_un_em" => "Introduceți numele sau adresa de email",
"log_no_un" => "Introduceți numele",
"log_no_em" => "Introduceți adresa de email",
"log_no_pw" => "Introduceți parola",
"log_no_rights" => "Autentificare eșuată: nu aveți drepturi de vizualizare - Contactați administratorul",
"log_send_new_pw" => "trimite parolă nouă",
"log_new_un_exists" => "Numele de utilizator introdus există deja",
"log_new_em_exists" => "Adresa introdusă există deja",
"log_ui_language" => "Limba pentru Interfața Utilizator",
"log_new_reg" => "Înregistrare utilizator nou",
"log_date_time" => "Data / ora",
"log_time_out" => "Timp expirat",

//categories.php
"cat_list" => "Lista categoriilor",
"cat_edit" => "Editare",
"cat_delete" => "Ștergere",
"cat_add_new" => "Adăugare categorie nouă",
"cat_add" => "Adăugare categorie",
"cat_edit_cat" => "Editare categorie",
"cat_sort" => "Sortare după nume",
"cat_cat_name" => "Denumire categorie",
"cat_symbol" => "Simbol",
"cat_symbol_repms" => "Categoria simbol (înlocuiește parantezele)",
"cat_symbol_eg" => "e.g. A, X, ♥, ⛛",
"cat_matrix_url_link" => "Link URL (afoșat în vederea matricială)",
"cat_seq_in_menu" => "Poziția în meniu",
"cat_cat_color" => "Culoare categorie",
"cat_text" => "Text",
"cat_background" => "Fundal",
"cat_select_color" => "Selecție culoare",
"cat_subcats" => "Sub-<br>categorii",
"cat_subcats_opt" => "Subcategorii (opțional)",
"cat_url" => "URL",
"cat_name" => "Nume",
"cat_save" => "Actualizare categorie",
"cat_added" => "Categorie adăugată",
"cat_updated" => "Categorie actualizată",
"cat_deleted" => "Categorie ștearsă",
"cat_not_added" => "Categoria nu a fost adăugată",
"cat_not_updated" => "Categoria nu a fost actualizată",
"cat_not_deleted" => "Categoria nu a fost ștearsă",
"cat_nr" => "#",
"cat_repeat" => "Cu repetare",
"cat_every_day" => "în fiecare zi",
"cat_every_week" => "în fiecare săptămână",
"cat_every_month" => "în fiecare lună",
"cat_every_year" => "în fiecare an",
"cat_overlap" => "Permisiune la<br>suprapunere<br>(gap)",
"cat_need_approval" => "Evenimentul necesită<br>aprobare",
"cat_no_overlap" => "Fără suprapuneri",
"cat_same_category" => "acceași categorie",
"cat_all_categories" => "toate categoriile",
"cat_gap" => "gap",
"cat_ol_error_text" => "Mesaj de eroare în caz de suprapunere",
"cat_no_ol_note" => "De menționat că evenimentele deja definite nu vor fi verificate pentru eventuale suprapuneri",
"cat_ol_error_msg" => "suprapunere eveniment - selectați altă oră",
"cat_no_ol_error_msg" => "Mesajul de suprapunere lipsește",
"cat_duration" => "Event<br>duration<br>!: fixed",
"cat_default" => "default (no end time)",
"cat_fixed" => "fixed",
"cat_event_duration" => "Event duration",
"cat_olgap_invalid" => "Invalid overlap gap",
"cat_duration_invalid" => "Invalid event duration",
"cat_no_url_name" => "Numele linkului URL lipsește",
"cat_invalid_url" => "Link URL invalid",
"cat_day_color" => "Culoare zi",
"cat_day_color1" => "Culoare zi (vedere anuală/matricilă)",
"cat_day_color2" => "Culoare zi (vedere lunară/săptămânală/zilnică)",
"cat_approve" => "Evenimentul necesită aprobare",
"cat_check_mark" => "Marcaj confirmare",
"cat_label" => "etichetă",
"cat_mark" => "marcaj",
"cat_name_missing" => "Numele categoriei lipsește",
"cat_mark_label_missing" => "Bifa/eticheta lipsește",

//users.php
"usr_list_of_users" => "Listă utilizatori",
"usr_name" => "Nume utilizator",
"usr_email" => "Email",
"usr_phone" => "Număr telefon mobil",
"usr_phone_br" => "Număr telefon<br>mobil",
"usr_number" => "Număr de utilizator",
"usr_number_br" => "Număr de<br>utilizator",
"usr_language" => "Language",
"usr_ui_language" => "User interface language",
"usr_group" => "Grupa",
"usr_password" => "Parola",
"usr_edit_user" => "Editare profil utilizator",
"usr_add" => "Adăugare utilizator",
"usr_edit" => "Editare",
"usr_delete" => "Ștergere",
"usr_login_0" => "Prima conectare",
"usr_login_1" => "Ultima conectare",
"usr_login_cnt" => "Conectări",
"usr_add_profile" => "Adăugare utilizator",
"usr_upd_profile" => "Actualizare profil",
"usr_if_changing_pw" => "Doar dacă se schimbă parola",
"usr_pw_not_updated" => "Parola nu a fost actualizată",
"usr_added" => "Utilizator adăugat",
"usr_updated" => "Profile utilizatori",
"usr_deleted" => "Utilizator șters",
"usr_not_deleted" => "Utilizatorul nu a fost șters",
"usr_cred_required" => "Numele utilizatorului, emailul și parola sînt necesare",
"usr_name_exists" => "Acest nume de utilizator există deja",
"usr_email_exists" => "Această adresă de email există deja",
"usr_un_invalid" => "Nume utilizator invalid (minim \'2\' caractere. Folosiți doar caracterele: A-Z, a-z, 0-9, and _-.) ",
"usr_em_invalid" => "Adresă de email invalidă",
"usr_ph_invalid" => "Număr de telefon invalid",
"usr_cant_delete_yourself" => "Nu vă puteți șterge propriul cont",
"usr_go_to_groups" => "Selecție grupuri",

//groups.php
"grp_list_of_groups" => "Listă grupuri",
"grp_name" => "Nume grup",
"grp_priv" => "Drepturi de acces",
"grp_categories" => "Categorii",
"grp_all_cats" => "toate categoriile",
"grp_rep_events" => "Evenimente repetitive",
"grp_m-d_events" => "Evenimente pe mai multe zile",
"grp_priv_events" => "Evenimente private",
"grp_upload_files" => "Încărcare<br>fișiere",
"grp_send_sms" => "Send<br>SMSes",
"grp_tnail_privs" => "Thumbnail<br>privileges",
"grp_priv0" => "Fără drepturi de acces",
"grp_priv1" => "Vizualizare calendar",
"grp_priv2" => "Postare/editare evenimente proprii",
"grp_priv3" => "Postare/editare toate evenimentele",
"grp_priv4" => "Postare/editare și aprobare",
"grp_priv9" => "Funcții administrare",
"grp_may_post_revents" => "Poate adăuga evenimente repetitive",
"grp_may_post_mevents" => "Poate adăuga evenimente pentru mai multe zile",
"grp_may_post_pevents" => "Poate adăuga evenimente private",
"grp_may_upload_files" => "Poate încărca fișiere",
"grp_may_send_sms" => "May send SMSes",
"grp_tn_privs" => "Thumbnails privileges",
"grp_tn_privs00" => "none",
"grp_tn_privs11" => "view all",
"grp_tn_privs20" => "manage own",
"grp_tn_privs21" => "m. own/v. all",
"grp_tn_privs22" => "manage all",
"grp_edit_group" => "Editare grup",
"grp_sub_to_rights" => "Subject to user rights",
"grp_view" => "Vedere",
"grp_add" => "Adăugare",
"grp_edit" => "Editare",
"grp_delete" => "Ștergere",
"grp_add_group" => "Adăugare grup",
"grp_upd_group" => "Actualizare grupuri",
"grp_added" => "Grup adăugat",
"grp_updated" => "Grup actualizat",
"grp_deleted" => "Grup șters",
"grp_not_deleted" => "Grupul nu a fost șters",
"grp_in_use" => "Grup activ, nu poate fi editat",
"grp_cred_required" => "E necesar definirea numelui de grup, drepturile de acces și categoriile asociate",
"grp_name_exists" => "Acest nume există deja",
"grp_name_invalid" => "Nume de grup invalid (minim \'2\' caractere. Folosiți doar caracterele: A-Z, a-z, 0-9, and _-.) ",
"grp_background" => "Culoare fundal",
"grp_select_color" => "Selectare culoare",
"grp_invalid_color" => "Format de culoare invalid (#XXXXXX - X = valoare HEXA)",
"grp_go_to_users" => "Selecție utilizatori",

//database.php
"mdb_dbm_functions" => "Funcții pentru Baza de date",
"mdb_noshow_tables" => "Tabelele (din bază) nu pot fi accesate",
"mdb_noshow_restore" => "Nu a fost selectat fișierul backup",
"mdb_file_not_sql" => "Fișierul de backup trebuie sa fie un fișier SQL (cu extensia '.sql')",
"mdb_compact" => "Compactare bază de date",
"mdb_compact_table" => "Compactare tabele",
"mdb_compact_error" => "Eroare",
"mdb_compact_done" => "Gata",
"mdb_purge_done" => "Evenimentele marcate pentru ștergere au fost eliminate definitiv",
"mdb_backup" => "Back-up Bază dedate",
"mdb_backup_table" => "Back-up tabel",
"mdb_backup_file" => "Backup file",
"mdb_backup_done" => "Gata",
"mdb_records" => "înregistrări",
"mdb_restore" => "Restaurare bază",
"mdb_restore_table" => "Restaurare tabelă",
"mdb_inserted" => "înregistrări adăugate",
"mdb_db_restored" => "Baza a fost restaurată.",
"mdb_no_bup_match" => "Fișierul backup selectat nu corespunde versiunii curente a calendarului.<br0>Baza de date nu a fost restaurată.",
"mdb_events" => "Evenimente",
"mdb_delete" => "ștegere",
"mdb_undelete" => "recuperare",
"mdb_between_dates" => "care apăr între",
"mdb_deleted" => "Evenimente șterse",
"mdb_undeleted" => "Evenimente recuperate",
"mdb_file_saved" => "Fișier de back-up salvat.",
"mdb_file_name" => "Nume fișier",
"mdb_start" => "Execută",
"mdb_no_function_checked" => "Nicio funcție selectată",
"mdb_write_error" => "Eroare salvare fișier de back-up. <br>Verificați drepturile de scriere pentru fișiere în folderul de back-up",

//import/export.php
"iex_file" => "Selecție Fișier",
"iex_file_name" => "Nume fișier destinație",
"iex_file_description" => "Descriere fișier iCal",
"iex_filters" => "Filtru evenimente",
"iex_export_usr" => "Export User Profiles",
"iex_import_usr" => "Import User Profiles",
"iex_upload_ics" => "Import fișier iCal",
"iex_create_ics" => "Creare fișier iCal",
"iex_tz_adjust" => "Ajustare fus orar",
"iex_upload_csv" => "Incărcare fișier CSV",
"iex_upload_file" => "Import fișier",
"iex_create_file" => "Creare fișier",
"iex_download_file" => "Descărcare fișier",
"iex_fields_sep_by" => "Câmpuri separate prin",
"iex_birthday_cat_id" => "ID categorie",
"iex_default_grp_id" => "Default user group ID",
"iex_default_cat_id" => "ID categorie implicită",
"iex_default_pword" => "Default password",
"iex_if_no_pw" => "If no password specified",
"iex_replace_users" => "Replace existing users",
"iex_if_no_grp" => "if no user group found",
"iex_if_no_cat" => "dacă nu este gasită nicio categorie",
"iex_import_events_from_date" => "Import evenimente definite până la",
"iex_no_events_from_date" => "Nu a fost găsit niciun eveniment la data specificată",
"iex_see_insert" => "vezi instrucțiunile în partea dreaptă",
"iex_no_file_name" => "Numele fișierului lipsește",
"iex_no_begin_tag" => "fișier iCal invalid (lipsește tag-ul BEGIN)",
"iex_bad_date" => "Dată eronată",
"iex_date_format" => "Format dată eveniment",
"iex_time_format" => "Format timp eveniment",
"iex_number_of_errors" => "Numărul erorilor din listă",
"iex_bgnd_highlighted" => "evidențiere fundal",
"iex_verify_event_list" => "Verificați Lista evenimentelor și faceți corecțiile necesare, apoi faceți clic",
"iex_add_events" => "Adaugare evenimente la Baza de Date",
"iex_verify_user_list" => "Verify User List, correct possible errors and click",
"iex_add_users" => "Add Users to Database",
"iex_select_ignore_birthday" => "Selectați opțiunile Ziua de naștere și Ștergere după nevoie",
"iex_select_ignore" => "Selectați opțiunea Ștergere pentru a ignora evenimentul",
"iex_check_all_ignore" => "Check all ignore boxes",
"iex_title" => "Denumire",
"iex_venue" => "Locație",
"iex_owner" => "Proprietar",
"iex_category" => "Categorie",
"iex_date" => "Data",
"iex_end_date" => "Data de sfârșit",
"iex_start_time" => "Ora de începere",
"iex_end_time" => "Ora de terminare",
"iex_description" => "Descriere",
"iex_repeat" => "Repetă",
"iex_birthday" => "data de naștere",
"iex_ignore" => "Ștergere",
"iex_events_added" => "evenimente adăugate",
"iex_events_dropped" => "eveniment ignorat (există deja)",
"iex_users_added" => "users added",
"iex_users_deleted" => "users deleted",
"iex_csv_file_error_on_line" => "eroare în fișierul CSS la linia",
"iex_between_dates" => "Apare în intervalul",
"iex_changed_between" => "Adăugat/modificat între",
"iex_select_date" => "Selecție dată",
"iex_select_start_date" => "Selecție dată de început",
"iex_select_end_date" => "Selecție dată de sfârșit",
"iex_group" => "User group",
"iex_name" => "User name",
"iex_email" => "Email address",
"iex_phone" => "Phone number",
"iex_lang" => "Language",
"iex_pword" => "Password",
"iex_all_groups" => "all groups",
"iex_all_cats" => "toate categoriile",
"iex_all_users" => "toți utilizatorilor",
"iex_no_events_found" => "Niciun eveniment găsit",
"iex_file_created" => "Fișier creat",
"iex_write error" => "Eroare salvare fișier export. <br>Verificați drepturile de scriere pentru fișiere în folderul selectat",
"iex_invalid" => "invalid",
"iex_in_use" => "already in use",

//styling.php
"sty_css_intro" =>  "vaorile specificate în această pagină trebuie să fie conforme standardelor CSS",
"sty_preview_theme" => "Previzualizare temă",
"sty_preview_theme_title" => "Previzualizarea temei selectate în calendar",
"sty_stop_preview" => "Oprire previzualizare",
"sty_stop_preview_title" => "Oprirea afișării temei selectate în calendar",
"sty_save_theme" => "Salvare temă",
"sty_save_theme_title" => "Salvarea temei selectate în baza de date",
"sty_backup_theme" => "Backup temă",
"sty_backup_theme_title" => "Backup-ul temei din bază într-un fișier",
"sty_restore_theme" => "Resturare temă",
"sty_restore_theme_title" => "Restaurarea temei din fișier",
"sty_default_luxcal" => "tema implicită LuxCal",
"sty_close_window" => "Închidere fereastră",
"sty_close_window_title" => "Se închide fereastr curentă",
"sty_theme_title" => "Titlu temă",
"sty_general" => "Generalități",
"sty_grid_views" => "Grilă / Vederi",
"sty_hover_boxes" => "Boxuri tip Hover",
"sty_bgtx_colors" => "Culoare Background/text",
"sty_bord_colors" => "Culoare Border",
"sty_fontfam_sizes" => "Tipuri Font/dimensiuni",
"sty_font_sizes" => "Dimensiuni fonturi",
"sty_miscel" => "Diverse",
"sty_background" => "Background",
"sty_text" => "Text",
"sty_color" => "Culoare",
"sty_example" => "Exemple",
"sty_theme_previewed" => "Mod previzualizare - puteți verifica tema direct în calendar. Folosiți butonul Stop Previzualizare când ați terminat.",
"sty_theme_saved" => "Temă salvate în baza de date",
"sty_theme_backedup" => "Temă salvată din bază într-un fișier:",
"sty_theme_restored1" => "Temă restaurată din:",
"sty_theme_restored2" => "Press Save Theme to save the theme to the database",
"sty_unsaved_changes" => "ATENȚIE – Aveți modificări nesalvate!\\nDacă închideți această fereastră toate modificările efectuate vor fi pierdute.", //don't remove '\\n'
"sty_number_of_errors" => "Numărul de erori din listă",
"sty_bgnd_highlighted" => "evidențiere background",
"sty_XXXX" => "general calendar",
"sty_TBAR" => "top bar calendar",
"sty_BHAR" => "bare, headere și reguli",
"sty_BUTS" => "butoane",
"sty_DROP" => "meniuri drop-down",
"sty_XWIN" => "ferestre popup",
"sty_INBX" => "inserare boxuri",
"sty_OVBX" => "boxuri supraimprimate",
"sty_BUTH" => "butoane - tip hover",
"sty_FFLD" => "forma câmpuri",
"sty_CONF" => "mesaj de confirmare",
"sty_WARN" => "mesaj de atenționare",
"sty_ERRO" => "mesaj de eroare",
"sty_HLIT" => "text evidențiat",
"sty_FXXX" => "font implicit",
"sty_SXXX" => "dimensiune implicită font",
"sty_PGTL" => "titluri pagină",
"sty_THDL" => "header tabele L",
"sty_THDM" => "header tabele M",
"sty_DTHD" => "header date",
"sty_SNHD" => "header secțiune",
"sty_PWIN" => "ferestre popup",
"sty_SMAL" => "text mic",
"sty_GCTH" => "hover - celulă zilnică",
"sty_GTFD" => "header celulă - prima zi din lună",
"sty_GWTC" => "coloană nr. săptămână / timp",
"sty_GWD1" => "prima zi din săptămână luna 1",
"sty_GWD2" => "prima zi din săptămână luna 2",
"sty_GWE1" => "weekend luna 1",
"sty_GWE2" => "weekend luna 2",
"sty_GOUT" => "luna adiacentă",
"sty_GTOD" => "celula zilei curente",
"sty_GSEL" => "celula zilei selectate",
"sty_LINK" => "URL and email links",
"sty_CHBX" => "box eveniment de văzut",
"sty_EVTI" => "titlu eveniment în vederi",
"sty_HNOR" => "eveniment normal",
"sty_HPRI" => "eveniment privat",
"sty_HREP" => "eveniment repetitiv",
"sty_POPU" => "box popup hover",
"sty_TbSw" => "umbră top bar (0:nu 1:da)",
"sty_CtOf" => "ofset conținut",

//lcalcron.php
"cro_sum_header" => "SUMAR CRON JOB",
"cro_sum_trailer" => "SFÂRȘIT SUMAR",
"cro_sum_title_eve" => "EVENIMENTE EXPIRATE",
"cro_nr_evts_deleted" => "Numărul evenimentelor șterse",
"cro_sum_title_eml" => "EMAIL DE NOTIFICARE",
"cro_sum_title_sms" => "SMS DE NOTIFICARE",
"cro_not_sent_to" => "Notificare trimisă la",
"cro_no_reminders_due" => "Nicio notificare",
"cro_subject" => "Subiect",
"cro_event_due_in" => "Eveniment scadent la",
"cro_event_due_today" => "Pentru astăzi",
"cro_due_in" => "Scadent în",
"cro_due_today" => "Astăzi",
"cro_days" => "zi(zile)",
"cro_date_time" => "Dată / oră",
"cro_title" => "Denumire",
"cro_venue" => "Locație",
"cro_description" => "Descriere",
"cro_category" => "Categorie",
"cro_status" => "Aprobat",
"cro_sum_title_chg" => "MODIFICĂRI ÎN CALENDAR",
"cro_nr_changes_last" => "Numărul ultimelor modificări",
"cro_report_sent_to" => "Raport trimis la",
"cro_no_report_sent" => "Nu a fost trimis niciun raport",
"cro_sum_title_use" => "VERIFICARE CONT UTILIZATOR",
"cro_nr_accounts_deleted" => "Numărul de conturi șterse",
"cro_no_accounts_deleted" => "Niciun cont șters",
"cro_sum_title_ice" => "EVENIMENTE EXPORTATE",
"cro_nr_events_exported" => "Numărul de evenimente exportate în formatul iCalendar",

//messaging.php
"mes_no_msg_no_recip" => "Not sent, no recipients found",

//explanations
"xpl_manage_db" =>
"<h3>Instrucțiuni de Lucru cu Baza de Date</h3>
<p>În aceast formular pot fi selectate și folosite următoarele funcții:</p>
<h6>Compactare Bază de date</h6>
<p>Când un utilizator șterge un eveniment, evenimentul este marcat ca 'șters', fără a fi eliminat efectiv din bază.
Utilizarea funcției 'Compactare Bază de Date' permite ștergerea permanentă a evenimentelor marcate, cu eliberarea spațiul ocupat de acestea.</p>
<h6>Back-up Bază de date</h6>
<p>Această funcție crează un back-up al întregii baze de date (structură tabele și conținut) în formatul .sql.
Fișierul de back-up este salvat în directorul <strong>files/</strong> în server, numele fișierului fiind de forma: 
<kbd>dump-cal-lcv-yyyymmdd-hhmmss.sql</kbd> (unde 'cal' = calendar ID, 'lcv' = calendar version iar 'yyyymmdd-hhmmss' reprezintă anul, luna, ziua, ore, minute, secunde).</p>
<p>Acest fișier de back-up permite refacerea bazei de date în cazul unui accident 
(pierderea bazei de date), prin intermediul funcției de restaurare descrisă mai jos sau prin intermediul utilitarului <strong>phpMyAdmin</strong>, oferit de cele mai multe servere web.</p>
<h6>Restaurare bază de date</h6>
<p>Această funcție va restaura baza de date a calendarului folosind înregistrările din fișierul indicat (fișier tip .sql).</p>
<p>Când se restaurează baza de date TOATE DATELE CURENTE VOR FI ȘTERSE!</p>

<h6>Evenimente</h6>
<p>Această funcție va șterge sau va recupera evenimentele care apar în intervalul specificat. Dacă nu se specifică nicio dată înseamnă că nu există nicio limită de timp, astfel încât, dacă ambele câmpuri, cel de început și cel de sfârșit, sunt necompletate, TOATE EVENIMENTELE VOR FI ȘTERSE!</p>
<p><b>IMPORTANT</b>: Când baza este compactată (vezi mai sus), toate evenimentele marcate pentru ștergere vor fi eliminate definitiv, fără nicio posibilitate de recuperare (doar eventual prin restaurarea unui backup anterior)!</p>",

"xpl_import_csv" =>
"<h3>Instrucțiuni pentru Import CSV</h3>
<p>Acest formular permite importul de text formatat <strong>CVS (Comma Separated Values)</strong> pentru introducerea de evenimente în Calendar.</p>
<p>Ordinea coloanelor în fișierul CSV trebuie să fie: denumire, locație, ID categorie (vezi mai jos), data, data finală, ora de început și de sfârșit precum și descrierea evenimentului. Prima linie din fișierul CSV, (capul de tabel), este ignorată.</p>
<h6>Model Fișier CSV</h6>
<p>Un model de fișier CVS (fișier cu extensia .cvs) poate fi găsit în folderul '<strong>files/</strong>' al distribuției LuxCal.</p>
<h6>Separator câmp</h6>
Separatorul de câmp poate fi orice caracter, spre exemplu o virgulă sau caracterul punct și virgulăsau chiar caracterul tab: '\\t'). Separatorul de câmp trebuie să fie unic și nu trebuie să apară în text/datele din câmp.
<h6>Formatul pentru dată și oră</h6>
<p>Formatul selectat pentru dată și oră trebuie să corespundă formatului folosit în fișierul CVS importat.</p>
<h6>Tabelul Categoriilor</h6>
<p>Calendarul utilizează numere (ID-uri) pentru specificarea categoriilor. ID-urile categoriilor din fișierul CVS trebuie să corespundă cu cele definite în calendar sau pot fi nule.</p>
<p>Spre exemplu, dacă doriți ca toate evenimentele să fie marcate ca 'important', ID-ul <strong>IMPORTANT</strong> trebuie să fie definit conform ID-ului din listă.</p>
<p class='hired'>Atenție: Nu importați mai mult de 100 de evenimente odată!</p>
<p>Pentru calendarul dumneavoastră, pînă acum, au fost definite următoarele categorii:</p>",

"xpl_import_user" =>
"<h3>User Profile Import Instructions</h3>
<p>This form is used to import a CSV (Comma Separated Values) text file containing 
user profile data into the LuxCal Calendar.</p>
<p>For the proper handling of special characters, the CSV file must be UTF-8 encoded.</p>
<h6>Field separator</h6>
<p>The field separator can be any character, for instance a comma, semi-colon, etc.
The field separator character must be unique 
and may not be part of the text in the fields.</p>
<h6>Default user group ID</h6>
<p>If in the CSV file a user group ID has been left blank, the specified default 
user group ID will be taken.</p>
<h6>Default password</h6>
<p>If in the CSV file a user password has been left blank, the specified default 
password will be taken.</p>
<h6>Replace existing users</h6>
<p>If the replace existing users check-box has been checked, all existing users, 
except the public user and the administrator, will be deleted before importing the 
user profiles.</p>
<br>
<h6>Sample User Profile files</h6>
<p>Sample User profile CSV files (.csv) can be found in the 'files/' folder of 
your LuxCal installation.</p>
<h6>Fields in the CSV file</h6>
<p>The order of columns must be as listed below. If the first row of the CSV file 
contains column headers, it will be ignored.</p>
<ul>
<li>User group ID: should correspond to the user groups used in your calendar (see 
table below). If blank, the user will be put in the specified default user group</li>
<li>User name: mandatory</li>
<li>Email address: mandatory</li>
<li>Mobile phone number: optional</li>
<li>Interface language: optional. E.g. English, Dansk. If blank, the default 
language selected on the Settings page will be taken.</li>
<li>Password: optional. If blank, the specified default password will be taken.</li>
</ul>
<p>Blank fields should be indicated by two quotes. Blank fields at the end of each 
row may be left out.</p>
<p class='hired'>Warning: Do not import more than 60 user profiles at a time!</p>
<h6>Table of User Group IDs</h6>
<p>For your calendar, the following user groups have currently been defined:</p>",

"xpl_export_user" =>
"<h3>User Profile Export Instructions</h3>
<p>This form is used to extract and export <strong>User Profiles</strong> from 
the LuxCal Calendar.</p>
<p>Files will be created in the 'files/' directory on the server with the 
specified filename and in the Comma Separated Value (.csv) format.</p>
<h6>Destination file name</h6>
If not specified, the default filename will be 
the calendar name followed by the suffix '_users'. The filename extension will 
be automatically set to <b>.csv</b>.</p>
<h6>User Group</h6>
Only the user profiles of the selected user group will be 
exported. If 'all groups' is selected, the user profiles in the destination file 
will be sorted on user group</p>
<h6>Field separator</h6>
<p>The field separator can be any character, for instance a comma, semi-colon, etc.
The field separator character must be unique 
and may not be part of the text in the fields.</p><br>
<p>Existing files in the 'files/' directory on the server with the same name will 
be overwritten by the new file.</p>
<p>The order of columns in the destination file will be: group ID, user name, 
email address, mobile phone number, interface language and password.<br>
<b>Note:</b> Passwords in the exported user profiles are encoded and cannot be 
decoded.</p><br>
<p>When <b>downloading</b> the exported .csv file, the current date and time will 
be added to the name of the downloaded file.</p><br>
<h6>Sample User Profile files</h6>
<p>Sample User Profile files (file extension .csv) can be found in the 'files/' 
directory of your LuxCal download.</p>",

"xpl_import_ical" =>
"<h3>Instrucțiuni pentru Import iCalendar </h3>
<p>Acest formular permite importul fișierelor de tipul <strong>iCalendar</strong> pentru introducerea de evenimente in Calendarul LuxCal.</p>
<p>Fișierul trebuie să respecte specificațiile prevăzute în standardul [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>RFC5545</a></u>] al Internet Engineering Task Force.</p>
<p>Vor fi importate doar evenimentele importante; toate celelalte componente iCal components, ca: 'De Făcut', 'Jurnal', 'Liber / 
Ocupat', 'Fus Orar' și 'Alarme' vor fi ignorate.</p>
<h6>Model de fișier iCal</h6>
<p>Un exemplu de fișier iCalendar (fișier cu extensia .ics) poate fi găsit în folderul '<strong>files/</strong>' al distribuției LuxCal.</p>
<h6>Ajustări fus orar</h6>
<p>Dacă fișierul iCalendar conține evenimente definite după un alt fus orar va trebui să folosiți această opțiune pentru ajustarea orelor asociate eveniumentelor.</p>
<h6>Tabelul Categoriilor</h6>
<p>Calendarul utilizează numere (ID-uri) pentru specificarea categoriilor. ID-urile categoriilor din fișierul iCalendar trebuie să corespundă cu cele definite în calendar sau pot fi nule.</p>
<p class='hired'>Atenție: Nu importați mai mult de 100 de evenimente odată!</p>
<p>Pentru calendarul dumneavoastră, pînă acum, au fost definite următoarele categorii:</p>",

"xpl_export_ical" =>
"<h3>Exportul fișierelor iCalendar</h3>
<p>Acest formular permite exportul evenimentelor din calendar în formatul <strong>iCalendar</strong>.</p>
<p>Numele fișierului <b>iCal nume fișier</b> (fără extensie) este opțional. Fișierul creat va fi 
salvat în directorul \"files/\" în server cu numele specificat, sau, dacă nu, cu numele 
implicit al calendarului. Extensia fișierului va fi <b>.ics</b>.
Dacă în folderul \"files/\" există deja un fișier cu ecest nume, acesta va fi suprascris.</p>
<p>Opțional se poate adăuga și o descriere sumară a fișierului (ex. 'Activități 2013') care va apare în head-erul fișierului iCal exportat.</p>
<p><b>Filtru</b>: Evenimentele exportate pot fi filtrate după:</p>
<ul>
<li>proprietar eveniment</li>
<li>categorie</li>
<li>data de început</li>
<li>data adăugării/modificării</li>
</ul>
<p>Fiecare filtru este opțional, lipsa filtrului însemnînd că vor fi exportate toate evenimentele</p>
<br>
<p>Fișierul exportat respectă specificațiile prevăzute în standardul [<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545</a></u>] al Internet Engineering Task Force</p>
<p>Când se descarcă fișierul iCal exportat, la numele acestuia va fi adăugat în mod automat data și ora..</p>
<h6>Exemplu de fișier iCal</h6>
<p>Un exemplu de fișier iCalendar (fișier cu extensia .ics) poate fi găsit în folderul '<strong>files/</strong>' al distribuției LuxCal.</p>"
);
?>
