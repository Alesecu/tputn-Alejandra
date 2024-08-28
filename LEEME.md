#################### ENTREGA TP 1 DOCKER ###################################

## En este directorio encontrarás todos los componentes para deployar 2 contenedores Nginx y PHP

## Escogí estás tecnologías porque son las herramientas con las que actualmente trabajo, desde una posición muy Junior

## Consiste en la integración de un formulario de registro realizado en HTML, que tiene como backend un PHP quién se encarga de responderle al usuario 
## envíandole un correo electrónico de bienvenida, el formulario pide NOMBRE, APELLIDO Y CORREO, al clickear en ENVIAR te llegará el correo electrónico
## a tu casilla, en caso de no colocar un correo correcto muestra un output de FILE NOT FOUND. 
## Use un servidor SMTP gratuito (MAILERSEND) del que no sabría cuánto tiempo quedaría libre

## Cada contenedor tiene su Dockerfile en una carpeta que lo identifica por tecnología php-fpm y Nginx, para PHP tuve que agregar en el Dockerfile la instalación de composer y la librería PHPmailer/PHPmailer, que descubrí en el trabajo por mera casualidad
## para acceder solo debes colocar "localhost" en tu buscador y debería aparecer el muy humilde y básico formulario 
