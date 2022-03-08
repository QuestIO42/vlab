<?php
/*
= LuxCal language file =

Ins Deutsche übersetzt von Ulrich Krause. Bitte senden Sie Kommentare / Verbesserungen an rb@luxsoft.eu.
2011-05-15 aktualisiert von Alfred Bruckner - letztes Update 27.3.2013
2018-02-09 aktualisiert von Markus Windgassen

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","4.7.8");
define("ISOCODE","de");

/* -- Titles im Kopf Kalender -- */

$months = array("Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember");
$months_m = array("Jan","Feb","Mär","Apr","Mai","Jun","Jul","Aug","Sep","Okt","Nov","Dez");
$wkDays = array("Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag","Sonntag");
$wkDays_l = array("Son","Mon","Die","Mit","Don","Fre","Sam","Son");
$wkDays_m = array("So","Mo","Di","Mi","Do","Fr","Sa","So");
$wkDays_s = array("S","M","D","M","D","F","S","S");
$dhm = array("D","H","M"); //Days, Hours, Minutes


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Senden",
"log_in" => "Einloggen",
"log_out" => "Ausloggen",
"none" => "Keine.",
"all_day" => "ganztägig",
"back" => "Zurück",
"restart" => "Restart",
"by" => "durch",
"of" => "im",
"max" => "max.",
"options" => "Optionen",
"done" => "Ok",
"at_time" => "@", //date and time separator (e.g. 30-01-2020 @ 10:45)
"from" => "Ab", //Bsp.: ab 9:30
"until" => "Bis", //Bsp.: bis 15:30
"to" => "To", //e.g. to 17-02-2020
"open_calendar" => "Kalender öffnen",
"no_way" => "Sie haben keine Berechtigung für diese Aktion",

//index.php
"title_log_in" => "Log In",
"title_profile" => "Benutzerprofil",
"title_upcoming" => "Anstehende Termine",
"title_event" => "Termin",
"title_check_event" => "Termin prüfen",
"title_search" => "Text Suche",
"title_contact" => "Contact Form",
"title_thumbnails" => "Thumbnail Images",
"title_user_guide" => "LuxCal Bedienungsanleitung",
"title_settings" => "Kalendereinstellungen",
"title_edit_cats" => "Kategorien bearbeiten",
"title_edit_users" => "Benutzer bearbeiten",
"title_edit_groups" => "Bearbeite  Benutzergruppen",
"title_manage_db" => "Datenbank Wartung",
"title_changes" => "Hinzugefügte / Geänderte / Gelöschte Termine",
"title_usr_import" => "User Datei Import - CSV format",
"title_usr_export" => "User Datei Export - CSV format",
"title_evt_import" => "Event Datei Import - CSV format",
"title_ics_import" => "Event Datei Import - iCal format",
"title_ics_export" => "Event Datei Export - iCal format",
"title_ui_styling" => "User Interface Styling",

//header.php
"hdr_button_back" => "Zurück zur Hauptseite",
"hdr_options_submit" => "Auswählen und auf 'Ok' klicken",
"hdr_options_panel" => "Anzeige Optionen einstellen",
"hdr_select_date" => "Datum auswählen",
"hdr_calendar" => "Kalender",
"hdr_view" => "Ansicht",
"hdr_lang" => "Sprache",
"hdr_all_cats" => "Alle Kategorien",
"hdr_all_groups" => "Alle Gruppen",
"hdr_all_users" => "Alle Benutzer",
"hdr_go_to_view" => "Gehe zu Ansicht",
"hdr_view_1" => "Jahr",
"hdr_view_2" => "Monat",
"hdr_view_3" => "Arbeitsmonat",
"hdr_view_4" => "Woche",
"hdr_view_5" => "Arbeitswoche",
"hdr_view_6" => "Tag",
"hdr_view_7" => "Anstehend",
"hdr_view_8" => "Änderungen",
"hdr_view_9" => "Matrix(C)",
"hdr_view_10" => "Matrix(U)",
"hdr_view_11" => "Gantt Chart",
"hdr_select_admin_functions" => "Administrator Funktion auswählen",
"hdr_admin" => "Administration",
"hdr_settings" => "Einstellungen",
"hdr_categories" => "Kategorien",
"hdr_users" => "Benutzer",
"hdr_groups" => "Benutzergruppen",
"hdr_database" => "Datenbank",
"hdr_import_usr" => "User Import (CSV file)",
"hdr_export_usr" => "User Export (CSV file)",
"hdr_import_csv" => "Event Import (CSV file)",
"hdr_import_ics" => "Event Import (iCal file)",
"hdr_export_ics" => "Event Export (iCal file)",
"hdr_styling" => "Styling",
"hdr_back_to_cal" => "Zurück zur Kalenderansicht",
"hdr_button_print" => "Ausdrucken",
"hdr_print_page" => "Diese Seite ausdrucken",
"hdr_button_pdf" => "PDF File",
"hdr_dload_pdf" => "Download upcoming events",
"hdr_button_contact" => "Contact",
"hdr_contact" => "Contact the administrator",
"hdr_button_tnails" => "Thumbnails",
"hdr_tnails" => "Show thumbnails",
"hdr_button_toap" => "Bestätigen",
"hdr_toap_list" => "Bestätigungspflichtige Termine",
"hdr_button_todo" => "Todo",
"hdr_todo_list" => "Todo Liste",
"hdr_button_upco" => "Bald",
"hdr_upco_list" => "Termine in Kürze",
"hdr_button_search" => "Suche",
"hdr_search" => "Suche",
"hdr_button_add" => "Hinzufügen",
"hdr_add_event" => "Termin hinzufügen",
"hdr_button_help" => "Hilfe",
"hdr_user_guide" => "Gebrauchsanweisung",
"hdr_gen_guide" => "General User Guide",
"hdr_cs_guide" => "Context-sensitive User Guide",
"hdr_gen_help" => "Allgemeine Hilfe",
"hdr_prev_help" => "vorherige Hilfethema",
"hdr_open_menu" => "Open Menu",
"hdr_side_menu" => "Side Menu",
"hdr_today" => "Heute", //dtpicker.js
"hdr_clear" => "Löschen", //dtpicker.js

//event.php
"evt_no_title" => "Kein Titel",
"evt_no_start_date" => "Kein Start Datum",
"evt_bad_date" => "Falsches Datum",
"evt_bad_rdate" => "Falsches Wiederholungsende Datum",
"evt_no_start_time" => "Keine Startzeit",
"evt_bad_time" => "Falsche Zeit",
"evt_end_before_start_time" => "Endzeit vor Anfangszeit",
"evt_end_before_start_date" => "Enddatum vor Anfangsdatum",
"evt_until_before_start_date" => "Wiederholungsende vor Anfangsdatum",
"evt_default_duration" => "Default event duration of $1 hours and $2 minutes",
"evt_fixed_duration" => "Fixed event duration of $1 hours and $2 minutes",
"evt_approved" => "Ereignis bestätigt",
"evt_apd_locked" => "Ereignis bestätigt und gesperrt",
"evt_title" => "Titel",
"evt_venue" => "Ort",
"evt_address_button" => "Eine Adresse zwischen ! wird eine `Adresseknopf`",
"evt_category" => "Kategorie",
"evt_subcategory" => "Subcategory",
"evt_description" => "Beschreibung",
"evt_attachments" => "Anhänge",
"evt_attach_file" => "Datei anfügen",
"evt_click_to_open" => "Click to open",
"evt_click_to_remove" => "Click to remove",
"evt_no_pdf_img_vid" => "Anhang darf nur pdf, image or video",
"evt_error_file_upload" => "Fehler beim hochladen der Datei",
"evt_upload_too_large" => "Hochzuladende Datei ist zu groß",
"evt_date_time" => "Datum / Zeit",
"evt_private" => "Privater Termin",
"evt_start_date" => "Anfang",
"evt_end_date" => "Ende",
"evt_select_date" => "Wähle Datum",
"evt_select_time" => "Wähle Zeit",
"evt_all_day" => "Ganztags",
"evt_change" => "Ändern",
"evt_set_repeat" => "Wiederholung",
"evt_set" => "OK",
"evt_help" => "Hilfe",
"evt_repeat_not_supported" => "Wiederholungsdatei nicht unterstützt",
"evt_no_repeat" => "Keine Wiederholung",
"evt_repeat_on" => "Wiederhole jeden",
"evt_until" => "bis",
"evt_blank_no_end" => "leer: kein Ende",
"evt_each_month" => "jeden Monat",
"evt_interval2_1" => "1.",
"evt_interval2_2" => "2.",
"evt_interval2_3" => "3.",
"evt_interval2_4" => "4.",
"evt_interval2_5" => "letzten",
"evt_period1_1" => "Tagen",
"evt_period1_2" => "Wochen",
"evt_period1_3" => "Monaten",
"evt_period1_4" => "Jahren",
"evt_send_eml" => "Erinnerung",
"evt_send_sms" => "Send SMS",
"evt_now_and_or" => "sofort und/oder",
"evt_event_added" => "Neuer Termin",
"evt_event_edited" => "Geänderter Termin",
"evt_event_deleted" => "Gelöschter Termin",
"evt_event_approved" => "Bestätigter Termin",
"evt_days_before_event" => "Tag(e) vor dem Termin",
"evt_to" => "An",
"evt_not_help" => "Liste der Empfängeradressen getrennt durch Semicolon. Eine Empfängeradresse kann eine Benutzername sein, eine E-Mail Adresse, eine Mobilnummer oder, zwischen eckige Klammern,  der Name einer Datei mit Adressen im \'reciplists\' Verzeichnis, mit einer Adresse (eine Benutzername, eine E-Mail Adresse oder eine Mobilnummer) pro Zeile. When omitted, the default file extension is .txt.<br>Maximum field length: 255 characters.",
"evt_eml_help" => "Mobilnummer wird benutzt um entsprechende E-Mail Adresse in der Datenbank zu finden. Falls kein Ergebnis erfolgt, wird keine email an den Empfänger gesendet.",
"evt_sms_help" => "Unless terminated with a $-sign, email Adresse wird benutzt um entsprechende Mobilnummer in der Datenbank zu finden. Falls kein Ergebnis erfolgt, wird keine SMS an den Empfänger gesendet.",
"evt_recip_list_too_long" => "Adressenliste hat mehr als 255 Zeichen",
"evt_no_recip_list" => "Benachrichtigungsadresse(n) fehlt",
"evt_not_in_past" => "Benachrichtigung in der Vergangenheit",
"evt_not_days_invalid" => "Ungültige Anzahl an Tagen",
"evt_status" => "Status",
"evt_descr_help" => "The following items can be used in the description fields ...<br>• HTML tags &lt;b&gt;, &lt;i&gt;, &lt;u&gt; and &lt;s&gt; for bold, italic, underlined and striked-through text.",
"evt_descr_help_img" => "• small images (thumbnails) in the following format: \'image_name.ext\'. The thumbnail files, with file extension .gif, .jpg or .png, must be present in \'thumbnails\' folder. If enabled, the Thumbnails page can be used to upload thumbnail files.",
"evt_descr_help_eml" => "• Mailto-links in the following format: \'email address\' or \'email address [name]\', where \'name\' will be the title of the hyperlink. E.g. xxx@yyyy.zzz [For info click here].",
"evt_descr_help_url" => "• URL links in the following format: \'url\' or \'url [name]\', where \'name\' will be the title of the link. E.g. https://www.google.com [search].",
"evt_confirm_added" => "Termin hinzugefügt",
"evt_confirm_saved" => "Termin gespeichert",
"evt_confirm_deleted" => "Termin gelöscht",
"evt_add_close" => "Hinzufügen und schließen",
"evt_add" => "Hinzufügen",
"evt_edit" => "Bearbeiten",
"evt_save_close" => "Speichern und schließen",
"evt_save" => "Speichern",
"evt_clone" => "Kopie Speichern",
"evt_delete" => "Löschen",
"evt_close" => "Schließen",
"evt_added" => "Hinzugefügt",
"evt_edited" => "Angepasst",
"evt_is_repeating" => "ist ein sich wiederholender Termin.",
"evt_is_multiday" => "ist ein mehrtägiger Termin.",
"evt_edit_series_or_occurrence" => "Ganze Serie oder einzelnen Termin bearbeiten?",
"evt_edit_series" => "Ganze Serie",
"evt_edit_occurrence" => "Einzelner Termin",

//views
"vws_add_event" => "Termin hinzufügen",
"vws_edit_event" => "Edit Event",
"vws_see_event" => "See event details",
"vws_view_month" => "Zeige Monat",
"vws_view_week" => "Zeige Woche",
"vws_view_day" => "Zeige Tag",
"vws_click_for_full" => "Für ganzen Kalender Monat auswählen",
"vws_view_full" => "Ganzen Kalender zeigen",
"vws_prev_month" => "Voriges Monat",
"vws_next_month" => "Nächstes Monat",
"vws_today" => "Heute",
"vws_back_to_today" => "Zurück zum aktuellen Monat",
"vws_back_to_main_cal" => "Back to the main calendar month",
"vws_week" => "Woche",
"vws_wk" => "KW",
"vws_time" => "Zeit",
"vws_events" => "Termine",
"vws_all_day" => "Ganztags",
"vws_earlier" => "Früher",
"vws_later" => "Später",
"vws_venue" => "Ort",
"vws_address" => "Adresse",
"vws_events_for_next" => "Anstehende Termine für die nächste",
"vws_days" => "Tag(e)",
"vws_added" => "Hinzugefügt",
"vws_edited" => "Angepasst",
"vws_notify" => "Melden",
"vws_none_due_in" => "Keine anstehende Termine für die nächste",
"vws_evt_cats" => "Ereigniskategorien",
"vws_cal_users" => "Kalenderbenutzer",
"vws_no_users" => "No users in selected group(s)",
"vws_start" => "Start",
"vws_duration" => "Duration",
"vws_no_events_in_gc" => "No events in the selected period",
"vws_download" => "Download",
"vws_download_title" => "Download eine Textdatei mit diesen Ereignissen",
"vws_send_mail" => "E-Mail senden",
"vws_send_mail_to" => "E-Mail senden an",

//changes.php
"chg_from_date" => "Ab",
"chg_select_date" => "Wähle Startdatum",
"chg_notify" => "Sende Email",
"chg_days" => "Tag(e)",
"chg_added" => "Hinzugefügt",
"chg_edited" => "Angepasst",
"chg_deleted" => "Gelöscht",
"chg_changed_on" => "Verändert am",
"chg_changes" => "Veränderungen",
"chg_no_changes" => "Keine Veränderungen.",

//search.php
"sch_define_search" => "Suchkriterien",
"sch_search_text" => "Text",
"sch_event_fields" => "Termin Felder",
"sch_all_fields" => "Alle Felder",
"sch_title" => "Titel",
"sch_description" => "Beschreibung",
"sch_venue" => "Ort",
"sch_user_group" => "Benutzergruppe",
"sch_event_cat" => "Kategorie",
"sch_all_groups" => "All Groups",
"sch_all_cats" => "Alle Kategorien",
"sch_occurring_between" => "Fällig zwischen",
"sch_select_start_date" => "Start Datum",
"sch_select_end_date" => "Ende Datum",
"sch_search" => "Suchen",
"sch_invalid_search_text" => "Text fehlt oder ist zu kurz",
"sch_bad_start_date" => "Falsches Start Datum",
"sch_bad_end_date" => "Falsches Ende Datum",
"sch_no_results" => "Nichts gefunden",
"sch_new_search" => "Neue Suche",
"sch_calendar" => "Zum Kalender",
"sch_extra_field1" => "Extra field 1",
"sch_extra_field2" => "Extra field 2",
"sch_sd_events" => "Single-day events",
"sch_md_events" => "Multi-day events",
"sch_rc_events" => "Recurring events",
"sch_instructions" =>
"<h3>Anleitung zur Text Suche</h3>
<p>Die Kalender Datenbannk kann nach Terminen die den angegebenen Text enthalten durchsucht werden.</p>
<br><p><b>Text</b>: Die ausgewählten Felder (siehe unterhalb) der Termine werden durchsucht.
 Die Suche unterscheidet Groß-und Kleinschreibung.</p>
<p>Zwei Arten von Platzhalter Zeichen können angegeben werden:</p>
<ul>
<li>Ein Unterstrich (_) im Text steht für ein beliebiges Zeichen.<br>Z.B.: '_i_r' findet 'Bier', 'Tier', 'hier'.</li>
<li>Ein UND Zeichen (&amp;) im Text steht für eine beliebige Anzahl an Zeichen.
<br>Z.B.: 'de&amp;r' findet 'Dezember', 'Denker', 'deiner'.</li>
</ul>
<br><p><b>Termin Felder</b>: Nur die gewählten Felder werden durchsucht.</p>
<br><p><b>User group</b>: Nur Termine der betreffenden user group werden durchsucht.</p>
<br><p><b>Kategorie</b>: Nur Termine der betreffenden Kategorie werden durchsucht.</p>
<br><p><b>Fällig zwischen</b>: Start und Ende Datum sind optional.
Ein leeres Start Datum bedeutet: von heute ein Jahr in die Vergangenheit
und ein leeres Ende Datum bedeutet: von heute ein Jahr in die Zukunft.</p>
<br><p>To avoid repetitions of the same event, the search results will be split 
in single-day events, multi-day events and recurring events.</p>
<p>Das Ergebnis der Suche wird in chronologischer Reihenfolge angezeigt.</p>",

//thumbnails.php
"tns_man_tnails_instr" => "Manage Thumbnails Instructions",
"tns_help_general" => "The images below can be used in the calendar views, by inserting their filename in the event's description field or in one of the extra fields. An image file name can be copied to the clipboard by clicking the desired thumbnail below; subsequently, in the Event window, the image name can be inserted in one of the fields by typing CTRL-V. Under each thumbnail you will find: the file name (without the user ID prefix), the file date and between brackets the last date the thumbnail is used by the calendar.",
"tns_help_upload" => "Thumbnails can be uploaded from your local computer by selecting the Browse button. To select multiple files, hold down the CTRL or SHIFT key while selecting (max. 20 at a time). The following file types are accepted: $1. Thumbnails with a size greater than $2 x $3 pixels (w x h) will be resized automatically.",
"tns_help_delete" => "Thumbnails with a red cross in the upper left corner can be deleted by selecting this cross. Thumbnails without red cross can not be deleted, because they are still used after $1. Caution: Deleted thumbnails cannot be retrieved!",
"tns_your_tnails" => "Your thumbnails",
"tns_other_tnails" => "Other thumbnails",
"tns_man_tnails" => "Manage Thumbnails",
"tns_sort_by" => "Sort by",
"tns_sort_order" => "Sort order",
"tns_search_fname" => "Search file name",
"tns_upload_tnails" => "Upload thumbnails",
"tns_name" => "name",
"tns_date" => "date",
"tns_ascending" => "ascending",
"tns_descending" => "descending",
"tns_not_used" => "not used",
"tns_infinite" => "infinite",
"tns_del_tnail" => "Delete thumbnail",
"tns_tnail" => "Thumbnail",
"tns_deleted" => "deleted",
"tns_tn_uploaded" => "thumbnail(s) uploaded",
"tns_overwrite" => "allow overwriting",
"tns_tn_exists" => "thumbnail already exists – not uploaded",
"tns_upload_error" => "upload error",
"tns_no_valid_img" => "is no valid image",
"tns_file_too_large" => "file too large",
"tns_resized" => "resized",
"tns_resize_error" => "resize error",

//contact.php
"con_msg_to_admin" => "Message to the Administrator",
"con_from" => "From",
"con_name" => "Name",
"con_email" => "Email",
"con_subject" => "Subject",
"con_message" => "Message",
"con_send_msg" => "Send message",
"con_fill_in_all_fields" => "Please fill in all fields",
"con_invalid_name" => "Invalid name",
"con_invalid_email" => "Invalid email address",
"con_no_urls" => "No web links allowed in the message",
"con_mail_error" => "Email problem. The message could not be sent. Please try again later.",
"con_con_msg" => "Contact message from the calendar",
"con_thank_you" => "Thank you for your message to the calendar",
"con_get_reply" => "You will receive a reply to your message as soon as possible",
"con_date" => "Date",
"con_your_msg" => "Your message",
"con_your_cal_msg" => "Your message to the calendar",
"con_has_been_sent" => "has been sent to the calendar administrator",
"con_confirm_eml_sent" => "A confirmation email has been sent to",

//alert.php
"alt_message#0" => "If you don't use the calendar\\nyour session will soon expire!",
"alt_message#1" => "PHP SESSION ABGELAUFEN",
"alt_message#2" => "Kalender neu starten bitte.",
"alt_message#3" => "UNGÜLTIGE ANFRAGE",

//stand-alone sidebar (lcsbar.php)
"ssb_upco_events" => "Anstehende Ereignisse",
"ssb_all_day" => "Ganztags",
"ssb_none" => "Keine Termine."
);
?>
