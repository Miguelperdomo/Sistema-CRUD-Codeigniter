<?php echo $this->extend('plantilla');?>

<i class="bi bi-person-add"></i>
<?= $this->section('contenido'); ?>

<h3 class="my-3">Nuevo empleado</h3>
<script>
  function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>

<?php 
    if (session()->getFlashdata('error')  !== null ) { ?>

    <div class="alert alert-danger">
        <?= session()->getFlashdata('error');  ?>

    </div>
<?php } ?>

            <form action="<?= base_url('empleados'); ?>" class="row g-3" method="post" autocomplete="off">

                <div class="col-md-4">
                    <label for="password" class="form-label">Clave</label>
                    <input type="password" class="form-control" id="password"   name="password"  value="<?= set_value('password')?>">
                </div>

                <div class="col-md-4">
                    <label for="nombreempleado" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombreempleado" name="nombreempleado" value="<?= set_value('nombreempleado')?>" >
                </div>

                <div class="col-md-4">
                    <label for="apellidoempleado" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellidoempleado" name="apellidoempleado" value="<?= set_value('apellidoempleado')?>" >
                </div>

                <div class="col-md-6">
                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                </div>

                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="telefono" class="form-control" id="telefono" name="telefono" value="<?= set_value('telefono')?>">
                </div>

                <div class="col-md-6">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="<?= set_value('correo')?>">
                </div>

                <div class="col-md-6">
                    <label for="id_area" class="form-label">Area</label>
                    <select class="form-select" id="id_area" name="id_area">
                        <option value="">Seleccionar</option>
                        <?php foreach($areas as $area) : ?>
                            <option value="<?php echo $area['id']; ?>"><?php echo $area['nombreArea']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-12">
                    <a href="<?php base_url('empleados'); ?>" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button class="btn btn-warning"  type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
                </div>

            </form>








<?= $this->endSection();