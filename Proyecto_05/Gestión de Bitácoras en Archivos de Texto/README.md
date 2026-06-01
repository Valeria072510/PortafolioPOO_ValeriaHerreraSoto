# *1. Nombre del proyecto*
Sistema Web de Control y Gestión de Bitácoras Diarias (o SecurityLog-PHP).

# *2. Objetivo del proyecto*
Desarrollar un módulo prototipo web interactivo en PHP y HTML que permita capturar, formatear y almacenar de forma incremental las actividades e incidentes de seguridad en un archivo de texto plano (bitacora.txt), así como recuperar y desplegar todo el historial acumulado en la misma interfaz de usuario.

# *3. Problema que resuelve*
El registro manual en papel de las actividades diarias de un equipo de seguridad suele ser ineficiente, propenso a pérdidas materiales y difícil de centralizar para auditorías rápidas. Este proyecto resuelve dicho problema a través de un "registro digital ligero" que ofrece:

Persistencia sin infraestructura compleja: Elimina la necesidad y dependencia inmediata de configurar sistemas gestores de bases de datos relacionales pesados.

Disponibilidad incremental: Evita la sobreescritura accidental de datos históricos gracias al almacenamiento continuo por adición.

Seguridad de la información: Resuelve la vulnerabilidad de inyección de código malicioso en archivos compartidos mediante filtros de sanitización.

# *4. Tecnologías utilizadas*
Lenguaje de programación (Servidor): PHP 8.x

Lenguaje de marcado (Interfaz): HTML5 y hojas de estilo CSS embebidas para diseño adaptativo.

Sistema de almacenamiento: Ficheros de texto plano estructurado (.txt).

Entorno de ejecución local: Servidor web Apache (vía XAMPP, Laragon o similar).

# *5. Conceptos aplicados (según temario)*
Captura de flujos asíncronos HTTP POST: Recepción segura de variables de formularios a través de la superglobal $_POST evaluando el tipo de método solicitado ($_SERVER["REQUEST_METHOD"]).

Operaciones de E/S en Sistema de Archivos (I/O Files): Manipulación de flujos de almacenamiento con file_put_contents() y lectura completa con file_get_contents().

Banderas de control de escritura: Implementación de constantes nativas compuestas binariamente: FILE_APPEND (modo append para añadir sin borrar) y LOCK_EX (bloqueo exclusivo para prevenir colisiones o corrupción por concurrencia).

Sanitización del lado del Servidor: Aplicación de la función htmlspecialchars() para neutralizar caracteres con semántica de programación y mitigar ataques Cross-Site Scripting (XSS).

Manejo de estados y alertas en UI: Renderizado condicional en bloques HTML dependientes del estado lógico de las variables de control de errores o confirmación ($mensaje_exito / $mensaje_error).

# *6. Instrucciones de ejecución*
Descargar o copiar la carpeta del proyecto (asegúrate de que incluya el archivo index.php).

Colocar la carpeta dentro del directorio htdocs de tu instalación de XAMPP.

Abrir el Panel de Control de XAMPP.

Iniciar el servicio del servidor web Apache.

Abrir tu navegador web preferido.

Escribir la dirección local en la barra de navegación:
127.0.0.1
Capturar los datos solicitados en el formulario (Fecha, Responsable y la Descripción).

Presionar el botón "Guardar en Bitácora" para procesar el envío.

Visualizar los resultados generados de forma ordenada en la sección de "Historial General".

# *7. Reflexión personal*
¿Qué aprendí?
Aprendí a gestionar la persistencia de datos en aplicaciones web utilizando únicamente archivos físicos de texto sin depender de SQL. Comprendí la importancia de controlar los accesos de escritura simultáneos mediante bloqueos exclusivos (LOCK_EX) y a presentar los textos planos respetando fielmente los saltos de línea de la máquina mediante la combinación de la constante PHP_EOL y la etiqueta HTML <pre>.

¿Qué fue difícil?
La mayor dificultad radicó en estructurar las validaciones del servidor de modo que no se generaran registros huérfanos o con líneas en blanco si el usuario intentaba evadir los campos requeridos en el Frontend. También requirió atención coordinar la sanitización de datos para que los formatos visuales no se rompieran al concatenar las strings del reporte.

¿Qué mejoraría?
Para una futura actualización, implementaría una función de búsqueda o filtrado por fechas utilizando PHP para permitirle al administrador buscar un incidente en particular sin tener que leer toda la bitácora de texto. Asimismo, agregaría una opción para descargar directamente una copia de respaldo del archivo bitacora.txt desde la misma página web.
