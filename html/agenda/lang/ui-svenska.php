<?php
/*
= LuxCal lamguage file =

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.
Translation to swedish by Christer "Scunder" Nordahl.

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","4.7.8");
define("ISOCODE","se");

/* -- Titles on the Header of the Calendar -- */

$months = array("Januari","Februari","Mars","April","Maj","Juni","Juli","Augusti","September","Oktober","November","December");
$months_m = array("Jan","Feb","Mar","Apr","Maj","Jun","Jul","Aug","Sep","Okt","Nov","Dec");
$wkDays = array("Söndag","Måndag","Tisdag","Onsdag","Torsdag","Fredag","Lördag","Söndag");
$wkDays_l = array("Sön","Mån","Tis","Ons","Tor","Fre","Lör","Sön");
$wkDays_m = array("Sö","Må","Ti","On","To","Fr","Lö","Sö");
$wkDays_s = array("S","M","T","O","T","F","L","S");
$dhm = array("D","H","M"); //Days, Hours, Minutes


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Skicka",
"log_in" => "Logga in",
"log_out" => "Logga ut",
"none" => "Ingen.",
"all_day" => "All day",
"back" => "Tillbaka",
"restart" => "Restart",
"by" => "av",
"of" => "av",
"max" => "max.",
"options" => "Alternativ",
"done" => "Klar",
"at_time" => "kl", //date and time separator (e.g. 30-01-2020 @ 10:45)
"from" => "From", //e.g. from 9:30
"until" => "Until", //e.g. until 15:30
"to" => "To", //e.g. to 17-02-2020
"open_calendar" => "Öppna kalender",
"no_way" => "Du har inte rättighet att göra detta",

//index.php
"title_log_in" => "Logga in",
"title_profile" => "User profile",
"title_upcoming" => "Kommande händelser",
"title_event" => "Händelse",
"title_check_event" => "Kontrollera händelse",
"title_search" => "Sök text",
"title_contact" => "Contact Form",
"title_thumbnails" => "Thumbnail Images",
"title_user_guide" => "LuxCal användarhandbok",
"title_settings" => "Kalenderinställningar",
"title_edit_cats" => "Redigera kategorier",
"title_edit_users" => "Redigera användare",
"title_edit_groups" => "Redigera användargrupper",
"title_manage_db" => "Hantera databas",
"title_changes" => "Sparade/Redigerade/Raderade händelser",
"title_usr_import" => "User File Import - CSV format",
"title_usr_export" => "User File Export - CSV format",
"title_evt_import" => "Event File Import - CSV format",
"title_ics_import" => "Event File Import - iCal format",
"title_ics_export" => "Event File Export - iCal format",
"title_ui_styling" => "User Interface Styling",

//header.php
"hdr_button_back" => "Tillbaka till ursprunglig sida",
"hdr_options_submit" => "Gör ditt val och klicka 'Klar'",
"hdr_options_panel" => "Alternativ-menyer",
"hdr_select_date" => "Välj datum",
"hdr_calendar" => "Kalender",
"hdr_view" => "Visa",
"hdr_lang" => "Språk",
"hdr_all_cats" => "Alla kategorier",
"hdr_all_groups" => "All Groups",
"hdr_all_users" => "Alla användare",
"hdr_go_to_view" => "Go to view",
"hdr_view_1" => "År",
"hdr_view_2" => "Månad",
"hdr_view_3" => "Arbetsmånad",
"hdr_view_4" => "Vecka",
"hdr_view_5" => "Arbetsvecka",
"hdr_view_6" => "Dag",
"hdr_view_7" => "Kommande",
"hdr_view_8" => "Ändringar",
"hdr_view_9" => "Matrix(C)",
"hdr_view_10" => "Matrix(U)",
"hdr_view_11" => "Gantt Chart",
"hdr_select_admin_functions" => "Välj administrativ funktion",
"hdr_admin" => "Administration",
"hdr_settings" => "Inställningar",
"hdr_categories" => "Kategorier",
"hdr_users" => "Användare",
"hdr_groups" => "Användargrupper",
"hdr_database" => "Databas",
"hdr_import_usr" => "User Import (CSV file)",
"hdr_export_usr" => "User Export (CSV file)",
"hdr_import_csv" => "Event Import (CSV file)",
"hdr_import_ics" => "Event Import (iCal file)",
"hdr_export_ics" => "Event Export (iCal file)",
"hdr_styling" => "Styling",
"hdr_back_to_cal" => "Tillbaka till kalender",
"hdr_button_print" => "Skriv ut",
"hdr_print_page" => "Skriv ut sida",
"hdr_button_pdf" => "PDF File",
"hdr_dload_pdf" => "Download upcoming events",
"hdr_button_contact" => "Contact",
"hdr_contact" => "Contact the administrator",
"hdr_button_tnails" => "Thumbnails",
"hdr_tnails" => "Show thumbnails",
"hdr_button_toap" => "Approve",
"hdr_toap_list" => "Events to be approved",
"hdr_button_todo" => "Att-göra",
"hdr_todo_list" => "Att-göra lista",
"hdr_button_upco" => "Kommande",
"hdr_upco_list" => "Kommande händelser",
"hdr_button_search" => "Sök",
"hdr_search" => "Sök text",
"hdr_button_add" => "Skapa",
"hdr_add_event" => "Skapa händelse",
"hdr_button_help" => "Hjälp",
"hdr_user_guide" => "Användarhandbok",
"hdr_gen_guide" => "General User Guide",
"hdr_cs_guide" => "Context-sensitive User Guide",
"hdr_gen_help" => "General help",
"hdr_prev_help" => "Previous help",
"hdr_open_menu" => "Open Menu",
"hdr_side_menu" => "Side Menu",
"hdr_today" => "idag", //dtpicker.js
"hdr_clear" => "rensa", //dtpicker.js

//event.php
"evt_no_title" => "Titel saknas",
"evt_no_start_date" => "Startdatum saknas",
"evt_bad_date" => "Felaktigt datum",
"evt_bad_rdate" => "Felaktigt slutdatum för repetition",
"evt_no_start_time" => "Starttid saknas",
"evt_bad_time" => "Felaktid tidsangivelse",
"evt_end_before_start_time" => "Sluttid före starttid",
"evt_end_before_start_date" => "Slutdatum före startdatum",
"evt_until_before_start_date" => "Repetition slut före startdatum",
"evt_default_duration" => "Default event duration of $1 hours and $2 minutes",
"evt_fixed_duration" => "Fixed event duration of $1 hours and $2 minutes",
"evt_approved" => "Händelse godkänd",
"evt_apd_locked" => "Händelse godkänd och låst",
"evt_title" => "Titel",
"evt_venue" => "Plats",
"evt_address_button" => "An address between ! marks will become a button",
"evt_category" => "Kategori",
"evt_subcategory" => "Subcategory",
"evt_description" => "Beskrivning",
"evt_attachments" => "Attachments",
"evt_attach_file" => "Attach file",
"evt_click_to_open" => "Click to open",
"evt_click_to_remove" => "Click to remove",
"evt_no_pdf_img_vid" => "Attachment should be pdf, image or video",
"evt_error_file_upload" => "Error uploading file",
"evt_upload_too_large" => "Uploaded file too large",
"evt_date_time" => "Datum / tid",
"evt_private" => "Privat händelse",
"evt_start_date" => "Start",
"evt_end_date" => "Slut",
"evt_select_date" => "Välj datum",
"evt_select_time" => "Välj tid",
"evt_all_day" => "Heldag",
"evt_change" => "Ändra",
"evt_set_repeat" => "Ställ repetition",
"evt_set" => "OK",
"evt_help" => "hjälp",
"evt_repeat_not_supported" => "Angiven repetition stöds inte",
"evt_no_repeat" => "Ingen repetition",
"evt_repeat_on" => "Repetera var",
"evt_until" => "tills",
"evt_blank_no_end" => "blankt: tills vidare",
"evt_each_month" => "varje månad",
"evt_interval2_1" => "första",
"evt_interval2_2" => "andra",
"evt_interval2_3" => "tredje",
"evt_interval2_4" => "fjärde",
"evt_interval2_5" => "sista",
"evt_period1_1" => "dag(ar)",
"evt_period1_2" => "vecka(or)",
"evt_period1_3" => "månad(er)",
"evt_period1_4" => "år",
"evt_send_eml" => "Meddela per epost",
"evt_send_sms" => "Send SMS",
"evt_now_and_or" => "nu och/eller",
"evt_event_added" => "Ny händelse",
"evt_event_edited" => "Ändrad händelse",
"evt_event_deleted" => "Raderad händelse",
"evt_event_approved" => "Approved event",
"evt_days_before_event" => "dag(ar) före händelsen",
"evt_to" => "Till",
"evt_not_help" => "List of recipient addresses separated by semicolons. A recipient address can be a user name, an email address, a mobile phone number or, between square brackets, the name of a file with addresses in the \'reciplists\' directory, with one address (a user name, an email address or a mobile phone number) per line. When omitted, the default file extension is .txt.<br>Maximum field length: 255 characters.",
"evt_eml_help" => "Unless terminated with a $-sign, mobile phone numbers will be used to find the corresponding email address in the database. If not found, no email will be sent to this recipient.",
"evt_sms_help" => "Unless terminated with a $-sign, email addresses will be used to find the corresponding mobile phone number in the database. If not found, no SMS will be sent to this recipient.",
"evt_recip_list_too_long" => "Fältet för adresser har för många tecken (max 255 tecken).",
"evt_no_recip_list" => "Det saknas för meddelande",
"evt_not_in_past" => "Meddelandedatum har passerat",
"evt_not_days_invalid" => "Meddelandedagar ogiltiga",
"evt_status" => "Status",
"evt_descr_help" => "Följande teckenkoder kan användas i beskrivningen ...<br>• HTML tags &lt;b&gt;, &lt;i&gt;, &lt;u&gt; och &lt;s&gt; för fet, kursiv, understruken och överstruken text.",
"evt_descr_help_img" => "• små bilder (miniatyrer) i följande format: \'bild_namn.ext\'. The thumbnail files, with file extension .gif, .jpg or .png, must be present in \'thumbnails\' folder. If enabled, the Thumbnails page can be used to upload thumbnail files.",
"evt_descr_help_eml" => "• Mailto-links i foljande format: \'email address\' eller \'email address [namn]\', där \'namn\' blir länkens titel. E.g. xxx@yyyy.zzz [For info click here].",
"evt_descr_help_url" => "• URL-länkar i följande format: \'url\' eller \'url [namn]\', där \'namn\' blir länkens titel. T.ex. https://www.google.com [sök].",
"evt_confirm_added" => "händelse skapad",
"evt_confirm_saved" => "händelse sparad",
"evt_confirm_deleted" => "händelse raderad",
"evt_add_close" => "Spara och stäng",
"evt_add" => "Spara",
"evt_edit" => "Redigera",
"evt_save_close" => "Spara och stäng",
"evt_save" => "Spara",
"evt_clone" => "Spara som ny",
"evt_delete" => "Radera",
"evt_close" => "Stäng",
"evt_added" => "Skapad",
"evt_edited" => "Redigerad",
"evt_is_repeating" => "är en repetativ händelse.",
"evt_is_multiday" => "är en flerdygns-händelse.",
"evt_edit_series_or_occurrence" => "Vill du ändra i hela händelseserien eller bara denna enstaka händelsen?",
"evt_edit_series" => "Ändra serien",
"evt_edit_occurrence" => "Ändra denna enstaka händelse",

//views
"vws_add_event" => "Skapa händelse",
"vws_edit_event" => "Edit Event",
"vws_see_event" => "See event details",
"vws_view_month" => "Visa månad",
"vws_view_week" => "Visa vecka",
"vws_view_day" => "Visa dag",
"vws_click_for_full" => "för stor kalender klicka månad",
"vws_view_full" => "Visa stora kalendern",
"vws_prev_month" => "Föregående månad",
"vws_next_month" => "Nästa månad",
"vws_today" => "Idag",
"vws_back_to_today" => "Tillbaka till aktuell månad",
"vws_back_to_main_cal" => "Back to the main calendar month",
"vws_week" => "Vecka",
"vws_wk" => "v.",
"vws_time" => "Tid",
"vws_events" => "Händelser",
"vws_all_day" => "Heldag",
"vws_earlier" => "Tidigare",
"vws_later" => "Senare",
"vws_venue" => "Plats",
"vws_address" => "Address",
"vws_events_for_next" => "Kommande händelser för följande",
"vws_days" => "dag(ar)",
"vws_added" => "Skapad",
"vws_edited" => "Redigerad",
"vws_notify" => "Meddela",
"vws_none_due_in" => "Inga förestående händelser inom följande",
"vws_evt_cats" => "Event categories",
"vws_cal_users" => "Calendar users",
"vws_no_users" => "No users in selected group(s)",
"vws_start" => "Start",
"vws_duration" => "Duration",
"vws_no_events_in_gc" => "No events in the selected period",
"vws_download" => "Ladda ned",
"vws_download_title" => "Ladda ned en textfil med dessa händelser",
"vws_send_mail" => "Send email",
"vws_send_mail_to" => "Send email to",

//changes.php
"chg_from_date" => "Från datum",
"chg_select_date" => "Välj startdatum",
"chg_notify" => "Meddela",
"chg_days" => "Dag(ar)",
"chg_added" => "Skapad",
"chg_edited" => "Redigerad",
"chg_deleted" => "Raderad",
"chg_changed_on" => "Ändrad den",
"chg_changes" => "Ändringar",
"chg_no_changes" => "Inga ändringar.",

//search.php
"sch_define_search" => "Definiera sökning",
"sch_search_text" => "Sök text",
"sch_event_fields" => "Händelsefält",
"sch_all_fields" => "Alla fält",
"sch_title" => "Titel",
"sch_description" => "Beskrivning",
"sch_venue" => "Plats",
"sch_user_group" => "User group",
"sch_event_cat" => "Händelsekategori",
"sch_all_groups" => "All Groups",
"sch_all_cats" => "Alla kategorier",
"sch_occurring_between" => "Inträffar mellan",
"sch_select_start_date" => "Välj startdatum",
"sch_select_end_date" => "Välj slutdatum",
"sch_search" => "Sök",
"sch_invalid_search_text" => "Söktext saknas eller är för kort",
"sch_bad_start_date" => "Felaktigt startdatum",
"sch_bad_end_date" => "Felaktigt slutdatum",
"sch_no_results" => "Inga resultat funna",
"sch_new_search" => "Ny sökning",
"sch_calendar" => "Gå till kalender",
"sch_extra_field1" => "Extra fält 1",
"sch_extra_field2" => "Extra fält 2",
"sch_sd_events" => "Single-day events",
"sch_md_events" => "Multi-day events",
"sch_rc_events" => "Recurring events",
"sch_instructions" =>
"<h3>Instruktioner för textsökning</h3>
<p>Kalenderns databas kan genomsökas efter händelser med specifik text.</p>
<br><p><b>Söktext</b>: De valda fälten (se nedan) i varje händelse kommer att 
genomsökas. Sökningen skiljer INTE på små/STORA bokstäver.</p>
<p>Två jokertecken kan användas i söksträngen:</p>
<ul>
<li>Understrykningstecken (_) i söktexten matchar ett enstaka 
tecken.<br>T.ex. : '_e_r' matchar 'beer', 'dear', 'heir'.</li>
<li>Et-tecken (&amp;) i söktexten matchar ett antal olika 
tecken.<br>E.g.: 'de&amp;r' matches 'December', 'dear', 'developer'.</li>
</ul>
<br><p><b>Händelsefält</b>: Endast de valda fälten genomsöks.</p>
<br><p><b>User group</b>: Events in the selected user group will be searched only.</p>
<br><p><b>Händelsekategori</b>: Endast fält med den valda kategorin genomsöks.</p>
<br><p><b>Inträffar mellan</b>: Start- och slutdatum anges frivilligt. Ett 
tomt startdatum innebär 1 år tillbaks i tiden och ett tomt slutdatum 
innebär 1 år framåt i tiden.</p>
<br><p>To avoid repetitions of the same event, the search results will be split 
in single-day events, multi-day events and recurring events.</p>
<p>Sökresultaten visas i kronologisk ordning.</p>",

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
"ssb_upco_events" => "Kommande händelser",
"ssb_all_day" => "Heldag",
"ssb_none" => "Inga händelser."
);
?>
