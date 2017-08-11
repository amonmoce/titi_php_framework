<table>
  <tr>
    <th>Name</th>
    <th>Cel</th> 
    <th>Code</th>
    <th>Time</th>
    <th>Store</th>
  </tr>
<?php if(isset($this->data)){ 
    foreach ($this->data['users'] as $key => $value) {
?>
<tr>
<td><?php echo $value["name"]; ?></td>
<td><?php echo $value["cel"]; ?></td> 
<td><?php echo $value["code"]; ?></td>
<td><?php echo $value["time"]; ?></td> 
<td><?php echo $value["store"]; ?></td>
</tr>

<?php } } ?>

  
</table>
