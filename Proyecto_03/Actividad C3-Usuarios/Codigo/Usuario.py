import re

class Usuario:
    def __init__(self, nombre, email):
        self.nombre = nombre
        if self.validar_email(email):
            self.email = email
        else:
            self.email = "email_invalido@dominio.com"

    def validar_email(self, email):
        patron = r'^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$'
        return re.match(patron, email) is not None

    def mostrar_datos(self):
        print(f"Nombre: {self.nombre} | Email: {self.email}")

    def acceso_sistema(self):
        pass

    def saludar(self):
        print(f"Hola, mi nombre es {self.nombre}")