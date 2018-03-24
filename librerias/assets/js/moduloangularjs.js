var app = angular.module("Tienda", ['ngMaterial','ngResource']);

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

app.controller('Carrito', function ($scope,$http,$mdDialog,Productos){
    
   function addcarrito() {

    var datacarrito;
    
     
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

                  Productos.update({id: respuesta.data.response.id},{producto: producto});
                                        
              },function (respuesta) {
                             
              });
                                        
      },function (response) {
                     
      });




                 
               /* for (var i = 0; i < response.data.response.length; i++) {

                  var producto = getdataproducto(response.data.response[i].id_producto);
                   
                    if (consultarstock(producto, response.data.response[i].cantidad) === true) {
                        actualizarstock(producto, response.data.response[i].cantidad);
                        alert("Se actualizo correctamente");
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
                 }*/
             
        
            }
   

   function getdataproducto(id) {
      /*$http.get('http://localhost/Store/restproducto/'+id).then(function (response){
              return response.data.response;        
                                        
      },function (response) {
                     
      });*/

      var url = "http://localhost/Store/restproducto/"+id;
      console.log(url);
   }

    function getdatacarrito() {
      $http.get('http://localhost/Store/restdetallecarrito').then(function (response){
              return response.data.response.length;
                                        
      },function (response) {
                     
      });
   }
    
    function consultarstock(dataproducto,cantidad) {
      /*var bandera = true
      
        if (parseInt(dataproducto[0].stock) < parseInt(cantidad)) {
          return false;
        }else{
          
        }
        
      

      return bandera;*/
      console.log(dataproducto[0].stock);
    };

     function actualizarstock(data,cantidad) {
      
        var newstock = parseInt(data[0].stock) - parseInt(cantidad);
        var producto = {};
        producto.id_tipoproducto = data[0].id_tipoproducto;
        producto.id_marcaproducto = data[0].id_marcaproducto;
        producto.nombre = data[0].nombre;
        producto.descripcion = data[0].descripcion;
        producto.stock = newstock;
        producto.precio_a = data[0].precio_a;
        producto.precio_b = data[0].precio_b;
        producto.precio_c = data[0].precio_c;
        producto.nombre_foto = data[0].nombre_foto;

        Productos.update({id: data[0].id},{producto: producto});
        
      
    };

    

    $scope.comprar = function () {
  addcarrito();
    }
    
   
});

 app.factory('Productos', ['$resource', function ($resource) {
        return $resource('http://localhost/Store/restproducto/:id', {id: "@_id"}, {
            update: {method: "PUT", params: {id: "@_id"}}
        });
    }]);

