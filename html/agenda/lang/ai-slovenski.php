<?php
/*
= LuxCal admin interface language file =

This file has been produced by LuxSoft and has been translated by David.

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","4.7.8");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Brez",
"no" => "ne",
"yes" => "da",
"own" => "own",
"all" => "Vse",
"or" => "ali",
"back" => "Nazaj",
"ahead" => "Ahead",
"close" => "Zapri",
"always" => "vedno",
"at_time" => "@", //date and time separator (e.g. 30-01-2020 @ 10:45)
"times" => "times",
"cat_seq_nr" => "category sequence nr",
"rows" => "rows",
"columns" => "columns",
"hours" => "hours",
"minutes" => "minute",
"user_group" => "user group",
"event_cat" => "kategorije dogodka",
"id" => "ID",
"username" => "Uporabniško ime",
"password" => "Geslo",
"public" => "Public",
"logged_in" => "Prijavljen",
"logged_in_l" => "prijavljen",

//settings.php - fieldset headers + general
"set_general_settings" => "Splošne nastavitve",
"set_navbar_settings" => "Navigacijska vrstica",
"set_event_settings" => "Dogodki",
"set_user_settings" => "Uporabniški računi",
"set_upload_settings" => "File Uploads",
"set_reminder_settings" => "Reminders",
"set_perfun_settings" => "Periodic Functions<br>(only relevant if cron job defined)",
"set_sidebar_settings" => "Stand-Alone Sidebar<br>(only relevant if in use)",
"set_view_settings" => "Pogledi",
"set_dt_settings" => "Datumi / časi",
"set_save_settings" => "Shrani nastavitve",
"set_test_mail" => "Test Mail",
"set_mail_sent_to" => "Test mail sent to",
"set_mail_sent_from" => "This test mail was sent from your calendar's Settings page",
"set_mail_failed" => "Sending test mail failed - recipient(s)",
"set_missing_invalid" => "mankajoče ali neveljanvne nastavitve (background highlighted)",
"set_settings_saved" => "Nastavitve koledarja shranjene",
"set_save_error" => "Napaka v podatkovni bazi- nastavitve koledarja niso shranjene",
"hover_for_details" => "Za več informacij pojdite z miško nad element",
"default" => "privzeto",
"enabled" => "vključeno",
"disabled" => "izključeno",
"pixels" => "slikovnih pik",
"warnings" => "Warnings",
"notices" => "Notices",
"visitors" => "Visitors",
"no_way" => "Nimate pooblastil za izvedbo tega dejanja!",

//settings.php - general settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"versions_label" => "Versions",
"versions_text" => "• calendar version, followed by the database in use<br>• PHP version<br>• database version",
"calTitle_label" => "Naslov koledarja.",
"calTitle_text" => "Prikazan v zgornji vrstici pri koledarju in uporabljen v email obveščanjih.",
"calUrl_label" => "URL koledarja",
"calUrl_text" => "Spletna stran koledarja",
"calEmail_label" => "Spletna pošta koledarja",
"calEmail_text" => "The email address used to receive contact messages and to send or receive notification emails.<br>Format: \'email\' or \'ime &#8826;email&#8827;\'.",
"logoPath_label" => "Path/name of logo image",
"logoPath_text" => "If specified, a logo image will be displayed in the left upper corner of the calendar. If also a link to a parent page is specified (see below), then the logo will be a hyper-link to the parent page. The logo image should have a maximum height and width of 70 pixels.",
"backLinkUrl_label" => "Povezava do starševske strani",
"backLinkUrl_text" => "URL do starševske strani. Ob navedni se bo prikazal na levi strani navigacijske vrstice gumb za nazaj, kateri je povezan na ta URL.<br>Na primer, za povezavo nazaj do starševske strani, s katere je bil koledar začet. If a logo path/name has been specified (see above), then no Back button will be displayed, but the logo will become the back link instead.",
"timeZone_label" => "Časovni pas",
"timeZone_text" => "Koledarjev časovni pas, uporabljen za izračun trenutnega časa.",
"see" => "poglej",
"notifChange_label" => "Send notification of calendar changes",
"notifChange_text" => "When a user adds, edits or deletes an event, a notification message will be sent to the specified recipients.",
"chgRecipList" => "Recipient list",
"maxXsWidth_label" => "Max. width of small screens",
"maxXsWidth_text" => "For displays with a width smaller than the specified number of pixels, the calendar will run in a special responsive mode, leaving out certain less important elements.",
"rssFeed_label" => "RSS povezave",
"rssFeed_text" => "Če je vključeno: Za uporabnike z namanj \'view\' pravicami, bojo RSS povezave vidne v nogi koledarja in RSS povezava bo dodana v HTML glavo koledarjevih strani.",
"logging_label" => "Log calendar data",
"logging_text" => "The calendar can log error, warning and notice messages and visitors data. Error messages are always logged. Logging of warning and notice messages and visitors data can each be disabled or enabled by checking the relevant check boxes. All error, warning and notice messages are logged in the file \'logs/luxcal.log\' and visitors data are logged in the files \'logs/hitlog.log\' and \'logs/botlog.log\'.<br>Note: PHP error, warning and notice messages are logged at a different location, determined by your ISP.",
"maintMode_label" => "Maintenance mode",
"maintMode_text" => "When enabled, the calendar will run in maintenance mode, which means that useful maintenance information will be shown in the calendar footer bar.",
"reciplist" => "The recipient list can contain user names, email addresses, phone numbers and names of files with recipients (enclosed by square brackets), separated by semicolons. Files with recipients with one recipient per line should be located in the folder \'reciplists\'. When omitted, the default file extension is .txt",
"calendar" => "koledar",
"user" => "uporabnik",
"database" => "database",

//settings.php - navigation bar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"contact_label" => "Contact button",
"contact_text" => "If enabled: A Contact button will be displayed in the side menu. Clicking this button will open a contact form, which can be used to send a message to the calendar administrator.",
"optionsPanel_label" => "Možnosi oznaka",
"optionsPanel_text" => "Vključi/izključi menije v kontrolni plošči.<br>• The calendar menu is available to the admin to switch calendars. (enabling only useful if several calendars are installed)<br>• The view menu can be used to select one of the calendar views.<br>• The groups menu can be used to display only events created by users in the selected groups.<br>• Uporabniški filter je lahko uporabljen za prikazovanje samo tistih dogodkov, ki so narejeni od enega specifičnega uporabnika.<br>• Filter za kategorije je lahko uporabljen za prikazovanje samo tistih dogodkov, ki spadajo v specifično kategorijo<br>• Meni za izbiranje jezika je lahko uporabljen za izbiranje jezika za uporabniški vmesnik.(Vključenje te možnosti je samo takrat koristno, ko je nameščenih več jezikov).<br>Note: If no menus are selected, the option panel button will not be displayed.",
"calMenu_label" => "calendar",
"viewMenu_label" => "view",
"groupMenu_label" => "groups",
"userMenu_label" => "Uporabniški filter",
"catMenu_label" => "Filter za kategorije",
"langMenu_label" => "Izbira jezika",
"availViews_label" => "Available calendar views",
"availViews_text" => "Calendar views available to publc and logged-in users specified by means of a comma-separated list with view numbers. Meaning of the numbers:<br>1: year view<br>2: month view (7 days)<br>3: work month view<br>4: week view (7 days)<br>5: work week view<br>6: day view<br>7: upcoming events view<br>8: changes view<br>9: matrix view (categories)<br>10: matrix view (users)<br>11: gantt chart view",
"viewButtons_label" => "View buttons on navigation bar",
"viewButtons_text" => "View buttons on the navigation bar for public and logged-in users, specified by means of a comma-separated list of view numbers.<br>If a number is specified in the sequence, the corresponding button will be displayed. If no numbers are specified, no View buttons will be displayed.<br>Meaning of the numbers:<br>1: Year<br>2: Full Month<br>3: Work Month<br>4: Full Week<br>5: Work Week<br>6: Day<br>7: Upcoming<br>8: Changes<br>9: Matrix-C<br>10: Matrix-U<br>11: Gantt Chart<br>The order of the numbers determine the order of the displayed buttons.<br>For example: \'24\' means: display \'Full Month\' and \'Full Week\' buttons.",
"defaultViewL_label" => "Privzeti pogled ob zagonu (large display)",
"defaultViewL_text" => "Default calendar view on startup for public and logged-in users using large displays). <br>Priporočena izbira: Mesec",
"defaultViewS_label" => "Privzeti pogled ob zagonu (small display)",
"defaultViewS_text" => "Default calendar view on startup for public and logged-in users using small displays). <br>Priporočena izbira: Prihajajoči",
"language_label" => "Privzeti jezik uporabniškega vmesnika",
"language_text" => "Datoteke ui-{language}.php, ai-{language}.php, ug-{language}.php in ug-layout.png morajo biti prisotne v lang/ mapi. {language} = izbran jezik uporabniškega vmesnika. Imena datotek morajo biti zapisane z malimi črkami!",

//settings.php - events settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"privEvents_label" => "Pisanje osebnih dogodkov",
"privEvents_text" => "Osebni dogodki so vidni samo uporabniku, ki je vnesel dogodek.<br>Vključeno: uporabniki lahko izbirajo zasebne dogodke.<br>Privzeto: ob dodajanju novih dogodkov, bo po privzetem \'private\' izbirno polje v oknu dogodkov izbrano.<br>Vedno: ob dodajnaju novih dogodkov bodo vedno zasebni, \'private\' izbirno polje v oknu dogodkov ne bo prikazano.",
"aldDefault_label" => "New events all-day by default",
"aldDefault_text" => "When adding events, in the Event window the \'All day\' checkbox will be checked by default. In addition, if no start time is specified the event automatically becomes an all-day event.",
"details4All_label" => "Pokaži podrobnosti o dogodkih",
"details4All_text" => "Izključeno: podrobnosti dogodka bodo samo prikazane lastnikom dogodka in uporabnikom z \'post all\' pravicami.<br>Vključeno: podrobnosti dogodka bodo vidne lastniku dogodka in vsem drugim uporabnikom.<br>Prijavljen: podrobnosti dogodka bodo vidne lastniku dogodka in prijavljenim uporabnikom.",
"evtDelButton_label" => "Prikaži gumb za izbris v oknu dogodkov",
"evtDelButton_text" => "Izključeno: gumb za izbris ne bo viden v oknu dogodkov. Zato uporabniki s pravicami za spreminjanje ne bodo mogli brisati dogodkov.<br>Vključeno:  gumb za izbris v okdnu dogodkov bo viden vsem uporabnikom.<br>Upravitelj: gumb za izbris v oknu dogodkov bo viden samo uporabikom z \'manager\' pravicami.",
"eventColor_label" => "Dogodki osnovani na barvah",
"eventColor_text" => "Dogodki v različnih koledarskih pogledih so lahko prikazani z barvami, ki jih je dodelil ustvarjatelj dogodka ali barvo kategorije dogodka.",
"defVenue_label" => "Default Venue",
"defVenue_text" => "In this text field a venue can be specified which will be copied to the Venue field of the event form when adding new events.",
"xField1_label" => "Dodatno polje 1",
"xField2_label" => "Dodatno polje 2",
"xFieldx_text" => "Optional text field. If this field is included in an event template in the Views section, the field will be added as a free format text field to the Event window form and to the events displayed in all calendar views and pages.<br>• oznako: optional text label for the extra field (max. 15 characters). E.g. \'Email address\', \'Website\', \'Phone number\'<br>• Minimum user rights: the field will only be visible to users with the selected user rights or higher.",
"xField_label" => "Oznako",
"min_rights" => "Minimum user rights",
"no_color" => 'no color',
"manager_only" => 'upravnik',

//settings.php - user accounts settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Registriranje sebe",
"selfReg_text" => "Omogoča uporabnikom, da se registrirajo sami, za dostop do koledarja.<br>User group to which self-registered users will be assigned.",
"selfRegQA_label" => "Self registration question/answer",
"selfRegQA_text" => "When self registration is enabled, during the self-registration process the user will be asked this question and will only be able to self-register if the correct answer is given. When the question field is left blank, no question will be asked.",
"selfRegNot_label" => "Obvestilo ob registriranju samega sebe",
"selfRegNot_text" => "Pošlje obveščevalno pošto na koledarjev email, če je registracija samega sebe pri uporabniku izvedena",
"restLastSel_label" => "Obnovi izbire zadnjega uporabnika",
"restLastSel_text" => "Seja zadnjega uporabnika (plošča nastavitev možnosti) bo shranjena in ko se uporabnik kaasneje vrne k koledarju, bodo nastavitve povrnjene.",
"cookieExp_label" => "'Zapomni se me' število dni preden poteče piškotek",
"cookieExp_text" => "število dni preden poteče piškotek ki je nastavljen pri \'Zapomni se me\' možnosti (možnost med vpisom).",
"answer" => "answer",
"view" => "pogled",
"post_own" => 'objavljaj/spreminjaj svoje',
"post_all" => 'objavljaj/spreminjajo vse',
"manager" => 'objavljaj/upravitelj',

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"templFields_text" => "Pomen števil:<br>1: Polje kraja<br>2: Kategorija dogodka field<br>3: Polje opisa<br>4: Dodatno polje 1 (poglej spodaj)<br>5: Dodatno polje 2 (poglej spodaj)<br>6: Podatki opominjanja spletne pošte (samo če je bilo opomnenje zahtevanoo)<br>7: Datum/čas dodano/spremenjeno in povezan(i) uporabnik(i)<br>8: Attached pdf, image or video files as hyperlinks.<br>Zaporedje števil določa zaporedje zaporedje prikazanih polj.",
"evtTemplate_label" => "Predloge dogodka",
"evtTemplate_text" => "The event fields to be displayed in the general calendar views, the upcoming event views and in the hover box with event details can be specified by means of a sequence of numbers.<br>If a number is specified in the sequence, the corresponding field will be displayed.",
"evtTemplGen" => "Splošni pogledi",
"evtTemplUpc" => "Prihajajoči pogled",
"evtTemplPop" => "Polja lebdečega okna",
"sortEvents_label" => "Sort events on times or category",
"sortEvents_text" => "In the various views events can be sorted on the following criteria:<br>• event times<br>• event category sequence number",
"yearStart_label" => "Začni mesec v letnem pogledu",
"yearStart_text" => "Če je bil začeten mesec določen (1-12), se bo koledar v letnem pogledu zmeraj začel s tem mesecem in leto tega prvega meseca se bo samo spremenilo ob prvem dnevu istega meseca v drugem letu.<br>Vrednost 0 ima poseben pomen: začetni mesec je osnovan na trenutnem datumu in bo padel v prvo vrstico mesecev.",
"YvRowsColumns_label" => "Vrstice in stolpci za prikaz v letnem pogledu",
"YvRowsColumns_text" => "Število vrstic od štirih mesecev, vsak za prikaz v letnem pogledu.<br>Priporočena izbira: 4, kar vam da 16 mesecev.<br>Število mesecev za prikaz v vsaki vrstici v letnem pogledu<br>Priporočena izbira: 3 ali 4.",
"MvWeeksToShow_label" => "Število tednov za prikaz v mesečnem pogledu",
"MvWeeksToShow_text" => "Število tednov za prikaz v mesečnem pogledu.<br>Priporočena izbira: 10, kar vam da 2.5 meseca za premikanje čez.<br>Vrednost 0 in 1 imata posebni pomen:<br>0: prikaži točno 1 mesec - prazni vodilni in sledeči dnevi.<br>1: prikaži točno 1 mesec - prikaži dogodke na vodilne in sledeče dneve.",
"XvWeeksToShow_label" => "Weeks to show in Matrix view",
"XvWeeksToShow_text" => "Number of calendar weeks to display in Matrix view.",
"GvWeeksToShow_label" => "Weeks to show in Gantt chart view",
"GvWeeksToShow_text" => "Number of calendar weeks to display in Gantt Chart view.",
"workWeekDays_label" => "Dnevi v delovnem tednu",
"workWeekDays_text" => "Days colored as working days in the calendar views and for instance to be shown in the weeks in Work Month view and Work Week view.<br>Enter the number of each working day.<br>e.g. 12345: Monday - Friday<br>Not entered days are considered to be weekend days.",
"weekStart_label" => "Prvi dan v tednu",
"weekStart_text" => "Enter the day number of the first day of the week.",
"lookBackAhead_label" => "Dnevi za vpogled naprej",
"lookBackAhead_text" => "Število dni za vpogled naprej za dogodke v pogledu Prihajajoči dogodki,Todo spisku, in RSS pretoka.",
"dwStartEndHour_label" => "Start and end hour in Day/Week view",
"dwStartEndHour_text" => "Hours at which a normal day of events starts and ends.<br>E.g. setting these values to 6 and 18 will avoid wasting space in Week/Day view for the quiet time between midnight and 6:00 and 18:00 and midnight.<br>The time picker, used to enter a time, will also start and end at these hours.",
"dwTimeSlot_label" => "Okno časa v pogledu dan/tedeni",
"dwTimeSlot_text" => "Število minut za okno časa v pogledu dan/teden.<br>Ta vrednost bo skupaj z začetno uro in knočno uro (poglej navzgor) določala število vrstic v pogledu dan/teden.",
"dwTsHeight_label" => "Višina okna časa",
"dwTsHeight_text" => "Število slikovnih pik za časovno okno v pogledu dan/teden.",
"evtHeadX_label" => "Event layout in Month, Week and Day view",
"evtHeadX_text" => "Templates with placeholders of event fields that should be displayed. The following placeholders can be used:<br>#ts - start time<br>#tx - start and end time<br>#e - event title<br>#o - event owner<br>#v - venue<br>#lv - venue with label \'Venue:\' in front<br>#c - category<br>#lc - category with label \'Category:\' in front<br>#a - age (see note below)<br>#x1 - extra field 1<br>#lx1 - extra field 1 with label from Settings page in front<br>#x2 - extra field 2<br>#lx2 - extra field 2 with label from Settings page in front<br>#/ - new line<br>The fields are displayed in the specified order. Characters other than the placeholders will remain unchanged and will be part of the displayed event.<br>HTML-tags are allowed in the template. E.g. &lt;b&gt;#e&lt;/b&gt;.<br>The | character can be used to split the template in sections. If within a section a #-parameter results in an empty string, the whole section will be omitted.<br>Note: The age is shown if the event is part of a category with \'Repeat\' set to \'every year\' and the year of birth in parentheses is mentioned somewhere in the event\'s description field.",
"monthView" => "Month view",
"wkdayView" => "Week/Day view",
"ownerTitle_label" => "Show event owner in front of event title",
"ownerTitle_text" => "In the various calendar views, show the event owner name in front of the event title.",
"showSpanel_label" => "Side panel in Month, Week and Day view",
"showSpanel_text" => "In Month, Week and Day view, right next to the main calendar, the following items can be shown:<br>• a mini calendar which can be used to look back or ahead without changing the date of the main calendar<br>• a decoration image corresponding to the current month<br>• an info area to post messages/announcements for each month.<br>If no items are selected, the side panel will not be shown.<br>See admin_guide.html for details.",
"spMiniCal" => "Mini calendar",
"spImages" => "Images",
"spInfoArea" => "Info area",
"showImgInMV_label" => "Pokaži v pogledu meseca",
"showImgInMV_text" => "Enable/disable the display in Month view of thumbnail images added to one of the event description fields. When enabled, thumbnails will be shown in the day cells and when disabled, thumbnails will be shown in the on-mouse-over boxes instead.",
"urls" => "URL links",
"emails" => "email links",
"monthInDCell_label" => "Mesec v vsaki celici dneva",
"monthInDCell_text" => "Prikaži v pogledu meseca 3-črkovno ime meseca za vsak dan",
"evtWinSmall_label" => "Reduced event window",
"evtWinSmall_text" => "When adding/editing events, the Event window will show a subset of the input fields. To show all fields, a plus-sign can be selected.",
"mapViewer_label" => "Map viewer URL",
"mapViewer_text" => "If a map viewer URL has been specified, an address in the event\'s venue field enclosed in !-marks, will be shown as an Address button in the calendar views. When hovering this button the textual address will be shown and when clicked, a new window will open where the address will be shown on the map.<br>The full URL of a map viewer should be specified, to the end of which the address can be joined.<br>Examples:<br>Google Maps: https://maps.google.com/maps?q=<br>OpenStreetMap: https://www.openstreetmap.org/search?query=<br>If this field is left blank, addresses in the Venue field will not be show as an Address button.",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Format dneva dogodka (dd mm yyyy)",
"dateFormat_text" => "Besedilni niz, ki definira format datumov dogodkov v pogledih koledarja in vbosnih poljih.<br>Možne črke: y = leto, m = mesec in d = dan.<br>Ne-alfanumerični znaki so lahko uporabljeni kot ločilniki in bodo kopirani dobesedno.<br>Primeri:<br>y-m-d: 2013-10-31<br>m.d.y: 10.31.2013<br>d/m/y: 31/10/2013",
"dateFormat_expl" => "Npr.: y.m.d: 2013.10.31",
"MdFormat_label" => "Format datuma (dd mesec)",
"MdFormat_text" => "Besedilni niz ki definira format datumov ki so sestavljeni z mesecom in dnevom.<br>Možne črke: M = mesec v tekstu, d = dan v številkah.<br>Ne-alfanumerični znaki so lahko uporabljeni kot ločilniki in bodo kopirani dobesedno.<br>Primeri:<br>d M: 12 April<br>M, d: Julij, 14",
"MdFormat_expl" => "Npr. M, d: Julij, 14",
"MdyFormat_label" => "Format datuma (dd mesec yyyy)",
"MdyFormat_text" => "Besedilni niz ki definira format datumov ki so sestavljeni z dnevom, mesecom in letom.<br>Možne črke: d = dan v številkah, M = mesec v tekstu, y = leto v številkah.<br>Ne-alfanumerični znaki so lahko uporabljeni kot ločilniki in bodo kopirani dobesedno.<br>Primeri:<br>d M y: 12 April 2013<br>M d, y: Julij 8, 2013",
"MdyFormat_expl" => "Npr. M d, y: Julij 8, 2013",
"MyFormat_label" => "Format datuma (mesec yyyy)",
"MyFormat_text" => "Besedilni niz ki definira format datumov ki so sestavljeni z mesecom in letom.<br>Možne črke: M = mesec v tekstu, y = leto v številkah.<br>Ne-alfanumerični znaki so lahko uporabljeni kot ločilniki in bodo kopirani dobesedno<br>Primeri:<br>M y: April 2013<br>y - M: 2013 - Julij",
"MyFormat_expl" => "Npr. M y: April 2013",
"DMdFormat_label" => "Format datuma (dan v tednu dd mesec)",
"DMdFormat_text" => "Besedilni niz ki definira format datumov ki so sestavljeni iz tedna, dneva in meseca.<br>Možne črke: wd = dan v tednu v obliki teksta, M = mesec v tekstu, d = dan v številkah.<br>Ne-alfanumerične znaki so lahko uporabljeni kot ločilniki in bodo kopirani dobesedno.<br>Primeri:<br>wd d M: Friday 12 April<br>WD, M d: Monday, Julij 14",
"DMdFormat_expl" => "Npr. wd - M d: Nedelja - April 6",
"DMdyFormat_label" => "Format datuma (dan v tednu dd mesec llll)",
"DMdyFormat_text" => "Besedilni niz ki definira format datumov ki so sestavljeni iz dneva v tednu, dneva, meseca in leta.<br>Možne črke: wd = dan v tednu v obliki teksta, M = mesec v tekstu, d = dan v številkah, l = leto v številkah.<br>Ne-alfanumerični znaki so lahko uporabljeni kot ločilniki in bodo kopirani dobesedno.<br>Primeri:<br>WD d M y: Petek 13 April 2013<br>WD - M d, y: Ponedeljek - Julij 16, 2013",
"DMdyFormat_expl" => "Npr. WD, M d, y: Ponedeljek, Julij 16, 2013",
"timeFormat_label" => "Časovni format (hh mm)",
"timeFormat_text" => "Besedilni niz ki definira format časov pri dogodkih v koledarjevih pogledih in vnosnih poljih.<br>Možne črke: h = ure, H = ure z vodilnimi ničlami, m = minute, a = am/pm (opcijsko), A = AM/PM (opcijsko).<br>Ne-alfanumeričn znaki so lahko uporabljeni kot ločilniki in bodo kopirani dobesedno.<br>Primeri:<br>h:m: 18:35<br>h.m a: 6.35 pm<br>H:mA: 06:35PM",
"timeFormat_expl" => "Npr. h:m: 22:35 in h:mA: 10:35PM",
"weekNumber_label" => "Prikaži številke tedna",
"weekNumber_text" => "Prikazovanje številk tedna v ustreznih pogledih je lahko vključeno ali izključeno",
"time_format_us" => "12-urni AM/PM",
"time_format_eu" => "24-urni",
"sunday" => "Nedelja",
"monday" => "Ponedeljek",
"time_zones" => "Časovni pasovi",
"dd_mm_yyyy" => "dd-mm-yyyy",
"mm_dd_yyyy" => "mm-dd-yyyy",
"yyyy_mm_dd" => "yyyy-mm-dd",

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
"services_label" => "Message services",
"services_text" => "Services available to sent event reminders. If a service is not selected, the corresponding section in the Event window will be suppressed. If no service is selected, no event reminders will be sent.",
"smsCarrier_label" => "SMS carrier template",
"smsCarrier_text" => "The SMS carrier template is used to compile the SMS gateway email address: ppp#sss@carrier, where . . .<br>• ppp: optional text string to be added before the phone number<br>• #: placeholder for the recipient\'s mobile phone number (the calendar will replace the # by the phone number)<br>• sss: optional text string to be inserted after the phone number, e.g. a username and password, required by some operators<br>• @: separator character<br>• carrier: carrier address (e.g. mail2sms.com)<br>Template examples: #@xmobile.com, 0#@carr2.int, #myunmypw@sms.gway.net.",
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
"notSenderEml_label" => "Pošiljatelj obveščevalne spletne pošte",
"notSenderEml_text" => "Ko opomnik pošlje obveščevalno spletno pošto, lahko pošiljateljevo polje vsebuje koledarjevo spletno pošto ali pa spletno pošto uporabnika, ki je ustvaril dogodek.<br>V primeru naslova uporabnikove spletne pošte, prejemnik lahko odgovori na pošto.",
"notSenderSms_label" => "Sender of notification SMSes",
"notSenderSms_text" => "When the calendar sends reminder SMSes, the sender ID of the SMS message can be either the calendar phone number, or the phone number of the user who created the event.<br>If \'user\' is selected and a user account has no phone number specified, the calendar phone number will be taken.<br>In case of the user phone number, the receiver can reply to the message.",
"defRecips_label" => "Default list of recipients",
"defRecips_text" => "If specified, this will be the default recipients list for email and/or SMS notifications in the Event window. If this field is left blank, the default recipient will be the event owner.",
"maxEmlCc_label" => "Max. no. of recipients per email",
"maxEmlCc_text" => "Normally ISPs allow a maximum number of recipients per email. When sending email or SMS reminders, if the number of recipients is greater than the number specified here, the email will be split in multiple emails, each with the specified maximum number of recipients.",
"mailServer_label" => "Poštni strežnik",
"mailServer_text" => "PHP spletna pošta je primerna za nepreverjeno pošto v majhnih številih. Za večje število pošte ali kadar je potrebna preverba, bi morala biti uporabljena SMTP pošta.<br>Uporaba SMTP pošte potrebuje SMTP strežnik. Konfiguracijski parametri za uporabo SMTP strežnika mora biti določeno nadaljno.",
"smtpServer_label" => "ime SMTP strežnika",
"smtpServer_text" => "Če je SMTP spletna pošta izbrana, mora biti ime SMTP strežnika določeno tukaj. Npr.: SMTP gmail strežnik za spletno pošto: smtp.gmail.com.",
"smtpPort_label" => "Številka SMTP vrat",
"smtpPort_text" => "Če je SMTP pošta izbrana, bi morala SMTP vrata določena tukaj. Npr.: 25, 465 ali 587. Gmail na primer uporablja številko vrat 465.",
"smtpSsl_label" => "SSL (Secure Sockets Layer)",
"smtpSsl_text" => "Če je izbrana SMTP spletna pošta, izberite tukaj če želite SSL imeti vključeno. Za gmail: vključeno",
"smtpAuth_label" => "SMTP avtentikacija",
"smtpAuth_text" => "Če je SMTP avtentikacija izbrana, bosta uporabniško ime in geslo, ki sta podana v nadaljnem, uporabljena pri avtentikaciji SMTP pošte.<br>For gmail for instance, the user name is the part of your email address before the @.",
"cc_prefix" => "Country code starts with prefix + or 00",
"general" => "General",
"email" => "Email",
"sms" => "SMS",
"php_mail" => "PHP pošta",
"smtp_mail" => "SMTP pošta (complete fields below)",

//settings.php - periodic function settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"cronHost_label" => "Cron job host",
"cronHost_text" => "Specify where the cron job is hosted which periodically starts the script \'lcalcron.php\'.<br>• local: cron job runs on the same server<br>• remote: cron job runs on a remote server or lcalcron.php is started manually (testing)<br>• IP address: cron job runs on a remote server with the specified IP address.",
"cronSummary_label" => "Admin cron job summary",
"cronSummary_text" => "Send a cron job summary to the calendar administrator.<br>Enabling is only useful if a cron job has been activated for the calendar.",
"chgSummary_label" => "Daily calendar changes summary",
"chgSummary_text" => "Number of days to look back for the summary of calendar changes.<br>If the number of days is set to 0 or if no cron job is running no summary of changes will be sent.",
"icsExport_label" => "Daily export of iCal events",
"icsExport_text" => "If enabled: All events in the date range -1 week until +1 year will be exported in iCalendar format in a .ics file in the \'files\' folder.<br>The file name will be the calendar name with blanks replaced by underscores. Old files will be overwritten by new files.",
"eventExp_label" => "Event expiry days",
"eventExp_text" => "Number of days after the event due date when the event expires and will be automatically deleted.<br>If 0 or if no cron job is running, no events will be automatically deleted.",
"maxNoLogin_label" => "Max. no. of days not logged in",
"maxNoLogin_text" => "If an account hasn\'t logged in for this many days it will be automatically deleted.<br>If this value is set to 0, user accounts will never be deleted.",
"local" => "local",
"remote" => "remote",
"ip_address" => "IP address",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"popFieldsSbar_label" => "Event fields - sidebar hover box",
"popFieldsSbar_text" => "The event fields to be displayed in an overlay when the user hovers an event in the stand-alone sidebar can be specified by means of a sequence of numbers.<br>If no fields are specified at all, no hover box will be displayed.",
"showLinkInSB_label" => "Show links in sidebar",
"showLinkInSB_text" => "Display URLs from the event description as a hyperlink in the upcoming events sidebar",
"sideBarDays_label" => "Days to look ahead in sidebar",
"sideBarDays_text" => "Number of days to look ahead for events in the sidebar.",

//login.php
"log_log_in" => "Vpis",
"log_remember_me" => "Zapomni si me",
"log_register" => "Registracija",
"log_change_my_data" => "Spremeni moje podatke ",
"log_save" => "Spremeni",
"log_un_or_em" => "Uporabniško ime ali spletna pošta",
"log_un" => "Uporabniško ime",
"log_em" => "Spletna pošta",
"log_ph" => "Mobile phone number",
"log_answer" => "Your answer",
"log_pw" => "Geslo",
"log_new_un" => "Novo uporabniško ime",
"log_new_em" => "Nov spletni naslov",
"log_new_pw" => "Novo geslo",
"log_con_pw" => "Confirm Password",
"log_pw_msg" => "Tukaj so vaše informacije za vpis v koledar",
"log_pw_subject" => "Vaše geslo",
"log_npw_subject" => "Vaše novo geslo",
"log_npw_sent" => "Vaše novo geslo je nastavljeno",
"log_registered" => "Registracija uspešna - vaše geslo je bilo poslano na vašo spletno pošto",
"log_em_problem_not_sent" => "Email problem - your password could not be sent",
"log_em_problem_not_noti" => "Email problem - could not notify the administrator",
"log_un_exists" => "Uporabniško ime že obstaja",
"log_em_exists" => "Naslov spletne pošte že obstaja",
"log_un_invalid" => "Neveljavno uporabniško ime (najmanj dolžine 2: A-Ž, a-ž, 0-9, in _-.) ",
"log_em_invalid" => "Neveljaven naslov spletne pošte",
"log_ph_invalid" => "Invalid mobile phone number",
"log_sra_wrong" => "Incorrect answer to the question",
"log_sra_wrong_4x" => "You have answered incorrectly 4 times - try again in 30 minutes",
"log_un_em_invalid" => "Uporabniško ime/spletna pošta ni veljavno",
"log_un_em_pw_invalid" => "Uporabniško ime/spletna pošta ali geslo ni veljavno",
"log_pw_error" => "Passwords not matching",
"log_no_un_em" => "Prosim vnesite svoje uporabniško ime/naslov spletne pošte",
"log_no_un" => "Prosim vnesite vaše uporabniško ime",
"log_no_em" => "Prosim vnesite vaš naslov spletne pošte",
"log_no_pw" => "Prosim vnesite vaše geslo",
"log_no_rights" => "Vpis zavrnjen: nimate nobenih pravic za ogled - kontaktirajte administratorja",
"log_send_new_pw" => "Pošlji novo geslo",
"log_new_un_exists" => "Novo uporabniško ime že obstaja",
"log_new_em_exists" => "Nov naslov spletne pošte že obstaja",
"log_ui_language" => "Jezik uporabniškega vmesnika",
"log_new_reg" => "Registracija novega uporabnika",
"log_date_time" => "Datum / čas",
"log_time_out" => "Time out",

//categories.php
"cat_list" => "Spisek kategorij",
"cat_edit" => "Spremeni",
"cat_delete" => "Zbriši",
"cat_add_new" => "Dodaj novo kategorijo",
"cat_add" => "Dodaj",
"cat_edit_cat" => "Spremeni kategorijo",
"cat_sort" => "Sort On Name",
"cat_cat_name" => "Ime kategorije",
"cat_symbol" => "Symbol",
"cat_symbol_repms" => "Category symbol (replaces minisquare)",
"cat_symbol_eg" => "e.g. A, X, ♥, ⛛",
"cat_matrix_url_link" => "URL link (shown in matrix view)",
"cat_seq_in_menu" => "Zaporedje v meniju",
"cat_cat_color" => "Barva kategorije",
"cat_text" => "Teksta",
"cat_background" => "Ozadje",
"cat_select_color" => "Izberi barvo",
"cat_subcats" => "Sub-<br>categories",
"cat_subcats_opt" => "Subcategories (optional)",
"cat_url" => "URL",
"cat_name" => "Name",
"cat_save" => "Shrani",
"cat_added" => "Kategorija dodana",
"cat_updated" => "Kategorija posodobljena",
"cat_deleted" => "Kategorija izbrisana",
"cat_not_added" => "Kategorija ni dodana",
"cat_not_updated" => "Kategorija ni posodobljena",
"cat_not_deleted" => "Kategorija ni izbrisana",
"cat_nr" => "#",
"cat_repeat" => "Ponovi",
"cat_every_day" => "vsak dan",
"cat_every_week" => "vsak teden",
"cat_every_month" => "vsak mesec",
"cat_every_year" => "vsako leto",
"cat_overlap" => "Overlap<br>allowed<br>(gap)",
"cat_need_approval" => "Events need<br>approval",
"cat_no_overlap" => "No overlap allowed",
"cat_same_category" => "same category",
"cat_all_categories" => "all categories",
"cat_gap" => "gap",
"cat_ol_error_text" => "Error message, if overlap",
"cat_no_ol_note" => "Note that already existing events are not checked and consequently may overlap",
"cat_ol_error_msg" => "event overlap - select an other time",
"cat_no_ol_error_msg" => "Overlap error message missing",
"cat_duration" => "Event<br>duration<br>!: fixed",
"cat_default" => "default (no end time)",
"cat_fixed" => "fixed",
"cat_event_duration" => "Event duration",
"cat_olgap_invalid" => "Invalid overlap gap",
"cat_duration_invalid" => "Invalid event duration",
"cat_no_url_name" => "URL link name missing",
"cat_invalid_url" => "Invalid URL link",
"cat_day_color" => "Day color",
"cat_day_color1" => "Day color (year/matrix view)",
"cat_day_color2" => "Day color (month/week/day view)",
"cat_approve" => "Dogodki rabijo potrditev",
"cat_check_mark" => "Oznaka za preverjanje",
"cat_label" => "nalepka",
"cat_mark" => "označba",
"cat_name_missing" => "Manjka ime kategorije",
"cat_mark_label_missing" => "Manjka označba/nalepka",

//users.php
"usr_list_of_users" => "Spisek uporabnikov",
"usr_name" => "Uporabniško ime",
"usr_email" => "Spletna pošta",
"usr_phone" => "Mobile phone number",
"usr_phone_br" => "Mobile phone<br>number",
"usr_number" => "User number",
"usr_number_br" => "User<br>number",
"usr_language" => "Language",
"usr_ui_language" => "User interface language",
"usr_group" => "Skupine",
"usr_password" => "Geslo",
"usr_edit_user" => "Spremeni uporabnikov profil",
"usr_add" => "Dodaj uporabnika",
"usr_edit" => "Spremeni",
"usr_delete" => "Izbriši",
"usr_login_0" => "Prvi vpis",
"usr_login_1" => "Zadnji vpis",
"usr_login_cnt" => "Vpisi",
"usr_add_profile" => "Dodaj profil",
"usr_upd_profile" => "Posodobi profil",
"usr_if_changing_pw" => "Samo če se spreminja geslo",
"usr_pw_not_updated" => "Geslo ni posodobljeno",
"usr_added" => "Uporabnik dodan",
"usr_updated" => "Uporabnikov profil dodan",
"usr_deleted" => "Uporabnik zbrisan",
"usr_not_deleted" => "Uporabnik ni bil zbrisan",
"usr_cred_required" => "Uporabniško ime, naslov spletne pošte in geslo so potrebni.",
"usr_name_exists" => "Uporabniško ime že obstaja",
"usr_email_exists" => "Naslov spletne pošte že obstaja",
"usr_un_invalid" => "Neveljavno uporabniško ime (najmanj dolžine 2: A-Ž, a-ž, 0-9, in _-.) ",
"usr_em_invalid" => "Neveljaven naslov spletne pošte",
"usr_ph_invalid" => "Invalid mobile phone number",
"usr_cant_delete_yourself" => "Nemorete zbrisati samega sebe",
"usr_go_to_groups" => "Go to Spisek",

//groups.php
"grp_list_of_groups" => "Spisek skupine",
"grp_name" => "Ime skupine",
"grp_priv" => "Pravice",
"grp_categories" => "Kategorije",
"grp_all_cats" => "vse kategorije",
"grp_rep_events" => "Repeating<br>events",
"grp_m-d_events" => "Multi-day<br>events",
"grp_priv_events" => "Private<br>events",
"grp_upload_files" => "Upload<br>files",
"grp_send_sms" => "Send<br>SMSes",
"grp_tnail_privs" => "Thumbnail<br>privileges",
"grp_priv0" => "Brez pravic dostopa",
"grp_priv1" => "Poglej",
"grp_priv2" => "Objavljaj/spremni svoje dogodke",
"grp_priv3" => "Objavljaj/spremeni vse dogodke",
"grp_priv4" => "Objavljanje/spreminjanje + upravnika",
"grp_priv9" => "administratorja",
"grp_may_post_revents" => "May post repeating events",
"grp_may_post_mevents" => "May post multi-day events",
"grp_may_post_pevents" => "May post private events",
"grp_may_upload_files" => "May upload files",
"grp_may_send_sms" => "May send SMSes",
"grp_tn_privs" => "Thumbnails privileges",
"grp_tn_privs00" => "none",
"grp_tn_privs11" => "view all",
"grp_tn_privs20" => "manage own",
"grp_tn_privs21" => "m. own/v. all",
"grp_tn_privs22" => "manage all",
"grp_edit_group" => "Spremeni uporabniška skupina",
"grp_sub_to_rights" => "Subject to user rights",
"grp_view" => "View",
"grp_add" => "Add",
"grp_edit" => "Spremeni",
"grp_delete" => "Izbriši",
"grp_add_group" => "Dodaj Skupine",
"grp_upd_group" => "Posodobi Skupine",
"grp_added" => "Skupine dodan",
"grp_updated" => "Skupine posodobljen",
"grp_deleted" => "Skupine zbrisan",
"grp_not_deleted" => "Skupine ni bil zbrisan",
"grp_in_use" => "Skupine is in use",
"grp_cred_required" => "Skupine name, Rights and Categories are required",
"grp_name_exists" => "Skupine  ime že obstaja",
"grp_name_invalid" => "Neveljavno skupine ime (najmanj dolžine 2: A-Ž, a-ž, 0-9, in _-.) ",
"grp_background" => "Barva ozadja",
"grp_select_color" => "Izberi barvo",
"grp_invalid_color" => "Format barve neveljaven (#XXXXXX kjer X = HEX-value)",
"grp_go_to_users" => "Go to Uporabnikov",

//database.php
"mdb_dbm_functions" => "Database Functions",
"mdb_noshow_tables" => "Cannot get table(s)",
"mdb_noshow_restore" => "No source backup file selected",
"mdb_file_not_sql" => "Source backup file should be an SQL file (extension '.sql')",
"mdb_compact" => "Compact database",
"mdb_compact_table" => "Compact table",
"mdb_compact_error" => "Error",
"mdb_compact_done" => "Done",
"mdb_purge_done" => "Deleted events permanently purged from the database",
"mdb_backup" => "Backup database",
"mdb_backup_table" => "Backup table",
"mdb_backup_file" => "Backup file",
"mdb_backup_done" => "Done",
"mdb_records" => "records",
"mdb_restore" => "Restore database",
"mdb_restore_table" => "Restore table",
"mdb_inserted" => "records inserted",
"mdb_db_restored" => "Database restored.",
"mdb_no_bup_match" => "Backup file doesn't match calendar version.<br>Database not restored.",
"mdb_events" => "Events",
"mdb_delete" => "delete",
"mdb_undelete" => "undelete",
"mdb_between_dates" => "occurring between",
"mdb_deleted" => "Events deleted",
"mdb_undeleted" => "Events undeleted",
"mdb_file_saved" => "Backup file saved in 'files' folder on server.",
"mdb_file_name" => "File name",
"mdb_start" => "Start",
"mdb_no_function_checked" => "No function(s) selected",
"mdb_write_error" => "Writing backup file failed<br>Check permissions of 'files/' directory",

//import/export.php
"iex_file" => "Selected file",
"iex_file_name" => "Destination file name",
"iex_file_description" => "iCal file description",
"iex_filters" => "Event Filters",
"iex_export_usr" => "Export User Profiles",
"iex_import_usr" => "Import User Profiles",
"iex_upload_ics" => "Upload iCal File",
"iex_create_ics" => "Create iCal File",
"iex_tz_adjust" => "Timezone adjustments",
"iex_upload_csv" => "Upload CSV File",
"iex_upload_file" => "Upload File",
"iex_create_file" => "Create File",
"iex_download_file" => "Download File",
"iex_fields_sep_by" => "Fields separated by",
"iex_birthday_cat_id" => "Birthday category ID",
"iex_default_grp_id" => "Default user group ID",
"iex_default_cat_id" => "Default category ID",
"iex_default_pword" => "Default password",
"iex_if_no_pw" => "If no password specified",
"iex_replace_users" => "Replace existing users",
"iex_if_no_grp" => "if no user group found",
"iex_if_no_cat" => "if no category found",
"iex_import_events_from_date" => "Import events occurring as of",
"iex_no_events_from_date" => "No events found as of the specified date",
"iex_see_insert" => "see instructions on the right",
"iex_no_file_name" => "File name missing",
"iex_no_begin_tag" => "invalid iCal file (BEGIN-tag missing)",
"iex_bad_date" => "Bad date",
"iex_date_format" => "Event date format",
"iex_time_format" => "Event time format",
"iex_number_of_errors" => "Number of errors in list",
"iex_bgnd_highlighted" => "background highlighted",
"iex_verify_event_list" => "Verify Event List, correct possible errors and click",
"iex_add_events" => "Add Events to Database",
"iex_verify_user_list" => "Verify User List, correct possible errors and click",
"iex_add_users" => "Add Users to Database",
"iex_select_ignore_birthday" => "Select Ignore and Birthday check boxes as required",
"iex_select_ignore" => "Select Ignore check box to ignore event",
"iex_check_all_ignore" => "Check all ignore boxes",
"iex_title" => "Title",
"iex_venue" => "Venue",
"iex_owner" => "Owner",
"iex_category" => "Category",
"iex_date" => "Date",
"iex_end_date" => "End date",
"iex_start_time" => "Start time",
"iex_end_time" => "End time",
"iex_description" => "Description",
"iex_repeat" => "Repeat",
"iex_birthday" => "Birthday",
"iex_ignore" => "Ignore",
"iex_events_added" => "events added",
"iex_events_dropped" => "events dropped (already present)",
"iex_users_added" => "users added",
"iex_users_deleted" => "users deleted",
"iex_csv_file_error_on_line" => "CSV file error on line",
"iex_between_dates" => "Occurring between",
"iex_changed_between" => "Added/modified between",
"iex_select_date" => "Select date",
"iex_select_start_date" => "Select start date",
"iex_select_end_date" => "Select end date",
"iex_group" => "User group",
"iex_name" => "User name",
"iex_email" => "Email address",
"iex_phone" => "Phone number",
"iex_lang" => "Language",
"iex_pword" => "Password",
"iex_all_groups" => "all groups",
"iex_all_cats" => "all categories",
"iex_all_users" => "all users",
"iex_no_events_found" => "No events found",
"iex_file_created" => "File created",
"iex_write error" => "Writing export file failed<br>Check permissions of 'files/' directory",
"iex_invalid" => "invalid",
"iex_in_use" => "already in use",

//styling.php
"sty_css_intro" =>  "Values specified on this page should adhere to the CSS standards",
"sty_preview_theme" => "Preview Theme",
"sty_preview_theme_title" => "Preview displayed theme in calendar",
"sty_stop_preview" => "Stop Preview",
"sty_stop_preview_title" => "Stop preview of displayed theme in calendar",
"sty_save_theme" => "Save Theme",
"sty_save_theme_title" => "Save displayed theme to database",
"sty_backup_theme" => "Backup Theme",
"sty_backup_theme_title" => "Backup theme from database to file",
"sty_restore_theme" => "Restore Theme",
"sty_restore_theme_title" => "Restore theme from file to display",
"sty_default_luxcal" => "default LuxCal theme",
"sty_close_window" => "Close Window",
"sty_close_window_title" => "Close this window",
"sty_theme_title" => "Theme title",
"sty_general" => "General",
"sty_grid_views" => "Grid / Views",
"sty_hover_boxes" => "Hover Boxes",
"sty_bgtx_colors" => "Background/text colors",
"sty_bord_colors" => "Border colors",
"sty_fontfam_sizes" => "Font family/sizes",
"sty_font_sizes" => "Font sizes",
"sty_miscel" => "Miscellaneous",
"sty_background" => "Background",
"sty_text" => "Text",
"sty_color" => "Color",
"sty_example" => "Example",
"sty_theme_previewed" => "Preview mode - you can now navigate the calendar. Select Stop Preview when done.",
"sty_theme_saved" => "Theme saved to database",
"sty_theme_backedup" => "Theme backed up from database to file:",
"sty_theme_restored1" => "Theme restored from file:",
"sty_theme_restored2" => "Press Save Theme to save the theme to the database",
"sty_unsaved_changes" => "WARNING – Unsaved changes!\\nIf you close the window, the changes will be lost.", //don't remove '\\n'
"sty_number_of_errors" => "Number of errors in list",
"sty_bgnd_highlighted" => "background highlighted",
"sty_XXXX" => "calendar general",
"sty_TBAR" => "calendar top bar",
"sty_BHAR" => "bars, headers and lines",
"sty_BUTS" => "buttons",
"sty_DROP" => "drop-down menus",
"sty_XWIN" => "popup windows",
"sty_INBX" => "insert boxes",
"sty_OVBX" => "overlay boxes",
"sty_BUTH" => "buttons - on hover",
"sty_FFLD" => "form fields",
"sty_CONF" => "confirmation message",
"sty_WARN" => "warning message",
"sty_ERRO" => "error message",
"sty_HLIT" => "text highlight",
"sty_FXXX" => "base font family",
"sty_SXXX" => "base font size",
"sty_PGTL" => "page titles",
"sty_THDL" => "table headers L",
"sty_THDM" => "table headers M",
"sty_DTHD" => "date headers",
"sty_SNHD" => "section headers",
"sty_PWIN" => "popup windows",
"sty_SMAL" => "small text",
"sty_GCTH" => "day cell - hover",
"sty_GTFD" => "cell head 1st day of month",
"sty_GWTC" => "weeknr / time column",
"sty_GWD1" => "weekday month 1",
"sty_GWD2" => "weekday month 2",
"sty_GWE1" => "weekend month 1",
"sty_GWE2" => "weekend month 2",
"sty_GOUT" => "outside month",
"sty_GTOD" => "day cell today",
"sty_GSEL" => "day cell selected day",
"sty_LINK" => "URL and email links",
"sty_CHBX" => "todo check box",
"sty_EVTI" => "event title in views",
"sty_HNOR" => "normal event",
"sty_HPRI" => "private event",
"sty_HREP" => "repeating event",
"sty_POPU" => "hover popup box",
"sty_TbSw" => "top bar shadow (0:no 1:yes)",
"sty_CtOf" => "content offset",

//lcalcron.php
"cro_sum_header" => "CRON JOB SUMMARY",
"cro_sum_trailer" => "END OF SUMMARY",
"cro_sum_title_eve" => "EVENTS EXPIRED",
"cro_nr_evts_deleted" => "Number of events deleted",
"cro_sum_title_eml" => "EMAIL REMINDERS",
"cro_sum_title_sms" => "SMS REMINDERS",
"cro_not_sent_to" => "Reminders sent to",
"cro_no_reminders_due" => "No reminder messages due",
"cro_subject" => "Subject",
"cro_event_due_in" => "The following event is due in",
"cro_event_due_today" => "The following event is due today",
"cro_due_in" => "Due in",
"cro_due_today" => "Due today",
"cro_days" => "day(s)",
"cro_date_time" => "Date / time",
"cro_title" => "Title",
"cro_venue" => "Venue",
"cro_description" => "Description",
"cro_category" => "Category",
"cro_status" => "Status",
"cro_sum_title_chg" => "CALENDAR CHANGES",
"cro_nr_changes_last" => "Number of changes last",
"cro_report_sent_to" => "Report sent to",
"cro_no_report_sent" => "No report emailed",
"cro_sum_title_use" => "USER ACCOUNTS EXPIRED",
"cro_nr_accounts_deleted" => "Number of accounts deleted",
"cro_no_accounts_deleted" => "No accounts deleted",
"cro_sum_title_ice" => "EXPORTED EVENTS",
"cro_nr_events_exported" => "Number of events exported in iCalendar format to file",

//messaging.php
"mes_no_msg_no_recip" => "Not sent, no recipients found",

//explanations
"xpl_manage_db" =>
"<h3>Manage Database Instructions</h3>
<p>On this page the following functions can be selected:</p>
<h6>Compact database</h6>
<p>When a user deletes an event, the event will be marked as 'deleted', but will 
not be removed from the database. The Compact Database function will permanently 
remove events deleted more than 30 days ago from the database and free the space 
occupied by these events.</p>
<h6>Back up database</h6>
<p>This function will create a backup of the full calendar database (tables, 
structure and contents) in .sql format. The backup will be saved in the 
<strong>files/</strong> directory with file name: 
<kbd>dump-cal-lcv-yyyymmdd-hhmmss.sql</kbd> (where 'cal' = calendar ID, lcv = 
calendar version and 'yyyymmdd-hhmmss' = year, month, day, hour, minutes and 
seconds).</p>
<p>The backup file can be used to recreate the calendar database (structure and 
data), via the restore function described below or by using for instance the 
<strong>phpMyAdmin</strong> tool, which is provided by most web hosts.</p>
<h6>Restore database</h6>
<p>This function will restore the calendar database with the contents of the 
uploaded backup file (file type .sql).</p>
<p>When restoring the database, ALL CURRENTLY PRESENT DATA WILL BE LOST!</p>
<h6>Events</h6>
<p>This function will delete or undelete events which are occurring between the 
specified dates. If a date is left blank, there is no date limit; so if both 
dates are left blank, ALL EVENTS WILL BE DELETED!</p><br>
<p>IMPORTANT: When the database is compacted (see above), the events which are 
permanently removed from the database cannot be undeleted anymore!</p>",

"xpl_import_csv" =>
"<h3>CSV Import Instructions</h3>
<p>This form is used to import a CSV (Comma Separated Values) text file containing 
event data into the LuxCal Calendar</p>
<p>The order of columns in the CSV file must be: title, venue, category id (see 
below), date, end date, start time, end time and description. If the first row of 
the CSV file contains column headers, it will be ignored.</p>
<p>For proper handling of special characters, the CSV file must be UTF-8 encoded.</p>
<h6>Sample CSV files</h6>
<p>Sample CSV files (file extension .csv) can be found in the 'files/' directory 
of your LuxCal installation.</p>
<h6>Field separator</h6>
The field separator can be any character, for instance a comma, semi-colon, etc.
The field separator character must be unique and may not be part of the text, 
numbers or dates in the fields.
<h6>Date and time format</h6>
<p>The selected event date format and event time format on the left must match the 
format of the dates and times in the uploaded CSV file.</p>
<h6>Table of Categories</h6>
<p>The calendar uses ID numbers to specify categories. The category IDs in the CSV 
file should correspond to the categories used in your calendar or be blank.</p>
<p>If in the next step you want to earmark events as 'birthday', the <strong>Birthday 
category ID</strong> must be set to the corresponding ID in the category list below.</p>
<p class='hired'>Warning: Do not import more than 100 events at a time!</p>
<p>For your calendar, the following categories have currently been defined:</p>",

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
"<h3>iCalendar Import Instructions</h3>
<p>This form is used to import an <strong>iCalendar</strong> event file into 
the LuxCal Calendar.</p>
<p>The file contents must meet the [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>RFC5545 standard</a></u>] of the Internet Engineering Task Force.</p>
<p>Only events will be imported; other iCal components, like: To-Do, Journal, Free / 
Busy and Alarm, will be ignored.</p>
<h6>Sample iCal files</h6>
<p>Sample iCalendar files (file extension .ics) can be found in the 'files/' 
directory of your LuxCal download.</p>
<h6>Timezone adjustments</h6>
<p>If your iCalendar file contains events in a different timezone and the dates/times 
should be adjusted to the calendar timezone, then check 'Timezone adjustments'.</p>
<h6>Table of Categories</h6>
<p>The calendar uses ID numbers to specify categories. The category IDs in the 
iCalendar file should correspond to the categories used in your calendar or be 
blank.</p>
<p class='hired'>Warning: Do not import more than 100 events at a time!</p>
<p>For your calendar, the following categories have currently been defined:</p>",

"xpl_export_ical" =>
"<h3>iCalendar Export Instructions</h3>
<p>This form is used to extract and export <strong>iCalendar</strong> events from 
the LuxCal Calendar.</p>
<p>Files will be created in the 'files/' directory on the server with the 
specified filename (no extension). (The filename extension is <b>.ics</b> and 
if not specified, the default filename is the calendar name.
Existing files in the 'files/' directory on the server with the same name will 
be overwritten by the new file.</p>
<p>The <b>iCal file description</b> (e.g. 'Meetings 2013') is optional. If 
entered, it will be added to the header of the exported iCal file.</p>
<p><b>Event filters</b>: The events to be extracted can be filtered by:</p>
<ul>
<li>event owner</li>
<li>event category</li>
<li>event start date</li>
<li>event added/last modified date</li>
</ul>
<p>Each filter is optional. Blank 'occurring between' dates default to -1 year 
and +1 year respectively. A blank 'added/modified between' date means: no limit.</p>
<br>
<p>The content of the file with extracted events will meet the 
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 standard</a></u>] 
of the Internet Engineering Task Force.</p>
<p>When <b>downloading</b> the exported iCal file, the date and time will be 
added to the name of the downloaded file.</p>
<h6>Sample iCal files</h6>
<p>Sample iCalendar files (file extension .ics) can be found in the 'files/' 
directory of your LuxCal download.</p>"
);
?>
