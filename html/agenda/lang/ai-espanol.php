<?php
/*
= LuxCal admin interface language file =

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.
Traducción corregida y actualizada por Pantricio - Murcia, España.
Traducción corregida y actualizada por Eutimio, Barcelana, España
This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","4.7.8");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Ninguno",
"no" => "no",
"yes" => "si",
"own" => "propio",
"all" => "todos",
"or" => "o",
"back" => "Volver",
"ahead" => "Ahead",
"close" => "Cerrar",
"always" => "siempre",
"at_time" => "@", //date and time separator (e.g. 30-01-2019 @ 10:45)
"times" => "times",
"cat_seq_nr" => "secuencia de categoría nº",
"rows" => "filas",
"columns" => "columnas",
"hours" => "horas",
"minutes" => "minutos",
"user_group" => "color del propietario",
"event_cat" => "color de la categoría",
"id" => "ID",
"username" => "Nombre de usuario",
"password" => "Contraseña",
"public" => "Público",
"logged_in" => "Conectado",
"logged_in_l" => "Conectado",

//settings.php - fieldset headers + general
"set_general_settings" => "Calendario",
"set_navbar_settings" => "Barra de navegación",
"set_event_settings" => "Eventos",
"set_user_settings" => "Usuarios",
"set_upload_settings" => "Archivos subidos",
"set_reminder_settings" => "Recordatorios",
"set_perfun_settings" => "Funciones periódicas (solo relevantes si el trabajo cron está definido)",
"set_sidebar_settings" => "Barra lateral independiente (solo relevante si está en uso)",
"set_view_settings" => "Apariencia",
"set_dt_settings" => "Hora y fecha",
"set_save_settings" => "Guardar configuración",
"set_test_mail" => "Correo de prueba",
"set_mail_sent_to" => "Correo de prueba enviado a",
"set_mail_sent_from" => "Este correo de prueba fue enviado desde la página de configuración de su calendario.",
"set_mail_failed" => "Error al enviar el correo de prueba - destinatario (s)",
"set_missing_invalid" => "parámetros ausentes o incorrectos (fondo resaltado)",
"set_settings_saved" => "Configuración de calendario guardada",
"set_save_error" => "Error de base de datos - Fallo al guardar la configuración",
"hover_for_details" => "Pase el cursor sobre las descripciones para ver los detalles",
"default" => "por defecto",
"enabled" => "habilitado",
"disabled" => "deshabilitado",
"pixels" => "pixeles",
"warnings" => "Advertencias",
"notices" => "Avisos",
"visitors" => "Visitantes",
"no_way" => "No está autorizado para realizar esta acción",

//settings.php - general settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"versions_label" => "Versiones",
"versions_text" => "• versión de calendario, seguida de la base de datos en uso<br>• versión de PHP<br>• versión de la base de datos",
"calTitle_label" => "Título del calendario",
"calTitle_text" => "Se muestra en la barra superior del calendario y en las notificaciones por correo electrónico.",
"calUrl_label" => "URL del calendario",
"calUrl_text" => "Dirección web del calendario.",
"calEmail_label" => "Dirección de correo electrónico del calendario",
"calEmail_text" => "Dirección de correo electrónico usada para enviar notificaciones.<br>Formato: \'email\' o \'nombre &#8826;email&#8827;\'.",
"logoPath_label" => "Ruta/nombre de la imagen del logo",
"logoPath_text" => "Si se especifica, se mostrará una imagen de logotipo en la esquina superior izquierda del calendario. Si también se especifica un enlace a una página principal (ver más abajo), entonces el logotipo será un hipervínculo a la página principal. La imagen del logotipo debe tener una altura y anchura máxima de 70 píxeles..",
"backLinkUrl_label" => "Enlace a la página principal",
"backLinkUrl_text" => "URL de la página principal. Si se especifica, se mostrará un botón en el lado izquierdo de la Barra de navegación que enlaza con esta URL. Por ejemplo, para volver a la página principal desde la que se inició el calendario. Si se ha especificado una ruta/nombre del logotipo (ver arriba), entonces no se mostrará el botón, sino que el logotipo se convertirá en el enlace de vuelta..",
"timeZone_label" => "Zona horaria",
"timeZone_text" => "Zona horaria del calendario utilizada para calcular la hora actual del calendario.",
"see" => "ver",
"notifChange_label" => "Enviar notificación de cambios en el calendario.",
"notifChange_text" => "Cuando un usuario agrega, edita o elimina un evento, se enviará un mensaje de notificación a los destinatarios especificados.",
"chgRecipList" => "Lista de destinatarios",
"maxXsWidth_label" => "Ancho máx. de pantallas pequeñas",
"maxXsWidth_text" => "Para pantallas con un ancho menor que el número de píxeles especificado, el calendario se ejecutará en un modo de respuesta especial, dejando de lado ciertos elementos menos importantes.",
"rssFeed_label" => "Enlaces RSS",
"rssFeed_text" => "Si está habilitado: para los usuarios con al menos \'derechos de ver\' , se verá un enlace RSS en el pie de página del calendario y se agregará un enlace RSS al encabezado HTML de las páginas del calendario.",
"logging_label" => "Registro datos del calendario",
"logging_text" => "El calendario puede registrar mensajes de error, advertencia y aviso y datos de visitantes. Los mensajes de error siempre se registran. El registro de los mensajes de advertencia y aviso y los datos de los visitantes se pueden desactivar o habilitar marcando las casillas de verificación correspondientes. Todos los mensajes de error, advertencia y aviso se registran en el archivo \'logs/luxcal.log\' y los datos de los visitantes se registran en los archivos \'logs/hitlog.log\' y \'logs/botlog.log\'. < br> Nota: los mensajes de error, advertencia y aviso de PHP se registran en una ubicación diferente, determinada por su ISP.",
"maintMode_label" => "Modo de mantenimiento",
"maintMode_text" => "Cuando está habilitado, el calendario se ejecutará en modo de mantenimiento, lo que significa que se mostrará información útil de mantenimiento en la barra de pie de página del calendario.",
"reciplist"=> "La lista de destinatarios puede contener nombres de usuarios, direcciones de correo electrónico, números de teléfono y nombres de archivos con destinatarios (encerrados entre corchetes), separados por punto y coma. Los archivos con destinatarios con un destinatario por línea deben ubicarse en la carpeta \'reciplists\'. Cuando se omite, la extensión de archivo predeterminada es .txt",
"calendar" => "calendario",
"user" => "usuario",
"database" => "base de datos",

//settings.php - navigation bar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"contact_label" => "Botón de contacto",
"contact_text" => "Si está habilitado: Aparecerá un botón de contacto en el menú lateral. Al hacer clic en este botón se abrirá un formulario de contacto, que se puede utilizar para enviar un mensaje al administrador del calendario. ",
"optionsPanel_label" => "Menús del panel de opciones",
"optionsPanel_text" => "Habilitar/deshabilitar los menús en el panel de opciones.<br>• El menú de calendario está disponible para que el administrador cambie los calendarios. (habilitado solo si se instalan varios calendarios)<br>• El menú de vista se puede usar para seleccionar una de las vistas del calendario.<br>• El menú de grupos se puede usar para mostrar solo los eventos creados por los usuarios en los grupos seleccionados.<br>• El menú de usuarios se puede usar para mostrar solo los eventos creados por los usuarios seleccionados.<br>• El menú de categorías se puede usar para mostrar solo los eventos que pertenecen a las categorías de eventos seleccionados.<br>• El menú de idiomas se utiliza para seleccionar el idioma de la interfaz de usuario. (habilitado solo si se instalan varios idiomas)<br>Nota: Si no se selecciona ningún menú, no se mostrará el botón del panel de opciones. ",
"calMenu_label" => "calendario",
"viewMenu_label" => "ver",
"groupMenu_label" => "grupos",
"userMenu_label" => "usuarios",
"catMenu_label" => "categorías",
"langMenu_label" => "Idioma",
"availViews_label" => "Vistas del calendario disponibles",
"availViews_text" => "Las vistas de calendario disponibles para usuarios públicos y registrados se especifican mediante una lista separada por comas con números de vista. Significado de los números:<br>1: vista de año<br>2: vista de mes (7 días)<br>3: vista de mes de trabajo<br>4: vista de semana (7 días)<br>5: vista de semana de trabajo<br>6: vista de día<br>7: vista de próximos eventos<br>8: vista de cambios<br>9: vista de matriz (categorías)<br>10: vista de matriz (usuarios) ",
"viewButtons_label" => "Ver botones en la barra de navegación",
"viewButtons_text" => "Botones de vista en la barra de navegación para usuarios públicos y registrados, especificados por medio de una lista de números de vista separados por comas.<br>Si se especifica un número en la secuencia, se mostrará el botón correspondiente. Si no se especifican números, no se mostrarán los botones Ver.<br>Significado de los números:<br>1: Año<br>2: Mes completo<br>3: Mes de trabajo<br>4: Semana completa<br>5: Semana de trabajo<br>6: Día<br>7: Próximos<br>8: Cambios<br>9: Matriz<br>El orden de los números determina el orden de los botones mostrados. Por ejemplo : \'24\'significa: mostrar botones \' Mes completo\'y\' Semana completa\'.",
"defaultViewL_label" => "Vista por defecto al comenzar (pantallas grandes)",
"defaultViewL_text" => "Vista de calendario predeterminada en el inicio para usuarios públicos y registrados que utilizan pantallas grandes.<br>Elección recomendada: Mes.",
"defaultViewS_label" => "Vista por defecto al comenzar (pantallas pequeñas)",
"defaultViewS_text" => "Vista de calendario predeterminada en el inicio para usuarios públicos y registrados que utilizan pantallas pequeñas.<br>Elección recomendada: Próximos.",
"language_label" => "Idioma por defecto de la interfaz",
"language_text" => "Los archvos ui-{idioma}.php, ai-{idioma}.php, ug-{idioma}.php y ug-layout.png deben estar presentes en el directorio lang/<br>{idioma} = idioma de interfaz elegido. ¡Los nombres de archivo deben ser en minúsculas!",

//settings.php - events settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"privEvents_label" => "Publicación de eventos privados.",
"privEvents_text" => "Los eventos privados solo son visibles para el usuario que ingresó al evento.<br>Habilitado: los usuarios pueden ingresar eventos privados.<br>Predeterminado: al agregar nuevos eventos, la casilla de verificación \'privado\' en la ventana del Evento se marcará de manera predeterminada .<br>Siempre: cuando se agregan eventos nuevos, siempre serán privados, la casilla de verificación \'privado\' en la ventana del evento no se mostrará. ",
"aldDefault_label" => "Nuevos eventos todo el día por defecto",
"aldDefault_text" => "Al agregar eventos, en la ventana Evento, la casilla de verificación \'Todo el día\' se marcará de manera predeterminada. Además, si no se especifica la hora de inicio, el evento se convertirá automáticamente en un evento de todo el día.",
"details4All_label" => "Mostrar detalles del evento a los usuarios.",
"details4All_text" => "Deshabilitado: los detalles del evento solo serán visibles para el propietario del evento y para los usuarios con derechos de \'publicar\'.<br>Todos: los detalles del evento serán visibles para el propietario del evento y para todos los demás usuarios.<br>Con sesión iniciada: los detalles del evento serán visibles para el propietario del evento y para los usuarios registrados.",
"evtDelButton_label" => "Mostrar botón de eliminar en la ventana del evento",
"evtDelButton_text" => "Deshabilitado: el botón Eliminar en la ventana Evento no será visible. Por lo tanto, los usuarios con derechos de edición no podrán eliminar eventos.<br>Activado: el botón Eliminar en la ventana Evento estará visible para todos los usuarios. Administrador: el botón Eliminar en la ventana Evento solo estará visible para los usuarios con derechos de \'administrador\'.",
"eventColor_label" => "Colores del evento basados en",
"eventColor_text" => "Los eventos pueden mostrarse en las diversas vistas con un color asignado al usuario que creó el evento, o el color asignado a la categoría del evento.",
"defVenue_label" => "Lugar predeterminado",
"defVenue_text" => "En este campo de texto, se puede especificar un lugar que se copiará en el campo Lugar del formulario del evento al agregar nuevos eventos.",
"xField1_label" => "Campo extra 1",
"xField2_label" => "Campo extra 2",
"xFieldx_text" => "Campo de texto opcional. Si este campo se incluye en una plantilla de evento en la sección Vistas, el campo se agregará como un campo de texto de formato libre en el formulario de la ventana Evento y en los eventos que se muestran en todas las vistas y páginas del calendario.<br>• Etiqueta: texto opcional de la Etiqueta para el campo adicional (máx. 15 carácteres). P.ej. \'Dirección de correo electrónico\', \'Sitio web\', \'Número de teléfono\'<br>• público: cuando está marcado, el campo será visible para todos los usuarios; de lo contrario, el campo solo será visible para los usuarios registrados.",
"xField_label" => "Etiqueta",
"min_rights" => "Derechos mínimos de usuario",
"no_color" => 'sin color',
"manager_only" => 'Gestor',

//settings.php - user accounts settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Auto registro",
"selfReg_text" => "Permitir a los usuarios registrarse por sí mismos para acceder al calendario.<br>Grupo de usuarios al que se asignarán usuarios auto-registrados.",
"selfRegQA_label" => "Auto registro pregunta / respuesta",
"selfRegQA_text" => "Cuando se habilita el registro automático, durante el proceso de registro automático se le hará esta pregunta al usuario y solo podrá registrarse si se da la respuesta correcta. Cuando el campo de preguntas se deja en blanco, no se hará ninguna pregunta.",
"selfRegNot_label" => "Notificación de autoregistro",
"selfRegNot_text" => "Enviar una notificación por correo electrónico a la dirección de correo del calendario cuando se autoregistre un usuario.",
"restLastSel_label" => "Restaurar las selecciones del último usuario",
"restLastSel_text" => "Las últimas selecciones del usuario (la configuración del Panel de opciones) se guardarán y cuando el usuario vuelva a visitar el calendario más tarde, los valores se restaurarán.",
"cookieExp_label" => "Días de expiración de la cookie 'Recuérdame'",
"cookieExp_text" => "La cantidad de días antes de que la cookie establecida por la opción \'Recordarme\' (durante el inicio de sesión) caduque.",
"answer" => "respuesta",
"view" => "ver",
"post_own" => "publicar propios",
"post_all" => "publicar todos",
"manager" => 'puesto/gestor',

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"templFields_text" => "Significado de los números:<br>1: Campo de evento<br>2: Campo de categoría de evento<br>3: Campo de descripción<br>4: Campo extra 1 (ver sección Eventos)<br>5: Campo extra 2 (ver Sección Eventos<br><br> 6: Datos de notificación por correo electrónico (solo si se ha solicitado una notificación)<br>7: Fecha/hora agregada/editada y usuario/s asociado/s<br>8: Archivos adjuntos en pdf, imagen o video como hipervínculos.<br>El orden de los números determina el orden de los campos mostrados.",
"evtTemplate_label" => "Plantillas de eventos",
"evtTemplate_text" => "Los campos de eventos que se mostrarán en las vistas del calendario general, las vistas de eventos venideros y en el cuadro de desplazamiento con detalles del evento se pueden especificar mediante una secuencia de números.<br>Si se especifica un número en la secuencia, el campo correspondiente será mostrado.",
"evtTemplGen" => "Vista general",
"evtTemplUpc" => "Vista próximo",
"evtTemplPop" => "Caja flotante",
"sortEvents_label" => "Ordenar eventos por hora o categoría",
"sortEvents_text" => "En las diversas vistas, los eventos se pueden ordenar según los siguientes criterios: <br> * horarios de eventos <br> * número de secuencia de categoria de eventos",
"yearStart_label" => "Mes inicial en la vista anual",
"yearStart_text" => "Si se especifica un mes inicial (1 - 12) la vista anual del calendario empezará siempre por este mes, y el año cambiará cuando llegue el primer día de este mes del año siguiente.<br>El valor 0 tiene un significado especial: el mes inicial se basará en la fecha actual, y caerá en en la primera fila de meses.",
"YvRowsColumns_label" => "Filas y columnas en la vista anual",
"YvRowsColumns_text" => "Número de filas que se desplegarán en la vista anual.<br>Elección recomendada: 4, que proporciona 16 meses a la vez.<br>Número de meses que se mostrarán en cada fila de la vista anual.<br>Elección recomendada: 3 ó 4.",
"MvWeeksToShow_label" => "Semanas en la vista mensual",
"MvWeeksToShow_text" => "Número total de semanas desplegadas en la vista mensual.<br>Opción recomendada: 10, que despliega 2,5 meses.<br>Los valores 0 y 1 tienen un significado especial:<br>0: muestra exactamente 1 mes: días iniciales y finales en blanco. 1: muestra exactamente 1 mes: muestra los eventos en los días iniciales y finales.",
"XvWeeksToShow_label" => "Semanas para mostrar en la vista Matriz",
"XvWeeksToShow_text" => "Número de semanas calendario para mostrar en la vista Matriz.",
"GvWeeksToShow_label" => "Semanas para mostrar en la vista de diagrama de Gantt",
"GvWeeksToShow_text" => "Número de semanas calendario para mostrar en la vista de diagrama de Gantt.",
"workWeekDays_label" => "Días de la semana laboral",
"workWeekDays_text" => "Los días se colorean como días laborables en las vistas del calendario y, por ejemplo, se muestran en las semanas en la vista Mes de trabajo y en la vista Semana laboral.<br>Ingrese el número de cada día laborable.<br>p. Ej. 12345: lunes a viernes<br>Los días no ingresados se consideran días de fin de semana.",
"weekStart_label" => "Primer día de la semana",
"weekStart_text" => "Ingrese el número del día del primer día de la semana.",
"lookBackAhead_label" => "Días eventos próximos (Tareas y RSS)",
"lookBackAhead_text" => "Número de días que se consultarán para mostrar eventos próximos en la lista de tareas y en las noticias RSS.",
"dwStartEndHour_label" => "Hora de inicio y finalización en la vista Día/Semana.",
"dwStartEndHour_text" => "Horas en las que un día normal de eventos comienza y termina.<br>E.g. el establecimiento de estos valores en 6 y 18 evitará el desperdicio de espacio en la vista Semana/Día para el tiempo de silencio entre la medianoche y las 6:00 y las 18:00 y la medianoche.<br>El selector de tiempo, que se usa para ingresar una hora, también comenzará y Terminar a estas horas.",
"dwTimeSlot_label" => "Hueco temporal en las vistas diaria y semanal",
"dwTimeSlot_text" => "Número de minutos que ocupa cada hueco en las vistas diaria y semanal.<br>Este valor junto con la hora inicial (ver apartado previo) determinará el número de filas en las vistas diaria y semanal.",
"dwTsHeight_label" => "Altura del hueco temporal",
"dwTsHeight_text" => "Altura en pixeles del hueco temporal en la vistas diaria y semanal.",
"evtHeadX_label" => "Diseño del evento en vista de mes, semana y día",
"evtHeadX_text" => "Plantillas con marcadores de posición de campos de eventos que deben mostrarse. Se pueden utilizar los siguientes marcadores de posición:<br>#ts - hora de inicio<br>#tx - hora de inicio y finalización<br>#e - título del evento<br>#o - propietario del evento<br>#v - lugar<br>#lv - lugar con etiqueta \'Lugar:\' delante<br>#c - categoría<br>#lc - categoría con etiqueta \'Categoría:\' delante<br>#a - edad (ver nota más adelante)<br>#x1 - campo extra 1<br>#lx1 - campo extra 1 con etiqueta de la página de configuración delante<br>#x2 - campo extra 2<br>#lx2 - campo extra 2 con etiqueta de la página de configuración delante<br>#/ - nueva línea<br>Los campos se muestran en el orden especificado. Otros caracteres que no sean los marcadores de posición permanecerán sin cambios y formarán parte del evento mostrado.<br>Note: The age is shown if the event is part of a category with \'Repeat\' set to \'every year\' and the year of birth in parentheses is mentioned somewhere in the event\'s description field.",
"monthView" => "Vista de Mes",
"wkdayView" => "Vista de semana/día",
"ownerTitle_label" => "Mostrar propietario del evento delante del título del evento",
"ownerTitle_text" => "En las distintas vistas del calendario, muestre el nombre del propietario del evento delante del título del evento.",
"showSpanel_label" => "Panel lateral en vista de mes, semana y día",
"showSpanel_text" => "En la vista Mes, Semana y Día, justo al lado del calendario principal, se pueden mostrar los siguientes elementos:<br>* un mini calendario que se puede usar para mirar hacia atrás o hacia adelante sin cambiar la fecha del calendario principal<br>* una imagen de decoración correspondiente al mes actual<br>* un área de información para publicar mensajes / anuncios para cada mes.<br>Si no se seleccionan elementos, el panel lateral no se mostrará. <br> Consulte admin_guide.html para más detalles.",
"spMiniCal" => "Mini calendario",
"spImages" => "Imágenes",
"spInfoArea" => "Área de información",
"showImgInMV_label" => "Mostrar en la vista mensual",
"showImgInMV_text" => "Active/desactive la visualización en la vista de mes de las imágenes en miniatura agregadas a uno de los campos de descripción del evento. Cuando está habilitado, las miniaturas se mostrarán en las celdas del día y, cuando estén deshabilitadas, las miniaturas se mostrarán al pasar el mouse sobre los cuadros.",
"urls" => "Enlaces URL",
"emails" => "Enlaces email",
"monthInDCell_label" => "Mes en cada celda del dia",
"monthInDCell_text" => "Visualización para cada día, ver el nombre del mes de 3 letras",
"evtWinSmall_label" => "Ventana de evento reducida",
"evtWinSmall_text" => "Al agregar / editar eventos, la ventana Evento mostrará un subconjunto de los campos de entrada. Para mostrar todos los campos, se puede seleccionar un signo más.",
"mapViewer_label" => "Visor de mapas URL",
"mapViewer_text" => "Si se ha especificado una URL del visor de mapas, se mostrará una dirección en el campo del lugar del evento dentro de ! , se mostrará un botón de Dirección en las vistas del calendario. Cuando se desplace el mouse sobre este botón, se mostrará la dirección de texto y cuando se haga clic, se abrirá una nueva ventana donde se mostrará la dirección en el mapa. Se debe especificar la URL completa de un visor de mapas, al final de la cual la dirección se pueden uni.<br>Ejemplos:<br>Google Maps: https://maps.google.com/maps?q=<br>OpenStreetMap: https://www.openstreetmap.org/search?query=<br> Si este campo se deja en blanco, las direcciones en el campo Lugar no se mostrarán como un botón de Dirección.",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Formato de fecha (dd mm yyyy)",
"dateFormat_text" => "Cadena de texto que define el formato de las fechas del evento en las vistas del calendario y los campos de entrada.<br>Posibles carácteres: y = año, m = mes y d = día.<br>Los carácteres no alfanuméricos se pueden usar como separadores y se copiarán literalmente.<br>Ejemplos:<br>ymd: 2013-10-31<br>mdy: 10.31.2013<br>d/m/y: 31/10/2013",
"dateFormat_expl" => "ej. y.m.d: 2013.10.31",
"MdFormat_label" => "Formato de fecha (dd mes)",
"MdFormat_text" => "Cadena de texto que define el formato de las fechas que consta de mes y día.<br>Posibles carácteres: M = mes en el texto, d = día en dígitos.<br>Los carácteres no alfanuméricos se pueden usar como separador y se copiarán literalmente. < br> Ejemplos:<br>d M: abril<br>M, d: julio, 14",
"MdFormat_expl" => "ej. M, d: Julio, 14",
"MdyFormat_label" => "Formato de fecha (dd mes aaaa)",
"MdyFormat_text" => "Cadena de texto que define el formato de las fechas que consta de día, mes y año.<br>Posibles carácteres: d = día en dígitos, M = mes en el texto, y = año en dígitos.<br>Los carácteres no alfanuméricos se pueden usar como separador y se copiarán literalmente.<br>Ejemplos:<br>D m y: 12 abril 2013<br>M d, y: julio 8, 2013",
"MdyFormat_expl" => "ej. M d, y: Julio 8, 2013",
"MyFormat_label" => "Formato de fecha (mes aaaa)",
"MyFormat_text" => "Cadena de texto que define el formato de las fechas que consisten en mes y año.<br>Posibles carácteres: M = mes en el texto, y = año en dígitos.<br>Los carácteres no alfanuméricos se pueden usar como separador y se copiarán literalmente. < br> Ejemplos:<br>M y: Abril 2013<br>y - M: 2013 - Julio",
"MyFormat_expl" => "ej. M y: Abril 2013",
"DMdFormat_label" => "Formato de fecha (día de la semana dd mes)",
"DMdFormat_text" => "Cadena de texto que define el formato de las fechas que constan de día de la semana, día y mes.<br>Posibles carácteres: WD = día de la semana en texto, M = mes en texto, d = día en dígitos.<br>Los carácteres no alfanuméricos se pueden usar como separador y se copiarán literalmente.<br>Ejemplos:<br>WD d M: viernes 12 abril<br>WD, M d: lunes, julio 14",
"DMdFormat_expl" => "ej. WD - M d: Sunday - Abril 6",
"DMdyFormat_label" => "Formato de fecha (día de la semana dd mes aaaa)",
"DMdyFormat_text" => "Cadena de texto que define el formato de las fechas que constan de día de la semana, día, mes y año.<br>Posibles carácteres: WD = día de la semana en el texto, M = mes en el texto, d = día en dígitos, y = año en dígitos.<br>Los carácteres no alfanuméricos se pueden usar como separador y se copiarán literalmente.<br>Ejemplos:<br>WD d M y: viernes 13 abril 2013<br>WD - M d, y: lunes - julio 16, 2013",
"DMdyFormat_expl" => "ej. WD, M d, y: Monday, Julio 16, 2013",
"timeFormat_label" => "Formato de hora (hh mm)",
"timeFormat_text" => "Cadena de texto que define el formato de los tiempos de eventos en las vistas del calendario y los campos de entrada.<br>Posibles carácteres: h = horas, H = horas con ceros a la izquierda, m = minutos, a = am / pm (opcional), A = AM / PM (opcional).<br>Los carácteres no alfanuméricos se pueden usar como separador y se copiarán literalmente.<br>Ejemplos:<br>h:m: 18:35<br>h:ma: 6:35 pm <br>H:mA: 06:35 PM",
"timeFormat_expl" => "ej. h:m: 22:35 y h:mA: 10:35PM",
"weekNumber_label" => "Mostrar número de la semana",
"weekNumber_text" => "Permite elegir si se mostrará o no el número de la semana en las vistas relevantes.",
"time_format_us" => "12 horas (AM / PM)",
"time_format_eu" => "24 horas",
"sunday" => "Domingo",
"monday" => "Lunes",
"time_zones" => "zonas horarias",
"dd_mm_yyyy" => "dd-mm-aaaa",
"mm_dd_yyyy" => "mm-dd-aaaa",
"yyyy_mm_dd" => "aaaa-mm-dd",

//settings.php - file uploads settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"maxUplSize_label" => "Tamaño máximo de carga de archivos",
"maxUplSize_text" => "Tamaño máximo de archivo permitido cuando los usuarios cargan archivos adjuntos o en miniatura. <br>Nota: la mayoría de las instalaciones de PHP tienen este máximo establecido en 2 MB (archivo php_ini) ",
"attTypes_label" => "Tipos de archivos adjuntos",
"attTypes_text" => "Lista separada por comas con tipos de archivos adjuntos válidos que se pueden cargar (por ejemplo, \'.pdf,.jpg,.gif,.png,.mp4,.avi\')",
"tnlTypes_label" => "Tipos de archivos de miniatura",
"tnlTypes_text" => "Lista separada por comas con tipos de archivos en miniatura válidos que se pueden cargar (por ejemplo, \'.jpg,.jpeg,.gif,.png\')",
"tnlMaxSize_label" => "Miniatura - tamaño máximo",
"tnlMaxSize_text" => "Tamaño máximo de la imagen en miniatura. Si los usuarios cargan miniaturas más grandes, las miniaturas se redimensionarán automáticamente al tamaño máximo. <br> Nota: Las miniaturas altas estirarán las celdas del día en la vista Mes, lo que puede resultar en efectos no deseados.",
"tnlDelDays_label" => "Margen de eliminación de miniaturas",
"tnlDelDays_text" => "Si se usa una miniatura dentro de este número de días, no se puede eliminar. El valor 0 días significa que la miniatura no se puede eliminar.",
"days" =>"días",
"mbytes" => "MB",
"wxhinpx" => "W x H en pixeles",

//settings.php - reminders settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"services_label" => "Servicios de mensajes",
"services_text" => "Servicios disponibles para enviar recordatorios de eventos. Si no se selecciona un servicio, se suprimirá la sección correspondiente en la ventana Evento. Si no se selecciona ningún servicio, no se enviarán recordatorios de eventos.",
"smsCarrier_label" => "Plantilla de SMS",
"smsCarrier_text" => "La plantilla del proveedor de SMS se utiliza para compilar la dirección de correo electrónico de la puerta de enlace SMS: ppp # sss @ operador, donde. . . <br>• ppp: cadena de texto opcional que se agregará antes del número de teléfono <br>• #: marcador de posición para el número de teléfono móvil del destinatario (el calendario reemplazará el # por el número de teléfono)<br>• sss: cadena de texto opcional que se insertará después del número de teléfono, por ejemplo, un nombre de usuario y contraseña, requeridos por algunos operadores <br>• @: carácter separador <br>• operador: dirección del operador (por ejemplo, mail2sms.com)<br> Ejemplos de plantillas: #@xmobile.com, 0#@carr2.int, #mi_usuario_mi_contraseña@sms.gway.net.",
"smsCountry_label" => "Código de país SMS",
"smsCountry_text" => "Si la puerta de enlace de SMS se encuentra en un país diferente al calendario, se debe especificar el código de país del país donde se usa el calendario. <br> Seleccione si se requiere el prefijo \'+\' o \'00\'.",
"smsSubject_label" => "Plantilla de asunto de SMS",
"smsSubject_text" => "Si se especifica, el texto de esta plantilla se copiará en el campo del asunto de los mensajes de correo SMS enviados. El texto puede contener el carácter #, que será reemplazado por el número de teléfono del calendario o el propietario del evento (dependiendo de la configuración anterior). Ejemplo: \'FROMFHONENUMBER = #\'.",
"smsAddLink_label" => "Añadir enlace de informe de evento a SMS",
"smsAddLink_text" => "Cuando esté marcado, se agregará un enlace al informe del evento a cada SMS. Al abrir este enlace en su teléfono móvil, los destinatarios podrán ver los detalles del evento.",
"maxLenSms_label" => "Longitud máxima del mensaje SMS",
"maxLenSms_text" => "Los mensajes SMS se envían con codificación de carácteres utf-8. Los mensajes de hasta 70 carácteres darán como resultado un solo mensaje SMS; los mensajes con más de 70 carácteres, con muchos carácteres Unicode, pueden dividirse en varios mensajes.",
"calPhone_label" => "Calendario numero de telefono",
"calPhone_text" => "El número de teléfono utilizado como identificación del remitente al enviar mensajes de notificación por SMS. <br> Formato: Libre, máx. 20 dígitos (algunos países requieren un número de teléfono, otros países también aceptan caracteres alfabéticos). <br> Si no hay ningún servicio de SMS activo o si no se ha definido una plantilla de asunto de SMS, este campo puede estar en blanco.",
"notSenderEml_label" => "Remitente de correos electrónicos de notificación",
"notSenderEml_text" => "Cuando el calendario envía correos electrónicos de recordatorio, la ID del remitente puede ser la dirección de correo electrónico del calendario o la dirección de correo electrónico del usuario que creó el evento. <br> En el caso de dirección de correo electrónico de usuario, el receptor puede responder por correo electrónico.",
"notSenderSms_label" => "Remitente de notificaciones SMS",
"notSenderSms_text" => "Cuando el calendario envía SMS de recordatorio, la ID del remitente del mensaje SMS puede ser el número de teléfono del calendario o el número de teléfono del usuario que creó el evento. <br> Si se selecciona \'usuario\' y se tiene una cuenta de usuario, si no se especificó un número de teléfono, se tomará el número de teléfono del calendario. <br> En el caso de número de teléfono de usuario, el receptor puede responder al mensaje.",
"defRecips_label" => "Lista predeterminada de destinatarios",
"defRecips_text" => "Si se especifica, esta será la lista de destinatarios predeterminados para las notificaciones por correo electrónico y / o SMS en la ventana Evento. Si este campo se deja en blanco, el destinatario predeterminado será el propietario del evento.",
"maxEmlCc_label" => "Máx. de destinatarios por correo electrónico",
"maxEmlCc_text" => "Normalmente, los ISP permiten un número máximo de destinatarios por correo electrónico. Al enviar recordatorios por correo electrónico o SMS, si el número de destinatarios es mayor que el número especificado aquí, el correo electrónico se dividirá en varios correos electrónicos, cada uno con el número máximo de destinatarios especificado.",
"mailServer_label" => "Servidor de correo",
"mailServer_text" => "El correo PHP es adecuado para el correo no autenticado en números pequeños. Para una mayor cantidad de correo o cuando se requiere autenticación, se debe usar el correo SMTP. <br> El uso del correo SMTP requiere un servidor de correo SMTP. Los parámetros de configuración que se utilizarán para el servidor SMTP deben especificarse a continuación.",
"smtpServer_label" => "Nombre del servidor SMTP",
"smtpServer_text" => "Si se selecciona el correo SMTP, el nombre del servidor SMTP debe especificarse aquí. Por ejemplo, el servidor SMTP de gmail: smtp.gmail.com.",
"smtpPort_label" => "Número de puerto SMTP",
"smtpPort_text" => "Si se selecciona el correo SMTP, el número de puerto SMTP se debe especificar aquí. Por ejemplo, 25, 465 o 587. Gmail, por ejemplo, utiliza el número de puerto 465.",
"smtpSsl_label" => "SSL (Sockets seguros)",
"smtpSsl_text" => "Si se selecciona el correo SMTP, seleccione aquí si la capa de sockets seguros (SSL) debe estar habilitada. Para gmail: habilitado",
"smtpAuth_label" => "Autenticación SMTP",
"smtpAuth_text" => "Si se selecciona la autenticación SMTP, el nombre de usuario y la contraseña que se especifican a continuación se usarán para autenticar el correo SMTP. <br> Por ejemplo, para gmail, el nombre de usuario es la parte de su dirección de correo electrónico antes de la @.",
"cc_prefix" => "El código de país comienza con el prefijo + o 00",
"general" => "General",
"email" => "Email",
"sms" => "SMS",
"php_mail" => "Correo PHP",
"smtp_mail" => "Correo SMTP (completar los campos de abajo)",

//settings.php - periodic function settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"cronHost_label" => "Servidor de trabajos Cron",
"cronHost_text" => "Especifique dónde se aloja el trabajo cron, que inicia periódicamente el script \'lcalcron.php\'. <br> • local: el trabajo cron se ejecuta en el mismo servidor <br> • remoto: el trabajo cron se ejecuta en un servidor remoto o lcalcron.php se inicia manualmente (prueba) <br> • Dirección IP: el trabajo cron se ejecuta en un servidor remoto con la dirección IP especificada.",
"cronSummary_label" => "Enviar resumen de tareas cron al administrador",
"cronSummary_text" => "Enviar un resumen de las tareas cron al administrador del calendario.<br>Habilitarlo solo es útil si:<br>• Se ha activado una tarea cron",
"chgSumRecips_label" => "Envíar correos con cambios a",
"chgSumRecips_text" => "Las direcciones de correo especificadas reciben periódicamente notificaciones por correo electrónico con los cambios en el calendario.",
"chgSummary_label" => "Días previos para buscar cambios",
"chgSummary_text" => "Número de días previos en los que buscar cambios en el calendario.<br>Si el número de días es cero no se enviarán resúmenes de los cambios.",
"icsExport_label" => "Exportación diaria de eventos iCal.",
"icsExport_text" => "Si está habilitado: Todos los eventos en el intervalo de fechas -1 semana hasta +1 año se exportarán en formato iCalendar en un archivo .ics en la carpeta \'files\'. El nombre del archivo será el nombre del calendario, los espacios en blanco serán reemplazados por guiones bajos. Los archivos antiguos serán sobrescritos por archivos nuevos.",
"eventExp_label" => "Días de vencimiento del evento.",
"eventExp_text" => "Número de días después de la fecha de vencimiento del evento para que el evento se elimine automáticamente. <br> Si es 0 o si no hay ninguna tarea cron en ejecución, no se eliminarán automáticamente.",
"maxNoLogin_label" => "Número máximo de días sin acceder",
"maxNoLogin_text" => "Si un usuario no ha accedido al calendario durante el número de días indicado, su cuenta será borrada.<br>Si el número es 0 las cuentas no se borrarán.",
"local" => "local",
"remote" => "remoto",
"ip_address" => "dirección IP",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"popFieldsSbar_label" => "Campos de evento - recuadro de desplazamiento de barra lateral",
"popFieldsSbar_text" => "Los campos de eventos que se mostrarán en una superposición cuando el usuario desplace un evento en la barra lateral independiente se pueden especificar mediante una secuencia de números. <br> Si no se especifica ningún campo, no se mostrará ningún cuadro de desplazamiento.",
"showLinkInSB_label" => "Mostrar enlaces en la barra lateral",
"showLinkInSB_text" => "Mostrar las URL de la descripción del evento como un hipervínculo en la barra lateral de los próximos eventos",
"sideBarDays_label" => "Días para mirar hacia adelante en la barra lateral.",
"sideBarDays_text" => "Número de días para mirar hacia adelante para los eventos en la barra lateral.",

//login.php
"log_log_in" => "Iniciar sesión",
"log_remember_me" => "Recordarme",
"log_register" => "Registrarse",
"log_change_my_data" => "Cambiar mis datos",
"log_save" => "Cambiar",
"log_un_or_em" => "Nombre de usuario o correo electrónico",
"log_un" => "Nombre de usuario",
"log_em" => "Correo electrónico",
"log_ph" => "Número de teléfono móvil",
"log_nr" => "Número de usuario (si corresponde)",
"log_pw" => "Contraseña",
"log_new_un" => "Nuevo nombre de usuario",
"log_new_em" => "Nuevo correo electrónico",
"log_new_pw" => "Nueva contraseña",
"log_con_pw" => "Confirmar Contraseña",
"log_pw_msg" => "Estos son sus datos de acceso para entrar a",
"log_pw_subject" => "Su Contraseña",
"log_npw_subject" => "Su nueva Contraseña",
"log_npw_sent" => "Su nueva contraseña ha sido enviada a:",
"log_registered" => "Registro correcto. Su nueva contraseña ha sido enviada por correo electrónico",
"log_em_problem_not_sent" => "Problema de correo electrónico: no se pudo enviar tu contraseña",
"log_em_problem_not_noti" => "Problema de correo electrónico - no se pudo notificar al administrador",
"log_un_exists" => "El nombre de usuario ya existe",
"log_em_exists" => "La dirección de correo electrónico ya está registrada",
"log_un_invalid" => "Nombre de usuario inválido (longitud mínima 2: A-Z, a-z, 0-9, y _-.) ",
"log_em_invalid" => "Dirección de correo electrónico no válida",
"log_ph_invalid" => "Número de teléfono móvil no válido",
"log_un_em_invalid" => "Nombre de usuario/correo electrónico no válidos",
"log_un_em_pw_invalid" => "El nombre de usuario/correo electrónico o la contraseña es incorrecta",
"log_pw_error" => "Las contraseñas no coinciden",
"log_no_un_em" => "No introdujo su nombre de usuario/correo electrónico",
"log_no_un" => "Introduzca su nombre de usuario",
"log_no_em" => "Introduzca su dirección de correo electrónico",
"log_no_pw" => "No ha introducido su contraseña",
"log_no_rights" => "Acceso denegado: no tiene permisos para ver el calendario. Contacte con el administrador",
"log_send_new_pw" => "Enviar una nueva contraseña",
"log_new_un_exists" => "El nuevo nombre de usuario ya existe",
"log_new_em_exists" => "La nueva dirección de correo electrónico ya existe",
"log_ui_language" => "Idioma del interfaz de usuario",
"log_new_reg" => "Registar nuevo usuario",
"log_date_time" => "Fecha / hora",
"log_time_out" => "Se acabó el tiempo",

//categories.php
"cat_list" => "Lista de Categorías",
"cat_edit" => "Editar",
"cat_delete" => "Borrar",
"cat_add_new" => "Añadir Nueva Categoría",
"cat_add" => "Agregar",
"cat_edit_cat" => "Editar Categoría",
"cat_sort" => "Ordenar por nombre",
"cat_cat_name" => "Nombre de la categoría",
"cat_symbol" => "Símbolo",
"cat_symbol_repms" => "Símbolo de categoría (reemplaza a mini cuadrado)",
"cat_symbol_eg" => "ej. A, X, ♥, ⛛",
"cat_matrix_url_link" => "Enlace URL (mostrado en la vista de matriz)",
"cat_seq_in_menu" => "Posición en menú",
"cat_cat_color" => "Color de categoria",
"cat_text" => "Texto",
"cat_background" => "Fondo",
"cat_select_color" => "Seleccione el color",
"cat_subcats" => "Sub-<br>categorias",
"cat_subcats_opt" => "Subcategorias (opcional)",
"cat_url" => "URL",
"cat_name" => "Nombre",
"cat_save" => "Actualizar",
"cat_added" => "Categoría agregada",
"cat_updated" => "Categoría actualizada",
"cat_deleted" => "Categoría eliminada",
"cat_not_added" => "Categoría no agregada",
"cat_not_updated" => "La categoría no se actualizó",
"cat_not_deleted" => "La categoría no se eliminó",
"cat_nr" => "Nº",
"cat_repeat" => "Repetir",
"cat_every_day" => "cada día",
"cat_every_week" => "cada semana",
"cat_every_month" => "cada mes",
"cat_every_year" => "cada año",
"cat_overlap" => "Superposición <br> permitida <br> (intervalo)",
"cat_need_approval" => "Los eventos necesitan <br> aprobación",
"cat_no_overlap" => "No se permite superposición",
"cat_same_category" => "Misma categoria",
"cat_all_categories" => "Todas las categorias",
"cat_gap" => "intervalo",
"cat_ol_error_text" => "Mensaje de error, si se superponen",
"cat_no_ol_note" => "Tenga en cuenta que los eventos ya existentes no se verifican y, por lo tanto, pueden superponerse",
"cat_ol_error_msg" => "Evento superpuesto - seleccione otra hora",
"cat_no_ol_error_msg" => "Falta el mensaje de error de superposición",
"cat_duration" => "Duración<br>del evento!:<br>Fija",
"cat_default" => "predeterminado (sin hora de finalización)",
"cat_fixed" => "Fijo",
"cat_event_duration" => "Duración del evento",
"cat_olgap_invalid" => "Intervalo de superposición no válido",
"cat_duration_invalid" => "Duración del evento no válida",
"cat_no_url_name" => "Falta el nombre del enlace URL",
"cat_invalid_url" => "Enlace URL no válido",
"cat_day_color" => "Color del día",
"cat_day_color1" => "Color del día (año/vista matriz)",
"cat_day_color2" => "Color del día (mes/semana/día)",
"cat_approve" => "Los eventos necesitan aprobación",
"cat_check_mark" => "Marca",
"cat_label" => "Etiqueta",
"cat_mark" => "Marca (Signo)",
"cat_name_missing" => "Falta el nombre de la categoría",
"cat_mark_label_missing" => "Falta la marca de verificación/etiqueta",

//users.php
"usr_list_of_users" => "Lista de Usuarios",
"usr_name" => "Nombre de usuario",
"usr_email" => "Correo electrónico",
"usr_phone" => "Número de teléfono móvil",
"usr_phone_br" => "Número de<br>teléfono móvil",
"usr_number" => "Numero de usuario",
"usr_number_br" => "Numero de<br>usuario",
"usr_language" => "Idioma",
"usr_ui_language" => "Idioma de interfaz de usuario",
"usr_group" => "Grupo",
"usr_password" => "Contraseña",
"usr_edit_user" => "Editar perfil de usuario",
"usr_add" => "Añadir usuario",
"usr_edit" => "Editar",
"usr_delete" => "Borrar",
"usr_login_0" => "Primer acceso",
"usr_login_1" => "Último acceso",
"usr_login_cnt" => "Accesos",
"usr_add_profile" => "Añadir perfil",
"usr_upd_profile" => "Actualizar perfil",
"usr_if_changing_pw" => "Sólo si se cambia la contraseña",
"usr_pw_not_updated" => "Contraseña no actualizada",
"usr_added" => "Usuario añadido",
"usr_updated" => "Perfil de usuario actualizado",
"usr_deleted" => "Usuario eliminado",
"usr_not_deleted" => "Usuario no suprimido",
"usr_cred_required" => "Nombre de usuario, correo electrónico y contraseña son obligatorios",
"usr_name_exists" => "El nombre de usuario ya existe",
"usr_email_exists" => "La dirección de correo electrónico ya existe",
"usr_un_invalid" => "Nombre de usuario inválido (longitud mínima 2: A-Z, a-z, 0-9, y _-.) ",
"usr_em_invalid" => "Dirección de coreo electrónico inválida",
"usr_ph_invalid" => "Número de teléfono móvil no válido",
"usr_cant_delete_yourself" => "No puede borrarse usted a sí mismo",
"usr_go_to_groups" => "Ir a grupos",

//groups.php
"grp_list_of_groups" => "Lista de Grupo de Usuarios",
"grp_name" => "Nombre de grupo",
"grp_priv" => "Permisos",
"grp_categories" => "Categorías",
"grp_all_cats" => "todas las categorías",
"grp_rep_events" => "Repetir<br>eventos",
"grp_m-d_events" => "Eventos<br>varios días",
"grp_priv_events" => "Eventos<br>privados",
"grp_upload_files" => "Subir<br>archivos",
"grp_send_sms" => "Enviar<br>SMS",
"grp_tnail_privs" => "Resumen<br>privilegios",
"grp_priv0" => "Sin permisos de acceso",
"grp_priv1" => "Ver calendario",
"grp_priv2" => "Publicar/editar eventos propios",
"grp_priv3" => "Publicar/editar TODOS los eventos",
"grp_priv4" => "Publicar/editar + modificar permisos",
"grp_priv9" => "Funciones de administración",
"grp_may_post_revents" => "Publicar eventos repetidos",
"grp_may_post_mevents" => "Publicar eventos de varios días",
"grp_may_post_pevents" => "Publicar eventos privados",
"grp_may_upload_files" => "Puede subir archivos",
"grp_may_send_sms" => "Puede enviar SMS",
"grp_tn_privs" => "Resumen privilegios",
"grp_tn_privs00" => "ninguno",
"grp_tn_privs11" => "ver todo",
"grp_tn_privs20" => "gestionar propio",
"grp_tn_privs21" => "g. pro/v. todo",
"grp_tn_privs22" => "Administrar todo",
"grp_edit_group" => "Editar Grupo de Usuarios",
"grp_sub_to_rights" => "Sujeto a derechos de usuario",
"grp_view" => "Ver",
"grp_add" => "Agregar",
"grp_edit" => "Editar",
"grp_delete" => "Borrar",
"grp_add_group" => "Añadir Grupo",
"grp_upd_group" => "Actualizar Grupo",
"grp_added" => "Grupo añadido",
"grp_updated" => "Grupo actualizado",
"grp_deleted" => "Grupo eliminado",
"grp_not_deleted" => "Grupo no eliminado",
"grp_in_use" => "Grupo está en uso",
"grp_cred_required" => "Nombre de grupo, Permisos y Categorías son obligatorios",
"grp_name_exists" => "Nombre de grupo  ya existe",
"grp_name_invalid" => "Nombre de grupo inválido (longitud mínima 2: A-Z, a-z, 0-9, y _-.) ",
"grp_background" => "Color del fondo",
"grp_select_color" => "Seleccione color",
"grp_invalid_color" => "Formato de color incorrecto (#XXXXXX donde X = Valor hexadecimal)",
"grp_go_to_users" => "A Usuarios",

//database.php
"mdb_dbm_functions" => "Funciones de la base de datos",
"mdb_noshow_tables" => "No puedo obtener la(s) tabla(s)",
"mdb_noshow_restore" => "Ningún archivo de origen seleccionado",
"mdb_file_not_sql" => "El archivo de copia origen debe ser un archivo SQL (extensión '.sql') ",
"mdb_compact" => "Compactar la base de datos",
"mdb_compact_table" => "Compactar tabla",
"mdb_compact_error" => "Error",
"mdb_compact_done" => "Hecho",
"mdb_purge_done" => "Los eventos borrados han sido eliminados definitivamente",
"mdb_backup" => "Copia de seguridad de la base de datos",
"mdb_backup_table" => "Copia de seguridad de la tabla",
"mdb_backup_file" => "Archivo de respaldo",
"mdb_backup_done" => "Hecho",
"mdb_records" => "registros",
"mdb_restore" => "Restaurar base de datos",
"mdb_restore_table" => "Restaurar tabla",
"mdb_inserted" => "registros insertados",
"mdb_db_restored" => "Base de datos restaurada",
"mdb_no_bup_match" => "El archivo de copia no coincide con la versión de calendario.<br>Base de datos no restaurada.",
"mdb_events" => "Eventos",
"mdb_delete" => "eliminar",
"mdb_undelete" => "recuperar",
"mdb_between_dates" => "ocurre entre",
"mdb_deleted" => "Eventos eliminados",
"mdb_undeleted" => "Eventos restaurados",
"mdb_file_saved" => "El fichero de la copia de seguridad ha sido guardado en el servidor.",
"mdb_file_name" => "Nombre del fichero",
"mdb_start" => "Empezar",
"mdb_no_function_checked" => "No se ha seleccionado ninguna función",
"mdb_write_error" => "La escritura del fichero de copia de seguridad ha fallado.<br>Compruebe los permisos del directorio 'files/'",

//import/export.php
"iex_file" => "Archivo",
"iex_file_name" => "Nombre del fichero iCal",
"iex_file_description" => "Descripción del archivo iCal",
"iex_filters" => "Filtros de evento",
"iex_export_usr" => "Export User Profiles",
"iex_import_usr" => "Import User Profiles",
"iex_upload_ics" => "Archivo&nbsp;iCal",
"iex_create_ics" => "Crear archivo iCal",
"iex_tz_adjust" => "Ajustes de zona horaria",
"iex_upload_csv" => "Archivo CSV",
"iex_upload_file" => "Subir archivo",
"iex_create_file" => "Crear archivo",
"iex_download_file" => "Descargar archivo",
"iex_fields_sep_by" => "Separador de campos",
"iex_birthday_cat_id" => "Categoría de cumpleaños",
"iex_default_grp_id" => "ID de grupo de usuario predeterminado",
"iex_default_cat_id" => "Categoría por defecto",
"iex_default_pword" => "Contraseña predeterminada",
"iex_if_no_pw" => "Si no se especifica contraseña",
"iex_replace_users" => "Reemplazar usuarios existentes",
"iex_if_no_grp" => "si no se encuentra un grupo de usuarios",
"iex_if_no_cat" => "si no hay categoría",
"iex_import_events_from_date" => "Eventos a partir del",
"iex_no_events_from_date" => "No se encontraron eventos a partir de la fecha especificada",
"iex_see_insert" => "Vea las instrucciones a la derecha",
"iex_no_file_name" => "Falta el nombre del archivo",
"iex_no_begin_tag" => "archivo iCal inválido (falta etiqueta BEGIN)",
"iex_bad_date" => "Fecha erronea",
"iex_date_format" => "Formato de fecha",
"iex_time_format" => "Formato de hora",
"iex_number_of_errors" => "Número de errores en listados",
"iex_bgnd_highlighted" => "fondo coloreado",
"iex_verify_event_list" => "Verifique la lista de eventos, corríjala y haga clic",
"iex_add_events" => "Añadir eventos a la base de datos",
"iex_verify_user_list" => "Verifique la lista de usuarios, corrija los posibles errores y haga clic",
"iex_add_users" => "Agregar usuarios a la base de datos",
"iex_select_ignore_birthday" => "Seleccione los cumpleaños y las casillas de borrar que desee",
"iex_select_ignore" => "Seleccione la casilla borrar para ignorar el evento",
"iex_check_all_ignore" => "Marque todas las casillas de ignorar",
"iex_title" => "Título",
"iex_venue" => "Ubicación",
"iex_owner" => "Propietario",
"iex_category" => "Categoría",
"iex_date" => "Fecha",
"iex_end_date" => "Fecha final",
"iex_start_time" => "Comienzo",
"iex_end_time" => "Hora final",
"iex_description" => "Descripción",
"iex_repeat" => "Repetir",
"iex_birthday" => "Cumpleaños",
"iex_ignore" => "Borrar",
"iex_events_added" => "eventos agregados",
"iex_events_dropped" => "eventos eliminados (preexistentes)",
"iex_users_added" => "usuarios agregados",
"iex_users_deleted" => "usuarios borrados",
"iex_csv_file_error_on_line" => "Error en el archivo CSV, línea",
"iex_between_dates" => "Ocurre entre",
"iex_changed_between" => "Añadido/modificado entre",
"iex_select_date" => "Seleccionar fecha",
"iex_select_start_date" => "Seleccionar fecha inicial",
"iex_select_end_date" => "Seleccionar fecha final",
"iex_group" => "Grupo de usuario",
"iex_name" => "Nombre de usuario",
"iex_email" => "Email",
"iex_phone" => "Teléfono",
"iex_lang" => "Idioma",
"iex_pword" => "Contraseña",
"iex_all_groups" => "todos los grupos",
"iex_all_cats" => "todas las categorías",
"iex_all_users" => "todos los usuarios",
"iex_no_events_found" => "No hay eventos",
"iex_file_created" => "Archivo creado",
"iex_write error" => "La escritura del archivo exportado ha fallado.<br>Compruebe los permisos del directorio 'files/'",
"iex_invalid" => "no válido",
"iex_in_use" => "ya está en uso",

//styling.php
"sty_css_intro" =>  "Los valores especificados en esta página deben cumplir con los estándares CSS",
"sty_preview_theme" => "Vista previa del tema",
"sty_preview_theme_title" => "Vista previa del tema de visualización en el calendario",
"sty_stop_preview" => "Detener vista previa",
"sty_stop_preview_title" => "Detener vista previa del tema mostrado en el calendario",
"sty_save_theme" => "Guardar tema",
"sty_save_theme_title" => "Guardar el tema mostrado en la base de datos",
"sty_backup_theme" => "Copia de seguridad del Tema",
"sty_backup_theme_title" => "Copia de seguridad del Tema desde la base de datos a un archivo",
"sty_restore_theme" => "Restaurar Tema",
"sty_restore_theme_title" => "Restaurar el Tema de archivo a Pantalla",
"sty_default_luxcal" => "Tema predeterminado de LuxCal",
"sty_close_window" => "Cerrar Ventana",
"sty_close_window_title" => "Cerrar esta Ventana",
"sty_theme_title" => "Título del tema",
"sty_general" => "General",
"sty_grid_views" => "Cuadrícula / Vistas",
"sty_hover_boxes" => "Ventanas flotantes",
"sty_bgtx_colors" => "Colores de fondo / texto",
"sty_bord_colors" => "Colores de borde",
"sty_fontfam_sizes" => "Familia de fuentes / tamaños",
"sty_font_sizes" => "Tamaños de fuente",
"sty_miscel" => "Misceláneo",
"sty_background" => "Fondo",
"sty_text" => "Texto",
"sty_color" => "Color",
"sty_example" => "Ejemplo",
"sty_theme_previewed" => "Modo de vista previa: ahora puede navegar por el calendario. Seleccione Detener vista previa cuando haya terminado.",
"sty_theme_saved" => "Tema guardado en la base de datos",
"sty_theme_backedup" => "Tema respaldado desde la base de datos al archivo:",
"sty_theme_restored1" => "Tema restaurado desde archivo:",
"sty_theme_restored2" => "Presione Guardar tema para guardar el tema en la base de datos",
"sty_unsaved_changes" => "ADVERTENCIA - ¡Cambios no guardados!\\nSi cierra la ventana, los cambios se perderán.", //don't remove '\\n'
"sty_number_of_errors" => "Número de errores en la lista",
"sty_bgnd_highlighted" => "fondo resaltado",
"sty_XXXX" => "calendario general",
"sty_TBAR" => "barra superior del calendario",
"sty_BHAR" => "Barras, encabezados y lineas.",
"sty_BUTS" => "botones",
"sty_DROP" => "menús desplegables",
"sty_XWIN" => "ventanas emergentes",
"sty_INBX" => "insertar cuadros",
"sty_OVBX" => "cuadros superpuestos",
"sty_BUTH" => "botones - flotante",
"sty_FFLD" => "campos de formulario",
"sty_CONF" => "Mensaje de confirmacion",
"sty_WARN" => "mensaje de advertencia",
"sty_ERRO" => "mensaje de error",
"sty_HLIT" => "texto resaltado",
"sty_FXXX" => "familia de fuentes base",
"sty_SXXX" => "tamaño de fuente base",
"sty_PGTL" => "títulos de página",
"sty_THDL" => "encabezados de tabla L",
"sty_THDM" => "encabezados de tabla M",
"sty_DTHD" => "encabezados de fecha",
"sty_SNHD" => "encabezados de sección",
"sty_PWIN" => "ventanas emergentes",
"sty_SMAL" => "texto pequeño",
"sty_GCTH" => "parte superior de la celda del día - flotante",
"sty_GTFD" => "encabezado de celda 1er día del mes",
"sty_GWTC" => "columna de semana nº / hora",
"sty_GWD1" => "día de la semana mes 1",
"sty_GWD2" => "día de la semana mes 2",
"sty_GWE1" => "fin de semana mes 1",
"sty_GWE2" => "fin de semana mes 2",
"sty_GOUT" => "outside month",
"sty_GTOD" => "celda del día de hoy",
"sty_GSEL" => "celda del día día seleccionado",
"sty_LINK" => "URL y enlaces de correo electrónico",
"sty_CHBX" => "casilla de verificación de todo",
"sty_EVTI" => "título del evento en vistas",
"sty_HNOR" => "evento normal",
"sty_HPRI" => "evento privado",
"sty_HREP" => "evento repetitivo",
"sty_POPU" => "cuadro emergente flotante",
"sty_TbSw" => "sombra de la barra superior (0: no 1: sí)",
"sty_CtOf" => "desplazamiento de contenido",

//lcalcron.php
"cro_sum_header" => "RESUMEN DE TAREAS CRON",
"cro_sum_trailer" => "FIN DEL RESUMEN",
"cro_sum_title_eve" => "EVENTOS EXPIRADOS",
"cro_nr_evts_deleted" => "Número de eventos eliminados",
"cro_sum_title_eml" => "RECORDATORIOS POR CORREO ELECTRÓNICO",
"cro_sum_title_sms" => "RECORDATORIOS POR SMS",
"cro_not_sent_to" => "Recordatorios enviados a",
"cro_no_reminders_due" => "No hay fecha de recordatorio pendientes",
"cro_subject" => "Tema",
"cro_event_due_in" => "El evento siguiente ocurrirá en",
"cro_event_due_today" => "El siguiente evento es para hoy",
"cro_due_in" => "Ocurrido en",
"cro_due_today" => "Para hoy",
"cro_days" => "día(s)",
"cro_date_time" => "Fecha / hora",
"cro_title" => "Título",
"cro_venue" => "Ubicación del evento",
"cro_description" => "Descripción",
"cro_category" => "Categoría",
"cro_status" => "Estado",
"cro_sum_title_chg" => "CAMBIOS DEL CALENDARIO",
"cro_nr_changes_last" => "Número de cambios en los últimos",
"cro_report_sent_to" => "Informe enviado a",
"cro_no_report_sent" => "No se ha enviado informe por correo electrónico´",
"cro_sum_title_use" => "COMPROBACIONES DE CUENTAS DE USUARIO",
"cro_nr_accounts_deleted" => "Número de cuentas borradas",
"cro_no_accounts_deleted" => "No se ha borrado ninguna cuenta",
"cro_sum_title_ice" => "EVENTOS EXPORTADOS",
"cro_nr_events_exported" => "Número de eventos exportados en formato iCalendar a archivo",

//messaging.php
"mes_no_msg_no_recip" => "No enviado, no se encontraron destinatarios",

//explanations
"xpl_manage_db" =>
"<h3>Instrucciones para gestionar la base de datos</h3>
<p>En esta página puede seleccionar las siguientes funciones:</p>
<h6>Compactar la base de datos</h6>
<p>Cuando un usuario elimina un evento, el evento se marca como eliminado, pero no
se borra de la base de datos. Al compactar la base de datos, la función eliminará
definitiva y permanentemente los eventos que hayan sido borrados hace más de 30 días, liberando espacio en 
el disco.</p>
<h6>Copia de seguridad de la base de datos</h6>
<p>Esta función creará una copia de seguridad completa de la base de datos del calendario 
(tablas, estructura y contenido) en formato .sql. La copia será guardada en el directorio 
<strong>files/</strong> con el nombre: 
<kbd>dump-cal-lcv-yyyymmdd-hhmmss.sql</kbd> (donde 'cal' = calendar ID, 'lcv' = 
calendar version y 'yyyymmdd-hhmmss' = año, mes, día, hora, minutos y segundos).</p>
<p>El archivo de copia de seguridad se puede utilizar para recrear la base de datos del calendario (estructura y
datos), a través de la función de restauración que se describe a continuación o utilizando, por ejemplo, la
Herramienta <strong> phpMyAdmin </strong>, que es proporcionada por la mayoría de los hosts web.</p>
<h6>Restore database</h6>
<p>Esta función restaurará la base de datos del calendario con el contenido del
archivo de copia de seguridad cargado (tipo de archivo .sql).</p>
<p>Al restaurar la base de datos, TODOS LOS DATOS ACTUALMENTE PRESENTES SE PERDERÁN!</p>
<h6>Eventos</h6>
<p>Esta función eliminará o recuperará los eventos que estén ocurriendo entre
fechas especificadas. Si una fecha se deja en blanco, no hay límite de fecha; así que si ambas
fechas se dejan en blanco, TODOS LOS EVENTOS SERÁN ELIMINADOS!</p><br>
<p>IMPORTANTE: cuando se compacta la base de datos (ver arriba), los eventos serán
¡Eliminados permanentemente de la base de datos y ya no se podrán recuperar!</p>",

"xpl_import_csv" =>
"<h3>Instrucciones de importación de CSV</h3>
<p>Este formulario se utiliza para importar al calendario archivos de texto con datos 
separados por comas <strong>Comma Separated Values (CSV)</strong> con datos de eventos.</p>
<p>El orden de las columnas en el archivo CSV debe ser: título, ubicación, category id (ver más abajo), 
fecha inicial, fecha final, hora inicial, hora final y descripción. La primera fila
utilizada para desribir el contenido de las columnas será ignorada.</p>
<h6>Archivo CSV de ejemplo</h6>
<p>Los archivos CSV de ejemplo se encuentran en el directorio 'files/' del paquete que desacargó 
de LuxCal.</p>
<h6>Separador de campo</h6>
El separador de campo puede ser cualquier carácter, por ejemplo, una coma, un punto y coma o
tabulador (tabulador: '\\t'). El carácter separador de campo debe ser único.
y no puede ser parte del texto, números o fechas en los campos.
<h6>Formato y de fecha y hora</h6>
<p>El formato de fecha y hora seleccionados a la izquierda deben coincidir con los correspondientes en 
el archivo CSV que se va a subir.</p>
<h6>Tabla de categorías</h6>
<p>La agenda del sistema usa múmeros únicos o llaves para identificar las categorías. 
Estos números o ID de las categorías deben coincidir en el archivo CSV con los de la agenda 
o estar en blanco.</p>
<p>Si en el campo siguiente desea asignar eventos como 'cumpleaños', el <strong>ID de la
categoría de cumpleaños</strong> debe corresponder con el de la lista de categorías que figura a 
continuación.</p>
<p class='hilite'>Advertencia: ¡No importe más de 100 eventos a la vez!</p>
<p>En el calendario están definidas las siguientes categorías:</p>",

"xpl_import_user" =>
"<h3>Instrucciones de importación de perfil de usuario</h3>
<p>Este formulario se utiliza para importar un archivo de texto CSV (valores separados por comas)
que contiene datos de perfil de usuario en el calendario LuxCal.</p>
<p>Para el manejo adecuado de caracteres especiales, el archivo CSV debe estar codificado en UTF-8.</p>
<h6>Separador de campo</h6>
<p>El separador de campo puede ser cualquier carácter, por ejemplo, una coma, punto y coma, etc.
El carácter separador de campo debe ser único.
y no puede ser parte del texto en los campos.</p>
<h6>ID de grupo de usuario predeterminado</h6>
<p>Si en el archivo CSV un ID de grupo de usuarios se ha dejado en blanco, el valor predeterminado
especificado, se tomará para la identificación del grupo de usuarios.</p>
<h6>Contraseña predeterminada</h6>
<p>Si en el archivo CSV una contraseña de usuario se ha dejado en blanco, el valor predeterminado
especificado,se tomará como contraseña para dicho usuario.</p>
<h6>Reemplazar usuarios existentes</h6>
<p>Si se ha marcado la casilla de verificación reemplazar usuarios existentes, 
todos los usuarios existentes, excepto el usuario público y el administrador,
se eliminarán antes de importar los perfiles de usuario.</p>
<br>
<h6>Ejemplos de archivos de perfil de usuario</h6>
<p>Se pueden encontrar archivos CSV de perfil de usuario de muestra (.csv) en la carpeta 'files /' de
su instalación LuxCal.</p>
<h6>Campos en el archivo CSV</h6>
<p>El orden de las columnas debe ser como se detalla a continuación. Si la primera fila del archivo CSV
contiene encabezados de columna, se ignorará.</p>
<ul>
<li>ID de grupo de usuarios: debe corresponder a los grupos de usuarios utilizados en su calendario (consulte
la tabla a continuación). Si está en blanco, el usuario se colocará en el grupo de usuarios predeterminado especificado</li>
<li>Nombre de usuario: obligatorio</li>
<li>Dirección de correo electrónico: obligatoria</li>
<li>Número de teléfono móvil: opcional</li>
<li>Idioma de la interfaz: opcional. P.ej. Inglés, Danés. Si está en blanco, como valor predeterminado
se tomará el idioma seleccionado en la página Configuración.</li>
<li>Contraseña: opcional. Si está en blanco, se tomará la contraseña predeterminada especificada.</li>
</ul>
<p>Los campos en blanco deben indicarse con dos comillas. Otros campos pueden quedar de la
fila, si no se indican de esta forma.</p>
<p class='hired'>Advertencia: ¡No importe más de 60 perfiles de usuario a la vez!</p>
<h6>Tabla de ID de grupo de usuarios</h6>
<p>Para su calendario, se han definido los siguientes grupos de usuarios:</p>",

"xpl_export_user" =>
"<h3>Instrucciones de exportación de perfil de usuario</h3>
<p>Este formulario se usa para extraer y exportar <strong>Perfiles de usuario</strong> desde
el calendario LuxCal.</p>
<p>Los archivos se crearán en el directorio 'files/' en el servidor con el
nombre de archivo especificado y en el formato de valores separados por comas (.csv).</p>
<h6>Nombre del archivo de destino</h6>
Si no se especifica, el nombre de archivo predeterminado será
el nombre del calendario seguido del sufijo '_users'. La extensión del nombre del archivo
se asigna automáticamente como <b>.csv</b>.</p>
<h6>Grupo de usuario</h6>
Solo los perfiles de usuario del grupo de usuarios seleccionado serán
exportados. Si se selecciona 'todos los grupos', los perfiles de usuario en el archivo de destino
se ordenarán por grupo de usuarios</p>
<h6>Separador de campo</h6>
<p>El separador de campo puede ser cualquier carácter, por ejemplo, una coma, punto y coma, etc.
El carácter separador de campo debe ser único.
y no puede ser parte del texto en los campos.</p><br>
<p>Los archivos existentes en el directorio 'files/' en el servidor con el mismo nombre
serán reemplazados por el nuevo archivo.</p>
<p>El orden de las columnas en el archivo de destino será: ID de grupo, nombre de usuario,
dirección de correo electrónico, número de teléfono móvil, idioma de la interfaz y contraseña.<br>
<b>Nota:</b> Las contraseñas en los perfiles de usuario exportados están codificadas y no se pueden
descifrar.</p><br>
<p>Al <b>descargar</b> el archivo .csv exportado, la fecha y hora actuales
se agregarán al nombre del archivo descargado.</p><br>
<h6>Ejemplos de archivos de perfil de usuarios</h6>
<p>Se pueden encontrar archivos de perfil de usuario de muestra (extensión de archivo .csv) en
el directorio 'files/' de su descarga LuxCal.</p>",

"xpl_import_ical" =>
"<h3>Instrucciones</h3>
<p>Este formulario sirve para importar un archivo <strong>iCal</strong> con eventos a la agenda del sistema.</p>
<p>El archvo debe seguir las especificaciones [<u><a href='http://tools.ietf.org/html/rfc5545'
target='_blank'>RFC5545 standard</a></u>] de la Internet Engineering Task Force (IETF).</p>
<p>Sólo se importarán los eventos, el resto de elementos del fichero iCal serán ignorados.</p>
<br>
<h6>Ajustes de zona horaria</h6>
<p>Si su archivo iCalendar contiene eventos en una zona horaria diferente y las fechas / horas
deben ajustarse a la zona horaria del calendario, marque 'Ajustes de zona horaria'.</p>
<h6>Tabla de Categorías</h6>
<p>La agenda del sistema usa múmeros únicos o llaves para identificar las categorías. 
Estos números o ID de las categorías deben coincidir en el archivo CSV con los de la agenda 
o estar en blanco.</p>
<p>Si en el campo siguiente desea asignar eventos como 'cumpleaños', el <strong>ID de la
categoría de cumpleaños</strong> debe corresponder con el de la lista de categorías que figura a 
continuación.</p>
<p class='hilite'>Advertencia: ¡No importe más de 100 eventos a la vez!</p>
<p>En el calendario están definidas las siguientes categorías:</p>",

"xpl_export_ical" =>
"<h3>Instrucciones</h3>
<br>
<p>Este formulario sirve para exportar los eventos de la agenda en formato <strong>iCal</strong>
de acuerdo a la especificación [<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 standard</a></u>]
de la Internet Engineering Task Force (IETF).</p>
<p>El <b>nombre del fichero iCal</b> (sin extensión) es opcional. Los ficheros creados serán
almacenados en el directorio \"files/\" del servidor con el nombre especificado, 
o con el nombre of the calendar. La extensión del fichero será <b>.ics</b>. 
Los ficheros existentes en el directorio \"files/\" del servidor serán reemplazados si tienen el 
mismo nombre.</p>
<p>La descripción que se introduce en el formulario es opcional. Si se indica, se añadirá a la 
cabecera del archvo exportado.</p>
<p>Los eventos a exportar pueden ser filtrados por:</p>
<ul>
<li>propietario</li>
<li>categoría</li>
<li>comienzo del evento</li>
<li>fecha de alta/modificación del evento</li>
</ul>
<p>Cada filtro es opcional. La fecha en blanco significa \"Sin límite\"</p>
<p>Al <b>descargar</b> el fichero iCal exportado, se añadirá la fecha y la hora al nombre del fichero.</p>"
);
?>
