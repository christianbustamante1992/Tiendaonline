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
    <li> <a class="totalInCart" href="cart.html"><strong>Total <span class="badge badge-warning pull-right" style="line-height:18px;">$ 0</span></strong></a></li>
  </ul>
</div>
</div>
    <div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
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
    echo form_open('marca/actualizarmarca/',$atributos); 
    $atributos = array('type' => 'hidden', 
                       'name' => 'id',
                       'value' => $producto->id
                       
                      );
    echo form_input($atributos); 
    ?>
    <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'nombre',
                       'class' => 'w-50 p-0',
                       'placeholder' => 'Ingrese el nombre de la marca',
                       'required' => 'true',
                       'value' => $marca->nombre_marca
                      );
    echo form_input($atributos); 
    ?>
    <br>
    <?php echo form_error('nombre','<span class="error">','</span>'); ?>
        
  </div><br>
  
  <?php 
    
    echo form_submit('submit', 'Actualizar', 'class="btn btn-primary"'); 
    ?>
  
<?php echo form_close(); ?>

        
        <form class="form-horizontal qtyFrm">
          <div class="control-group">
          <label class="control-label"><span>$ <?php echo $producto->precio_a; ?></span></label>
          <div class="controls">
          <input type="number" class="span6" placeholder="Cantidad" min="1" max="<?php echo $producto->stock ?>">
          </div>
          </div>
        
          
          
          <h4><?php echo $producto->stock; ?> items en stock</h4>
          <p><?php echo $producto->descripcion; ?><p>
          <button type="submit" class="shopBtn"><span class=" icon-shopping-cart"></span> Add to cart</button>
        </form>
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