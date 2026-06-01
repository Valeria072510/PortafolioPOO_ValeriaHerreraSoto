from Usuario import Usuario
class Cliente(Usuario):
    def __init__(self, nombre, email, puntos):
        super().__init__(nombre, email)
        self.puntos = puntos
    def acceso_sistema(self):
        return f"Acceso Cliente (Puntos: {self.puntos})"