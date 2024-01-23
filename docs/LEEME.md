# Applicants

Sistema de Solicitud de contratación.

Este documento esta dividido en dos grandes secciones, la seccion funcional 
generalizada, y la seccion principal tecnica de el proyecto al final del mismo.

![](applicantsview.png)

## Acerca de este sistema

Esta es una app de **solicitud de reclutamiento simple**

## Resumen Ejecutivo

En el siguiente documento se presenta la ideafundamental del aplicativo, los 
requerimientos y limitaciones funcionales relacionados con el proyecto Applicants.

Este documento no es la idea final es solo un abreboca de lo que pretende el 
sistema, **resume solo idea base de lo que es, su detalle esta en el desarrollo 
del mismo, el sistema es auto explicativo pero se proveera una ayuda**.

- 20230929: Angel Gonzalez, Creación del documento, desarrollador principal de la idea
- 20231205: Lenz Gerardo, Reinicio del proyecto con nuevos desarrolladores mas responsables
- 20240110: inicio de nuevo codigo con desarrollador nuevo Diaz Victor y Tyrone Lucero
- 20240117: pantallas de interfaces diseñadas por Diaz Victor

## Introducción y descripcion de la idea

#### Propósito

El sistema Applicants, es un portal para aplicar a puestos de trabajo, compuesto 
por un panel estilo Twitter multiple, donde el usuario aplica a el empleo ofrecido, 
y un panel administrativo donde se revisa o postula las oportunidades de empleo.

En una segunda fase el sistema presenta un historico de los postulados y de los 
puestos de trabajo los cuales tienen un nivel de categoria y un nivel de clasificacion 
departamental

#### Alcance

* Solo ordenar postulants respecto las vacantes y vacantes respecto los postulantes.
* Registro simple, no hay direcciones ni paises, solo datos inmutables.
* Vacantes simples, solo datos inmutables de las mismas, titulo, descripcion, tags.
* Se guarda y cuenta desde el registro de el postulado, no dependiendo de la fecha.
* Los usuarios pueden aplicar temporal o fijos, en el segundo se pide registro.

#### Justificación del requerimiento

La dirección de reclutamiento requirió una mejor herramienta de trabajo. Recopilar 
y organizar la data para así tener histórico y organización. El correo nuevo no 
ofrece a la gerencia de reclutamiento una herramienta cómoda ni ágil de trabajo 
actualmente, como lo era el antiguo correo intranet. No existia medios de ordenar 
los correos de postulantes ni clasificacion de las publicaciones.

#### Descripción Funcional del requerimiento

1. Simple interfaz de aplicación al puesto de trabajo ofrecido.
    - Ofrecer los puestos en listado, en un aplicativo de acceso publico
    - Al aplicar cada postulante ingresa sus datos:
        - mínimos personales (numero de identificacion),
        - numero de cuenta (numero bancario), 
        - tipo de postulacion (temporal o puesto fijo)
2. Simple interfaz que clasifique los postulantes
    - Permitir filtrado por el sistema de registros históricos (“criminal”)
    - Interfaz administrativa para manejar las oportunidades de empleo

#### Registro implicito

El usuario solo ingresa clave/registro si se postula para vacantes de puestos 
permanentes o fijos, si el puesto es temporal solo necesita el numero de cuenta 
y su numero de identificacion legal.

El usuario ingresa usuario y clave solo en su perfil ya que el sistema emplea 
el primer intento de postulacion como usuario, sino le pide rectificar.

#### Interfaz de postulacion

Es realmente la interfaz por defecto, y la cara del aplicativo, el despliegue 
y el index muestra directamente las opciones de vacantes, en recuadros de 3:4 
de proporcion o 16:9 de proporcion, distribuyendose en al menos dos columnas 
en escritorio y una columna en mobil, pero dado el contenido deberia ser maximo 
tres columnas; la cantidad de filas es dinamica estilo twitter.

![](applicantsview.png)

![](applicantslist.png)

El postulante o cualquier usuario registrado o no, puede ingresar, escoger y 
postularse, sin ingresar autenticacion alguna, esta se requerira segun la 
vacante escogida.

Al seleccionar cualquiera de los cuadros de vacantes se presentara una pantalla 
de detalle: en la parte superior el titulo completo, en segunda linea la empresa, 
en la parte central descripcion y detalle de la postulacion vacante incluyendo la 
direccion, y al final en forma de tags las palabras de cada categoria, clasificacion
o departamento al que aplica, pero solo aquel que este registrado en la plataforma 
se le permitira optar por los postulados para puestos fijos.

Al seleccionar una vacante, escoge y aplica, pero solo ingresa sus datos si no 
lo ha realizado previamente (registro implicito), en caso contrario solo se le 
pedira el numero de identificacion o cedula y el numero de cuenta tal cual describe 
el registro implicito; por lo cual si la vacante es fija para puesto fijo se le 
notificara que debe primero completar el perfil para estar registrado.

Si se postulase para una vacante no fija (temporal) con solo tener identificacion 
legal y cuenta bancaria seria suficiente.

#### Interfaz de administracion

Si el usuario del registro implicito es un usuario clasificado, es decir es un 
usuario administrativo de la plataforma, en su perfil se le mostrara (aparte de los 
campos de perfil de usuario) dos campos mas, uno de clave de api, y otra para la 
clave de usuario, el cual corroborara si es el usuario real, asi accediendo a la 
interfaz de administracion. Si el usuario no es uno clasificado, entonces solo mostrara 
un unico campo extra, el de clave de usuario el cual es opcional tal como se indica 
en la seccion segunda anterior de interfaz de postulacion.

Al salvar el perfil o los datos del perfil si los campos de clave y api estan llenos 
el usuario podra postular nuevas vacantes de empleo. La gestion de crear la clave y 
el apy key no estan dentro del proyecto, son parte externa y se definen externamente, 
el sistema solo lee y corrobora que los datos se cumplan.

La pantalla de revision estara implicita en la pantalla de detalles, es decir, 
mientras que en la interfaz de postulacion, el detalle de cada vacante muestra 
solo la opcion de postularse, en la pantalla de administracion al seleccionar una vacante 
esta en vez de mostrar la opcion de postulacion mostrara en la parte baja la lista 
de postulantes que otarion por participar en dicha vacante de empleo.

**IMPORTANTE**: aqui a diferencia de la interfaz de psotulacion este detalle en 
la segunda linea muestra el nombre pero tambien el rif de la empresa.

## Situacion

El sistema se comenzó en el mes de Julio, y se entrego la fase 1 en agosto, sin 
embargo la respuesta fue algo fría ya que se requirió accesos y artefactos de 
trabajo para la fase segunda los cuales a la fecha de hoy no están. De hecho no 
se recibió un servidor donde desplegar.

Las razones del fracaso inicial fue haber escogido RUBY+RAILS, la tecnologia 
fuerza el uso de dominos, lo que implica que se require un servicio dedicado, 
no pudiendose desplegar casi en ningun lado sino es especializado.

Otra razon del fracaso es el uso de reflex en la pantalla inicial que una vez mas 
implica el uso de dominios, haciendo mas complicado esto, con un bug presente:
https://github.com/stimulusreflex/stimulus_reflex/issues/666 al no ejecutarse 
nada bien y requerir entendimiento no claro.

Todas estas conllevaron a realizar enteramente desde cero el sistema en el mas facil 
framework de todos los tiempos: codeigniter.

## Control de cambios

```
git whatchanged docs/README.md

Author: mckaygerhard <mckaygerhard@gmail.com>
Date:   Thu Jan 18 17:13:15 2024 -0400

    update information and pictures to new victor desing

:100644 100644 44f70a4 76795db M        docs/README.md

commit f6b7b215b33c092d63be727b128a985e87706673
Author: mckaygerhard <mckaygerhard@gmail.com>
Date:   Wed Jan 17 16:53:56 2024 -0400

    initial documentation, project will be modeled in english as primary lang

:000000 100644 0000000 65d9943 A        docs/README.md

```

# Descripcion tecnica

La aplicación emplea una base de datos para un almacenamiento mínimo de datos; 
internamente, permite a los participantes cargar información y almacenarla hasta 
que un administrador la vea.

Easyle, una vez desplegado, el futuro empleado simplemente ingresa, verifica 
una lista rápida de vacantes, luego haga clic o toque uno y presione el botón postular, 
complete los campos con datos personales no sensibles, y luego esperar respuesta 
basada en dichos datos.

En el lado del administrador, simplemente consulte la lista de personas que ya 
completan dicha información y marque cuáles son útil para trabajar o no, luego 
puede omitir los datos y crear nuevas vacantes.

Si desea instalar e implementar para probar/usar esta aplicación, lea directamente [DEPLOY-INSTALL.md](DEPLOY-INSTALL.md)

Si desea desarrollar/mejorar y contribuir a la aplicación, lea directamente [DEVELOPMENT.md](DEVELOPMENT.md)

## Diccionario de base de datos

Se puede encontrar en el archivo [applicantsdb.sql](applicantsdb.sql)
pero puedes encontrar un diseño mínimo de Workbench [applicantsdb.mwb](applicantsdb.mwb)

![](applicantsdb.png)

# LICENCIA

CC-BY-NC-SA [..]()

