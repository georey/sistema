<table class="responsive table">
    <thead>
        <tr>
            <th>id</th>
            <th>Documento</th>
            <th>Cliente</th>
            <th>Monto</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recorrido as $key) { ?>
        <tr>
            <td><?php echo $key['des_id'] ?></td>
            <td><?php echo $key['documento'] ?></td>
            <td><?php echo $key['cliente'] ?></td>              
            <td><?php echo $key['valor'] ?></td>              
        </tr>    
        <?php } ?>
    </tbody>
</table>