from Usuario import Usuario
class Invitado(Usuario):
    def acceso_sistema(self):
        return "Acceso Invitado (Solo lectura)"