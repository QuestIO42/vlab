<?php
/*
= LuxCal on-line user guide =

Dit bestand is vertaald door J.C.Barnhoorn uit Hellevoetsluis - opmerkingen en verbeteringen graag 
sturen naar rb@luxsoft.eu.

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ug language file version
define("LUG","4.7.8");

?>
<div style="margin:0 20px">
<div class="floatR">
<img src="lang/ug-layout.png" alt="LuxCal page layout"><br>
<span class="hired">a</span>: titelbalk&nbsp;&nbsp;<span class="hired">b</span>: navigatiebalk&nbsp;&nbsp;<span class="hired">c</span>: dag
</div>
<br>
<h3>Inhoud</h3>
<ol>
<li><p><a href="#ov">Weergave</a></p></li>
<li><p><a href="#li">Aanmelden</a></p></li>
<li><p><a href="#co">Kalenderopties</a></p></li>
<li><p><a href="#cv">Kalenderweergave</a></p></li>
<li><p><a href="#ts">Zoeken op tekst</a></p></li>
<?php if ($usr['privs'] > 1) { //if post rights ?>
<li><p><a href="#ae">Activiteit toevoegen / wijzigen / wissen</a></p></li>
<?php } ?>
<li><p><a href="#lo">Uitloggen</a></p></li>
<?php if ($usr['privs'] > 3) { //if manager/administrator ?>
<li><p><a href="#ca">Kalenderbeheer</a></p></li>
<?php } ?>
<li><p><a href="#al">Over LuxCal</a></p></li>
</ol>
</div>
<div class="clear">
<br>
<ol>
<li id="ov"><h3>Weergave</h3>
<p>De LuxCal kalender draait op een webserver en kan worden bekeken en gebruikt via uw browser.</p>
<p>In de titelbalk staan de titel van de kalender, de datum en de naam van de actuele gebruiker.
De navigatiebalk bevat menu's en links voor navigatie, in- en uitloggen, activiteiten toevoegen, enz. Welke menu's en links worden weergegeven is afhankelijk van de rechten van de gebruiker.
Onder de navigatiebalk kan de kalender op verschillende manieren worden weergegeven.</p>
<br></li>
<li id="li"><h3>Aanmelden</h3>
<p>Om de kalender te kunnen gebruiken klikt u op Log in, rechts in de navigatiebalk. U komt dan in het inlogscherm. Tik uw gebruikersnaam of mailadres in (een van de twee) en het van de beheerder ontvangen wachtwoord, en klik op Log in. Als u "Onthoudt mij" selecteert voor u op Log In klikt, dan wordt u de volgende keren dat u de kalender start automatisch ingelogd. Bent u uw wachtwoord vergeten, klik dan op Log in en daarna op de link om een nieuw wachtwoord toegestuurd te krijgen.</p>
<p>U kunt uw mailadres en wachtwoord wijzigen door uw huidige gebruikersnaam/mailadres en wachtwoord in te tikken, en daarna rechts een nieuw mailadres en/of nieuw wachtwoord.</p>
<p>Als de beheerder het publiek toegang tot de kalender heeft gegeven, kan de kalender worden bekeken zonder in te loggen.</p>
<br></li>
<li id="co"><h3>Kalender Opties</h3>
<p>Als je op de optieknop klikt kun je bij de beheerfuncties komen. Je kunt in dit paneel:</p>
<ul style="margin:0 20px">
<li><p>Kalender type kiezen (jaar, maand, week, dag, binnenkort, wijzigingen of matrix).</p></li>
<li><p>Een filter gebaseerd op de gebruikers. Gebeurtenissen van een of meerdere gebruikers kunnen worden geselecteerd.</p></li>
<li><p>Een filter gebaseerd op categorieën. gebeurtenissen in een of meerdere categorieën kunnen worden geselecteerd.</p></li>
<li><p>De gebruikers taal.</p></li>
</ul>
<p>Nadat je je keuzes hebt gemaakt, moet de Opties knop in the navigatiebalk opnieuw worden aangeklikt om de keuze te activeren.</p> 
<p>Notitie: Het scherm met gebeurtenissen filter menu en de taalkeuze kan door de beheerder worden uitgeschakeld.</p>
<br></li>
<li id="cv"><h3>Kalenderweergaven</h3>
<p>In alle weergaven zijn de details per activiteit zichtbaar als u er met de muis overheen gaat. Voor privé activiteiten wordt de achtergrond van de details licht groen en voor zich herhalende activiteiten is de rand van het detailsveld rood. In de weergave 'Binnenkort' worden URLs automatisch hyperlinks naar de betreffende websites.</p>
<p>In alle weergaven heeft de dag van vandaag een blauwe rand en als een nieuwe datum wordt geselecteerd in de navigatiebalk, krijgt deze geselecteerde datum een rode rand in de weergaven Maand en Jaar.</p>
<p>Activiteiten in een categorie waarvoor de admin een aankruisvakjes heeft geactiveerd worden weergegeven met een vakje/vinkje voor de titel; dit vakje kan worden gebruikt om activiteiten bijvoorbeeld als "gedaan" te markeren. Wanneer de gebruiker voldoende privileges heeft, kan dit vakje/vinkje worden aangeklikt om het vinkje aan of uit te zetten.</p>
<?php if ($usr['privs'] > 1) { //if post rights ?>
<p>Wanneer u voldoende rechten hebt:</p>
<ul style="margin:0 20px">
<li><p>zal in alle weergaven door op een activiteit te klikken het window 'Activiteit wijzigen' opengaan, waarmee de activiteit kan worden bekeken, gewijzigd of gewist</p></li>
<li><p>kan in de jaar-, maand- en matrixweergave een activiteit worden toegevoegd op een bepaalde datum door op een vrije plaats in de betreffende datumcel te klikken</p></li>
<li><p>kan in de week- en dagweergave het window 'Activiteit toevoegen' worden geopend door de cursor over een bepaalde tijdsperiode te slepen; in de velden voor datum en tijd wordt dan automatisch de geselecteerde tijdsperiode ingevuld.</p></li>
</ul>
<p>Om een activiteit te verplaatsen naar een andere datum of tijd klikt u op de activiteit en wijzigt u de datum of tijd in het window 'Activiteit wijzigen' dat dan opengaat. U kunt activiteiten niet slepen naar een andere datum of tijd.</p>
<?php } ?>
<br></li>
<li id="ts"><h3>Zoeken op Tekst</h3>
<p>Door te klikken op de knop met de driehoek rechts in de navigatie balk opent de zoekpagina. Op deze pagina kan een zoekactie worden gestart. De zoekpagina bevat gedetailleerde zoekinstructies.</p>
<br></li>
<?php if ($usr['privs'] > 1) { //if post rights ?>
<li id="ae"><h3>Activiteiten toevoegen / wijzigen / wissen</h3>
<p>Activiteiten toevoegen, wijzigen en wissen wordt gedaan via het window Activiteit, wat op verschillende manier kan worden geopend zoals hierna uitgelegd.</p>
<br><h6>a. Activiteit toevoegen</h6>
<p>Activiteiten toevoegen kan op de volgende manieren:</p>
<ul style="margin:0 20px">
<li><p>door in de navigatiebalk op de knop Activiteit toevoegen te klikken</p></li>
<li><p>door in de jaar-, maand- of matrixweergave op een vrije plaats in een datumcel te klikken</p></li>
<li><p>door in de dag- of weekweergave een bepaald deel van de dag te selecteren</p></li>
</ul>
<p>In al deze gevallen gaat het window 'Activiteit Toevoegen' open en kan de activiteit worden ingetikt. Sommige velden zijn al ingevuld, al naargelang welke manier is gekozen.</p>
<h3>Title, Locatie, Categorie, Beschrijving en Privé velden</h6>
<p>De velden locatie, categorie en een beschrijving zijn niet verplicht. Wanneer een categorie wordt aangevinkt, krijgt de activiteit in alle kalenderweergaven de bijbehorende tekst- en achtergrondkleur. Van URL's in de omschrijving wordt automatisch een hyperlink gemaakt die kan worden aangeklikt in de maandweergave, de weergave van de binnenkort plaatsvindende activiteiten en in kalendermails. Een privé-activiteit is alleen zichtbaar voor uzelf en niet voor anderen.</p>
<h3>Datums, Tijden en Herhaling velden</h6>
<p>Het veld 'Einddatum' is niet verplicht; het kan worden gebruikt voor activiteiten die meerdere dagen duren. Datum en tijd kunnen met de hand worden ingetikt of worden gekozen via de datum- en tijdkeuzeknopjes. U kunt activiteiten wekelijks, maandelijks, op bepaalde dagen van de maand, etc. laten terugkomen. Dit kunt u specificeren in het dialoogvenster dat opent wanneer u op 'Wijzigen' klikt. De activiteit zal worden herhaald tot de aangegeven einddatum. Als geen einddatum wordt aangegeven, wordt de activiteit oneindig herhaald, wat met name handig is voor verjaardagen.</p>
<h3>Stuur mail velden</h6>
<p>Via stuur mail kunt u aangeven dat de kalender direct en/of een aantal dagen vóór een geplande activiteit een mail moet sturen naar een of meer mailadressen. Ook zal op de dag zelf automatisch nog een mail worden gestuurd. Als het aantal dagen "0" wordt ingevoerd, zal alleen op de dag van de activiteit een mail worden verstuurd. Voor terugkomende activiteiten zal een mail worden verstuurd op het gekozen aantal dagen vóór elke keer dat de activiteit is gepland, en op de dag zelf.</p>
<p>De e-mail lijst kan bestaan uit mailadressen en/of de naam (zonder bestandsextensie) van een bestand met een voorgedefinieerde e-mail lijst, allen gescheiden door een puntkomma. De voorgedefinieerde e-mail lijst moet een tekstbestand met extensie ".txt" in de "reciplists/" map zijn met een e-mail adres per regel. In de bestandsnaam mag niet het "@" teken voorkomen.</p>
<p>Als alles is ingevuld, klikt u op 'Toevoegen'.</p>
<br>
<h6>b. Activiteiten wijzigen / wissen</h6>
<p>In elke kalenderweergave kan op een activiteit worden geklikt om een window met details van deze activiteit te openen. Indien u voldoende rechten heeft, kunt u de knop Activiteit wijzigen kiezen om de activiteit te wijzigen, te kopiëren of te wissen. Het window 'Activiteit' gaat dan open. Dit window is gelijk aan het boven beschreven window 'Activiteit toevoegen', behalve de titel van het window en de knoppen onderaan.</p>
<p>Afhankelijk van uw rechten kunt u of activiteiten zien, of uw eigen activiteiten zien/wijzigen/wissen, of alle activiteiten zien/wijzigen/wissen, ook die van andere gebruikers.</p>
<p>Voor een beschrijving van de velden, zie bovenstaande beschrijving van 'Activiteit Toevoegen'.</p>
<p>In het Activiteit Wijzigen window, bieden de knoppen onderaan de mogelijkheid een gewijzigde activiteit op te slaan, een gewijzigde activiteit als een nieuwe activiteit op te slaan (bijv. om een kopie voor een andere datum te maken) en om een activiteit te verwijderen.</p>
<p>Wanneer u klikt op 'Verwijderen', wordt de activiteit uit de kalender gewist.</p>
<p>Let op! Wanneer een terugkomende activiteit wordt gewist, worden alle keren gewist dat de activiteit voorkomt, niet alleen die op een bepaalde datum.</p>
<br></li>
<?php } ?>
<li id="lo"><h3>Uitloggen</h3>
<p>Om uit te loggen klikt u in de navigatiebalk op Log uit.</p>
<br></li>
<?php if ($usr['privs'] > 3) { //administrator/manager only ?>
<li id="ca"><h3>Kalenderbeheer</h3>
<p>- voor de volgende functies zijn beheersrechten vereist -</p>
<p>Wanneer een gebruiker inlogt met beheersrechten, zal rechts in de navigatiebalk een dropdownmenu 'Beheer' verschijnen. Via dit menu zijn de volgende beheersfuncties beschikbaar:</p>
<br>
<ol type='a'>
<?php if ($usr['privs'] == 9) { //administrator only ?>
<li><h6>Instellingen</h6>
<p>Deze pagina laat de actuele kalenderinstellingen zien, die vervolgens kunnen worden gewijzigd. Alle instellingen worden uitgelegd op de pagina 'Kalenderinstellingen wijzigen'. Deze pagina geeft een goede beschrijving van alle mogelijke instellingen.</p>
<br></li>
<?php } ?>
<li><h6>Categorieën</h6>
<p>Het toekennen van verschillende kleuren aan categorieën activiteiten is niet per se nodig, maar hierdoor wordt de kalender wel veel overzichtelijker. Categorieën kunnen bijvoorbeeld zijn 'vakantie', 'afspraak', 'verjaardag', 'belangrijk', etc.</p>
<p>Bij installatie is er maar één categorie, 'geen cat'. Als u in het beheermenu 'Categorieën' kiest, komt u op een pagina met een lijst van categorieën, waar u nieuwe categorieën kunt toevoegen of bestaande wijzigen/wissen.</p>
<p>Wanneer de gebruiker activiteiten toevoegt of wijzigt, kan deze in een dropdownmenu een van de gedefinieerde categorieën kiezen. De volgorde van de categorieën in het dropdownmenu wordt bepaald in het 'Volgorde' veld. De velden 'Tekstkleur' en 'Achtergrond' geven de kleuren aan waarmee activiteiten van die categorie in de kalender worden weergegeven.</p>
<p>Bij het toevoegen / wijzigen van een categorie kan een 'herhaling' worden ingesteld; activiteiten in deze categorie zullen automatisch worden herhaald zoals hier ingesteld. De checkbox 'Publiek' kan worden gebruikt om activiteiten welke tot deze categorie behoren te verbergen voor de publieke gebruiker (niet ingelogd) en uit te sluiten van de RSS feeds.</p>
<p>Een aankruisvakje/vinkje kan worden geactiveerd; dit resulteert in de kalender in de weergave van het aankruisvakje/vinkje voor de titel van de activiteit voor alle activiteiten in deze categorie. De gebruiker kan dit vinkje bijvoorbeeld gebruiken om activiteiten aan te vinken als "goedgekeurd" of "gedaan".</p>
<p>De velden Tekstkleur en Achtergrond bepalen de kleuren waarin de activiteiten worden weergegeven welke tot deze categorie behoren.</p>
<p>Wanneer u een categorie wist, komen de in die categorie vallende activiteiten terecht in 'no cat'.</p>
<br></li>
<li><h6>Gebruikers groepen</h6>
<p>Via deze pagina kan de beheerder gebruikers groepen aanmaken en beheren. Per groep kunnen de rechten van de gebruiker, de beschikbare aktoviteitscategorieën en de groepskleur worden gespecificeerd. Mogelijke toegangsrechten zijn: Geen, Bekijken, Eigen invoer, Alle invoeren, Manager en Admin. Alle gebruikers welke zijn toegewezen aan de groep delen dezelfde rechten, categorieën en kleur, zoals gedefineerd voor de groep.</p>
<br></li>
<li><h6>Gebruikers</h6>
<p>Via deze pagina kan de beheerder gebruikersaccounts aanmaken en beheren. Per gebruiker moeten de gebruikersnaam, e-mail, wachtwoord en de gebruikersgroep worden ingevoerd. Het is belangrijk dat een geldig e-mailadres wordt ingevoerd, zodat de gebruiker e-mailherinneringen kan ontvangen voor bepaalde activiteiten.</p>
<p>Via de Instellingen pagina, kan de beheerder "gebruikers zelfregistratie" toestaan en de gebruikersgroep bepalen voor zelfgeregistreerde gebruikers. Wanneer zelfregistratie is toegestaan, kunnen gebruikers zichzelf registreren via de browser interface.</p>
<p>Tenzij de beheerder het publiek toegang heeft gegeven om de kalender te bekijken, moet de gebruiker zich aanmelden met zijn of haar gebruikersnaam of mailadres en wachtwoord om de kalender te kunnen zien.</p>
<p>Via de Aanmeldpagina kan de gebruiker kan de standaard kalendertaal kiezen. Indien geen taal is gespecificeerd, wordt de standaard kalendertaal gebruikt die op de Beheerpagina is ingesteld.</p>
<br></li>
<?php if ($usr['privs'] == 9) { //administrator only ?>
<li><h6>Database</h6>
<p>De database pagina geeft de beheerder toegang tot de volgende functies:</p>
<ul>
<li>Comprimeer database: niet gebruikte ruimte wordt vrijgemaakt. Deze functie zorgt ervoor dat gebeurtenissen permanent worden verwijderd die meer dan 230 dagen geleden zijn verwijderd.</li>
<li>Back-up database: een backup maken van de huidige database, welke kan worden gebruikt om de database inhoud terug te zetten.</li>
<li>Database terugzetten: een eerder gemaakt back-up terugzetten om zo de structuur en de inhoud van de database tabellen te herstellen.</li>
<li>Activiteiten verwijderen/herstellen: activiteiten binnen de opgegeven datumgrenzen verwijderen/herstellen.</li>
</ul>
<p>De functie Compact database kan een keer per jaar worden gebruikt om de database te optimaliseren en de functie Backup database zou regelmatig moeten worden uitgevoerd, afhankelijk van het aantal kalenders en de functie activiteiten verwijderen kan bijvoorbeeld worden gebruikt om aktiviteiten van voorgaande jaren uit de kalender te verwijderen.</p>
<br></li>
<li><h6>CSV Bestand Importeren</h6>
<p>Deze functie kan worden gebruikt om in de LuxCal kalender gegevens te importeren die zijn geëxporteerd uit andere kalenders (bijv. MS Outlook). Instructies zijn te vinden op de CSV Import pagina.</p>
<br></li>
<li><h6>iCal Bestand Importeren</h6>
<p>Deze functie kan worden gebruikt om activiteiten uit iCal bestanden (bestandstype .ics) in de LuxCal kalender te importeren. Instructies zijn te vinden op de iCal Import pagina. Alleen activiteiten, welke compatibel zijn met de LuxCal kalender worden geïmporteerd. Andere componenten, zoals: To-Do, Jounal, Free / Busy, Timezone en Alarm, worden genegeerd.</p>
<br></li>
<li><h6>iCal Bestand Exporteren</h6>
<p>Deze functie kan worden gebruikt om activiteiten uit de LuxCal kalender naar iCal bestanden te exporteren (bestandstype .ics). Instructies zijn te vinden op de iCal Export pagina.</p>
<br></li>
<?php } ?>
</ol>
</li>
<?php } ?>
<li id="al"><h3>Over LuxCal</h3>
<p>Geproduceerd door: <b>Roel Buining</b>&nbsp;&nbsp;&nbsp;&nbsp;Website en forum: <b><a href="http://www.luxsoft.eu/" target="_blank">www.luxsoft.eu/</a></b></p>
<p>LuxCal is freeware and may be redistributed and/or modified under the terms of the <b><a href="http://www.luxsoft.eu/index.php?pge=gnugpl" target="_blank">GNU General Public License</a></b>.</p>
<br></li>
</ol>
</div>