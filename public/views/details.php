<?php
require_once '../../app/Classes/VehicleManager.php';

$vehicleManager = new VehicleManager("", "", "", "", "", "");
$id = $_GET['id'] ?? null;
if (!$id) {
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

<div class="container my-4">
    <h1>Vehicle Details</h1>
    <div class="card mb-4" style="max-width: 800px;">
        <div class="row g-0">
            <?php if (!empty($vehicle['image'])): ?>
            <div class="col-md-4">
                <img src="<?= htmlspecialchars($vehicle['image']) ?>" class="img-fluid rounded-start" alt="<?= htmlspecialchars($vehicle['name']) ?>">
            </div>
            <?php endif; ?>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title"><?= htmlspecialchars($vehicle['name']) ?></h3>
                    <p class="card-text"><strong>Type:</strong> <?= htmlspecialchars($vehicle['type']) ?></p>
                    <p class="card-text"><strong>Price:</strong> <?= htmlspecialchars($vehicle['price']) ?></p>
                    <?php if (!empty($vehicle['description'] ?? '')): ?>
                        <p class="card-text"><strong>Description:</strong> <?= nl2br(htmlspecialchars($vehicle['description'])) ?></p>
                    <?php endif; ?>
                    <a href="../index.php" class="btn btn-secondary">Back to list</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
