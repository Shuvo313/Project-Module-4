<?php

require_once 'VehicleBase.php';
require_once 'VehicleActions.php';
require_once 'FileHandler.php';

class VehicleManager extends VehicleBase implements VehicleActions {
    use FileHandler;

    public function addVehicle($data) {
       $vehicles = $this->readFile();
       $vehicles[] = $data;
       $this->writeFile($vehicles);
    }

    public function editVehicle($id, $data) {
        $vehicles = $this->readFile();
        if (isset($vehicles[$id])) {
            $vehicles[$id] = $data;
            $this->writeFile($vehicles);
        }
    
    }

    public function deleteVehicle($id) {
        $vehicles = $this->readFile();
        if (isset($vehicles[$id])) {
            unset($vehicles[$id]);
            $this->writeFile(array_values($vehicles)); // Re-index the array
        }
        
    }

    public function getVehicles() {
        return $this->readFile();
       
    }

    // Implement abstract method
    public function getDetails($id) {
    $vehicles = $this->readFile();

    if (isset($vehicles[$id])) {
        return $vehicles[$id];
    }

    // Optionally, you could log this or handle it gracefully
    return null;
}
}
