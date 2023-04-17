<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  
   
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
  <style>
  #app{
      background-color:#CFD8DC;      
  }
  </style>
</head>
<body>
  <div id="app">
    <v-app>
      <v-main>   
       
       <!-- Botón CREAR (Método HTTP: POST) -->  
       <v-flex class="text-center align-center">
       <v-btn class="mx-2 mt-4"  fab dark color="#00B0FF" @click="formNuevo()"><v-icon dark>mdi-plus</v-icon></v-btn>           
       </v-flex>              
         
        <v-card class="mx-auto mt-5" color="transparent" max-width="1280" elevation="8">                    
      
        <!-- Tabla y formulario -->
        <v-simple-table class="mt-5">
            <template v-slot:default>
                <thead>
                    <tr class="indigo darken-4">
                        <th class="white--text">ID</th>
                        <th class="white--text">NOMBRE</th>
                        <th class="white--text">APELLIDO</th>
                        <th class="white--text">EDAD</th>
                        <th class="white--text">SALARIO</th>
                        <th class="white--text text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="empleado in empleados" :key="empleado.id">
                    <td>{{ empleado.id }}</td>
                    <td>{{ empleado.nombre }}</td>
                    <td>{{ empleado.apellidos }}</td>
                    <td>{{ empleado.edad }}</td>
                    <td>{{ empleado.salario }}</td>
                    <td>
                        <!-- Botón CREAR (Método HTTP: GET) -->  
                        <v-btn fab dark color="#00BCD4" small @click="ver(empleado.id)"><v-icon>mdi-owl</v-icon></v-btn>
                        <!-- Botón CREAR (Método HTTP: PATCH) -->  
                        <v-btn fab dark color="#E53935" small @click="formEditarPATCH(empleado.id, empleado.salario)"><v-icon>mdi-pencil</v-icon></v-btn>
                        <!-- Botón CREAR (Método HTTP: PUT) -->  
                        <v-btn fab dark color="#00BCD4" small @click="formEditar(empleado.id, empleado.nombre, empleado.apellidos, 
                          empleado.edad, empleado.salario)"><v-icon>mdi-pencil</v-icon></v-btn>
                        <!-- Botón CREAR (Método HTTP: DELETE) -->  
                        <v-btn fab dark color="#E53935" small @click="borrar(empleado.id)"><v-icon>mdi-delete</v-icon></v-btn>
                    </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
        </v-card>        
      <!-- Componente de Diálogo para CREAR y EDITAR -->
      <v-dialog v-model="dialog" max-width="500">        
        <v-card>
          <v-card-title class="blue darken-2 white--text">Empleado</v-card-title>    
          <v-card-text>            
            <v-form>             
              <v-container>
                <v-row>
                  <input v-model="empleado.id" hidden></input>
                  <v-col cols="12" md="12">
                    <v-text-field v-model="empleado.nombre" label="Nombre" solo required>{{empleado.nombre}}</v-text-field>
                  </v-col>
                  <v-col cols="12" md="12">
                    <v-text-field v-model="empleado.apellidos" label="Apellido" solo required>{{empleado.apellidos}}</v-text-field>
                  </v-col>
                  <v-col cols="12" md="12">
                    <v-text-field v-model="empleado.edad" label="Edad" type="number" step="1" min="1" max="100" solo required>{{empleado.edad}}</v-text-field>
                  </v-col>
                  <v-col cols="12" md="12">
                    <v-text-field v-model="empleado.salario" label="Salario" type="number" step="any" min="1" solo required>{{empleado.salario}}</v-text-field>
                  </v-col>
                </v-row>
              </v-container>            
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn @click="dialog=false" color="blue-grey" dark>Cancelar</v-btn>
            <v-btn @click="guardar()" type="submit" color="blue darken-2" dark>Guardar</v-btn>
          </v-card-actions>
          </v-form>
        </v-card>
      </v-dialog>

      <!--Ver un registro especificamente-->
      <v-dialog v-model="dialog2" max-width="500">        
        <v-card>
          <v-card-title class="blue darken-2 white--text">Empleado</v-card-title>    
          <v-card-text>            
            <v-form>             
              <v-container>
                <v-row>
                  <input v-model="empleado.id" hidden></input>
                  <v-col cols="12" md="12">
                    <v-text-field v-model="empleado.nombre" label="Nombre" solo required>{{empleado.nombre}}</v-text-field>
                  </v-col>
                  <v-col cols="12" md="12">
                    <v-text-field v-model="empleado.apellidos" label="Apellido" solo required>{{empleado.apellidos}}</v-text-field>
                  </v-col>
                  <v-col cols="12" md="12">
                    <v-text-field v-model="empleado.edad" label="Edad" type="number" step="1" min="1" max="100" solo required>{{empleado.edad}}</v-text-field>
                  </v-col>
                  <v-col cols="12" md="12">
                    <v-text-field v-model="empleado.salario" label="Salario" type="number" step="any" min="1" solo required>{{empleado.salario}}</v-text-field>
                  </v-col>
                </v-row>
              </v-container>            
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn @click="dialog2=false" color="blue-grey" dark>cerrar</v-btn>
          </v-card-actions>
          </v-form>
        </v-card>
      </v-dialog>

      <!--Formulario para Editar (Método HTTP: PATCH)-->
      <v-dialog v-model="dialog1" max-width="500">        
        <v-card>
          <v-card-title class="blue darken-2 white--text">Empleado</v-card-title>    
          <v-card-text>            
            <v-form>             
              <v-container>
                <v-row>
                  <input v-model="empleado.id" hidden></input>
                  <v-col cols="12" md="12">
                    <v-text-field v-model="empleado.salario1" label="Salario" type="number" step="any" min="1" solo required>{{empleado.salario}}</v-text-field>
                  </v-col>
                </v-row>
              </v-container>            
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn @click="dialog1=false" color="blue-grey" dark>Cancelar</v-btn>
            <v-btn @click="guardar()" type="submit" color="blue darken-2" dark>Guardar</v-btn>
          </v-card-actions>
          </v-form>
        </v-card>
      </v-dialog>
      </v-main>
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vuetify/2.5.7/vuetify.min.js" integrity="sha512-BPXn+V2iK/Zu6fOm3WiAdC1pv9uneSxCCFsJHg8Cs3PEq6BGRpWgXL+EkVylCnl8FpJNNNqvY+yTMQRi4JIfZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>

    let url = 'http://localhost:8000/api/empleado/';

    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
       data() {
        return {            
            empleados: [],
            dialog: false,
            dialog1: false,
            dialog2: false,
            operacion: '',            
            empleado:{
                id: null,
                nombre:'',
                apellidos:'',
                edad:'',
                salario:'',
                salario1:''
            }          
        }
       },
       created(){               
            this.mostrar()
       },  
       methods:{          
            //MÉTODOS PARA EL CRUD
            mostrar:function(){
              axios.get(url)
              .then(response =>{
                this.empleados = response.data;                   
              })
            },
            mostrarUno:function(id){
              axios.get(url+id)
              .then(response =>{
                this.empleado.nombre = response.data.nombre;                   
                this.empleado.apellidos =  response.data.apellidos;
                this.empleado.edad =  response.data.edad;
                this.empleado.salario =  response.data.salario;
                this.dialog2=true;
              })
            },
            crear:function(){
                let parametros = {nombre:this.empleado.nombre, apellidos:this.empleado.apellidos, edad:this.empleado.edad, salario:this.empleado.salario };                
                axios.post(url, parametros)
                .then(response =>{
                  this.mostrar();
                });     
                this.empleado.nombre="";
                this.empleado.apellidos="";
                this.empleado.edad="";
                this.empleado.salario="";
            },                        
            editar: function(){
            let parametros = {nombre:this.empleado.nombre, apellidos:this.empleado.apellidos, edad:this.empleado.edad, salario:this.empleado.salario, id:this.empleado.id};                            
            //console.log(parametros);                   
                 axios.put(url+this.empleado.id, parametros)                            
                  .then(response => {                                
                     this.mostrar();
                  })                
                  .catch(error => {
                      console.log(error);            
                  });
            },
            editarPATCH: function(){
            let parametros = {salario:this.empleado.salario1, id:this.empleado.id};                            
            //console.log(parametros);                   
                 axios.patch(url+this.empleado.id, parametros)                            
                  .then(response => {                                
                     this.mostrar();
                  })                
                  .catch(error => {
                      console.log(error);            
                  });
            },
            borrar:function(id){
             Swal.fire({
                title: '¿Confirma eliminar el registro?',   
                confirmButtonText: `Confirmar`,                  
                showCancelButton: true,                          
              }).then((result) => {                
                if (result.isConfirmed) {      
                      //procedimiento borrar
                      axios.delete(url+id)
                      .then(response =>{           
                          this.mostrar();
                       });      
                      Swal.fire('¡Eliminado!', '', 'success')
                } else if (result.isDenied) {                  
                }
              });              
            },

            //Botones y formularios
            guardar:function(){
              if(this.operacion=='crear'){
                this.crear();                
              }
              if(this.operacion=='editar'){ 
                this.editar();                           
              }
              if(this.operacion=='editarPATCH'){ 
                this.editarPATCH();                           
              }
              this.dialog=false;  
              this.dialog1=false;                        
            },
            ver:function(id){
              this.mostrarUno(id);
            },
            formNuevo:function() {
              this.dialog=true;
              this.operacion='crear';
              this.empleado.nombre='';                           
              this.empleado.apellidos='';
              this.empleado.edad='';
              this.empleado.salario='';
            },
            formEditar:function(id, nombre, apellidos, edad, salario){
              //capturamos los datos del registro seleccionado y los mostramos en el formulario
              this.empleado.id = id;
              this.empleado.nombre = nombre;                            
              this.empleado.apellidos = apellidos;
              this.empleado.edad = edad;                      
              this.empleado.salario = salario;
              this.dialog=true;                            
              this.operacion='editar';
            },
            formEditarPATCH:function(id, salario){
              //capturamos los datos del registro seleccionado y los mostramos en el formulario                    
              this.empleado.id = id;
              this.empleado.salario1 = salario;
              this.dialog1=true;    
                                
              this.operacion='editarPATCH';
            }
       }      
    });
  </script>
</body>
</html> 