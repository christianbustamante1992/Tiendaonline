var app = angular.module("Tienda", ['ngMaterial','ngResource']);

app.controller("Mostrarproductos", function ($scope,$http,$mdDialog,ServiceCarrito,Productos) {

	$scope.totalapagar = 0.;
	$scope.totalarticulos = ServiceCarrito.getcount();

	// body...
	$http.get("http://localhost/Restapi/").then(function (response) {
		// body...
		if (response.data.response.length > 0) {
			$scope.productos = response.data.response;
		}else{
			alert("No se encontraron registros");
		};
		
		
	},
	function (response) {
		// body...
			$mdDialog.show(
      $mdDialog.alert()
        .parent(angular.element(document.querySelector('#popupContainer')))
        .clickOutsideToClose(true)
        .title('Mensaje')
        .textContent('No se encontraron productos.')
        .ariaLabel('Alert Dialog Demo')
        .ok('Aceptar')
        
    );
	}
	);

	$http.get("http://localhost/Restapi/index.php/tipoproducto").then(function (response) {
		// body...
		$scope.tipoproducto = response.data.response;
		
	},
	function (response) {
		// body...
			$mdDialog.show(
      $mdDialog.alert()
        .parent(angular.element(document.querySelector('#popupContainer')))
        .clickOutsideToClose(true)
        .title('Mensaje')
        .textContent('No se encontró ningún tipo de producto.')
        .ariaLabel('Alert Dialog Demo')
        .ok('Aceptar')
        
    );
	}
	);

	$scope.mostrarxtipoproducto = function (id) {
		// body...
		$http.get("http://localhost/Restapi/index.php/producto/tipoproducto/"+id).then(function (response) {
		// body...
		if (response.data.response.length > 0) {
			$scope.productos = response.data.response;
		}else{
			alert("No se encontraron registros");
		};
		
	},
	function (response) {
		// body...
		//alert("No se encontraron productos de este tipo.");
		$mdDialog.show(
      $mdDialog.alert()
        .parent(angular.element(document.querySelector('#popupContainer')))
        .clickOutsideToClose(true)
        .title('Mensaje')
        .textContent('No se encontraron productos de este tipo.')
        .ariaLabel('Alert Dialog Demo')
        .ok('Aceptar')
        
    );
	}
	);
	};

	$scope.mostrarproductos = function () {
		// body...
		$http.get("http://localhost/Restapi/").then(function (response) {
		// body...
		$scope.productos = response.data.response;
		
	},
	function (response) {
		// body...
		$mdDialog.show(
      $mdDialog.alert()
        .parent(angular.element(document.querySelector('#popupContainer')))
        .clickOutsideToClose(true)
        .title('Mensaje')
        .textContent('No se encontraron productos.')
        .ariaLabel('Alert Dialog Demo')
        .ok('Aceptar')
        
    );
	}
	);
	};

	$scope.agregarproducto = function (id) {
		var producto = {};
	$http.get("http://localhost/Restapi/index.php/producto/"+id).then(function (response) {
		producto.id_producto = response.data.response.id;
                producto.nombre_foto = response.data.response.nombre_foto;
		producto.nombre = response.data.response.nombre;
		producto.stock = response.data.response.stock;
                producto.cantidad = 1;
		producto.precio = response.data.response.precio_a;
                producto.importetotal = response.data.response.precio_a;
		
				
		if (ServiceCarrito.add(producto) === true) {
                    Productos.save({producto:producto});
			alert("Se a agregado correctamente");
		}else{
			alert("El producto ya esta agregado");
		}
		
		$scope.totalarticulos = ServiceCarrito.getcount();
		$scope.totalapagar = ServiceCarrito.gettotalapagar();

	});
	//alert(productos.nombre);
	};

			
});

app.controller('Carrito', function ($scope,$http,$mdDialog,Productos){
    
    $scope.numarticulos = 0;
    $scope.totalapagar = 0;
    upload();
    
    function upload() {
          $http.get('http://localhost/Restapi/index.php/productotemporal/').then(function (response){
        
                $scope.data = response.data.response;
                $scope.numarticulos = response.data.response.length;    
                $scope.totalapagar = obtenertotalapagar(response.data.response);
        
          });
    }
    
    function obtenertotalapagar(data) {
        var sumatoria = 0.00;
      for (var i = 0; i < data.length; i++) {
      	sumatoria = sumatoria + (parseFloat(data[i].precio)*parseFloat(data[i].cantidad));
      }
      return sumatoria.toFixed(2);
    }
    
   
});

app.factory('ServiceCarrito', function($http) {
  
  var productos = [];
  

  return {
    add: function(data) {
       
    	var bandera = true;
    	if (productos.length > 0) {
    		for (var i = 0; i<productos.length; i++) {
    			if (productos[i].id_producto === data.id_producto) {
    				bandera = false;
    				return bandera;
    			}
      		}
                productos.push(data);
                	     		
  			return bandera;
  		}else{
                    productos.push(data);
                  			
  			return bandera;
  		}
      
    },
    get: function() {
      return productos;
    },
    getcount: function () {
    	return productos.length;
    },
    setcantidadproducto: function (id,valor) {
    	// body...
    	for (var i = 0; i < productos.length; i++) {
            if (productos[i].id_producto === id) {
    				productos[i].cantidad = valor; 
    			}
      }
    },
    getregdetalleventa: function () {
    	// body...
    	var detalleventa = [];
    	var registros = {};
    	for (var i = 0; i < productos.length; i++) {
    		registros.id = productos[i].id;
    		registros.cantidad = productos[i].cantidad;
    		detalleventa.push(registros);
    	}
    	return detalleventa;
    },
    getnewstock: function () {
    	var setstock = [];
    	var registros = {};
    	for (var i = 0; i < productos.length; i++) {
    		registros.id = productos[i].id;
    		registros.stock = parseInt(productos[i].cantidad)-parseInt(productos[i].stock);
    		setstock.push(registros);
    	}
    	return setstock;
    },
    gettotalapagar: function () {
    	var sumatoria = 0.00;
      for (var i = 0; i < productos.length; i++) {
      	sumatoria = sumatoria + (parseFloat(productos[i].precio)*parseFloat(productos[i].cantidad));
      }
      return sumatoria.toFixed(2);
    }
  };
});

 app.factory('Productos', ['$resource', function ($resource) {
        return $resource('http://localhost/Restapi/index.php/productotemporal/:id', {id: "@_id"}, {
            update: {method: "PUT", params: {id: "@_id"}}
        });
    }]);