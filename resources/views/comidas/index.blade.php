<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<title>MyFood</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- CSS propio -->
      <!--  <link id="estilos" rel="stylesheet" type="text/css" href=''>-->
          <link id="estilos" type="text/css" rel="stylesheet"  href="css/estilo3.css">
        <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/logica.js"></script>
  <script type="text/javascript" src="js/html2canvas.js"></script>
  <script type="text/javascript" src="js/FileSaver.js"></script>

  </head>
  <body class="cuerpo">
  <div class="container-fluid">
   <div class="row estilo">
     <div class="col-md-2">
       @if (Route::has('login'))
           <div class="top-right links">

               @if (Auth::check())  <!--  The user is logged in...-->

                   <a class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                           {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        @if (Auth::user()->isAdmin())
                            <a href=#>Editar Pagina<h2>
                        @endif


                       <ul class="dropdown-menu" role="menu">
                           <li  class="list-unstyled">
                               <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                   Logout
                               </a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                   {{ csrf_field() }}
                               </form>
                           </a>
                       </ul>
                   </li>

               @else
                   <a class="dropdown-toggle" href="{{ url('/login') }}">Login     </a>
                   <a class="dropdown-toggle"  href="{{ url('/register') }}">Register</a>
               @endif

           </div>
       @endif
     </div>
  <div class="col-md-9"></div>
  <div class="col-md-1">
     <select class="selectpicker">
     <option class="picker" id="estilo1" value="estilo1" >Estilo 1</option>
     <option class="picker" id="estilo2" value="estilo2" >Estilo 2</option>
     <option class="picker" id="estilo3" value="estilo3" >Estilo 3</option>
    </select>
  </div>
   </div>
    </div>
    <div class="jumbotron text-center fondo">
         <h1 class="titulo">MyFood</h1>
    <p class="subtitulo1">¡Personalizá tu plato favorito y enterate su información nutricional!</p>
     </div>

<div class="container-fluid principal">
<div class="row">

    <div class="col-md-8" id="plato">
      <img id="PlatoPrincipal" src="Imagenes/plato.png" alt="Imagen plato" class="img-responsive center-block imgPpal">
      <img class="parte1-food" src="Imagenes/transparente.png" alt=""/>
      <img class="parte2-food" src="Imagenes/transparente.png" alt=""/>
      <img class="parte3-food" src="Imagenes/transparente.png" alt=""/>
      <button class="buttonSave" id="buttonSave" >GUARDAR PLATO</button>
    </div>

  <div class="col-md-4">
   <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class=" panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Vegetales</a>
        <button class="botonAñadir" style="float: right ;" value="Vegetales">Añadir</button>
      </h4>
    </div>

    <div id="collapse1" class=" panel-collapse collapse">
      <div class="panel-body">
      <div>
            <ul class="contenedor">

              @foreach ($vegetales as $vegetal)

                  <li
                   class="panel-button" id={{ $vegetal->Nombre }}  data-panelcat="Vegetales" data-panelid={{ $vegetal->Nombre }}> {{ $vegetal->Nombre }}
                  </li>
                  <button class="botonEliminar" style="float: right ;" categoria="Vegetales" value="{{$vegetal->id}}" >Eliminar</button>

                  <button class="open-modal" style="float: right ;" value="{{$vegetal->id}}" categoria="Vegetales" >Edit</button>


              @endforeach

            </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Carnes</a>
        <button class="botonAñadir" style="float: right ;" value="Carne">Añadir</button>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
        <div>
            <ul class="contenedor">

              @foreach ($carnes as $carne)
                  <li class="panel-button" data-panelcat="Carnes" data-panelid={{ $carne->Nombre }}> {{ $carne->Nombre }}</li>
                    <button class="open-modal" style="float: right ;" value="{{$carne->id}}" categoria="Carnes" >Edit</button>
              @endforeach
                  </ul>
        </div>
       </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        Minutas</a>
        <button class="botonAñadir" style="float: right ;" value="Minuta">Añadir</button>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
      <div>
            <ul class="contenedor">

              @foreach ($minutas as $minuta)
                  <li class="panel-button" data-panelcat="Minutas" data-panelid={{ $minuta->Nombre }}> {{ $minuta->Nombre }} </li>
                    <button class="open-modal" style="float: right ;" value="{{$minuta->id}}" categoria="Minutas" >Edit</button>
              @endforeach
                        </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        Pastas</a>
        <button class="botonAñadir" style="float: right ;" value="Pasta">Añadir</button>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
      <div class="panel-body">
      <div>
            <ul class="contenedor">

              @foreach ($pastas as $pasta)
                  <li class="panel-button" data-panelcat="Pastas" data-panelid={{ $pasta->Nombre }}> {{ $pasta->Nombre }}</li>
                    <button class="open-modal" style="float: right ;" value="{{$pasta->id}}" categoria="Pastas" >Edit</button>
              @endforeach

            </ul>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
      </div>
       <div class="container-fluid">
<div class="row regimen" align="center">
    <div class="col-md-3">
        <input type="checkbox" value="celiaco"> Celiaco<br>
    </div>
    <div class="col-md-3">
        <input type="checkbox" value="hipertenso"> Hipertenso<br>
    </div>
    <div class="col-md-3">
        <input type="checkbox" value="diabetico"> Diabetico<br>
    </div>
    <div class="col-md-3">
        <input type="checkbox" value="vegetariano"> Vegetariano<br>
    </div>
</div>
<div class="row" align="center">

    <div class="col-md-3">
<img src="Imagenes/plato1.png" alt="Imagen plato" class="sugerencias" onclick=exportToForm(1)>
<p class="sugerencia" >Milanesa de Pollo con Fritas</p>
<p class="subtitulo2">Deliciosa milanesa de pechuga de pollo con papas fritas baston.</p>
    </div>
    <div class="col-md-3">
<img src="Imagenes/plato2.png" alt="Imagen plato" class="sugerencias" onclick=exportToForm(2)>
<p class="sugerencia">Lasagna</p>
<p class="subtitulo2">Pasta en láminas intercaladas con carne y vegetales</p>
    </div>
    <div class="col-md-3">
<img src="Imagenes/plato3.png" alt="Imagen plato" class="sugerencias" onclick=exportToForm(3)>
<p class="sugerencia">Sushi</p>
<p class="subtitulo2">Arroz acompañado con sésamo, salmón y trucha.</p>
    </div>
  <div class="col-md-3">
<img src="Imagenes/plato4.png" alt="Imagen plato" class="sugerencias" onclick=exportToForm(4)>
<p class="sugerencia">Super pancho</p>
<p class="subtitulo2">Pancho con aderezos y papas carioca</p>
  </div>
  </div>
</div>
<div class="container-fluid">
<div class="row tabla">

    <div class="col-md-12">
  <table class="table table-striped">
    <thead>
      <tr class="columna">
        <th>Kcal</th>
        <th>Carbohidratos</th>
        <th>Protenias</th>
        <th>Grasas totales</th>
        <th>Sodio</th>
        <th>Azucar</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
      <tr>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
      <tr>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
      <tr>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
      <tr>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
      <tr>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
    </tbody>
  </table>
</div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editor de alimentos</h4>
                        </div>
                        <div class="modal-body">
                          <form method='post' action='guardarCambios' id="idForm" enctype='multipart/form-data' >
                              	{{csrf_field()}}
                                  <meta name="csrf-token" content="{{ csrf_token() }}" />
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                  <div class="form-group error">
                                  <label for="inputTask" class="col-sm-3 control-label">Alimento</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="nombre" name="nombre" placeholder="nombre" value="">
                                    </div>
                                  </div>
                                <div class="form-group">
                                <input type="file" name="image" text="actualizar Imagen" />
                                  <div class="col-sm-12">
                                     <img class="foodImg" src="" alt="No hay imagen disponible"/>
                                  </div>
                              </div>
                              <div class="modal-footer">

                                  <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
                                  <input type="hidden" id="comida_id" name="comida_id" value="0">
                                  <input type="hidden" id="categoria_id" name="categoria_id" value="0">
                              </div>
                          </form>
                      </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="agregarComida" tabindex="-1" role="dialog" aria-labelledby="agregarComidaLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title" id="agregarComidaLabel">Añadir alimento</h4>
                                    </div>
                                    <div class="modal-body">
                                      <form method='post' action='agregarComida' id="idForm2" enctype='multipart/form-data' >
                                          	{{csrf_field()}}
                                              <meta name="csrf-token" content="{{ csrf_token() }}" />
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                              <div class="form-group error">
                                              <label for="inputTask" class="col-sm-3 control-label">Alimento</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control has-error" id="nombre_agregar" name="nombre_agregar" placeholder="nombre" value="">
                                                </div>
                                              </div>
                                            <div class="form-group">
                                            <input type="file" name="image_agregar" text="actualizar Imagen" />
                                              <div class="col-sm-12">
                                                 <img class="foodImg" src="" alt="No hay imagen disponible"/>
                                              </div>
                                          </div>
                                          <div class="modal-footer">

                                              <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
                                              <input type="hidden" id="categoria_agregar" name="categoria_agregar" value="0">

                                          </div>
                                      </form>
                                  </div>

                                </div>
                            </div>
                        </div>

        </div>

  </body>
</html>
