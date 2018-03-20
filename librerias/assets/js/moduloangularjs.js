var app = angular.module("Tienda", ['ngMaterial','ngResource']);

app.controller("Mostrarproductos", function ($scope,$http,$mdDialog) {

	$scope.totalapagar = 0;
	$scope.totalarticulos = 0;

  var url = "http://localhost/Tiendaonline/restproducto";

  upload();
  cargaproductos(url);
  cargartiposproductos();

  function upload() {
          $http.get('http://localhost/Tiendaonline/restdetallecarrito').then(function (response){
        
                $scope.totalarticulos = response.data.response.length;    
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

	// body...
	function cargaproductos(url) {
    $http.get(url).then(function (response) {
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
  }

  function cargartiposproductos() {
      $http.get("http://localhost/Tiendaonline/resttipoproducto/").then(function (response) {
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
  }



	$scope.mostrarxtipoproducto = function (id) {
		var url = "http://localhost/Tiendaonline/resttipoproducto/"+id;
    cargaproductos(url);
	};

	$scope.mostrarproductos = function () {
    var url = "http://localhost/Tiendaonline/restproducto";
    cargaproductos(url);
	};


			
});

app.controller('Carrito', function ($scope,$http,$mdDialog,Productos,Detallecarrito){
    
    $scope.numarticulos = 0;
    $scope.totalapagar = 0;
    upload();
    
    function upload() {
          $http.get('http://localhost/Tiendaonline/restdetallecarrito').then(function (response){
        
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
    };

     function consultarstock(data) {
      var bandera = true
      for (var i = 0; i < data.length; i++) {
        if (parseInt(data[i].stock) < parseInt(data[i].cantidad)) {
          return false;
        }else{
          
        }
        
      }

      return bandera;
    };

     function actualizarstock(data) {
      for (var i = 0; i < data.length; i++) {
        var newstock = parseInt(data[i].stock) - parseInt(data[i].cantidad);
        var producto = {};
        producto.id_tipoproducto = data[i].id_tipoproducto;
        producto.id_marcaproducto = data[i].id_marcaproducto;
        producto.nombre = data[i].nombre;
        producto.descripcion = data[i].descripcion;
        producto.stock = newstock;
        producto.precio_a = data[i].precio_a;
        producto.precio_b = data[i].precio_b;
        producto.precio_c = data[i].precio_c;
        producto.nombre_foto = data[i].nombre_foto;

        Productos.update({id: data[i].id},{producto: producto});
        
      }
    };

    function eliminarcarrito(data) {
      for (var i = 0; i < data.length; i++) {
        
        Detallecarrito.delete({id: data[i].id_carritodetalle});
        
      }
    };

    $scope.comprar = function () {
       $http.get('http://localhost/Tiendaonline/restdetallecarrito').then(function (response){
                
                if (consultarstock(response.data.response) === true) {
                  actualizarstock(response.data.response);
                  eliminarcarrito(response.data.response);

                  location.href ="http://localhost/Store/";
                  ///Detallecarrito.delete();
                }else{
                  $mdDialog.show(
                  $mdDialog.alert()
                    .parent(angular.element(document.querySelector('#popupContainer')))
                    .clickOutsideToClose(true)
                    .title('Mensaje')
                    .textContent('No existe suficiente stock. Por favor actualice la cantidad de cada uno de los productos.')
                    .ariaLabel('Alert Dialog Demo')
                    .ok('Aceptar')
                    
                  );
                }
                
                
        
          });
    }
    
   
});

app.controller('addCarrito', function ($scope,$http,$mdDialog){
    
    $scope.numarticulos = 0;
    $scope.totalapagar = 0;
    upload();
    cargartiposproductos();


  function cargartiposproductos() {
      $http.get("http://localhost/Tiendaonline/resttipoproducto/").then(function (response) {
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
  }
    
    function upload() {
          $http.get('http://localhost/Tiendaonline/restdetallecarrito').then(function (response){
        
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



 app.factory('Productos', ['$resource', function ($resource) {
        return $resource('http://localhost/Tiendaonline/restproducto/:id', {id: "@_id"}, {
            update: {method: "PUT", params: {id: "@_id"}}
        });
    }]);

 app.factory('Detallecarrito', ['$resource', function ($resource) {
        return $resource('http://localhost/Tiendaonline/restdetallecarrito/:id', {id: "@_id"}, {
            update: {method: "PUT", params: {id: "@_id"}}
        });
    }]);