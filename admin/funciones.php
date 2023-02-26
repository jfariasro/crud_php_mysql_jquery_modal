<?php

function MensajeExitoso($mensaje)
{
?>
    <div class="alert alert-primary float-right" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <?php echo $mensaje; ?>
    </div>
<?php
}

function MensajeError($mensaje)
{
?>
    <div class="alert alert-danger float-right" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <?php echo $mensaje; ?>
    </div>
<?php
}
