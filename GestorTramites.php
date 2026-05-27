<?php

class GestorTramites {
    private $archivo = 'db_tramites.json';

    public function leerDatos() {
        if (!file_exists($this->archivo)) {
            return [
                "tramites_inscripcion" => [],
                "tramites_certificados" => []
            ];
        }
        
        $jsonString = file_get_contents($this->archivo);
        return json_decode($jsonString, true);
    }

    private function guardarDatos($datos) {
        $jsonString = json_encode($datos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($this->archivo, $jsonString);
    }

    // SECCIÓN A: MÉTODOS PARA EMISIÓN DE CERTIFICADOS
    public function registrarCertificado($nuevoTramite) {
        $datos = $this->leerDatos();
        $datos["tramites_certificados"][] = $nuevoTramite;
        $this->guardarDatos($datos);
    }

    public function actualizarEstadoCertificado($idTramite, $nuevoEstado) {
        $datos = $this->leerDatos();
        foreach ($datos["tramites_certificados"] as $index => $tramite) {
            if ($tramite["id_tramite"] === $idTramite) {
                $datos["tramites_certificados"][$index]["estado"] = $nuevoEstado;
                break;
            }
        }
        $this->guardarDatos($datos);
    }

    // SECCIÓN B: MÉTODOS PARA INSCRIPCIÓN DE MATERIAS
    public function registrarInscripcion($nuevoTramite) {
        $datos = $this->leerDatos();
        $datos["tramites_inscripcion"][] = $nuevoTramite;
        $this->guardarDatos($datos);
    }

    public function actualizarEstadoInscripcion($idTramite, $nuevoEstado) {
        $datos = $this->leerDatos();
        foreach ($datos["tramites_inscripcion"] as $index => $tramite) {
            if ($tramite["id_tramite"] === $idTramite) {
                $datos["tramites_inscripcion"][$index]["estado"] = $nuevoEstado;
                break;
            }
        }
        $this->guardarDatos($datos);
    }

    public function actualizarMateriasInscripcion($idTramite, $nuevasMaterias) {
        $datos = $this->leerDatos();
        
        foreach ($datos["tramites_inscripcion"] as $index => $tramite) {
            if ($tramite["id_tramite"] === $idTramite) {
                // Reemplazamos la lista vieja de materias por la nueva
                $datos["tramites_inscripcion"][$index]["materias_solicitadas"] = $nuevasMaterias;
                break;
            }
        }
        
        $this->guardarDatos($datos);
    }
}
?>