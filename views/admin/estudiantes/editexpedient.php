<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Editar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4 text-center">Editar Expediente de Estudiante</h2>

    <form action="index.php?action=expedient_alumnos&subaction=update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $student['id'] ?>">

        <h4>Información del Estudiante</h4>
        <div class="row mb-3">
            <div class="col-md-3">
                <label>NIE:</label>
                <input type="text" name="student_nie" value="<?= $student['student_nie'] ?>" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Nombre:</label>
                <input type="text" name="first_name" value="<?= $student['first_name'] ?>" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Apellido:</label>
                <input type="text" name="last_name" value="<?= $student['last_name'] ?>" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Edad:</label>
                <input type="number" name="age" value="<?= $student['age'] ?>" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Dirección:</label>
                <input type="text" name="address" value="<?= $student['address'] ?>" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Grado:</label>
                <input type="text" name="grade" value="<?= $student['grade'] ?>" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Teléfono:</label>
                <input type="text" name="phone" value="<?= $student['phone'] ?>" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label>Viviendo con:</label>
            <input type="text" name="living_with" value="<?= $student['living_with'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Foto actual:</label><br>
            <?php if (!empty($student['photo_img'])): ?>
                <img src="uploads/<?= $student['photo_img'] ?>" width="150" class="mb-2"><br>
            <?php endif; ?>
            <input type="file" name="photo_img" class="form-control">
        </div>

        <hr>
        <h4>Información Académica</h4>
        <div class="row mb-3">
            <div class="col-md-3">
                <label>Número:</label>
                <input type="text" name="number" value="<?= $student['book_data']['number'] ?>" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Libro:</label>
                <input type="text" name="book" value="<?= $student['book_data']['book'] ?>" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Folio:</label>
                <input type="text" name="folio" value="<?= $student['book_data']['folio'] ?>" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Tomo:</label>
                <input type="text" name="tomo" value="<?= $student['book_data']['tomo'] ?>" class="form-control">
            </div>
        </div>

        <hr>
        <h4>Fecha y Lugar de Nacimiento</h4>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Fecha:</label>
                <input type="date" name="date_of_birth" value="<?= $student['date_of_birth'] ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Lugar:</label>
                <input type="text" name="place_of_birth" value="<?= $student['place_of_birth'] ?>" class="form-control">
            </div>
        </div>

        <hr>
        <h4>Información de los Padres</h4>
        <h5>Madre</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Nombre:</label>
                <input type="text" name="mother_name" value="<?= $student['parents']['mother']['name'] ?>" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Trabajo:</label>
                <input type="text" name="mother_workplace" value="<?= $student['parents']['mother']['workplace'] ?>" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Teléfono:</label>
                <input type="text" name="mother_phone" value="<?= $student['parents']['mother']['phone'] ?>" class="form-control">
            </div>
            <div class="col-md-3">
                <label>DUI:</label>
                <input type="text" name="mother_dui" value="<?= $student['parents']['mother']['dui'] ?>" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Estado Civil:</label>
                <input type="text" name="mother_marital_status" value="<?= $student['parents']['mother']['marital_status'] ?>" class="form-control">
            </div>
        </div>

        <h5>Padre</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Nombre:</label>
                <input type="text" name="father_name" value="<?= $student['parents']['father']['name'] ?>" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Trabajo:</label>
                <input type="text" name="father_workplace" value="<?= $student['parents']['father']['workplace'] ?>" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Teléfono:</label>
                <input type="text" name="father_phone" value="<?= $student['parents']['father']['phone'] ?>" class="form-control">
            </div>
            <div class="col-md-3">
                <label>DUI:</label>
                <input type="text" name="father_dui" value="<?= $student['parents']['father']['dui'] ?>" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Estado Civil:</label>
                <input type="text" name="father_marital_status" value="<?= $student['parents']['father']['marital_status'] ?>" class="form-control">
            </div>
        </div>

        <hr>
        <h4>Documentos</h4>
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Certificado Grado Anterior:</label>
                <input type="text" name="previous_grade_certificate" value="<?= $student['documents']['previous_grade_certificate'] ?>" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Certificado de Comportamiento:</label>
                <input type="text" name="behavior_certificate" value="<?= $student['documents']['behavior_certificate'] ?>" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Copia DUI Tutor:</label>
                <input type="text" name="guardian_dui_copy" value="<?= $student['documents']['guardian_dui_copy'] ?>" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Reglamento Financiero:</label>
                <input type="text" name="financial_regulations" value="<?= $student['documents']['financial_regulations'] ?>" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Otros:</label>
                <input type="text" name="other_documents" value="<?= htmlspecialchars($student['documents']['other'] ?? '') ?>" class="form-control">
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="index.php?action=expedient_alumnos" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar Expediente</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
