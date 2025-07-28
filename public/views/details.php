<?php
require_once '../../app/classes/VehicleManager.php';

$vehicleManager = new VehicleManager("", "", "", "", "", "");
$id = $_GET['id'] ?? null;
if ($id == null) {
    header("Location: ../index.php");
    exit;
}

$vehicles = $vehicleManager->getVehicles();
$vehicle = $vehicles[$id] ?? null;
if (!$vehicle) {
    header("Location: ../index.php");
    exit;
}

include './header.php';
?>

<div class="container my-5">
    <div class="card mx-auto shadow" style="max-width: 600px;">
        <img src="<?= $vehicle['image'] ?>" class="card-img-top" style="height: 300px; object-fit: cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
        
        <div class="card-body">
            <h3 class="card-title"><?= $vehicle['name'] ?></h3>
            <p class="card-text">
                <strong>Type:</strong> <?= $vehicle['type'] ?><br>
                <strong>Price:</strong> $<?= number_format($vehicle['price'], 2) ?>
            </p>
            <a href="../index.php" class="btn btn-outline-primary">Back to Listing</a>
        </div>
    </div>
</div>

</body>
</html>
