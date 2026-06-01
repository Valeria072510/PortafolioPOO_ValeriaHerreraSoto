
1. Nombre del proyecto
Sistema Web de Gestión y Análisis Estadístico de Inventario (o InventoryStats-PHP).

2. Objetivo del proyecto
Desarrollar una aplicación web interactiva utilizando PHP y HTML para capturar de manera masiva los datos de múltiples productos, procesar dicha información a través de arreglos paralelos unidimensionales, y devolver un reporte detallado con cálculos estadísticos de los precios.

3. Problema que resuelve
El control manual de inventarios pequeños en una tienda suele ser ineficiente y propenso a errores de cálculo. Este proyecto resuelve este problema mediante:

Automatización del procesamiento: Elimina la necesidad de calcular manualmente totales o promedios matemáticos.

Búsqueda inteligente automatizada: Identifica de manera exacta e inmediata los valores extremos (productos con el precio más alto y más bajo), optimizando la toma de decisiones comerciales.

Persistencia temporal en transferencia: Estructura de forma ordenada las entradas asíncronas de un formulario en arreglos paralelos correlacionados por su índice.

4. Tecnologías utilizadas
Lenguaje de programación (Servidor): PHP 8.x

Lenguaje de marcado (Interfaz): HTML5 y hojas de estilo CSS integradas

Entorno de ejecución local sugerido: XAMPP, WampServer o Laragon (con Servidor Apache)

5. Conceptos aplicados (según temario)
Envío y captura de datos por métodos HTTP: Uso del método POST y variables superglobales ($_SERVER["REQUEST_METHOD"], $_POST) para transferir datos de forma segura entre el cliente y el servidor.

Estructuras de control repetitivas (Bucles): Empleo de ciclos for tanto para renderizar dinámicamente campos del formulario en la vista, como para iterar y listar los elementos guardados.

Arreglos Paralelos Unidimensionales: Almacenamiento secuencial donde el elemento en la posición i del arreglo $productos se corresponde directamente con la posición i del arreglo $precios.

Funciones nativas de ordenamiento y búsqueda en PHP: Implementación de algoritmos eficientes del lenguaje como array_sum() (suma), count() (conteo), max() / min() (valores extremos) y array_search() (búsqueda de índices).

Sanitización y formateo de datos: Uso de htmlspecialchars() para mitigar vulnerabilidades Cross-Site Scripting (XSS) y number_format() para dar salida visual con formato de moneda.

6. Instrucciones de ejecución
Descargar o copiar la carpeta del proyecto.

Colocar la carpeta dentro de la carpeta htdocs de XAMPP.

Abrir el Panel de Control de XAMPP.

Iniciar el servicio Apache.

Abrir un navegador web.

Escribir la dirección:

127.0.0.1
Capturar los datos solicitados (Nombres y precios de los productos).

Presionar el botón para calcular ("Procesar Inventario").

Visualizar los resultados generados por el sistema.

7. Reflexión personal
¿Qué aprendí?
Aprendí a correlacionar datos usando arreglos paralelos unidimensionales, entendiendo cómo un índice numérico compartido puede vincular información de distinta naturaleza (un texto con un número flotante). También reforcé la lógica de transferencia de arreglos nativos desde formularios HTML agregando corchetes ([]) al atributo name.

¿Qué fue difícil?
Lo que me resultó más complejo fue estructurar la lógica para determinar los productos más caros o baratos. No bastaba solo con hallar el precio máximo usando max(); el reto estuvo en entender que debía capturar el índice de ese valor con array_search() para poder ir al arreglo de nombres y extraer el texto correcto que correspondiera a ese precio.

¿Qué mejoraría?
Para una futura versión, cambiaría el tamaño estático de 5 productos por un control dinámico mediante JavaScript que le permita al usuario agregar o quitar filas en el formulario según sus necesidades antes de procesar. También añadiría validaciones en el servidor para asegurar que los precios no sean negativos.
