<?php
/*
= LuxCal admin interface language file =

Tradotto in Italiano da Angelo.G. - per commenti contattare elghisa@gmail.com

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","4.7.8");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Nessuno",
"no" => "no",
"yes" => "si",
"own" => "own",
"all" => "tutti",
"or" => "o",
"back" => "Indietro",
"ahead" => "Ahead",
"close" => "Chiudi",
"always" => "sempre",
"at_time" => "@", //date and time separator (e.g. 30-01-2020 @ 10:45)
"times" => "times",
"cat_seq_nr" => "category sequence nr",
"rows" => "rows",
"columns" => "columns",
"hours" => "hours",
"minutes" => "minuti",
"user_group" => "colore del proprietario",
"event_cat" => "colore della categoria",
"id" => "ID",
"username" => "Nome utente",
"password" => "Password",
"public" => "Public",
"logged_in" => "Logged in",
"logged_in_l" => "logged in",

//settings.php - fieldset headers + general
"set_general_settings" => "Calendario",
"set_navbar_settings" => "Barra di Navigazione",
"set_event_settings" => "Eventi",
"set_user_settings" => "Utenti",
"set_upload_settings" => "File Uploads",
"set_reminder_settings" => "Reminders",
"set_perfun_settings" => "Funzioni Periodiche (rilevanti solo se viene definito un cron job)",
"set_sidebar_settings" => "Barra laterale (rilevante se in uso)",
"set_view_settings" => "Visualizzazione",
"set_dt_settings" => "Data/Ora",
"set_save_settings" => "Salva Impostazioni",
"set_test_mail" => "Test Mail",
"set_mail_sent_to" => "Test mail sent to",
"set_mail_sent_from" => "This test mail was sent from your calendar's Settings page",
"set_mail_failed" => "Sending test mail failed - recipient(s)",
"set_missing_invalid" => "impostazioni mancanti o non valide (sfondo evidenziato)",
"set_settings_saved" => "Impostazioni Calendario salvate",
"set_save_error" => "Errore database - Salvataggio impostazioni calendario fallito",
"hover_for_details" => "Passare con il mouse sopra le descrizioni per spiegazioni dettagliate",
"default" => "default",
"enabled" => "abilitato",
"disabled" => "disabilitato",
"pixels" => "pixel",
"warnings" => "Warnings",
"notices" => "Notices",
"visitors" => "Visitors",
"no_way" => "Non siete autorizzato ad eseguire quest'azione.",

//settings.php - general settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"versions_label" => "Versions",
"versions_text" => "• calendar version, followed by the database in use<br>• PHP version<br>• database version",
"calTitle_label" => "Titolo del Calendario",
"calTitle_text" => "Mostrato nella barra superiore del calendario e usato nelle notifiche via email.",
"calUrl_label" => "URL del Calendario",
"calUrl_text" => "L\'indirizzo del sito web del Calendario.",
"logoPath_label" => "Path/name of logo image",
"logoPath_text" => "If specified, a logo image will be displayed in the left upper corner of the calendar. If also a link to a parent page is specified (see below), then the logo will be a hyper-link to the parent page. The logo image should have a maximum height and width of 70 pixels.",
"backLinkUrl_label" => "Link alla pagina superiore",
"backLinkUrl_text" => "URL della pagina padre. Se specificato, verrà visualizzato un pulsante Indietro a sinistra della Barra di Navigazione con il collegamento a questo URL.<br>Per esempio per tornare indietro alla pagina da cui è stato lanciato il calendario. If a logo path/name has been specified (see above), then no Back button will be displayed, but the logo will become the back link instead.",
"timeZone_label" => "Fuso orario",
"timeZone_text" => "Il fuso orario del calendario, usato per calcolare l\'ora corrente.",
"see" => "vedi",
"notifChange_label" => "Send notification of calendar changes",
"notifChange_text" => "When a user adds, edits or deletes an event, a notification message will be sent to the specified recipients.",
"chgRecipList" => "Recipient list",
"maxXsWidth_label" => "Max. width of small screens",
"maxXsWidth_text" => "For displays with a width smaller than the specified number of pixels, the calendar will run in a special responsive mode, leaving out certain less important elements.",
"rssFeed_label" => "Link ai feed RSS",
"rssFeed_text" => "Se abilitato: Per gli utenti che hanno almeno il diritto di \'vedere\', sarà visibile un link al feed RSS nel piè di pagina del calendario e sarà aggiunto un link al feed RSS all'intestazione HTML delle pagine del calendario.",
"logging_label" => "Log calendar data",
"logging_text" => "The calendar can log error, warning and notice messages and visitors data. Error messages are always logged. Logging of warning and notice messages and visitors data can each be disabled or enabled by checking the relevant check boxes. All error, warning and notice messages are logged in the file \'logs/luxcal.log\' and visitors data are logged in the files \'logs/hitlog.log\' and \'logs/botlog.log\'.<br>Note: PHP error, warning and notice messages are logged at a different location, determined by your ISP.",
"maintMode_label" => "Maintenance mode",
"maintMode_text" => "When enabled, the calendar will run in maintenance mode, which means that useful maintenance information will be shown in the calendar footer bar.",
"reciplist" => "The recipient list can contain user names, email addresses, phone numbers and names of files with recipients (enclosed by square brackets), separated by semicolons. Files with recipients with one recipient per line should be located in the folder \'reciplists\'. When omitted, the default file extension is .txt",
"calendar" => "calendario",
"user" => "utente",
"database" => "database",

//settings.php - navigation bar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"contact_label" => "Contact button",
"contact_text" => "If enabled: A Contact button will be displayed in the side menu. Clicking this button will open a contact form, which can be used to send a message to the calendar administrator.",
"optionsPanel_label" => "Options panel menus",
"optionsPanel_text" => "Enable/disable menus in the options panel.<br>• The calendar menu is available to the admin to switch calendars. (enabling only useful if several calendars are installed)<br>• The view menu can be used to select one of the calendar views.<br>• The groups menu can be used to display only events created by users in the selected groups.<br>• The users menu can be used to display only events created by the selected users.<br>• The categories menu can be used to display only events belonging to the selected event categories.<br>• The language menu can be used to select the user interface language. (enabling only useful if several languages are installed)<br>Note: If no menus are selected, the option panel button will not be displayed.",
"calMenu_label" => "calendar",
"viewMenu_label" => "view",
"groupMenu_label" => "groups",
"userMenu_label" => "utenti",
"catMenu_label" => "categorie",
"langMenu_label" => "lingua",
"availViews_label" => "Available calendar views",
"availViews_text" => "Calendar views available to publc and logged-in users specified by means of a comma-separated list with view numbers. Meaning of the numbers:<br>1: year view<br>2: month view (7 days)<br>3: work month view<br>4: week view (7 days)<br>5: work week view<br>6: day view<br>7: upcoming events view<br>8: changes view<br>9: matrix view (categories)<br>10: matrix view (users)<br>11: gantt chart view",
"viewButtons_label" => "View buttons on navigation bar",
"viewButtons_text" => "View buttons on the navigation bar for public and logged-in users, specified by means of a comma-separated list of view numbers.<br>If a number is specified in the sequence, the corresponding button will be displayed. If no numbers are specified, no View buttons will be displayed.<br>Meaning of the numbers:<br>1: Year<br>2: Full Month<br>3: Work Month<br>4: Full Week<br>5: Work Week<br>6: Day<br>7: Upcoming<br>8: Changes<br>9: Matrix-C<br>10: Matrix-U<br>11: Gantt Chart<br>The order of the numbers determine the order of the displayed buttons.<br>For example: \'24\' means: display \'Full Month\' and \'Full Week\' buttons.",
"defaultViewL_label" => "Vista predefinita all\'avvio (large display)",
"defaultViewL_text" => "Default calendar view on startup for public and logged-in users using large displays.<br>Scelta consigliata: Mese.",
"defaultViewS_label" => "Vista predefinita all\'avvio (small display)",
"defaultViewS_text" => "Default calendar view on startup for public and logged-in users using small displays.<br>Scelta consigliata: Eventi Prossimi.",
"language_label" => "Lingua predefinita dell\'interfaccia utente",
"language_text" => "I file ui-{lingua}.php, ai-{lingua}.php, ug-{lingua}.php e ug-layout.png devono essere presenti nella directory lang/. {lingua} = lingua dell\'interfaccia utente selezionata. I nomi dei file devono essere tutti minuscoli !",

//settings.php - events settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"privEvents_label" => "Inserimento di eventi privati",
"privEvents_text" => "Gli eventi privati sono visibili solo all\'utente che ha inserito l\'evento.<br>Abilitato: gli utenti possono inserire eventi privati.<br>Default: quando si aggiunge un evento la casella \'privato\' nella finestra Eventi sarà selezionata per default.<br>Sempre: quando si aggiunge un evento questo sarà sempre privato, la casella \'privato\' nella finestra Eventi non sarà visibile.",
"aldDefault_label" => "New events all-day by default",
"aldDefault_text" => "When adding events, in the Event window the \'All day\' checkbox will be checked by default. In addition, if no start time is specified the event automatically becomes an all-day event.",
"details4All_label" => "Mostra i dettagli dell\'evento a tutti gli utenti",
"details4All_text" => "Se abilitato: i dettagli dell\'evento saranno visibili al proprietario dell\'evento e a tutti gli altri utenti.<br>Se disabilitato: i dettagli dell\'evento saranno visibili solo al proprietario dell\'evento e agli utenti con diritti \'crea tutti gli eventi\'. Gli utenti con minori diritti non vedranno i dettagli dell\'evento.",
"evtDelButton_label" => "Show delete button in Event window",
"evtDelButton_text" => "Disabled: the Delete button in the Event window will not be visible. So users with edit rights will not be able to delete events.<br>Enabled: the Delete button in the Event window will be visible to all users.<br>Manager: the Delete button in the Event window will only be visible to users with \'manager\' rights.",
"eventColor_label" => "Colore dell'evento basato sul",
"eventColor_text" => "Gli eventi nelle varie viste possono essere mostrati con il colore assegnato all\'utente che ha creato l\'evento o con il colore della categoria dell\'evento.",
"defVenue_label" => "Default Venue",
"defVenue_text" => "In this text field a venue can be specified which will be copied to the Venue field of the event form when adding new events.",
"xField1_label" => "Extra field 1",
"xField2_label" => "Extra field 2",
"xFieldx_text" => "Optional text field. If this field is included in an event template in the Views section, the field will be added as a free format text field to the Event window form and to the events displayed in all calendar views and pages.<br>• label: optional text label for the extra field (max. 15 characters). E.g. \'Email address\', \'Website\', \'Phone number\'<br>• Minimum user rights: the field will only be visible to users with the selected user rights or higher.",
"xField_label" => "Label",
"min_rights" => "Minimum user rights",
"no_color" => 'no color',
"manager_only" => 'manager',

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Auto registrazione",
"selfReg_text" => "Consente agli utenti di registrarsi e di avere accesso al calendario.<br>User group to which self-registered users will be assigned.",
"selfRegQA_label" => "Self registration question/answer",
"selfRegQA_text" => "When self registration is enabled, during the self-registration process the user will be asked this question and will only be able to self-register if the correct answer is given. When the question field is left blank, no question will be asked.",
"selfRegNot_label" => "Notifica dell\'Auto registrazione",
"selfRegNot_text" => "Invia una email di notifica all\'indirizzo email del calendario quando è avvenuta un\'auto registrazione.",
"restLastSel_label" => "Restore last user selections",
"restLastSel_text" => "The last user selections (the Option Panel settings) will be saved and when the user revisits the calendar later, the values will be restored.",
"cookieExp_label" => "Giorni di validità del cookie \'Ricordamelo\'",
"cookieExp_text" => "Numero di giorni prima che il cookie impostato dall\'opzione \'Ricordamelo\' (durante il Log In) scada.",
"answer" => "answer",
"view" => "Vedere",
"post_own" => "Creare i propri eventi",
"post_all" => "Creare tutti gli eventi",
"manager" => 'crea/gestisci',

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"templFields_text" => "Meaning of the numbers:<br>1: Venue field<br>2: Event category field<br>3: Description field<br>4: Extra field 1 (see section Events)<br>5: Extra field 2 (see section Events)<br>6: Email notification data (only if a notification has been requested)<br>7: Date/time added/edited and the associated user(s)<br>8: Attached pdf, image or video files as hyperlinks.<br>The order of the numbers determine the order of the displayed fields.",
"evtTemplate_label" => "Event templates",
"evtTemplate_text" => "The event fields to be displayed in the general calendar views, the upcoming event views and in the hover box with event details can be specified by means of a sequence of numbers.<br>If a number is specified in the sequence, the corresponding field will be displayed.",
"evtTemplGen" => "General view",
"evtTemplUpc" => "Upcoming view",
"evtTemplPop" => "Hover box",
"sortEvents_label" => "Sort events on times or category",
"sortEvents_text" => "In the various views events can be sorted on the following criteria:<br>• event times<br>• event category sequence number",
"yearStart_label" => "Mese d\'inizio nella vista Anno",
"yearStart_text" => "Se si specifica un mese d\'inizio (1 - 12), nella vista Anno il calendario comincierà sempre con questo mese e l\'anno di questo primo mese cambierà solo con il primo giorno dello stesso mese dell\'anno succesivo.<br>Il valore 0 ha un significato particolare: il mese d\'inizio si basa sulla data corrente e cadrà nella prima riga di mesi.",
"YvRowsColumns_label" => "Righe e colonne da mostrare nella vista Anno",
"YvRowsColumns_text" => "Numero di righe da quattro mesi ciascuna da mostrare nella vista Anno.<br>Scelta consigliata: 4, che consente di vedere assieme 16 mesi.<br>Numero di mesi da mostrare in ciascuna riga nella vista Anno.<br>Scelta consigliata: 3 o 4.",
"MvWeeksToShow_label" => "Settimane da mostrare nella vista Mese",
"MvWeeksToShow_text" => "Numero di settimane da mostrare nella vista Mese.<br>Scelta consigliata: 10, che consente di avere sotto mano 2,5 mesi.<br>Il valore 0 e 1 hanno un significato speciale:<br>0: mostra esattamente 1 mese - i giorni precedenti e successivi sono vuoti.<br>1: mostra esattamente 1 mese - mostra glip eventi nei giorni precedenti e successivi.",
"XvWeeksToShow_label" => "Weeks to show in Matrix view",
"XvWeeksToShow_text" => "Number of calendar weeks to display in Matrix view.",
"GvWeeksToShow_label" => "Weeks to show in Gantt chart view",
"GvWeeksToShow_text" => "Number of calendar weeks to display in Gantt Chart view.",
"workWeekDays_label" => "Giorni lavorativi settimanali",
"workWeekDays_text" => "Days colored as working days in the calendar views and for instance to be shown in the weeks in Work Month view and Work Week view.<br>Enter the number of each working day.<br>e.g. 12345: Monday - Friday<br>Not entered days are considered to be weekend days.",
"weekStart_label" => "Primo giorno della settimana",
"weekStart_text" => "Enter the day number of the first day of the week.",
"lookBackAhead_label" => "Giorni da guardare al futuro",
"lookBackAhead_text" => "Numero di giorni futuri da considerare per gli eventi prossimi, nell\'Elenco Cose da Fare e nei feed RSS.",
"dwStartEndHour_label" => "Start and end hour in Day/Week view",
"dwStartEndHour_text" => "Hours at which a normal day of events starts and ends.<br>E.g. setting these values to 6 and 18 will avoid wasting space in Week/Day view for the quiet time between midnight and 6:00 and 18:00 and midnight.<br>The time picker, used to enter a time, will also start and end at these hours.",
"dwTimeSlot_label" => "Intervallo di tempo nelle viste Giorno/Settimana",
"dwTimeSlot_text" => "Visualizzazione degli intervalli di tempo in minuti nelle viste Giorno/Settimana.<br>Questo valore, assieme all\'Ora d\'inizio (vedi prima) determina il numero di righe nelle viste Giorno/Settimana.",
"dwTsHeight_label" => "Altezza intervallo di tempo",
"dwTsHeight_text" => "Altezza in pixel della visualizzazione degli intervalli di tempo nelle viste Giorno/Settimana.",
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
"showImgInMV_label" => "Mostra in vista Mese",
"showImgInMV_text" => "Enable/disable the display in Month view of thumbnail images added to one of the event description fields. When enabled, thumbnails will be shown in the day cells and when disabled, thumbnails will be shown in the on-mouse-over boxes instead.",
"urls" => "URL links",
"emails" => "email links",
"monthInDCell_label" => "Mese in tutte le celle dei giorni",
"monthInDCell_text" => "Nella vista Mese mostra il nome del mese in 3 lettere in ogni giorno",
"evtWinSmall_label" => "Reduced event window",
"evtWinSmall_text" => "When adding/editing events, the Event window will show a subset of the input fields. To show all fields, a plus-sign can be selected.",
"mapViewer_label" => "Map viewer URL",
"mapViewer_text" => "If a map viewer URL has been specified, an address in the event\'s venue field enclosed in !-marks, will be shown as an Address button in the calendar views. When hovering this button the textual address will be shown and when clicked, a new window will open where the address will be shown on the map.<br>The full URL of a map viewer should be specified, to the end of which the address can be joined.<br>Examples:<br>Google Maps: https://maps.google.com/maps?q=<br>OpenStreetMap: https://www.openstreetmap.org/search?query=<br>If this field is left blank, addresses in the Venue field will not be show as an Address button.",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Formato data (dd mm yyyy)",
"dateFormat_text" => "Stringa di testo che definisce il formato della data degli eventi nelle viste del calendario e nei campi d\'inserimento.<br>Caratteri possibili: y = anno, m = mese e d = giorno.<br>Si possono usare caratteri non alfanumerici come separatori e saranno utilizzati così come digitati.<br>Esempi:<br>y-m-d: 2013-10-31<br>m.d.y: 10.31.2013<br>d/m/y: 31/10/2013",
"dateFormat_expl" => "per es. y.m.d: 2013.10.31",
"MdFormat_label" => "Formato Data (dd mese)",
"MdFormat_text" => "Stringa di testo che definisce il formato della data costituita da giorno e mese.<br>Caratteri possibili: M = mese completo, d = giorno in cifre.<br>Si possono usare caratteri non alfanumerici come separatori e saranno utilizzati così come digitati.<br>Esempi:<br>d M: 12 Aprile<br>M, d: Luglio, 14",
"MdFormat_expl" => "per es. M, d: Luglio, 14",
"MdyFormat_label" => "Formato Data (dd mese yyyy)",
"MdyFormat_text" => "Stringa di testo che definisce il formato della data costituita da giorno, mese e anno.<br>Caratteri possibili: d = giorno in cifre, M = mese completo, y = anno in cifre.<br>Si possono usare caratteri non alfanumerici come separatori e saranno utilizzati così come digitati.<br>Esempi:<br>d M y: 12 Aprile 2013<br>M d, y: Luglio 8, 2013",
"MdyFormat_expl" => "per es. M d, y: Luglio 8, 2013",
"MyFormat_label" => "Formato Data (mese yyyy)",
"MyFormat_text" => "Stringa di testo che definisce il formato della data costituita da mese e anno.<br>Caratteri possibili: M = mese completo, y = anno in cifre.<br>Si possono usare caratteri non alfanumerici come separatori e saranno utilizzati così come digitati.<br>Esempi:<br>M y: Aprile 2013<br>y - M: 2013 - Luglio",
"MyFormat_expl" => "per es. M y: Aprile 2013",
"DMdFormat_label" => "Formato Data (giorno dd mese)",
"DMdFormat_text" => "Stringa di testo che definisce il formato della data costituita da giorno della settimana, giorno e mese.<br>Caratteri possibili: WD = giorno della settimana, M = mese completo, d = giorno in cifre.<br>Si possono usare caratteri non alfanumerici come separatori e saranno utilizzati così come digitati.<br>Esempi:<br>WD d M: Venerdì 12 Aprile<br>WD, M d: Lunedì, Luglio 14",
"DMdFormat_expl" => "per es. WD - M d: Domenica - Aprile 6",
"DMdyFormat_label" => "Formato Data (giorno dd mese yyyy)",
"DMdyFormat_text" => "Stringa di testo che definisce il formato della data costituita da giorno della settimana, giorno, mese e anno.<br>Caratteri possibili: WD = giorno della settimana, M = mese completo, d = giorno in cifre, y = anno in cifre.<br>Si possono usare caratteri non alfanumerici come separatori e saranno utilizzati così come digitati.<br>Esempi:<br>WD d M y: Venerdì 13 Aprile 2013<br>WD - M d, y: Lunedì - Luglio 16, 2013",
"DMdyFormat_expl" => "per es. WD, M d, y: Lunedì, Luglio 16, 2013",
"timeFormat_label" => "Formato ora (hh mm)",
"timeFormat_text" => "Stringa di testo che definisce il formato dell\'ora degli eventi nelle viste del calendario e nei campi d\'inserimento.<br>Caratteri possibili: h = ore, H = ore a due cifre, m = minuti, a = am/pm (opzionale), A = AM/PM (opzionale).<br>Si possono usare caratteri non alfanumerici come separatori e saranno utilizzati così come digitati.<br>Esempi:<br>h:m: 18:35<br>h.m a: 6.35 pm<br>H:mA: 06:35PM",
"timeFormat_expl" => "per es. h:m: 22:35 e h:mA: 10:35PM",
"weekNumber_label" => "Mostra il numero delle settimane",
"weekNumber_text" => "La visualizzazione dei numeri delle settimane nelle viste pertinenti può essere attivata o no",
"time_format_us" => "12-ore AM/PM",
"time_format_eu" => "24-ore",
"sunday" => "Domenica",
"monday" => "Lunedì",
"time_zones" => "FUSI ORARI",
"dd_mm_yyyy" => "gg-mm-aaaa",
"mm_dd_yyyy" => "mm-gg-aaaa",
"yyyy_mm_dd" => "aaaa-mm-gg",

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
"calEmail_label" => "Email del Calendario",
"calEmail_text" => "The email address used to receive contact messages and to send or receive notification emails.<br>Formato: \'email\' o \'nome &#8826;email&#8827;\'.",
"calPhone_label" => "Calendar phone number",
"calPhone_text" => "The phone number used as sender ID when sending SMS notification messages.<br>Format: free, max. 20 digits (some countries require a telephone number, other countries also accept alphabetic characters).<br>If no SMS service is active or if no SMS subject template has been defined, this field may be blank.",
"notSenderEml_label" => "Mittente delle email di notifica",
"notSenderEml_text" => "Quando il calendario invia una email, il campo mittente della email può contenere l\'indirizzo email del calendario o l\'indirizzo email dell\'utente che ha creato l\'evento.<br>Se è l\'indirizzo email dell\'utente, il destinatario può rispondere alla email.",
"notSenderSms_label" => "Sender of notification SMSes",
"notSenderSms_text" => "When the calendar sends reminder SMSes, the sender ID of the SMS message can be either the calendar phone number, or the phone number of the user who created the event.<br>If \'user\' is selected and a user account has no phone number specified, the calendar phone number will be taken.<br>In case of the user phone number, the receiver can reply to the message.",
"defRecips_label" => "Default list of recipients",
"defRecips_text" => "If specified, this will be the default recipients list for email and/or SMS notifications in the Event window. If this field is left blank, the default recipient will be the event owner.",
"maxEmlCc_label" => "Max. no. of recipients per email",
"maxEmlCc_text" => "Normally ISPs allow a maximum number of recipients per email. When sending email or SMS reminders, if the number of recipients is greater than the number specified here, the email will be split in multiple emails, each with the specified maximum number of recipients.",
"mailServer_label" => "Server di Posta",
"mailServer_text" => "PHP mail va bene per messaggi non autenticati in piccolo numero. Per un gran numero di messaggi o quando è necessaria l\'autenticazione, si dovrebbe usare SMTP mail.<br>Per usare SMTP mail si deve avere un server di posta SMTP. I parametri di configurazione usati per il server SMTP devono essere specificati nel seguito.",
"smtpServer_label" => "Nome del server SMTP",
"smtpServer_text" => "Se si seleziona SMTP mail il nome del server SMTP deve essere specificato qui. Per esempio per il server SMTP di gmail: smtp.gmail.com.",
"smtpPort_label" => "Numero porta SMTP",
"smtpPort_text" => "Se si seleziona SMTP mail il numero della porta SMTP deve essere specificato qui. Per esempio 25, 465 o 587. Gmail per esempio usa la porta numero 465.",
"smtpSsl_label" => "SSL (Secure Sockets Layer)",
"smtpSsl_text" => "Se si seleziona SMTP mail , selezionare qui se il secure sockets layer (SSL) deve essere abilitato. Per gmail: abilitato",
"smtpAuth_label" => "Autenticazione SMTP",
"smtpAuth_text" => "Se si seleziona l\'autenticazione SMTP, il nome utente e password qui specificate saranno usate per autenticare le mail tramite SMTP.<br>For gmail for instance, the user name is la parte che precede @ del propio indirizzo email.",
"cc_prefix" => "Country code starts with prefix + or 00",
"general" => "General",
"email" => "Email",
"sms" => "SMS",
"php_mail" => "PHP mail",
"smtp_mail" => "SMTP mail (complete fields below)",

//settings.php - periodic function settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"cronHost_label" => "Cron job host",
"cronHost_text" => "Specify where the cron job is hosted which periodically starts the script \'lcalcron.php\'.<br>• local: cron job runs on the same server<br>• remote: cron job runs on a remote server or lcalcron.php is started manually (testing)<br>• IP address: cron job runs on a remote server with the specified IP address.",
"cronSummary_label" => "Riassunto delle operazioni pianificate all\'amministratore",
"cronSummary_text" => "Invia un riassunto delle operazioni pianificate all\'amministratore del calendario.<br>Abilitarlo è utile solo se sul vostro server:<br>• è stata attivata un\'operazione pianificata.",
"chgSummary_label" => "Daily calendar changes summary",
"chgSummary_text" => "Numero di giorni passati da controllare per le modifiche al calendario.<br>Se il numero di giorni è impostato a 0 non sarà inviato alcun sommario delle modifiche.",
"icsExport_label" => "Esportazione giornaliera degli eventi iCal",
"icsExport_text" => "Se abilitato: Tutti gli eventi nell\'intervallo di tempo compreso tra -1 settimana e +1 un anno saranno esportati nel formato iCalendar in un file .ics nella cartella \'files\'.<br>Il nome del file sarà il nome del calendario con spazi bianchi sostituiti da lineette basse. I vecchi file saranno sovrascritti dai file nuovi.",
"eventExp_label" => "Giorni di scadenza dell\'evento",
"eventExp_text" => "Numero di giorni seguenti alla data dell\'evento quando esso scade e viene eliminato automaticamente.<br>Se è 0 o se non c'è alcun cron job in esecuzione, nessun evento sarà eliminato automaticamente.",
"maxNoLogin_label" => "Num. max. di giorni senza aver fatto il log in",
"maxNoLogin_text" => "Se un utente non ha effettuato il log in per un tenmpo pari a questo numero di giorni, il suo account sarà cancellato automaticamente.<br>Se il valore è impostato a 0, gli account utente non saranno mai cancellati.",
"local" => "local",
"remote" => "remote",
"ip_address" => "IP address",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"popFieldsSbar_label" => "Event fields - sidebar hover box",
"popFieldsSbar_text" => "The event fields to be displayed in an overlay when the user hovers an event in the stand-alone sidebar can be specified by means of a sequence of numbers.<br>If no fields are specified at all, no hover box will be displayed.",
"showLinkInSB_label" => "Mostra i link nella barra laterale",
"showLinkInSB_text" => "Visualizza gli URL in una descrizione di un evento come collegamento ipertestuale nella barra laterale degli eventi prossimi",
"sideBarDays_label" => "Giorni avanti da guardare nela barra laterale",
"sideBarDays_text" => "Numero di giorni futuri da considerare per gli eventi nella barra laterale.",

//login.php
"log_log_in" => "Log In",
"log_remember_me" => "Ricordami",
"log_register" => "Registrazione",
"log_change_my_data" => "Modifica i dati",
"log_save" => "Modifica",
"log_un_or_em" => "Nome Utente o Indirizzo e-mail",
"log_un" => "Nome utente",
"log_em" => "Email",
"log_ph" => "Mobile phone number",
"log_answer" => "Your answer",
"log_pw" => "Password",
"log_new_un" => "Nuovo Nome Utente",
"log_new_em" => "Nuovo indirizzo email",
"log_new_pw" => "Nuova password",
"log_con_pw" => "Confirm Password",
"log_pw_msg" => "Questa e' les log in details for calendar",
"log_pw_subject" => "La password",
"log_npw_subject" => "La nuova password",
"log_npw_sent" => "La nuova password è stata inviata.",
"log_registered" => "Registrazione avvenuta - La password è stata inviata per email",
"log_em_problem_not_sent" => "Email problem - your password could not be sent",
"log_em_problem_not_noti" => "Email problem - could not notify the administrator",
"log_un_exists" => "Il nome utente esiste già",
"log_em_exists" => "L'indirizzo email esiste già",
"log_un_invalid" => "Nome utente non valido (lunghezza min 2: A-Z, a-z, 0-9, e _-.) ",
"log_em_invalid" => "Indirizzo email non valido",
"log_ph_invalid" => "Invalid mobile phone number",
"log_sra_wrong" => "Incorrect answer to the question",
"log_sra_wrong_4x" => "You have answered incorrectly 4 times - try again in 30 minutes",
"log_un_em_invalid" => "Il nome utente/email non è valido",
"log_un_em_pw_invalid" => "Il nome utente/email o password non è corretto",
"log_pw_error" => "Passwords not matching",
"log_no_un_em" => "Non è stato inserito il nome utente/email",
"log_no_un" => "Inserire il nome utente",
"log_no_em" => "Inserire l'indirizzo email",
"log_no_pw" => "Non è stata inserita la password",
"log_no_rights" => "Login rifiutato: non si hanno diritti di visualizzazione - Contattare l'amministratore",
"log_send_new_pw" => "Invia una nuova password",
"log_new_un_exists" => "Il nuovo nome utente esiste già",
"log_new_em_exists" => "Il nuovo indirizzo email esiste già",
"log_ui_language" => "Lingua dell'interfaccia utente",
"log_new_reg" => "Registrazione nuovo utente",
"log_date_time" => "Data / ora",
"log_time_out" => "Time out",

//categories.php
"cat_list" => "Elenco delle Categorie",
"cat_edit" => "Modifica",
"cat_delete" => "Elimina",
"cat_add_new" => "Aggiungi una nuova categoria",
"cat_add" => "Aggiungi",
"cat_edit_cat" => "Modifica categoria",
"cat_sort" => "Sort On Name",
"cat_cat_name" => "Nome categoria",
"cat_symbol" => "Symbol",
"cat_symbol_repms" => "Category symbol (replaces minisquare)",
"cat_symbol_eg" => "e.g. A, X, ♥, ⛛",
"cat_matrix_url_link" => "URL link (shown in matrix view)",
"cat_seq_in_menu" => "Sequenza nel menu",
"cat_cat_color" => "Colore categoria",
"cat_text" => "Testo",
"cat_background" => "Fondo",
"cat_select_color" => "Selezione colore",
"cat_subcats" => "Sub-<br>categories",
"cat_subcats_opt" => "Subcategories (optional)",
"cat_url" => "URL",
"cat_name" => "Name",
"cat_save" => "Aggiorna",
"cat_added" => "Categoria aggiunta",
"cat_updated" => "Categoria aggiornata",
"cat_deleted" => "Categoria eliminata",
"cat_not_added" => "Categoria non aggiunta",
"cat_not_updated" => "Categoria non aggiornata",
"cat_not_deleted" => "Categoria non eliminata",
"cat_nr" => "n.",
"cat_repeat" => "Ripeti",
"cat_every_day" => "ogni giorno",
"cat_every_week" => "ogni settimana",
"cat_every_month" => "ogni mese",
"cat_every_year" => "ogni anno",
"cat_overlap" => "Overlap<br>allowed<br>(gap)",
"cat_need_approval" => "Eventi necessitano<br>approvazione",
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
"cat_approve" => "Eventi necessitano approvazione",
"cat_check_mark" => "Segno di spunta",
"cat_label" => "etichetta",
"cat_mark" => "segna",
"cat_name_missing" => "Manca il nome della categoria",
"cat_mark_label_missing" => "Manca il segno di spunta/etichetta",

//users.php
"usr_list_of_users" => "Elenco Utenti",
"usr_name" => "Nome Utente",
"usr_email" => "Indirizzo email",
"usr_phone" => "Mobile phone number",
"usr_phone_br" => "Mobile phone<br>number",
"usr_number" => "User number",
"usr_number_br" => "User<br>number",
"usr_language" => "Language",
"usr_ui_language" => "User interface language",
"usr_group" => "Group",
"usr_password" => "Password",
"usr_edit_user" => "Modifica profilo utente",
"usr_add" => "Aggiungi un nuovo utente",
"usr_edit" => "Modifica",
"usr_delete" => "Elimina",
"usr_login_0" => "Primo login",
"usr_login_1" => "Ultimo login",
"usr_login_cnt" => "N. di Login",
"usr_add_profile" => "Aggiungi profilo",
"usr_upd_profile" => "Aggiorna profilo",
"usr_if_changing_pw" => "Solo se si cambia la password",
"usr_pw_not_updated" => "Password non aggiornata",
"usr_added" => "Utente aggiunto",
"usr_updated" => "Profilo utente aggiornato",
"usr_deleted" => "Utente eliminato",
"usr_not_deleted" => "Utente non eliminato",
"usr_cred_required" => "Sono richiesti il nome utente, indirizzo email e password",
"usr_name_exists" => "Nome utente esistente",
"usr_email_exists" => "Indirizzo email esistente",
"usr_un_invalid" => "Nome utente non valido (lunghezza min. 2: A-Z, a-z, 0-9, e _-.) ",
"usr_em_invalid" => "Indirizzo email non valido",
"usr_ph_invalid" => "Invalid mobile phone number",
"usr_cant_delete_yourself" => "Impossibile eliminare sè stessi",
"usr_go_to_groups" => "Go to Groups",

//groups.php
"grp_list_of_groups" => "Elenco di gruppo",
"grp_name" => "Nome Gruppo",
"grp_priv" => "Diritti",
"grp_categories" => "Event categories",
"grp_all_cats" => "tutte le categorie",
"grp_rep_events" => "Repeating<br>events",
"grp_m-d_events" => "Multi-day<br>events",
"grp_priv_events" => "Private<br>events",
"grp_upload_files" => "Upload<br>files",
"grp_send_sms" => "Send<br>SMSes",
"grp_tnail_privs" => "Thumbnail<br>privileges",
"grp_priv0" => "Nessun diritto di accesso",
"grp_priv1" => "Vedi il calendario",
"grp_priv2" => "Crea/Modifica i propri eventi",
"grp_priv3" => "Crea/Modifica tutti gli eventi",
"grp_priv4" => "Crea/Modifica + diritti di gestione",
"grp_priv9" => "Funzioni d'amministrazione",
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
"grp_edit_group" => "Modifica Gruppo di Utenti",
"grp_sub_to_rights" => "Subject to user rights",
"grp_view" => "View",
"grp_add" => "Add",
"grp_edit" => "Modifica",
"grp_delete" => "Elimina",
"grp_add_group" => "Aggiungi un nuovo gruppo",
"grp_upd_group" => "Modifica Gruppo",
"grp_added" => "Gruppo aggiunto",
"grp_updated" => "Gruppo modificato",
"grp_deleted" => "Gruppo eliminato",
"grp_not_deleted" => "Gruppo non eliminato",
"grp_in_use" => "Gruppo is in use",
"grp_cred_required" => "Sono richiesti il Nome gruppo, Diritti e Categories",
"grp_name_exists" => "Nome gruppo esistente",
"grp_name_invalid" => "Nome gruppo non valido (lunghezza min. 2: A-Z, a-z, 0-9, e _-.) ",
"grp_background" => "Colore di fondo",
"grp_select_color" => "Selezionare Colore",
"grp_invalid_color" => "Formato colore non valido (#XXXXXX dove X = HEX-value)",
"grp_go_to_users" => "Go to Users",

//database.php
"mdb_dbm_functions" => "Funzioni del Database",
"mdb_noshow_tables" => "Impossibile aprire le tabelle",
"mdb_noshow_restore" => "No source backup file selected",
"mdb_file_not_sql" => "Source backup file should be an SQL file (extension '.sql')",
"mdb_compact" => "Compatta il database",
"mdb_compact_table" => "Compatta le tabelle",
"mdb_compact_error" => "Errore",
"mdb_compact_done" => "Fatto",
"mdb_purge_done" => "Eventi cancellati eliminati definitivamente",
"mdb_backup" => "Backup del database",
"mdb_backup_table" => "Backup della tabella",
"mdb_backup_file" => "Backup file",
"mdb_backup_done" => "Fatto",
"mdb_records" => "records",
"mdb_restore" => "Restore database",
"mdb_restore_table" => "Restore table",
"mdb_inserted" => "records inserted",
"mdb_db_restored" => "Database restored.",
"mdb_no_bup_match" => "Backup file doesn't match calendar version.<br>Database not restored.",
"mdb_events" => "Eventi",
"mdb_delete" => "cancella",
"mdb_undelete" => "riattiva",
"mdb_between_dates" => "che si verificano tra",
"mdb_deleted" => "Eventi cancellati",
"mdb_undeleted" => "Eventi riattivati",
"mdb_file_saved" => "File di backup salvato.",
"mdb_file_name" => "Nome file",
"mdb_start" => "Avvio",
"mdb_no_function_checked" => "Nessuna funzione selezionata",
"mdb_write_error" => "Scrittura del file di backup fallita<br>Controllare i permessi della cartella 'files/'",

//import/export.php
"iex_file" => "File selezionato",
"iex_file_name" => "Nome file di destinazione",
"iex_file_description" => "Descrizione file iCal",
"iex_filters" => "Filtro Eventi",
"iex_export_usr" => "Export User Profiles",
"iex_import_usr" => "Import User Profiles",
"iex_upload_ics" => "Upload del file iCal",
"iex_create_ics" => "Crea file iCal",
"iex_tz_adjust" => "Timezone adjustments",
"iex_upload_csv" => "Upload file CSV",
"iex_upload_file" => "Upload File",
"iex_create_file" => "Crea File",
"iex_download_file" => "Download File",
"iex_fields_sep_by" => "Campi separati da",
"iex_birthday_cat_id" => "ID della categoria Compleanni",
"iex_default_grp_id" => "Default user group ID",
"iex_default_cat_id" => "ID categoria predefinita",
"iex_default_pword" => "Default password",
"iex_if_no_pw" => "If no password specified",
"iex_replace_users" => "Replace existing users",
"iex_if_no_grp" => "if no user group found",
"iex_if_no_cat" => "se non si trova alcuna categoria",
"iex_import_events_from_date" => "Importare gli eventi in agenda a partire dal",
"iex_no_events_from_date" => "No events found as of the specified date",
"iex_see_insert" => "vedi istruzioni a destra",
"iex_no_file_name" => "Manca il nome del file",
"iex_no_begin_tag" => "file iCal non valido (manca BEGIN-tag)",
"iex_bad_date" => "Bad date",
"iex_date_format" => "Formato data evento",
"iex_time_format" => "Formato ora evento",
"iex_number_of_errors" => "Numero di errori nell'elenco",
"iex_bgnd_highlighted" => "sfondo evidenziato",
"iex_verify_event_list" => "Verificare l'elenco eventi, correggere gli errori e cliccare",
"iex_add_events" => "Aggiungi Eventi al Database",
"iex_verify_user_list" => "Verify User List, correct possible errors and click",
"iex_add_users" => "Add Users to Database",
"iex_select_ignore_birthday" => "Selezionare Compleanno e le caselle Elimina come si desidera",
"iex_select_ignore" => "Selezionare le caselle Elimina per ignorare l'evento",
"iex_check_all_ignore" => "Check all ignore boxes",
"iex_title" => "Titolo",
"iex_venue" => "Sede",
"iex_owner" => "Proprietario",
"iex_category" => "Categoria",
"iex_date" => "Data",
"iex_end_date" => "Data fine",
"iex_start_time" => "Ora inizio",
"iex_end_time" => "Ora fine",
"iex_description" => "Descrizione",
"iex_repeat" => "Ripetizione",
"iex_birthday" => "Compleanno",
"iex_ignore" => "Elimina",
"iex_events_added" => "eventi aggiunti",
"iex_events_dropped" => "eventi ignorati (già presenti)",
"iex_users_added" => "users added",
"iex_users_deleted" => "users deleted",
"iex_csv_file_error_on_line" => "Errore file CSV alla riga",
"iex_between_dates" => "In agenda tra le date",
"iex_changed_between" => "Aggiunti/modificati tra",
"iex_select_date" => "Selezione data",
"iex_select_start_date" => "Selezionare data inizio",
"iex_select_end_date" => "Selezionare data fine",
"iex_group" => "User group",
"iex_name" => "User name",
"iex_email" => "Email address",
"iex_phone" => "Phone number",
"iex_lang" => "Language",
"iex_pword" => "Password",
"iex_all_groups" => "all groups",
"iex_all_cats" => "tutte le categorie",
"iex_all_users" => "tutti gli utenti",
"iex_no_events_found" => "Nessun evento trovato",
"iex_file_created" => "File creato",
"iex_write error" => "Scrittura del file di export fallita<br>Controllare i permessi della cartella 'files/'",
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
"cro_sum_header" => "RIASSUNTO OPERAZIONI PIANIFICATE",
"cro_sum_trailer" => "FINE RIASSUNTO",
"cro_sum_title_eve" => "EVENTI SCADUTI",
"cro_nr_evts_deleted" => "Numero di eventi eliminati",
"cro_sum_title_eml" => "PROMEMORIA VIA EMAIL",
"cro_sum_title_sms" => "PROMEMORIA VIA SMS",
"cro_not_sent_to" => "Promemoria inviati a",
"cro_no_reminders_due" => "Nessuna data di notifica scaduta",
"cro_subject" => "Oggetto",
"cro_event_due_in" => "L'evento seguente e' previsto tra ",
"cro_event_due_today" => "The following event is due today",
"cro_due_in" => "e' previsto tra ",
"cro_due_today" => "Due today",
"cro_days" => "giorno(i)",
"cro_date_time" => "Data / ora",
"cro_title" => "Titolo",
"cro_venue" => "Sede",
"cro_description" => "Descrizione",
"cro_category" => "Categoria",
"cro_status" => "Status",
"cro_sum_title_chg" => "MODIFICHE AL CALENDARIO",
"cro_nr_changes_last" => "Numero di modifiche dall'ultimo",
"cro_report_sent_to" => "Rapporto inviato a",
"cro_no_report_sent" => "Nessun rapporto inviato via email",
"cro_sum_title_use" => "CONTROLLO ACCOUNT UTENTI",
"cro_nr_accounts_deleted" => "Numero di account eliminati",
"cro_no_accounts_deleted" => "Nessun account eliminato",
"cro_sum_title_ice" => "EVENTI ESPORTATI",
"cro_nr_events_exported" => "Numero di eventi esportati in un file in formato iCalendar",

//messaging.php
"mes_no_msg_no_recip" => "Not sent, no recipients found",

//explanations
"xpl_manage_db" =>
"<h3>Istruzioni per la Gestione del Database</h3>
<p>In questa pagina è possibile selezionare le seguenti funzioni:</p>
<h6>Compatta il database</h6>
<p>Quando un utente cancella un evento, l'evento è segnato come 'cancellato', ma 
non è rimosso dal database. La funzione Compatta il database elimina fisicamente 
questi eventi cancellati e libera lo spazio occupato dall'evento.</p>
<h6>Backup del database</h6>
<p>Questa funzione crea un backup completo del database del calendario (tabelle 
struttura e contenuti) in formato .sql. Il backup sarà salvato nella cartella 
<strong>/files</strong> con il nome:</p> 
<p><kbd>dump-cal-lcv-yyyymmdd-hhmmss.sql</kbd> (dove 'cal' = calendar ID, 'lcv' = 
calendar version and 'yyyymmdd-hhmmss' = anno, mese, giorno, ora, minuti e 
secondi).</p>
<p>Questo file di backup si può usare per ri-creare le tabelle, la struttuta e i 
dati del database, via the restore function described below or by using for 
instance the <strong>phpMyAdmin</strong> tool, which is provided by most web 
hosts.</p>
<h6>Restore database</h6>
<p>This function will restore the calendar database with the contents of the 
uploaded backup file (file type .sql).</p>
<p>When restoring the database, ALL CURRENTLY PRESENT DATA WILL BE LOST!</p>
<h6>Eventi</h6>
<p>Questa funzione cancellerà o riattiverà gli eventi che si verificano tra le 
date specificate. Se si lascia una data in bianco, non ci sono limiti di data;
se entrambe le date sono lasciate in bianco, SARANNO CANCELLATI TUTTI GLI EVENTI!</p><br>
<p>IMPORTANTE: Quando si esegue la compattazione del database (vedi prima), gli eventi
permanentemente eliminati dal database non possono più essere riattivati!</p>",

"xpl_import_csv" =>
"<h3>Istruzioni per l'Import dei file CSV</h3>
<p>Si usa questo modulo per importare nel Calendario Luxcal un file di testo 
<strong>Comma Separated Values (CSV)</strong> con i dati di eventi.</p>
<p>L'ordine delle colonne nel file CSV deve essere: titolo, sede, id categoria (vedi 
poi), data inizio, data fine, ora inizio, ora fine e descrizione. La prima riga del file CSV, 
usata per la descrizione delle colonne, &egrave; ignorata.</p>
<h6>File CSV di esempio</h6>
<p>File CSV d'esempio si possono trovare nella subdirectory '/files' della propria 
installazione di LuxCal.</p>
<h6>Field separator</h6>
The field separator can be any character, for instance a comma, semi-colon, etc.
The field separator character must be unique and may not be part of the text, 
numbers or dates in the fields.
<h6>Formato data e ora</h6>
<p>Il formato data e ora dell'evento a sinistra deve corrispondere al 
formato della data e ora del file CSV di cui si sta facendo l'upload.</p>
<h6>Tabella delle Categorie</h6>
<p>Il calendario usa dei numeri ID per specificare le categorie. Gli ID delle categorie nel file CSV 
devono corrispondere alle categorie usate nel proprio calendario o essere vuoti.</p>
<p>Se in seguito si vogliono rimarcare degli eventi come 'compleanno', l'<strong>ID della categoria 
Compleanno</strong> deve essere impostato al corrispondente ID nell'elenco delle categorie seguente.</p>
<p class='hired'>Warning: Do not import more than 100 events at a time!</p>
<p>Nel calendario attuale, sono state definite le seguenti categorie:</p>",

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
"<h3>Istruzioni per l'Import di file iCalendar</h3>
<p>Si usa questo modulo per importare nel Calendario Luxcal un file <strong>iCalendar</strong> 
con i dati degli eventi.</p>
<p>I contentuti del file devono soddisfare gli standard [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>RFC5545 </a></u>] dell'Internet Engineering Task Force.</p>
<p>Saranno importati solo gli eventi; altri componenti iCal, come: To-Do, Journal, Free / 
Busy, Timezone e Alarm, saranni ignorati.</p>
<h6>Esempi di file iCal</h6>
<p>Esempi di file iCalendar (estensione .ics) si possono trovare nella subdirectory '/files' 
della propria installazione di LuxCal.</p>
<h6>Timezone adjustments</h6>
<p>If your iCalendar file contains events in a different timezone and the dates/times 
should be adjusted to the calendar timezone, then check 'Timezone adjustments'.</p>
<h6>Tabella delle Categorie</h6>
<p>Il calendario usa dei numeri ID per specificare le categorie. Gli ID delle categorie nel file 
iCalendar devono corrispondere alle categorie usate nel proprio calendario 
o essere vuoti.</p>
<p class='hired'>Warning: Do not import more than 100 events at a time!</p>
<p>Nel calendario attuale, sono state definite le seguenti categorie:</p>",

"xpl_export_ical" =>
"<h3>Istruzioni per l'esportazione di file iCalendar</h3>
<p>Si usa questo modulo per estrarre ed esportare un file di eventi <strong>iCalendar</strong> dal 
Calendario LuxCal.</p>
<p>Il <b>nome del file iCal</b> (senza estensione) &egrave; opzionale. I file creati sono 
memorizzati nella cartella \"files/\" del server con il nome specificato, 
oppure con il nome of the calendar. L'estensione del file sar&agrave; <b>.ics</b>.
File esistenti nella cartella \"files/\" del server con lo stesso nome 
saranno sovrascritti dal nuovo file.</p>
<p>La <b>descrizione del file iCal</b> (per es. 'Meetings 2013') &egrave; opzionale. Se viene inserita, 
essa viene aggiunta all'intestazione del file iCal esportato.</p>
<p><b>Filtri</b>: Gli eventi da estrarre possono essere filtrati per:</p>
<ul>
<li>propietario evento</li>
<li>categoria evento</li>
<li>data inizio evento</li>
<li>data aggiunta/ultima modifica evento</li>
</ul>
<p>I filtri sono opzionali. Un campo data vuoto significa: nessun limite</p>
<br>
<p>Il contenuto del file con gli eventi estratti sar&agrave; conforme allo standard
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545</a></u>] 
dell'Internet Engineering Task Force.</p>
<p>Facendo il <b>download</b> del file iCal esportato, saranno aggiunti data e ora
al nome del file scaricato.</p>
<h6>Esempi di file iCal</h6>
<p>Esempi di file iCalendar (estensinoe .ics) si possono trovare nella cartella '/files' 
della propria installazione di LuxCal.</p>"
);
?>
