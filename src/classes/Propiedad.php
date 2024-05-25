<?php

namespace App;

class Propiedad
{
  // BASE DE DATOS

  protected static $db;
  protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'wc', 'habitaciones', 'estacionamiento', 'creado', 'vendedores_id'];

  //Validación
  protected static $errores = [];


  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $wc;
  public $habitaciones;
  public $estacionamiento;
  public $creado;
  public $vendedores_id;
  /* definir la conexión a la bd */
  public static function setDB($database) //Nota se está seteando desde app.php
  {
    self::$db = $database;
  }


  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? null;
    $this->descripcion = $args['descripcion'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->creado = date('Y-m-d');
    $this->vendedores_id = $args['vendedores_id'] ?? '';
  }


  /* Nota Comienza el CRUD*/

  //** Consulta propiedades **//

  //** GET **//
  public static function all(): array
  {
    $query = "SELECT * FROM propiedades";
    $resultado = self::consultarSQL($query);
    return $resultado;
  }
  public static function find($id): object
  {
    $query = "SELECT * FROM propiedades WHERE id = {$id}";
    $resultado = self::consultarSQL($query);
    return array_shift($resultado);
  }

  //** Crea propiedades **//

  //** CREATE **//

  public function guardar()
  {
    if (isset($this->id)) {
      return $this->actualizar();
    } else {
      return $this->crear();
    }
  }




  public function crear(): bool
  {
    $atributosSanitizados = $this->santizarDatos();

    /*     $stringColumns = join(', ', array_keys($atributosSanitizados));
    $stringData = join(', ', array_values($atributosSanitizados)); */
    //Insertar
    $query = "INSERT INTO propiedades (";
    $query .= join(', ', array_keys($atributosSanitizados));
    $query .= ") VALUES ('";
    $query .= join("', '", array_values($atributosSanitizados));
    $query .= "')";


    $resultado = self::$db->query($query);

    return $resultado;
  }

  //** Update propiedades **//

  //** Update **//

  public function actualizar(): bool
  {
    $atributosSanitizados = $this->santizarDatos();
    $valoresConsulta = [];
    foreach ($atributosSanitizados as $key => $value) {
      $valoresConsulta[] = "$key='{$value}'";
    }
    $query = "UPDATE propiedades SET ";
    $query .= join(', ', $valoresConsulta);
    $query .= " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
    $resultado = self::$db->query($query);
    return $resultado;
  }

  //** Delete propiedades **//

  //** DELETE **//

  public function delete()
  {
    $query = "DELETE FROM propiedades WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
    $resultado = self::$db->query($query);
    if ($resultado) {
      $this->eliminarImagen();
      return 3; //Devuelvo 3 por que es el indicado para el mensaje se sucess
    }
  }



  public function prepararAtributos(): array
  {
    $atributosPreparados = [];
    foreach (self::$columnasDB as $columna) {
      if ($columna === 'id') continue;
      $atributosPreparados[$columna] = $this->$columna;
    }
    return $atributosPreparados;
  }

  public function santizarDatos(): array
  {
    $atributos = $this->prepararAtributos();
    $atributosSanitizados = [];
    foreach ($atributos as $atributo => $valor) {
      $atributosSanitizados[$atributo] = self::$db->escape_string($valor);
    }
    return $atributosSanitizados;
  }

  public function setImagen($imagen)
  {
    //Busca si existe id es que estamos actualizando, si no, no hace nada (crear), entonces solo entra en actualizar.
    if (isset($this->id)) {
      $this->eliminarImagen();
    }
    if ($imagen) {
      //asignar al atributo de la imagen el nombre de la imagen
      $this->imagen = $imagen;
    }
  }

  public function eliminarImagen()
  {
    $existeImagenAnterior = file_exists(__DIR__ . '../../imagenes/' . $this->imagen); //Busca el archivo fisico de la imagen anterior, si existe lo elimina, puede que no haya tenido imagenen, entonces no eliminaría nada.
    if ($existeImagenAnterior) {
      unlink(__DIR__ . '../../imagenes/' . $this->imagen);
    }
  }


  //Validación

  public static function getErrores(): array
  {
    return self::$errores;
  }

  public function validar(): array
  {
    if (!$this->titulo) {
      self::$errores[] = 'Debes añadir un titulo';
    }

    if (!$this->precio) {
      self::$errores[] = 'Debes añadir un precio';
    }

    if (!$this->imagen) {
      self::$errores[] = 'Debes añadir una imagen';
    }

    if (strlen($this->descripcion) < 50) {
      self::$errores[] = 'La descripción es demasiado corta';
    }

    if (!$this->habitaciones) {
      self::$errores[] = 'Debes añadir un numero de habitaciones';
    }

    if (!$this->wc) {
      self::$errores[] = 'Debes añadir un numero de banos';
    }

    if (!$this->estacionamiento) {
      self::$errores[] = 'Debes añadir un numero de estacionamiento';
    }

    if (!$this->vendedores_id) {
      self::$errores[] = 'Debes añadir un vendedor';
    }
    return self::$errores; //NOTA Devuelve los errores IMPORTANTE
  }




  public static function consultarSQL($query): array
  {
    //CONSULTAR LA BASE DE DATOS
    $resultado = self::$db->query($query);
    //ITERAR LA BASE DE DATOS
    $array = [];

    while ($registro = $resultado->fetch_assoc()) {
      # code...
      $array[] = self::crearObjeto($registro);
    }

    //LIBERAR LA MEMORIA
    $resultado->free();

    //RETORNAR LOS RESULTADOS
    return $array;
  }

  protected static function crearObjeto($registro): object
  {
    $objeto = new self; //Nuevo objeto de si mismo

    //**Si recorremos $registro y le extraemos su $key y $value, si dentro de el objeto EXITE la clave, entonces, añadele el contenido que viene desde el registro */
    foreach ($registro as $key => $value) {
      if (property_exists($objeto, $key)) {
        $objeto->$key = $value;
      }
    }
    return $objeto;
  }

  public function sincronizar($args = [])
  {
    foreach ($args as $key => $value) {
      if (property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }
}
