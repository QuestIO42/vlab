<?php
/*
= LuxCal admin interface language file =

This file has been produced by LuxSoft. Bitte senden Sie Kommentare / Verbesserungen an rb@luxsoft.eu.
2011-05-31 übersetzt von Alfred Bruckner
2018-02-09 aktualisiert von Markus Windgassen

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui Sprachdatei Version
define("LAI","4.7.8");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Keine",
"no" => "nein",
"yes" => "ja",
"own" => "own",
"all" => "alle",
"or" => "oder",
"back" => "Zurück",
"ahead" => "Ahead",
"close" => "Schliessen",
"always" => "Immer",
"at_time" => "@", //Datum- und Zeit- separator (Bsp.: 30-01-2020 @ 10:45)
"times" => "times",
"cat_seq_nr" => "category sequence nr",
"rows" => "Zeilen",
"columns" => "Rubrik",
"hours" => "hours",
"minutes" => "Minuten",
"user_group" => "Erstellergruppe",
"event_cat" => "Ereigniskategorie",
"id" => "ID",
"username" => "Benutzername",
"password" => "Passwort",
"public" => "Öffentlich",
"logged_in" => "Logged in",
"logged_in_l" => "logged in",

//settings.php - fieldset headers + general
"set_general_settings" => "Allgemein",
"set_navbar_settings" => "Navigation Bar",
"set_event_settings" => "Termine",
"set_user_settings" => "Benutzer",
"set_upload_settings" => "File Uploads",
"set_reminder_settings" => "Erinnerungen",
"set_perfun_settings" => "Wiederkehrende Funktion (nur relevant, wenn cron job definiert wurde)",
"set_sidebar_settings" => "Stand-Alone Sidebar (nur relevant, wenn aktiviert)",
"set_view_settings" => "Anzeige",
"set_dt_settings" => "Datum/Zeit",
"set_save_settings" => "Speichern",
"set_test_mail" => "Test Mail",
"set_mail_sent_to" => "Test E-mail geschickt an",
"set_mail_sent_from" => "Diese Test E-Mail wurde von Ihrer Einstellungsseite des Kalenders versandt",
"set_mail_failed" => "Sending test mail failed - recipient(s)",
"set_missing_invalid" => "fehlende oder ungültige Einstellungen (Hintergrund hervorgehoben)",
"set_settings_saved" => "Einstellungen gespeichert",
"set_save_error" => "Datenbank Fehler - Abspeichern der Einstellungen fehlgeschlagen",
"hover_for_details" => "Für Hilfe Mauszeiger über die Beschreibung bewegen",
"default" => "Standard",
"enabled" => "Aktiviert",
"disabled" => "Deaktiviert",
"pixels" => "Pixel",
"warnings" => "Warnungen",
"notices" => "Hinweisen",
"visitors" => "Besucher",
"no_way" => "Sie haben keine Rechte für diese Aktion",

//settings.php - calendar settings
"versions_label" => "Versionen",
"versions_text" => "• calendar version, followed by the database in use<br>• PHP version<br>• database version",
"calTitle_label" => "Titel",
"calTitle_text" => "Wird in der Kopfzeile angezeigt und in Email Benachrichtigungen verwendet.",
"calUrl_label" => "URL",
"calUrl_text" => "Die Web Seite des Kalenders.",
"calEmail_label" => "Email Adresse des Kalenders",
"calEmail_text" => "Email Adresse für das Senden und Entphangen von Benachrichtigungs-Emails.<br>Format: \'Email\' or \'Name &#8826;Email&#8827;\'.",
"logoPath_label" => "Path/name of logo image",
"logoPath_text" => "If specified, a logo image will be displayed in the left upper corner of the calendar. If also a link to a parent page is specified (see below), then the logo will be a hyper-link to the parent page. The logo image should have a maximum height and width of 70 pixels.",
"backLinkUrl_label" => "Link zur Hauptseite",
"backLinkUrl_text" => "URL der Hauptseite. Falls angegeben, wird ein zurück Feld auf der linken Seite angezeigt, welche auf diese URL verweist.<br>zum Beispiel auf die Hauptseite, von der der Kalender gestartet wurde. If a logo path/name has been specified (see above), then no Back button will be displayed, but the logo will become the back link instead.",
"timeZone_label" => "Zeitzone",
"timeZone_text" => "Die Zeitzone die zur Berechnung der aktuellen Zeit verwendet wird.",
"see" => "siehe",
"notifChange_label" => "Sende Benachrichtigung von geänderten Kalenderdatei",
"notifChange_text" => "When a user adds, edits or deletes an event, a notification message will be sent to the specified recipients.",
"chgRecipList" => "Empfängerliste",
"maxXsWidth_label" => "Max. width of small screens",
"maxXsWidth_text" => "For displays with a width smaller than the specified number of pixels, the calendar will run in a special responsive mode, leaving out certain less important elements.",
"rssFeed_label" => "RSS feed links",
"rssFeed_text" => "Falls aktiviert: For users with at least \'view\' rights an RSS feed link will be visible in the footer of the calendar and an RSS feed link will be added to the HTML head of the calendar pages.",
"logging_label" => "Log calendar data",
"logging_text" => "The calendar can log error, warning and notice messages and visitors data. Error messages are always logged. Logging of warning and notice messages and visitors data can each be disabled or enabled by checking the relevant check boxes. All error, warning and notice messages are logged in the file \'logs/luxcal.log\' and visitors data are logged in the files \'logs/hitlog.log\' and \'logs/botlog.log\'.<br>Note: PHP error, warning and notice messages are logged at a different location, determined by your ISP.",
"maintMode_label" => "Maintenance mode",
"maintMode_text" => "When enabled, the calendar will run in maintenance mode, which means that useful maintenance information will be shown in the calendar footer bar.",
"reciplist" => "The recipient list can contain user names, email addresses, phone numbers and names of files with recipients (enclosed by square brackets), separated by semicolons. Files with recipients with one recipient per line should be located in the folder \'reciplists\'. When omitted, the default file extension is .txt",
"calendar" => "Kalender",
"user" => "Benutzer",
"database" => "Database",

//settings.php - navigation bar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"contact_label" => "Contact button",
"contact_text" => "If enabled: A Contact button will be displayed in the side menu. Clicking this button will open a contact form, which can be used to send a message to the calendar administrator.",
"optionsPanel_label" => "Options panel menus",
"optionsPanel_text" => "Aktiviert/Deaktiviert menus in the options panel.<br>• The calendar menu is available to the admin to switch calendars. (enabling only useful if several calendars are installed)<br>• The view menu can be used to select one of the calendar views.<br>• Das Gruppenmenue kann benutzt werden um nur Termine anzuzeigen, die von einem Benutzer der ausgewählten Gruppe erstellt wurden.<br>• The users menu can be used to display only events created by the selected users.<br>• The categories menu can be used to display only events belonging to the selected event categories.<br>• The language menu can be used to select the user interface language. (enabling only useful if several languages are installed)<br>Note: If no menus are selected, the option panel button will not be displayed.",
"calMenu_label" => "Kalender",
"viewMenu_label" => "Ansicht",
"groupMenu_label" => "Gruppen",
"userMenu_label" => "Benutzer",
"catMenu_label" => "Kategorien",
"langMenu_label" => "Sprache",
"availViews_label" => "Verfügbare Kalender Ansicht",
"availViews_text" => "Calendar views available to publc and logged-in users specified by means of a comma-separated list with view numbers. Meaning of the numbers:<br>1: year view<br>2: month view (7 days)<br>3: work month view<br>4: week view (7 days)<br>5: work week view<br>6: day view<br>7: upcoming events view<br>8: changes view<br>9: matrix view (categories)<br>10: matrix view (users)<br>11: gantt chart view",
"viewButtons_label" => "Zeige Felder in der Navigationsleiste",
"viewButtons_text" => "Zeige Felder in der Navigationsleiste für öffentliche oder eingeloggde Benutzer, specified by means of a comma-separated list of view numbers.<br>If a number is specified in the sequence, the corresponding button will be displayed. If no numbers are specified, no View buttons will be displayed.<br>Meaning of the numbers:<br>1: Year<br>2: Full Month<br>3: Work Month<br>4: Full Week<br>5: Work Week<br>6: Day<br>7: Upcoming<br>8: Changes<br>9: Matrix-C<br>10: Matrix-U<br>11: Gantt Chart<br>The order of the numbers determine the order of the displayed buttons.<br>For example: \'24\' means: display \'Full Month\' and \'Full Week\' buttons.",
"defaultViewL_label" => "Ansicht beim Start (large displays)",
"defaultViewL_text" => "Default calendar view on startup for public and logged-in users using large displays.<br>Recommended choice: Month.",
"defaultViewS_label" => "Ansicht beim start (small display)",
"defaultViewS_text" => "Default calendar view on startup for public and logged-in users using small displays.<br>Recommended choice: Upcoming.",
"language_label" => "Benutzersprache",
"language_text" => "Die Dateien ui-{sprache}.php, ai-{sprache}.php, ug-{sprache}.php und ug-layout.png müssen im dem lang/ Verzeichnis vorhanden sein. {sprache} = ausgewählte Sprache. Dateinamen müssen in Kleinbuchstaben sein!",

//settings.php - events settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"privEvents_label" => "Buchen von privaten Terminen",
"privEvents_text" => "Private Termine koennen nur vom Benutzer gesehen werden, der diese erstellt hat.<br>Aktiviert: Benutzer koennen private Termine erfassen.<br>Standard: when adding new events, the \'private\' checkbox in the Event window will be checked by default.<br>Immer: beim hinzufuegen neuer Termine, werden diese immer als privat eingestellt, das \'private\' Feld wird in diesem Termin nicht angezeigt.",
"aldDefault_label" => "New events all-day by default",
"aldDefault_text" => "When adding events, in the Event window the \'All day\' checkbox will be checked by default. In addition, if no start time is specified the event automatically becomes an all-day event.",
"details4All_label" => "Termin Details Benutzern anzeigen",
"details4All_text" => "Deaktiviert: Termin Details sind nur für den Ersteller eines Termins oder für Benutzer mit \'setze alle\' Berechtigung sichtbar.<br>aktiviert: Termin Details sind für alle Benutzer sichtbar.<br>Logged in: Termin Details sind sichtbar für den Ersteller eines Termins und für logged in Benutzer.",
"evtDelButton_label" => "Show delete button in Event window",
"evtDelButton_text" => "Deaktiviert: Der LOESCHEN-Knopf im Termin wird nicht angezeigt. Damit können Benutzer mit EDIT Rechten keine Termine loeschen.<br>Aktiviert: the Delete button in the Event window will be visible to all users.<br>Manager: the Delete button in the Event window will only be visible to users with \'manager\' rights.",
"eventColor_label" => "Termin Farbe basiert auf",
"eventColor_text" => "In den unterschiedlichen Ansichten werden Termine in der ausgwählten Hintergrundfarbe für den Gruppe der Ersteller oder der Kategorie angezeigt.",
"defVenue_label" => "Default Venue",
"defVenue_text" => "In this text field a venue can be specified which will be copied to the Venue field of the event form when adding new events.",
"xField1_label" => "Extra field 1",
"xField2_label" => "Extra field 2",
"xFieldx_text" => "Optional text field. If this field is included in an event template in the Views section, the field will be added as a free format text field to the Event window form and to the events displayed in all calendar views and pages.<br>• label: optional text label for the extra field (max. 15 characters). E.g. \'Email address\', \'Website\', \'Phone number\'<br>• Minimum user rights: the field will only be visible to users with the selected user rights or higher.",
"xField_label" => "Label",
"min_rights" => "Minimum user rights",
"no_color" => 'no color',
"manager_only" => 'Manager',

//settings.php - user accounts settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Eigene Anmeldung",
"selfReg_text" => "Erlaubt Benutzern sich selbst anzumelden um Zugriff auf den Kalender zu haben.<br>User group to which self-registered users will be assigned.",
"selfRegQA_label" => "Self registration question/answer",
"selfRegQA_text" => "When self registration is enabled, during the self-registration process the user will be asked this question and will only be able to self-register if the correct answer is given. When the question field is left blank, no question will be asked.",
"selfRegNot_label" => "Benachrichtigung bei Anmeldung",
"selfRegNot_text" => "Sende eine Email an die Kalender Adresse wenn eine Eigene Anmeldung stattgefunden hat.",
"restLastSel_label" => "Restore last user selections",
"restLastSel_text" => "The last user selections (the Option Panel settings) will be saved and when the user revisits the calendar later, the values will be restored.",
"cookieExp_label" => "'Remember me' cookie expiry days",
"cookieExp_text" => "Number of days before the cookie set by the \'Remember me\' option (during Log In) will expire.",
"answer" => "answer",
"view" => "Anschauen",
"post_own" => "Eigene",
"post_all" => "Alle",
"manager" => 'post/manager',

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"templFields_text" => "Meaning of the numbers:<br>1: Venue field<br>2: Event category field<br>3: Description field<br>4: Extra field 1 (see section Events)<br>5: Extra field 2 (see section Events)<br>6: Email notification data (only if a notification has been requested)<br>7: Date/time added/edited and the associated user(s)<br>8: Attached pdf, image or video files as hyperlinks.<br>The order of the numbers determine the order of the displayed fields.",
"evtTemplate_label" => "Event templates",
"evtTemplate_text" => "The event fields to be displayed in the general calendar views, the upcoming event views and in the hover box with event details can be specified by means of a sequence of numbers.<br>If a number is specified in the sequence, the corresponding field will be displayed.",
"evtTemplGen" => "Gesamtansicht",
"evtTemplUpc" => "Upcoming view",
"evtTemplPop" => "Hover box",
"sortEvents_label" => "Sort events on times or category",
"sortEvents_text" => "In the various views events can be sorted on the following criteria:<br>• event times<br>• event category sequence number",
"yearStart_label" => "Start Monat in der Jahresansicht",
"yearStart_text" => "Wenn ein start Monat konfiguriert wurde (1 - 12), beginnt die Anzeige in der Jahresansicht mit diesem Monat auch beim Wechsel zu vorigen oder darauffolgenden Jahren.<br>Der Wert 0 hat eine spezielle Bedeutung: das start Monat wird vom aktuellen Datum abgeleitet und wird in der ersten Reihe der Monate angezeigt.",
"YvRowsColumns_label" => "Zeilen und Spalten für Jahresansicht",
"YvRowsColumns_text" => "Anzahl der angezeigten Reihen der Jahresansicht.<br>Empfehlung: 4, wodurch 12 oder 16 Monate angezeigt werden.<br>Anzahl der angezeigten Monate in einer Reihe der Jahresansicht.<br>Empfehlung: 3 oder 4.",
"MvWeeksToShow_label" => "Anzahl der angezeigten Wochen in der Monatsansicht",
"MvWeeksToShow_text" => "Anzahl der in der Monatsansicht angezeigten Wochen.<br>Empfehlung: 10, wodurch 2.5 Monate angezeigt werden.<br>The values 0 and 1 have a special meaning:<br>0: display exactly 1 month - blank leading and trailing days.<br>1: display exactly 1 month - display events on leading and trailing days.",
"XvWeeksToShow_label" => "In der Matrixansicht anzuzeigende Wochen",
"XvWeeksToShow_text" => "Anzahl der Kalenderwochen, die in der Matrixansicht angezeigt werden sollen.",
"GvWeeksToShow_label" => "In der Gantt-Chartansicht anzuzeigende Wochen",
"GvWeeksToShow_text" => "Anzahl der Kalenderwochen, die in der Gantt-Chartansicht angezeigt werden sollen.",
"workWeekDays_label" => "Arbeitstage",
"workWeekDays_text" => "Days colored as working days in the calendar views and for instance to be shown in the weeks in Work Month view and Work Week view.<br>Enter the number of each working day.<br>e.g. 12345: Monday - Friday<br>Not entered days are considered to be weekend days.",
"weekStart_label" => "Erster Tag der Woche",
"weekStart_text" => "Geben Sie bitte die Tagnummer des ersten Wochentages ein.",
"lookBackAhead_label" => "Vorschau auf anstehende Termine",
"lookBackAhead_text" => "Anzahl der Tage die zur Ermittlung der Termine im Anstehende Termine, der Todo Liste und RSS feeds verwendet wird.",
"dwStartEndHour_label" => "Erste und letzte Stunde in Tag/Wochen-Ansicht.",
"dwStartEndHour_text" => "Uhrzeit zu der ein normaler Termin beginnt/ended.<br>Eine Einstellung auf z.B. 6 - 18 vermeidet in der Woche/Tag-Ansicht die Anzeige der ungenützten Zeit zwischen Mitternacht und 6:00 und 18:00 und Mitternacht.<br>The time picker, used to enter a time, will also start and end at this hour.",
"dwTimeSlot_label" => "Zeitraster in der Tag/Wochen-Ansicht",
"dwTimeSlot_text" => "Zeitraster der Tag/Wochen-Ansicht in Minuten.<br>Dieser Wert bestimmt zusammen mit der &quotErste Stunde&quot und der &quotLetste Stunde&quot Einstellung die Anzahl der Zeilen in der Tag/Wochen-Ansicht",
"dwTsHeight_label" => "Zeitraster Höhe",
"dwTsHeight_text" => "Höhe einer Zeile des Zeitrasters der Tag/Wochen-Ansicht in Pixel.",
"evtHeadX_label" => "Event layout in Month, Week and Day view",
"evtHeadX_text" => "Templates with placeholders of event fields that should be displayed. The following placeholders can be used:<br>#ts - start time<br>#tx - start and end time<br>#e - event title<br>#o - event owner<br>#v - venue<br>#lv - venue with label \'Venue:\' in front<br>#c - category<br>#lc - category with label \'Category:\' in front<br>#a - age (see note below)<br>#x1 - extra field 1<br>#lx1 - extra field 1 with label from Settings page in front<br>#x2 - extra field 2<br>#lx2 - extra field 2 with label from Settings page in front<br>#/ - new line<br>The fields are displayed in the specified order. Characters other than the placeholders will remain unchanged and will be part of the displayed event.<br>HTML-tags are allowed in the template. E.g. &lt;b&gt;#e&lt;/b&gt;.<br>The | character can be used to split the template in sections. If within a section a #-parameter results in an empty string, the whole section will be omitted.<br>Note: The age is shown if the event is part of a category with \'Repeat\' set to \'every year\' and the year of birth in parentheses is mentioned somewhere in the event\'s description field.",
"monthView" => "Month view",
"wkdayView" => "Week/Day view",
"ownerTitle_label" => "Zeige den Terminersteller im Titel",
"ownerTitle_text" => "In the various calendar views, show the event owner name in front of the event title.",
"showSpanel_label" => "Side panel in Month, Week and Day view",
"showSpanel_text" => "In Month, Week and Day view, right next to the main calendar, the following items can be shown:<br>• a mini calendar which can be used to look back or ahead without changing the date of the main calendar<br>• a decoration image corresponding to the current month<br>• an info area to post messages/announcements for each month.<br>If no items are selected, the side panel will not be shown.<br>See admin_guide.html for details.",
"spMiniCal" => "Mini calendar",
"spImages" => "Images",
"spInfoArea" => "Info area",
"showImgInMV_label" => "Zeigen in der Monatsansicht",
"showImgInMV_text" => "Enable/disable the display in Month view of thumbnail images added to one of the event description fields. When enabled, thumbnails will be shown in the day cells and when disabled, thumbnails will be shown in the on-mouse-over boxes instead.",
"urls" => "URL links",
"emails" => "email links",
"monthInDCell_label" => "Monat in jeder Tageszelle",
"monthInDCell_text" => "Display for each day in month view the 3-letter month name",
"evtWinSmall_label" => "Reduced event window",
"evtWinSmall_text" => "When adding/editing events, the Event window will show a subset of the input fields. To show all fields, a plus-sign can be selected.",
"mapViewer_label" => "Map viewer URL",
"mapViewer_text" => "If a map viewer URL has been specified, an address in the event\'s venue field enclosed in !-marks, will be shown as an Address button in the calendar views. When hovering this button the textual address will be shown and when clicked, a new window will open where the address will be shown on the map.<br>The full URL of a map viewer should be specified, to the end of which the address can be joined.<br>Examples:<br>Google Maps: https://maps.google.com/maps?q=<br>OpenStreetMap: https://www.openstreetmap.org/search?query=<br>If this field is left blank, addresses in the Venue field will not be show as an Address button.",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Datum Format (dd mm yyyy)",
"dateFormat_text" => "Text string defining the format of event dates in the calendar views and input fields.<br>Possible characters: y = Jahr, m = Monat and d = Tag.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>y-m-d: 2013-10-31<br>m.d.y: 10.31.2013<br>d/m/y: 31/10/2013",
"dateFormat_expl" => "Bsp.: y.m.d: 2013.10.31",
"MdFormat_label" => "Datum Format (dd Monat)",
"MdFormat_text" => "Text string defining the format of dates consisting of month and day.<br>Possible characters: M = Monat in text, d = Tag in Ziffern.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>d M: 12 April<br>M, d: July, 14",
"MdFormat_expl" => "Bsp.: M, d: July, 14",
"MdyFormat_label" => "Datum Format (dd Monat yyyy)",
"MdyFormat_text" => "Text string defining the format of dates consisting of day, month and year.<br>Possible characters: d = Tag in Ziffern, M = month in text, y = year in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>d M y: 12 April 2013<br>M d, y: July 8, 2013",
"MdyFormat_expl" => "Bsp.: M d, y: Juli 8, 2013",
"MyFormat_label" => "Datum Format (Monat yyyy)",
"MyFormat_text" => "Text string defining the format of dates consisting of month and year.<br>Possible characters: M = month in text, y = year in Ziffern.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>M y: April 2013<br>y - M: 2013 - Juli",
"MyFormat_expl" => "Bsp.: M y: April 2013",
"DMdFormat_label" => "Datum Format (Wochentag tt Monat)",
"DMdFormat_text" => "Text string defining the format of dates consisting of weekday, day and month.<br>Possible characters: WD = weekday in text, M = month in text, d = day in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>WD d M: Freitag 12 April<br>WD, M d: Monday, July 14",
"DMdFormat_expl" => "Bsp.: WD - M d: Sunday - April 6",
"DMdyFormat_label" => "Datum Format (Wochentag d Monat yyyy)",
"DMdyFormat_text" => "Text string defining the format of dates consisting of weekday, day, month and year.<br>Possible characters: WD = weekday in text, M = month in text, d = day in digits, y = year in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>WD d M y: Friday 13 April 2013<br>WD - M d, y: Monday - July 16, 2013",
"DMdyFormat_expl" => "Bsp.: WD, M d, y: Monday, July 16, 2013",
"timeFormat_label" => "Time format (hh mm)",
"timeFormat_text" => "Text string defining the format of event times in the calendar views and input fields.<br>Possible characters: h = hours, H = hours with leading zeros, m = minutes, a = am/pm (optional), A = AM/PM (optional).<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>h:m: 18:35<br>h.m a: 6.35 pm<br>H:mA: 06:35PM",
"timeFormat_expl" => "Bsp.: hh:mm: 22:35 (EU; 24-Std.) und hh:mmA: 10:35PM (US; 12-Std.)",
"weekNumber_label" => "Wochennummern",
"weekNumber_text" => "Anzeige der Wochennummern in Jahr, Monat und Tag-Ansicht.",
"time_format_us" => "12-Stunden AM/PM",
"time_format_eu" => "24-Stunden",
"sunday" => "Sonntag",
"monday" => "Montag",
"time_zones" => "ZEIT-ZONEN",
"dd_mm_yyyy" => "tt-mm-jjjj",
"mm_dd_yyyy" => "mm-tt-jjjj",
"yyyy_mm_dd" => "jjjj-mm-tt",

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
"services_label" => "Erinnerungsdiensten",
"services_text" => "Services available to sent event reminders. If a service is not selected, the corresponding section in the Event window will be suppressed. If no service is selected, no event reminders will be sent.",
"smsCarrier_label" => "SMS carrier template",
"smsCarrier_text" => "The SMS carrier template is used to compile the SMS gateway email address: ppp#sss@carrier, where . . .<br>• ppp: optional text string to be added before the phone number<br>• #: placeholder for the recipient\'s mobile phone number (the calendar will replace the # by the phone number)<br>• sss: optional text string to be inserted after the phone number, e.g. a username and password, required by some operators<br>• @: separator character<br>• carrier: carrier address (e.g. mail2sms.com)<br>Template examples: #@xmobile.com, 0#@carr2.int, #myunmypw@sms.gway.net.",
"smsCountry_label" => "SMS country code",
"smsCountry_text" => "If the SMS gateway is located in a different country than the calendar, then the country code of the country where the calendar is used must be specified.<br>Select whether the \'+\' or \'00\' prefix is required.",
"smsSubject_label" => "SMS subject template",
"smsSubject_text" => "If specified, the text in this template will be copied in the subject field of the SMS email messages sent to the carrier. The text may contain the character #, which will be replaced by the phone number of the calendar or the event owner (depending on the setting above).<br>Example: \'FROMFHONENUMBER=#\'.",
"smsAddLink_label" => "Add event report link to SMS",
"smsAddLink_text" => "When checked, a link to the event report will be added to each SMS. By opening this link on their mobile phone, recipients will be able to view the event details.",
"maxLenSms_label" => "Maximum SMS Nachrichtenlänge",
"maxLenSms_text" => "SMS messages are sent with utf-8 character encoding. Messages up to 70 characters will result in one single SMS message; messages > 70 characters, with many Unicode characters, may be split into multiple messages.",
"calPhone_label" => "Kalenders Telefonnummer",
"calPhone_text" => "The phone number used as sender ID when sending SMS notification messages.<br>Format: free, max. 20 digits (some countries require a telephone number, other countries also accept alphabetic characters).<br>If no SMS service is active or if no SMS subject template has been defined, this field may be blank.",
"notSenderEml_label" => "Sender of notification emails",
"notSenderEml_text" => "When the calendar sends reminder emails, the sender ID of the email can be either the calendar email address, or the email address of the user who created the event.<br>In case of the user email address, the receiver can reply to the email.",
"notSenderSms_label" => "Sender of notification SMSes",
"notSenderSms_text" => "When the calendar sends reminder SMSes, the sender ID of the SMS message can be either the calendar phone number, or the phone number of the user who created the event.<br>If \'user\' is selected and a user account has no phone number specified, the calendar phone number will be taken.<br>In case of the user phone number, the receiver can reply to the message.",
"defRecips_label" => "Default list of recipients",
"defRecips_text" => "If specified, this will be the default recipients list for email and/or SMS notifications in the Event window. If this field is left blank, the default recipient will be the event owner.",
"maxEmlCc_label" => "Max. no. of recipients per email",
"maxEmlCc_text" => "Normally ISPs allow a maximum number of recipients per email. When sending email or SMS reminders, if the number of recipients is greater than the number specified here, the email will be split in multiple emails, each with the specified maximum number of recipients.",
"mailServer_label" => "Mail server",
"mailServer_text" => "PHP mail is suitable for unauthenticated mail in small numbers. For greater numbers of mail or when authentication is required, SMTP mail should be used.<br>Using SMTP mail requires an SMTP mail server. The configuration parameters to be used for the SMTP server must be specified hereafter.",
"smtpServer_label" => "SMTP server name",
"smtpServer_text" => "If SMTP mail is selected, the SMTP server name should be specified here. For example gmail SMTP server: smtp.gmail.com.",
"smtpPort_label" => "SMTP port number",
"smtpPort_text" => "If SMTP mail is selected, the SMTP port number should be specified here. For example 25, 465 or 587. Gmail for example uses port number 465.",
"smtpSsl_label" => "SSL (Secure Sockets Layer)",
"smtpSsl_text" => "If SMTP mail is selected, select here if the secure sockets layer (SSL) should be enabled. For gmail: enabled",
"smtpAuth_label" => "SMTP authentication",
"smtpAuth_text" => "If SMTP authentication is selected, the username and password specified hereafter will be used to authenticate the SMTP mail.<br>For gmail for instance, the user name is the part of your email address before the @.",
"cc_prefix" => "Country code starts with prefix + or 00",
"general" => "General",
"email" => "Email",
"sms" => "SMS",
"php_mail" => "PHP mail",
"smtp_mail" => "SMTP mail (Bitte folgende Felder ausfüllen)",

//settings.php - periodic function settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"cronHost_label" => "Cron job host",
"cronHost_text" => "Specify where the cron job is hosted which periodically starts the script \'lcalcron.php\'.<br>• local: cron job runs on the same server<br>• remote: cron job runs on a remote server or lcalcron.php is started manually (testing)<br>• IP address: cron job runs on a remote server with the specified IP address.",
"cronSummary_label" => "Admin cron job Zusammenfassung",
"cronSummary_text" => "Sende eine cron job Zusammenfassung zum Kalender Administrator.<br>Aktivieren ist nur sinnvoll wenn ein cron job aktiviert wurde für der Kalender",
"chgSummary_label" => "Daily calendar changes summary",
"chgSummary_text" => "Anzahl der Tage die für Änderungen zurück geschaut wird.<br>Bei 0 wird keine Email versandt.",
"icsExport_label" => "Daily export of iCal events",
"icsExport_text" => "If enabled: All events in the date range -1 week until +1 year will be exported in iCalendar format in a .ics file in the \'files\' folder.<br>The file name will be the calendar name with blanks replaced by underscores. Old files will be overwritten by new files.",
"eventExp_label" => "Event expiry days",
"eventExp_text" => "Number of days after the event due date when the event expires and will be automatically deleted.<br>If 0 or if no cron job is running, no events will be automatically deleted.",
"maxNoLogin_label" => "Max. Anzahl an Tagen ohne sich einzuloggen",
"maxNoLogin_text" => "Wenn sich ein Benutzer länger als diese Zeit nicht einloggt, wird der Benutzer automatisch wieder gelöscht.<br>Wenn der Wert au 0 gesetzt wird, werden keine Benutzer automatisch gelöscht.",
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
"log_log_in" => "Einloggen",
"log_remember_me" => "Automatisch Einloggen",
"log_register" => "Registrieren",
"log_change_my_data" => "Meine Daten ändern",
"log_save" => "Ändern",
"log_un_or_em" => "Benutzername oder Email",
"log_un" => "Benutzername",
"log_em" => "Email",
"log_ph" => "Mobile Telefonnummer",
"log_answer" => "Ihre Antwort",
"log_pw" => "Passwort",
"log_new_un" => "Neuer Benutzername",
"log_new_em" => "Neue Email",
"log_new_pw" => "Neues Passwort",
"log_con_pw" => "Passwortbestätigung",
"log_pw_msg" => "Hier sind Ihr Einlogdetails für Kalender",
"log_pw_subject" => "Ihr Passwort",
"log_npw_subject" => "Ihr neues Passwort",
"log_npw_sent" => "Ihr neues Passwort wurde gesendet",
"log_registered" => "Registrierung erfolgreich - Ihr Passwort wurde per Email gesendet",
"log_em_problem_not_sent" => "Email Problem - Ihr Passwort kann nicht gesendet werden",
"log_em_problem_not_noti" => "Email Problem - Administrator konnte nicht informiert werden",
"log_un_exists" => "Benutzername existiert schon",
"log_em_exists" => "Email Adresse existiert schon",
"log_un_invalid" => "Ungültiger Benutzername (min. Länge 2: A-Z, a-z, 0-9, und _-.)",
"log_em_invalid" => "Ungültige Email Adresse",
"log_ph_invalid" => "Ungültige Mobilnummer",
"log_sra_wrong" => "Incorrect answer to the question",
"log_sra_wrong_4x" => "You have answered incorrectly 4 times - try again in 30 minutes",
"log_un_em_invalid" => "Dieser Benutzername/Email ist ungültig",
"log_un_em_pw_invalid" => "Ihr Benutzername/Email oder Passwort ist falsch",
"log_pw_error" => "Passwort stimmt nicht überein",
"log_no_un_em" => "Bitte Benutzernamen oder Email eingeben",
"log_no_un" => "Bitte Benutzername eingeben",
"log_no_em" => "Bitte Email eingeben",
"log_no_pw" => "Bitte Passwort eingeben",
"log_no_rights" => "Einloggen nicht möglich: keine Berechtigung – Administrator kontaktieren",
"log_send_new_pw" => "Sende neues Passwort",
"log_new_un_exists" => "Neuer Benutzername existiert schon",
"log_new_em_exists" => "Neue Email Adresse existiert schon",
"log_ui_language" => "Sprache der Benutzeroberfläche",
"log_new_reg" => "New user registration",
"log_date_time" => "Datum/Zeit",
"log_time_out" => "Time out",

//categories.php
"cat_list" => "Kategorieliste",
"cat_edit" => "Bearbeiten",
"cat_delete" => "Löschen",
"cat_add_new" => "Neue Kategorie anlegen",
"cat_add" => "Hinzufügen",
"cat_edit_cat" => "Kategorie bearbeiten",
"cat_sort" => "Sortiere nach Name",
"cat_cat_name" => "Kategoriebezeichnung",
"cat_symbol" => "Symbol",
"cat_symbol_repms" => "Symbol der Kategorie (Ersetzt minisquare)",
"cat_symbol_eg" => "Bsp.: A, X, ♥, ⛛",
"cat_matrix_url_link" => "URL link (shown in matrix view)",
"cat_seq_in_menu" => "Reihenfolge im Menü",
"cat_cat_color" => "Kategoriefarbe",
"cat_text" => "Text",
"cat_background" => "Hintergrund",
"cat_select_color" => "Wähle Farbe",
"cat_subcats" => "Sub-<br>categories",
"cat_subcats_opt" => "Subcategories (optional)",
"cat_url" => "URL",
"cat_name" => "Name",
"cat_save" => "Aktualisieren",
"cat_added" => "Kategorie hinzugefügt",
"cat_updated" => "Kategorie aktualisiert",
"cat_deleted" => "Kategorie gelöscht",
"cat_not_added" => "Kategorie nicht hinzugefügt",
"cat_not_updated" => "Kategorie nicht aktualisiert",
"cat_not_deleted" => "Kategorie nicht gelöscht",
"cat_nr" => "#",
"cat_repeat" => "Wiederholung",
"cat_every_day" => "Täglich",
"cat_every_week" => "Wöchentlich",
"cat_every_month" => "Monatlich",
"cat_every_year" => "Jährlich",
"cat_overlap" => "Überschneidung<br>erlaubt<br>(gap)",
"cat_need_approval" => "Ereignis benötigt<br>Bestätigung",
"cat_no_overlap" => "Keine Überschneidung erlaubt",
"cat_same_category" => "gleiche Kategorie",
"cat_all_categories" => "alle Kategorien",
"cat_gap" => "gap",
"cat_ol_error_text" => "Fehlermeldung, bei Überschneidung",
"cat_no_ol_note" => "Hinweis: Bereits existierende Ereignisse werden nicht geprüft können andere überschneiden",
"cat_ol_error_msg" => "Terminüberschneidung - wählen Sie eine andere Zeit",
"cat_no_ol_error_msg" => "Overlap error message missing",
"cat_duration" => "Termindauer<br>!: fest",
"cat_default" => "standard (keine Endzeit)",
"cat_fixed" => "fest",
"cat_event_duration" => "Termindauer",
"cat_olgap_invalid" => "Invalid overlap gap",
"cat_duration_invalid" => "Ungültiger Termindauer",
"cat_no_url_name" => "URL link name missing",
"cat_invalid_url" => "Ungültiger URL",
"cat_day_color" => "Tag Farbe",
"cat_day_color1" => "Tag Farbe (Jahr/Matrix Ansicht)",
"cat_day_color2" => "Tag Farbe (Monat/Woche/Tag Ansicht)",
"cat_approve" => "Ereignisse benötigen Bestätigung",
"cat_check_mark" => "Häkchen",
"cat_label" => "label",
"cat_mark" => "markieren",
"cat_name_missing" => "Kategoriename fehlt",
"cat_mark_label_missing" => "Prüfe Markierung/Bezeichnung fehlt",

//users.php
"usr_list_of_users" => "Benutzerliste",
"usr_name" => "Benutzername",
"usr_email" => "E-mail",
"usr_phone" => "Mobilnummer",
"usr_phone_br" => "Mobile Telefon<br>nummer",
"usr_number" => "Benutzernummer",
"usr_number_br" => "Benutzer<br>nummer",
"usr_language" => "Sprache",
"usr_ui_language" => "User interface Sprache",
"usr_group" => "Gruppe",
"usr_password" => "Passwort",
"usr_edit_user" => "Benutzer Profil bearbeiten",
"usr_add" => "Benutzer hinzufügen",
"usr_edit" => "Bearbeiten",
"usr_delete" => "Löschen",
"usr_login_0" => "Erstes Einloggen",
"usr_login_1" => "Letztes",
"usr_login_cnt" => "Anzahl",
"usr_add_profile" => "Profil anlegen",
"usr_upd_profile" => "Profil aktualisieren",
"usr_if_changing_pw" => "Nur für Passwortänderung",
"usr_pw_not_updated" => "Passwort nicht erneuert",
"usr_added" => "Benutzer angelegt",
"usr_updated" => "Benutzerprofil aktualisiert",
"usr_deleted" => "Benutzer gelöscht",
"usr_not_deleted" => "Benutzer nicht gelöscht",
"usr_cred_required" => "Benutzername, Email und Passwort werden benötigt",
"usr_name_exists" => "Benutzername existiert schon",
"usr_email_exists" => "Email Adresse existiert schon",
"usr_un_invalid" => "Ungültiger Benutzername (min. Länge 2: A-Z, a-z, 0-9, und _-.)",
"usr_em_invalid" => "Email Adresse ist ungültig",
"usr_ph_invalid" => "Ungültige Mobilnummer",
"usr_cant_delete_yourself" => "Sie können sich nicht selbst löschen",
"usr_go_to_groups" => "Gehe zu den Gruppen",

//groups.php
"grp_list_of_groups" => "Benutzergruppenliste",
"grp_name" => "Gruppenname",
"grp_priv" => "Benutzerrechte",
"grp_categories" => "Kategorien",
"grp_all_cats" => "alle Kategorien",
"grp_rep_events" => "Wiederkehrende<br>Termine",
"grp_m-d_events" => "Multi-day<br>events",
"grp_priv_events" => "Private<br>Termine",
"grp_upload_files" => "Upload<br>files",
"grp_send_sms" => "Send<br>SMSes",
"grp_tnail_privs" => "Thumbnail<br>privileges",
"grp_priv0" => "Keine Rechte",
"grp_priv1" => "Kalender anzeigen",
"grp_priv2" => "Erstelle/bearbeite eigene Termine",
"grp_priv3" => "Erstelle/bearbeite alle Termine",
"grp_priv4" => "Erstelle/bearbeite + manager rights",
"grp_priv9" => "Administrator",
"grp_may_post_revents" => "May post repeating events",
"grp_may_post_mevents" => "May post multi-day events",
"grp_may_post_pevents" => "May post private events",
"grp_may_upload_files" => "May upload files",
"grp_may_send_sms" => "May send SMSes",
"grp_tn_privs" => "Thumbnails privileges",
"grp_tn_privs00" => "keine",
"grp_tn_privs11" => "view all",
"grp_tn_privs20" => "manage own",
"grp_tn_privs21" => "m. own/v. all",
"grp_tn_privs22" => "manage all",
"grp_edit_group" => "Benutzergruppe bearbeiten",
"grp_sub_to_rights" => "Subject to user rights",
"grp_view" => "Ansicht",
"grp_add" => "Hinzufügen",
"grp_edit" => "Bearbeiten",
"grp_delete" => "Löschen",
"grp_add_group" => "Gruppe hinzufügen",
"grp_upd_group" => "Aktualisiere Gruppe",
"grp_added" => "Gruppe hinzugefügt",
"grp_updated" => "Gruppe aktualisiert",
"grp_deleted" => "Gruppe gelöscht",
"grp_not_deleted" => "Gruppe nicht gelöscht",
"grp_in_use" => "Gruppe ist in gebrauch",
"grp_cred_required" => "Gruppenname, Rechte und Kategorien werden benötigt",
"grp_name_exists" => "Gruppenname wird schon benutzt",
"grp_name_invalid" => "Ungültiger Gruppenname (min. Länge 2: A-Z, a-z, 0-9, und _-.)",
"grp_background" => "Hintergrundfarbe",
"grp_select_color" => "Farbe wählen",
"grp_invalid_color" => "Ungültiges Farbformat (#XXXXXX wo X = HEX-wert)",
"grp_go_to_users" => "Go to Benutzer",

//database.php
"mdb_dbm_functions" => "Aufgaben",
"mdb_noshow_tables" => "Tabellen können nicht gelesen werden",
"mdb_noshow_restore" => "Keine Quellsicherungsdatei ausgewaehlt",
"mdb_file_not_sql" => "Quell Backup-Datei sollte eine SQL-Datei sein (Erweiterung '.sql')",
"mdb_compact" => "Komprimieren",
"mdb_compact_table" => "Tabelle Komprimieren",
"mdb_compact_error" => "Fehler",
"mdb_compact_done" => "abgeschlossen",
"mdb_purge_done" => "Gelöschte Termine endgültig gelöscht",
"mdb_backup" => "Backup",
"mdb_backup_table" => "Backup der Tabelle",
"mdb_backup_file" => "Backup Datei",
"mdb_backup_done" => "abgeschlossen",
"mdb_records" => "records",
"mdb_restore" => "Wiederherstellung der Datenbank",
"mdb_restore_table" => "Wiederherstellung der Tabellen",
"mdb_inserted" => "records inserted",
"mdb_db_restored" => "Datenbank wiederhergestellt.",
"mdb_no_bup_match" => "Backup file doesn't match calendar version.<br>Database not restored.",
"mdb_events" => "Termine",
"mdb_delete" => "löschen",
"mdb_undelete" => "wiederherstellen",
"mdb_between_dates" => "occurring between",
"mdb_deleted" => "Termine gelöscht",
"mdb_undeleted" => "Termine undeleted",
"mdb_file_saved" => "Backup Datei gespeichert.",
"mdb_file_name" => "Datei Name",
"mdb_start" => "Start",
"mdb_no_function_checked" => "Keine Operation(en) ausgewählt",
"mdb_write_error" => "Writing backup file failed<br>Check permissions of 'files/' directory",

//import/export.php
"iex_file" => "Ausgewählte Datei",
"iex_file_name" => "Ziel-Dateiname",
"iex_file_description" => "iCal Datei Beschreibung",
"iex_filters" => "Terminfilter",
"iex_export_usr" => "Export User Profiles",
"iex_import_usr" => "Import User Profiles",
"iex_upload_ics" => "iCal Datei hochladen",
"iex_create_ics" => "iCal Datei generieren",
"iex_tz_adjust" => "Timezone adjustments",
"iex_upload_csv" => "CSV Datei hochladen",
"iex_upload_file" => "Datei hochladen",
"iex_create_file" => "Datei generieren",
"iex_download_file" => "Datei herunterladen",
"iex_fields_sep_by" => "Felder getrennt durch",
"iex_birthday_cat_id" => "Geburtstags Kategorie ID",
"iex_default_grp_id" => "Default user group ID",
"iex_default_cat_id" => "Kategorie ID",
"iex_default_pword" => "Default password",
"iex_if_no_pw" => "If no password specified",
"iex_replace_users" => "Replace existing users",
"iex_if_no_grp" => "if no user group found",
"iex_if_no_cat" => "wenn keine Kategorie gefunden wird",
"iex_import_events_from_date" => "Termine importieren ab:",
"iex_no_events_from_date" => "Keine Ereignisse zum genannten Datum gefunden",
"iex_see_insert" => "Siehe Beschreibung rechts",
"iex_no_file_name" => "Dateiname fehlt",
"iex_no_begin_tag" => "Ungültige iCal Datei (BEGIN-tag fehlt)",
"iex_bad_date" => "Falsches Datum",
"iex_date_format" => "Datum Format",
"iex_time_format" => "Zeit Format",
"iex_number_of_errors" => "Anzahl der Fehler in der Liste",
"iex_bgnd_highlighted" => "Hintergrund hervorgehoben",
"iex_verify_event_list" => "Überprüfe Termin Liste, korrigiere Fehler und wähle",
"iex_add_events" => "Termine zur Datenbank hinzufügen",
"iex_verify_user_list" => "Verify User List, correct possible errors and click",
"iex_add_users" => "Add Users to Database",
"iex_select_ignore_birthday" => "Wähle Geburtstag aus und lösche Checkbox wie gewünscht",
"iex_select_ignore" => "Wähle Löschen Checkbox um den Termin zu ignorieren",
"iex_check_all_ignore" => "Check all ignore boxes",
"iex_title" => "Titel",
"iex_venue" => "Ort",
"iex_owner" => "Ersteller",
"iex_category" => "Kategorie",
"iex_date" => "Datum",
"iex_end_date" => "Ende",
"iex_start_time" => "Anfang",
"iex_end_time" => "Endzeit",
"iex_description" => "Beschreibung",
"iex_repeat" => "Wiederholen",
"iex_birthday" => "Geburtstag",
"iex_ignore" => "Löschen",
"iex_events_added" => "Termine hinzugefügt",
"iex_events_dropped" => "Termine übersprungen (bereits vorhanden)",
"iex_users_added" => "users added",
"iex_users_deleted" => "users deleted",
"iex_csv_file_error_on_line" => "CSV Datei Fehler in Zeile",
"iex_between_dates" => "von - bis",
"iex_changed_between" => "Erstellt/Geändert von - bis",
"iex_select_date" => "Datum auswählen",
"iex_select_start_date" => "Start Datum auswählen",
"iex_select_end_date" => "Ende Datum auswählen",
"iex_group" => "User group",
"iex_name" => "User name",
"iex_email" => "Email address",
"iex_phone" => "Phone number",
"iex_lang" => "Language",
"iex_pword" => "Password",
"iex_all_groups" => "all groups",
"iex_all_cats" => "alle Kategorien",
"iex_all_users" => "alle Benutzer",
"iex_no_events_found" => "Keine Termine gefunden",
"iex_file_created" => "Datei generiert",
"iex_write error" => "Schreiben der Export Datei fehlgeschlagen<br>Zugriffsrechte des 'files/' Verzeichnisses überprüfen",
"iex_invalid" => "invalid",
"iex_in_use" => "already in use",

//styling.php
"sty_css_intro" =>  "Values specified on this page should adhere to the CSS standards",
"sty_preview_theme" => "Vorschau Theme",
"sty_preview_theme_title" => "Preview displayed theme in calendar",
"sty_stop_preview" => "Stop Vorschau",
"sty_stop_preview_title" => "Stop preview of displayed theme in calendar",
"sty_save_theme" => "Speicher Theme",
"sty_save_theme_title" => "Save displayed theme to database",
"sty_backup_theme" => "Backup Theme",
"sty_backup_theme_title" => "Backup theme from database to file",
"sty_restore_theme" => "Restore Theme",
"sty_restore_theme_title" => "Restore theme from file to display",
"sty_default_luxcal" => "Standard LuxCal theme",
"sty_close_window" => "Close Window",
"sty_close_window_title" => "Schließe Fenster",
"sty_theme_title" => "Theme title",
"sty_general" => "General",
"sty_grid_views" => "Grid / Views",
"sty_hover_boxes" => "Hover Boxes",
"sty_bgtx_colors" => "Background/text colors",
"sty_bord_colors" => "Border colors",
"sty_fontfam_sizes" => "Font family/sizes",
"sty_font_sizes" => "Schriftgröße",
"sty_miscel" => "Miscellaneous",
"sty_background" => "Background",
"sty_text" => "Text",
"sty_color" => "Color",
"sty_example" => "Example",
"sty_theme_previewed" => "Vorschau mode - you can now navigate the calendar. Wähle Stop Vorschau, wenn beendet.",
"sty_theme_saved" => "Theme saved to database",
"sty_theme_backedup" => "Theme backed up from database to file:",
"sty_theme_restored1" => "Theme restored from file:",
"sty_theme_restored2" => "Press Save Theme to save the theme to the database",
"sty_unsaved_changes" => "WARNUNG – Ungesicherte Änderungen!\\nWenn Sie das Fenster schließen, sind alle Änderungen verloren.", //don't remove '\\n'
"sty_number_of_errors" => "Anzahl der Fehler in der Liste",
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
"sty_WARN" => "Warnmeldung",
"sty_ERRO" => "Fehlermeldung",
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
"sty_GWTC" => "Wochennr / time column",
"sty_GWD1" => "Wochentag Monat 1",
"sty_GWD2" => "Wochentag Monat 2",
"sty_GWE1" => "Wochenende Monat 1",
"sty_GWE2" => "Wochenende Monat 2",
"sty_GOUT" => "outside month",
"sty_GTOD" => "day cell today",
"sty_GSEL" => "day cell selected day",
"sty_LINK" => "URL and email links",
"sty_CHBX" => "todo check box",
"sty_EVTI" => "event title in views",
"sty_HNOR" => "normaler Termin",
"sty_HPRI" => "privater Termin",
"sty_HREP" => "wiederholender Termin",
"sty_POPU" => "hover popup box",
"sty_TbSw" => "top bar shadow (0:no 1:yes)",
"sty_CtOf" => "content offset",

//lcalcron.php
"cro_sum_header" => "CRON JOB ZUSAMMENFASSUNG",
"cro_sum_trailer" => "ENDE DER ZUSAMMENFASSUNG",
"cro_sum_title_eve" => "EVENTS EXPIRED",
"cro_nr_evts_deleted" => "Anzahl der gelöschten Termine",
"cro_sum_title_eml" => "EMAIL ERINNERUNGEN",
"cro_sum_title_sms" => "SMS ERINNERUNGEN",
"cro_not_sent_to" => "Erinnerungen gesendet an",
"cro_no_reminders_due" => "Keine Erinnerungen gesendet",
"cro_subject" => "Betreff",
"cro_event_due_in" => "Termin fällig in",
"cro_event_due_today" => "Das folgende Ereignis ist heute fällig",
"cro_due_in" => "Fällig in",
"cro_due_today" => "Heute fällig",
"cro_days" => "Tag(en)",
"cro_date_time" => "Datum / Zeit",
"cro_title" => "Titel",
"cro_venue" => "Ort",
"cro_description" => "Beschreibung",
"cro_category" => "Kategorie",
"cro_status" => "Status",
"cro_sum_title_chg" => "KALENDER ÄNDERUNGEN",
"cro_nr_changes_last" => "Anzahl der Änderungen in den",
"cro_report_sent_to" => "Report gesendet an",
"cro_no_report_sent" => "Kein Report gesendet",
"cro_sum_title_use" => "BENUTZER PRÜFUNG",
"cro_nr_accounts_deleted" => "Anzahl der gelöschten Konten",
"cro_no_accounts_deleted" => "Keine Konten gelöscht",
"cro_sum_title_ice" => "EXPORTED EVENTS",
"cro_nr_events_exported" => "Number of events exported in iCalendar format to file",

//messaging.php
"mes_no_msg_no_recip" => "Not sent, no recipients found",

//explanations
"xpl_manage_db" =>
"<h3>Datenbank Wartung</h3>
<p>Auf dieser Seite können folgende Aufgaben ausgewählt werden:</p>
<h6>Komprimieren</h6>
<p>Wenn ein Termin gelöscht wird, wird dieser nur als 'gelöscht' markiert, wird aber
nicht aus der Datenbank gelöscht. Diese Funktion löscht Termine endgültig aus der Datenbank
die vor länger als 30 Tagen gelöscht wurden und gibt den belegten Speicher wieder frei.</p>
<h6>Backup</h6>
<p>Diese Funktion generiert ein Backup der kompletten Datenbank (Struktur und Inhalt) im .sql Format.</p>
Das Backup wird in dem Verzeichnis <strong>files/</strong> mit dem Namen:
<kbd>dump-cal-lcv-yyyymmdd-hhmmss.sql</kbd> (wobei 'cal' = calendar ID, 'lcv' = calendar version und 
'yyyymmdd-hhmmss' = Jahr, Monat, Tag, Stunde, Minuten und Sekunden).</p>
<p>Die Backup Datei kann zur Wiederherstellung der Datenbank (Struktur und Inhalt) verwendet werden,
via the restore function described below or by using for instance the 
<strong>phpMyAdmin</strong> tool, which is provided by most web hosts.</p>
<h6>Restore database</h6>
<p>This function will restore the calendar database with the contents of the 
uploaded backup file (file type .sql).</p>
<p>Bei Wiederherstellung der Datenbank, WERDEN ALLE AKTUELLEN DATEN VERLOREN GEHEN!</p>
<h6>Events</h6>
<p>This function will delete or undelete events which are occurring between the 
specified dates. If a date is left blank, there is no date limit; so if both 
dates are left blank, ALLE TERMINE WERDEN GELOESCHT!</p><br>
<p>IMPORTANT: When the database is compacted (see above), the events which are 
permanently removed from the database cannot be undeleted anymore!</p>",

"xpl_import_csv" =>
"<h3>CSV Import Anleitung</h3>
<p>Diese Seite dient zum Hochladen und Einlesen von Terminen in den Kalender mit Hilfe einer
<strong>'Comma Separated Values (CSV)'</strong> Text Datei.</p>
<p>Die Reihenfolge der Spalten in der CSV Datei muss wie folgt sein: Titel, Ort, Kategorie ID (siehe unterhalb),
Anfang, Ende Datum, Anfang, Ende Zeit und Beschreibung. Die erste Zeile der CSV Datei dient als Beschreibung für
die Spalten und wird ignoriert.</p>
<h6>Beispiel CSV Datei</h6>
<p>Beispiel CSV Dateien befinden sich in dem Verzeichnis 'files/' der LuxCal Installation.</p>
<h6>Field separator</h6>
The field separator can be any character, for instance a comma, semi-colon, etc.
The field separator character must be unique and may not be part of the text, 
numbers or dates in the fields.
<h6>Datum und Zeit Format</h6>
<p>Das links ausgewählte Format für das Datum und die Zeit muss den Einträgen in der zu verarbeiteten
CSV Datei entsprechen.</p>
<h6>Kategorien Tabelle</h6>
<p>Der Kalender verwendet ID Nummern um diese zu definieren. Die Kategorie IDs in der CSV
Datei sollten mit denen des Kalenders übereinstimmen oder leer sein.</p>
<p>Wenn im nächsten Schritt ein Termin als 'Geburtstag' gekennzeichnet werden soll, muss die <strong>Geburtstag
Kategorie ID</strong> entsprechend der nachfolgenden Liste gesetzt werden.</p>
<p class='hired'>Warnung: Importieren Sie nie mehr als 100 Termine auf einmal!</p>
<p>Für diesen Kalender sind folgende Kategorien definiert:</p>",

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
"<h3>iCalendar Import Anleitung</h3>
<p>Diese Seite dient zum Hochladen und Einlesen von einer <strong>iCalendar</strong> Datei mit Terminen
in den LuxCal Kalender.</p>
<p>Der Datei Inhalt muss dem [<u><a href='http://tools.ietf.org/html/rfc5545'
target='_blank'>RFC5545 Standard</a></u>] der 'Internet Engineering Task Force' entsprechen.</p>
<p>Nur Termine werden importiert; andere iCal Elemente wie: To-Do, Journal, Frei /
Belegt, Zeitzone und Alarm werden ignoriert.</p>
<p>Beispiel iCalendar Dateien sind im dem Verzeichnis 'files/' der LuxCal Installation zu finden.</p>
<h6>Timezone adjustments</h6>
<p>If your iCalendar file contains events in a different timezone and the dates/times 
should be adjusted to the calendar timezone, then check 'Timezone adjustments'.</p>
<h6>Kategorien Tabelle</h6>
<p>Der Kalender verwendet ID Nummern um diese zu definieren. Die Kategorie IDs in der CSV
Datei sollten mit denen des Kalenders übereinstimmen oder leer sein.</p>
<p class='hired'>Warnung: Importieren Sie nie mehr als 80 Termine auf einmal!</p>
<p>Für diesen Kalender sind folgende Kategorien definiert:</p>",

"xpl_export_ical" =>
"<h3>iCalendar Export Anleitung</h3>
<p>Diese Seite dient zum Erzeugen und Herunterladen von einer <strong>iCalendar</strong> Datei mit Terminen
aus dem LuxCal Kalender.</p>
<p>Der <b>iCal Dateiname</b> (ohne Erweiterung) ist optional. Generierte Dateien werden am Server mit dem 
angegebenen Dateinamen, oder mit dem Namen der Kalender im Verzeichnis \"files/\" gespeichert.
Die Dateierweiterung ist <b>.ics</b>.
Am Server im Verzeichnis \"files/\" gespeicherte Dateien mit dem selben Namen werden durch die neue Datei überschrieben.</p>
<p>Die <b>iCal Datei Beschreibung</b> (z.B. 'Besprechungen 2013') ist optional. Wenn sie angegeben ist,
wird sie in die exportierte iCal Datei eingetragen.</p>
<p><b>Termin Filter</b><br>
Die zu exportierenden Termine können gefiltert werden nach:</p>
<ul>
<li>dem Ersteller</li>
<li>der Kategorie</li>
<li>dem Anfang Datum</li>
<li>hinzugefügt/zuletzt geändert Datum</li>
</ul>
<p>Jeder Filter ist optional.<br>
Ein leeres Datum bedeutet: keine Filterung</p>
<br>
<p>Der Inhalt der Datei entspricht dem [<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 Standard</a></u>]
der 'Internet Engineering Task Force'.</p>
<p>Beim <b>Herunterladen</b> der exportierten iCal Datei wird das Datum und die Uhrzeit zum Namen hinzugefügt.</p>
<p>Beispiel iCalendar Dateien sind im Verzeichnis 'files/' der LuxCal Installation zu finden.</p>"
);
?>
