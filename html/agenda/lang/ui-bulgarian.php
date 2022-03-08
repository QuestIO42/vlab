<?php
/*
= LuxCal user interface language file =

This file has been produced by LuxSoft and has been translated by Radoslav Yovev.

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","4.7.8");
define("ISOCODE","bg");

/* -- Titles on the Header of the Calendar and Date Picker -- */

$months = array("Януари","Февруари","Март","Април","Май","Юни","Юли","Август","Септември","Октомври","Ноември","Декември");
$months_m = array("Яну","Фев","Мар","Апр","Май","Юни","Юли","Авг","Сеп","Окт","Ное","Дек");
$wkDays = array("Неделя","Понеделник","Вторник","Сряда","Четвъртък","Петък","Събота","Неделя");
$wkDays_l = array("Нед","Пон","Вто","Сря","Чет","Пет","Съб","Нед");
$wkDays_m = array("Нд","Пн","Вт","Ср","Чт","Пт","Сб","Нд");
$wkDays_s = array("Н","П","В","С","Ч","П","С","Н");
$dhm = array("D","H","M"); //Days, Hours, Minutes


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Потвърди",
"log_in" => "Влез",
"log_out" => "ИЗХОД",
"none" => "None.",
"all_day" => "All day",
"back" => "Върни",
"restart" => "Restart",
"by" => "by",
"of" => "of",
"max" => "max.",
"options" => "Опции",
"done" => "Готово",
"at_time" => "@", //date and time separator (e.g. 30-01-2020 @ 10:45)
"from" => "From", //e.g. from 9:30
"until" => "Until", //e.g. until 15:30
"to" => "To", //e.g. to 17-02-2020
"open_calendar" => "Достъпен календар",
"no_way" => "Нямате нужните права,за да извършите желаните от вас действия",

//index.php
"title_log_in" => "Влез",
"title_profile" => "User profile",
"title_upcoming" => "Предстоящи събития",
"title_event" => "Събитие",
"title_check_event" => "Провери събитие",
"title_search" => "Текст за търсене",
"title_contact" => "Contact Form",
"title_thumbnails" => "Thumbnail Images",
"title_user_guide" => "Ръководство за потребителя",
"title_settings" => "Редактиране на настройките",
"title_edit_cats" => "Промени категория",
"title_edit_users" => "Промени потребители",
"title_edit_groups" => "Edit User Groups",
"title_manage_db" => "Настройки на базата данни",
"title_changes" => "Събития ДОБАВИ / Промени / Изтрий",
"title_usr_import" => "User File Import - CSV format",
"title_usr_export" => "User File Export - CSV format",
"title_evt_import" => "Event File Import - CSV format",
"title_ics_import" => "Event File Import - iCal format",
"title_ics_export" => "Event File Export - iCal format",
"title_ui_styling" => "User Interface Styling",

//header.php
"hdr_button_back" => "Върни се към предишмата страница",
"hdr_options_submit" => "Направете своят избор и натиснете 'Готово'",
"hdr_options_panel" => "Панел с опции",
"hdr_select_date" => "Отиди на дата",
"hdr_calendar" => "Календар",
"hdr_view" => "Изглед",
"hdr_lang" => "Език",
"hdr_all_cats" => "Всички категории",
"hdr_all_groups" => "All Groups",
"hdr_all_users" => "Всички потребители",
"hdr_go_to_view" => "Go to view",
"hdr_view_1" => "Година",
"hdr_view_2" => "Месец",
"hdr_view_3" => "Работен месец",
"hdr_view_4" => "Седмица",
"hdr_view_5" => "Работна седмица",
"hdr_view_6" => "Ден",
"hdr_view_7" => "Бъдещи събития",
"hdr_view_8" => "Промени",
"hdr_view_9" => "Matrix(C)",
"hdr_view_10" => "Matrix(U)",
"hdr_view_11" => "Gantt Chart",
"hdr_select_admin_functions" => "Изберете Admin функции",
"hdr_admin" => "Мениджър",
"hdr_settings" => "Настройки",
"hdr_categories" => "Категория",
"hdr_users" => "Потребители",
"hdr_groups" => "User Groups",
"hdr_database" => "База данни",
"hdr_import_usr" => "User Import (CSV file)",
"hdr_export_usr" => "User Export (CSV file)",
"hdr_import_csv" => "Event Import (CSV file)",
"hdr_import_ics" => "Event Import (iCal file)",
"hdr_export_ics" => "Event Export (iCal file)",
"hdr_styling" => "Styling",
"hdr_back_to_cal" => "Обратно към изглед Календар",
"hdr_button_print" => "Печат",
"hdr_print_page" => "Печат на тази страница",
"hdr_button_pdf" => "PDF File",
"hdr_dload_pdf" => "Download upcoming events",
"hdr_button_contact" => "Contact",
"hdr_contact" => "Contact the administrator",
"hdr_button_tnails" => "Thumbnails",
"hdr_tnails" => "Show thumbnails",
"hdr_button_toap" => "Approve",
"hdr_toap_list" => "Events to be approved",
"hdr_button_todo" => "Todo",
"hdr_todo_list" => "Todo List",
"hdr_button_upco" => "Предстоящи",
"hdr_upco_list" => "Бъдещи назначенията",
"hdr_button_search" => "Търси",
"hdr_search" => "Търсене на текст",
"hdr_button_add" => "ДОБАВИ",
"hdr_add_event" => "ДОБАВИ събитие",
"hdr_button_help" => "Помощ",
"hdr_user_guide" => "Ръководство за потребителя",
"hdr_gen_guide" => "General User Guide",
"hdr_cs_guide" => "Context-sensitive User Guide",
"hdr_gen_help" => "General help",
"hdr_prev_help" => "Previous help",
"hdr_open_menu" => "Open Menu",
"hdr_side_menu" => "Side Menu",
"hdr_today" => "Днес", //dtpicker.js
"hdr_clear" => "Близо", //dtpicker.js

//event.php
"evt_no_title" => "Без заглавие",
"evt_no_start_date" => "Без начална дата",
"evt_bad_date" => "Неправилен формат на датата",
"evt_bad_rdate" => "Неправилно повторение на крайната дата",
"evt_no_start_time" => "Без начално време",
"evt_bad_time" => "Неправилен формат на времето",
"evt_end_before_start_time" => "Крайното време е преди началното",
"evt_end_before_start_date" => "Крайната дата е преди началната",
"evt_until_before_start_date" => "Повторащ край преди началната дата",
"evt_default_duration" => "Default event duration of $1 hours and $2 minutes",
"evt_fixed_duration" => "Fixed event duration of $1 hours and $2 minutes",
"evt_approved" => "Одобрено събитие",
"evt_apd_locked" => "Одобрено и заключено събитие",
"evt_title" => "Заглавие",
"evt_venue" => "Място",
"evt_address_button" => "An address between ! marks will become a button",
"evt_category" => "Категория",
"evt_subcategory" => "Subcategory",
"evt_description" => "Описание",
"evt_attachments" => "Attachments",
"evt_attach_file" => "Attach file",
"evt_click_to_open" => "Click to open",
"evt_click_to_remove" => "Click to remove",
"evt_no_pdf_img_vid" => "Attachment should be pdf, image or video",
"evt_error_file_upload" => "Error uploading file",
"evt_upload_too_large" => "Uploaded file too large",
"evt_date_time" => "Дата / Час",
"evt_private" => "Това е лично събитие",
"evt_start_date" => "Начало",
"evt_end_date" => "Завършено",
"evt_select_date" => "Изберете дата",
"evt_select_time" => "Изберете час",
"evt_all_day" => "Цял ден",
"evt_change" => "Промяна",
"evt_set_repeat" => "Задайте отново",
"evt_set" => "OK",
"evt_help" => "Помощ",
"evt_repeat_not_supported" => "Указано повторение не се поддържа",
"evt_no_repeat" => "Без повторение",
"evt_repeat_on" => "Всеки",
"evt_until" => "До това време",
"evt_blank_no_end" => "If Blank: I do not Bite",
"evt_each_month" => "Всеки месец",
"evt_interval2_1" => "Първи",
"evt_interval2_2" => "Втори",
"evt_interval2_3" => "Трети",
"evt_interval2_4" => "Четвърти",
"evt_interval2_5" => "Пети",
"evt_period1_1" => "дни",
"evt_period1_2" => "Седмици",
"evt_period1_3" => "Месеца",
"evt_period1_4" => "Години",
"evt_send_eml" => "Изпрати електронна поща",
"evt_send_sms" => "Send SMS",
"evt_now_and_or" => "предприятието и / или инцидент",
"evt_event_added" => "Ново Събитие",
"evt_event_edited" => "Променете събитие",
"evt_event_deleted" => "Изтриване на събитие",
"evt_event_approved" => "Approved event",
"evt_days_before_event" => "Преди дни",
"evt_to" => "To",
"evt_not_help" => "List of recipient addresses separated by semicolons. A recipient address can be a user name, an email address, a mobile phone number or, between square brackets, the name of a file with addresses in the \'reciplists\' directory, with one address (a user name, an email address or a mobile phone number) per line. When omitted, the default file extension is .txt.<br>Maximum field length: 255 characters.",
"evt_eml_help" => "Unless terminated with a $-sign, mobile phone numbers will be used to find the corresponding email address in the database. If not found, no email will be sent to this recipient.",
"evt_sms_help" => "Unless terminated with a $-sign, email addresses will be used to find the corresponding mobile phone number in the database. If not found, no SMS will be sent to this recipient.",
"evt_recip_list_too_long" => "Прекалено много символи в електронната поща.",
"evt_no_recip_list" => "Има грешка в напомнянето за електронна поща.",
"evt_not_in_past" => "Датата за напомняне е в миналото",
"evt_not_days_invalid" => "Дните за напомняне са невалидни",
"evt_status" => "Статус",
"evt_descr_help" => "The following items can be used in the description fields ...<br>• HTML tags &lt;b&gt;, &lt;i&gt;, &lt;u&gt; and &lt;s&gt; for bold, italic, underlined and striked-through text.",
"evt_descr_help_img" => "• small images (thumbnails) in the following format: \'image_name.ext\'. The thumbnail files, with file extension .gif, .jpg or .png, must be present in \'thumbnails\' folder. If enabled, the Thumbnails page can be used to upload thumbnail files.",
"evt_descr_help_eml" => "• Mailto-links in the following format: \'email address\' or \'email address [name]\', where \'name\' will be the title of the link. E.g. xxx@yyyy.zzz [For info click here].",
"evt_descr_help_url" => "• URL links in the following format: \'url\' or \'url [name]\', where \'name\' will be the title of the link. E.g. https://www.google.com [search].",
"evt_confirm_added" => "Добавени Събития",
"evt_confirm_saved" => "Запазени Събития",
"evt_confirm_deleted" => "Изтрити събития",
"evt_add_close" => "ДОБАВИ и затвори",
"evt_add" => "ДОБАВИ",
"evt_edit" => "Редактирай",
"evt_save_close" => "Запиши и затвори",
"evt_save" => "Записване",
"evt_clone" => "Запазване и Отваряне на ново",
"evt_delete" => "Изчисти",
"evt_close" => "Затвори",
"evt_added" => "ДОБАВИ",
"evt_edited" => "Промени",
"evt_is_repeating" => "Събитието е повтарящо.",
"evt_is_multiday" => "Събитието продължава няколко дни.",
"evt_edit_series_or_occurrence" => "Искате ли да редактирате серията или това събитие?",
"evt_edit_series" => "Редактирайте серията",
"evt_edit_occurrence" => "Редактиране на това събитие",

//views
"vws_add_event" => "ДОБАВИ събитие",
"vws_edit_event" => "Edit Event",
"vws_see_event" => "See event details",
"vws_view_month" => "Месечен изглед",
"vws_view_week" => "Седмичен изглед",
"vws_view_day" => "Дневен изглед",
"vws_click_for_full" => "Пълен месечен изглед",
"vws_view_full" => "Пълен изглед",
"vws_prev_month" => "Предходния месец",
"vws_next_month" => "Следващия месец",
"vws_today" => "Днес",
"vws_back_to_today" => "Този месец се връща в",
"vws_back_to_main_cal" => "Back to the main calendar month",
"vws_week" => "Седмица",
"vws_wk" => "сед",
"vws_time" => "Час",
"vws_events" => "Събития",
"vws_all_day" => "Цял ден",
"vws_earlier" => "По-рано",
"vws_later" => "По-късно",
"vws_venue" => "Място",
"vws_address" => "Address",
"vws_events_for_next" => "Печат на дните до следваща ",
"vws_days" => "Ден(дни)",
"vws_added" => "ДОБАВИ",
"vws_edited" => "Редактирай",
"vws_notify" => "Уведоми",
"vws_none_due_in" => "Няма събития, предстоящи през следващите",
"vws_evt_cats" => "Event categories",
"vws_cal_users" => "Calendar users",
"vws_no_users" => "No users in selected group(s)",
"vws_start" => "Start",
"vws_duration" => "Duration",
"vws_no_events_in_gc" => "No events in the selected period",
"vws_download" => "Свали",
"vws_download_title" => "Свали текстов файл с тези събития",
"vws_send_mail" => "Send email",
"vws_send_mail_to" => "Send email to",

//changes.php
"chg_from_date" => "От дата",
"chg_select_date" => "Изберете начална дата",
"chg_notify" => "Напомняне",
"chg_days" => "Ден(дни)",
"chg_added" => "ДОБАВИ",
"chg_edited" => "Редактирай",
"chg_deleted" => "Изтрити",
"chg_changed_on" => "Заменен:",
"chg_changes" => "Промяна",
"chg_no_changes" => "Без промяна.",

//search.php
"sch_define_search" => "Дефинирайте търсене",
"sch_search_text" => "Търсене по текст",
"sch_event_fields" => "Търси по събитие",
"sch_all_fields" => "Всички полета",
"sch_title" => "Заглавие",
"sch_description" => "Описание",
"sch_venue" => "Местоположение",
"sch_user_group" => "User group",
"sch_event_cat" => "Категория на събитието",
"sch_all_groups" => "All Groups",
"sch_all_cats" => "Всички категории",
"sch_occurring_between" => "Настъпили между",
"sch_select_start_date" => "Изберете начална дата",
"sch_select_end_date" => "Изберете крайна дата",
"sch_search" => "Търси",
"sch_invalid_search_text" => "Търсеният текст липсва или е твърде кратък",
"sch_bad_start_date" => "Неправилна начална дата",
"sch_bad_end_date" => "Неправилна крайна дата",
"sch_no_results" => "Не са намерени резултати",
"sch_new_search" => "Ново търсене",
"sch_calendar" => "Отиди към календар",
"sch_extra_field1" => "Допълнително поле 1",
"sch_extra_field2" => "Допълнително поле 2",
"sch_sd_events" => "Single-day events",
"sch_md_events" => "Multi-day events",
"sch_rc_events" => "Recurring events",
"sch_instructions" =>
"<h3>Text Search Instructions</h3>
<p>The calendar database can be searched for events matching specific text.</p>
<br><p><b>Search text</b>: The selected fields (see below) of each event will 
be searched. For characters a - z the search is case insensitive.</p>
<p>Two wildcard characters can be used:</p>
<ul>
<li>Underscore characters (_) in the search text will match any single 
character.<br>E.g.: '_e_r' matches 'beer', 'dear', 'heir'.</li>
<li>Ampersand characters (&amp;) in the search text will match any number of 
characters.<br>E.g.: 'de&amp;r' matches 'December', 'dear', 'developer'.</li>
</ul>
<br><p><b>Event fields</b>: The selected fields will be searched only.</p>
<br><p><b>User group</b>: Events in the selected user group will be searched 
only.</p>
<br><p><b>Event category</b>: Events in the selected category will be searched 
only.</p>
<br><p><b>Occurring between</b>: The start and end date are both optional. A 
blank start date means: one year from now in the past and a blank end date 
means: one year from now in the future.</p>
<br><p>To avoid repetitions of the same event, the search results will be split 
in single-day events, multi-day events and recurring events.</p>
<p>The search results will be displayed in chronological order.</p>",

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
"ssb_upco_events" => "Предстоящи събития",
"ssb_all_day" => "Цял ден",
"ssb_none" => "Няма събития."
);
?>
