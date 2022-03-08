<?php
/*
= LuxCal admin interface language file =

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.
Wijzigingen en vertalingen zijn aangebracht door J.C.Barnhoorn - Hellevoetsluis

This file is part of the LuxCal Web Calendar.
*/
//LuxCal ui language file version
define("LAI","4.7.8");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Geen",
"no" => "nee",
"yes" => "ja",
"own" => "eigen",
"all" => "alle",
"or" => "of",
"back" => "Terug",
"ahead" => "Vooruit",
"close" => "Sluiten",
"always" => "altijd",
"at_time" => "@", //date and time separator (e.g. 30-01-2020 @ 10:45)
"times" => "times",
"cat_seq_nr" => "categorie volgnr",
"rows" => "rijen",
"columns" => "kolommen",
"hours" => "uur",
"minutes" => "minuten",
"user_group" => "gebruikersgroep",
"event_cat" => "aciviteitcategorie",
"id" => "ID",
"username" => "Gebruikersnaam",
"password" => "Wachtwoord",
"public" => "Niet aangemeld",
"logged_in" => "Aangemeld",
"logged_in_l" => "aangemeld",

//settings.php - fieldset headers + general
"set_general_settings" => "Kalender algemeen",
"set_navbar_settings" => "Navigatiebalk",
"set_event_settings" => "Activiteiten",
"set_user_settings" => "Gebruikers",
"set_upload_settings" => "File Uploads",
"set_reminder_settings" => "Herinneringen",
"set_perfun_settings" => "Periodieke Functies (alleen relevant indien cron job loopt)",
"set_sidebar_settings" => "Binnenkort Zijbalk (alleen relevant indien in gebruik)",
"set_view_settings" => "Weergave",
"set_dt_settings" => "Datum/Tijd",
"set_save_settings" => "Instellingen opslaan",
"set_test_mail" => "Test e-mail",
"set_mail_sent_to" => "Test e-mail verstuurd naar",
"set_mail_sent_from" => "Deze test mail is verstuurd via de pagina Kalenderinstellingen van de webkalender",
"set_mail_failed" => "Versturen test e-mail mislukt - ontvanger(s)",
"set_missing_invalid" => "ontbrekende of ongeldige instellingen (achtergrond gekleurd)",
"set_settings_saved" => "Kalenderinstellingen opgeslagen",
"set_save_error" => "Database fout. Opslaan kalenderinstellingen mislukt",
"hover_for_details" => "Ga met de muis over de beschrijving voor details",
"default" => "standaard",
"enabled" => "aan",
"disabled" => "uit",
"pixels" => "pixels",
"warnings" => "Waarschuwingen",
"notices" => "Mededelingen",
"visitors" => "Bezoekers",
"no_way" => "U bent niet bevoegd tot het uitvoeren van deze actie.",

//settings.php - general settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"versions_label" => "Versies",
"versions_text" => "• kalender versie, gevolgd door de in gebruik zijnde database<br>• PHP versie<br>• database versie",
"calTitle_label" => "Kalendertitel",
"calTitle_text" => "Weergegeven in de titelbalk van de kalender en gebruikt in mail herinneringen",
"calUrl_label" => "Kalender-URL",
"calUrl_text" => "Webadres van de kalender.",
"calEmail_label" => "Kalender e-mailadres",
"calEmail_text" => "Het e-mailadres voor het ontvangen van contactberichten en voor het zenden / ontvangen van mailherinneringen<br>Opmaak: \'mail\' of \'naam &#8826;mail&#8827;\'.",
"logoPath_label" => "Pad/naam van de logo afbeelding",
"logoPath_text" => "Indien opgegeven, verschijnt het logo in de linkerbovenhoek van de kalender. Indien ook een link naar de bovenliggende pagina is opgegeven (zie hieronder), dan zal het logo de link naar deze pagina worden. Het logo mag een maximum hoogte en breedte hebben van 70 pixels.",
"backLinkUrl_label" => "Link naar bovenliggende pagina",
"backLinkUrl_text" => "URL van de bovenliggende pagina. Indien gespecificeerd, zal er een Terug-knop worden weergegeven aan de linkerzijde van de Navigatie Balk met een link naar de opgegeven URL.<br>Bijvoorbeeld om terug te linken naar de pagina waar vandaan de kalender werd gestart. Indien een logo pad/naam is opgegeven (zie hierboven), dan wordt er geen Terug knop weergegeven, maar zal daarvoor in de plaats het logo de terug-link zijn.",
"timeZone_label" => "Tijdzone",
"timeZone_text" => "De door de kalender gebruikte tijdzone voor het berekenen van de huidige tijd",
"see" => "zie",
"notifChange_label" => "Stuur mededeling met kalenderwijzigingen",
"notifChange_text" => "Wanneer een gebruiker een activiteit toevoegt, wijzigt of verwijdert, zal een bericht naar de opgegeven bestemmingen worden gestuurd.",
"chgRecipList" => "Bestemmingen",
"maxXsWidth_label" => "Max. width of small screens",
"maxXsWidth_text" => "For displays with a width smaller than the specified number of pixels, the calendar will run in a special responsive mode, leaving out certain less important elements.",
"rssFeed_label" => "RSS feed links",
"rssFeed_text" => "Indien geactiveerd: Voor gebruikers met minstens rechten \'bekijken\' zal een RSS feed link woorden weergegeven in de voet van de kalender; ook zal een RSS feed link worden toegevoegd aan de HTML head van de kalender pagina's.",
"logging_label" => "Log kalender gegevens",
"logging_text" => "De kalender kan foutmeldingen, waarschuwingen, mededelingen en bezoekersgegevens loggen. Foutmeldingen worden altijd gelogd. Het loggen van waarschuwingen, mededelingen en bezoekersgegevens kan worden aan- of uitgezet door de relevante vakjes aan te vinken. Alle foutmeldingen, waarschuwingen en mededelingen worden in het bestand \'logs/luxcal.log\' gelogd en bezoekersgegevens worden in de bestanden \'logs/hitlog.log\' en \'logs/botlog.log\' gelogd.<br>Opmerking: PHP foutmeldingen, waarschuwingen en mededelingen worden op een andere plaats opgeslagen, bepaald door uw ISP.",
"maintMode_label" => "Maintenance mode",
"maintMode_text" => "When enabled, the calendar will run in maintenance mode, which means that useful maintenance information will be shown in the calendar footer bar.",
"reciplist" => "The recipient list can contain user names, email addresses, phone numbers and names of files with recipients (enclosed by square brackets), separated by semicolons. Files with recipients with one recipient per line should be located in the folder \'reciplists\'. When omitted, the default file extension is .txt",
"calendar" => "kalender",
"user" => "gebruiker",
"database" => "database",

//settings.php - navigation bar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"contact_label" => "Contactknop",
"contact_text" => "Indien geactiveerd: Er wordt een contactknop getoond in het zijmenu. Indien deze knop wordt geselecteerd zal een contactformulier openen, welk gebruikt kan worden om een bericht naar de kalenderbeheerder te sturen.",
"optionsPanel_label" => "Instellingen menu\'s",
"optionsPanel_text" => "Het weergeven van menu\'s in de Instellingen.<br>• Het kalender menu is beschikbaar voor de admin en maakt het mogelijk om een kalender te kiezen. (inschakelen alleen relevant als meerdere kalenders zijn geïnstalleerd)<br>• Het weergave menu kan worden gebruikt om de verschillende kalender weergaven te keizen.<br>• Het groepsmenu kan worden gebruikt om activiteiten weer te geven welke zijn ingevoerd door de gebruikers in de geselecteerde groepen.<br>• Het gebruikersmenu kan worden gebruikt om activiteiten weer te geven welke zijn ingevoerd door de geselecteerde gebruikers.<br>• Het categorie menu kan worden gebruikt om activiteiten weer te geven welke tot de geselecteerde activiteitencategorieën behoren.<br>• Met het taalkeuze menu kan de taal van de gebruikersinterface worden gekozen. (inschakelen alleen relevant als meerdere talen zijn geïnstalleerd).<br>Note: Als geen enkel menu is geselecteerd, zal de Instellingen knop niet worden weergegeven.",
"calMenu_label" => "kalender",
"viewMenu_label" => "weergave",
"groupMenu_label" => "groepen",
"userMenu_label" => "gebruikers",
"catMenu_label" => "categorieën",
"langMenu_label" => "taalkeuze",
"availViews_label" => "Beschikbare kalenderweergaven",
"availViews_text" => "Beschikbare kalenderweergaven voor niet aangemelde en aangemelde gebruikers d.m.v. een door comma\'s gescheiden lijst met weergave nummers. Betekenins van de nummers:<br>1: jaar weergave<br>2: maand weergave (7 dagen)<br>3: werk maand weergave<br>4: week weergave (7 dagen)<br>5: werk week weergave<br>6: dag weergave<br>7: aankomend weergave<br>8: veranderingen weergave<br>9: matrix weergave (categorieën)<br>10: matrix weergave (gebruikers)<br>11: gantt chart weergave",
"viewButtons_label" => "Weergaveknoppen op de navigatiebalk",
"viewButtons_text" => "Weergaveknoppen op de navigatiebalk voor niet aangemelde en aangemelde gebruikers, opgegeven d.m.v. een door comma\'s gescheiden rij cijfers<br>Elk cijfer in de rij correspondeert met een weer te geven knop. Als geen enkel cijfer wordt ingevuld, wordt er geen weergaveknop getoond.<br>Betekenis van de cijfers:<br>1: Jaar<br>2: Hele Maand<br>3: Werk Maand<br>4: Hele Week<br>5: Werk Week<br>6: Dag<br>7: Binnenkort<br>8: Veranderingen<br>9: Matrix-C<br>10: Matrix-U<br>11: Gantt Chart<br>De volgorde van de cijfers bepalen de volgorde van de weer te geven knoppen.<br>Bijvoorbeeld: \'24\' betekent: geef de knoppen \'Hele maand\' en \'Hele week\' weer.",
"defaultViewL_label" => "Standaardweergave bij opstarten (groot beeldscherm)",
"defaultViewL_text" => "Standaardweergave bij het starten van de kalender voor niet aangemelde en aangemelde gebruikers met een groot beeldscherm.<br>Aanbevolen: Maand",
"defaultViewS_label" => "Standaardweergave bij opstarten (klein beeldscherm)",
"defaultViewS_text" => "Standaardweergave bij het starten van de kalender voor niet aangemelde en aangemelde gebruikers met een klein beeldscherm.<br>Aanbevolen: Binnenkort",
"language_label" => "Standaard taal voor user interface",
"language_text" => "De bestanden ui-{taal}.php, ai-{taal}.php, ug-{taal}.php en ug-layout.png moeten in de lang/ map aanwezig zijn. {taal} = taal gekozen voor de gebruikersinterface. Bestandsnamen in kleine letter!",

//settings.php - events settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"privEvents_label" => "Plaatsen van privé activiteiten",
"privEvents_text" => "Privé activiteiten zijn alleen zichtbaar voor de gebruiker die de activiteit invoerde.<br>Aan: gebruiker kan privé activiteiten invoeren.<br>Standaard: wanneer een nieuwe activiteit wordt toegevoegd, zal het \'privé\' vinkje in het Activiteit venster standaard aan staan..<br>Altijd: wanneer nieuwe activiteiten worden toegevoegd zullen deze altijd privézijn, de \'privé\' checkbox in het Activiteit venster zal niet zichtbaar zijn.",
"aldDefault_label" => "Nieuwe activiteiten standaard \'Hele dag'\'",
"aldDefault_text" => "Wanneer activiteiten worden toegevoegd, zal in het activiteiten window de \'Hele dag\' checkbox zijn aangevinkt. Bovendien, als geen begintijd wordt opgegeven zal de activiteit automatisch de hele dag duren.",
"details4All_label" => "Toon details aan alle gebruikers",
"details4All_text" => "Aan: activiteitdetails zullen zichtbaar zijn voor de eigenaar van de activiteit en alle andere gebruikers.<br>Uit: activiteiten details zullen alleen zichtbaar zijn voor de eigenaar van de activiteit en de gebruikers met rechten \'wijzigen alle activiteiten\'.<br>Ingelogd: activiteiten details zullen alleen zichtbaar zijn voor de eigenaar van de activiteit en voor ingelogde gebruikers.",
"evtDelButton_label" => "Toon knop Verwijderen in het Activiteit venster",
"evtDelButton_text" => "Aan: de knop \'Verwijderen\' in het Activiteit venster is zichtbaar voor alle gebruikers.<br>Manager: de knop \'Verwijderen\' in het Activiteit venster is alleen zichtbaar voor gebruikers met \'manager\' rechten.<br>Uit: de knop \'Verwijderen\' in het Activiteit venster is niet zichtbaar. Gebruikers met edit rechten kunnen dus geen activiteiten verwijderen.",
"eventColor_label" => "Activiteitkleuren gebaseerd op",
"eventColor_text" => "Activiteiten in de verschillende kalenderweergaven kunnen worden weergegeven in de kleur welke is toegewezen aan de groep waar de eigenaar van de activiteit toe behoort of de kleur van de categorie welke aan de activiteit is toegekend.",
"defVenue_label" => "Default Venue",
"defVenue_text" => "In dit tekst veld kan een standaard locatie worden gegeven voor wanneer men een nieuwe activiteit toevoegd.",
"xField1_label" => "Extra veld 1",
"xField2_label" => "Extra veld 2",
"xFieldx_text" => "Optioneel tekstveld. Indien dit veld voorkomt in een model in de sectie Weergave, zal het als een tekstveld worden toegevoegd aan het Activiteiten venster en aan de activiteiten in alle kalender pagina\'s. <br>• label: optioneel tekst label voor het extra veld (max. 15 tekens). E.g. \'E-mailadres\', \'Website\', \'Telefoonnummer\'<br>• Minimum gebruikersrechten: het veld zal alleen zichtbaar zijn voor gebruikers met de geselecteerde rechten of hoger.",
"xField_label" => "Label",
"min_rights" => "Minimum user rights",
"no_color" => 'no color',
"manager_only" => 'manager',

//settings.php - user accounts settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Zelfregistratie",
"selfReg_text" => "Gebruikers toestaan zich te registreren en toegang tot de kalender te krijgen.<br>Gebruikersgroep waar zichzelf geregistreerde gebruikers in worden geplaatst.",
"selfRegQA_label" => "Self registration question/answer",
"selfRegQA_text" => "When self registration is enabled, during the self-registration process the user will be asked this question and will only be able to self-register if the correct answer is given. When the question field is left blank, no question will be asked.",
"selfRegNot_label" => "Melding zelfregistratie",
"selfRegNot_text" => "Stuur een e-mail naar het kalender e-mailadres wanneer een zelfregistatie plaatsvindt.",
"restLastSel_label" => "Herstel de laatste gebruikers selecties",
"restLastSel_text" => "De laatste gebruikers selecties (optie menu instellingen) worden bewaard en bij het nieuw bezoek toegepast.",
"cookieExp_label" => "Aantal dagen voor 'onthoud mij' cookie afloopt",
"cookieExp_text" => "Aantal dagen voor het cookie gezet door de \'Onthoud mij\' optie (tijdens Inloggen) afloopt.",
"answer" => "answer",
"view" => "bekijken",
"post_own" => 'eigen invoer',
"post_all" => 'alle invoeren',
"manager" => 'invoeren/manager',

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"templFields_text" => "Betekenis van de cijfers:<br>1: Locatie<br>2: Activiteit categorie<br>3: Omschrijving<br>4: Extra veld 1 (zie sectie Activiteiten)<br>5: Extra veld 2 (zie sectie Activiteiten)<br>6: Stuur mail gegevens (alleen als een e-mail herinnering is gevraagd)<br>7: Datum/tijd ingevoerd/gewijzigd en de betreffende persoon<br>8: Pdf, image en video bijlagen als hyperlinks.<br>De volgorde van de cijfers bepaald de volgorde waarin de betreffende velden worden weergegeven.",
"evtTemplate_label" => "Activiteit modellen - Algemeen",
"evtTemplate_text" => "De activiteitvelden en de volgorde waarin deze worden weergegeven op de algemene kalender pagina\'s, de binnenkort pagina\'s en in de hover box met activiteitendetails kunnen worden opgegeven d.m.v. een reeks van cijfers.<br>Indien een cijfer is gespecificeerd, dan zal het corresponderende veld worden weergegeven.",
"evtTemplGen" => "Algemeen",
"evtTemplUpc" => "Binnenkort",
"evtTemplPop" => "Hover box",
"sortEvents_label" => "Sorteer activiteiten op tijd of categorie",
"sortEvents_text" => "In the various views events can be sorted on the following criteria:<br>• event times<br>• event category sequence number",
"yearStart_label" => "Beginmaand in Jaar weergave",
"yearStart_text" => "Indien een beginmaand is opgegeven (1 - 12), zal de kalender in Jaar weergave altijd met deze maand beginnen en het jaar van deze eerste maand zal pas veranderen vanaf de eerste dag van dezelfde maand in het volgende jaar.<br>De waarde 0 heeft een een speciale betekenis: de beginmaand is gebaseerd op de huidige datum en zal in de eerste rij maanden vallen.",
"YvRowsColumns_label" => "Aantal rijen en kolommen in Jaar weergave",
"YvRowsColumns_text" => "Aantal rijen van telkens vier maanden weer te geven in Jaar weergave<br>Aanbevolen: 4, zodat door 16 maanden kan worden gescrold.<br>Aantal maanden weer te geven in elke rij in Jaar weergave<br>Aanbevolen: 3 of 4.",
"MvWeeksToShow_label" => "Aantal weken in Maand weergave",
"MvWeeksToShow_text" => "Aantal weken weer te geven in Maand weergave<br>Aanbevolen: 10, zodat door 2.5 maand kan worden gescrold<br>De waarden 0 en 1 hebben een speciale betekenis:<br>0: geef precies een maand weer - geen activiteiten in de voorafgaande en volgende dagen.<br>1: geef precies een maand weer - ook activiteiten in de voorafgaande en volgende dagen.",
"XvWeeksToShow_label" => "Aantal weken in Matrix weergave",
"XvWeeksToShow_text" => "Het aantal weken weergegeven in Matrix weergave.",
"GvWeeksToShow_label" => "Aantal weken in Gantt-Chart weergave",
"GvWeeksToShow_text" => "Het aantal weken weergegeven in Gantt-Chart weergave.",
"workWeekDays_label" => "Werkdagen",
"workWeekDays_text" => "Dagen welke als werkdagen worden gekleurd in de kalenderweergaven en welke bijvoorbeeld zichtbaar zijn in de weken in Werk Maand en Werk Week weergave.<br>Geef het nummer van elke werkdag in.<br>Bijv. 12345: maandag - vrijdag<br>Niet ingegeven dagen worden als weekend dagen aangemerkt.",
"weekStart_label" => "Eerste dag van de week",
"weekStart_text" => "Geef het nummer in van de eerste dag van de week.",
"lookBackAhead_label" => "Aantal dagen terug/vooruit kijken",
"lookBackAhead_text" => "Aantal dagen dat wordt teruggekeken in de Takenlijst en vooruitgekeken in het overzicht Binnenkort, in de Taken Lijst en in de RSS feeds",
"dwStartEndHour_label" => "Begin- en eind uur in Dag/Week weergave",
"dwStartEndHour_text" => "Uur waarop een normale dag begint/eindigt<br>Wanneer deze waarden op bijv. 6 en 18 worden gesteld, wordt in de Dag/Week weergave niet nodeloos ruimte gebruikt voor de tijd tussen middernacht en 6:00 uur en tussen 18:00 en middernacht waarop normaal niet veel wordt uitgevoerd.<br>De tijdkiezer, die wordt gebruikt bij het invoeren van een tijd, zal ook op deze uren beginnen/eindigen.",
"dwTimeSlot_label" => "Tijdverdeling in Dag/Week weergave (minuten)",
"dwTimeSlot_text" => "Tijdverdeling in Dag/Week weergave in aantal minuten.<br>Deze waarde, samen met het uur waarop de normale dag begint en eindigt (zie hier boven) bepalen het aantal rijen in Dag/Week weergave.",
"dwTsHeight_label" => "Tijdverdeling in Dag/Week weergave (pixels)",
"dwTsHeight_text" => "Hoogte van de tijdverdeling in Dag/Week weergave in aantal pixels.",
"evtHeadX_label" => "Event layout in Month, Week and Day view",
"evtHeadX_text" => "Templates with placeholders of event fields that should be displayed. The following placeholders can be used:<br>#ts - start time<br>#tx - start and end time<br>#e - event title<br>#o - event owner<br>#v - venue<br>#lv - venue with label \'Venue:\' in front<br>#c - category<br>#lc - category with label \'Category:\' in front<br>#a - age (see note below)<br>#x1 - extra field 1<br>#lx1 - extra field 1 with label from Settings page in front<br>#x2 - extra field 2<br>#lx2 - extra field 2 with label from Settings page in front<br>#/ - new line<br>The fields are displayed in the specified order. Characters other than the placeholders will remain unchanged and will be part of the displayed event.<br>HTML-tags are allowed in the template. E.g. &lt;b&gt;#e&lt;/b&gt;.<br>The | character can be used to split the template in sections. If within a section a #-parameter results in an empty string, the whole section will be omitted.<br>Note: The age is shown if the event is part of a category with \'Repeat\' set to \'every year\' and the year of birth in parentheses is mentioned somewhere in the event\'s description field.",
"monthView" => "Month view",
"wkdayView" => "Week/Day view",
"ownerTitle_label" => "Toon plaatser van de activiteit bij de activiteit",
"ownerTitle_text" => "In de verschillende kalenders toon plaatser voor de naam van de activiteit.",
"showSpanel_label" => "Zijpaneel in Maand, Week en Dag weergave",
"showSpanel_text" => "In Maand, Week en Dag weergave, rechts naast de hoofdkalender kan het volgede worden weergegeven:<br>• a mini calendar which can be used to look back or ahead without changing the date of the main calendar<br>• a decoration image corresponding to the current month<br>• an info area to post messages/announcements for each month.<br>If no items are selected, the side panel will not be shown.<br>See admin_guide.html for details.",
"spMiniCal" => "Mini calendar",
"spImages" => "Images",
"spInfoArea" => "Info area",
"showImgInMV_label" => "Thumbnails weergeven in maandoverzicht",
"showImgInMV_text" => "Aan/uitschakelen van de weergave in het maandoverzicht van thumbnail images toegevoegd aan een van de activeiten omschrijvingen. Wanneer geactiveerd, worden thumbnails weergegeven in de dagcellen en Wanneer gedeactiveerd, worden thumbnails in plaats daarvan weergegeven in de on-mouse-over boxen.",
"urls" => "URL links",
"emails" => "e-mail links",
"monthInDCell_label" => "Maandnaam voor elke dag",
"monthInDCell_text" => "Toon in Maand weergave de 3-letterige maandnaam voor elke dag",
"evtWinSmall_label" => "Reduced event window",
"evtWinSmall_text" => "When adding/editing events, the Event window will show a subset of the input fields. To show all fields, a plus-sign can be selected.",
"mapViewer_label" => "Map viewer URL",
"mapViewer_text" => "If a map viewer URL has been specified, an address in the event\'s venue field enclosed in !-marks, will be shown as an Address button in the calendar views. When hovering this button the textual address will be shown and when clicked, a new window will open where the address will be shown on the map.<br>The full URL of a map viewer should be specified, to the end of which the address can be joined.<br>Examples:<br>Google Maps: https://maps.google.com/maps?q=<br>OpenStreetMap: https://www.openstreetmap.org/search?query=<br>If this field is left blank, addresses in the Venue field will not be show as an Address button.",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Datumopmaak (dd mm jjjj)",
"dateFormat_text" => "Tekenreeks met de opmaak van datums in de kalender weergaven en input velden.<br>Toegestane tekens: y = jaar, m = maand en d = dag.<br>Niet-alfanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>y-m-d: 2013-10-31<br>m.d.y: 10.31.2013<br>d/m/y: 31/10/2013",
"dateFormat_expl" => "e.g. y.m.d: 2013.10.31",
"MdFormat_label" => "Datumopmaak (dd maand)",
"MdFormat_text" => "Tekenreeks met de opmaak van datums bestaande uit dag en maand.<br>Toegestane tekens: M = maand in tekst, d = dag in cijfers.<br>Niet-alfanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>d M: 12 april<br>M, d: juli, 14",
"MdFormat_expl" => "e.g. M, d: juli, 14",
"MdyFormat_label" => "Datumopmaak (dd maand jjjj)",
"MdyFormat_text" => "Tekenreeks met de opmaak van datums bestaande uit dag, maand en jaar.<br>Toegestane tekens: d = dag in cijfers, M = maand in tekst, y = jaar in cijfers.<br>Niet-alfanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>d M y: 12 april 2013<br>M d, y: juli 8, 2013",
"MdyFormat_expl" => "e.g. M d, y: juli 8, 2013",
"MyFormat_label" => "Datumopmaak (maand jjjj)",
"MyFormat_text" => "Tekenreeks met de opmaak van datums bestaande uit maand en jaar.<br>Toegestane tekens: M = maand in tekst, y = jaar in cijfers.<br>Niet-alfanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>M y: april 2013<br>y - M: 2013 - juli",
"MyFormat_expl" => "e.g. M y: april 2013",
"DMdFormat_label" => "Datumopmaak (dag dd maand)",
"DMdFormat_text" => "Tekenreeks met de opmaak van datums bestaande uit weekdag, dag en maand.<br>Toegestane tekens: WD = weekdag in tekst, M = maand in tekst, d = dag in cijfers.<br>Niet-alfanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>WD d M: vrijdag 12 april<br>WD, M d: Maandag, juli 14",
"DMdFormat_expl" => "e.g. WD - M d: zondag - april 6",
"DMdyFormat_label" => "Datumopmaak (dag dd maand jjjj)",
"DMdyFormat_text" => "Tekenreeks met de opmaak van datums bestaande uit weekdag, dag, maand en jaar.<br>Toegestane tekens: WD = weekdag in tekst, M = maand in tekst, d = dag in cijfers, y = jaar in cijfers.<br>Niet-alfanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>WD d M y: vrijdag 13 april 2013<br>WD - M d, y: Maandag - juli 16, 2013",
"DMdyFormat_expl" => "e.g. WD, M d, y: maandag, juli 16, 2013",
"timeFormat_label" => "Tijdopmaak (uu mm)",
"timeFormat_text" => "Tekenreeks met de opmaak van tijden in de kalender weergaven en input velden.<br>Toegestane tekens: h = uren, H = uren met opvulnul, m = minuten, a = am/pm (optioneel), A = AM/PM (optioneel).<br>Niet-alfanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>h:m: 18:35<br>h.m a: 6.35 pm<br>H:mA: 06:35PM",
"timeFormat_expl" => "bijv. h:m: 22:35 en h:mA: 10:35PM",
"weekNumber_label" => "Geef weeknummers weer",
"weekNumber_text" => "De weergave van weeknummers in de relevante views kan aan- of uitgezet worden",
"time_format_us" => "12 uur AM/PM",
"time_format_eu" => "24 uur",
"sunday" => "zondag",
"monday" => "maandag",
"time_zones" => "TIJD ZONES",
"dd_mm_yyyy" => "dd-mm-jjjj",
"mm_dd_yyyy" => "mm-dd-jjjj",
"yyyy_mm_dd" => "jjjj-mm-dd",

//settings.php - file uploads settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"maxUplSize_label" => "Maximum bestandsgrootte bij uploaden",
"maxUplSize_text" => "Maximum toegestane bestandsgrootte wanneer gebruikers bijlagen of thumbnails uploaden.<br>Let op: De meeste PHP installaties hebben een maximum bestandsgrootte van 2 MB ingesteld (php_ini bestand) ",
"attTypes_label" => "Bijlage bestandstypen",
"attTypes_text" => "Door comma's gescheiden lijst met geldige bijlage bestandstypen die mogen worden ge-upload (bijv. \'.pdf,.jpg,.gif,.png,.mp4,.avi\')",
"tnlTypes_label" => "Thumbnail bestandstypen",
"tnlTypes_text" => "Door comma's gescheiden lijst met geldige thumbnail bestandstypen die mogen worden ge-upload (bijv. \'.jpg,.jpeg,.gif,.png\')",
"tnlMaxSize_label" => "Thumbnail - maximum grootte",
"tnlMaxSize_text" => "Maximum thumbnail afbeeldingsgrootte. Indien gebruikers grotere afbeeldingen uploadens, worden de afbeeldingen automatisch verkleind naar de maximum grootte.<br>Let op: Hoge thumbnailafbeeldingens zullen de dagen in Maandoverzicht oprekken, hetgeen tot ongewenste effecten kan leiden.",
"tnlDelDays_label" => "Thumbnail verwijdermarge",
"tnlDelDays_text" => "Indien een thumbnail wordt gebruikt na dit aantal dagen geleden, kan het niet worden verwijderd.<br>De waarde 0 dagen betekent dat de thumbnail niet kan worden verwijderd.",
"days" =>"dagen",
"mbytes" => "MB",
"wxhinpx" => "B x H in pixels",

//settings.php - reminders settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"services_label" => "Berichtendiensten",
"services_text" => "Beschikbare diensten om activiteitherinneringen te versturen. Als een dienst niet is geselecteerd, zal het betreffende onderdeel in het Activiteiten window niet worden weergegeven. Als geen enkele dienst is geselecteerd, zullen er geen herinneringen worden verstuurd.",
"smsCarrier_label" => "SMS carrier sjabloon",
"smsCarrier_text" => "Het SMS carrier sjabloon wordt gebruikt om het SMS gateway e-mailadres samen te stellen: ppp#sss@carrier, waar . . .<br>• ppp: optionele text string welke voor het telefoonnummer wordt geplaatst<br>• #: placeholder voor het mobile telefoonnummer van de ontvanger (de kalender zal de # vervangen door het telefoonnummer)<br>• sss: optionele text string welke wordt toegevoegd na het telefoonnummer, bijv. een gebruikersnaam en wachtwoord, vereist door sommige dienstverleners<br>• @: scheidingsteken<br>• carrier: carrier adres (bijv. mail2sms.com)<br>Sjabloon voorbeelden: #@xmobile.com, 0#@carr2.int, #myunmypw@sms.gway.net.",
"smsCountry_label" => "SMS landnummer",
"smsCountry_text" => "Als de SMS gateway zich in een ander land bevindt dan de kalender, dan moet het landnummer van het land waar de kalender wordt gebruikt worden opgegeven.<br>Kies of de provider het voorvoegsel \'+\' of \'00\' vereist.",
"smsSubject_label" => "SMS onderwerp sjabloon",
"smsSubject_text" => "Indien opgegeven, zal de tekst in dit sjabloon naar het onderwerp veld worden gekopieerd van de SMS welke naar de carrier wordt gestuurd. De tekst mag het teken # bevatten, hetgeen zal worden vervangen door het telefoonnummer van de kalender of van de eigenaar van de activiteit (afhankelijk van bovenstaande instelling).<br>Voorbeeld: \'FROMFHONENUMBER=#\'.",
"smsAddLink_label" => "Link naar de activiteit toevoegen aan de SMS",
"smsAddLink_text" => "Wanneer aangevinkt, wordt een link naar de activiteit aan elke SMS toegevoegd. Wanneer deze link op een mobile telefoon wordt geopend, zal de onvanger de details van de activiteit kunnen zien.",
"maxLenSms_label" => "Maximum SMS bericht lengte",
"maxLenSms_text" => "SMS berichten worden verstuurd met utf-8 karakter codering. Berichten tot 70 tekens resulteren in een enkel SMS bericht; berichten > 70 tekens, met veel Unicode tekens, kunnen worden opgedeeld in meerdere SMS berichten.",
"calPhone_label" => "Kalender telefoonnummer",
"calPhone_text" => "Het telefoonnummer wordt gebruikt als zender ID bij het versturen van SMS herinneringsberichten.<br>Formaat: vrij, max. 20 tekens (sommige landen eisen een telefoonnummer, andere landen accepteren ook alfabetische tekens).<br>Als de SMS service niet actief is of als geen SMS onderwerk sjabloon is gedefinieerd, mag dit veld leeg zijn.",
"notSenderEml_label" => "Afzender van herinneringsmails",
"notSenderEml_text" => "Wanneer de kalender herinneringsmails verstuurt, kan het veld afzender of het kalender e-mailadres of het e-mailadres van de gebruiker die de activiteit heeft ingevoerd bevatten.<br>In geval van het e-mailadres van de gebruiker kan de ontvanger antwoorden op de e-mail.",
"notSenderSms_label" => "Afzender van SMSjes",
"notSenderSms_text" => "Wanner de kalender herinnerings SMSjes vestuurd, kan de afzender van het SMSje of het telefoonnummer van de kalender zijn, of het telefoonnummer van de gebruiker die de activiteit heeft ingevoerd.<br>Indien \'gebruiker\' is geselecteerd en in het gebruikersprofiel is geen telefoonnummer opgegeven, zal het telefoonnummer van de kalender worden genomen.<br>Indien het telefoonnummer van de gebruiker wordt genomen, dan kan de ontvanger op het SMSje antwoorden.",
"defRecips_label" => "Standaard lijst van geadresseerden",
"defRecips_text" => "Indien gespecificeerd, zal dit de standaard lijst in het activiteiten window zijn voor e-mail- en/of SMS herinneringen. Indien dit veld leeg is, zal de standaard geadresseerde de gebruiker zijn die de activiteit heeft ingevoerd.",
"maxEmlCc_label" => "Max. no. of recipients per email",
"maxEmlCc_text" => "Normally ISPs allow a maximum number of recipients per email. When sending email or SMS reminders, if the number of recipients is greater than the number specified here, the email will be split in multiple emails, each with the specified maximum number of recipients.",
"mailServer_label" => "Mail server",
"mailServer_text" => "PHP mail is bruikbaar voor niet beveiligde e-mail\'s in kleine aantallen. Voor grotere aantallen te versturen e-mail of wanneer wachtwoord beveiliging vereist is, moet SMTP mail worden gebruikt.<br>Om SMTP mail te gebruiken is een SMTP mail server nodig. De configuratie parameters voor de SMTP server moeten hierna worden gespecificeerd.",
"smtpServer_label" => "SMTP server naam",
"smtpServer_text" => "Als SMTP mail is geselecteerd, moet hier de SMTP server naam worder gespecificeerd. Bijvoorbeeld gmail SMTP server: smtp.gmail.com.",
"smtpPort_label" => "SMTP poort nummer",
"smtpPort_text" => "Als SMTP mail is geselecteerd, moet hier het SMTP portnummer worden gespecificeerd. Bijvoorbeeld 25, 465 or 587. Gmail bijvoorbeeld, gebruikt poortnummer 465.",
"smtpSsl_label" => "SSL (Secure Sockets Layer)",
"smtpSsl_text" => "Als SMTP mail is geselecteerd, kies dan hier of de secure sockets layer (SSL) moet worden gebruikt. Voor gmail: aan",
"smtpAuth_label" => "SMTP authenticatie",
"smtpAuth_text" => "Als SMTP authenticatie is geselecteerd, worden de gebruikersnaam en het wachtwoord hiernaast daarvoor gebruikt. Voor gmail is de gebruikersnaam bijvoorbeeld het deel van het e-mail adres voor de @.",
"cc_prefix" => "Landnummer begint met voorvoegsel + or 00",
"general" => "Algemeen",
"email" => "E-mail",
"sms" => "SMS",
"php_mail" => "PHP mail",
"smtp_mail" => "SMTP mail (vul onderstaande velden in)",

//settings.php - periodic function settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"cronHost_label" => "Cron job host",
"cronHost_text" => "Selecteer waar de cronjob draait welke periodiek het script \'lcalcron.php\' start.<br>• lokaal: cronjob draait op dezelfde server<br>• elders: cronjob draait op een externe server of lcalcron.php wordt met de hand gestart (testen)<br>• IP-adres: cronjob draait op een externe server met het opgegeven IP adres.",
"cronSummary_label" => "Admin cronjob samenvatting",
"cronSummary_text" => "E-mail een cronjob samenvatting naar de kalenderbeheerder.<br>Inschakelen is alleen zinvol als een cronjob is geactiveerd voor de kalender.",
"chgSummary_label" => "Daily calendar changes summary",
"chgSummary_text" => "Aantal dagen dat wordt teruggegaan voor het overzicht met kalenderwijzigingen<br>Als het aantal dagen 0 is, wordt er geen overzicht met kalenderwijzigingen verstuurd.",
"icsExport_label" => "Dagelijkse export iCal activiteiten",
"icsExport_text" => "Indien ingeschakeld, worden alle activiteiten in het datumbereik van -1 week tot +1 jaar geëxporteerd in iCalendar formaat in een .ics file in de \'files\' folder.<br>De bestandsnaam wordt de kalendernaam met spatie\'s vervangen door underscores. Oude bestanden worden overschreven door nieuwere.",
"eventExp_label" => "Aantal dagen voor activiteiten worden verwijderd",
"eventExp_text" => "Aantal dagen na de activiteit datum waarna deze automatisch wordt verwijderd.<br>Indien 0 of als er geen cron job is gedefinieerd, worden geen activiteiten verwijderd.",
"maxNoLogin_label" => "Max. aantal dagen niet ingelogd",
"maxNoLogin_text" => "Als een gebruiker gedurende dit aantal dagen niet is ingelogd, dan wordt zijn/haar account automatisch verwijderd.<br>Als het aantal dagen 0 is, zullen gebruikersaccounts nooit worden verwijderd",
"local" => "lokaal",
"remote" => "extern",
"ip_address" => "IP adres",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"popFieldsSbar_label" => "Activiteit velden - sidebar hover box",
"popFieldsSbar_text" => "De weer te geven activiteitvelden in de hover box met activiteitdetails in de stand-alone sidebar kunnen worden opgegeven d.m.v. een reeks van cijfers.<br>Als dit veld leeg is, zal geen hover box worden weergegeven.",
"showLinkInSB_label" => "Toon links in zijbalk",
"showLinkInSB_text" => "Toon URLs in de omschrijving van een activiteit als een hyperlink in de Binnenkort zijbalk",
"sideBarDays_label" => "Dagen te tonen in zijbalk",
"sideBarDays_text" => "Aantal dagen vooruit te kijken in de Binnenkort zijbalk.",

//login.php
"log_log_in" => "Aanmelden",
"log_remember_me" => "Onthoud mij",
"log_register" => "Registreren",
"log_change_my_data" => "Mijn gegevens wijzigen",
"log_save" => "Opslaan",
"log_un_or_em" => "Gebruikersnaam of e-mailadres",
"log_un" => "Gebruikersnaam",
"log_em" => "E-mailadres",
"log_ph" => "Mobiel telefoonnummer",
"log_answer" => "Uw antwoord",
"log_pw" => "Wachtwoord",
"log_new_un" => "Nieuwe gebruikersnaam",
"log_new_em" => "Nieuw e-mailadres",
"log_new_pw" => "Nieuw wachtwoord",
"log_con_pw" => "Bevestig wachtwoord",
"log_pw_msg" => "Hier zijn de aanmeldgegevens voor de web kalender",
"log_pw_subject" => "Uw wachtwoord",
"log_npw_subject" => "Uw nieuwe wachtwoord",
"log_npw_sent" => "Uw nieuwe wachtwoord is verstuurd",
"log_registered" => "Registratie gelukt - Uw wachtwoord is per mail verstuurd",
"log_em_problem_not_sent" => "E-mailprobleem - uw wachtwoord kon niet worden verstuurd",
"log_em_problem_not_noti" => "E-mailprobleem - de beheerder kon niet worden geïnformeerd",
"log_un_exists" => "Gebruikersnaam bestaat al",
"log_em_exists" => "E-mailadres bestaat al",
"log_un_invalid" => "Gebruikersnaam ongeldig (min lengte 2: A-Z, a-z, 0-9, en _-.) ",
"log_em_invalid" => "E-mailadres ongeldig",
"log_ph_invalid" => "Ongeldig mobiel telefoonnummer",
"log_sra_wrong" => "Incorrect answer to the question",
"log_sra_wrong_4x" => "You have answered incorrectly 4 times - try again in 30 minutes",
"log_un_em_invalid" => "Gebruikersnaam of wachtwoord onjuist",
"log_un_em_pw_invalid" => "Uw gebruikersnaam/e-mailadres of wachtwoord is onjuist",
"log_pw_error" => "Wachtwoord komt niet overeen",
"log_no_un_em" => "U hebt uw gebruikersnaam of e-mailadres niet ingevoerd",
"log_no_un" => "Voer uw gebruikersnaam in",
"log_no_em" => "Voer uw e-mailadres in",
"log_no_pw" => "U hebt uw wachtwoord niet ingevoerd",
"log_no_rights" => "Aanmelden afgewezen: u hebt geen toegangsrechten - Vraag de beheerder",
"log_send_new_pw" => "Stuur mij een nieuw wachtwoord",
"log_new_un_exists" => "De nieuwe gebruikersnaam bestaat al",
"log_new_em_exists" => "Het nieuwe e-mailadres bestaat al",
"log_ui_language" => "Taal gebruikersinterface",
"log_new_reg" => "Nieuwe gebruikersregistratie",
"log_date_time" => "Datum / tijd",
"log_time_out" => "Time out",

//categories.php
"cat_list" => "Categorieën",
"cat_edit" => "Wijzigen",
"cat_delete" => "Verwijderen",
"cat_add_new" => "Nieuwe categorie toevoegen",
"cat_add" => "Toevoegen",
"cat_edit_cat" => "Categorie wijzigen",
"cat_sort" => "Sorteer op naam",
"cat_cat_name" => "Naam categorie",
"cat_symbol" => "Symbol",
"cat_symbol_repms" => "Categorie symbool (vervangt minisquare)",
"cat_symbol_eg" => "e.g. A, X, ♥, ⛛",
"cat_matrix_url_link" => "URL link (zichtbaar in matrix weergave)",
"cat_seq_in_menu" => "Volgorde in menu",
"cat_cat_color" => "Categorie kleur",
"cat_text" => "Tekst",
"cat_background" => "Achtergrond",
"cat_select_color" => "Kies kleur",
"cat_subcats" => "Sub-<br>categorieën",
"cat_subcats_opt" => "Subcategorieën (optioneel)",
"cat_url" => "URL",
"cat_name" => "Naam",
"cat_save" => "Opslaan",
"cat_added" => "Categorie toegevoegd",
"cat_updated" => "Categorie gewijzigd",
"cat_deleted" => "Categorie verwijderd",
"cat_not_added" => "Categorie niet toegevoegd",
"cat_not_updated" => "Categorie niet gewijzigd",
"cat_not_deleted" => "Categorie niet verwijderd",
"cat_nr" => "#",
"cat_repeat" => "Herhalen",
"cat_every_day" => "elke dag",
"cat_every_week" => "elke week",
"cat_every_month" => "elke maand",
"cat_every_year" => "elk jaar",
"cat_overlap" => "Overlap<br>toegestaan<br>(tussentijd)",
"cat_need_approval" => "Activiteit vereist<br>goedkeuring",
"cat_no_overlap" => "Geen overlap toegestaan",
"cat_same_category" => "zelfde categorie",
"cat_all_categories" => "alle categorieën",
"cat_gap" => "gap",
"cat_ol_error_text" => "Foutmelding, in geval van overlap",
"cat_no_ol_note" => "Pas op: er wordt niet gecontroleerd op reeds aanwezige activiteiten; deze kunnen dus overlappen",
"cat_ol_error_msg" => "activiteit overlapt - kies een andere tijd",
"cat_no_ol_error_msg" => "Geen overlap foutmelding",
"cat_duration" => "Activiteits-<br>Duur<br>!: vast",
"cat_default" => "standaard (geen eindtijd)",
"cat_fixed" => "vast",
"cat_event_duration" => "Activiteit duur",
"cat_olgap_invalid" => "Invalid overlap gap",
"cat_duration_invalid" => "Ongeldige tijdsduur",
"cat_no_url_name" => "Geen URL link naam",
"cat_invalid_url" => "Ongeldige URL link",
"cat_day_color" => "Dag kleur",
"cat_day_color1" => "Dag kleur (jaar/matrix weergave)",
"cat_day_color2" => "Dag kleur (maand/week/dag weergave)",
"cat_approve" => "Activiteit vereist goedkeuring",
"cat_check_mark" => "Vinkje",
"cat_label" => "betekenis",
"cat_mark" => "symbool",
"cat_name_missing" => "Categorienaam ontbreekt",
"cat_mark_label_missing" => "Vinkteken/label ontbreekt",

//users.php
"usr_list_of_users" => "Lijst van gebruikers",
"usr_name" => "Gebruikersnaam",
"usr_email" => "E-mailadres",
"usr_phone" => "Mobiel telefoonnummer",
"usr_phone_br" => "Mobiel<br>telefoonnummer",
"usr_number" => "Gebruikersnummer",
"usr_number_br" => "Gebruikers-<br>nummer",
"usr_language" => "Taal",
"usr_ui_language" => "Gebruikersinterface taal",
"usr_group" => "Groep",
"usr_password" => "Wachtwoord",
"usr_edit_user" => "Gebruikersprofiel wijzigen",
"usr_add" => "Gebruiker toevoegen",
"usr_edit" => "Wijzigen",
"usr_delete" => "Verwijderen",
"usr_login_0" => "Eerste aanmelding",
"usr_login_1" => "Laatste aanmelding",
"usr_login_cnt" => "Aanmeldingen",
"usr_add_profile" => "Profiel toevoegen",
"usr_upd_profile" => "Profiel wijzigen",
"usr_if_changing_pw" => "Alleen als het wachtwoord verandert",
"usr_pw_not_updated" => "Wachtwoord niet gewijzigd",
"usr_added" => "Gebruiker toegevoegd",
"usr_updated" => "Gebruikersprofiel gewijzigd",
"usr_deleted" => "Gebruiker verwijderd",
"usr_not_deleted" => "Gebruiker niet verwijderd",
"usr_cred_required" => "Gebruikersnaam, e-mailadres en wachtwoord zijn verplicht",
"usr_name_exists" => "Gebruikersnaam bestaat al",
"usr_email_exists" => "E-mailadres bestaat al",
"usr_un_invalid" => "Gebruikersnaam ongeldig (min lengte 2: A-Z, a-z, 0-9, en _-.) ",
"usr_em_invalid" => "E-mailadres ongeldig",
"usr_ph_invalid" => "Ongeldig mobiel telefoonnummer",
"usr_cant_delete_yourself" => "Je kunt jezelf niet verwijderen",
"usr_go_to_groups" => "Ga naar Groepen",

//groups.php
"grp_list_of_groups" => "Lijst met Gebruikersgroepen",
"grp_name" => "Groepsnaam",
"grp_priv" => "Gebruikersrechten",
"grp_categories" => "Activiteiten categorieën",
"grp_all_cats" => "alle categorieën",
"grp_rep_events" => "Herhalende<br>activiteiten",
"grp_m-d_events" => "Meerdags<br>activiteiten",
"grp_priv_events" => "Privé<br>activiteiten",
"grp_upload_files" => "Bestanden<br>uploaden",
"grp_send_sms" => "Stuur<br>SMSjes",
"grp_tnail_privs" => "Thumbnail<br>rechten",
"grp_priv0" => "Geen rechten",
"grp_priv1" => "Kalender bekijken",
"grp_priv2" => "Invoeren/wijzigen eigen activiteiten",
"grp_priv3" => "Invoeren/wijzigen alle activiteiten",
"grp_priv4" => "Invoeren/wijzigen + manager",
"grp_priv9" => "Beheerder-functies",
"grp_may_post_revents" => "Mag herhalende activiteiten invoeren",
"grp_may_post_mevents" => "Mag meerdags activiteiten invoeren",
"grp_may_post_pevents" => "Mag privé activiteiten invoeren",
"grp_may_upload_files" => "Mag bestanden uploaden",
"grp_may_send_sms" => "Mag SMSjes vesturen",
"grp_tn_privs" => "Thumbnails rechten",
"grp_tn_privs00" => "geen",
"grp_tn_privs11" => "zie alle",
"grp_tn_privs20" => "manage eigen",
"grp_tn_privs21" => "m. eigen/z. alle",
"grp_tn_privs22" => "manage alle",
"grp_edit_group" => "Gebruikersgroep wijzigen",
"grp_sub_to_rights" => "Subject to user rights",
"grp_view" => "Bekijken",
"grp_add" => "Toevoegen",
"grp_edit" => "Wijzigen",
"grp_delete" => "Verwijderen",
"grp_add_group" => "Groep toevoegen",
"grp_upd_group" => "Groep wijzigen",
"grp_added" => "Groep toegevoegd",
"grp_updated" => "Groep gewijzigd",
"grp_deleted" => "Groep verwijderd",
"grp_not_deleted" => "Groep niet verwijderd",
"grp_in_use" => "Groep is in gebruik",
"grp_cred_required" => "Groepsnaam, Rechten en Categorieën zijn verplicht",
"grp_name_exists" => "Groepsnaam al gebruikt",
"grp_name_invalid" => "Groepsnaam ongeldig (min lengte 2: A-Z, a-z, 0-9, en _-.) ",
"grp_background" => "Achtergrondkleur",
"grp_select_color" => "Kies kleur",
"grp_invalid_color" => "Ongeldige kleuropmaak (#XXXXXX waar X = HEX-waarde)",
"grp_go_to_users" => "Ga naar Gebruikers",

//database.php
"mdb_dbm_functions" => "Database Functies",
"mdb_noshow_tables" => "Geen toegang tot tabel(len)",
"mdb_noshow_restore" => "Geen backup bestand geselecteerd",
"mdb_file_not_sql" => "Backup bestand moet een SQL bestand zijn (type '.sql')",
"mdb_compact" => "Comprimeer database",
"mdb_compact_table" => "Comprimeer tabel",
"mdb_compact_error" => "Fout",
"mdb_compact_done" => "OK, klaar",
"mdb_purge_done" => "Verwijderde activiteiten definitief weggegooid",
"mdb_backup" => "Back-up database",
"mdb_backup_table" => "Back-up tabel",
"mdb_backup_file" => "Backup bestand",
"mdb_backup_done" => "OK, klaar",
"mdb_records" => "gegevens",
"mdb_restore" => "Database terugzetten",
"mdb_restore_table" => "Tabel terugzetten",
"mdb_inserted" => "gegevens toegevoegd",
"mdb_db_restored" => "Database teruggezet.",
"mdb_no_bup_match" => "Backup bestand komt niet overeen met kalenderversie<br>Database niet teruggezet",
"mdb_events" => "Activiteiten",
"mdb_delete" => "verwijderen",
"mdb_undelete" => "herstellen",
"mdb_between_dates" => "voorkomend tussen",
"mdb_deleted" => "Activiteiten verwijderd",
"mdb_undeleted" => "Activiteiten hersteld",
"mdb_file_saved" => "Back-up bestand opgeslagen in map 'files' op de server.",
"mdb_file_name" => "Bestandsnaam",
"mdb_start" => "Start",
"mdb_no_function_checked" => "Geen functie(s) geselecteerd",
"mdb_write_error" => "Opslaan back-up bestand mislukt<br>Controleer rechten van de 'files/' map",

//import/export.php
"iex_file" => "Gekozen bestand",
"iex_file_name" => "Doel-bestandsnaam",
"iex_file_description" => "Beschrijving iCal bestand",
"iex_filters" => "Activiteitfilters",
"iex_export_usr" => "Export User Profiles",
"iex_import_usr" => "Import User Profiles",
"iex_upload_ics" => "Upload iCal bestand",
"iex_create_ics" => "Genereer iCal bestand",
"iex_tz_adjust" => "Tijdzone aanpassingen",
"iex_upload_csv" => "Upload CSV bestand",
"iex_upload_file" => "Upload bestand",
"iex_create_file" => "Maak bestand",
"iex_download_file" => "Download bestand",
"iex_fields_sep_by" => "Velden gescheiden door",
"iex_birthday_cat_id" => "ID verjaardagcategorie",
"iex_default_grp_id" => "Default user group ID",
"iex_default_cat_id" => "ID standaardcategorie",
"iex_default_pword" => "Default wachtwoord",
"iex_if_no_pw" => "Indien geen wachtwoord gespecificeerd",
"iex_replace_users" => "Vervang bestaande gebruikers",
"iex_if_no_grp" => "indien geen gebruikersgroep gevonden",
"iex_if_no_cat" => "indien geen categorie gevonden",
"iex_import_events_from_date" => "Importeer activiteiten die plaatsvinden vanaf",
"iex_no_events_from_date" => "Geen activiteiten gevonden na de opgegeven datum",
"iex_see_insert" => "zie aanwijzingen aan de rechterzijde",
"iex_no_file_name" => "Bestandsnaam ontbreekt",
"iex_no_begin_tag" => "ongeldig iCal bestand",
"iex_bad_date" => "Ongeldige datum",
"iex_date_format" => "Activiteit datum opmaak",
"iex_time_format" => "Activiteit tijd opmaak",
"iex_number_of_errors" => "Aantal fouten in de lijst",
"iex_bgnd_highlighted" => "achtergrond gemarkeerd",
"iex_verify_event_list" => "Lijst van activiteiten verifiëren, fouten verbeteren en klik op",
"iex_add_events" => "Activiteiten aan database toevoegen",
"iex_verify_user_list" => "Controleer gebruikerslijst, corrigeer mogelijke fouten en klik",
"iex_add_users" => "Voeg gebruikers toe aan database",
"iex_select_ignore_birthday" => "Vink eventueel Verjaardag en/of Wissen aan",
"iex_select_ignore" => "Vink Wissen aan om activiteit over te slaan",
"iex_check_all_ignore" => "Vink alle Wissen vakjes aan",
"iex_title" => "Titel",
"iex_venue" => "Plaats",
"iex_owner" => "Eigenaar",
"iex_category" => "Categorie",
"iex_date" => "Datum",
"iex_end_date" => "Einddatum",
"iex_start_time" => "Begintijd",
"iex_end_time" => "Eindtijd",
"iex_description" => "Omschrijving",
"iex_repeat" => "Herhaal",
"iex_birthday" => "Verjaardag",
"iex_ignore" => "Wissen",
"iex_events_added" => "activiteiten toegevoegd",
"iex_events_dropped" => "activiteiten overgeslagen (al aanwezig)",
"iex_users_added" => "gebruikers toegevoegd",
"iex_users_deleted" => "gebruikers verwijderd",
"iex_csv_file_error_on_line" => "CSV bestandsfout op regel",
"iex_between_dates" => "Plaatsvindend tussen",
"iex_changed_between" => "Toegevoegd/gewijzigd tussen",
"iex_select_date" => "Kies datum",
"iex_select_start_date" => "Kies begindatum",
"iex_select_end_date" => "Kies einddatum",
"iex_group" => "Gebruikersgroep",
"iex_name" => "Gebruikersnaam",
"iex_email" => "E-mail adres",
"iex_phone" => "Telefoon nummer",
"iex_lang" => "Taal",
"iex_pword" => "Wachtwoord",
"iex_all_groups" => "alle groepen",
"iex_all_cats" => "alle categorieën",
"iex_all_users" => "alle gebruikers",
"iex_no_events_found" => "Geen activiteiten gevonden",
"iex_file_created" => "Bestand aangemaakt",
"iex_write error" => "Opslaan exportbestand mislukt<br>Controleer permissies van 'files/' map",
"iex_invalid" => "foutief",
"iex_in_use" => "reeds in gebruik",

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
"cro_sum_header" => "CRONJOB SAMENVATTING",
"cro_sum_trailer" => "EINDE SAMENVATTING",
"cro_sum_title_eve" => "ACTIVITEITEN VERLOPEN",
"cro_nr_evts_deleted" => "Aantal activiteiten verwijderd",
"cro_sum_title_eml" => "E-MAIL HERINNERINGEN",
"cro_sum_title_sms" => "SMS HERINNERINGEN",
"cro_not_sent_to" => "Herinnering gestuurd naar",
"cro_no_reminders_due" => "Geen herinneringen te versturen",
"cro_subject" => "Onderwerp",
"cro_event_due_in" => "Deze activiteit staat op het programma over",
"cro_event_due_today" => "De volgende activiteit vindt vandaag plaats",
"cro_due_in" => "Op het programma over",
"cro_due_today" => "Vandaag",
"cro_days" => "dag(en)",
"cro_date_time" => "Datum / tijd",
"cro_title" => "Titel",
"cro_venue" => "Locatie",
"cro_description" => "Omschrijving",
"cro_category" => "Categorie",
"cro_status" => "Status",
"cro_sum_title_chg" => "KALENDER WIJZIGINGEN",
"cro_nr_changes_last" => "Aantal wijzigingen laatste",
"cro_report_sent_to" => "Rapport gestuurd naar",
"cro_no_report_sent" => "Geen rapport gemaild",
"cro_sum_title_use" => "GEBRUIKERSACCOUNTS VERLOPEN",
"cro_nr_accounts_deleted" => "Aantal accounts verwijderd",
"cro_no_accounts_deleted" => "Geen accounts verwijderd",
"cro_sum_title_ice" => "GEEXPORTEERDE ACTIVITEITEN",
"cro_nr_events_exported" => "Aantal gebeurtenissen dat is geëxporteerd in iCalendar opmaak naar bestand",

//messaging.php
"mes_no_msg_no_recip" => "Niet gestuurd, geen bestemming gevonden",

//explanations
"xpl_manage_db" =>
"<h3>Manage Database Instructies</h3>
<p>Op deze pagina kunnen de volgende functies worden geselecteerd:</p>
<h6>Comprimeer database</h6>
<p>Als een gebruiker een activiteit verwijdert, wordt deze als 'verwijderd' 
gemarkeerd, maar blijft in de database. De Comprimeer Database functie zal de 
activiteiten die meer dan 30 dagen geleden als 'verwijderd' zijn gemarkeerd 
definitief uit de database verwijderen, waardoor deze ruimte weer vrij komt.</p>
<h6>Back-up database</h6>
<p>Deze functie maakt een back-up van de volledige kalender database (tabellen, 
structuur en inhoud) in .sql formaat. De back-up zal worden opgeslagen in de 
<strong>files/</strong> map met de naam: 
<kbd>dump-cal-lcv-yyyymmdd-hhmmss.sql</kbd> (waar 'cal' = kalender ID, 'lcv' = 
kalender versie en 'yyyymmdd-hhmmss' = jaar, maand, dag, uur, minuten en 
seconden).</p>
<p>Dit back-up bestand kan worden gebruikt om de database tabelstructuur en 
inhoud opnieuw te genereren, via de herstel functie (zie hierna) of bijv. door 
het bestand te importeren in de <strong>phpMyAdmin</strong> applicatie, welke 
op de server van de meeste web host beschikbaar is.</p>
<h6>Herstel database</h6>
<p>Deze functie herstelt de kalender database met de inhoud van het ge-uploade 
back-up bestand (bestandstype .sql).</p>
<p>Wanneer de database wordt hersteld, GAAN ALL AANWEZIGE GEGEVENS VERLOREN!</p>
<h6>Activiteiten</h6>
<p>Deze funktie verwijdert/herstelt activiteiten welke plaatsvinden binnen de 
opgegeven datums. Indien een datumveld leeg wordt gelaten, is er geen 
datumlimiet; dus als beide datumvelden leeg worden gelaten, WORDEN ALLE 
ACTIVITEITEN VERWIJDERD!</p><br>
<p>BELANGRIJK: Wanneer de database wordt gecomprimeerd (zie hiervoor), kunnen de 
activiteiten die permanent worden verwijderd niet meer worden hersteld!</p>",

"xpl_import_csv" =>
"<h3>CSV Importeer Instructies</h3>
<p>Dit formulier wordt gebruikt om <strong>Comma Separated Values (CSV)</strong> 
bestanden met activiteiten in de LuxCal kalender te importeren.</p>
<p>De volgorde van de kolommen in het CSV bestand moet zijn: titel, plaats, 
categorie id (zie hieronder), datum, einddatum, begintijd, eindtijd en 
omschrijving. Als de eerste rij van het CSV bestand een omschrijving van de 
kolommen bevat, zal deze worden genegeerd.</p>
<p>Voor een juiste interpretatie van speciale tekens, moet het CSV bestand UTF-8 
gecodeerd zijn.</p>
<h6>Voorbeeld CSV bestanden</h6>
<p>Voorbeeld CSV bestanden kunt u vinden in de 'files/' map van de LuxCal 
download.</p>
<h6>Scheidingsteken voor de velden</h6>
Het scheidingsteken kan elk teken zijn, bijv. een komma, een puntkomma of een 
tab-teken (tab-teken: '\\t'). Het scheidingsteken moet uniek zijn en mag geen 
onderdeel uitmaken van de tekst, getallen of de datums in de velden.
<h6>Datum- en tijdopmaak</h6>
<p>Het geselecteerde datum- en tijdopmaak aan de linker zijde moet 
overeenstemmen met het datum- en tijdopmaak in het ge-uploade CSV bestand.</p>
<h6>Categorieënlijst</h6>
<p>De kalender kent ID nummers toe aan categorieën. De categorie ID's in het CSV 
bestand moeten overeenkomen met de categorieën welke in de kalender worden 
gebruikt of moeten 'leeg' zijn.</p>
<p>Als je in de volgende stap activiteiten wilt markeren als 'verjaardag', dan 
moet de <strong>ID verjaardag categorie</strong> worden gelijk gemaakt met de 
corresponderende ID in categorieënlijst hieronder.</p>
<p class='hired'>Pas op: Importeer niet meer dan 100 activiteiten per keer!</p>
<p>Voor de kalender zijn op dit moment de volgende categorieën gedefinieerd:</p>",

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
"<h3>iCalendar Importeer Instructies</h3>
<p>Dit formulier wordt gebruikt om <strong>iCalendar</strong> activiteiten in 
de kalender te importeren.</p>
<p>De inhoud van het bestand moet voldoen aan de [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>RFC5545 standaard</a></u>] van de Internet Engineering Task Force.</p>
<p>Alleen activiteiten zullen worden geïmporteerd; andere iCal onderdelen, zoals: 
To-Do, Journal, Free / Busy en Alarm, worden genegeerd.</p>
<h6>Voorbeeld iCal bestanden</h6>
<p>Voorbeeld iCalendar bestanden (bestandstype .ics) kunnen in de 'files/' map 
van de LuxCal download worden gevonden.</p>
<h6>Tijdzone aanpassingen</h6>
<p>Als het iCalendar bestand activiteiten in een andere tijdzone bevat en de 
data/tijden moeten worden aangepast aan de tijdzone van de kalender, selecteer 
dan 'Tijdzone aanpassingen'.</p>
<h6>Categorieënlijst</h6>
<p>De kalender kent ID nummers toe aan categorieën. De categorie ID's in het 
iCal bestand moeten overeenkomen met de categorieën welke in de kalender worden 
gebruikt of moeten 'leeg' zijn.</p>
<p class='hired'>Pas op: Importeer niet meer dan 100 activiteiten per keer!</p>
<p>Voor de kalender zijn op dit moment de volgende categorieën gedefinieerd:</p>",

"xpl_export_ical" =>
"<h3>iCalendar Exporteer Instructies</h3>
<p>Dit formulier wordt gebruikt om <strong>iCalendar</strong> activiteiten uit 
de kalender te exporteren.</p>
<p>De <b>iCal bestandsnaam</b> (zonder type) is optioneel. Geëxporteerde 
bestanden zullen worden opgeslagen in de \"files/\" map op de server met de 
opgegeven bestandsnaam, of anders met de naam van de kalender. Het bestandstype 
is <b>.ics</b>.
Bestaande bestanden in de \"files/\" map op de server met dezelfde naam zullen 
worden overschreven met het nieuwe bestand.</p>
<p>De <b>Beschrijving iCal bestand</b> (e.g. 'Vergaderingen 2013') is optioneel. 
Indien ingevuld zal het worden toegevoegd aan de 'header' in het geëxporteerde 
iCal bestand.</p>
<p><b>Activiteitenfilters</b>: De te exporteren activiteiten kunnen worden 
gefilterd op:</p>
<ul>
<li>eigenaar van activiteit</li>
<li>categorie van activiteit</li>
<li>begindatum van categorie</li>
<li>datum activiteit toegevoegd/laatst gewijzigd</li>
</ul>
<p>Elk filter is optioneel. Een leeg 'plaatsvindend tussen' datumvelden = 
respectievelijk -1 jaar en +1 jaar. Een leeg 'toegevoegd/gewijzigd' datumveld = 
geen begrenzing</p>
<br>
<p>De inhoud van het bestand met geëxporteerde activiteiten voldoet aan de 
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 standaard</a></u>] 
van de Internet Engineering Task Force.</p>
<p>Wanneer het geëxporteerde iCal bestand wordt <b>gedownload</b>, zullen de 
datum en tijd worden toegevoegd aan de naam van het gedownloade bestand.</p>
<h6>Voorbeeld iCal bestanden</h6>
<p><p>Voorbeeld iCal bestanden (bestandstype .ics) kunt u vinden in de 'files/' 
map van de LuxCal download.</p>"
);
?>
