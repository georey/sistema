<table class="responsive table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Monto</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($historial as $key) { ?>
        <tr>
            <td><?php echo $key['esf_estado_factura'] ?></td>
            <td><?php echo $key['username'] ?></td>
            <td><?php echo $key['est_nombre'] ?></td>
            <td><?php echo date('d/m/Y',strtotime($key['esf_fecha'])) ?></td>
            <td><?php echo $key['esf_monto'] ?></td>            
        </tr>    
        <?php } ?>
    </tbody>
</table>