<?php
/*
= LuxCal admin interface language file =

Russian translation: iluhis.com. Update of Russian translation: 0x3.ru Please send comments to rb@luxsoft.eu.

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","4.7.8");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Нет.",
"no" => "нет",
"yes" => "да",
"own" => "own",
"all" => "bсе",
"or" => "или",
"back" => "Назад",
"ahead" => "Ahead",
"close" => "Закрыть",
"always" => "Всегда",
"at_time" => "@", //date and time separator (e.g. 30-01-2020 @ 10:45)
"times" => "times",
"cat_seq_nr" => "category sequence nr",
"rows" => "rows",
"columns" => "columns",
"hours" => "hours",
"minutes" => "минуты",
"user_group" => "цвету владельца",
"event_cat" => "цвету категории",
"id" => "ID",
"username" => "Имя пользователя",
"password" => "Пароль",
"public" => "Публичное",
"logged_in" => "Aвторизованным",
"logged_in_l" => "aвторизованным",

//settings.php - настройки заголовка поля + Основные
"set_general_settings" => "Основные настройки",
"set_navbar_settings" => "Навигация",
"set_event_settings" => "События",
"set_user_settings" => "Учетные записи",
"set_upload_settings" => "File Uploads",
"set_reminder_settings" => "Reminders",
"set_perfun_settings" => "Периодические функции (only relevant if cron job defined)",
"set_sidebar_settings" => "Отдальный сайдбар (only relevant if in use)",
"set_view_settings" => "Отображение",
"set_dt_settings" => "Дата/время",
"set_save_settings" => "Сохранить настройки",
"set_test_mail" => "Проверка почты",
"set_mail_sent_to" => "Куда отправить тестовое письмо",
"set_mail_sent_from" => "Это тестовое письмо из вашего календаря",
"set_mail_failed" => "Sending test mail failed - recipient(s)",
"set_missing_invalid" => "Недостаточны или некорректные настройки (background highlighted)",
"set_settings_saved" => "Настройки календаря сохранены",
"set_save_error" => "Ошибка БД - Не удалось сохранить настройки",
"hover_for_details" => "Наведите на описания для более подробной информации",
"default" => "по умолчанию",
"enabled" => "вкл.",
"disabled" => "выкл.",
"pixels" => "пикселей",
"warnings" => "Warnings",
"notices" => "Notices",
"visitors" => "Visitors",
"no_way" => "Вы не авторизованы для совершения этих действий",

//settings.php - основные настройки. Перед каждыми одинарными кавычками в переводе элементов ......_text должна идти обратная косая (т.е. (e.g. \')
"versions_label" => "Versions",
"versions_text" => "• calendar version, followed by the database in use<br>• PHP version<br>• database version",
"calTitle_label" => "Заголовок календаря",
"calTitle_text" => "Отображается в верхней строке календаря и используется в email отчетах.",
"calUrl_label" => "URL календаря.",
"calUrl_text" => "WEB-адрес календаря. Используется при ссылке из миникалендаря и в ссылке на календарь из email отчетов",
"calEmail_label" => "Email адрес календаря",
"calEmail_text" => "The email address used to receive contact messages and to send or receive notification emails.<br>Формат: \'email\' или \'имя &#8826;email&#8827;\'.",
"logoPath_label" => "Path/name of logo image",
"logoPath_text" => "If specified, a logo image will be displayed in the left upper corner of the calendar. If also a link to a parent page is specified (see below), then the logo will be a hyper-link to the parent page. The logo image should have a maximum height and width of 70 pixels.",
"backLinkUrl_label" => "Ссылка на главную",
"backLinkUrl_text" => "URL главной страницы сайта, на которую будет ссылаться кнопка «Назад» в левой части навигационной панели календаря. If a logo path/name has been specified (see above), then no Back button will be displayed, but the logo will become the back link instead.",
"timeZone_label" => "Часовой пояс",
"timeZone_text" => "Часовой пояс календаря. Используется для подсчета текущего времени.",
"see" => "посмотреть",
"notifChange_label" => "Send notification of calendar changes",
"notifChange_text" => "When a user adds, edits or deletes an event, a notification message will be sent to the specified recipients.",
"chgRecipList" => "Recipient list",
"maxXsWidth_label" => "Max. width of small screens",
"maxXsWidth_text" => "For displays with a width smaller than the specified number of pixels, the calendar will run in a special responsive mode, leaving out certain less important elements.",
"rssFeed_label" => "ССылки RSS-фида",
"rssFeed_text" => "Если включено: для ползователей с правами хотя бы \'view\' ссылка на RSS-фид будет видна в футере календаря и будет добавлена в заголовок HTML страниц календаря.",
"logging_label" => "Log calendar data",
"logging_text" => "The calendar can log error, warning and notice messages and visitors data. Error messages are always logged. Logging of warning and notice messages and visitors data can each be disabled or enabled by checking the relevant check boxes. All error, warning and notice messages are logged in the file \'logs/luxcal.log\' and visitors data are logged in the files \'logs/hitlog.log\' and \'logs/botlog.log\'.<br>Note: PHP error, warning and notice messages are logged at a different location, determined by your ISP.",
"maintMode_label" => "Maintenance mode",
"maintMode_text" => "When enabled, the calendar will run in maintenance mode, which means that useful maintenance information will be shown in the calendar footer bar.",
"reciplist" => "The recipient list can contain user names, email addresses, phone numbers and names of files with recipients (enclosed by square brackets), separated by semicolons. Files with recipients with one recipient per line should be located in the folder \'reciplists\'. When omitted, the default file extension is .txt",
"calendar" => "Календарь",
"user" => "Пользователь",
"database" => "database",

//settings.php - navigation bar settings. Перед каждыми одинарными кавычками в переводе элементов ......_text должна идти обратная косая (т.е. \')
"contact_label" => "Contact button",
"contact_text" => "If enabled: A Contact button will be displayed in the side menu. Clicking this button will open a contact form, which can be used to send a message to the calendar administrator.",
"optionsPanel_label" => "Панель опций",
"optionsPanel_text" => "Вкл/выкл меню в панели опций.<br>• Меню календаря доступно админу для переключения между календарями. (актуально при установке нескольких календарей)<br>• The view menu can be used to select one of the calendar views.<br>• The groups menu can be used to display only events created by users in the selected groups.<br>• Меню пользователя отображается только создателю.<br>• Меню категорий используется для отображения событий конкретной категории.<br>• Языковое меню служит для переключения между языками интерфейса. (актуально при использовании нескольких языков).<br>Note: If no menus are selected, the option panel button will not be displayed.",
"calMenu_label" => "Календарь",
"viewMenu_label" => "view",
"groupMenu_label" => "groups",
"userMenu_label" => "Пользователи",
"catMenu_label" => "Категории",
"langMenu_label" => "языки",
"availViews_label" => "Available calendar views",
"availViews_text" => "Calendar views available to publc and logged-in users specified by means of a comma-separated list with view numbers. Meaning of the numbers:<br>1: year view<br>2: month view (7 days)<br>3: work month view<br>4: week view (7 days)<br>5: work week view<br>6: day view<br>7: upcoming events view<br>8: changes view<br>9: matrix view (categories)<br>10: matrix view (users)<br>11: gantt chart view",
"viewButtons_label" => "View buttons on navigation bar",
"viewButtons_text" => "View buttons on the navigation bar for public and logged-in users, specified by means of a comma-separated list of view numbers.<br>If a number is specified in the sequence, the corresponding button will be displayed. If no numbers are specified, no View buttons will be displayed.<br>Meaning of the numbers:<br>1: Year<br>2: Full Month<br>3: Work Month<br>4: Full Week<br>5: Work Week<br>6: Day<br>7: Upcoming<br>8: Changes<br>9: Matrix-C<br>10: Matrix-U<br>11: Gantt Chart<br>The order of the numbers determine the order of the displayed buttons.<br>For example: \'24\' means: display \'Full Month\' and \'Full Week\' buttons.",
"defaultViewL_label" => "Вид при открытии по умолчанию (large display)",
"defaultViewL_text" => "Default calendar view on startup for public and logged-in users using large displays.<br>Рекомендуется: Месяц.",
"defaultViewS_label" => "Вид при открытии по умолчанию (small display)",
"defaultViewS_text" => "Default calendar view on startup for public and logged-in users using small displays.<br>Рекомендуется: Месяц.",
"language_label" => "Язык по умолчанию",
"language_text" => "В папке lang/ должны присутствовать файлы ui-{язык}.php, ai-{язык}.php, ug-{язык}.php и ug-layout.png. {язык} = выбранный пользователем язык. Название файла должно быть в нижнем регистре!",

//settings.php - events settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"privEvents_label" => "Создание приватных событий",
"privEvents_text" => "Приватные события видны только из создателям.<br>Если включено: пользователи могут создавать приватные события.<br>По умолчанию: при создании нового события чекбокс \'private\' будет включён.<br>Всегда: все создаваемые события будут приватными, чекбокс \'private\' будет скрыт.",
"aldDefault_label" => "New events all-day by default",
"aldDefault_text" => "When adding events, in the Event window the \'All day\' checkbox will be checked by default. In addition, if no start time is specified the event automatically becomes an all-day event.",
"details4All_label" => "Показывать подробную информацию о событии пользователям",
"details4All_text" => "Отключено: детали события будут видны только создателю и пользователям с правами \'post all\'.<br>Все: детали события будут видны создателю и всем остальным.<br>Авторизованным: детали событий будут видны создателю и авторизованным пользователям.",
"evtDelButton_label" => "Показать кнопку «Удалить» в окне события.",
"evtDelButton_text" => "Отключено: кнопка удаления не будет видна пользователям. Пользователи с правами на редактирование не смогут удалять события.<br>Включено: кнопка будет включена для всех.<br>Manager: кнопка удаления видна только пользователям с правами \'manager\'.",
"eventColor_label" => "Окрашивать события по",
"eventColor_text" => "В различных режимах просмотра календаря, события могут отображаться различными цветами - или по цвету создавшего событие пользователя, или по цвету категории, к которой событие принадлежит.",
"defVenue_label" => "Default Venue",
"defVenue_text" => "In this text field a venue can be specified which will be copied to the Venue field of the event form when adding new events.",
"xField1_label" => "Дополнительное поле 1",
"xField2_label" => "Дополнительное поле 2",
"xFieldx_text" => "Опциональные текстовые поля. Если включены, поля будут добавлены к форме ввода и событиям как свободные текстовые поля.<br>• ярлык: опциональный ярлык (до 15 знаков). Например: \'Email\', \'Вебсайт\', \'Телефон\'<br>• Minimum user rights: the field will only be visible to users with the selected user rights or higher.",
"xField_label" => "Ярлык",
"min_rights" => "Minimum user rights",
"no_color" => 'no color',
"manager_only" => 'только админам',

//settings.php - user account settings. Перед каждыми одинарными кавычками в переводе элементов ......_text должна идти обратная косая (т.е. \')
"selfReg_label" => "Самостоятельная регистрация",
"selfReg_text" => "Разрешить пользователям самостоятельно регистрироваться и получать доступ к календарю самостоятельно.<br>Пользовательская группа, к которой добавляется новый пользователь.",
"selfRegQA_label" => "Self registration question/answer",
"selfRegQA_text" => "When self registration is enabled, during the self-registration process the user will be asked this question and will only be able to self-register if the correct answer is given. When the question field is left blank, no question will be asked.",
"selfRegNot_label" => "Уведомление про новые регистрации",
"selfRegNot_text" => "Отправлять уведомление админу по email при новой самостоятельной регистрации.",
"restLastSel_label" => "Запоминать последний выбор пользователя",
"restLastSel_text" => "Последний выбор (на панели опций) будут сохранены и восстановлены при следующем входе.",
"cookieExp_label" => "Срок для «Запомнить меня»",
"cookieExp_text" => "Количество дней хранения cookie для Опции \'Remember me\'.",
"answer" => "answer",
"view" => "просмотр",
"post_own" => 'размещать свои',
"post_all" => 'размещать все',
"manager" => 'менеджер',

//settings.php - view settings. Перед каждыми одинарными кавычками в переводе элементов ......_text должна идти обратная косая (т.е. \')
"templFields_text" => "Meaning of the numbers:<br>1: Venue field<br>2: Event category field<br>3: Description field<br>4: Extra field 1 (see section Events)<br>5: Extra field 2 (see section Events)<br>6: Email notification data (only if a notification has been requested)<br>7: Date/time added/edited and the associated user(s)<br>8: Attached pdf, image or video files as hyperlinks.<br>The order of the numbers determine the order of the displayed fields.",
"evtTemplate_label" => "Event templates",
"evtTemplate_text" => "The event fields to be displayed in the general calendar views, the upcoming event views and in the hover box with event details can be specified by means of a sequence of numbers.<br>If a number is specified in the sequence, the corresponding field will be displayed.",
"evtTemplGen" => "General view",
"evtTemplUpc" => "Upcoming view",
"evtTemplPop" => "Hover box",
"sortEvents_label" => "Sort events on times or category",
"sortEvents_text" => "In the various views events can be sorted on the following criteria:<br>• event times<br>• event category sequence number",
"yearStart_label" => "Начальный месяц при просмотре года",
"yearStart_text" => "Если указан начальный месяц (1 - 12), то в режиме просмотра года, календарь будет всегда начинаться именно с этого месяца. Номер года будет указываться тот, где начинается указанный месяц, будто с него начинается год (полезно, например, в школах, где началом учебного года является сентябрь).<br>Значение 0 имеет особое значение: начальный месяц основывается на текущей дате и текущая дата будет в первом ряду месяцев.",
"YvRowsColumns_label" => "Рядов и kолонок при просмотре года",
"YvRowsColumns_text" => "Количество рядов с 4-мя полными месяцами в режиме просмотра года.<br>Рекомендуется: 4, что дает вам 16 месяцев для просмотра.<br>Количество месяцев для отображения в каждом ряду при просмотре целого года.<br>Рекомендуется: 3 или 4.",
"MvWeeksToShow_label" => "Недель при просмотре месяца",
"MvWeeksToShow_text" => "Количество недель в режиме просмотра месяцев.<br>Рекомендуется: 10, что дает вам 2.5месяца для просмотра.<br>The values 0 and 1 have a special meaning:<br>0: display exactly 1 month - blank leading and trailing days.<br>1: display exactly 1 month - display events on leading and trailing days.",
"XvWeeksToShow_label" => "Weeks to show in Matrix view",
"XvWeeksToShow_text" => "Number of calendar weeks to display in Matrix view.",
"GvWeeksToShow_label" => "Weeks to show in Gantt chart view",
"GvWeeksToShow_text" => "Number of calendar weeks to display in Gantt Chart view.",
"workWeekDays_label" => "Рабочие дни в неделе",
"workWeekDays_text" => "Days colored as working days in the calendar views and for instance to be shown in the weeks in Work Month view and Work Week view.<br>Enter the number of each working day.<br>e.g. 12345: Monday - Friday<br>Not entered days are considered to be weekend days.",
"weekStart_label" => "Первый день недели",
"weekStart_text" => "Enter the day number of the first day of the week.",
"lookBackAhead_label" => "Просматривать вперед Х дней",
"lookBackAhead_text" => "Количество дней, при просмотре ближайших событий, Todo List и RSS каналов.",
"dwStartEndHour_label" => "Start and end hour in Day/Week view",
"dwStartEndHour_text" => "Hours at which a normal day of events starts and ends.<br>E.g. setting these values to 6 and 18 will avoid wasting space in Week/Day view for the quiet time between midnight and 6:00 and 18:00 and midnight.<br>The time picker, used to enter a time, will also start and end at these hours.",
"dwTimeSlot_label" => "Временной промежуток при просмотре дня/недели",
"dwTimeSlot_text" => "Временной слот в минутах при просмотре в режиме дня/недели<br>Это значение, совместно с начальным часом (см. выше), определяет количество рядов при просмотре в режиме дня/недели.",
"dwTsHeight_label" => "Высота слота времени",
"dwTsHeight_text" => "Высота временного слота в пикселях при просмотре в режиме дня/недели.",
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
"showImgInMV_label" => "Показывать при просмотре месяца",
"showImgInMV_text" => "Enable/disable the display in Month view of thumbnail images added to one of the event description fields. When enabled, thumbnails will be shown in the day cells and when disabled, thumbnails will be shown in the on-mouse-over boxes instead.",
"urls" => "URL links",
"emails" => "email links",
"monthInDCell_label" => "Month in each day cell",
"monthInDCell_text" => "Display for each day in month view the 3-letter month name",
"evtWinSmall_label" => "Reduced event window",
"evtWinSmall_text" => "When adding/editing events, the Event window will show a subset of the input fields. To show all fields, a plus-sign can be selected.",
"mapViewer_label" => "Map viewer URL",
"mapViewer_text" => "If a map viewer URL has been specified, an address in the event\'s venue field enclosed in !-marks, will be shown as an Address button in the calendar views. When hovering this button the textual address will be shown and when clicked, a new window will open where the address will be shown on the map.<br>The full URL of a map viewer should be specified, to the end of which the address can be joined.<br>Examples:<br>Google Maps: https://maps.google.com/maps?q=<br>OpenStreetMap: https://www.openstreetmap.org/search?query=<br>If this field is left blank, addresses in the Venue field will not be show as an Address button.",

//settings.php - date/time settings. Перед каждыми одинарными кавычками в переводе элементов ......_text должна идти обратная косая (т.е. \')
"dateFormat_label" => "Формат даты события (дд мм гггг)",
"dateFormat_text" => "Text string defining the format of event dates in the calendar views and input fields.<br>Possible characters: y = year, m = month and d = day.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>y-m-d: 2013-10-31<br>m.d.y: 10.31.2013<br>d/m/y: 31/10/2013",
"dateFormat_expl" => "e.g. y.m.d: 2013.10.31",
"MdFormat_label" => "Date format (dd month)",
"MdFormat_text" => "Text string defining the format of dates consisting of month and day.<br>Possible characters: M = month in text, d = day in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>d M: 12 April<br>M, d: July, 14",
"MdFormat_expl" => "e.g. M, d: July, 14",
"MdyFormat_label" => "Date format (dd month yyyy)",
"MdyFormat_text" => "Text string defining the format of dates consisting of day, month and year.<br>Possible characters: d = day in digits, M = month in text, y = year in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>d M y: 12 April 2013<br>M d, y: July 8, 2013",
"MdyFormat_expl" => "e.g. M d, y: July 8, 2013",
"MyFormat_label" => "Date format (month yyyy)",
"MyFormat_text" => "Text string defining the format of dates consisting of month and year.<br>Possible characters: M = month in text, y = year in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>M y: April 2013<br>y - M: 2013 - July",
"MyFormat_expl" => "e.g. M y: April 2013",
"DMdFormat_label" => "Date format (weekday dd month)",
"DMdFormat_text" => "Text string defining the format of dates consisting of weekday, day and month.<br>Possible characters: WD = weekday in text, M = month in text, d = day in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>WD d M: Friday 12 April<br>WD, M d: Monday, July 14",
"DMdFormat_expl" => "e.g. WD - M d: Sunday - April 6",
"DMdyFormat_label" => "Date format (weekday dd month yyyy)",
"DMdyFormat_text" => "Text string defining the format of dates consisting of weekday, day, month and year.<br>Possible characters: WD = weekday in text, M = month in text, d = day in digits, y = year in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>WD d M y: Friday 13 April 2013<br>WD - M d, y: Monday - July 16, 2013",
"DMdyFormat_expl" => "e.g. WD, M d, y: Monday, July 16, 2013",
"timeFormat_label" => "Time format (hh mm)",
"timeFormat_text" => "Text string defining the format of event times in the calendar views and input fields.<br>Possible characters: h = hours, H = hours with leading zeros, m = minutes, a = am/pm (optional), A = AM/PM (optional).<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>h:m: 18:35<br>h.m a: 6.35 pm<br>H:mA: 06:35PM",
"timeFormat_expl" => "e.g. h:m: 22:35 and h:mA: 10:35PM",
"weekNumber_label" => "Показывать номера недель",
"weekNumber_text" => "Отображение номеров недель в режиме просмотра года, месяца и недели может быть включено или выключено.",
"time_format_us" => "12 часов AM/PM",
"time_format_eu" => "24 часа",
"sunday" => "Воскресенье",
"monday" => "Понедельник",
"time_zones" => "Зоны времени",
"dd_mm_yyyy" => "дд-мм-гггг",
"mm_dd_yyyy" => "мм-дд-гггг",
"yyyy_mm_dd" => "гггг-мм-дд",

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
"notSenderEml_label" => "Отправитель уведомлений",
"notSenderEml_text" => "Когда календаря отправляет напоминания, отправителем может быть адрес самого календаря или адрес создателя события.<br>Во втором случае получать может ответить на письмо.",
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
"php_mail" => "Почта через PHP",
"smtp_mail" => "SMTP-протокол (complete fields below)",

//settings.php - periodic function settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"cronHost_label" => "Cron job host",
"cronHost_text" => "Specify where the cron job is hosted which periodically starts the script \'lcalcron.php\'.<br>• local: cron job runs on the same server<br>• remote: cron job runs on a remote server or lcalcron.php is started manually (testing)<br>• IP address: cron job runs on a remote server with the specified IP address.",
"cronSummary_label" => "Отправлять администратору результат работы cron",
"cronSummary_text" => "Отправлять отчет работы cron администратору календаря.<br>Включение функции полезно при следующем:<br>• cron активирован.",
"chgSummary_label" => "Daily calendar changes summary",
"chgSummary_text" => "Количество дней назад, для проверки изменений в календаре.<br>Если количество дней равно 0, то отчеты отправляться не будут.",
"icsExport_label" => "Daily export of iCal events",
"icsExport_text" => "If enabled: All events in the date range -1 week until +1 year will be exported in iCalendar format in a .ics file in the \'files\' folder.<br>The file name will be the calendar name with blanks replaced by underscores. Old files will be overwritten by new files.",
"eventExp_label" => "Event expiry days",
"eventExp_text" => "Number of days after the event due date when the event expires and will be automatically deleted.<br>If 0 or if no cron job is running, no events will be automatically deleted.",
"maxNoLogin_label" => "Максимальное кол-во дней без входа",
"maxNoLogin_text" => "Если пользователь не произвел вход в свою учетную запись в течение определенного количества дней, то его/её учетная запись будет автоматчески удалена.<br>Если указано значение 0, то учетные записи удаляться не будут.",
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
"log_log_in" => "Войти",
"log_remember_me" => "Запомнить меня",
"log_register" => "Зарегистрироваться",
"log_change_my_data" => "Изменить мои данные",
"log_save" => "Изменить",
"log_un_or_em" => "Имя пользователя или Email",
"log_un" => "Имя пользователя",
"log_em" => "Email",
"log_ph" => "Mobile phone number",
"log_answer" => "Your answer",
"log_pw" => "Пароль",
"log_new_un" => "Новое имя пользователя",
"log_new_em" => "Новый Email",
"log_new_pw" => "Новый пароль",
"log_con_pw" => "Confirm Password",
"log_pw_msg" => "Here are your log in details for calendar",
"log_pw_subject" => "Ваш пароль",
"log_npw_subject" => "Ваш новый пароль",
"log_npw_sent" => "Ваш новый пароль отправлен",
"log_registered" => "Регистрация успешна - ваш пароль отправлен по email",
"log_em_problem_not_sent" => "Email problem - your password could not be sent",
"log_em_problem_not_noti" => "Email problem - could not notify the administrator",
"log_un_exists" => "Такой пользователь уже существует",
"log_em_exists" => "Такой Email адрес уже существует",
"log_un_invalid" => "Неверное имя (мин. длина 2: A-Z, a-z, 0-9, and _-.) ",
"log_em_invalid" => "Неверный адрес почты",
"log_ph_invalid" => "Invalid mobile phone number",
"log_sra_wrong" => "Incorrect answer to the question",
"log_sra_wrong_4x" => "You have answered incorrectly 4 times - try again in 30 minutes",
"log_un_em_invalid" => "Неверное имя/email",
"log_un_em_pw_invalid" => "Неверные имя/email или пароль",
"log_pw_error" => "Passwords not matching",
"log_no_un_em" => "Пожалуйста, введите ваши имя пользователя/email",
"log_no_un" => "Пожалуйста, введите имя пользователя",
"log_no_em" => "Пожалуйста, введите ваш email",
"log_no_pw" => "Пожалуйста, введите your пароль",
"log_no_rights" => "Отказано: у вас нет прав просмотра, свяжитесь с администратором",
"log_send_new_pw" => "Отправить новый пароль",
"log_new_un_exists" => "Новое имя пользователя уже существует",
"log_new_em_exists" => "Новый адрес email уже существует",
"log_ui_language" => "Язык интерфейса",
"log_new_reg" => "Регистрация",
"log_date_time" => "Дата / время",
"log_time_out" => "Таймаут",

//categories.php
"cat_list" => "Список категорий",
"cat_edit" => "Редактировать",
"cat_delete" => "Удалить",
"cat_add_new" => "Добавить новую категорию",
"cat_add" => "Добавить категорию",
"cat_edit_cat" => "Редактировать категорию",
"cat_sort" => "Сортировать по имени",
"cat_cat_name" => "Имя категории",
"cat_symbol" => "Symbol",
"cat_symbol_repms" => "Category symbol (replaces minisquare)",
"cat_symbol_eg" => "e.g. A, X, ♥, ⛛",
"cat_matrix_url_link" => "URL link (shown in matrix view)",
"cat_seq_in_menu" => "Последовательность в меню",
"cat_cat_color" => "Цвет категории",
"cat_text" => "Tекста",
"cat_background" => "Фон",
"cat_select_color" => "Выбрать цвет",
"cat_subcats" => "Sub-<br>categories",
"cat_subcats_opt" => "Subcategories (optional)",
"cat_url" => "URL",
"cat_name" => "Name",
"cat_save" => "Обновить категорию",
"cat_added" => "Категория добавлена",
"cat_updated" => "Категория обновлена",
"cat_deleted" => "Категория удалена",
"cat_not_added" => "Категория не добавлена",
"cat_not_updated" => "Категория не обновлена",
"cat_not_deleted" => "Категория не удалена",
"cat_nr" => "#",
"cat_repeat" => "Повтор",
"cat_every_day" => "каждый день",
"cat_every_week" => "каждую неделю",
"cat_every_month" => "каждый месяц",
"cat_every_year" => "каждый год",
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
"cat_day_color1" => "Цвет дня (year/matrix view)",
"cat_day_color2" => "Цвет дня (month/week/day view)",
"cat_approve" => "События требуют подтверждения",
"cat_check_mark" => "Check mark",
"cat_label" => "label",
"cat_mark" => "mark",
"cat_name_missing" => "Такой категории нет",
"cat_mark_label_missing" => "Check mark/label is missing",

//users.php
"usr_list_of_users" => "Список пользователей",
"usr_name" => "Имя",
"usr_email" => "Email",
"usr_phone" => "Mobile phone number",
"usr_phone_br" => "Mobile phone<br>number",
"usr_number" => "User number",
"usr_number_br" => "User<br>number",
"usr_language" => "Language",
"usr_ui_language" => "User interface language",
"usr_group" => "Группа",
"usr_password" => "Пароль",
"usr_edit_user" => "Редактировать профиль пользователя",
"usr_add" => "Добавить пользователя",
"usr_edit" => "Редактировать",
"usr_delete" => "Удалить",
"usr_login_0" => "Первый вход",
"usr_login_1" => "Последний вход",
"usr_login_cnt" => "Входов",
"usr_add_profile" => "Добавить профиль",
"usr_upd_profile" => "Обновить профиль",
"usr_if_changing_pw" => "Только при изменении пароля",
"usr_pw_not_updated" => "Пароль не обновлен",
"usr_added" => "Пользователь добавлен",
"usr_updated" => "Профиль пользователя обновлен",
"usr_deleted" => "Пользователь удален",
"usr_not_deleted" => "Пользователь не удален",
"usr_cred_required" => "Необходимы имя пользователя, email и пароль",
"usr_name_exists" => "Имя пользователя уже существует",
"usr_email_exists" => "Адрес email уже существует",
"usr_un_invalid" => "Неправильное имя пользователя (min length 2: A-Z, a-z, 0-9, and _-.) ",
"usr_em_invalid" => "Неправильный адрес email",
"usr_ph_invalid" => "Invalid mobile phone number",
"usr_cant_delete_yourself" => "Вы не можете удалить сами себя",
"usr_go_to_groups" => "Перейти в Группы",

//groups.php
"grp_list_of_groups" => "Cписок групп",
"grp_name" => "имя группы",
"grp_priv" => "Права",
"grp_categories" => "Категории",
"grp_all_cats" => "все категории",
"grp_rep_events" => "Repeating<br>events",
"grp_m-d_events" => "Multi-day<br>events",
"grp_priv_events" => "Private<br>events",
"grp_upload_files" => "Upload<br>files",
"grp_send_sms" => "Send<br>SMSes",
"grp_tnail_privs" => "Thumbnail<br>privileges",
"grp_priv0" => "Нет прав доступа",
"grp_priv1" => "Просмотр календаря",
"grp_priv2" => "Размещение/редактирование своих событий",
"grp_priv3" => "Размещение/редактирование всех событий",
"grp_priv4" => "Размещение/редактирование + mенеджер",
"grp_priv9" => "Функции администратора",
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
"grp_edit_group" => "Редактировать Группу",
"grp_sub_to_rights" => "Subject to user rights",
"grp_view" => "View",
"grp_add" => "Add",
"grp_edit" => "Редактировать",
"grp_delete" => "Удалить",
"grp_add_group" => "Добавить Группа",
"grp_upd_group" => "Обновить Группа",
"grp_added" => "Группа добавлена",
"grp_updated" => "Группа обновлена",
"grp_deleted" => "Группа удалена",
"grp_not_deleted" => "Группа не удалена",
"grp_in_use" => "Группа используется",
"grp_cred_required" => "Имя группы, права и категория обязательны",
"grp_name_exists" => " Имя группы уже существует",
"grp_name_invalid" => "Неправильное имя группа (min length 2: A-Z, a-z, 0-9, and _-.) ",
"grp_background" => "Цвет фона",
"grp_select_color" => "Выбрать цвет",
"grp_invalid_color" => "Неправильный формат цвета (#XXXXXX where X = HEX-value)",
"grp_go_to_users" => "Перейти в Пользователи",

//database.php
"mdb_dbm_functions" => "Функции базы данных",
"mdb_noshow_tables" => "Не могу получить таблицу(-цы)",
"mdb_noshow_restore" => "Не найти файл бэкапа",
"mdb_file_not_sql" => "Тип файла бэкапа не '.sql'",
"mdb_compact" => "Сжать базу данных",
"mdb_compact_table" => "Сжать таблицы",
"mdb_compact_error" => "Ошибка",
"mdb_compact_done" => "Выполнено",
"mdb_purge_done" => "Удаленные события окончательно удалены",
"mdb_backup" => "Резервирование базы данных",
"mdb_backup_table" => "Резервирование таблицы",
"mdb_backup_file" => "Файл бэкапа",
"mdb_backup_done" => "Выполнено",
"mdb_records" => "Записи",
"mdb_restore" => "Восстановить базу данных",
"mdb_restore_table" => "Восстановить таблицу",
"mdb_inserted" => "записи добалвены",
"mdb_db_restored" => "База данных восстановлена.",
"mdb_no_bup_match" => "Файл бэкапа не соответствует версии календаря.<br>Database not restored.",
"mdb_events" => "События",
"mdb_delete" => "удалить",
"mdb_undelete" => "вернуть",
"mdb_between_dates" => "случилось между",
"mdb_deleted" => "Удалённые события",
"mdb_undeleted" => "Неудалённые события",
"mdb_file_saved" => "Резервный файл сохранен на сервере.",
"mdb_file_name" => "Имя файла",
"mdb_start" => "Старт",
"mdb_no_function_checked" => "Функция(-ции) не выделены",
"mdb_write_error" => "Ошибка записи резервного файла.<br>Проверьте разрешения у папки /'files/' ",

//import/export.php
"iex_file" => "Выделенный файл",
"iex_file_name" => "Имя конечного файла",
"iex_file_description" => "Описание файла iCal",
"iex_filters" => "Фильтры событий",
"iex_export_usr" => "Export User Profiles",
"iex_import_usr" => "Import User Profiles",
"iex_upload_ics" => "Загрузить файл iCal",
"iex_create_ics" => "Создать файл iCal",
"iex_tz_adjust" => "Timezone adjustments",
"iex_upload_csv" => "Загрузить файл CSV",
"iex_upload_file" => "Загрузить файл",
"iex_create_file" => "Создать файл",
"iex_download_file" => "Скачать файл",
"iex_fields_sep_by" => "Поля разделены символом",
"iex_birthday_cat_id" => "Birthday category ID",
"iex_default_grp_id" => "Default user group ID",
"iex_default_cat_id" => " ID категории по умолчанию",
"iex_default_pword" => "Default password",
"iex_if_no_pw" => "If no password specified",
"iex_replace_users" => "Replace existing users",
"iex_if_no_grp" => "if no user group found",
"iex_if_no_cat" => "если категории не найдены",
"iex_import_events_from_date" => "Импорт событий, начинающихся с:",
"iex_no_events_from_date" => "No events found as of the specified date",
"iex_see_insert" => "см. инструкцию справа",
"iex_no_file_name" => "Отсутствует имя файла",
"iex_no_begin_tag" => "неправильный файл iCal (нет начального тега)",
"iex_bad_date" => "Bad date",
"iex_date_format" => "Формат даты событий",
"iex_time_format" => "Формат времени событий",
"iex_number_of_errors" => "Ошибок в списке",
"iex_bgnd_highlighted" => "фон подсвечен",
"iex_verify_event_list" => "Проверьте список событий, исправьте ошибки и повторите",
"iex_add_events" => "Добавить события в базу данных",
"iex_verify_user_list" => "Verify User List, correct possible errors and click",
"iex_add_users" => "Add Users to Database",
"iex_select_ignore_birthday" => "Select Ignore and Birthday check boxes as required",
"iex_select_ignore" => "Выберите Ignore check box для пропуска события",
"iex_check_all_ignore" => "Check all ignore boxes",
"iex_title" => "Заголовок",
"iex_venue" => "Место",
"iex_owner" => "Владелец",
"iex_category" => "Категория",
"iex_date" => "Дата",
"iex_end_date" => "Конечная дата",
"iex_start_time" => "Время начала",
"iex_end_time" => "Время окончания",
"iex_description" => "Описание",
"iex_repeat" => "Повторить",
"iex_birthday" => "День Рождения",
"iex_ignore" => "Удалить",
"iex_events_added" => "событий добавлено",
"iex_events_dropped" => "событий пропущено (уже существуют)",
"iex_users_added" => "users added",
"iex_users_deleted" => "users deleted",
"iex_csv_file_error_on_line" => "Ошибка файла CSV в строке",
"iex_between_dates" => "Происходит в промежутке",
"iex_changed_between" => "Добавлен/изменен в промежутке",
"iex_select_date" => "Выбрать дату",
"iex_select_start_date" => "Выбрать дату начала",
"iex_select_end_date" => "Выбрать дату окончания",
"iex_group" => "User group",
"iex_name" => "User name",
"iex_email" => "Email address",
"iex_phone" => "Phone number",
"iex_lang" => "Language",
"iex_pword" => "Password",
"iex_all_groups" => "all groups",
"iex_all_cats" => "все категории",
"iex_all_users" => "все пользователи",
"iex_no_events_found" => "Ниодного события не добавлено",
"iex_file_created" => "Файл создан",
"iex_write error" => "Ошибка записи файла экспорта<br>Проверьте права папки 'files/' ",
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
"<h3>Инструкции по управлению БД</h3>
<p>На этой странице могут быть выбраны следующие функции:</p>
<h6>Сжать БД</h6>
<p>Когда пользователь удаляет событие, событие помечается как 'удаленное', но не будет убрано из БД.
Функция полностью удаляет события, удаленные более 30 дней назад и освобождает место на диске, 
занимаемое этими событиями.</p>
<h6>Резервирование БД</h6>
<p>Эта функция создаст резервный файл полной БД календаря (структура таблиц и их содержание )
 в формате '.sql' . Резервный файл будет сохранен в папке
<strong>files/</strong> с именем файла file name: 
<kbd>dump-cal-lcv-ггггммдд-ччммсс.sql</kbd> (где 'cal' = calendar ID, 'lcv' = 
calendar version и 'ггггммдд-ччммсс' = год, месяц, день, час, минуты и секунды).</p>
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
"<h3>Инструкции по импорту CSV</h3>
<p>Эта форма используется для импорта в LuxCal текстовых файлов <strong>Comma Separated Values (CSV)</strong> 
с данными.</p>
<p>Последовательность колонок в файле CSV должна быть следующей: заголовок, место, id категории (см. ниже), 
дата, конечная дата, время начала, время окончания и описание. Первый ряд файла 
CSV, используемый для заголовков коонок, игнорируется.</p>
<h6>Файлы примеров CSV</h6>
<p>Файлы примеров CSV (расширение файла .cvs) могут быть найдены в папке 'files/' 
 где находится LuxCal.</p>
<h6>Field separator</h6>
The field separator can be any character, for instance a comma, semi-colon, etc.
The field separator character must be unique and may not be part of the text, 
numbers or dates in the fields.
<h6>Формат даты и времени</h6>
<p>Выбранные форматы даты и времени событий должны соответствовать форматам в закачиваемом файле CSV.</p>
<h6>Таблицы категорий</h6>
<p>Календарь использует ID-номера для определения категорий. ID категорий в файле CSV 
должны соответствовать категорям в календаре или должны быть пустыми.</p>
<p>Если при следующем шаге вы хотите обозначить события как 'день рождения', то <strong>Birthday 
category ID</strong> должно соответствовать ID категории из списка ниже.</p>
<p class='hired'>Warning: Do not import more than 100 events at a time!</p>
<p>В вашем календаре сейчас назначены следующие категории:</p>",

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
"<h3>Инструкции по импорту iCalendar</h3>
<p>Эта форма используется для импорта в LuxCal текстовых файлов <strong>iCalendar</strong> 
с данными. </p>
<p>Содержимое файла должно соответствовать [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>стандарту RFC5545</a></u>] Инженерного совета Интернет (Internet Engineering Task Force).</p>
<p>Будут испортированы только события; другие компоненты iCal, такие как: To-Do (задачи), Jounal (журнал), Free / 
Busy (свободен / занят), Timezone (временная зона) и Alarm (будильник), будут игнорированы.</p>
<h6>Файлы примеров iCal</h6>
<p>Файлы примеров iCalendar (расширение файла .ics) могут быть найдены в папке 'files/' 
 где находится LuxCal.</p>
<h6>Timezone adjustments</h6>
<p>If your iCalendar file contains events in a different timezone and the dates/times 
should be adjusted to the calendar timezone, then check 'Timezone adjustments'.</p>
<h6>Таблица категорий</h6>
<p>Календарь использует ID-номера для определения категорий. ID категорий в файле CSV 
должны соответствовать категорям в календаре или должны быть пустыми.</p>
<p class='hired'>Warning: Do not import more than 100 events at a time!</p>
<p>В вашем календаре сейчас назначены следующие категории:</p>",

"xpl_export_ical" =>
"<h3>Инструкции по экспорту iCalendar</h3>
<p>Эта форма используется для извлечения и экспортирования событий из LuxCal в формат <strong>iCalendar</strong>.</p>
<p><b>Имя файла iCal</b> (без расширения) не является обязательным. Созданный файл будет сохранен в в папке 'files/' 
на сервере с указанным именем, или с именем of the calendar. Расширение файла будет <b>.ics</b>.
Существующие файлы в папке \"files/\" на сервере будет перезаписаны новым файлом.</p>
<p><b>Описание файла iCal</b> (т.е. 'Встречи 2013') не является обязательным. Если это поле не пустое, 
то введенный текст будет добавлен в заголовок экспортируемого файла iCal.</p>
<p><b>Фильтры событий</b>. События могут быть отфильтованы по:</p>
<ul>
<li>владельцу события</li>
<li>категории события</li>
<li>начальной дате события</li>
<li>дате создания/изменения события</li>
</ul>
<p>Каждый из фильтров не является обязательным. Пустое поле означает: без ограничений</p>
<br>
<p>Содержимое файла с извлеченными событиями будет соответствовать [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>стандарту RFC5545</a></u>] Инженерного совета Интернет (Internet Engineering Task Force).</p>
<p>Когда экспортируемый файл iCal будет <b>скачиваться</b>, к имени скачиваемого файла будут добавлены дата и время.</p>
<h6>Файлы примеров iCal</h6>
<p>Файлы примеров iCalendar (расширение файла .ics) могут быть найдены в папке 'files/' 
 где находится LuxCal.</p>"
);
?>
