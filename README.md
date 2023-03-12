Gobierno-Digital

Sergio Israel Avila Suárez

Liga del repo:
https://github.com/siavila/Gobierno-Digital.git

Configuracion de la base de datos
----------------------------------
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gobierno_digital
DB_USERNAME=root
DB_PASSWORD=

Ejecutar el comando: composer install

Migraciones:

php artisan migrate:fresh --seed

Con respecto a los usuarios y las migraciones, realice lo siguiente:

Credenciales de adminitrador:
	email: admin@a.a
	pass: password

Todos los demas usario tienen como pass:1


Users: 
- Se ingresaron los 15 usuarios solicitados
- Al primer usuario insertado se le asigno el rol de Administrador.

- Todos los demás usuarios se crearán con el rol de usuario.

Roles
- Se crearon los dos roles solicitados:

Roles_user
- Se insertan en la tabla las relaciones desde las migraciones para los primeros 15 usuarios.
- Siguiendo la lógica de administrador único, el primer usuario es el administrador a todos los demás los inserto como usuarios normales.


El CRUD

El usuario administrador puede realizar todas las operaciones del CRUD.
El usuario normal solamente puede ver el listado de usuarios y el detalle de cada uno.


JWT

Agregue la librería al proyecto, e hice algunas pruebas con el postman, dejo las siguientes rutas:

http://127.0.0.1:8000/api/auth/register
http://127.0.0.1:8000/api/auth/login
http://127.0.0.1:8000/api/auth/me
http://127.0.0.1:8000/api/auth/logout

con las cules se comprueba el correcto funcionamiento.

Al final regrese a la autentificacion original en el archivo /config/auth.php

    'defaults' => [
        'guard' => 'web',
        //'guard' => 'api',
        'passwords' => 'users',
    ],

 ya que me causo conflicto al intentar ingresar en el login
Gobierno-Digital

Sergio Israel Avila Suárez

Liga del repo:
https://github.com/siavila/Gobierno-Digital.git

Configuracion de la base de datos
----------------------------------
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gobierno_digital
DB_USERNAME=root
DB_PASSWORD=

Ejecutar el comando: composer install

Migraciones:

php artisan migrate:fresh --seed

Con respecto a los usuarios y las migraciones, realice lo siguiente:

Credenciales de adminitrador:
	email: admin@a.a
	pass: password

Todos los demas usario tienen como pass:1


Users: 
- Se ingresaron los 15 usuarios solicitados
- Al primer usuario insertado se le asigno el rol de Administrador.

- Todos los demás usuarios se crearán con el rol de usuario.

Roles
- Se crearon los dos roles solicitados:

Roles_user
- Se insertan en la tabla las relaciones desde las migraciones para los primeros 15 usuarios.
- Siguiendo la lógica de administrador único, el primer usuario es el administrador a todos los demás los inserto como usuarios normales.


El CRUD

El usuario administrador puede realizar todas las operaciones del CRUD.
El usuario normal solamente puede ver el listado de usuarios y el detalle de cada uno.


JWT

Agregue la librería al proyecto, e hice algunas pruebas con el postman, dejo las siguientes rutas:

http://127.0.0.1:8000/api/auth/register
http://127.0.0.1:8000/api/auth/login
http://127.0.0.1:8000/api/auth/me
http://127.0.0.1:8000/api/auth/logout

con las cules se comprueba el correcto funcionamiento.

Al final regrese a la autentificacion original en el archivo /config/auth.php

    'defaults' => [
        'guard' => 'web',
        //'guard' => 'api',
        'passwords' => 'users',
    ],

 ya que me causo conflicto al intentar ingresar en el login
