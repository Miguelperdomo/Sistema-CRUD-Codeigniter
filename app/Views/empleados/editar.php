<?php echo $this->extend('plantilla');?>

<i class="bi bi-person-add"></i>
<?= $this->section('contenido'); ?>

<h3 class="my-3">Modificar empleado</h3>

<?php 
    if (session()->getFlashdata('error')  !== null ) { ?>

    <div class="alert alert-danger">
        <?= session()->getFlashdata('error');  ?>

    </div>
<?php } ?>

            <form action="<?= base_url('empleados/'. $empleado['id']) ?>" class="row g-3" method="post" autocomplete="off">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="empleado_id" value="<?= $empleado['id']; ?>">
 
                <div class="col-md-4">
                    <label for="password" class="form-label">Clave</label>
                    <input type="text" class="form-control" id="password"   name="password"  value="<?= $empleado['password'];?>">
                </div>

                <div class="col-md-4">
                    <label for="nombreempleado" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombreempleado" name="nombreempleado" value="<?=  $empleado['nombreempleado'];?>" >
                </div>

                <div class="col-md-4">
                    <label for="apellidoempleado" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellidoempleado" name="apellidoempleado" value="<?=  $empleado['apellidoempleado'];?>" >
                </div>

                <div class="col-md-6">
                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?=  $empleado['fecha_nacimiento'];?>">
                </div>

                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="telefono" class="form-control" id="telefono" name="telefono" value="<?= $empleado['telefono'];?>">
                </div>

                <div class="col-md-6">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="<?=  $empleado['correo'];?>">
                </div>

                <div class="col-md-6">
                    <label for="id_area" class="form-label">Area</label>
                    <select class="form-select" id="id_area" name="id_area">
                        <option value="">Seleccionar</option>
                        <?php foreach($areas as $area) : ?>
                            <option value="<?php echo $area['id']; ?>" <?php echo ($area['id'] == $empleado['id_area']) ? 'selected' : ''; ?>><?php echo $area['nombreArea']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-12">
                    <a href="<?php base_url('empleados'); ?>" class="btn btn-secondary">Regresar</a>
                    <!-- <button type="submit" class="btn btn-primary">Guardar</button> -->
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>

            </form>

 




<?= $this->endSection();