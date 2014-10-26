
<b>Products</b>

<table width="100%" border="1">
  
  <tr>
    <td width="37%">ID</td>
    <td width="30%">Name</td>
    <td width="16%">Price</td>
    <td width="16%">&nbsp;</td>
  </tr>
  <?php $product_array_index = 0;?>
  <?php foreach($products as $product):?>
  <tr>
    <td><?php echo $product['id'];?></td>
    <td>
      <?php 
      echo $product['name'] ; 
       if (array_key_exists('options', $product)) {
         echo '<hr>';
        foreach ($product['options'] as $key => $value) 
        {
        echo  '<strong>' . $key . '</strong> : '. $value . '<br/>';  
         }  
       }
      
      ?>
  </td>
    <td><?php echo $product['price'];?></td>
    <td><a href="?id=<?php echo $product_array_index;?>">Add to Cart</a></td>
  </tr>
  <?php $product_array_index ++;?>
  <?php endforeach;?>
</table>

<hr>


<b>Your Cart</b>

<?php echo form_open(base_url()); ?>

<table cellpadding="6" cellspacing="1" style="width:100%" border="1">

<tr>
  <th>QTY</th>
  <th>Item Description</th>
  <th style="text-align:right">Item Price</th>
  <th style="text-align:right">Sub-Total</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

  <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

  <tr>
	  <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
	  <td>
		<?php echo $items['name']; ?>

			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				</p>

			<?php endif; ?>

	  </td>
	  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
	  <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
	</tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
  <td colspan="2"></td>
  <td class="right"><strong>Total</strong></td>
  <td class="right" align="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>

</table>

<p><?php echo form_submit('update_cart', 'Update your Cart'); ?></p>
