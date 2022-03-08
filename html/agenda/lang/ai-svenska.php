<?php
/*
= LuxCal admin interface language file =

Translation to swedish by Christer "Scunder" Nordahl. Please send comments to rb@luxsoft.eu.

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","4.7.8");

/* -- Admin Interface texts (ai) -- */

$ax = array(

//general
"none" => "Inga",
"no" => "nej",
"yes" => "ja",
"own" => "own",
"all" => "alla",
"or" => "eller",
"back" => "Tillbaka",
"ahead" => "Ahead",
"close" => "Stäng",
"always" => "alltid",
"at_time" => "kl", //datum och tid avskiljare (t.ex. 30-01-2020 kl 10:45)
"times" => "times",
"cat_seq_nr" => "category sequence nr",
"rows" => "rows",
"columns" => "columns",
"hours" => "hours",
"minutes" => "minuter",
"user_group" => "användargrupp",
"event_cat" => "händelsekategori",
"id" => "ID",
"username" => "Användarnamn",
"password" => "Lösenord",
"public" => "Offentlig",
"logged_in" => "Inloggad",
"logged_in_l" => "inloggad",

//settings.php - fieldset headers + general
"set_general_settings" => "Allmänt",
"set_navbar_settings" => "Verktygsfält",
"set_event_settings" => "Händelser",
"set_user_settings" => "Användarkonton",
"set_upload_settings" => "File Uploads",
"set_reminder_settings" => "Reminders",
"set_perfun_settings" => "Schemalagda funktioner (endast om \'Cron Job\' används)",
"set_sidebar_settings" => "Fristående sidopanel (endast vid användning)",
"set_view_settings" => "Visningar",
"set_dt_settings" => "Datum/tid",
"set_save_settings" => "Spara inställningar",
"set_test_mail" => "Epost-test",
"set_mail_sent_to" => "Epost-test skickades till",
"set_mail_sent_from" => "Denna epost-test skickades från din kalenders Inställningssida",
"set_mail_failed" => "Sending test mail failed - recipient(s)",
"set_missing_invalid" => "saknade eller felaktiga inställningar (se markerad text)",
"set_settings_saved" => "Inställningar sparade",
"set_save_error" => "Fel i databas - inställningar ej sparade",
"hover_for_details" => "Peka på rubriker för förklaringar",
"default" => "förinställt",
"enabled" => "aktiverat",
"disabled" => "inaktiverat",
"pixels" => "punkter",
"warnings" => "Warnings",
"notices" => "Notices",
"visitors" => "Visitors",
"no_way" => "Du har inte behörighet att utföra denna funktion",

//settings.php - general settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"versions_label" => "Versions",
"versions_text" => "• calendar version, followed by the database in use<br>• PHP version<br>• database version",
"calTitle_label" => "Kalendertitel",
"calTitle_text" => "Visas i kalenderns namnlist och i epostmeddelanden.",
"calUrl_label" => "Kalenderns URL (Internet-länk)",
"calUrl_text" => "Kalenderns hemsidesadress.",
"calEmail_label" => "Kalenderns epostadress",
"calEmail_text" => "Epostadressen used to receive contact messages and to send or receive notification emails.<br>Format: \'e-post\' eller \'namn &#8826;e-post&#8827;\'.",
"logoPath_label" => "Path/name of logo image",
"logoPath_text" => "If specified, a logo image will be displayed in the left upper corner of the calendar. If also a link to a parent page is specified (see below), then the logo will be a hyper-link to the parent page. The logo image should have a maximum height and width of 70 pixels.",
"backLinkUrl_label" => "Länk till ursprungssida",
"backLinkUrl_text" => "URL till ursprungssida. En \'Tillbaka\'-knapp som länkar till angiven plats kommer att visas till vänster i verktygsfältet.<br>Kan användas t.ex. för att användaren lätt ska kunna återvända till den sida Kalendern startades ifrån. If a logo path/name has been specified (see above), then no Back button will be displayed, but the logo will become the back link instead.",
"timeZone_label" => "Tidszon",
"timeZone_text" => "Kalenderns tidszon som används till att beräkna tidpunkter.", 
"see" => "se",
"notifChange_label" => "Send notification of calendar changes",
"notifChange_text" => "When a user adds, edits or deletes an event, a notification message will be sent to the specified recipients.",
"chgRecipList" => "Recipient list",
"maxXsWidth_label" => "Max. width of small screens",
"maxXsWidth_text" => "For displays with a width smaller than the specified number of pixels, the calendar will run in a special responsive mode, leaving out certain less important elements.",
"rssFeed_label" => "Länkar för RSS-flöde",
"rssFeed_text" => "Om aktiverat: För användare med rättigheter att visa kalendern blir en \'RSS feed link\' synlig i kalenderns sidfot, och en länk för RSS-flöde kommer att infogas i kalendersidornas HTML-huvud.",
"logging_label" => "Log calendar data",
"logging_text" => "The calendar can log error, warning and notice messages and visitors data. Error messages are always logged. Logging of warning and notice messages and visitors data can each be disabled or enabled by checking the relevant check boxes. All error, warning and notice messages are logged in the file \'logs/luxcal.log\' and visitors data are logged in the files \'logs/hitlog.log\' and \'logs/botlog.log\'.<br>Note: PHP error, warning and notice messages are logged at a different location, determined by your ISP.",
"maintMode_label" => "Maintenance mode",
"maintMode_text" => "When enabled, the calendar will run in maintenance mode, which means that useful maintenance information will be shown in the calendar footer bar.",
"reciplist" => "The recipient list can contain user names, email addresses, phone numbers and names of files with recipients (enclosed by square brackets), separated by semicolons. Files with recipients with one recipient per line should be located in the folder \'reciplists\'. When omitted, the default file extension is .txt",
"calendar" => "kalender",
"user" => "användare",
"database" => "database",

//settings.php - navigation bar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"contact_label" => "Contact button",
"contact_text" => "If enabled: A Contact button will be displayed in the side menu. Clicking this button will open a contact form, which can be used to send a message to the calendar administrator.",
"optionsPanel_label" => "Alternativ-menyer",
"optionsPanel_text" => "Visa/dölj menyer under verktygsfältets Alternativ-knapp.<br>• Kalendermenyn (synlig endast för administratör) används för att byta kalender (om flera kalendrar är installerade).<br>• The view menu can be used to select one of the calendar views.<br>• The groups menu can be used to display only events created by users in the selected groups.<br>• Användarmenyn används för att visa en speciell användares händelser.<br>• Kategorimenyn för att visa en speciell kategori av händelser.<br>• Språkmenyn används för att ändra användargränssnittets språk (om flera språk är installerade).<br>Note: If no menus are selected, the option panel button will not be displayed.",
"calMenu_label" => "kalender",
"viewMenu_label" => "view",
"groupMenu_label" => "groups",
"userMenu_label" => "användare",
"catMenu_label" => "kategorier",
"langMenu_label" => "språk",
"availViews_label" => "Available calendar views",
"availViews_text" => "Calendar views available to publc and logged-in users specified by means of a comma-separated list with view numbers. Meaning of the numbers:<br>1: year view<br>2: month view (7 days)<br>3: work month view<br>4: week view (7 days)<br>5: work week view<br>6: day view<br>7: upcoming events view<br>8: changes view<br>9: matrix view (categories)<br>10: matrix view (users)<br>11: gantt chart view",
"viewButtons_label" => "View buttons on navigation bar",
"viewButtons_text" => "View buttons on the navigation bar for public and logged-in users, specified by means of a comma-separated list of view numbers.<br>If a number is specified in the sequence, the corresponding button will be displayed. If no numbers are specified, no View buttons will be displayed.<br>Meaning of the numbers:<br>1: Year<br>2: Full Month<br>3: Work Month<br>4: Full Week<br>5: Work Week<br>6: Day<br>7: Upcoming<br>8: Changes<br>9: Matrix-C<br>10: Matrix-U<br>11: Gantt Chart<br>The order of the numbers determine the order of the displayed buttons.<br>For example: \'24\' means: display \'Full Month\' and \'Full Week\' buttons.",
"defaultViewL_label" => "Standardvisning vid start (large display)",
"defaultViewL_text" => "Default calendar view on startup for public and logged-in users using large displays.<br>Rekommenderat val: Månad.",
"defaultViewS_label" => "Standardvisning vid start (small display)",
"defaultViewS_text" => "Default calendar view on startup for public and logged-in users using small displays.<br>Rekommenderat val: Kommande.",
"language_label" => "Förinställt språk för användargränssnittet",
"language_text" => "Filerna ui-{språk}.php, ai-{språk}.php, ug-{språk}.php och ug-layout.png ska finnas i lang/ mappen. {språk} = det valda språket till användargränssnittet. Filnamnet ska skrivas med små bokstäver!",

//settings.php - events settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"privEvents_label" => "Skapa privata händelser",
"privEvents_text" => "Privata händelser visas bara för användaren som skapade dom.<br>Aktiverat: Användare kan skapa privata händelser.<br>Förinställt: När ny händelse skapas är alternativrutan \'privat\' normalt markerad.<br>Alltid: När ny händelse skapas blir den alltid privat och alternativrutan \'privat\' i händelsefönstret visas inte.",
"aldDefault_label" => "New events all-day by default",
"aldDefault_text" => "When adding events, in the Event window the \'All day\' checkbox will be checked by default. In addition, if no start time is specified the event automatically becomes an all-day event.",
"details4All_label" => "Visa händelsedetaljer för användarna",
"details4All_text" => "Inaktiverat: Händelsedetaljer är bara synliga för den som skapade händelsen och för användare med rättigheter att skapa/redigera alla händelser.<br>Aktiverat: Händelsedetaljer är synliga för alla användare.<br>Inloggad: Händelsedetaljer är synliga för den som skapade händelsen och för inloggade användare.",
"evtDelButton_label" => "Visa \'Radera\'-knapp i händelsefönstret",
"evtDelButton_text" => "Inaktiverad: \'Radera\'-knappen i händelsefönstret visas inte. Användare med rätt att redigera kan ej radera händelser.<br>Aktiverad: \'Radera\'-knappen i händelsefönstret visas för alla användare.<br>Administratör: \'Radera\'-knappen i händelsefönstret visas endast för användare med administratörs-rättigheter.",
"eventColor_label" => "Händelsers färger baserade på",
"eventColor_text" => "Händelser i de olika kalendervisningarna kan visas i den färg som är kopplad till den grupp till vilken personen som skapade händelsen tillhör, eller i den färg som är kopplad till kategorin.",
"defVenue_label" => "Default Venue",
"defVenue_text" => "In this text field a venue can be specified which will be copied to the Venue field of the event form when adding new events.",
"xField1_label" => "Extra fält 1",
"xField2_label" => "Extra fält 2",
"xFieldx_text" => "Frivilligt textfält. Om detta fält inkluderas i händelsemallen framöver, kommer fältet (textfält i fritt format) att ingå i händelseformuläret och i händelser som visas i alla kalendervisningar och sidor.<br>• etikett: frivillig textetikett för det extra fältet (max. 15 tecken). Exempelvis \'Epostadress\', \'Websida\', \'Telefonnummer\'.<br>• Minimum user rights: the field will only be visible to users with the selected user rights or higher.",
"xField_label" => "Etikett",
"min_rights" => "Minimum user rights",
"no_color" => 'no color',
"manager_only" => "administratör",

//settings.php - user accounts settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Självregistrering",
"selfReg_text" => "Tillåt användare att registrera sig själva för att få tillgång till kalendern.<br>Den användargrupp som självregistrerade kommer att tillhöra.",
"selfRegQA_label" => "Self registration question/answer",
"selfRegQA_text" => "When self registration is enabled, during the self-registration process the user will be asked this question and will only be able to self-register if the correct answer is given. When the question field is left blank, no question will be asked.",
"selfRegNot_label" => "Meddelande om självregistrering",
"selfRegNot_text" => "Skicka ett epostmeddelande till kalenderns epostadress när en självregistrering sker.",
"restLastSel_label" => "Återställ senaste användarval",
"restLastSel_text" => "En användares senaste inställningar på Alternativpanelen sparas, och aktiveras åter vid användarens nästa inloggning.",
"cookieExp_label" => "Giltighetsdagar för \'Kom-ihåg-mig\' cookie",
"cookieExp_text" => "Antal dagar innan cookien (aktiverad vid inloggning genom \'Kom-ihåg-mig\' valet) förfaller.",
"answer" => "answer",
"view" => "visa",
"post_own" => "spara/redigera egna",
"post_all" => "spara/redigera alla",
"manager" => "spara/administratör",

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"templFields_text" => "Siffrorna motsvarar:<br>1: Titelfält<br>2: Kategorifält<br>3: Beskrivningsfält<br>4: Extrafält 1 (se nedan)<br>5: Extrafält 2 (se nedan)<br>6: Epostadress (endast om ett meddelande har begärts)<br>7: Datum/tid skapad/ändrad och den eller de användare som sparat händelsen<br>8: Attached pdf, image or video files as hyperlinks.<br>Siffrornas turordning bestämmer fältens visningsföljd.",
"evtTemplate_label" => "Event templates",
"evtTemplate_text" => "The event fields to be displayed in the general calendar views, the upcoming event views and in the hover box with event details can be specified by means of a sequence of numbers.<br>If a number is specified in the sequence, the corresponding field will be displayed.",
"evtTemplGen" => "General view",
"evtTemplUpc" => "Upcoming view",
"evtTemplPop" => "Hover box",
"sortEvents_label" => "Sort events on times or category",
"sortEvents_text" => "In the various views events can be sorted on the following criteria:<br>• event times<br>• event category sequence number",
"yearStart_label" => "Startmånad i Årsvisning",
"yearStart_text" => "Om en startmånad har angetts (1-12), kommer Årsvisning alltid att börja med denna månad och visa 12 månader framåt.<br>Anges värdet 0 kommer alltid den aktuella månaden (innehållande visningsdagens datum) att vara den första i visningen.",
"YvRowsColumns_label" => "Antal rader och kolumner i års-visning",
"YvRowsColumns_text" => "Antal rader av månader som ska visas i årsvisningen.<br>Observera! Årsvisningen kan visa mer eller mindre är 1 år. T.ex. är 4 kolumner * 3 rader = 12 månader, medan 4 kolumner * 4 rader = 16 månader.<br>Antal månader som ska visas på varje rad i årsvisning.<br>Rekommenderat val: 3 eller 4.",
"MvWeeksToShow_label" => "Antal veckor i månadsvisning",
"MvWeeksToShow_text" => "Antal veckor som ska visas i månadsvisning.<br>Rekommenderat val: 10, vilket ger 2,5 månader att scrolla igenom.<br>Värdena 0 och 1 har speciella betydelser:<br>0: visa exakt en månad med föregående och följande tomma rutor.<br>1: visa exakt en månad med innehåll i föregående och följande rutor.",
"XvWeeksToShow_label" => "Weeks to show in Matrix view",
"XvWeeksToShow_text" => "Number of calendar weeks to display in Matrix view.",
"GvWeeksToShow_label" => "Weeks to show in Gantt chart view",
"GvWeeksToShow_text" => "Number of calendar weeks to display in Gantt Chart view.",
"workWeekDays_label" => "Arbetsveckodagar",
"workWeekDays_text" => "Days colored as working days in the calendar views and for instance to be shown in the weeks in Work Month view and Work Week view.<br>Enter the number of each working day.<br>e.g. 12345: Monday - Friday<br>Not entered days are considered to be weekend days.",
"weekStart_label" => "Veckans första dag",
"weekStart_text" => "Enter the day number of the first day of the week.",
"lookBackAhead_label" => "Antal dagar framöver",
"lookBackAhead_text" => "Antal dagar som ska visas framöver i visningarna Kommande händelser, Att-göra lista och i RSS-flöden.",
"dwStartEndHour_label" => "Start and end hour in Day/Week view",
"dwStartEndHour_text" => "Hours at which a normal day of events starts and ends.<br>E.g. setting these values to 6 and 18 will avoid wasting space in Week/Day view for the quiet time between midnight and 6:00 and 18:00 and midnight.<br>The time picker, used to enter a time, will also start and end at these hours.",
"dwTimeSlot_label" => "Tidsintervall i Dag- och Veckovisning",
"dwTimeSlot_text" => "Antal minuter för varje rad (tidsintervall) i visningarna Dag/Vecka.<br>Detta värde avgör tillsammans med Start- och Sluttimma (se ovan) antalet rader i Dag- och Veckovisning.",
"dwTsHeight_label" => "Radhöjd i Dag- och Veckovisning",
"dwTsHeight_text" => "Radhöjden (angivet i punkter) för varje rad i Dag- och Veckovisning.",
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
"showImgInMV_label" => "Visa i Månadsvy",
"showImgInMV_text" => "Enabled/disable the display of thumbnail images in Month view",
"urls" => "URL länkar",
"emails" => "email links",
"monthInDCell_label" => "Månadsnamn i varje cell",
"monthInDCell_text" => "Visa månadsförkortning på varje dag i Månadsvisning",
"evtWinSmall_label" => "Reduced event window",
"evtWinSmall_text" => "When adding/editing events, the Event window will show a subset of the input fields. To show all fields, a plus-sign can be selected.",
"mapViewer_label" => "Map viewer URL",
"mapViewer_text" => "If a map viewer URL has been specified, an address in the event\'s venue field enclosed in !-marks, will be shown as an Address button in the calendar views. When hovering this button the textual address will be shown and when clicked, a new window will open where the address will be shown on the map.<br>The full URL of a map viewer should be specified, to the end of which the address can be joined.<br>Examples:<br>Google Maps: https://maps.google.com/maps?q=<br>OpenStreetMap: https://www.openstreetmap.org/search?query=<br>If this field is left blank, addresses in the Venue field will not be show as an Address button.",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Händelsers datumformat (dd mm yyyy)",
"dateFormat_text" => "En textsträng som definierar händelsers datumformat i kalendervisningar och inmatningsfält.<br>Giltiga tecken: y = år, m = månad och d = dag.<br>Icke alfanumeriska tecken kan användas som skiljetecken och visas då exakt som angivits.<br>Exempelvis:<br>y-m-d: 2013-10-31<br>m.d.y: 10.31.2013<br>d/m/y: 31/10/2013",
"dateFormat_expl" => "T.ex. y.m.d: 2013.10.31",
"MdFormat_label" => "Datumformat (dd month)",
"MdFormat_text" => "En textsträng som definierar datumformat bestående av månad och dag.<br>Giltiga tecken: M = månad i text, d = dag med siffror.<br>Icke alfanumeriska tecken kan användas som skiljetecken och visas då exakt som angivits.<br>Exempelvis:<br>d M: 12 April<br>M, d: Juli, 14",
"MdFormat_expl" => "T.ex. M, d: Juli, 14",
"MdyFormat_label" => "Datumformat (dd month yyyy)",
"MdyFormat_text" => "En textsträng som definierar datumformat bestående av dag, månad och år.<br>Giltiga tecken: d = dag med siffror, M = månad i text, y = år med siffror.<br>Icke alfanumeriska tecken kan användas som skiljetecken och visas då exakt som angivits.<br>Exempelvis:<br>d M y: 12 April 2013<br>M d, y: Juli 8, 2013",
"MdyFormat_expl" => "T.ex. M d, y: Juli 8, 2013",
"MyFormat_label" => "Datumformat (month yyyy)",
"MyFormat_text" => "En textsträng som definierar datumformat bestående av månad och år.<br>Giltiga tecken: M = månad i text, y = år med siffror.<br>Icke alfanumeriska tecken kan användas som skiljetecken och visas då exakt som angivits.<br>Exempelvis:<br>M y: April 2013<br>y - M: 2013 - Juli",
"MyFormat_expl" => "T.ex. M y: April 2013",
"DMdFormat_label" => "Datumformat (weekday dd month)",
"DMdFormat_text" => "En textsträng som definierar datumformat bestående av veckodag, dag och månad.<br>Giltiga tecken: WD = veckodag i text, M = månad i text, d = dag med siffror.<br>Icke alfanumeriska tecken kan användas som skiljetecken och visas då exakt som angivits.<br>Exempelvis:<br>WD d M: Fredag 12 April<br>WD, M d: Måndag, Juli 14",
"DMdFormat_expl" => "T.ex. WD - M d: Söndag - April 6",
"DMdyFormat_label" => "Datumformat (weekday dd month yyyy)",
"DMdyFormat_text" => "En textsträng som definierar datumformat bestående av veckodag, dag, månad och år.<br>Giltiga tecken: WD = veckodag i text, M = månad i text, d = dag med siffror, y = år med siffror.<br>Icke alfanumeriska tecken kan användas som skiljetecken och visas då exakt som angivits.<br>Exempelvis:<br>WD d M y: Fredag 13 April 2013<br>WD - M d, y: Måndag - Juli 16, 2013",
"DMdyFormat_expl" => "T.ex. WD, M d, y: Måndag, Juli 16, 2013",
"timeFormat_label" => "Tidsformat (hh mm)",
"timeFormat_text" => "En textsträng som definierar händelsers tidsformat i kalendervisningar och inmatningsfält.<br>Giltiga tecken: h = timmar, H = timmar med inledande nollor, m = minuter, a = am/pm (frivilligt), A = AM/PM (frivilligt).<br>Icke alfanumeriska tecken kan användas som skiljetecken och visas då exakt som angivits.<br>Exempelvis:<br>h:m: 18:35<br>h.m a: 6.35 pm<br>H:mA: 06:35PM",
"timeFormat_expl" => "T.ex. h:m: 22:35 och h:mA: 10:35PM",
"weekNumber_label" => "Visa veckonummer",
"weekNumber_text" => "Veckonummer kan visas i visningarna för År, Månad och Vecka.",
"time_format_us" => "12-timmar AM/PM",
"time_format_eu" => "24-timmar",
"sunday" => "Söndag",
"monday" => "Måndag",
"time_zones" => "TIDSZONER",
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
"notSenderEml_label" => "Avsändare för epostmeddelanden",
"notSenderEml_text" => "När kalendern skickar epostmeddelanden anges avsändaren som antingen kalenderadressen eller som adressen till den användare som skapade händelsen.<br>Om man anger användarens epostadress så kan mottagaren svara på meddelandet.",
"notSenderSms_label" => "Sender of notification SMSes",
"notSenderSms_text" => "When the calendar sends reminder SMSes, the sender ID of the SMS message can be either the calendar phone number, or the phone number of the user who created the event.<br>If \'user\' is selected and a user account has no phone number specified, the calendar phone number will be taken.<br>In case of the user phone number, the receiver can reply to the message.",
"defRecips_label" => "Default list of recipients",
"defRecips_text" => "If specified, this will be the default recipients list for email and/or SMS notifications in the Event window. If this field is left blank, the default recipient will be the event owner.",
"maxEmlCc_label" => "Max. no. of recipients per email",
"maxEmlCc_text" => "Normally ISPs allow a maximum number of recipients per email. When sending email or SMS reminders, if the number of recipients is greater than the number specified here, the email will be split in multiple emails, each with the specified maximum number of recipients.",
"mailServer_label" => "Epost-server",
"mailServer_text" => "PHP epost lämpar sig för oautentiserad epost i små mängder. För större mängder epost eller när det krävs autentisering bör SMTP epost användas.<br>Användande av SMTP epost kräver en SMTP epost-server. Konfigurations-inställningarna för SMTP server måste anges här nedan.",
"smtpServer_label" => "SMTP servernamn",
"smtpServer_text" => "Om SMTP epost är valt ska SMTP servernamn anges här. Till exempel - gmail SMTP server: smtp.gmail.com.",
"smtpPort_label" => "SMTP portnummer",
"smtpPort_text" => "Om SMTP epost är valt ska SMTP portnummer anges här. Till exempel 25, 465 or 587. (Gmail använder portnummer 465.)",
"smtpSsl_label" => "SSL (Secure Sockets Layer)",
"smtpSsl_text" => "Om SMTP epost är valt, välj då här ifall secure sockets layer (SSL) ska vara aktiverat. För gmail: enabled",
"smtpAuth_label" => "SMTP autentisering",
"smtpAuth_text" => "Om SMTP autentisering är valt kommer användarnamn och lösenord specificerat här nedan att användas för att autentisera SMTP epost.<br>For gmail for instance, the user name is the part of your email address before the @.",
"cc_prefix" => "Country code starts with prefix + or 00",
"general" => "General",
"email" => "Email",
"sms" => "SMS",
"php_mail" => "PHP epost",
"smtp_mail" => "SMTP epost (complete fields below)",

//settings.php - periodic function settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"cronHost_label" => "Cron job host",
"cronHost_text" => "Specify where the cron job is hosted which periodically starts the script \'lcalcron.php\'.<br>• local: cron job runs on the same server<br>• remote: cron job runs on a remote server or lcalcron.php is started manually (testing)<br>• IP address: cron job runs on a remote server with the specified IP address.",
"cronSummary_label" => "Admin Cron Job sammanställning",
"cronSummary_text" => "Skicka en Cron Job sammanställning till kalenderns administratör.<br>Endast användbart om ett Cron Job har aktiverats för kalendern.",
"chgSummary_label" => "Daily calendar changes summary",
"chgSummary_text" => "Antal dagar att se tillbaka i tiden för sammanställning av kalender-ändringar.<br>Om antal dagar anges med 0 (eller om inget Cron Job är aktiverat) så kommer ingen sammanställning att skickas.",
"icsExport_label" => "Daglig iCal-export av händelser",
"icsExport_text" => "Alla händelser 1 vecka bakåt i tiden till 1 år framåt kan exporteras i iCalendar format som en .ics fil i \'files\' mappen.<br>Filnamnet blir kalenderns namn med blanksteg ersatta av understrykningstecken. Äldre filer ersätts av nya filer.",
"eventExp_label" => "Händelsers förfallodagar",
"eventExp_text" => "Antal dagar efter händelsedatum då händelsen förfaller och raderas.<br>Om antal dagar anges med 0 (eller om inget Cron Job är aktiverat) så kommer inga händelser att raderas.",
"maxNoLogin_label" => "Max antal dagar ej inloggad",
"maxNoLogin_text" => "Om en användare inte varit inloggad x antal dagar kommer dennes konto att raderas.<br>Om antal dagar anges med 0 kommer användarkonton aldrig att raderas.",
"local" => "local",
"remote" => "remote",
"ip_address" => "IP address",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"popFieldsSbar_label" => "Händelsefält i sidopanelens inforuta",
"popFieldsSbar_text" => "De händelsefält som ska visas i inforutan när användaren pekar på en händelse i den fristående sidopanelen kan väljas med hjälp av en siffersekvens.<br>Om inga fält väljs visas inte inforutan.",
"showLinkInSB_label" => "Visa länkar i sidopanelen",
"showLinkInSB_text" => "Visa URL:er i händelsers beskrivningsfält som aktiva hyperlänkar i sidopanelens Kommande-visning.",
"sideBarDays_label" => "Antal dagar framöver i sidopanelen",
"sideBarDays_text" => "Ange de antal dagar framåt i tiden som ska visas i sidopanelen.",

//login.php
"log_log_in" => "Logga in",
"log_remember_me" => "Kom ihåg mig",
"log_register" => "Registrera dig",
"log_change_my_data" => "Ändra mina uppgifter", 
"log_save" => "Ändra", 
"log_un_or_em" => "Användarnamn eller Epost",
"log_un" => "Användarnamn",
"log_em" => "Epost",
"log_ph" => "Mobile phone number",
"log_answer" => "Your answer",
"log_pw" => "Lösenord",
"log_new_un" => "Nytt användarnamn",
"log_new_em" => "Ny epostadress",
"log_new_pw" => "Nytt lösenord",
"log_con_pw" => "Confirm Password",
"log_pw_msg" => "Här är dina inloggningsuppgifter för kalender",
"log_pw_subject" => "Ditt lösenord",
"log_npw_subject" => "Ditt nya lösenord",
"log_npw_sent" => "Ditt nya lösenord har skickats",
"log_registered" => "Registreringen lyckades - ditt lösenord har skickats till dig via epost.", 
"log_em_problem_not_sent" => "Email problem - your password could not be sent",
"log_em_problem_not_noti" => "Email problem - could not notify the administrator",
"log_un_exists" => "Användarnamnet är upptaget",
"log_em_exists" => "Epostadressen är upptagen",
"log_un_invalid" => "Ogiltigt användarnamn (min. längd 2: A-Z, a-z, 0-9, och _-.) ",
"log_em_invalid" => "Ogiltig epostadress",
"log_ph_invalid" => "Invalid mobile phone number",
"log_sra_wrong" => "Incorrect answer to the question",
"log_sra_wrong_4x" => "You have answered incorrectly 4 times - try again in 30 minutes",
"log_un_em_invalid" => "Användarnamn/e-post är ogiltigt",
"log_un_em_pw_invalid" => "Ditt användarnamn/e-post eller lösenord är ogiltigt",
"log_pw_error" => "Passwords not matching",
"log_no_un_em" => "Ange ditt användarnamn/e-post", 
"log_no_un" => "Ange ditt användarnamn",
"log_no_em" => "Ange din epostadress",
"log_no_pw" => "Ange ditt lösenord",
"log_no_rights" => "Inloggning avvisades: du har inga visningsrättigheter - Kontakta administratören",//
"log_send_new_pw" => "Skicka nytt lösenord",
"log_new_un_exists" => "Nytt användarnamn är upptaget",
"log_new_em_exists" => "Ny epostadress är upptagen",
"log_ui_language" => "Användargränssnittets språk",
"log_new_reg" => "Registrera ny användare",
"log_date_time" => "Datum / tid",
"log_time_out" => "Time out",

//categories.php
"cat_list" => "Kategorilista",
"cat_edit" => "Redigera",
"cat_delete" => "Radera",
"cat_add_new" => "Skapa ny kategori",
"cat_add" => "Skapa",
"cat_edit_cat" => "Redigera kategori",
"cat_sort" => "Sortera efter namn",
"cat_cat_name" => "Kategorinamn", 
"cat_symbol" => "Symbol",
"cat_symbol_repms" => "Category symbol (replaces minisquare)",
"cat_symbol_eg" => "e.g. A, X, ♥, ⛛",
"cat_matrix_url_link" => "URL link (shown in matrix view)",
"cat_seq_in_menu" => "Sekvens i meny",
"cat_cat_color" => "Kategorifärg",
"cat_text" => "Text",
"cat_background" => "Bakgrund",
"cat_select_color" => "Välj färg",
"cat_subcats" => "Sub-<br>categories",
"cat_subcats_opt" => "Subcategories (optional)",
"cat_url" => "URL",
"cat_name" => "Name",
"cat_save" => "Spara",
"cat_added" => "Kategori skapad",
"cat_updated" => "Kategori uppdaterad",
"cat_deleted" => "Kategori raderad",
"cat_not_added" => "Kategori ej skapad",
"cat_not_updated" => "Kategori ej uppdaterad",
"cat_not_deleted" => "Kategori ej raderad",
"cat_nr" => "#",
"cat_repeat" => "Repetera",
"cat_every_day" => "varje dag",
"cat_every_week" => "varje vecka",
"cat_every_month" => "varje månad",
"cat_every_year" => "varje år",
"cat_overlap" => "Overlap<br>allowed<br>(gap)",
"cat_need_approval" => "Händelser behöver<br>godkännas",
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
"cat_day_color1" => "Färg på dag (year/matrix view)",
"cat_day_color2" => "Färg på dag (month/week/day view)",
"cat_approve" => "Händelser behöver godkännas",
"cat_check_mark" => "Markeringstecken",
"cat_label" => "etikett",
"cat_mark" => "markering",
"cat_name_missing" => "Kategorinamn saknas",
"cat_mark_label_missing" => "Markerings-tecken/etikett saknas",

//users.php
"usr_list_of_users" => "Användarlista",
"usr_name" => "Användarnamn",
"usr_email" => "Epost",
"usr_phone" => "Mobile phone number",
"usr_phone_br" => "Mobile phone<br>number",
"usr_number" => "User number",
"usr_number_br" => "User<br>number",
"usr_language" => "Language",
"usr_ui_language" => "User interface language",
"usr_group" => "Grupp",
"usr_password" => "Lösenord",
"usr_edit_user" => "Redigera användarprofil",
"usr_add" => "Skapa användare", 
"usr_edit" => "Redigera",
"usr_delete" => "Radera",
"usr_login_0" => "Första inloggning",
"usr_login_1" => "Senaste inloggning",
"usr_login_cnt" => "Inloggningar",
"usr_add_profile" => "Skapa profil",
"usr_upd_profile" => "Uppdatera profil",
"usr_if_changing_pw" => "Bara om lösenordet ska ändras",
"usr_pw_not_updated" => "Lösenord ej uppdaterat",
"usr_added" => "Användare skapad",
"usr_updated" => "Användarprofil uppdaterad",
"usr_deleted" => "Användare raderad",
"usr_not_deleted" => "Användare ej raderad",
"usr_cred_required" => "Användarnamn, epost och lösenord krävs",
"usr_name_exists" => "Användarnamn upptaget",
"usr_email_exists" => "Epostadress upptagen",
"usr_un_invalid" => "Ogiltigt användarnamn (min. längd 2: A-Z, a-z, 0-9, and _-.) ", //
"usr_em_invalid" => "Ogiltig epostadress",
"usr_ph_invalid" => "Invalid mobile phone number",
"usr_cant_delete_yourself" => "Du kan inte radera dig själv",
"usr_go_to_groups" => "Gå till Grupper",

//groups.php
"grp_list_of_groups" => "Grupplista",
"grp_name" => "Gruppnamn",
"grp_priv" => "Rättigheter",
"grp_categories" => "Kategorier",
"grp_all_cats" => "alla kategorier",
"grp_rep_events" => "Repeating<br>events",
"grp_m-d_events" => "Multi-day<br>events",
"grp_priv_events" => "Private<br>events",
"grp_upload_files" => "Upload<br>files",
"grp_send_sms" => "Send<br>SMSes",
"grp_tnail_privs" => "Thumbnail<br>privileges",
"grp_priv0" => "Ingen behörighet",
"grp_priv1" => "Visa kalender",
"grp_priv2" => "Skapa/redigera egna händelser",
"grp_priv3" => "Skapa/redigera alla händelser",
"grp_priv4" => "Skapa/redigera + administratör",
"grp_priv9" => "Administratör",
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
"grp_edit_group" => "Redigera användargrupp",
"grp_sub_to_rights" => "Subject to user rights",
"grp_view" => "View",
"grp_add" => "Add",
"grp_edit" => "Redigera",
"grp_delete" => "Radera",
"grp_add_group" => "Skapa grupp",
"grp_upd_group" => "Uppdatera grupp",
"grp_added" => "Grupp skapad",
"grp_updated" => "Grupp uppdaterad",
"grp_deleted" => "Grupp raderad",
"grp_not_deleted" => "Grupp ej raderad",
"grp_in_use" => "Gruppen används för närvarande",
"grp_cred_required" => "Gruppnamn, Rättigheter och Kategorier krävs",
"grp_name_exists" => "Gruppnamn upptaget",
"grp_name_invalid" => "Ogiltigt gruppnamn (min. längd 2: A-Z, a-z, 0-9, and _-.) ",
"grp_background" => "Bakgrundsfärg",
"grp_select_color" => "Välj färg",
"grp_invalid_color" => "Färgformat ogiltigt (#XXXXXX där X = HEX-värde)",
"grp_go_to_users" => "Gå till Användare",

//database.php
"mdb_dbm_functions" => "Databas-funktioner",
"mdb_noshow_tables" => "Kan ej hämta tabell(er)",
"mdb_noshow_restore" => "Kan ej hitta säkerhetskopia",
"mdb_file_not_sql" => "Säkerhetskopia är ej av typ '.sql'",
"mdb_compact" => "Komprimera databas",
"mdb_compact_table" => "Komprimera tabell",
"mdb_compact_error" => "Fel",
"mdb_compact_done" => "Klar",
"mdb_purge_done" => "Raderade händelser är nu permanent borttagna från databasen",
"mdb_backup" => "Säkerhetskopiera databas",
"mdb_backup_table" => "Säkerhetskopiera tabell",
"mdb_backup_file" => "Säkerhetskopia",
"mdb_backup_done" => "Klar",
"mdb_records" => "poster",
"mdb_restore" => "Återställ databas",
"mdb_restore_table" => "Återställ tabell",
"mdb_inserted" => "poster infogade",
"mdb_db_restored" => "Databas återställd.",
"mdb_no_bup_match" => "Varning:<br>Säkerhetskopia är av annan version än kalendern.<br>Databas återställs inte.",
"mdb_events" => "Händelser",
"mdb_delete" => "radera",
"mdb_undelete" => "återskapa",
"mdb_between_dates" => "som inträffar mellan",
"mdb_deleted" => "Händelser raderade",
"mdb_undeleted" => "Händelser återskapade",
"mdb_file_saved" => "Säkerhetskopia sparad i mappen 'files' på servern.",
"mdb_file_name" => "Filnamn",
"mdb_start" => "Start",
"mdb_no_function_checked" => "Ingen funktion vald",
"mdb_write_error" => "Säkerhetskopiering misslyckades<br>Kontrollera rättigheterna till mappen 'files/'",

//import/export.php
"iex_file" => "Vald fil",
"iex_file_name" => "iCal filnamn",
"iex_file_description" => "iCal filbeskrivning",
"iex_filters" => "Händelsefilter",
"iex_export_usr" => "Export User Profiles",
"iex_import_usr" => "Import User Profiles",
"iex_upload_ics" => "Ladda upp iCal-fil",
"iex_create_ics" => "Skapa iCal-fil",
"iex_tz_adjust" => "Timezone adjustments",
"iex_upload_csv" => "Ladda upp CSV-fil",
"iex_upload_file" => "Ladda upp fil",
"iex_create_file" => "Skapa fil",
"iex_download_file" => "Ladda ner fil",
"iex_fields_sep_by" => "Fält avskiljda med",
"iex_birthday_cat_id" => "Födelsedags kategori-ID",
"iex_default_grp_id" => "Default user group ID",
"iex_default_cat_id" => "Standard kategori-ID",
"iex_default_pword" => "Default password",
"iex_if_no_pw" => "If no password specified",
"iex_replace_users" => "Replace existing users",
"iex_if_no_grp" => "if no user group found",
"iex_if_no_cat" => "om ingen kategori hittades",
"iex_import_events_from_date" => "Importera händelser som sker fr.o.m.",
"iex_no_events_from_date" => "No events found as of the specified date",
"iex_see_insert" => "se instruktioner till höger på sidan",
"iex_no_file_name" => "Filnamn saknas",
"iex_no_begin_tag" => "ogiltig iCal-fil (BEGIN-tag saknas)",
"iex_bad_date" => "Bad date",
"iex_date_format" => "Händelsers datumformat",
"iex_time_format" => "Händelsers tidsformat",
"iex_number_of_errors" => "Antal fel i listan",
"iex_bgnd_highlighted" => "markerad",
"iex_verify_event_list" => "Verifiera händelselista, korrigera fel och klicka",
"iex_add_events" => "Infoga händelser i databasen",
"iex_verify_user_list" => "Verify User List, correct possible errors and click",
"iex_add_users" => "Add Users to Database",
"iex_select_ignore_birthday" => "Markera Ignorera och Födelsedag efter behov",
"iex_select_ignore" => "Markera Ignorera för att ignorera händelse",
"iex_check_all_ignore" => "Check all ignore boxes",
"iex_title" => "Titel",
"iex_venue" => "Plats",
"iex_owner" => "Ägare",
"iex_category" => "Kategori",
"iex_date" => "Datum",
"iex_end_date" => "Slutdatum",
"iex_start_time" => "Starttid",
"iex_end_time" => "Sluttid",
"iex_description" => "Beskrivning",
"iex_repeat" => "Repetition",
"iex_birthday" => "Födelsedag",
"iex_ignore" => "Ignorera",
"iex_events_added" => "händelser skapade",
"iex_events_dropped" => "händelser ignorerade (finns redan)",
"iex_users_added" => "users added",
"iex_users_deleted" => "users deleted",
"iex_csv_file_error_on_line" => "CSV-filfel på rad",
"iex_between_dates" => "Inträffar mellan",
"iex_changed_between" => "Sparad/redigerad mellan",
"iex_select_date" => "Välj datum",
"iex_select_start_date" => "Välj startdatum",
"iex_select_end_date" => "Välj slutdatum",
"iex_group" => "User group",
"iex_name" => "User name",
"iex_email" => "Email address",
"iex_phone" => "Phone number",
"iex_lang" => "Language",
"iex_pword" => "Password",
"iex_all_groups" => "all groups",
"iex_all_cats" => "alla kategorier",
"iex_all_users" => "alla användare",
"iex_no_events_found" => "Inga händelser funna", 
"iex_file_created" => "Fil skapad",
"iex_write error" => "Skapande av exportfil misslyckades<br>Kontrollera rättigheterna till mappen 'files'",
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
"cro_sum_header" => "CRON JOB SAMMANSTÄLLNING",
"cro_sum_trailer" => "SLUT PÅ SAMMANSTÄLLNING",
"cro_sum_title_eve" => "FÖRFALLNA HÄNDELSER",
"cro_nr_evts_deleted" => "Antal raderade händelser",
"cro_sum_title_eml" => "EPOST MEDDELANDEN",
"cro_sum_title_sms" => "SMS MEDDELANDEN",
"cro_not_sent_to" => "Meddelanden skickade till",
"cro_no_reminders_due" => "Inga aktuella meddelandedatum",
"cro_subject" => "Ämne",
"cro_event_due_in" => "Följande händelse sker om",
"cro_event_due_today" => "Följande händelse sker idag",
"cro_due_in" => "Sker om",
"cro_due_today" => "Sker idag",
"cro_days" => "dag(ar)",
"cro_date_time" => "Datum / tid",
"cro_title" => "Titel", 
"cro_venue" => "Plats",
"cro_description" => "Beskrivning",
"cro_category" => "Kategori",
"cro_status" => "Status",
"cro_sum_title_chg" => "KALENDER-ÄNDRINGAR",
"cro_nr_changes_last" => "Antal ändringar senaste",
"cro_report_sent_to" => "Rapport skickad till",
"cro_no_report_sent" => "Ingen rapport skickad",
"cro_sum_title_use" => "FÖRFALLNA ANVÄNDARKONTON",
"cro_nr_accounts_deleted" => "Antal raderade konton",
"cro_no_accounts_deleted" => "Inga konton raderade",
"cro_sum_title_ice" => "EXPORTERADE HÄNDELSER",
"cro_nr_events_exported" => "Antal händelser exporterade i iCalendar-format till fil",

//messaging.php
"mes_no_msg_no_recip" => "Not sent, no recipients found",

//explanations
"xpl_manage_db" =>
"<h3>Instruktioner för att hantera databas</h3>
<p>På denna sida kan följande funktioner väljas:</p>
<h6>Komprimera databas</h6>
<p>När en användare raderar en händelse markeras händelsen som 'raderad', men 
avlägsnas INTE från databasen. Komprimera-funktionen avlägsnar däremot helt 
och hållet händelser som är raderade av en användare för mer än 30 dagar sedan, 
och frigör därigenom utrymmet i databasen reserverat för dessa händelser.</p>
<h6>Säkerhetskopiera databas</h6>
<p>Denna funktion skapar en säkerhetskopia av kalenderns databas (struktur och 
innehåll) i .sql-format. (OBS! Endast de tabeller som tillhör LuxCal kalendern 
berörs.) 
Säkerhetskopian sparas i mappen <strong>files/</strong> med filnamnet: 
<kbd>dump-cal-lcv-yyyymmdd-hhmmss.sql</kbd> (där 'cal' = calendar ID, 'lcv' = 
calendar version och 'yyyymmdd-hhmmss' = år, månad, dag, timmar, minuter och 
sekunder).</p>
<p>Säkerhetskopian kan användas för att återskapa kalenderns databas-tabeller 
(struktur och innehåll) med hjälp av 'Återställ databas' (se nedan) eller genom 
att t.ex. använda <strong>phpMyAdmin</strong>-verktyget som de flesta webbhotell 
tillhandahåller för sina kunder.</p>
<h6>Återställ databas</h6>
<p>Denna funktion återställer kalenderns databas-tabeller (struktur och innehåll) 
med hjälp av en sparad säkerhetskopia (i .sql-format).</p>
<p>Vid återställande av databas kommer ALL DATA SOM I ÖGONBLICKET ÄR SPARADE I 
KALENDERNS TABELLER ATT RADERAS och ersättas med säkerhetskopians innehåll!</p>
<h6>Radera/Återskapa händelser</h6>
<p>Denna funktion raderar eller återskapar händelser som inträffar mellan de 
angivna datumen. Om ett datum utelämnas finns det ingen datumgräns, så om båda 
datum utelämnas KOMMER ALLA HÄNDELSER ATT RADERAS!</p><br>
<p>VIKTIGT: När databasen komprimeras (se ovan) kommer de 'raderade' 
händelserna att helt och hållet avlägsnas, och kan aldrig återskapas igen!</p>",

"xpl_import_csv" =>
"<h3>Instruktioner för import av CSV</h3>
<p>Detta formulär används för att importera en CSV (Comma Separated Values) textfil med 
händelsedata till kalendern.</p>
<p>Ordningen på kolumnerna i CSV-filen måste vara: titel, plats, kategori-id (se nedan), 
datum, slutdatum, starttid, sluttid och beskrivning. Om den första raden i CSV-filen 
består av kolumnrubriker ignoreras denna.</p>
<p>För korrekt behandling av internationella och speciella tecken måste CSV-filen vara 
sparad i UTF-8 teckenkod.</p>
<h6>CSV exempelfiler</h6>
<p>CSV exempelfiler med filändelsen .cvs finns i mappen 'files' i din LuxCal-
installation.</p>
<h6>Field separator</h6>
The field separator can be any character, for instance a comma, semi-colon, etc.
The field separator character must be unique and may not be part of the text, 
numbers or dates in the fields.
<h6>Datum- och tidsformat</h6>
<p>Den valda händelsens datum- och tidsformat till vänster måste överensstämma med 
formatet på datum och tider i den uppladdade CSV-filen.</p>
<h6>Lista med Kategorier</h6>
<p>Kalendern använder ID-nummer för att ange kategorier. CSV-filens kategori-ID:n 
måste motsvara de kategorier som används i din kalender eller vara tomma.</p>
<p>Om du i nästa steg vill öronmärka händelser som 'födelsedag' måste <strong>
Födelsedagens kategori-ID</strong> vara satt till att motsvara samma ID 
i kategorin-listan nedan.</p>
<p class='hired'>Varning: Importera aldrig mer än 100 händelser åt gången!</p>
<p>För närvarande har följande kategorier definierats i din kalender:</p>", 

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
"<h3>Instruktioner för import av iCalendar</h3>
<p>Detta formulär används för att importera en <strong>iCalendar</strong> händelsefil 
till kalendern.</p>
<p>Innehållet i filen måste motsvara [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>RFC5545 standard</a></u>] av Internet Engineering Task Force.</p>
<p>Endast händelser importeras. Andra iCal-komponenter som t.ex: Att-Göra, Journal, Ledig / 
Upptagen, Tidszon och Påminnelse kommer att ignoreras.</p>
<h6>iCal exempelfiler</h6>
<p>iCal exempelfiler med filändelsen .ics finns i mappen 'files' i din LuxCal-
installation.</p>
<h6>Timezone adjustments</h6>
<p>If your iCalendar file contains events in a different timezone and the dates/times 
should be adjusted to the calendar timezone, then check 'Timezone adjustments'.</p>
<h6>Kategoritabell</h6>
<p>Kalendern använder ID-nummer för att ange kategorier. iCalendar-filens 
kategori-ID:n måste motsvara de kategorier som används i din kalender eller 
vara tomma .</p>
<p class='hired'>Varning: Importera aldrig mer än 100 händelser åt gången!</p>
<p>För närvarande har följande kategorier definierats i din kalender:</p>", 

"xpl_export_ical" =>
"<h3>Instruktioner för export av iCalendar</h3>
<p>Detta formulär används för att extrahera och exportera <strong>iCalendar</strong>
-händelser från kalendern.</p>
<p>Filerna sparas i mappen 'files/' på servern. Ange filnamn utan filtillägg 
(filtillägget blir automatiskt <b>.ics</b>). Om inget filnamn anges får filen 
automatiskt samma namn som kalendern. Existerande filer med samma namn kommer 
att skrivas över av den nya filen.</p>
<p><b>iCal-filens beskrivning</b> (t.ex. 'Möten 2013') är valfritt. Om du anger 
den så läggs den till i sidhuvudet på den exporterade iCal-filen.</p>
<p><b>Händelsefilter</b>: Händelserna som extraheras kan filtreras genom:</p>
<ul>
<li>händelse ägare</li>
<li>händelse kategori</li>
<li>händelse startdatum</li>
<li>händelse sparad/redigerad-datum</li>
</ul>
<p>Varje filter är valfritt. Utelämnat datum avser: ingen gräns</p>
<br>
<p>Innehållet i filen med extraherade händelser måste motsvara 
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 standard</a></u>] 
av Internet Engineering Task Force.</p>
<p>När nedladdning sker av den exporterade iCal-file kommer datum och tid att läggas till 
i namnet på den nedladdade filen.</p>
<h6>iCal exempelfiler</h6>
 <p>iCalendar exempelfiler med filändelsen .ics finns i mappen 'files' i din LuxCal-
installation.</p>"
);
?>
