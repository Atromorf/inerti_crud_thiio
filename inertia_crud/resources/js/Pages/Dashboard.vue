<script setup>
import { Inertia } from '@inertiajs/inertia';
import SideBar from '@/Layouts/SideBar.vue';
import Accordion from 'primevue/accordion';
import AccordionTab from 'primevue/accordiontab';



</script>

<template>
    <div class="flex h-screen bg-gray-100"> <!-- Contenedor principal -->
      <SideBar > <!-- Sidebar -->
        <!-- Contenido de la barra lateral -->
      </SideBar>
  
      <div class="flex-1 flex flex-col overflow-hidden"> <!-- Contenedor del contenido -->
        <header class="bg-white border-b-2 border-gray-200">
          <!-- Encabezado opcional -->
        </header>
  
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6"> <!-- Contenido principal -->
          <section class="bg-white mt-6 mb-6 rounded ml-6 p-8">
            <div class="mx-auto max-w-screen-xl">
              <div class="text-center">
                <div class="flex flex-col justify-between gap-6" id="upSide">
                  <div class="titulo">
                    <div class="text-3xl font-bold ml-6" id="nombreDashboard">
                      <h2>Welcome {{ $page.props.user.name }}</h2>
                    </div>
                    <div class="text-lg mb-6 mt-6" id="parrafoDashboardContainer">
                      <div class="bg-gray-200 p-6 rounded ml-6">
                        <p>
                          In this space, you will find a brief explanation of how all the sections of this application work.
                          <br>
                          To access the information in each section of this page, simply click on the title that interests you and carefully read the instructions provided.<br>
                        </p>
                      </div>
                    </div>
                    
                    <div class="text-lg mb-6 mt-6" id="parrafoDashboardContainer">
                      <div class="bg-gray-200 p-6 rounded ml-6">
                        
                        <Accordion :activeIndex="0">
                          <AccordionTab header="Add User">
                              <p class="m-0">
                                To add a user to the database and user table, go to the 'Users' section in the navigation bar. There you will find a table with an orange button intended for adding new users. In this section, the user's data will be requested, such as their email, password and username.
                              </p>
                          </AccordionTab>
                          <AccordionTab header="Edit User">
                              <p class="m-0">
                                To edit a user's information in the table, simply click the 'Delete' button. This will take you to a window that will display all the user's details, except for the password for security reasons. It is important to ensure that all fields are completed to save the information correctly. Otherwise, a message will be displayed indicating the missing fields. If you decide not to save the changes, you can click the 'Cancel' button.
                              </p>
                          </AccordionTab>
                          <AccordionTab header="Delete User">
                              <p class="m-0">
                                Just like the edit button, the delete button is located in the same section. Clicking on it will permanently delete the selected user's information.
                              </p>
                          </AccordionTab>
                          <AccordionTab header="Account">
                              <p class="m-0">
                                By clicking on the 'Account' button in our navigation bar, two options will be displayed. These options allow you to log out or edit your own personal user information. This section is essential, since it also allows us to activate two-step verification and log out from any device to which we are connected.
                              </p>
                          </AccordionTab>
                      </Accordion>
                      
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
      </main>
    </div>
  </div>


</template>

<style scoped>
.p-tag {
    margin: 0.5em 0.3em 0.5em 0.3em;
    padding: 0.5em;
    border-radius: 3px;
    font-size: 0.85em;
    font-weight: 600;
}
.etiquetahombre	{
   background-color: #0f6ec5	;
}
.etiquetamujer    {
   background-color: #f24a57	;
}
.etiquetavoluntaria    {
   background-color: #32c2b9	;
}
.etiquetatemporal    {
   background-color: #00686c	;
}
.etiquetaacademica{
    background-color: #fad928;
}
.etiquetaadministrativa{
    background-color: #ff9915;
}
.etiquetanegocios{
    background-color: #000000;
}
.etiquetamanufactura{
    background-color: #19058f;
}
.etiquetamecatronica{
    background-color: #9f102c;
}
.etiquetasistemas{
    background-color: #05d3f8;
}
.etiquetaadministracion{
    background-color: #d60212;
}
.etiquetatelematica{
    background-color: #aef055;
}
.etiquetaautomotriz{
    background-color: #5b1d99;
}

.accordion-custom i span {
    vertical-align: middle;
}

.accordion-custom span {
    margin: 0 0.8rem;
}

.p-accordion p {
    line-height: 1.5;
    margin: 0;
}


.button-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #d8d1d1; /* Color gris de fondo */
  padding: 10px; /* Espacio alrededor del contenedor */
  margin-bottom: 20px; /* Margen inferior */
  border-radius: 8px; 
}

.button-group {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  margin-bottom: 10px;
}

.button-group > * {
  margin: 5px; /* Ajusta este valor según tus preferencias */
}

</style>

