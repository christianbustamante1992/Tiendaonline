var app = angular.module("Tienda", ['ngMaterial']);

app.controller("Mostrarproductos", function ($scope,$http,$mdDialog) {

	$scope.totalapagar = 0;
	$scope.totalarticulos = 0;

  var url = "http://localhost/Store/restproducto";

  cargaproductos(url);
  cargartiposproductos();

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
      $http.get("http://localhost/Store/resttipoproducto/").then(function (response) {
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
		var url = "http://localhost/Store/resttipoproducto/"+id;
    cargaproductos(url);
	};

	$scope.mostrarproductos = function () {
    var url = "http://localhost/Store/restproducto";
    cargaproductos(url);
	};


			
});

app.controller('addCarrito', function ($scope,$http,$mdDialog){
    
    $scope.numarticulos = 0;
    $scope.totalapagar = 0;
    cargartiposproductos();


  function cargartiposproductos() {
      $http.get("http://localhost/Store/resttipoproducto/").then(function (response) {
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
    
      
   
});

app.controller('Carrito', ['$scope','$http', function ($scope,$http) {

  $scope.comprar = function () {
    // body...
    $http.get('http://localhost/Store/restdetallecarrito').then(function (response){
              datacarrito =response.data.response;
              $http.get('http://localhost/Store/restproducto/'+datacarrito[0].id_producto).then(function (respuesta){
                  var newstock = parseInt(respuesta.data.response.stock) - parseInt(datacarrito[0].cantidad);
                  var producto = {};
                  producto.id_tipoproducto = respuesta.data.response.id_tipoproducto;
                  producto.id_marcaproducto = respuesta.data.response.id_marcaproducto;
                  producto.nombre = respuesta.data.response.nombre;
                  producto.descripcion = respuesta.data.response.descripcion;
                  producto.stock = newstock;
                  producto.precio_a = respuesta.data.response.precio_a;
                  producto.precio_b = respuesta.data.response.precio_b;
                  producto.precio_c = respuesta.data.response.precio_c;
                  producto.nombre_foto = respuesta.data.response.nombre_foto;

                  $http.put("http://localhost/Store/restproducto/1", {producto: producto}).then(function (response) {
                    // body...
                  },function (response) {
                    // body...
                  });

              },function (respuesta) {
                                               
              });
                                                          
    },function (response) {
                                       
    });
  
};
  
}]);

