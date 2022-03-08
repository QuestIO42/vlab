<?php
/*
= LuxCal lamguage file =

Tradotto in Italiano da Angelo.G. - per commenti contattare elghisa@gmail.com

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","4.7.8");
define("ISOCODE","it");

/* -- Titles on the Header of the Calendar and Date Picker -- */

$months = array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");
$months_m = array("Gen","Feb","Mar","Apr","Mag","Giu","Lug","Ago","Set","Ott","Nov","Dic");
$wkDays = array("Domenica","Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato","Domenica");
$wkDays_l = array("Dom","Lun","Mar","Mer","Gio","Ven","Sab","Dom");
$wkDays_m = array("Do","Lu","Ma","Me","Gi","Ve","Sa","Do");
$wkDays_s = array("D","L","M","M","G","V","S","D");
$dhm = array("D","H","M"); //Days, Hours, Minutes


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Invia",
"log_in" => "Log In",
"log_out" => "Log Out",
"none" => "Nessuno",
"all_day" => "All day",
"back" => "Indietro",
"restart" => "Restart",
"by" => "da",
"of" => "di",
"max" => "max.",
"options" => "Opzioni",
"done" => "Fatto",
"at_time" => "@", //date and time separator (e.g. 30-01-2020 @ 10:45)
"from" => "From", //e.g. from 9:30
"until" => "Until", //e.g. until 15:30
"to" => "To", //e.g. to 17-02-2020
"open_calendar" => "Apri il calendario",
"no_way" => "Non siete autorizzato ad eseguire questa azione",

//index.php
"title_log_in" => "Log In",
"title_profile" => "User profile",
"title_upcoming" => "Eventi prossimi",
"title_event" => "Evento",
"title_check_event" => "Controlla Evento",
"title_search" => "Ricerca Testo",
"title_contact" => "Contact Form",
"title_thumbnails" => "Thumbnail Images",
"title_user_guide" => "Guida dell'utente",
"title_settings" => "Impostazioni del calendario",
"title_edit_cats" => "Modifica Categorie",
"title_edit_users" => "Modifica Utenti",
"title_edit_groups" => "Edit User Groups",
"title_manage_db" => "Gestione del database",
"title_changes" => "Eventi Aggiunti / Modificati / Cancellati",
"title_usr_import" => "Importazione Users - CSV format",
"title_usr_export" => "Esportazione Users - CSV format",
"title_evt_import" => "Importazione Eventos - CSV format",
"title_ics_import" => "Importazione Eventos - iCal format",
"title_ics_export" => "Esportazione Eventos - iCal format",
"title_ui_styling" => "User Interface Styling",

//header.php
"hdr_button_back" => "Torna alla pagina superiore",
"hdr_options_submit" => "Fare le proprie scelte e premere 'Fatto'",
"hdr_options_panel" => "Pannello Opzioni",
"hdr_select_date" => "Seleziona data",
"hdr_calendar" => "Calendario",
"hdr_view" => "Vista",
"hdr_lang" => "Lingua",
"hdr_all_cats" => "Tutte le categorie",
"hdr_all_groups" => "All Groups",
"hdr_all_users" => "Tutti gli utenti",
"hdr_go_to_view" => "Go to view",
"hdr_view_1" => "Anno",
"hdr_view_2" => "Mese",
"hdr_view_3" => "Mese Lavorativo",
"hdr_view_4" => "Settimana",
"hdr_view_5" => "Settimana Lavorativa",
"hdr_view_6" => "Giorno",
"hdr_view_7" => "Eventi prossimi",
"hdr_view_8" => "Modifiche",
"hdr_view_9" => "Matrix(C)",
"hdr_view_10" => "Matrix(U)",
"hdr_view_11" => "Gantt Chart",
"hdr_select_admin_functions" => "Seleziona funz. amministrazione",
"hdr_admin" => "Amministrazione",
"hdr_settings" => "Impostazioni",
"hdr_categories" => "Categorie",
"hdr_users" => "Utenti",
"hdr_groups" => "User Groups",
"hdr_database" => "Database",
"hdr_import_usr" => "Import Users (CSV file)",
"hdr_export_usr" => "Export Users (CSV file)",
"hdr_import_csv" => "Import Eventos (CSV file)",
"hdr_import_ics" => "Import Eventos (iCal file)",
"hdr_export_ics" => "Esport Eventos (iCal file)",
"hdr_styling" => "Styling",
"hdr_back_to_cal" => "Back to calendar view",
"hdr_button_print" => "Stampa",
"hdr_print_page" => "Stampa questa pagina",
"hdr_button_pdf" => "PDF File",
"hdr_dload_pdf" => "Download upcoming events",
"hdr_button_contact" => "Contact",
"hdr_contact" => "Contact the administrator",
"hdr_button_tnails" => "Thumbnails",
"hdr_tnails" => "Show thumbnails",
"hdr_button_toap" => "Approve",
"hdr_toap_list" => "Events to be approved",
"hdr_button_todo" => "CoseDaFare",
"hdr_todo_list" => "Elenco CoseDaFare",
"hdr_button_upco" => "Prossimi",
"hdr_upco_list" => "Eventi prossimi",
"hdr_button_search" => "Cerca",
"hdr_search" => "Cerca",
"hdr_button_add" => "Aggiungi",
"hdr_add_event" => "Aggiungi Evento",
"hdr_button_help" => "Aiuto",
"hdr_user_guide" => "Guida Utente",
"hdr_gen_guide" => "General User Guide",
"hdr_cs_guide" => "Context-sensitive User Guide",
"hdr_gen_help" => "General help",
"hdr_prev_help" => "Previous help",
"hdr_open_menu" => "Open Menu",
"hdr_side_menu" => "Side Menu",
"hdr_today" => "oggi", //dtpicker.js
"hdr_clear" => "cancella", //dtpicker.js

//event.php
"evt_no_title" => "Nessun titolo",
"evt_no_start_date" => "Nessuna data d'inizio",
"evt_bad_date" => "Data in formato errato",
"evt_bad_rdate" => "Data di fine ripetizione errata",
"evt_no_start_time" => "Nessun orario d'inizio",
"evt_bad_time" => "Orario scorretto",
"evt_end_before_start_time" => "L'orario finale è precedente all'orario d'inizio",
"evt_end_before_start_date" => "La data finale è precedente alla data d'inizio",
"evt_until_before_start_date" => "Fine della ripetizione è precedente alla data d'inizio",
"evt_default_duration" => "Default event duration of $1 hours and $2 minutes",
"evt_fixed_duration" => "Fixed event duration of $1 hours and $2 minutes",
"evt_approved" => "Evento approvato",
"evt_apd_locked" => "Evento approvato e bloccato",
"evt_title" => "Titolo",
"evt_venue" => "Sede",
"evt_address_button" => "An address between ! marks will become a button",
"evt_category" => "Categoria",
"evt_subcategory" => "Subcategory",
"evt_description" => "Descrizione",
"evt_attachments" => "Attachments",
"evt_attach_file" => "Attach file",
"evt_click_to_open" => "Click to open",
"evt_click_to_remove" => "Click to remove",
"evt_no_pdf_img_vid" => "Attachment should be pdf, image or video",
"evt_error_file_upload" => "Error uploading file",
"evt_upload_too_large" => "Uploaded file too large",
"evt_date_time" => "Data / ora",
"evt_private" => "Privato",
"evt_start_date" => "Inizio",
"evt_end_date" => "Fine",
"evt_select_date" => "Scegliere la data",
"evt_select_time" => "Scegliere l'orario",
"evt_all_day" => "Giornata intera",
"evt_change" => "Cambia",
"evt_set_repeat" => "Imposta ripetizione",
"evt_set" => "OK",
"evt_help" => "aiuto",
"evt_repeat_not_supported" => "Ripetizione specificata non supportata",
"evt_no_repeat" => "Nessuna ripetizione",
"evt_repeat_on" => "Ripeti ogni",
"evt_until" => "sino a",
"evt_blank_no_end" => "vuoto: nessuna fine",
"evt_each_month" => "ogni mese",
"evt_interval2_1" => "primo",
"evt_interval2_2" => "secondo",
"evt_interval2_3" => "terzo",
"evt_interval2_4" => "quarto",
"evt_interval2_5" => "ultimo",
"evt_period1_1" => "giorno",
"evt_period1_2" => "settimana",
"evt_period1_3" => "mese",
"evt_period1_4" => "anno",
"evt_send_eml" => "Invia email",
"evt_send_sms" => "Send SMS",
"evt_now_and_or" => "ora e/o",
"evt_event_added" => "L'evento seguente è stato aggiunto",
"evt_event_edited" => "L'evento seguente è stato modificato",
"evt_event_deleted" => "L'evento seguente è stato modificato eliminato",
"evt_event_approved" => "Approved event",
"evt_days_before_event" => " giorni prima dell'evento",
"evt_to" => "A",
"evt_not_help" => "List of recipient addresses separated by semicolons. A recipient address can be a user name, an email address, a mobile phone number or, between square brackets, the name of a file with addresses in the \'reciplists\' directory, with one address (a user name, an email address or a mobile phone number) per line. When omitted, the default file extension is .txt.<br>Maximum field length: 255 characters.",
"evt_eml_help" => "Unless terminated with a $-sign, mobile phone numbers will be used to find the corresponding email address in the database. If not found, no email will be sent to this recipient.",
"evt_sms_help" => "Unless terminated with a $-sign, email addresses will be used to find the corresponding mobile phone number in the database. If not found, no SMS will be sent to this recipient.",
"evt_recip_list_too_long" => "L'elenco degli indirizzi contiene troppi caratteri.",
"evt_no_recip_list" => "Manca l'indirizzo o gli indirizzi a cui notifiare l'evento",
"evt_not_in_past" => "La data di notifica è nel passato",
"evt_not_days_invalid" => "Giorni di notifica non validi",
"evt_status" => "Status",
"evt_descr_help" => "Si possono inserire i seguenti oggetti nel campo descrizione ...<br>• HTML tags &lt;b&gt;, &lt;i&gt;, &lt;u&gt; e &lt;s&gt; per il testo grassetto, corsivo, sottolineato e barrato.",
"evt_descr_help_img" => "• piccole immagini (anteprime) nel seguente formato: \'nome_immagine.ext\'. The thumbnail files, with file extension .gif, .jpg or .png, must be present in \'thumbnails\' folder. If enabled, the Thumbnails page can be used to upload thumbnail files.",
"evt_descr_help_eml" => "• Mailto-links in the following format: \'email address\' or \'email address [name]\', where \'name\' will be the title of the link. E.g. xxx@yyyy.zzz [For info click here].",
"evt_descr_help_url" => "• URL link nel seguente formato: \'url\' o \'url [nome]'\, dove \'nome\' è il titolo del link. Per es. https://www.google.com [ricerca].",
"evt_confirm_added" => "evento aggiunto",
"evt_confirm_saved" => "evento salvato",
"evt_confirm_deleted" => "evento eliminato",
"evt_add_close" => "Aggiungi e chiudi",
"evt_add" => "Aggiungi",
"evt_edit" => "Modifica",
"evt_save_close" => "Salva e chiudi",
"evt_save" => "Salva",
"evt_clone" => "Salva come nuovo",
"evt_delete" => "Elimina",
"evt_close" => "Chiudi",
"evt_added" => "Aggiunto",
"evt_edited" => "Modificato",
"evt_is_repeating" => "è un evento ripetuto.",
"evt_is_multiday" => "è un evento su più giorni.",
"evt_edit_series_or_occurrence" => "Si vuole modificare la serie o solo questa occorrenza?",
"evt_edit_series" => "Modifica la serie",
"evt_edit_occurrence" => "Modifica l'occorrenza",

//views
"vws_add_event" => "Aggiungi evento",
"vws_edit_event" => "Edit Event",
"vws_see_event" => "See event details",
"vws_view_month" => "Vedi Mese",
"vws_view_week" => "Vedi Settimana",
"vws_view_day" => "Vedi Giorno",
"vws_click_for_full" => "per il calendario completo cliccare mese",
"vws_view_full" => "Vedi il calendario completo",
"vws_prev_month" => "Mese precedente",
"vws_next_month" => "Mese successivo",
"vws_today" => "Oggi",
"vws_back_to_today" => "Torna al mese di oggi",
"vws_back_to_main_cal" => "Back to the main calendar month",
"vws_week" => "Sett.",
"vws_wk" => "sett.",
"vws_time" => "ora",
"vws_events" => "Eventi",
"vws_all_day" => "Tutto il giorno",
"vws_earlier" => "Prima",
"vws_later" => "Dopo",
"vws_venue" => "Sede",
"vws_address" => "Address",
"vws_events_for_next" => "Eventi prossimi per i successivi",
"vws_days" => "giorno(i)",
"vws_added" => "Aggiunto",
"vws_edited" => "Modificato",
"vws_notify" => "Invia notifica",
"vws_none_due_in" => "Nessun evento in scadenza tra",
"vws_evt_cats" => "Event categories",
"vws_cal_users" => "Calendar users",
"vws_no_users" => "No users in selected group(s)",
"vws_start" => "Start",
"vws_duration" => "Duration",
"vws_no_events_in_gc" => "No events in the selected period",
"vws_download" => "Download",
"vws_download_title" => "Download a text file with these events",
"vws_send_mail" => "Send email",
"vws_send_mail_to" => "Send email to",

//changes.php
"chg_from_date" => "Dalla data",
"chg_select_date" => "Seleziona data inizio",
"chg_notify" => "Notifica",
"chg_days" => "Giorno(i)",
"chg_added" => "Aggiunto",
"chg_edited" => "Modificato",
"chg_deleted" => "Eliminato",
"chg_changed_on" => "Cambiato il",
"chg_changes" => "Cambiamenti",
"chg_no_changes" => "Nessun cambiamento.",

//search.php
"sch_define_search" => "Definire la ricerca",
"sch_search_text" => "Cerca il testo",
"sch_event_fields" => "Campi evento",
"sch_all_fields" => "Tutti i campi",
"sch_title" => "Titolo",
"sch_description" => "Descrizione",
"sch_venue" => "Sede",
"sch_user_group" => "User group",
"sch_event_cat" => "Categoria evento",
"sch_all_groups" => "All Groups",
"sch_all_cats" => "Tutte le Categorie",
"sch_occurring_between" => "Che cade tra",
"sch_select_start_date" => "Selezionare data inizio",
"sch_select_end_date" => "Selezionare data fine",
"sch_search" => "Cerca",
"sch_invalid_search_text" => "Testo di ricerca mancante o troppo corto",
"sch_bad_start_date" => "Data inizio errata",
"sch_bad_end_date" => "Data fine errata",
"sch_no_results" => "Nessun risultato trovato",
"sch_new_search" => "Nuova Ricerca",
"sch_calendar" => "Vai al calendario",
"sch_extra_field1" => "Extra field 1",
"sch_extra_field2" => "Extra field 2",
"sch_sd_events" => "Single-day events",
"sch_md_events" => "Multi-day events",
"sch_rc_events" => "Recurring events",
"sch_instructions" =>
"<h3>Istruzioni per la Ricerca Testo</h3>
<p>Si possono cercare nel database degli eventi che corrispondono ad un certo 
criterio di ricerca testuale.</p>
<br><p><b>Cerca il testo</b>: Si cercher&agrave; nei campi specificati (vedi 
sotto) di ciascun evento. La ricerca &egrave; sensibile al Maiuscolo/minuscolo.</p>
<p>Si possono usare due caratteri jolly:</p>
<ul>
<li>Carattere lineetta bassa (_) nel testo di ricerca ci pu&ograve; essere un 
singolo carattere qualsiasi.<br>Es.: '_er_' trover&agrave; 'cera', 'sere', 
'Per&ugrave;'.</li>
<li>Carattere 'e commerciale' (&amp;) nel testo di ricerca ci possono essere un 
numero qualunque di caratteri.<br>Es.: 'di&amp;e' trover&agrave; 'dicembre', 
'dire', 'divenute'.</li>
</ul>
<br><p><b>Campi evento</b>: Si cercher&agrave; solo nei campi specificati.</p>
<br><p><b>User group</b>: Events in the selected user group will be searched only.</p>
<br><p><b>Categoria evento</b>: Si cercher&agrave; solo negli eventi appartenenti alla categoria specificata 
only.</p>
<br><p><b>Che cade tra</b>: Le date d'inizio e fine sono opzionali. La data 
d'inizio vuota significa: un anno indietro nel passato da oggi e la data di fine vuota 
significa: un anno avanti nel futuro da oggi.</p>
<br><p>To avoid repetitions of the same event, the search results will be split 
in single-day events, multi-day events and recurring events.</p>
<p>I risultati della ricerca saranno mostrati in ordine cronologico.</p>",

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
"alt_message#1" => "PHP SESSION EXPIRED",
"alt_message#2" => "Please restart the Calendar",
"alt_message#3" => "INVALID REQUEST",

//stand-alone sidebar (lcsbar.php)
"ssb_upco_events" => "Eventi prossimi",
"ssb_all_day" => "Tutto il giorno",
"ssb_none" => "Nessun evento."
);
?>
