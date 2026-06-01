# 1. Nombre del proyecto
Sistema de Gestión y Control de Acceso de Usuarios en Consola (o UserAuth-POO Python).

# 2. Objetivo del proyecto
Desarrollar una aplicación de consola en Python que permita registrar, categorizar y gestionar diferentes tipos de usuarios (Administradores, Clientes e Invitados), demostrando de manera práctica la implementación de arquitecturas limpias mediante la Programación Orientada a Objetos (POO) y la validación de datos mediante expresiones regulares.

# 3. Problema que resuelve
En el desarrollo de software, gestionar la lógica de diferentes perfiles de usuario de forma centralizada suele generar código repetitivo y difícil de mantener. Este proyecto resuelve ese problema mediante:

Centralización y modularidad: Evita la duplicación de código compartiendo atributos base como el nombre y el email.

Integridad de datos: Resuelve el problema de registros con correos electrónicos falsos o mal escritos gracias a un validador automatizado basado en expresiones regulares.

Control de permisos: Define comportamientos específicos de acceso para cada rol sin necesidad de llenar el código de condicionales anidados (if/else masivos).

# 4. Tecnologías utilizadas
Lenguaje de programación: Python 3.x

Módulos estándar: re (Regular Expressions) para la validación del correo electrónico.

Paradigma principal: Programación Orientada a Objetos (POO).

# 5. Conceptos aplicados (según temario)
Clases y Objetos: Creación del molde base (Usuario) y la instanciación de objetos específicos (Admin, Cliente, Invitado).

Encapsulamiento y Validación: Uso del método validar_email dentro del constructor para proteger la integridad del estado del objeto.

Herencia: Las clases Admin, Cliente e Invitado heredan atributos y métodos de la clase madre Usuario, reutilizando código (como saludar() y mostrar_datos()).

Polimorfismo: El método acceso_sistema() se comporta de manera diferente en cada clase hija. Al recorrer la lista en main.py, se ejecuta la versión del método que corresponde al tipo de objeto actual de forma dinámica.

Modularidad: Separación del código en múltiples archivos (.py) para mejorar la organización y la mantenibilidad del sistema.


# 6. Instrucciones de ejecución
Descargar o copiar la carpeta del proyecto.

Colocar la carpeta en una ubicación accesible de tu equipo (por ejemplo, el Escritorio o Documentos).

Abrir la terminal de comandos (CMD, PowerShell o Terminal de VS Code).

Navegar hasta la carpeta del proyecto usando el comando cd.

Iniciar la aplicación ejecutando el comando:

Bash
python main.py
Seleccionar una opción del menú numérico en la consola.

Capturar los datos solicitados (Nombre, Email, etc.).

Visualizar los resultados y el comportamiento polimórfico generados por el sistema.

# 7. Reflexión personal
¿Qué aprendí?
Aprendí a estructurar un proyecto real dividiéndolo en módulos independientes en Python. Logré asimilar cómo el polimorfismo permite que un mismo método (acceso_sistema) devuelva resultados completamente distintos dependiendo del objeto que lo invoque, lo cual limpia mucho el código en el archivo principal. También reforcé el uso de expresiones regulares para sanitizar entradas de datos.

¿Qué fue difícil?
Al principio, coordinar correctamente las importaciones entre archivos (from Usuario import Usuario) y asegurarme de que super().__init__() pasara los parámetros correctos a la clase padre en el orden adecuado requirió de bastante atención para evitar errores de tipo AttributeError o fallos en la herencia.

¿Qué mejoraría?
Para una versión posterior, mejoraría la persistencia de datos guardando los usuarios en un archivo JSON o en una base de datos, ya que actualmente la lista de usuarios se borra al cerrar el programa. También añadiría bloques de manejo de excepciones (try/except) para evitar que el programa falle si el usuario introduce letras en opciones puramente numéricas.
