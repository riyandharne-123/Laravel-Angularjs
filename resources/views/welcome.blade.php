<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <title>Laravel</title>
    </head>
    <body>
<div class="container" style="padding-top:8%;"  ng-app="myApp" ng-controller="RecipeCtrl">
   <button class="btn btn-primary"  data-toggle="modal" data-target="#addModal">Add Recipe</button>

<!-- The Modal -->
<div class="modal" id="addModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Recipe</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form method="post">
           <div class="form-group">
            <label>Title:</label>
            <input type="text" class="form-control"
             ng-model="title" required/>
            </div>
            <div class="form-group">
            <label>Instructions:</label>
            <textarea class="form-control" rows="5"
             ng-model="instructions" required></textarea>
            </div>
             <div class="form-group">
            <label>Ingredients:</label>
            <input type="text" class="form-control"
             ng-model="ingredients"
             required/>
            </div>
             <div class="form-group">
            <label>Time:</label>
            <input type="text" class="form-control"
             ng-model="time" required/>
            </div>
            <div class="form-group">
            <label>Servings:</label>
            <input type="text" class="form-control" 
            ng-model="servings" required/>
            </div>
            <div class="form-group">
            <label>Nutrition:</label>
            <textarea class="form-control" rows="5" 
            ng-model="nutrition" required></textarea>
            </div>
            <div class="form-group">
            <label>Type:</label>
            <select class="form-control" ng-model="type" id="recipe_type" required>
            <option>Veg</option>
             <option>Non-Veg</option>
            </select>
            </div>
            <button 
            id="add_recipe"
            class="btn btn-success" 
            type="submit"
            ng-click="postdata(
                title,instructions,ingredients,time,servings,nutrition,type
                )"
            >
            Submit
            </button>
       </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
   <br>
   <hr>
   <div class="table-responsive">
  <table class="table table-bordered table-hover" id="recipetable">
    <thead>
      <tr>
        <th>title<br>
        <i class="fa fa-arrow-up btn btn-success" ng-click="orderByMe('+title')" aria-hidden="true"></i>
        <i class="fa fa-arrow-down btn btn-danger" ng-click="orderByMe('-title')" aria-hidden="true"></i>
        </th>
        <th>instructions 
        <i class="fa fa-arrow-up btn btn-success" ng-click="orderByMe('+instructions')" aria-hidden="true"></i>
        <i class="fa fa-arrow-down btn btn-danger" ng-click="orderByMe('-instructions')" aria-hidden="true"></i>
        </th>
        <th>ingredients 
        <i class="fa fa-arrow-up btn btn-success" ng-click="orderByMe('+ingredients')" aria-hidden="true"></i>
        <i class="fa fa-arrow-down btn btn-danger" ng-click="orderByMe('-ingredients')" aria-hidden="true"></i>
        </th>
        <th>time 
        <i class="fa fa-arrow-up btn btn-success" ng-click="orderByMe('+time')" aria-hidden="true"></i>
        <i class="fa fa-arrow-down btn btn-danger" ng-click="orderByMe('-time')" aria-hidden="true"></i>
        </th>
        <th>Servings
        <i class="fa fa-arrow-up btn btn-success" ng-click="orderByMe('+servings')" aria-hidden="true"></i>
        <i class="fa fa-arrow-down btn btn-danger" ng-click="orderByMe('-servings')" aria-hidden="true"></i>
        </th>
        <th>nutrition 
        <i class="fa fa-arrow-up btn btn-success" ng-click="orderByMe('+nutrition')" aria-hidden="true"></i>
        <i class="fa fa-arrow-down btn btn-danger" ng-click="orderByMe('-nutrition')" aria-hidden="true"></i>
        </th>
        <th>type <br>
        <i class="fa fa-arrow-up btn btn-success" ng-click="orderByMe('+type')" aria-hidden="true"></i>
        <i class="fa fa-arrow-down btn btn-danger" ng-click="orderByMe('-type')" aria-hidden="true"></i>
        </th>
        <th>Created At <br>
        <i class="fa fa-arrow-up btn btn-success" ng-click="orderByMe('+created_at')" aria-hidden="true"></i>
        <i class="fa fa-arrow-down btn btn-danger" ng-click="orderByMe('-created_at')" aria-hidden="true"></i>
        </th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <tr><input type="text" class="form-control" placeholder="Filter" ng-model="test"></tr>
    <br>
      <tr ng-repeat="x in recipes | filter : test | orderBy:order">
        <td><% x.title %></td>
        <td><% x.instructions %></td>
        <td><% x.ingredients %></td>
        <td><% x.time %></td>
        <td><% x.servings %></td>
        <td><% x.nutrition %></td>
        <td><% x.type %></td>
        <td><% x.created_at %></td>
        <td>
          <form>
            <button class="btn btn-danger"
            ng-click="deletedata(x.id)"
             type="submit">Delete</button>
        </form>
                <br>
          <button class="btn btn-warning" 
          ng-click="setModalId(x.id)">
          Edit</button>
 <!-- The Modal -->
<div class="modal" id="editModal<%x.id%>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Recipe</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <form method="post">
           <div class="form-group">
            <label>Title:</label>
            <input type="text" id="title<%x.id%>" class="form-control" value="<%x.title%>" required/>
            </div>
            <div class="form-group">
            <label>Instructions:</label>
            <textarea id="instructions<%x.id%>" class="form-control" rows="5" required><%x.instructions%></textarea>
            </div>
             <div class="form-group">
            <label>Ingredients:</label>
            <input id="ingredients<%x.id%>" type="text" class="form-control" value="<%x.ingredients%>" required/>
            </div>
             <div class="form-group">
            <label>Time:</label>
            <input id="time<%x.id%>" type="text" class="form-control" value="<%x.time%>" required/>
            </div>
            <div class="form-group">
            <label>Servings:</label>
            <input id="servings<%x.id%>" type="text" class="form-control" value="<%x.servings%>" required/>
            </div>
            <div class="form-group">
            <label>Nutrition:</label>
            <textarea id="nutrition<%x.id%>" class="form-control" rows="5" required><%x.nutrition%></textarea>
            </div>
            <div class="form-group"  ng-if="x.type == 'Veg'">
            <label>Type:</label>
            <select id="type<%x.id%>" class="form-control" required>
                <option>Veg</option>
               <option>Non-Veg</option>
            </select>
            </div>
             <div class="form-group"  ng-if="x.type == 'Non-Veg'">
            <label>Type:</label>
            <select id="type<%x.id%>" class="form-control" required>
                 <option>Non-Veg</option>
                <option>Veg</option>
            </select>
            </div>
            <button 
            class="btn btn-success" 
            type="submit"
            ng-click="updatedata(x.id,x.title,x.instructions,x.ingredients,x.time,x.servings,x.nutrition,x.type)"
            >
            Submit
            </button>
       </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
        </tr>
    </tbody>
  </table>
  </div>
</div>
        </td>

    </body>
    <script>
    //not to mix blade with angular.js
  var app = angular.module('myApp', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
app.controller('RecipeCtrl', function($scope, $http) {
    //defining data
    $scope.title = null;
    $scope.instructions = null;
    $scope.ingredients = null;
    $scope.time = null;
    $scope.servings = null;
    $scope.nutrition = null;
    $scope.type = document.getElementById('recipe_type').value;
    $scope.oder = null;
    //getting data
    $http.get("/recipes")
    .then(function (response) {$scope.recipes = response.data;});
    $scope.orderByMe = function(x) {
    $scope.order = x;
  }
    //posting data
    $scope.postdata = function (title,instructions,ingredients,time,servings,nutrition,type) {

    var data = {
        'title':title,
        'instructions':instructions,
        'ingredients': ingredients,
        'time':time,
        'servings':servings,
        'nutrition':nutrition,
        'type': type
    };
    
    $http.post('/recipes/create', JSON.stringify(data)).then(function (response) {
    $scope.recipes = response.data;
    $('#addModal').modal('hide');
    $scope.title = null;
    $scope.instructions = null;
    $scope.ingredients = null;
    $scope.time = null;
    $scope.servings = null;
    $scope.nutrition = null;
    $scope.type = document.getElementById('recipe_type').value;
    });

    };
    // deleting data
    $scope.deletedata = function (delete_id) {
    var data = {
    delete_id:delete_id,
    };
    $http.post('/recipes/delete', JSON.stringify(data)).then(function (response) {
    $scope.recipes = response.data;
    });

    };

    $scope.setModalId = function (id) {
    $('#editModal'+id).modal('show');
    };

    //editing data
    $scope.updatedata = function (id,title,instructions,ingredients,time,servings,nutrition,type) {

    var data = {
        'id':id,
        'title':document.getElementById('title'+id).value,
        'instructions':document.getElementById('instructions'+id).value,
        'ingredients':document.getElementById('ingredients'+id).value,
        'time':document.getElementById('time'+id).value,
        'servings':document.getElementById('servings'+id).value,
        'nutrition':document.getElementById('nutrition'+id).value,
        'type':document.getElementById('type'+id).value,
       };
$http.post('/recipes/edit', JSON.stringify(data)).then(function (response) {
$scope.recipes = response.data;
$('#editModal'+id).modal('hide');
});
};

});
    </script>
</html>
