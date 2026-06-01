from Usuario import Usuario
class Admin(Usuario):
    def __init__(self, nombre, email, nivel_acceso):
        super().__init__(nombre, email)
        self.nivel_acceso = nivel_acceso
    def acceso_sistema(self):
        return f"Acceso Administrador (Nivel {self.nivel_acceso})"