from admin import Admin
from cliente import Cliente
from invitado import Invitado

lista_usuarios = []

def menu():
    while True:
        print("\n--- SISTEMA DE USUARIOS ---")
        print("1. Agregar Admin\n2. Agregar Cliente\n3. Agregar Invitado\n4. Listar Usuarios\n5. Salir")
        opcion = input("Selecciona una opción: ")
        
        if opcion == "5": break
        
        if opcion in ["1", "2", "3"]:
            nombre = input("Nombre: ")
            email = input("Email: ")
            if opcion == "1": lista_usuarios.append(Admin(nombre, email, 5))
            elif opcion == "2": lista_usuarios.append(Cliente(nombre, email, 100))
            else: lista_usuarios.append(Invitado(nombre, email))
            print("Usuario agregado.")
            
        elif opcion == "4":
            # Demostración de Polimorfismo
            for u in lista_usuarios:
                u.saludar()
                u.mostrar_datos()
                print(f"Permiso: {u.acceso_sistema()}")
                print("-" * 20)

if __name__ == "__main__":
    menu()