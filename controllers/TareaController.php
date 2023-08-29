<?php

namespace Controllers;

use Model\Proyecto;
use Model\Tarea;

class TareaController{
    public static function index(){
        $proyectoId = $_GET['id'];
        if(!$proyectoId) header('Location: /dashboard');
        $proyecto = Proyecto::where('url', $proyectoId);
        session_start();
        if(!$proyecto || $proyecto->propietarioId !== $_SESSION['id']) header('Location: /404');

        $tareas = Tarea::belongsTo('proyectoId', $proyecto->id);

        echo json_encode(['tareas' => $tareas]);
    }

    public static function crear(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            session_start();

            $proyecto = Proyecto::where('url', $_POST['proyectoId']);

            if(!$proyecto || $proyecto->propietarioId !== $_SESSION['id']){
                $respuesta = [
                    'mensaje' => 'Hubo un Error al agregar la tarea',
                    'tipo' => 'error'
                ];
                echo json_encode($respuesta);
            }
            // Todo bien, instanciar y crear la tarea
            $tarea = new Tarea($_POST);
            $tarea->proyectoId = $proyecto->id;
            $resultado = $tarea->guardar();
            $respuesta = [
                'mensaje' => 'Tarea agregada correctamente',
                'tipo' => 'exito',
                'id' => $resultado['id'],
                'resultado' => $resultado['resultado'],
                'proyectoId' => $proyecto->id
            ];
            echo json_encode($respuesta);
            
        }
    }

    public static function actualizar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Validar que el proyecto exista
            $proyecto = Proyecto::where('url', $_POST['proyectoId']);
            session_start();
            if(!$proyecto || $proyecto->propietarioId !== $_SESSION['id']){
                $respuesta = [
                    'mensaje' => 'Hubo un Error al agregar la tarea',
                    'tipo' => 'error'
                ];
                echo json_encode($respuesta);
                return;
            }
            // Instanciar la tarea con el nuevo estado
            $tarea = new Tarea($_POST);
            $tarea->proyectoId = $proyecto->id;
            $resultado = $tarea->guardar();
            if($resultado){
                $respuesta = [
                    'mensaje' => 'Tarea actualizada correctamente',
                    'tipo' => 'exito',
                    'id' => $tarea->id,
                    'proyectoId' => $proyecto->id
                ];
                echo json_encode(['respuesta' => $respuesta]);
            }
        }
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Validar que el proyecto exista
            $proyecto = Proyecto::where('url', $_POST['proyectoId']);
            session_start();
            if(!$proyecto || $proyecto->propietarioId !== $_SESSION['id']){
                $respuesta = [
                    'mensaje' => 'Hubo un Error al agregar la tarea',
                    'tipo' => 'error'
                ];
                echo json_encode($respuesta);
                return;
            }
            // Instanciar la tarea con el nuevo estado
            $tarea = new Tarea($_POST);
            $resultado = $tarea->eliminar();

            if($resultado){
                $respuesta = [
                    'mensaje' => 'Tarea eliminada correctamente',
                    'tipo' => 'exito',
                    'id' => $tarea->id,
                    'proyectoId' => $proyecto->id
                ];
                echo json_encode(['respuesta' => $respuesta]);
            }
        }
    }
}