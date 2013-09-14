<table class="responsive table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Estado</th>
            <th>Fecha</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($historial as $key) { ?>
        <tr>
            <td><?php echo $key['esf_id'] ?></td>
            <td><?php echo $key['username'] ?></td>
            <td><?php echo $key['est_nombre'] ?></td>
            <td><?php echo date('d/m/Y',strtotime($key['esf_fecha'])) ?></td>                   
        </tr>    
        <?php } ?>
    </tbody>
</table>