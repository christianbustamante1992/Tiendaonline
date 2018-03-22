
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
<div class="row">
<div id="sidebar" class="span3">
<div class="well well-small">
  <ul class="nav nav-list">
    <li ng-repeat="item in tipoproducto">
    <a href ><span class="icon-chevron-right"></span>{{item.nombre_tipoproducto}}</a>
    </li>
    
    <li style="border:0"> &nbsp;</li>
    <li> <a class="totalInCart" href="cart.html"><strong>Total <span class="badge badge-warning pull-right" style="line-height:18px;">$ {{totalapagar}}</span></strong></a></li>
  </ul>
</div>
</div>
    <div class="span9">
    <ul class="breadcrumb">
    <li><a>Home</a> <span class="divider">/</span></li>
    <li class="active">Add Articulo</li>
    </ul> 
  <div class="well well-small">
  <div class="row-fluid">
      <div class="span5">
      <div class="">
                <div >
                  <div class="item">
                    <a> <img src="http://localhost/Tiendaonline/uploads/<?php echo $producto->nombre_foto; ?>" alt="" style="width:100%"></a>
                  </div>
                </div>
                
            </div>
      </div>
      <div class="span7">
        <h3><?php echo $producto->nombre; ?></h3>
        <hr class="soft"/>

    <?php
    $atributos = array('method' => 'POST','class' => 'form-horizontal qtyFrm'); 
    echo form_open('inicio/guardar/',$atributos); 
    $atributos = array('type' => 'hidden', 
                       'name' => 'id',
                       'value' => $producto->id
                       
                      );
    echo form_input($atributos);
    $atributos = array('type' => 'hidden', 
                       'name' => 'precio',
                       'value' => $producto->precio_a
                       
                      );
    echo form_input($atributos); 
    ?>
    <div class="control-group">
   <label class="control-label"><span>Precio: $ <?php echo $producto->precio_a; ?></span></label>
    <div class="controls">
      <b><span>Cantidad:</span></b>
    <?php 
    $atributos = array('type' => 'number', 
                       'name' => 'cantidad',
                       'class' => 'span6',
                       'value' => '1',
                       'min' => '1',
                       'max' => $producto->stock
                       
                      );
    echo form_input($atributos); 
    ?>
                
  </div>
</div>
   <h4><?php echo $producto->stock; ?> items en stock</h4>
          <p><?php echo $producto->descripcion; ?><p>
            <br>
    <b><p><?php echo form_error('id','<span class="error">','</span>'); ?></p></b>
  <?php 

    
    echo form_submit('submit', 'Agregar al carrito', 'class="shopBtn"'); 
    ?>
    
  
<?php echo form_close(); ?>

        
        </div>
      </div>
</p>        
  </p>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>